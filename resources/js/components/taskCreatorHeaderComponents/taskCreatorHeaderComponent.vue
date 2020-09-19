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
                                <b-form-text class="ml-1 mb-3">priority&nbsp;&nbsp;<strong>{{priorityValue}}</strong></b-form-text>
                                
                                <b-form-input v-model="effortValue" show-value type="range" min="1" max="12" step="1"></b-form-input>
                                <b-form-text class="ml-1 mb-3">effort&nbsp;&nbsp;<strong>{{ effortValue }}</strong></b-form-text>

                                <div>
                                    <b-form-select v-model="typeSelected" :options="options" class="mb-3">
                                        <!-- This slot appears above the options from 'options' prop -->
                                        <!-- <template v-slot:first>
                                            <b-form-select-option :value="null" disabled>-- select the type of task --</b-form-select-option>
                                        </template> -->
                                    </b-form-select>
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


#save-button {
    color: rgb(116, 204, 153);
}
</style>