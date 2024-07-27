<template>
    <div v-for="product in products">
        <div class="product-card">
            <router-link :to="'/product/' + product.id">
                <img style="max-width: 100px" :src="product.img" alt="Product Image">
                <div class="product-details">
                    <h2>{{ product.name }}</h2>
                </div>
            </router-link>
            <div class="product-details">
                <p>описание {{ product.description }}</p>
                <p>цена: {{ product.price }}</p>
                <p>доступно: {{ product.count }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';

export default {
    name: 'Catalog',
    created() {
        this.loadProducts();
        this.loadFavorites();
    },
    computed: {
        ...mapGetters({
            products: 'getProducts'
        })
    },
    methods: {
        ...mapActions({
            loadProducts: 'loadProducts',
            loadFavorites: 'loadFavorites',
        })
    }
}
</script>

<style scoped>
.product-card {
    margin-left: 20px;
}
</style>
