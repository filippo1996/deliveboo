// 1. Define route components.
// These can be imported from other files
import Home from './views/Home.vue';
import Category from './views/Category.vue';

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
      path: '/category/:slug',
      name: 'category',
      component: Category,
      props: true
    }
];

// Export const routes in file app.js
export default routes;