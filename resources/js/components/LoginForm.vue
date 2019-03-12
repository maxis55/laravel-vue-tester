<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="/login" @submit.prevent="onSubmit">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" :class="{'is-invalid':authError.email}" class="form-control"
                                       v-model="user.email" value="" required autofocus>

                                <span v-if="authError.email" class="invalid-feedback" role="alert">
                                        <strong>{{ authError.email[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" :class="{'is-invalid':authError.password}"
                                       class="form-control" v-model="user.password" required>

                                <span v-if="errors.password" class="invalid-feedback" role="alert">
                                        <strong>{{ authError.password[0] }}</strong>
                                </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember"
                                           v-model="user.remember">

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>


                                <!--<a class="btn btn-link" href="{{ route('password.request') }}">-->
                                <!--Forgot Your Password?-->
                                <!--</a>-->

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {login} from '../helpers/auth'

    export default {
        name: 'login-form',
        data() {
            return {
                errors: [],
                endpoint: '/api/auth/login',
                user: {
                    email: null,
                    password: null,
                    remember: null,
                }
            };
        },
        methods: {
            onSubmit() {

                this.$store.dispatch('login');

                login(this.$data.user)
                    .then((res) => {
                        this.$store.commit('loginSuccess', res);
                        this.$router.push({path: '/'})
                    })

                    .catch((error) => {
                        this.$store.commit('loginFailed', error);
                    });

                //if set variable that its new post, or if link doesn't have edit on the end
//                axios.post(this.endpoint, this.user)
//                    .then(({data}) => this.setSuccessMessage(data))
//                    .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                this.errors = response.data.errors;
            },

            setSuccessMessage(data) {
                this.errors = [];
                if (data.message === 'success') {
                    console.log(data);
//                    location.reload();
                }
            },

        },
        computed:{
            authError(){
//                console.log(this.$store.getters.authError);
               return this.$store.getters.authError;
            }
        }
    }
</script>