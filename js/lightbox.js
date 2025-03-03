(() => {
    const lightbox = document.querySelector("#lightbox");
    const lightboxImg = document.querySelector("#lightbox-img");

    document.querySelector(".photo-gallery-flex").addEventListener("click", (event) => {
        if (event.target.classList.contains("photo-item")) {
            lightbox.style.display = "flex";
            lightboxImg.src = event.target.src; 
        }
    });

    lightbox.addEventListener("click", (event) => {
        if (event.target !== lightboxImg) {
            lightbox.style.display = "none"; 
        }
    });


    document.addEventListener("DOMContentLoaded", () => {
        lightbox.style.display = "none";
    });
})();
