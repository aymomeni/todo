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
                        <h2>readme:</h2>
                        <div class="readme-list">
                            <ul>
                                <li class="list-item"><strong>create a new task</strong> by filling out the form and <strong>clicking save</strong>. This will persist the task for future lookups.</li>
                                <li class="list-item"><strong>edit</strong> a task with the <strong>grey pencil button</strong>. Change what's needed in the form and <strong>save</strong> to persist it.</li>
                                <li class="list-item">click the <strong>green checkmark button</strong> to mark a task as done.</li>
                                <li class="list-item">note after something is marked done editing and clicking the complete button won't be allowed.</li>
                                <li class="list-item">deleting items is straight forward. Click the <strong>red x button</strong> and the task will be removed.</li>
                                <li class="list-item"><strong>paging</strong> functionality in case there is more than 3 tasks.</li>
                            </ul>
                        </div>
                        <h4 style="margin-top: 2rem">resources:</h4>
                        <div class="readme-list">
                            <ul>
                                <li class="list-item"><strong>basic PHP:</strong> PHP Foundations (Jill Gundersen) Pluralsight </li>
                                <li class="list-item"><strong>setting up the xampp stack and work environment / deploying on heroku:</strong> Laravel PHP Framework and Vue.js (Eding Muhamad Saprudin) Udemy</li>
                                <li class="list-item"><strong>frontend / backend setup:</strong> Traversy Media Youtube</li>
                                <li class="list-item"><strong>laravel documentation</strong></li>
                            </ul>
                        </div>
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