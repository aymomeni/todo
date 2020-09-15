<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="height: 900px">
                    <div class="card-header">
                        <h4><i class="fa fa-check-square" aria-hidden="true" style="color:orange"></i> Daily</h4>
                    </div>
                    <div class="list-group list-group-flush" v-for="todo in todos" v-bind:key="todo.id">
                        <li class="list-group-item">
                            <h5>{{ todo.title }}</h5>
                            <p> {{ todo.body }} </p>
                            <div class="row">
                                <button type="button" class="col-sm m-1 btn btn-secondary" style="height: 2.2rem;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                <button type="button" class="col-sm m-1 btn btn-success" style="height: 2.2rem;"><i class="fa fa-check" aria-hidden="true"></i></button>
                                <button type="button" class="col-sm m-1 btn btn-danger" style="height: 2.2rem;"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todos: [],
                todo: {
                    id: '',
                    title: '',
                    body: ''
                },
                todo_id: '',
                pagination: {},
                edit: false
            }
        },
        created() {
            this.fetchTodos();
        },
        methods: {
            fetchTodos() {
                fetch('api/todos')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res.data);
                        this.todos = res.data;
                    });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
