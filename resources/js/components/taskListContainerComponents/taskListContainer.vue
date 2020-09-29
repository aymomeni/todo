<template>
  <div class="card shadow bg-white rounded">
    <!-- <div class="card-header">
      <h4><i id="fontawesome-icon-header" class="fa fa-check-square" aria-hidden="true"></i> {{ taskListContainerTitle }}</h4>
    </div> -->
    <!-- <form @submit.prevent="addTodo" class="mb-3 p-2">
      <div class="form-group"> 
        <input type="text" class="form-control mb-1" placeholder="Task Title" v-model="todo.title">
        <textarea class="form-control" placeholder="Task Description" rows="3" v-model="todo.body"></textarea>
      </div>
      <button type="submit" class="btn btn-dark btn-block">Save</button>
    </form> -->
    <b-card
      :title=taskListContainerTitle
      :style="{'background-color': taskListHeaderBackgroundColor, 'color': 'white'}"
    >
      <b-card-text>Some quick example text to build on the card title and make up the bulk of the card's content.</b-card-text>
      <PaginationComponent 
        @fetchTodos="fetchTodos" 
        :pagination="pagination"
        :paginationArrowColor=paginationArrowColor 
      />
    </b-card>

    <div class="list-group list-group-flush" v-for="todo in todos" v-bind:key="todo.id">
      <TaskComponent 
        @deleteTodo="deleteTodo"
        @editTodo="editTodo"
        @completedTodo="completedTodo"
        :todo="todo" />
    </div>
  </div>
</template>

<script>
import TaskComponent from "./taskComponents/taskComponent";
import PaginationComponent from "./paginationComponents/paginationComponent";

export default {
  components: {
    TaskComponent,
    PaginationComponent
  },
  props: {
    taskListContainerTitle: {
      type: String,
      required: true
    },
    taskListHeaderBackgroundColor: {
      type: String,
      required: true
    },
    paginationArrowColor: {
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
        priority: '',
        type: ''
      },
      todo_id: '',
      pagination: {},
      edit: false,
    };
  },
  created() {
    this.fetchTodos();
    console.log(this.base_url); // delete later
  },
  methods: {
    fetchTodos(page_url) {
      let vm = this;
      page_url = page_url || this.base_url;
      console.log("page_url");
      console.log(page_url);
      fetch(page_url)
        .then((res) => res.json())
        .then((res) => {
          console.log(res.data);
          res.data.forEach(task => {
            // console.log(task);
            task.type = this.type;
          });
          this.todos = res.data;
          // console.log(this.todos);
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
        fetch(this.base_url + `/${id}`, {
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
        fetch(this.base_url, {
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
          fetch(this.base_url, {
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

      fetch(this.base_url, {
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