import { createApp } from "vue";
import Counter from "./components/Counter.vue";

const app = createApp({
  components: {
	Counter
  }
});
app.component("Counter", Counter);
app.mount("#app");
