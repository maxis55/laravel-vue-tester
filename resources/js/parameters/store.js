import {getLocalUser} from "../helpers/auth";
import {setAuthorization} from '../helpers/init';
const user = getLocalUser();

export default {
    state: {
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: [],
    },
    getters: {
        isLoading(state){
            return state.loading;
        },
        isLoggedIn(state){
            return state.isLoggedIn;
        },
        currentUser(state){
            return state.currentUser;
        },
        authError(state){
            return state.auth_error;
        },
    },
    mutations: {
        login(state){
            state.loading = true;
            state.auth_error = [];
        },
        loginSuccess(state, payload){
            state.auth_error = [];
            state.isLoggedIn = true;
            state.loading = false;

            state.currentUser = Object.assign({}, payload.user, {access_token: payload.access_token});

            setAuthorization(payload.access_token);

            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload){
            state.loading = false;

            state.auth_error = payload.errors;
        },
        logout(state){
            localStorage.removeItem('user');
            state.isLoggedIn = false;
            state.currentUser = null;
        }

    },
    actions: {
        login(context){
            context.commit('login');
        },

    }
}