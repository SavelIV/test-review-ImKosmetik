import { createApp } from 'vue';
import App from './components/App.vue';
import axios from 'axios';
import store from './store';
import router from './router/index';

const instance = axios.create({
    withCredentials: true,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json'
    }
})

const app = createApp({
    components: {
        App
    }
});

app.config.globalProperties.$axios = axios;
app.use(store)
app.use(router)
app.mount('#app');
