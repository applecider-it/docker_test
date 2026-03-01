import htmx from "htmx.org";
import Alpine from "alpinejs";
import "@hotwired/turbo";

window.Alpine = Alpine;
Alpine.start();

const text: string = "TS test";

console.log(text);

document.addEventListener("turbo:load", () => {
  htmx.process(document.body)
})