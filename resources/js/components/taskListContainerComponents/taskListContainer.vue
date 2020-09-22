<template>
  <div class="card shadow bg-white rounded">
    <div class="card-header">
      <h4><i id="fontawesome-icon-header" class="fa fa-check-square" aria-hidden="true"></i> {{ taskListContainerTitle }}</h4>
    </div>
    <form @submit.prevent="addTodo" class="mb-3 p-2">
      <div class="form-group"> 
        <input type="text" class="form-control mb-1" placeholder="Task Title" v-model="todo.title">
        <textarea class="form-control" placeholder="Task Description" rows="3" v-model="todo.body"></textarea>
      </div>
      <button type="submit" class="btn btn-dark btn-block">Save</button>
    </form>
    <div class="list-group list-group-flush" v-for="todo in todos" v-bind:key="todo.id">
      <IndividualTaskComponent 
        @deleteTodo="deleteTodo"
        @editTodo="editTodo"
        @completedTodo="completedTodo"
        :todo="todo" />
    </div>
    <PaginationComponent 
      @fetchTodos="fetchTodos" 
      :pagination="pagination" />
  </div>
</template>

<script>
import IndividualTaskComponent from "./IndividualTaskComponent";
import PaginationComponent from "./PaginationComponent";

export default {
  components: {
    IndividualTaskComponent,
    PaginationComponent
  },
  props: {
    taskListContainerTitle: {
      type: String,
      required: true
    },
    base_url: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      required: true
    }
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

        // below are dummy values attempted effort and priority for tasks
        // but ran out of time (perhaps will be added in the future)
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
            this.clearThisTodo()
            alert('Your task has been added.');
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
          this.clearThisTodo();
          alert('Your task was edited!');
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
    },
    completedTodo(todo) {
      console.log("completed todo called");
      this.edit = true;
      todo.todo_id = todo.id;

      fetch('api/todo', {
        method: 'put',
        body: JSON.stringify(todo),
        headers: {
          'content-type': 'application/json'
        }
      })
        .then(res => res.json())
        .then(data => {
          alert("Good job for completing your Task!")
        })
        .catch(err => console.log(err));
    },
    clearThisTodo() {
      this.todo.title = '';
      this.todo.body = '';
      this.todo.completed = '';
      this.todo.effort = '';
      this.todo.priority = '';
    }
  },
};
</script>

<style scoped>
#fontawesome-icon-header {
  color: orange;
}
</style>