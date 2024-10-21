let currentIndex = 0; // 現在のメイン画像のインデックス
let imageFiles = []; // 画像ファイルを格納する配列

// 画像を選択したときのイベントリスナー
document.getElementById('imageInput').addEventListener('change', function(event) {
    const files = event.target.files;
    const thumbnails = document.getElementById('thumbnails');
    const mainImage = document.getElementById('mainImage');

    // 配列とサムネイル表示領域をクリア
    imageFiles = Array.from(files);
    thumbnails.innerHTML = '';

    // メイン画像の初期表示用フラグ
    currentIndex = 0;

    // 複数画像のプレビュー
    imageFiles.forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgElement = document.createElement('div');
            imgElement.classList.add('img');
            imgElement.style.backgroundImage = `url(${e.target.result})`;
            imgElement.style.backgroundSize = 'cover';
            imgElement.style.backgroundPosition = 'center';
            imgElement.style.cursor = 'pointer';

            // サムネイルクリックでメイン画像に表示
            imgElement.addEventListener('click', function() {
                const mainImageDiv = document.getElementById('mainImage');
                mainImageDiv.style.backgroundImage = `url(${e.target.result})`;

                // すべてのサムネイルから選択クラスを削除
                const thumbnailElements = thumbnails.getElementsByClassName('img');
                Array.from(thumbnailElements).forEach(thumbnail => {
                    thumbnail.classList.remove('selected');
                });

                // 現在のサムネイルに選択クラスを追加
                imgElement.classList.add('selected');

                mainImageDiv.style.display = 'block';
                currentIndex = index;  // 現在のメイン画像のインデックスを更新
            });

            thumbnails.appendChild(imgElement);

            // 追加された画像を自動的に選択しメイン画像に設定
            if (index === imageFiles.length - 1) {
                const mainImageDiv = document.getElementById('mainImage');
                mainImageDiv.style.backgroundImage = `url(${e.target.result})`;
                mainImageDiv.style.display = 'block';

                // サムネイルに選択クラスを追加
                const thumbnailElements = thumbnails.getElementsByClassName('img');
                Array.from(thumbnailElements).forEach(thumbnail => {
                    thumbnail.classList.remove('selected');
                });
                imgElement.classList.add('selected');
                currentIndex = index;  // 新しく追加された画像を選択状態にする
            }
        };

        reader.readAsDataURL(file);
    });
});

// 現在のメイン画像を削除する関数
window.deleteCurrentImage = function() {
    if (imageFiles.length === 0) return; // 画像がない場合は何もしない

    const thumbnails = document.getElementById('thumbnails');
    const mainImageDiv = document.getElementById('mainImage');

    // サムネイルを削除
    const thumbnailElements = thumbnails.getElementsByClassName('img');

    // メイン画像が選択されているサムネイルを削除
    if (thumbnailElements.length > 0 && currentIndex < thumbnailElements.length) {
        thumbnails.removeChild(thumbnailElements[currentIndex]);

        // 配列から削除
        imageFiles.splice(currentIndex, 1);

        // 残りの画像があるか確認
        if (imageFiles.length > 0) {
            // 現在のインデックスが配列の長さを超えた場合、インデックスを調整
            if (currentIndex >= imageFiles.length) {
                currentIndex = imageFiles.length - 1;  // 最後の画像を選択
            }

            // 新しいメイン画像を設定
            const reader = new FileReader();
            reader.onload = function(e) {
                mainImageDiv.style.backgroundImage = `url(${e.target.result})`;
                mainImageDiv.style.display = 'block';
            };
            reader.readAsDataURL(imageFiles[currentIndex]);

            // 新しいサムネイルに選択クラスを追加
            const newThumbnailElements = thumbnails.getElementsByClassName('img');
            Array.from(newThumbnailElements).forEach(thumbnail => {
                thumbnail.classList.remove('selected');
            });
            if (newThumbnailElements[currentIndex]) {
                newThumbnailElements[currentIndex].classList.add('selected');
            }
        } else {
            // 画像がない場合はメイン画像を消す
            mainImageDiv.style.backgroundImage = '';
            mainImageDiv.style.display = 'none';
        }

        // ファイル入力をリセットしてクリア
        document.getElementById('imageInput').value = '';  // ファイル選択部分をクリア
    }
};
