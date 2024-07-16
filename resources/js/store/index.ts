import { createStore } from 'vuex';
import catalog from './modules/catalog';
import favorite from './modules/favorite';

const store = createStore({
    modules: {
        catalog,
        favorite,
    },
});

export default store;