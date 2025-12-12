let DetailGallery = {
  
  init: () => {

    const mainImg = document.getElementById("mainImg");
    const thumbs = document.querySelectorAll(".thumb-img");

    if ( !mainImg ) return;

    thumbs.forEach(thumb => {
        thumb.addEventListener("click", () => {
            mainImg.srcset = thumb.srcset;
            mainImg.src = thumb.src;
        });
    });

  },
};
