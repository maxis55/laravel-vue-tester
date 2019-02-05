<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="card-header">{{title}}</h2>

                    <div class="card-body">
                       {{content}}
                    </div>
                    <div class="links">
                        <span class="subtitle">Created at  : {{post.created_at}}</span><br/>
                        <span class="subtitle">Updated at : {{post.updated_at}}</span><br/>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['title','content','post'],
        mounted() {
            console.log('Component post mounted.')
        }
    }
</script>
