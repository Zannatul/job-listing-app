import { createRouter, createWebHistory } from 'vue-router'
import JobList from '../views/JobList.vue'
import JobDetail from '../views/JobDetail.vue'

const routes = [
    { path: '/', name: 'jobs.index', component: JobList },
    { path: '/jobs/:id', name: 'jobs.show', component: JobDetail, props: true },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
