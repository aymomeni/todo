<template>
    <div>
        <div class="accordion">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-1 variant="dark">add | edit</b-button>
            </b-card-header>
            <b-collapse id="accordion-1" accordion="my-accordion" role="tabpanel">
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
                                    id="task-description"
                                    v-model="description"
                                    placeholder="Task Description"
                                    rows="5"
                                >
                                </b-form-textarea>
                            </b-col>
                            <b-col>
                                <b-form-rating id="effort-rating-inline" color="rgb(64, 192, 128)" v-model="priorityValue" size="md" no-border></b-form-rating>
                                <div class="mb-3" id="priority-label">priority&nbsp;&nbsp;<strong>{{priorityValue}}</strong></div>
                                
                                <b-form-input v-model="effortValue" show-value type="range" min="1" max="12" step="1"></b-form-input>
                                <div class="mb-3" id="effort-label">effort&nbsp;&nbsp;<strong>{{ effortValue }}</strong></div>

                                <div>
                                    <b-form-select v-model="typeSelected" :options="options" class="mb-3" />
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
            title: "",
            description: "",
            priorityValue: 3,
            effortValue: 3,
            typeSelected: 'A',
                options: [
                    { value: 'A', text: 'Daily' },
                    { value: 'B', text: 'Goal' },
                    { value: 'C', text: 'Book or Resource'}
                ]
        }
    }
}
</script>

<style scoped>
#task-title {
    background-color: rgb(235, 255, 244);
}

#task-description {
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