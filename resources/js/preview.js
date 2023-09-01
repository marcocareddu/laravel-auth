// Active thumbnail
const placeholder = 'https://t3.ftcdn.net/jpg/03/45/05/92/360_F_345059232_CPieT8RIWOUk4JqBkkWkIETYAkmz2b75.jpg';
const thumbnail = document.getElementById('thumb');
const thumbnailPreview = document.getElementById('thumbnail-preview');
thumbnail.addEventListener('input', () => {
    thumbnailPreview.src = thumbnail.value ? thumbnail.value : placeholder;
});