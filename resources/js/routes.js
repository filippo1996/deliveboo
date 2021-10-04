// 1. Define route components.
// These can be imported from other files
import Home from './partials/Main.vue';

// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    }
];

// Export const routes in file app.js
export default routes;