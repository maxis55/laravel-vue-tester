<template>
    <div class="container" >
        <div class="row justify-content-center" v-for="single_post in posts">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="card-header">{{single_post.title}}</h2>

                    <div class="card-body">
                       {{single_post.content}}
                    </div>
                    <div class="links">
                        <span class="subtitle">Created at  : {{single_post.created_at}}</span><br/>
                        <span class="subtitle">Updated at : {{single_post.updated_at}}</span><br/>
                    </div>

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
                            this.posts = data;
                        }
                    );
            },

        },
        mounted() {
            console.log('Component post mounted.')
        }
    }
</script>
