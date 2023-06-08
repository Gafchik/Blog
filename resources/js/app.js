import './bootstrap';
import '../css/app.css';
import 'vuetify/styles';
import App from "./components/App.vue";
import vuetify from './plugins/vuetify'
import i18n from './plugins/i18n.js'
import router from './routes/router'
import { createApp } from 'vue';
import { store } from './store/index'


createApp(App)
    .use(vuetify)
    .use(store)
    .use(i18n)
    .use(router)
    .mount("#app")
