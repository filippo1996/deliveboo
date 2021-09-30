require('./bootstrap');

// Importiamo VUE 3
import { createApp } from 'vue';

/**
 * SPA - Single Page Application
 * Se volessimo includere tutti i componenti dentro App.vue e invocare in automatico App.vue nel <div id="app"> file blade
 */

// Import root component vue ( App.vue )
import App from './views/App';

//Invochiamo createApp, e gli passiamo il component App
const app = createApp(App);

// Montiamo app nel DOM <div id="app">
app.mount('#app');
