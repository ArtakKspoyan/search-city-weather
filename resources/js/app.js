
import {createApp} from 'vue'
require('./bootstrap')
import App from './App.vue'
import axios from 'axios'
import router from './router'
import loader from "vue-ui-preloader";

const app = createApp(App)
app.config.globalProperties.$axios = axios;
app.use(loader);
app.use(router)
app.mount('#app')
