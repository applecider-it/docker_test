import { createApp } from "vue";
import ReactDOM from "react-dom/client";

import AppReact from "./react/AppReact";
import AppVue from "./vue/AppVue.vue";

createApp(AppVue).mount("#vue");

ReactDOM.createRoot(document.getElementById("react")!).render(<AppReact />);
