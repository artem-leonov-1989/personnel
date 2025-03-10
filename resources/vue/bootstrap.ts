import {createApp} from 'vue';
import App from '@/components/app.vue';
import router from '@/config/router';
import {createPinia} from "pinia";
import ElementPlus from 'element-plus';
import ElementPlusLocaleUK from 'element-plus/es/locale/lang/uk';
import 'element-plus/dist/index.css'
import 'dayjs/locale/uk.js';


const app = createApp(App);
const pinia = createPinia();

app.use(router);
app.use(pinia);
app.use(ElementPlus, {
    locale: ElementPlusLocaleUK,
})

app.mount('#app');
