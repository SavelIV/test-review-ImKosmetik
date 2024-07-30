import axios from "axios";

interface State {
    errors: [],
}

export default {
    namespaced: true,
    state(): State {
        return {
            errors: []
        };
    },
    mutations: {
        setErrors(state: State, invalidCredentials: []) {
            state.errors = invalidCredentials;
        },
    },
    actions: {
        loginUser({commit}, user) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/login', {
                    email: user.email,
                    password: user.password
                })
                    .then(response => {
                        if (response.data) {
                            localStorage.setItem('x-token', response.data.data.token)
                            window.location.replace("/")
                        }
                    }).catch((error) => {
                    console.log(error.response)
                    if (error.response.status === 422) {
                        commit('setErrors', error.response.data.errors)
                        console.log(this.errors)
                    }
                })
            });
        },
        registerUser({}, user) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/register', {
                    name: user.name,
                    email: user.email,
                    password: user.password,
                    password_confirmation: user.password_confirmation
                })
                    .then(response => {
                        if (response.data) {
                            localStorage.setItem('x-token', response.data.data.token)
                            window.location.replace("/")
                        }
                    }).catch((error) => {
                    console.log(error.response)
                })
            });
        },
        logout() {
            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('x-token')
                    window.location.replace("/")

                })
        }
    },
    getters: {
        getErrors: state => state.errors
    }
}
