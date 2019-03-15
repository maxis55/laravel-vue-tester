<template>
    <div>
        <div class="alert alert-success" v-if="saved">
            <strong>Success!</strong> Your post has been saved successfully.
        </div>

        <div class="well well-sm" id="post-form">
            <form class="form-horizontal" method="post" @submit.prevent="onSubmit">
                <fieldset>
                    <legend class="text-center">Create post</legend>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9" :class="{'has-error': errors.name}">
                            <input id="name"
                                   v-model="post.name"
                                   type="text"
                                   placeholder="Your name"
                                   class="form-control">
                            <span v-if="errors.name" class="help-block text-danger">{{ errors.name[0] }}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="body">Content</label>
                        <div class="col-md-9" :class="{'has-error': errors.content}">
                                    <textarea class="form-control"
                                              id="body"
                                              v-model="post.content"
                                              placeholder="Please enter your message here..."
                                              rows="5"></textarea>
                            <span v-if="errors.content" class="help-block text-danger">{{ errors.content[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'posts-create',
        data() {
            return {
                errors: [],
                saved: false,
                post: {
                    name: '',
                    content: '',
                },
                endpoint: '/api/posts',
            };
        },
        methods: {
            onSubmit() {

                axios.post(this.endpoint, this.post)
                    .then(({data}) => this.setSuccessMessage(data))
                    .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                console.log(response);
                this.saved = false;
                this.errors = response.data.errors;
            },

            setSuccessMessage(data) {
                //set current post to answered post in case there is changes on back-end
                this.post = data.data;

                this.reset();
                this.saved = true;
            },

            reset() {
                this.errors = [];

                this.post = {name: null, content: null};

            }
        },
        computed: {
            currentUser(){
                return this.$store.getters.currentUser;
            }
        },
    }
</script>