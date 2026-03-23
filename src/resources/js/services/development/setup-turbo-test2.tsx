import { setupTurboLoad } from "@/services/app/turbo";

console.log('test2 code')

const flagId = "app-page-development-turbo-test2";

const test = () => {
  console.log("test2 click");
};

const setup = () => {
  console.log("test2 init");

  document.addEventListener("click", test);
};

const clear = () => {
  console.log("test2 unload");

  document.removeEventListener("click", test);
};

setupTurboLoad(flagId, setup, clear);
