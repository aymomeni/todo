<template>
    <nav class="ml-2 mt-3" aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                <a
                class="page-link"
                href="#"
                aria-label="Previous"
                @click="sendFetchTodosToParent(pagination.prev_page_url)"
                >
                    <span aria-hidden="true">&laquo;</span>
                    <span>Previous</span>
                </a>
            </li>
            <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]">
                <a
                class="page-link"
                href="#"
                aria-label="Next"
                @click="sendFetchTodosToParent(pagination.next_page_url)"
                >
                    <span>Next</span>
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>
<script>
    export default {
        props: {
            pagination: {
                type: Object
            }
        },
        data: function() {
            return { }
        },
        methods: {
            sendFetchTodosToParent(url) {
                this.$emit("fetchTodos", url);
            }
        }
    }
</script>