<template>
  <div class="container mx-auto px-4 py-6">
    <div v-if="loading" class="text-gray-500">Loading job details...</div>
    <div v-else-if="error" class="text-red-600">{{ error }}</div>
    <div v-else class="bg-white shadow p-6 rounded-lg border border-gray-200">
      <!-- Job Info -->
      <h1 class="text-2xl font-bold text-blue-700 mb-4">{{ job.title }}</h1>
      <p class="text-gray-700 mb-2"><strong>Company:</strong> {{ job.company_name }}</p>
      <p class="text-gray-600 mb-4">{{ job.description }}</p>

      <div class="text-sm text-gray-500 space-x-4 mb-6">
        <span>👁 Views: {{ job.view_count }}</span>
        <span>📩 Applications: {{ job.applications }}</span>
      </div>

      <!-- Apply Button -->
      <div v-if="!showForm">
        <button @click="showForm = true" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
          Apply Now
        </button>
      </div>

      <!-- Apply Form -->
      <form v-if="showForm" @submit.prevent="applyForJob" class="mt-6 space-y-3">
  <label class="block">
    <span class="text-gray-700">Your Name</span>
    <input
      v-model="name"
      type="text"
      required
      placeholder="John Doe"
      class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"
    />
  </label>

  <label class="block">
    <span class="text-gray-700">Your Email</span>
    <input
      v-model="email"
      type="email"
      required
      placeholder="you@example.com"
      class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"
    />
  </label>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    Submit Application
  </button>

  <p v-if="successMessage" class="text-green-600">{{ successMessage }}</p>
  <p v-if="applyError" class="text-red-600">{{ applyError }}</p>
</form>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
import { getJob } from '@/services/jobService'
import axios from 'axios'

const route = useRoute()

const job = ref({})
const loading = ref(true)
const error = ref('')
const showForm = ref(false)
const email = ref('')
const name = ref('')
const successMessage = ref('')
const applyError = ref('')

onMounted(async () => {
  try {
    const response = await getJob(route.params.id)
    job.value = response.data ?? response
  } catch (err) {
    error.value = 'Failed to load job.'
  } finally {
    loading.value = false
  }
})

const applyForJob = async () => {
  successMessage.value = ''
  applyError.value = ''

  try {
    const response = await axios.post(`http://localhost:8010/api/jobs/${route.params.id}/apply`, {
      name: name.value,
      email: email.value
    })

    successMessage.value = response.data.message
    job.value.applications++
    showForm.value = false
    name.value = ''
    email.value = ''
  } catch (err) {
    applyError.value = err.response?.data?.message || 'Application failed.'
  }
}

</script>
