require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import AutobotCounter from './components/AutobotCounter.vue';
import Pusher from 'pusher-js';


const pusher = new Pusher('c907f1452cb06ff2375e', {
    cluster: 'us2',
    forceTLS: true
});


const channel = pusher.subscribe('autobots');
channel.bind('count', function(data) {
    console.log('Received data:', data);
    
});


const app = createApp(App);

app.component('autobot-counter', AutobotCounter);

app.use(router);

app.mount('#app');
