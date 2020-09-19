<template>
    <div>
        <NavbarComponent />
        <div class="container daily-task-view">
            <div class="mt-4">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-4 mt-4">
                        <DailyTasksContainerComponent />
                    </div>
                    <div class="col-12 col-sm-12 col-lg-8 readme">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NavbarComponent from '../components/NavbarComponent';
    import ReadmeComponent from '../components/readmeComponent/ReadmeComponent';
    import DailyTasksContainerComponent from '../components/DailyTasksContainerComponent';

    export default {
        components: {
            NavbarComponent,
            DailyTasksContainerComponent,
            ReadmeComponent
        }
    }
</script>

<style scoped>
.daily-task-view {
    color: dimgrey;
}
.readme-list {
    font-size: 1.2rem;
}
.list-item {
    margin-top: .8rem;
}
.readme {
    margin-top: 2rem;
}
</style>