import { createRouter, createWebHistory } from 'vue-router';
import CatalogList from '../views/catalog/List.vue';
import FavoritesList from '../views/favorites/List.vue';
import ProductCard from '../components/catalog/ProductCard.vue';

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
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
