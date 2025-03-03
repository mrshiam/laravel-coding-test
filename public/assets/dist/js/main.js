
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".custom-file-input").addEventListener("change", function (e) {
        let fileName = e.target.files[0]?.name || "Choose file";
        e.target.nextElementSibling.textContent = fileName;
    });
});