import {createApp} from 'vue';
import App from '@/components/app.vue';
import router from '@/config/router';
import {createPinia} from "pinia";

const app = createApp(App);
const pinia = createPinia();

app.use(router);
app.use(pinia);

app.mount('#app');
