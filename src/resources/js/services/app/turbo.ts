/**
 * ターボ関連
 */

/** コールバック */
type Callback = (el: HTMLElement) => void;

/** ページ設定 */
type Page = {
  id: string;
  mounted: Callback;
  unmounted: Callback;
};

/** ページ設定一覧 */
const pageList: Page[] = [];

/** 初期ロードフラグ */
let isInit = false;

// 読み込み時呼ばれるイベント
//
// 画面を開いた時は、JS読み込み -> turbo:load
// 画面遷移後は、turbo:load -> JS読み込み
//
// 順番が変わるので、isInitを使った調整が必要
document.addEventListener("turbo:load", () => {
  pageList.forEach((row: Page) => {
    const el = document.getElementById(row.id);

    if (el) {
      row.mounted(el);
    }
  });

  isInit = true;
});

// ページ遷移前に呼ばれるイベント
document.addEventListener("turbo:before-cache", () => {
  pageList.forEach((row: Page) => {
    const el = document.getElementById(row.id);

    if (el) {
      row.unmounted(el);
    }
  });
});

/** ターボ用のセットアップ */
export const setupTurboContainer = (
  id: string,
  mounted: Callback,
  unmounted: Callback
) => {
  pageList.push({
    id,
    mounted,
    unmounted,
  });

  if (isInit) {
    const el = document.getElementById(id);
    if (el) mounted(el);
  }
};
