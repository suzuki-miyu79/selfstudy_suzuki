document.addEventListener('DOMContentLoaded', function () {
    var opinionPreviews = document.querySelectorAll('.opinion-preview');

    opinionPreviews.forEach(function (preview) {
        preview.addEventListener('mouseover', function () {
            var fullopinion = preview.getAttribute('data-full-opinion');
            preview.innerText = fullopinion;
        });

        preview.addEventListener('mouseout', function () {
            var truncatedopinion = preview.innerText.slice(0, 25);
            if (preview.innerText.length > 25) truncatedopinion += '...';
            preview.innerText = truncatedopinion;
        });
    });
});
