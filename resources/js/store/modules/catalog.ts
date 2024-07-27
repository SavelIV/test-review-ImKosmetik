import axios from "axios";

interface State {
    products: [];
    status: string;
    errors: [];
}

export default {
    state(): State {
        return {
            products: [],
            status: '',
            errors: [],
        };
    },
    mutations: {
        setData(state: State, products: []) {
            state.products = products;
        },
        setStatus(state: State, status: string) {
            state.status = status;
        },
        setErrors(state: State, errors: []) {
            state.errors = errors;
        }
    },
    actions: {
        loadProducts({commit}) {
            axios.get('/api/product/')
                .then(response => {
                    commit('setData', response.data)
                })
        },
    },
    getters: {
        getProducts: state => state.products
    }
}
