<template>
    <div v-for="product in products">
        <img style="max-width: 100px" :src="product.img" alt="Product Image">
        <div class="product-details">
            <h2>{{ product.name }}</h2>
            <p>описание {{ product.description }}</p>
            <p>цена: {{ product.price }}</p>
            <p>доступно: {{ product.count }}</p>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
    name: 'List',
    created() {
        this.loadProducts()
    },
    computed: {
        ...mapGetters({
            products: 'getProducts'
        })
    },
    methods: {
        ...mapActions({
            loadProducts: 'loadProducts'
        })
    }
}
</script>

<style scoped>

</style>