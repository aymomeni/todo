<template>
    <b-card
        title="add/edit your task"
    >
        <b-form-group>
            <b-row>
                <b-col>
                    <b-form-input
                        v-model="title"
                        placeholder="Task Title"
                        class="mb-1"
                    > 
                    </b-form-input>

                    <b-form-textarea
                        v-model="description"
                        placeholder="Task Description"
                    >
                    </b-form-textarea>
                </b-col>
                <b-col>
                    <b-row>
                        <b-col>
                                <label for="effort-rating-inline">Effort:</label>
                                <b-form-rating id="effort-rating-inline" inline v-model="value" :locale="locale" color="#ff8800" show-value precision="1" variant="info" size="sm"></b-form-rating>
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
            description: ""
        }
    }
}
</script>

<style scoped>
</style>