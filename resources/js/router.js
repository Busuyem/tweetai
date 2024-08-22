import { createRouter, createWebHistory } from 'vue-router';
import AutobotList from './components/AutobotList.vue';

const routes = [
  { path: '/', component: AutobotList },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
