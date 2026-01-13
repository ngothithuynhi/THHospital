import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import Default from './layout/wrapper/admin.vue'
import Blank from './layout/wrapper/Blank.vue'
const app = createApp(App)

app.use(router)
app.component("default-layout", Default);
app.component("blank-layout", Blank);

app.mount("#app")