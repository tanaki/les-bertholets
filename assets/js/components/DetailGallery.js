let DetailGallery = {
  
  init: () => {

    const mainImg = document.getElementById("mainImg");
    const thumbs = document.querySelectorAll(".thumb-img");

    console.log("detail gallery", mainImg, thumbs);

    thumbs.forEach(thumb => {
        thumb.addEventListener("click", () => {
            mainImg.srcset = thumb.srcset;
            mainImg.src = thumb.src;
        });
    });

  },
};
