<template>
    <div class="product-card">
        <img style="max-width: 100px" :src="product.img" alt="Product Image">
        <div class="product-details">
            <h5>{{ product.name }}</h5>
            <p>{{ product.description }}</p>
            <span>{{ product.price }}</span>
        </div>
        <div v-if="favorited">
            <button @click="deleteFromFavorites(product.id)" class="delete-favorite">
                Remove from Favorites
            </button>
        </div>
        <div v-else>
            <button @click="addToFavorites(product.id)" class="add-favorite">
                Add to Favorites
            </button>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';

export default {
    name: 'ProductCard',
    computed: {
        ...mapGetters({
            products: 'getProducts',
            favorites: 'getFavorites',
        }),
        product() {
            return this.products.find(p => p.id == this.$route.params.id);
        },
        favorited() {
            return !!this.favorites.find(f => f.id == this.$route.params.id);
        },
    },
    methods: {
        ...mapActions({
            deleteFromFavorites: 'deleteFromFavorites',
            addToFavorites: 'addToFavorites',
        }),
    },
}
</script>

<style scoped>
.product-card {
    margin-left: 20px;
}
.message {
    color: red;
}
button.delete-favorite {
    margin-top: 5px;
    background-color: #9eeaf9;
}
button.add-favorite {
    margin-top: 5px;
    background-color: #e5c7ca;
}
</style>
