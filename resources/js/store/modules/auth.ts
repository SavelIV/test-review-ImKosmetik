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
        setErrors(state: State, errors: []) {
            state.errors = errors;
        },
    },
    actions: {
        loginUser({commit}: any, user: {
            email: string;
            password: string;
        }) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/login', user)
                    .then(response => {
                        if (response.data) {
                            localStorage.setItem('x-token', response.data.data.token)
                            window.location.replace("/")
                        }
                    }).catch((error) => {
                    if (error.response.status === 422) {
                        commit('setErrors', error.response.data.errors)
                    } else {
                        commit('setErrors', {})
                        alert(error.response.data.message)
                    }
                })
            });
        },
        registerUser({commit}: any, user: {
            name: string;
            email: string;
            password: string;
            password_confirmation: string;
        }) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/register', user)
                    .then(response => {
                        if (response.data) {
                            commit('setErrors', {})
                            localStorage.setItem('x-token', response.data.data.token)
                            window.location.replace("/")
                        }
                    }).catch((error) => {
                    if (error.response.status === 422) {
                        commit('setErrors', error.response.data.errors)
                    } else {
                        commit('setErrors', {})
                        alert(error.response.data.message)
                    }
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
        getErrors: (state: { errors: []; }) => state.errors
    }
}
