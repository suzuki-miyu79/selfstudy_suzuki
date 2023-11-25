document.addEventListener('DOMContentLoaded', function () {
    // DOMが完全に読み込まれた後に実行される処理

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

    function displayErrorMessage(element, message) {
        var errorContainer = element.parentElement.querySelector('.form__error');
        errorContainer.innerHTML = message;
    }

    setupFocusEvent('family-name', 'js-family-name-error');
    setupFocusEvent('given-name', 'js-given-name-error');
    setupFocusEvent('email', 'js-email-error');
    setupFocusEvent('address', 'js-address-error');
    setupFocusEvent('postcode', 'js-postcode-error');
});