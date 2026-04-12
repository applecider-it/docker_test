import { turboSetup } from "./turbo/turbo-common";

console.log("setup turbo");

const clickTest = () => {
  console.log('click');
}

const mounted = (el: HTMLElement) => {
  console.log('turbo mounted')

  el.innerText = "テスト";

  window.addEventListener('click', clickTest)
};

const unmounted = (el: HTMLElement) => {
  console.log('turbo unmounted')

  window.removeEventListener('click', clickTest)
};

turboSetup('app-page-container-turbo', mounted, unmounted);
