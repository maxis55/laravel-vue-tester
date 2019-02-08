<template>
    <div>
        <div class="panel panel-default" v-for="single_post in posts">
            <div class="panel-heading">
               <h2>{{single_post.name}}</h2>
            </div>
            <div class="panel-body">
                <div class="col-md-2">
                    <!--<div class="thumbnail">-->
                        <!--<img :src="signature.avatar" :alt="signature.name">-->
                    <!--</div>-->
                </div>
                <p> {{single_post.content}}</p>
            </div>
            <div class="panel-footer">
                Published {{ single_post.date }}
                <div class="buttons-group">
                    <a href="javascript:void(0)" type="button" class="btn btn-info mb-2">Show</a>
                    <a href="javascript:void(0)" type="button" class="btn btn-warning mb-2">Edit</a>
                    <a href="javascript:void(0)" type="button" class="btn btn-danger mb-2">Delete</a>
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
                endpoint: 'api/posts'
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
</style>