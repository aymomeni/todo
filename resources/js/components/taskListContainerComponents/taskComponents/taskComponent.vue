<template>
    <div>
        <li class="list-group-item list-item">
            <div class="row">
                <div class="col-12 col-sm-9">
                    <div v-bind:class="{'priority-indicator-one': todo.priority == 1, 'priority-indicator-two': todo.priority == 2, 
                    'priority-indicator-three': todo.priority == 3, 'priority-indicator-four': todo.priority == 4, 'priority-indicator-five': todo.priority == 5}">
                        <h4 v-bind:class="{'crossed-out': todo.completed}">{{ todo.title }}</h4>
                        <p v-bind:class="{'crossed-out': todo.completed}">{{ todo.body }}</p>
                        <p>effort: {{todo.effort}} </p>
                        <p>priority: {{todo.priority}} </p>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div>
                        <button
                            @click="sendEditTodoToParent(todo)"  
                            type="button"
                            class="btn mb-1 btn-secondary btn-block"
                            v-bind:class="{'disabled': todo.completed}"
                        >
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div>
                        <button 
                        @click="sendEditTodoCompletedToParent(todo) && !todo.completed"
                        type="button" 
                        class="btn mb-1 btn-success btn-block" 
                        v-bind:class="{'disabled': todo.completed}"
                        >
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div>
                        <button
                            @click="sendDeleteTodoToParent(todo.id)"
                            type="button"
                            class="btn mb-1 btn-danger btn-block"
                        >
                            <i class="fa fa-times" aria-hidden="true" style="width: 1rem"></i>
                        </button>
                    </div>
                </div>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        props: {
            todo: {
            type: Object,
                default() {
                    return {
                        title: "N/A",
                        body: "N/A"
                    }
                }
            }
        },
        data: () => {
            return {
                priority_color_green: ""
            }
        },
        methods: {
            sendEditTodoToParent(todo) {
                if(!todo.completed) {
                    console.log("sendEditTodoToParent");
                    this.$emit('editTodo', todo);
                }
            },
            sendEditTodoCompletedToParent(todo) {
                console.log("sendEditTodoCompletedToParent");
                if(!todo.completed) {
                    todo.completed = true;
                    this.$emit('completedTodo', todo);
                }
            },
            sendDeleteTodoToParent(id) {
                console.log("sendDeleteTodoToParent");
                this.$emit('deleteTodo', id);
            }
        }
    }
</script>

<style scoped>
.list-item {
    padding: .5rem .5rem !important; 
    min-height: 180px;
}
.crossed-out {
    text-decoration:line-through !important;
}

.priority-indicator-one {
    border-left: 4px solid rgb(51,153,0);
    border-radius: 2px;
    padding-left: 1rem;
}

.priority-indicator-two {
    border-left: 4px solid rgb(153,204,51);
    border-radius: 2px;
    padding-left: 1rem;
}

.priority-indicator-three {
    border-left: 4px solid rgb(255,204,0);
    border-radius: 2px;
    padding-left: 1rem;
}

.priority-indicator-four {
    border-left: 4px solid rgb(255,153,102);
    border-radius: 2px;
    padding-left: 1rem;
}

.priority-indicator-five {
    border-left: 4px solid rgb(204,51,0);
    border-radius: 2px;
    padding-left: 1rem;
}
</style>