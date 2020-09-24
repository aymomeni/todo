export default {
    state: {
        editing: false,
        edit: {
            id: "",
            title: "",
            body: "",
            priority: "",
            effort: "",
            type: ""
        }
    },
    getters: {
        getEditing(state) {
            return state => state.editing;
        } 
    },
    mutations: {
        setEditing(state, payload) {
            console.log("got here -- setEditing");
            state.editing = payload;
        }
    },
    actions: {
        fetchDailyTasks() {
            // maybe worth having all api calls here?
        }
    }
};