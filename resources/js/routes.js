// 1. Define route components.
// These can be imported from other files
import Home from './views/Home.vue';
import Panineria from './views/Panineria.vue';
import Pizzeria from './views/Pizzeria.vue';
import Fastfood from './views/Fastfood.vue';
import Gelateria from './views/Gelateria.vue';

// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
      path: '/panineria',
      name: 'panineria',
      component: Panineria
    },
    {
      path: '/pizzeria',
      name: 'pizzeria',
      component: Pizzeria
    },
    {
      path: '/fast-food',
      name: 'fast-food',
      component: Fastfood
    },
    {
      path: '/gelateria',
      name: 'gelateria',
      component: Gelateria
    },
];

// Export const routes in file app.js
export default routes;