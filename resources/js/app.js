import { createApp } from "vue"; //vue from library
import Create from "./views/Create.vue";

// Import Bootstrap CSS & JS
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import Home from "./views/Home.vue";
import Navbar from "./components/Navbar.vue";
import router from "./router";

const app = createApp();
app.use(router);



app.component("Navbar", Navbar);
app.component("Create", Create);
app.component("Home", Home);

app.mount("#app");
