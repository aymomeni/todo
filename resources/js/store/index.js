import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store ({
    state: {
        taskObject: {
            editing: false,
            id: "",
            title: "",
            body: "",
            priority: "",
            effort: "",
            type: ""
        }
    },
    getters: {
        getTaskObject(state) {
            return state => state.taskObject;
        }
    },
    mutations: {
        setEditing(state, payload) { // not needed
            console.log("got here -- setEditing");
            state.editing = payload;
        },
        setTaskObject(state, payload) {
            console.log("got here -- setEditTaskObject");
            state.taskObject = payload;
        }
    },
    actions: {
        fetchDailyTasks() {
            // maybe worth having all api calls here?
        }
    }
});