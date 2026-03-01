import htmx from "htmx.org";

console.log("init htmx");

let init: boolean = false;

document.addEventListener("turbo:load", () => {
  if (!init) {
    init = true;
    return;
  }

  htmx.process(document.body);
  console.log("htmx.process(document.body)");
});
