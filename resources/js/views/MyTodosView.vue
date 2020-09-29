<template>
    <div>
        <NavbarComponent />
        <div class="daily-task-view m-4">
            <taskCreatorHeaderComponent 
                urlTypeMap=urlTypeMap
            class="mt-2" />
            <div class="mt-4">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-3">
                        <TaskListContainer 
                            taskListContainerTitle="Daily Tasks"
                            taskListContainerSubtitle=""
                            taskListHeaderBackgroundColor="#726a95"
                            paginationArrowColor="#16213e"
                            base_url="/api/todo"
                            type="todos"
                        />
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">               
                        <TaskListContainer 
                            taskListContainerTitle="Goals"
                            taskListContainerSubtitle=""
                            taskListHeaderBackgroundColor="#709fb0"
                            paginationArrowColor="#16213e"
                            base_url="/api/goal"
                            type="goal"
                        />
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">               
                        <TaskListContainer 
                            taskListContainerTitle="Books or Resources"
                            taskListContainerSubtitle=""
                            taskListHeaderBackgroundColor="#a0c1b8"
                            paginationArrowColor="#16213e"
                            base_url="/api/bookOrResource"
                            type="bookOrResource"
                        />
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">               
                        <TaskListContainer 
                            taskListContainerTitle="Completed Tasks"
                            taskListContainerSubtitle=""
                            taskListHeaderBackgroundColor="#637373"
                            paginationArrowColor="#16213e"
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
                urlTypeMap: {daily: '/api/todo', goal: '/api/goal', bookOrResource: '/api/bookOrResource'}
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