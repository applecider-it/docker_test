import { createApp } from "vue";

import AtomicSamplePage from "@/atomic/pages/AtomicSamplePage.vue";

const list = ["カード１", "カード２", "カード３"];

createApp(AtomicSamplePage, { list }).mount("#vue");
