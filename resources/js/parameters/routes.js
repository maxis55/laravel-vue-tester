import Home from '../components/Home.vue';
import LoginForm from '../components/LoginForm.vue';
import PostMain from '../components/posts/Main.vue';
import Posts from '../components/posts/Index.vue';
import PostCreateForm from '../components/posts/PostCreateForm.vue';
export const routes = [
    {
        path: '/',
        component: Home,
        meta:{
            requiresAuth:true
        }
    },
    {
        path: '/login',
        component: LoginForm
    },
    {
        path:'/posts',
        component: PostMain,
        meta:{
            requiresAuth:true
        },
        children: [
            {
                path: '/',
                component: Posts
            },
            {
                path: 'create',
                component: PostCreateForm
            },
        ]
    }

];