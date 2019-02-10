<template>
    <div>
        <div class="panel panel-default" v-for="single_post in posts" >
            <div class="panel-heading">
               <h2>{{single_post.name}}</h2>Published {{single_post.date}}
            </div>
            <div :class="{full_text:single_post.full_text}" class="panel-body">
                <p> {{single_post.content}}</p>
            </div>
            <div class="panel-footer">

                <div class="buttons-group">
                    <a @click.prevent="showPost(single_post)" href="javascript:void(0)" type="button" class="btn btn-info mb-2">Show</a>
                    <a :href="'/posts/'+single_post.id+'/edit'" type="button" class="btn btn-warning mb-2">Edit</a>
                    <a @click.prevent="deletePost(single_post.id)" href="javascript:void(0)" type="button" class="btn btn-danger mb-2">Delete</a>
                </div>

            </div>
        </div>
    </div>
</template>



<script>
    export default {
        data() {
            return {
                posts: [],
                endpoint: 'api/posts',
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch() {
                axios.get(this.endpoint)
                    .then(
                        ({data}) => {
                            this.posts = data.data;
                        }
                    );
            },
            deletePost: function (id) {
                if (confirm('Are you sure you want to delete this post?')) {
                    axios.delete(this.endpoint + '/' + id)
                        .then(
                            ({data}) => {
                                if ('Success' === data){
                                    this.removePost(id)
                                }else{
                                    alert(data);
                                }
                            }
                        );
                }
            },
            removePost(id) {
                this.posts = _.remove(this.posts, function (post) {
                    return post.id !== id;
                });
            },
            showPost: function (post) {
                // it seems just setting object's property is not enough to update DOM
                // so need to use vm.$set OR update another vm property
                // that is not child of array/object prop
                this.$set(post, 'full_text', !post.full_text);
            }

        }
    }
</script>

<style scoped>
    .buttons-group{
        display: flex;
        flex-direction: column;
    }
    .btn{
        margin-bottom: 2px;
    }
    .panel-body p{
        height:50px;
        overflow: hidden;
    }
    .panel-body.full_text p{
        height: auto;
    }

</style>