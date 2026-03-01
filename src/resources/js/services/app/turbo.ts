/**
 * turboのロードのセットアップ
 *
 * この３パターンで、turboを正常に動作させるための機能
 *
 * ・読み込まれるページでリロード
 * ・ページ遷移後に読み込まれる
 * ・読み込まれた後に、再度、ページ遷移してくるとき
 */
export function setupTurboLoad(setup: Function, flagId: string) {
  const func = () => {
    const flagObj = document.getElementById(flagId);

    // フラグ用オブジェクトがないとき（対象のページじゃないとき）
    if (!flagObj) return;

    const initPage = flagObj.innerText;

    flagObj.innerText = "true";

    // フラグ用オブジェクトの中身が更新済み（既に初期化されているとき）
    if (initPage === "true") return;

    setup();
  };

  document.addEventListener("turbo:load", () => {
    func();
  });

  // 「・読み込まれるページでリロード」このパターンで動作させるために必要な措置
  func();
}
