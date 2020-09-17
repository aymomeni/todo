<template>
  <div class="card shadow bg-white rounded">
    <div class="card-header">
      <h4>
        <i id="fontawesome-icon-header" class="fa fa-check-square" aria-hidden="true"></i> Daily
      </h4>
    </div>
    <form @submit.prevent="addTodo" class="mb-3 p-2">
      <div class="form-group"> 
        <input type="text" class="form-control mb-1" placeholder="Title"
        v-model="todo.title">
                <input type="text" class="form-control" placeholder="Body"
        v-model="todo.body">
      </div>
      <button type="submit" class="btn btn-dark btn-block">Save</button>
    </form>
    <div class="list-group list-group-flush" v-for="todo in todos" v-bind:key="todo.id">
      <IndividualTaskComponent 
        @deleteTodo="deleteTodo"
        @editTodo="editTodo" 
        :todo="todo" />
    </div>
    <PaginationComponent 
      @fetchTodos="fetchTodos" 
      :pagination="pagination" />
  </div>
</template>

<script>
import PaginationComponent from "./PaginationComponent";
import IndividualTaskComponent from "./IndividualTaskComponent";

export default {
  components: {
    PaginationComponent,
    IndividualTaskComponent
  },
  data: function () {
    return {
      todos: [],
      todo: {
        id: '',
        title: '',
        body: '',
        completed: '',
        effort: '',
        priority: ''
      },
      todo_id: '',
      pagination: {},
      edit: false,
    };
  },
  created() {
    this.fetchTodos();
  },
  methods: {
    fetchTodos(page_url) {
      let vm = this;
      page_url = page_url || "/api/todos";
      fetch(page_url)
        .then((res) => res.json())
        .then((res) => {
          this.todos = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch((err) => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    },
    deleteTodo(id) {
      if (confirm("Are you sure you want to delete this task?")) {
        fetch(`/api/todo/${id}`, {
          method: "delete",
        })
          .then((res) => res.json())
          .then((data) => {
            alert("Todo task has been removed");
            this.fetchTodos();
          })
          .catch((err) => console.log(err));
      }
    },
    addTodo() {
      if(this.edit === false) {

        // if completed or any other fields are empty fill
        // TODO: this must be changed
        this.todo.completed = 0;
        this.todo.effort = 10;
        this.todo.priority = 1;

        // add
        fetch('api/todo', {
          method: 'post',
          body: JSON.stringify(this.todo),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
          .then(data => {
            this.todo.title = '';
            this.todo.body = '';
            this.todo.completed = '';
            this.todo.effort = '';
            this.todo.priority = '';
            alert('todo added');
            this.fetchTodos();
        })
      } else {
          // update
          fetch('api/todo', {
          method: 'put',
          body: JSON.stringify(this.todo),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.todo.title = '';
          this.todo.body = '';
          this.todo.completed = '';
          this.todo.effort = '';
          this.todo.priority = '';
          alert('todo edited');
          this.fetchTodos();
        })
        .catch(err => console.log(err));
      }
    },
    editTodo(todo) {
      console.log("edit to do called");
      this.edit = true;
      this.todo.id = todo.id;
      this.todo.todo_id = todo.id;
      this.todo.title = todo.title;
      this.todo.body = todo.body;
      this.todo.completed = todo.completed;
      this.todo.effort = todo.effort;
      this.todo.priority = todo.priority;
    }
  },
};
</script>

<style scoped>
#fontawesome-icon-header {
  color: orange;
}
</style>