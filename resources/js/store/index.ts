import { createStore } from 'vuex';
import axios from "axios";

interface State {
    name: string;
    description: string;
}

const store = createStore({
    state(): State {
        return {
            name: '',
            description: '',
        };
    },
    mutations: {
        setName(state: State, name: string) {
            state.name = name;
        },
        setDescription(state: State, data: string) {
            state.description = data;
        }
    },
    actions: {
        createNewTaskListItem({commit}, data: any) {
            // @ts-ignore
            axios.post(`/api/task/${JSON.stringify([data])}`)
                .then(response => {
                    axios.get('/api/task/')
                })
        }
    },
});

export default store;