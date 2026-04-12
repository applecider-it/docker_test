import { turboSetup } from "./turbo/turbo-common";

console.log("setup turbo2");

const mounted = (el: HTMLElement) => {
  console.log("turbo2 mounted");

  el.innerText = "テスト2";
};

const unmounted = (el: HTMLElement) => {
  console.log("turbo2 unmounted");
};

turboSetup("app-page-container-turbo2", mounted, unmounted);
