require('./bootstrap');

// Importiamo VUE 3
import { createApp } from 'vue';

/**
 * SPA - Single Page Application V4
 * Se volessimo includere tutti i componenti dentro App.vue e invocare in automatico App.vue nel <div id="app"> file blade
 */
 import { createWebHistory, createRouter } from 'vue-router';
 import routes from './routes';

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = createRouter({
  history: createWebHistory(), // 4. Provide the history implementation to use.
  routes, // short for `routes: routes`
});

// Navigation Guards
/*
router.beforeEach((to, from) => {
  console.log(to.fullPath);
  return true;
});
*/

// Import root component vue ( App.vue )
import App from './views/App';

//Invochiamo createApp, e gli passiamo il component App
const app = createApp(App);

// Make sure to _use_ the router instance to make the
// whole app router-aware.
app.use(router);

// Montiamo app nel DOM <div id="app">
app.mount('#app');
