<template>
    <nav class="navbar navbar-findcond">
        <div class="container">
            <div class="navbar-header">
                <router-link class="navbar-brand" to="/">Home</router-link>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">

                    <template v-if="!currentUser">
                        <li>
                            <router-link to="/login">Login</router-link>
                        </li>
                        <li>
                            <router-link to="/register">Register</router-link>
                        </li>
                    </template>
                    <template v-else>
                        <li>
                            <router-link to="/posts">Posts</router-link>
                        </li>
                        <li>
                            <router-link to="/posts/create">New post</router-link>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropDown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                {{currentUser.name}} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropDown">
                                <a href="#" @click.prevent="logout" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </template>

                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'app-header',
        methods:{
            logout(){
                this.$store.commit('logout');
                this.$router.push('/login');
            }
        },
        computed:{
            currentUser(){
                return this.$store.getters.currentUser;
            }
        }
    }
</script>

<style scoped>
    .dropdown-item{
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }
</style>