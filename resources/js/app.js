require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import AutobotCounter from './components/AutobotCounter.vue';



const app = createApp(App);

app.component('autobot-counter', AutobotCounter);

app.use(router);

app.mount('#app');
