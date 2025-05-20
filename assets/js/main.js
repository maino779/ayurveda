document.addEventListener("DOMContentLoaded", function () {
  const humberger = document.querySelector(".humberger");
  const header = document.querySelector("#header");
  const menuLinks = document.querySelectorAll(".navi-menu a");
  const parentLinks = document.querySelectorAll(".menu-item-has-children > a");

  if (humberger && header) {
    humberger.addEventListener("click", function () {
      header.classList.toggle("active");
      document.body.classList.toggle("no-scroll"); // ← bodyスクロール禁止・許可切り替え
    });
  }

  // メニューリンクをクリックしたら閉じる処理
  menuLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      if (window.innerWidth <= 768) {
        // サブメニュー内のリンクなら普通に飛ばす（親メニュー以外）
        if (!this.closest(".menu-item-has-children")) {
          header.classList.remove("active");
          document.body.classList.remove("no-scroll");
        }
      } else {
        header.classList.remove("active");
      }
    });
  });

  // サブメニュー開閉（スマホのみ）
  parentLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      if (window.innerWidth <= 768) {
        const parentLi = this.parentElement;

        if (parentLi.classList.contains("menu-item-has-children")) {
          // 親リンクだけ開閉させる
          e.preventDefault();

          const isOpen = parentLi.classList.contains("open");

          document
            .querySelectorAll(".menu-item-has-children.open")
            .forEach((openLi) => {
              openLi.classList.remove("open");
              const openSub = openLi.querySelector(".sub-menu");
              if (openSub) {
                openSub.classList.remove("open");
              }
            });

          if (!isOpen) {
            parentLi.classList.add("open");
            const subMenu = parentLi.querySelector(".sub-menu");
            if (subMenu) {
              subMenu.classList.add("open");
            }
          }
        }
        // else部分はなにも書かない＝サブメニューのリンクは普通に動く！
      }
    });
  });

  // Splideスライダー初期化
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

    // スライドの高さ揃え
    splide.on("mounted move resized", () => {
      const slides = document.querySelectorAll(".splide__slide");
      slides.forEach((slide) => {
        slide.style.height = "auto";
      });

      let maxHeight = 0;
      slides.forEach((slide) => {
        if (slide.offsetHeight > maxHeight) {
          maxHeight = slide.offsetHeight;
        }
      });

      slides.forEach((slide) => {
        slide.style.height = `${maxHeight}px`;
      });
    });

    splide.mount();
  }
});

//プライバシー
document.addEventListener(
  "wpcf7submit",
  function (e) {
    const checkbox = document.querySelector('input[name="privacy-agree"]');
    if (checkbox && !checkbox.checked) {
      e.preventDefault();
      alert("プライバシーポリシーへの同意が必要です");
    }
  },
  true
);
