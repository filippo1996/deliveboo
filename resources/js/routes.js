// 1. Define route components.
// These can be imported from other files
import Home from './views/Home.vue';
//import Category from './views/Category.vue';
import Restaurant from './views/Restaurant.vue';
import NotFound from './views/errors/404.vue';
import Checkout from './views/Checkout.vue';
import Payment from './views/Payment.vue';
import Success from './views/Success.vue';

import { Cart } from './utils/factory.js';

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
    /*
    {
      path: '/category/:slug',
      name: 'category',
      component: Category,
      props: true,
      meta: { requiresJumbotron: true }
    },
    */
    {
      path: '/local/:slug',
      name: 'restaurant',
      component: Restaurant,
      props: true
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: Checkout,
      props: true,
      beforeEnter: (to, from) => {
        const cart = new Cart();
        if( !cart.getCart().items?.length ) return from;
      }
    },
    {
      path: '/payment',
      name: 'payment',
      component: Payment,
      props: true,
      beforeEnter: (to, from) => {
        const cart = new Cart();
        if( !cart.getCart().items?.length || !localStorage.getItem('address') ) return from;
      }
    },
    {
      path: '/success',
      name: 'success',
      component: Success,
      props: true,
      beforeEnter: (to, from) => {
        let status = to.params.repositories;
        if(status !== 'authorized') return from;
      }
    },
];

// Export const routes in file app.js
export default routes;