<template>
    <div>
        <div class="accordion">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-1 variant="dark">add | edit</b-button>
            </b-card-header>
            <b-collapse id="accordion-1" :visible="isEditing" accordion="my-accordion" role="tabpanel">
                <b-card>
                    <b-form-group>
                        <b-row>
                            <b-col>
                                <b-form-input
                                    id="task-title"
                                    v-model="title"
                                    placeholder="Task Title"
                                    class="mb-2"
                                > 
                                </b-form-input>

                                <b-form-textarea
                                    id="task-body"
                                    v-model="body"
                                    placeholder="Task description"
                                    rows="5"
                                >
                                </b-form-textarea>
                            </b-col>
                            <b-col>
                                <b-form-rating id="effort-rating-inline" :color="priorityColor(priority)" v-model="priority" size="md" no-border></b-form-rating>
                                <div class="mb-3" id="priority-label">priority&nbsp;&nbsp;<strong>{{priority}}</strong></div>
                                
                                <b-form-input v-model="effort" show-value type="range" min="1" max="12" step="1"></b-form-input>
                                <div class="mb-3" id="effort-label">effort&nbsp;&nbsp;<strong>{{ effort }}</strong></div>

                                <div>
                                    <b-form-select disabled v-model="typeSelected" :options="options" class="mb-3" />
                                    <div class="mt-3">Selected: <strong>{{ typeSelected }}</strong></div>
                                </div>
                            </b-col>
                        </b-row>
                    </b-form-group>
                    <b-button id="save-button" variant="light" block><strong>Save</strong></b-button>
                </b-card>
            </b-collapse>
        </div>
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            accordionVisible: false, // dictates whether accordion is expanded or not
            id: "",
            title: "",
            body: "",
            priority: 1,
            effort: 3,
            typeSelected: 'A',
                options: [
                    { value: 'A', text: 'Daily' },
                    { value: 'B', text: 'Goal' },
                    { value: 'C', text: 'Book or Resource'}
                ],
            editTask: {
                id: "",
                title: "",
                body: "",
                priority: "",
                effort: "",
                type: ""
            }
        }
    },
    created() {
        console.log(this.$store);
        // listening to when edit-task is called
        // EventBus.$on('edit-task', (payload) => {
        //     console.log("edit-task received");
        //     this.accordionVisible = true;
        //     this.title = payload.title;
        //     this.description = payload.body;
        //     this.effortValue = payload.effort;
        //     this.priority = payload.priority;
        // });
    },
    beforeDestroy() {
        // // cleanup
        // this.$eventBus.$off('edit-task');
    },
    methods: {
        priorityColor: (priorityValue) => {
            switch (priorityValue) {
                case 1:
                    return "rgb(51,153,0)";
                case 2:
                    return "rgb(153,204,51)";
                case 3:
                    return "rgb(255,204,0)";
                case 4:
                    return "rgb(255,153,102)";
                case 5:
                    return "rgb(204,51,0)";
                default:
                    return "rgb(64, 192, 128)";
            }
        },
        saveTask: () => {
            // persist the task through api call
        }
    },
    computed: {
        getTaskObject: function () {
            // console.log($store.getters.getEditing);
            return this.$store.getters.getTaskObject;
        },
        isEditing: function () {
            console.log(this.$store.getters.getIsEditing);
            if(this.$store.state.isEditing == true) {
                console.log("isEditing");
                let tempEditObj = this.$store.state.taskObject;
                console.log("tempEditObj");
                console.log(tempEditObj);
                this.id = tempEditObj.id;
                this.title = tempEditObj.title;
                this.body = tempEditObj.body;
                this.priority = tempEditObj.priority;
                this.effort = tempEditObj.effort;
                // this.type = tempEditObject.type; TODO: add type later
                return true;
            }
            return false;
        }
    }
}
</script>

<style scoped>
#task-title {
    background-color: rgb(235, 255, 244);
}

#task-body {
    background-color: rgb(235, 255, 244);

}

#effort-numeric-value-label {
    font-size: 1.5rem;
}

#effort-lable {
    font-size: 1.5;
}

#priority-label {
    font-size: 1.5;
}

#save-button {
    color: rgb(116, 204, 153);
}
</style>