import Home from '../components/Home.vue';
import LoginForm from '../components/LoginForm.vue';
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
    }

];