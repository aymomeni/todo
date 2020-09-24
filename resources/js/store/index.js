import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store ({
    state: {
        isEditing: false,
        taskObject: {
            id: "",
            title: "",
            body: "",
            priority: "",
            effort: "",
            type: ""
        }
    },
    getters: {
        getIsEditing(state) {
            return state => state.isEditing;
        },
        getTaskObject(state) {
            return state => state.taskObject;
        }
    },
    mutations: {
        // setEditing(state, payload) { // not needed
        //     console.log("got here -- setEditing");
        //     state.editing = payload;
        // },
        setIsEditing(state, payload) {
            state.isEditing = payload;
        },
        setTaskObject(state, payload) {
            console.log("got here -- setEditTaskObject");
            console.log(payload);
            state.taskObject.id = payload.id;
            state.taskObject.title = payload.title;
            state.taskObject.body = payload.body;
            state.taskObject.priority = payload.priority;
            state.taskObject.effort = payload.effort;
            state.taskObject.type = payload.type;
        }
    },
    actions: {
        fetchDailyTasks() {
            // maybe worth having all api calls here?
        }
    }
});