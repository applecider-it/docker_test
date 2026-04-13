import { setupTurboContainer } from "@/services/turbo/turbo";

console.log("setup turbo");

const clickTest = () => {
  console.log("click");
};

setupTurboContainer(
  "app-page-container-turbo",
  (el) => {
    console.log("turbo mounted");

    el.innerText = "テスト";

    window.addEventListener("click", clickTest);
  },
  (el) => {
    console.log("turbo unmounted");

    window.removeEventListener("click", clickTest);
  }
);
