document.addEventListener("DOMContentLoaded", function () {
  // ハンバーガーメニュー制御
  const humberger = document.querySelector(".humberger");
  const header = document.querySelector("#header");
  const menuLinks = document.querySelectorAll(".navi-menu a");

  if (humberger && header) {
    humberger.addEventListener("click", function () {
      header.classList.toggle("active");
    });

    menuLinks.forEach((link) => {
      link.addEventListener("click", function () {
        header.classList.remove("active");
      });
    });
  }

  // Splideスライダーの初期化と高さ揃え
  const splideElement = document.querySelector(".splide");
  if (splideElement) {
    const splide = new Splide(".splide", {
      autoplay: true,
      type: "loop",
      perPage: 3,
      gap: 20,
      focus: 0,
      pauseOnHover: false,
      pauseOnFocus: false,
      interval: 3000,
      speed: 2000,
      breakpoints: {
        768: {
          perPage: 2,
        },
      },
    });

    // カードの高さ揃え
    splide.on("mounted move resized", () => {
      const slides = document.querySelectorAll(".splide__slide");

      // 高さリセット
      slides.forEach((slide) => {
        slide.style.height = "auto";
      });

      // 最大高さを計算
      let maxHeight = 0;
      slides.forEach((slide) => {
        if (slide.offsetHeight > maxHeight) {
          maxHeight = slide.offsetHeight;
        }
      });

      // 最大高さをすべてに適用
      slides.forEach((slide) => {
        slide.style.height = `${maxHeight}px`;
      });
    });

    splide.mount();
  }
});