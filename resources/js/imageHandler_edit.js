let imageFiles = []; // 画像ファイルの配列
let currentIndex = 0; // 現在のインデックス
const mainImageDiv = document.getElementById('mainImage'); // メイン画像の要素
const thumbnailContainer = document.getElementById('thumbnails'); // サムネイルのコンテナ

// 初期画像の設定
const initialImage = document.getElementById('initialImage').value;
if (initialImage) {
    imageFiles.push(initialImage);
    currentIndex = 0;
    updateMainImage(); // 初期メイン画像を更新
    updateThumbnails(); // 初期サムネイルを更新
}

// メイン画像を更新
function updateMainImage() {
    if (imageFiles.length > 0) {
        mainImageDiv.style.backgroundImage = `url(${imageFiles[currentIndex]})`;
    } else {
        mainImageDiv.style.backgroundImage = '';
    }
}

// サムネイルの作成
function createThumbnail(imageSrc, index) {
    const thumbnailDiv = document.createElement('div');
    thumbnailDiv.className = 'img';
    thumbnailDiv.style.backgroundImage = `url(${imageSrc})`;

    // 選択されているサムネイルに枠を追加
    if (index === currentIndex) {
        thumbnailDiv.classList.add('selected');
    }

    // クリックイベントでメイン画像を変更
    thumbnailDiv.addEventListener('click', function() {
        currentIndex = index; // インデックスを設定
        updateMainImage(); // メイン画像を更新
        updateThumbnails(); // サムネイルを再描画して選択枠を更新
    });

    thumbnailContainer.appendChild(thumbnailDiv);
}

// 画像の追加
function addImages() {
    const input = document.getElementById('imageInput');
    const files = input.files;

    // 読み込み済み画像データの配列をPromiseで作成
    const imagePromises = Array.from(files).map(file => {
        return new Promise((resolve) => {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imageSrc = event.target.result;

                // 重複チェック：既にimageFilesに画像が含まれているか確認
                if (!imageFiles.includes(imageSrc)) {
                    resolve(imageSrc); // 重複がなければ解決
                } else {
                    resolve(null); // 重複があればnullで解決
                }
            };
            reader.readAsDataURL(file);
        });
    });

    // すべての画像読み込みが完了した後に更新
    Promise.all(imagePromises).then(newImages => {
        // nullを除外して新しい画像だけ追加
        newImages.filter(src => src !== null).forEach(src => imageFiles.push(src));
        currentIndex = imageFiles.length - 1; // メイン画像を最新の画像に設定
        updateMainImage(); // メイン画像を更新
        updateThumbnails(); // サムネイルの更新
    });
}

// 画像削除ボタンの設定
const deleteButton = document.getElementById('deleteButton');
deleteButton.addEventListener('click', function() {
    removeCurrentImage();
});

// 現在の画像の削除
function removeCurrentImage() {
    if (imageFiles.length > 0) {
        imageFiles.splice(currentIndex, 1);

        if (imageFiles.length > 0) {
            if (currentIndex >= imageFiles.length) {
                currentIndex = imageFiles.length - 1;
            }
        } else {
            currentIndex = 0;
        }

        updateMainImage();
        updateThumbnails(); // サムネイルの更新
    }
}

// サムネイルの更新
function updateThumbnails() {
    // サムネイルのコンテナをクリア
    while (thumbnailContainer.firstChild) {
        thumbnailContainer.removeChild(thumbnailContainer.firstChild);
    }

    // 画像ファイルが存在する場合にサムネイルを作成
    imageFiles.forEach((src, index) => {
        createThumbnail(src, index); // サムネイルを作成
    });
}

// 画像入力の設定
const imageInput = document.getElementById('imageInput');
imageInput.addEventListener('change', function(event) {
    if (event.target.files.length > 0) {
        addImages();
    }
});

updateMainImage();
