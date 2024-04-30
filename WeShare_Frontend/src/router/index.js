import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Auth/Login.vue')
    }
  ]
})

// router.beforeEach((to, from, next) => {
//   const token = localStorage.getItem('userToken');
//   if (to.path !== '/login' && !token) {
//     next('/login');
//   } else {
//     next();
//   }
// });

export default router;
