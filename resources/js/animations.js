const animations = {
  init() {
    this.cartAnimation();
    this.hamburgerAnimation();
    this.filterAnimation();
  },
  cartAnimation() {
    const $openMenu = document.getElementById('cart-btn');
    const $closeCart = document.querySelector('.close-cart');
    let tl = gsap.timeline();

    $openMenu.addEventListener('click', () => {
      if (tl.reversed()) {
        tl.restart();
      } else {
        tl.to("#cart", { x: "-32rem" }).to("#menu-bg", { display: "block", opacity: .5 }, '<.1');
      }
    }); 

    $closeCart.addEventListener('click', () => {
      tl.reverse();
    })
  },
  hamburgerAnimation() {
    const $openMenu = document.querySelector('#open-mobile');
    const $closeMenu = document.querySelector('#close-mobile');
    let tl = gsap.timeline();

    $openMenu.addEventListener('click', () => {
      if (tl.reversed()) {
        tl.restart();
      } else {
        tl.to("#mobile-menu", { x: "32rem" }).to("#mobile-bg", { display: "block", opacity: .5 }, '<.1');
      }
    }); 

    $closeMenu.addEventListener('click', () => {
      tl.reverse()
    })
  },
  filterAnimation() {
    const $openMenu = document.getElementById('open-filter-menu');
    const $closeMenu = document.getElementById('close-btn');
    let tl = gsap.timeline();

    $openMenu.addEventListener('click', () => {
      if (tl.reversed()) {
        tl.restart();
      } else {
        tl.to(".filter-menu", { x: "32rem" }).to(".filter-bg", { display: "block", opacity: .3 }, '<.1');
      }
    }); 

    $closeMenu.addEventListener('click', () => {
      tl.reverse();
    })
  }
}

animations.init();