<template>
    <div class="container-fluid" >
        <div class="row justify-content-center" v-for="single_post in posts">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="card-header text-center">{{single_post.name}}</h2>

                    <div class="card-body">
                       {{single_post.content}}
                    </div>
                    <div class="links">
                        <span class="subtitle">Created  : {{single_post.date}}</span><br/>

                    </div>
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

        },
        mounted() {
            console.log('Component post mounted.')
        }
    }
</script>

<style scoped>
    .row:nth-child(odd){
        background-color: bisque;
    }
</style>