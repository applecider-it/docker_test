import { setupTurboLoad } from "@/services/app/turbo";

console.log('test code')

const flagId = "app-page-development-turbo-test";

const test = () => {
  console.log("test click");
};

const setup = () => {
  console.log("test init");

  document.addEventListener("click", test);
};

const clear = () => {
  console.log("test unload");

  document.removeEventListener("click", test);
};

setupTurboLoad(flagId, setup, clear);
