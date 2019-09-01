<template>
    <div>
        <task v-for="task in tasks" :key="task.title">
            <template slot="header">
                <span class="text-bold">{{ task.title }}</span>
            </template>
            <template slot="body">{{ task.description }}</template>
        </task>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [
                    {title: 'Arrumar o quarto', description: 'Arrumar quantodkaspod asopd asopdk asopd opas dop  p eio  dpw', completed: true},
                    {title: 'Comer', description: 'dias90d as90d as90d as90di as90d as90d as90d as90d as90asd 90', completed: true},
                    {title: 'Dormir', description: 'dkasop dpasodk asopk dopas dasop daopsd poas daopdsk aopsd ap', completed: false},
                ]
            }
        },
        /*
        computed: {
            completeTasks() {
                return this.tasks.filter(task => task.completed)
            },
            imcompleteTasks() {
                return this.tasks.filter(task => !task.completed)
            }
        }
        */
    }
</script>
