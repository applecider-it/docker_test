import { setupTurboContainer } from "@/services/app/turbo";

console.log("setup turbo2");

setupTurboContainer(
  "app-page-container-turbo2",
  (el) => {
    console.log("turbo2 mounted");

    el.innerText = "テスト2";
  },
  (el) => {
    console.log("turbo2 unmounted");
  }
);
