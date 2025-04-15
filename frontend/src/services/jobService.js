import axios from 'axios'

const API = 'http://localhost:8010/api'

export const getJobs = async () => {
  return await axios.get(`${API}/jobs`)
}

export const getJob = async (id) => {
  return await axios.get(`${API}/jobs/${id}`)
}

export const applyToJob = async (id, payload) => {
  return await axios.post(`${API}/jobs/${id}/apply`, payload)
}