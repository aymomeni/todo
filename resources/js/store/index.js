import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store ({
    state: {
        // used when currently editing is going on
        onEditTask: false,

        // used for cross component task object transfers
        taskObject: {
            id: null,
            title: null,
            body: null,
            priority: null,
            effort: null,
            type: null
        }
    },
    getters: {
        getOnEditTask(state) {
            return state.onEditTask;
        },
        getTaskObject(state) {
            return state.taskObject;
        }
    },
    mutations: {
        setOnEditTask(state, payload) {
            state.onEditTask = payload;
        },
        setTaskObject(state, payload) {
            state.taskObject.id = payload.id;
            state.taskObject.title = payload.title;
            state.taskObject.body = payload.body;
            state.taskObject.priority = payload.priority;
            state.taskObject.effort = payload.effort;
            state.taskObject.type = payload.type;
        },
        clearTaskObject(state) {
            state.taskObject = {
                id: null,
                title: null,
                body: null,
                priority: null,
                effort: null,
                type: null
            }
        }
    },
    actions: {
        fetchDailyTasks() {
            // api call?
        },
        addTask() {
            // api call?
        }
    }
});