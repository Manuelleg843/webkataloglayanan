document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    console.log(searchInput.value);
    if (searchInput.value) {
        searchInput.focus();
        searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);
    }
});

function previewImg() {
    const gambar = document.querySelector('#gambar');

    const imgPreview = document.querySelector('.img-preview');

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function (e) {
        imgPreview.src = e.target.result;
    }
}

let debounceTimer;
function searchService() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        const searchForm = document.querySelector('.search-form');
        searchForm.submit();
    }, 800);
}
