<template>
    <div>
        <NavbarComponent />
        <div class="container">
            <div class="mt-4">
                <div class="row">
                    <div class="col-4">
                        <DailyTasksContainerComponent />
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NavbarComponent from '../components/NavbarComponent';
    import DailyTasksContainerComponent from '../components/DailyTasksContainerComponent';

    export default {
        components: {
            NavbarComponent,
            DailyTasksContainerComponent
        },
        data() {
            return { }
        },
        created() {
        },
        methods: { }
    }
</script>