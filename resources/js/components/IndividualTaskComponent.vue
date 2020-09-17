<template>
    <div>
        <li class="list-group-item list-item">
            <div class="row">
                <div class="col-sm-10">
                    <h4>{{ todo.title }}</h4>
                    <p>{{ todo.body }}</p>
                </div>
                <div class="col-sm-2">
                    <div class="row pr-3">
                        <button
                            @click="sendEditTodoToParent(todo)"  
                            type="button"
                            class="col-sm mb-1 btn btn-secondary button-styles"
                        >
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="row pr-3">
                        <button type="button" class="col-sm mb-1 btn btn-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="row pr-3">
                        <button
                            @click="sendDeleteTodoToParent(todo.id)"
                            type="button"
                            class="col-sm mb-1 btn btn-danger"
                        >
                            <i class="fa fa-times" aria-hidden="true"></i>
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
        methods: {
            sendEditTodoToParent(todo) {
                console.log("sendEditTodoToParent");
                this.$emit('editTodo', todo);
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

.button-styles {
    height: 2.2 rem;
    opacity: 0.85;
}
</style>