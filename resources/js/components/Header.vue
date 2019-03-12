<template>
    <nav class="navbar navbar-findcond">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Posts</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="/posts/create">Create post</a>
                    </li>

                    <li>
                        <a href="/home">Home</a>
                    </li>
                    <li>
                        <a href="/logout"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                           Logout
                        </a>

                    </li>
                    <li>
                        <a href="/login">Login</a>
                    </li>

                    <li>
                        <a href="/register">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'app-header',

    }
</script>