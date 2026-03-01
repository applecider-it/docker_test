import { createApp } from "vue";
import ReactDOM from "react-dom/client";

import AppReact from "./react/AppReact";
import AppVue from "./vue/AppVue.vue";

import { setupTurboLoad } from "@/services/app/turbo";

const flagId = "app-page-development-javascript-test2";

const test = () => {
  console.log("test 2");
};

const setup = () => {
  console.log("init 2");

  createApp(AppVue).mount("#vue");

  ReactDOM.createRoot(document.getElementById("react")).render(<AppReact />);

  document.addEventListener("click", test);
};

const clear = () => {
  console.log("unload 2");

  document.removeEventListener("click", test);
};

setupTurboLoad(flagId, setup, clear);
