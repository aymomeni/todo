<template>
  <div class="card shadow bg-white rounded">
    <div class="card-header">
      <h4>
        <i class="fa fa-check-square" aria-hidden="true" style="color:orange"></i> Daily
      </h4>
    </div>

    <div class="list-group list-group-flush" v-for="todo in todos" v-bind:key="todo.id">
      <IndividualTaskComponent 
	  	@deleteTodos="deleteTodos" 
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
    deleteTodos(id) {
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
  },
};
</script>