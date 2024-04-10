import './assets/main.css'
import 'bootstrap/dist/css/bootstrap.css';
import './assets/scss/global.scss'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(router)

app.mount('#app')
