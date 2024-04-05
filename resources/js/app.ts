import { createApp } from 'vue';
import App from './components/App.vue';
import axios from "axios";
import store from './store';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({
    components: {
        App
    }
});

app.config.globalProperties.$axios = axios;
app.use(store)
app.mount('#app');
