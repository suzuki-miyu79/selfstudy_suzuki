function setupFocusEvent(inputName, jsErrorId) {
    var inputField = document.querySelector('input[name="' + inputName + '"]');
    var jsErrorElement = document.getElementById(jsErrorId);

    // フォームに入力した時のイベント
    inputField.addEventListener('blur', function () {
        // バリデーション
        if (this.value.trim() === '') {
            displayErrorMessage(jsErrorElement, "この項目は必須です。");
        } else {
            displayErrorMessage(jsErrorElement, ""); // エラーメッセージをクリア
        }
    });
}

setupFocusEvent('family-name', 'js-family-name-error');
setupFocusEvent('given-name', 'js-given-name-error');
setupFocusEvent('email', 'js-email-error');
setupFocusEvent('address', 'js-address-error');
setupFocusEvent('postcode', 'js-postcode-error');