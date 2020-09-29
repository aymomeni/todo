<template>
    <nav class="mt-3" aria-label="Page navigation">
        <ul class="pagination mb-0 justify-content-center">
            <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                <a
                class="page-link border-0"
                href="#"
                aria-label="Previous"
                @click="sendFetchTodosToParent(pagination.prev_page_url)"
                >
                    <span aria-hidden="true">&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</span>
                </a>
            </li>
            <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]">
                <a
                class="page-link border-0"
                href="#"
                :style="{'color': paginationArrowColor }"
                aria-label="Next"
                @click="sendFetchTodosToParent(pagination.next_page_url)"
                >
                    <span aria-hidden="true">&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i></span>
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
            },
            paginationArrowColor: {
                type: String
            }
        },
        methods: {
            sendFetchTodosToParent(url) {
                this.$emit("fetchTodos", url);
            }
        }
    }
</script>

<style scoped>
.page-link {
    background-color: transparent !important;
}
</style>
