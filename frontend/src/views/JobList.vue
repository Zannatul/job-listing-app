<template>
  <div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Available Jobs</h1>

    <div v-if="jobs.length === 0" class="text-gray-500">No jobs available.</div>

    <div
      v-for="job in jobs"
      :key="job.id"
      class="bg-white shadow p-4 mb-4 rounded-lg border border-gray-200"
    >
      <h2 class="text-xl font-semibold text-blue-700 mb-1">{{ job.title }}</h2>
      <p class="text-sm text-gray-600 mb-1">
        <strong>Company:</strong> {{ job.company_name }}
      </p>
      <p class="text-sm text-gray-600 mb-2">{{ job.description }}</p>

      <div class="flex items-center text-sm text-gray-500 space-x-4 mb-3">
        <span>👁 Views: {{ job.view_count }}</span>
        <span>📩 Applications: {{ job.applications }}</span>
      </div>

      <router-link
        :to="`/jobs/${job.id}`"
        class="text-blue-500 hover:underline font-medium"
      >
        View Details →
      </router-link>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { getJobs } from '@/services/jobService'

const jobs = ref([])

onMounted(async () => {
  try {
    const response = await getJobs()
    jobs.value = response.data ?? response // if using Laravel Resource
  } catch (err) {
    console.error('Failed to load jobs:', err)
  }
})
</script>
