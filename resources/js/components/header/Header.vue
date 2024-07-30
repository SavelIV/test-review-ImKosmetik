<template>
    <header class="header">
        <div class="logo">
            <Logo/>
        </div>
        <nav class="navigation">
            <ul>
                <li>
                    <router-link to="/">
                        Главная
                    </router-link>
                </li>
                <li><a href="/#">Магазин</a></li>
                <li><a href="/#">О нас</a></li>
                <li><a href="/#">Контакты</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <!-- Поиск -->
            <input type="text" placeholder="Поиск">
            <button>Найти</button>
        </div>
        <div class="cart">
            <!-- Избранное -->
            <router-link to="/favorites">
                <i></i> Избранное ({{ favoritesCount }})
            </router-link>
        </div>
        <div class="cart">
            <!-- Корзина -->
            <a href="/#">
                <i class="fa fa-shopping-cart"></i> Корзина (0)
            </a>
        </div>
        <div class="auth">
            <!-- Вход/Регистрация -->
            <div v-if="getToken">
                <button type="submit" @click.prevent="logout">Logout </button>
            </div>
            <div v-else>
                <router-link to="/user/login">
                    <i></i> Вход
                </router-link>
            </div>
        </div>
    </header>
</template>

<script>
import Logo from '../icons/Logo.vue';
import {mapGetters} from 'vuex';

export default {
    name: 'Header',
    components: {Logo},
    data() {
        return {
            token: null
        }
    },
    computed: {
        ...mapGetters({
            favoritesCount: 'getFavoritesCount'
        }),
        getToken() {
            this.token = localStorage.getItem('x-token')
            return this.token;
        }
    },
    methods: {
        logout() {
            this.$store.dispatch('auth/logout', this.user)
        },
    },
}
</script>

<style scoped>
.header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background-color: #f8f9fa; /* Пример цвета фона */
}

.logo img {
    height: 50px; /* Пример высоты логотипа */
}

.navigation ul {
    list-style-type: none;
    display: flex;
}

.navigation ul li {
    margin-right: 1rem;
}

.search-bar input[type="text"] {
    padding: 0.5rem;
    border: 1px solid #ccc; /* Пример стиля рамки */
}

.search-bar button {
    padding: 0.5rem 1rem;
    background-color: #007bff; /* Пример цвета кнопки */
    color: white;
    border: none;
    cursor: pointer;
}

.cart a {
    text-decoration: none;
    color: #333;
}

.auth a {
    margin-left: 0.5rem;
    text-decoration: none;
    color: #333;
}

.auth a:hover {
    text-decoration: underline;
}
</style>
