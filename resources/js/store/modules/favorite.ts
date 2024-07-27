import axios from "axios";

interface State {
    favorites: [];
    status: string;
    errors: [];
}

export default {
    state(): State {
        return {
            favorites: [],
            status: '',
            errors: []
        };
    },
    mutations: {
        setFavorites(state: State, favorites: []) {
            state.favorites = favorites;
        },
        setStatus(state: State, status: string) {
            state.status = status;
        },
        setErrors(state: State, errors: []) {
            state.errors = errors;
        },
    },
    actions: {
        loadFavorites({commit}) {
            axios.get('/api/favorite/1')
                .then(response => {
                    commit('setFavorites', response.data)
                })
        },
        addToFavorites({commit}, id) {
            axios.post(`/api/favorite/${id}/1`)
                .then(response => {
                    alert(response.data.message);
                    commit('setFavorites', response.data.data);
                })
        },
        deleteFromFavorites({commit}, id) {
            let resp = confirm('Are you sure you want to delete this product from favorites?');
            if (resp) {
                axios.delete(`/api/favorite/${id}/1`)
                    .then(response => {
                        alert(response.data.message);
                        commit('setFavorites', response.data.data);
                    })
            }

        },
    },
    getters: {
        getFavorites: state => state.favorites,
        getFavoritesCount: state => state.favorites.length
    }
}
