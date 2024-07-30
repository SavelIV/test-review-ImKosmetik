import { createRouter, createWebHistory } from 'vue-router';
import CatalogList from '../views/catalog/List.vue';
import FavoritesList from '../views/favorites/List.vue';
import ProductCard from '../components/catalog/ProductCard.vue';
import Login from '../views/auth/Login.vue'
import Registration from '../views/auth/Register.vue'

const routes = [
    {
        path: '/',
        name: 'Catalog',
        component: CatalogList
    },
    {
        path: '/product/:id',
        name: 'Product',
        component: ProductCard,
    },
    {
        path: '/favorites',
        name: 'Favorites',
        component: FavoritesList
    },
    {
        path: '/user/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/user/register',
        name: 'Register',
        component: Registration
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x-token')

    if(!token) {
        if (to.name === 'Login' || to.name === 'Register' || to.name === 'Catalog') {
            return next()
        } else {
            return next ({
                name: 'Login'
            })
        }
    }
    if (to.name === 'Login' || to.name === 'Register' && token) {
        return next({
            name: '/'
        })
    }
    next()
})

export default router;
