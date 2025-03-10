import axios, { AxiosInstance } from 'axios';

const baseUrl: string = import.meta.env.VITE_BASE_URL;

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

const apiRequest: AxiosInstance = axios.create({
    baseURL: baseUrl + 'api/',
    timeout: 1000,
});

const sanctumRequest: AxiosInstance = axios.create({
   baseURL: baseUrl,
   timeout: 1000,
});

export { apiRequest, sanctumRequest };
