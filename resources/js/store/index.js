import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store ({
    state: {
        editing: false,
        editTaskObject: {
            id: "",
            title: "",
            body: "",
            priority: "",
            effort: "",
            type: ""
        }
    },
    getters: {
        getEditing: state => {
            return state.editing;
        },
        getEditTaskObject(state) {
            return state => state.editTaskObject;
        }
    },
    mutations: {
        setEditing(state, payload) {
            console.log("got here -- setEditing");
            state.editing = payload;
        },
        setEditTaskObject(state, payload) {
            console.log("got here -- setEditTaskObject");
            state.editTaskObject = payload;
        }
    },
    actions: {
        fetchDailyTasks() {
            // maybe worth having all api calls here?
        }
    }
});