<template>
    <div class="mt-4">
        <div class="row">
            <div class="col-4">
                <div class="card shadow bg-white rounded">
                    <div class="card-header">
                        <h4><i class="fa fa-check-square" aria-hidden="true" style="color:orange"></i> Daily</h4>
                    </div>
                    <div class="list-group list-group-flush" v-for="todo in todos" v-bind:key="todo.id">
                        <li class="list-group-item" style="padding: .5rem .5rem !important; min-height: 180px;">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h4>{{ todo.title }}</h4>
                                    <p> {{ todo.body }}</p>
                                </div>
                                <div class="col-sm-2" style="opacity: 0.85;">
                                    <div class="row pr-3">
                                        <button type="button" class="col-sm mb-1 btn btn-secondary" style="height: 2.2rem;">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="row pr-3">
                                        <button type="button" class="col-sm mb-1 btn btn-success" style="height: 2.2rem;">
                                            <i class="fa fa-check" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="row pr-3">
                                        <button @click="deleteTodos(todo.id)" type="button" class="col-sm mb-1 btn btn-danger" style="height: 2.2rem;">
                                            <i class="fa fa-times" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <nav class="ml-2 mt-3" aria-label="Page navigation">
                        <ul class="pagination">
                            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                                <a class="page-link" href="#" aria-label="Previous"
                                    @click="fetchTodos(pagination.prev_page_url)">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span>Previous</span>
                                </a>
                            </li>
                            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                                <a class="page-link" href="#" aria-label="Next"
                                    @click="fetchTodos(pagination.next_page_url)">
                                    <span>Next</span>
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4">
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
            fetchTodos(page_url) {
                let vm = this;
                page_url = page_url || '/api/todos'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.todos = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }

                this.pagination = pagination;
            },
            deleteTodos(id) {
                if(confirm("Are you sure you want to delete this task?")) {
                    fetch(`/api/todo/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert('Todo task has been removed');
                        this.fetchTodos();
                    })
                    .catch(err => console.log(err));
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
