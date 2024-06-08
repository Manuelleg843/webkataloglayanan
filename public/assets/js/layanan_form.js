function previewImg() {
    const gambar = document.querySelector('#gambar');

    const imgPreview = document.querySelector('.img-preview');

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function (e) {
        imgPreview.src = e.target.result;
    }
}
