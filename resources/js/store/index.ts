import { createStore } from 'vuex';
import catalog from './modules/catalog';
import favorite from './modules/favorite';
import auth from './modules/auth';

const store = createStore({
    modules: {
        catalog,
        favorite,
        auth,
    },
});

export default store;
