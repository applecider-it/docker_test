/**
 * turboのロードのセットアップ
 *
 * この３パターンで、turboを正常に動作させるための機能
 *
 * ・読み込まれるページでリロード
 * ・ページ遷移後に読み込まれる
 * ・読み込まれた後に、再度、ページ遷移してくるとき
 */
export function setupTurboLoad(
  flagId: string,
  load: Function,
  unload: Function,
) {
  const execLoad = () => {
    const flagObj = document.getElementById(flagId);

    // フラグ用オブジェクトがないとき（対象のページじゃないとき）
    if (!flagObj) return;

    const isInit = "initialized" in flagObj.dataset;

    flagObj.dataset.initialized = "on";

    // フラグ用オブジェクトの中身が更新済み（既に初期化されているとき）
    if (isInit) return;

    load();
  };

  const execUnload = () => {
    const flagObj = document.getElementById(flagId);

    // フラグ用オブジェクトがないとき（対象のページじゃないとき）
    if (!flagObj) return;

    unload();
  };

  document.addEventListener("turbo:load", () => {
    execLoad();
  });

  document.addEventListener("turbo:before-cache", () => {
    execUnload();
  });

  // 「・読み込まれるページでリロード」このパターンで動作させるために必要な措置
  execLoad();
}
