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
                        <label class="col-md-3 control-label" for="body">Your message</label>
                        <div class="col-md-9" :class="{'has-error': errors.body}">
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

        data() {
            return {
                errors: [],
                saved: false,
                post: {
                    name: null,
                    content: null,
                }
            };
        },
        props : ['post'],
        methods: {
            onSubmit() {
                this.saved = false;

                axios.post('/api/posts', this.post)
                    .then(({data}) => this.setSuccessMessage())
                    .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                this.errors = response.data.errors;
            },

            setSuccessMessage() {
                this.reset();
                this.saved = true;
            },

            reset() {
                this.errors = [];
                this.post = {name: null, content: null};
            }
        }
    }
</script>