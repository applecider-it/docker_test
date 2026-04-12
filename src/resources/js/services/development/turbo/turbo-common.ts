import "@hotwired/turbo";

/** ページ設定 */
type Page = {
  id: string;
  mounted: Function;
  unmounted: Function;
};

/** ページ設定一覧 */
const pageList: Page[] = [];

/** 初期ロードフラグ */
let isInit = false;

document.addEventListener("turbo:load", () => {
  pageList.forEach((row: Page) => {
    const el = document.getElementById(row.id);

    if (el) {
      row.mounted(el);
    }
  });

  isInit = true;
});

document.addEventListener("turbo:before-cache", () => {
  pageList.forEach((row: Page) => {
    const el = document.getElementById(row.id);

    if (el) {
      row.unmounted(el);
    }
  });
});

/** ターボ用のセットアップ */
export const turboSetup = (
  id: string,
  mounted: Function,
  unmounted: Function
) => {
  pageList.push({
    id,
    mounted,
    unmounted,
  });

  if (isInit) mounted(document.getElementById(id));
};
