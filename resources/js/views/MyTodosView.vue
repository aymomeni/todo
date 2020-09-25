<template>
    <div>
        <NavbarComponent />
        <div class="daily-task-view">
            <taskCreatorHeaderComponent class="mt-2" />
            <div class="mt-4">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-3">
                        <TaskListContainer 
                            taskListContainerTitle="Daily Tasks"
                            base_url="/api/todo"
                            type="todos"
                        />
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">               
                        <TaskListContainer 
                            taskListContainerTitle="Goals"
                            base_url="/api/goal"
                            type="goal"
                        />
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">               
                        <TaskListContainer 
                            taskListContainerTitle="Books or Resources"
                            base_url="/api/bookOrResource"
                            type="bookOrResource"
                        />
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">               
                        <TaskListContainer 
                            taskListContainerTitle="Completed Tasks"
                            base_url="/api/completedtask"
                            type="completed"
                        />
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
    import TaskListContainer from '../components/taskListContainerComponents/taskListContainer';

    export default {
        components: {
            NavbarComponent,
            DailyTasksContainerComponent,
            TaskCreatorHeaderComponent,
            TaskListContainer
        },
        data: () => {
            return {
                
            }
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