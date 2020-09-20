<template>
    <div>
        <NavbarComponent />
        <div class="daily-task-view">
            <taskCreatorHeaderComponent class="mt-2" />
            <div class="mt-4">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-4 mt-2">
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
    // import ReadmeComponent from '../components/readmeComponents/ReadmeComponent';
    import TaskCreatorHeaderComponent from '../components/taskCreatorHeaderComponents/taskCreatorHeaderComponent';
    import DailyTasksContainerComponent from '../components/DailyTasksContainerComponent';

    export default {
        components: {
            NavbarComponent,
            DailyTasksContainerComponent,
            TaskCreatorHeaderComponent
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