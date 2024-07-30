<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <hr/>
                        <form class="row" method="post">
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" v-model="user.email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" v-model="user.password" name="password" id="password" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" @click.prevent="login" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>Don't have an account? <router-link to="/user/register">Register</router-link></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Login',
    data: () => ({
        user: {
            email: "",
            password: "",
        }
    }),
    methods: {
        login() {
            this.$store.dispatch('auth/loginUser', this.user)
        }
    }
}
</script>

<style scoped>

</style>
