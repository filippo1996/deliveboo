// 1. Define route components.
// These can be imported from other files
import Home from './views/Home.vue';
import Shop from './views/Shop.vue';

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
      path: '/shop',
      name: 'shop',
      component: Shop
    }
];

// Export const routes in file app.js
export default routes;