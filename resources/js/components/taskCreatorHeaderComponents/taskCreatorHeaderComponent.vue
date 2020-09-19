<template>
    <b-card>
        <b-form-group>
            <b-row>
                <b-col>
                    <b-form-input
                        id="task-title"
                        v-model="title"
                        placeholder="Task Title"
                        class="mb-1"
                    > 
                    </b-form-input>

                    <b-form-textarea
                        id="task-description"
                        v-model="description"
                        placeholder="Task Description"
                    >
                    </b-form-textarea>
                </b-col>
                <b-col>
                    <b-row>
                        <b-col>
                            <b-form-rating id="effort-rating-inline" color="rgb(64, 192, 128)" show-value v-model="priorityValue" size="sm" no-border></b-form-rating>
                            <b-form-text class="ml-1">priority</b-form-text>
                            
                            <b-form-input id="range-2" v-model="effortValue" show-value type="range" min="1" max="12" step="1"></b-form-input>
                            <b-form-text class="ml-1">
                                effort&nbsp;&nbsp;<strong>{{ effortValue }}</strong>
                                <b-form-text id="effortValue-label"></b-form-text>
                            </b-form-text>
                        </b-col>
                        <b-col>

                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
        </b-form-group>

    </b-card>
</template>

<script>
export default {
    
    data: () => {
        return {
            title: "",
            description: "",
            priorityValue: 3,
            effortValue: 6
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
</style>