// script section image preview
function previewImage(){
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = 'block';

    const oFReader = URL.createObjectURL(image.files[0]);
    imgPreview.src = oFReader;
}

// script section slug
const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    // data untuk dijadikan slug = ?title= title.value
    // input = title outputnya = slug
    title.addEventListener('change',function() {
        fetch('/dashboard/posts/createSlug?title=' + title.value)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', (e) => {
    e.prefentDefault();
});