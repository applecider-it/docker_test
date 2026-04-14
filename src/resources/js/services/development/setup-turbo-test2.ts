import { turboCtrl } from "@/services/turbo/turbo";

console.log("setup turbo2");

turboCtrl.setupTurboContainer(
  "app-page-container-development-turbo2",
  (el) => {
    console.log("turbo2 mounted");

    el.innerText = "テスト2";
  },
  (el) => {
    console.log("turbo2 unmounted");
  },
);
