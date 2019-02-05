<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="card-header">{{title}}</h2>

                    <div class="card-body">
                       {{content}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['title','content'],
        mounted() {
            console.log('Component post mounted.')
        }
    }
</script>
