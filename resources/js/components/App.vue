<template>
    <section>
        <div>Список задач</div>
        <div>Всего задач {{ count }}</div>
        <div>Добавить задачу <span class="newTask" @click="open">{{ form ? 'x' : '+'}}</span></div>
        <div class="form" v-if="form">
            <input type="text" v-model="name">
            <input type="text" v-model="description">
            <input type="submit" @click="send">
        </div>
        <div class="task-item" v-for="e in data">
            <span class="delete" @click="deleteItem(e)">x</span>
            <div >Ид: {{ e.id }}</div>
            <div>Имя: {{ e.name }}</div>
            <div>Описание: {{ e.description }}</div>
            <div>Время обновления: {{ e.updated_at }}</div>
        </div>
    </section>
</template>

<script lang="ts">

export default {
    data() {
        return {
            data: [],
            countTask: null,
            form: false,
            name: '',
            description: null,
        }
    },
    created() {
        this.$axios.get('/api/task/')
            .then(response => {
                this.data = response.data
            })
    },
    mounted() {
        this.$axios.get('/api/task/count/')
            .then(response => {
                this.countTask = response.data
            })
    },
    computed: {
        count() {
            return this.countTask || this.data.length
        }
    },
    methods: {
        deleteItem(element) {
            var userConfirmation = confirm('Хотите удалить задачу?');
            if (userConfirmation === false) {
                return;
            }
            this.$axios.post(`/api/task/${JSON.stringify(element)}`)
            setTimeout(() => {
                this.$axios.get('/api/task/')
                    .then(response => {
                        this.data = response.data
                    })
            }, 500)
        },
        open() {
            if (this.form === true) {
                this.form = false;
            } else if (this.form === false) {
                this.form = true;
            }
        },
        send() {
            this.$store.dispatch('createNewTaskListItem', {name: this.name, description: this.description})
            setTimeout(this.open, 1000)
        }
    }
}
</script>

<style scoped>
section {
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: center;
    width: 100%;
    margin-top: 5vh;
}
.task-item {
    position: relative;
    display: block;
    justify-content: start;
    min-width: 200px;
    border: 1px solid rgba(235, 235, 235, 0.64);
    border-radius: 5px;
    padding: 5px;
}
.delete {
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
}
.newTask {
    align-items: center;
    margin-left: 10px;
    cursor: pointer;
    font-size: 25px;
}
.form {
    display: flex;
    flex-direction: column;
    min-width: 200px;
}
.form > * {
    margin-bottom: 2px;
}
</style>
