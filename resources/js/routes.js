// 1. Define route components.
// These can be imported from other files
import Home from './views/Home.vue';
import Category from './views/Category.vue';
import Restaurant from './views/Restaurant.vue';
import NotFound from './views/errors/404.vue';

// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
    {
      path: "/:catchAll(.*)",
      redirect: '/404'
    },
    { path: '/404', 
      name: '404', 
      component: NotFound 
    },
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: { requiresJumbotron: true }
    },
    {
      path: '/category/:slug',
      name: 'category',
      component: Category,
      props: true,
      meta: { requiresJumbotron: true }
    },
    {
      path: '/local/:slug',
      name: 'restaurant',
      component: Restaurant,
      props: true
    }
];

// Export const routes in file app.js
export default routes;