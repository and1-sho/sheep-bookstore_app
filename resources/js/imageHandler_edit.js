let imageFiles = []; // 画像ファイルの配列
let currentIndex = 0; // 現在のインデックス
const mainImageDiv = document.getElementById('mainImage'); // メイン画像の要素
const thumbnailContainer = document.getElementById('thumbnails'); // サムネイルのコンテナ

// 初期画像の設定（HTMLからデータを取得）
const initialImage = document.getElementById('initialImage').value; // hidden inputから取得
if (initialImage) {
    imageFiles.push(initialImage); // 初期画像を配列に追加
    currentIndex = 0; // 最初のインデックス
}

// メイン画像を更新
function updateMainImage() {
    if (imageFiles.length > 0) {
        mainImageDiv.style.backgroundImage = `url(${imageFiles[currentIndex]})`; // メイン画像を設定
    } else {
        mainImageDiv.style.backgroundImage = ''; // 画像がない場合はクリア
    }
}

// サムネイルの作成
function createThumbnail(imageSrc) {
    const thumbnailDiv = document.createElement('div');
    thumbnailDiv.className = 'thumbnail';
    thumbnailDiv.style.backgroundImage = `url(${imageSrc})`;

    thumbnailDiv.addEventListener('click', function() {
        currentIndex = imageFiles.indexOf(imageSrc); // インデックスを更新
        updateMainImage(); // メイン画像を更新
    });

    thumbnailContainer.appendChild(thumbnailDiv); // サムネイルをコンテナに追加
}

// 画像の追加
function addImages(files) {
    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(event) {
            const imageSrc = event.target.result;
            imageFiles.push(imageSrc); // 画像を配列に追加
            createThumbnail(imageSrc); // サムネイルを作成

            // ここでメイン画像を更新する前に、currentIndexを最後の画像に設定する
            currentIndex = imageFiles.length - 1; // 追加した画像をメインにする
            updateMainImage(); // メイン画像を更新
        };
        reader.readAsDataURL(file);
    });
}

// サムネイルの更新
function updateThumbnails() {
    // 既存のサムネイルをクリア
    while (thumbnailContainer.firstChild) {
        thumbnailContainer.removeChild(thumbnailContainer.firstChild);
    }

    // 新しいサムネイルを作成
    imageFiles.forEach((src, index) => {
        createThumbnail(src);
    });

    // もしサムネイルが1つ以上あればメイン画像を設定
    if (imageFiles.length > 0) {
        updateMainImage();
    }
}

// 画像の削除
function removeImage(index) {
    if (index >= 0 && index < imageFiles.length) {
        imageFiles.splice(index, 1); // 配列から削除

        // サムネイルを更新
        updateThumbnails();

        // 現在のインデックスを調整
        if (imageFiles.length > 0) {
            currentIndex = Math.min(currentIndex, imageFiles.length - 1); // インデックスを範囲内に調整
            updateMainImage(); // メイン画像を更新
        } else {
            currentIndex = 0; // インデックスをリセット
            mainImageDiv.style.backgroundImage = ''; // 画像がない場合はクリア
        }
    }
}

// 画像入力の設定
const imageInput = document.getElementById('imageInput');
imageInput.addEventListener('change', function(event) {
    const files = event.target.files;
    if (files.length > 0) {
        addImages(files); // 画像を追加
    }
});

// 削除ボタンの設定
const deleteButton = document.getElementById('deleteButton');
deleteButton.addEventListener('click', function() {
    removeImage(currentIndex); // 現在のインデックスの画像を削除
});

// 初期状態のメイン画像の設定
updateMainImage();
