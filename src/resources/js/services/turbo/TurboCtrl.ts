/** コールバック */
type Callback = (el: HTMLElement) => void;

/** ページ設定 */
type Page = {
  id: string;
  mounted: Callback;
  unmounted: Callback;
};

/**
 * ターボ管理
 */
export default class TurboCtrl {
  /** ページ設定一覧 */
  private pageList: Page[] = [];

  /** 初期ロードフラグ */
  private isInit = false;

  /** ターボのセットアップ */
  setupTurbo() {
    // 読み込み時呼ばれるイベント
    //
    // 画面を開いた時は、JS読み込み -> turbo:load
    // 画面遷移後は、turbo:load -> JS読み込み
    //
    // 順番が変わるので、isInitを使った調整が必要
    document.addEventListener("turbo:load", () => {
      this.pageList.forEach((row: Page) => {
        const el = document.getElementById(row.id);

        if (el) {
          row.mounted(el);
        }
      });

      this.isInit = true;
    });

    // ページ遷移前に呼ばれるイベント
    document.addEventListener("turbo:before-cache", () => {
      this.pageList.forEach((row: Page) => {
        const el = document.getElementById(row.id);

        if (el) {
          row.unmounted(el);
        }
      });
    });
  }

  /** ターボコンテナ用のセットアップ */
  setupTurboContainer(id: string, mounted: Callback, unmounted: Callback) {
    this.pageList.forEach((row) => {
      if (row.id === id)
        throw new Error(`ターボコンテナIDが重複しています。id: ${id}`);
    });

    this.pageList.push({
      id,
      mounted,
      unmounted,
    });

    if (this.isInit) {
      const el = document.getElementById(id);
      if (el) mounted(el);
    }
  }
}
