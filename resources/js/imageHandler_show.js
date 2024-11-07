document.addEventListener('DOMContentLoaded', function () {
    const mainImage = document.getElementById('mainImage'); // メイン画像の要素
    const thumbnails = document.querySelectorAll('.thumbnail'); // サムネイル画像の要素群

    // 初期表示時に最初のサムネイルに`selected`クラスを付与
    if (thumbnails.length > 0) {
        const initialThumbnail = thumbnails[0];
        initialThumbnail.classList.add('selected');
    }

    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener('click', () => {
            // クリックしたサムネイルの背景画像を取得し、メイン画像に設定
            const bgImage = thumbnail.style.backgroundImage;
            mainImage.style.backgroundImage = bgImage;

            // すべてのサムネイルの `selected` クラスを削除
            thumbnails.forEach(tn => tn.classList.remove('selected'));

            // クリックされたサムネイルに `selected` クラスを追加
            thumbnail.classList.add('selected');
        });
    });
});
