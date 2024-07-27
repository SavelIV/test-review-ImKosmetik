<template>
    <div v-for="favorite in favorites">
        <div class="product-card">
            <router-link :to="'/product/' + favorite.id">
                <img style="max-width: 100px" :src="favorite.img" alt="Product Image">
                <div class="product-details">
                    <h2>{{ favorite.name }}</h2>
                </div>
            </router-link>
            <div class="product-details">
                <p>описание {{ favorite.description }}</p>
                <p>цена: {{ favorite.price }}</p>
                <p>доступно: {{ favorite.count }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';

export default {
    name: 'Favorites',
    created() {
        this.loadFavorites()
    },
    computed: {
        ...mapGetters({
            favorites: 'getFavorites'
        })
    },
    methods: {
        ...mapActions({
            loadFavorites: 'loadFavorites'
        })
    }
}
</script>

<style scoped>
.product-card {
    margin-left: 20px;
}
</style>
