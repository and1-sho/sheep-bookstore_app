// 画像関連の初期設定と要素の取得
let imageFiles = [];
let currentIndex = 0;
const mainImageDiv = document.getElementById('mainImage');
const thumbnailContainer = document.getElementById('thumbnails');

// 初期画像の設定
const initialImageData = document.getElementById('initialImage') ? document.getElementById('initialImage').value : '';
if (initialImageData) {
    const initialImages = JSON.parse(initialImageData);
    if (initialImages.length > 0) {
        imageFiles = initialImages;
        currentIndex = 0;
        updateMainImage();
        updateThumbnails();
    }
}

// メイン画像を更新する関数
function updateMainImage() {
    if (imageFiles.length > 0) {
        mainImageDiv.style.backgroundImage = `url(${imageFiles[currentIndex]})`;
    } else {
        mainImageDiv.style.backgroundImage = ''; // デフォルト画像の設定
    }
}

// サムネイルを作成する関数
function createThumbnail(imageSrc, index) {
    const thumbnailDiv = document.createElement('div');
    thumbnailDiv.className = 'img';
    thumbnailDiv.style.backgroundImage = `url(${imageSrc})`;
    if (index === currentIndex) {
        thumbnailDiv.classList.add('selected');
    }
    thumbnailDiv.addEventListener('click', () => {
        currentIndex = index;
        updateMainImage();
        updateThumbnails();
    });
    thumbnailContainer.appendChild(thumbnailDiv);
}

// 画像の追加
function addImages() {
    const input = document.getElementById('imageInput');
    const files = input.files;
    const imagePromises = Array.from(files).map(file => {
        return new Promise(resolve => {
            const reader = new FileReader();
            reader.onload = event => {
                const imageSrc = event.target.result;
                if (!imageFiles.includes(imageSrc)) {
                    resolve(imageSrc);
                } else {
                    resolve(null);
                }
            };
            reader.readAsDataURL(file);
        });
    });

    Promise.all(imagePromises).then(newImages => {
        newImages.filter(src => src !== null).forEach(src => imageFiles.push(src));
        currentIndex = imageFiles.length - 1;
        updateMainImage();
        updateThumbnails();
    });
}

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
        updateThumbnails();
    }
}

// サムネイルの更新
function updateThumbnails() {
    while (thumbnailContainer.firstChild) {
        thumbnailContainer.removeChild(thumbnailContainer.firstChild);
    }
    imageFiles.forEach((src, index) => {
        createThumbnail(src, index);
    });
    if (imageFiles.length > 0) {
        updateMainImage();
    }
}

// 画像入力の設定
const imageInput = document.getElementById('imageInput');
imageInput.addEventListener('change', event => {
    if (event.target.files.length > 0) {
        addImages();
    }
});

// 画像削除ボタンの設定
const deleteButton = document.getElementById('deleteButton');
deleteButton.addEventListener('click', removeCurrentImage);
