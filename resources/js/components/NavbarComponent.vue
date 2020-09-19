<template>

<div>
  <b-navbar toggleable="lg" type="dark" variant="dark">
    <b-navbar-brand href="#"><i class="fa fa-circle" id="font-awesome-icon" aria-hidden="true"/>&nbsp;&nbsp;myTodos</b-navbar-brand>

    <b-navbar-nav class="ml-auto">
            <b-navbar-nav>
                <b-nav-item-dropdown right>
                    <!-- Using 'button-content' slot -->
                    <template v-slot:button-content>
                        <em>more</em>
                    </template>
                    <b-dropdown-item href="#">Readme</b-dropdown-item>
                    <b-dropdown-item href="#" disabled>About</b-dropdown-item>
                    <b-dropdown-item href="#" disabled>Sign Out</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
    </b-navbar-nav>
  </b-navbar>
</div>
</template>

<script>
    export default {
        data () {
            return {}
        }
    }
</script>

<style scoped>
    #font-awesome-icon {
        color: green;
    }
</style>