// Active thumbnail
const placeholder = 'https://t3.ftcdn.net/jpg/03/45/05/92/360_F_345059232_CPieT8RIWOUk4JqBkkWkIETYAkmz2b75.jpg';
const thumbnail = document.getElementById('thumb');
const thumbnailPreview = document.getElementById('thumbnail-preview');

// Temp var
let tempUrl = null;

thumbnail.addEventListener('change', () => {
    if (thumbnail.files && thumbnail.files[0]) {
        const file = thumbnail.file[0];
        tempUrl = URL.createObjectURL(file);
        thumbnailPreview.src = tempUrl;
    } else {
        thumbnailPreview.src = placeholder;
    }
});

window.addEventListener('beforeunload', () => {
    if (tempUrl) URL.createObjectURL(tempUrl);
})