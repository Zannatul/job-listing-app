import axios from 'axios'

const API = import.meta.env.VITE_API_BASE_URL

export const getJobs = async () => {
  return await axios.get(`${API}/jobs`)
}

export const getJob = async (id) => {
  return await axios.get(`${API}/jobs/${id}`)
}

export const applyToJob = async (id, name, email) => {
  return await axios.post(`${API}/jobs/${id}/apply`, {
    name,
    email
  })
}