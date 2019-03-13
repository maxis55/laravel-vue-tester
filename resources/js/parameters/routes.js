import Home from '../components/Home.vue';
import LoginForm from '../components/LoginForm.vue';
import Posts from '../components/PostsComponent.vue';
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
        component: Posts,
        meta:{
            requiresAuth:true
        }
    }

];