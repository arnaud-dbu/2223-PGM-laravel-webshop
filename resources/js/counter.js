const counter = {
  init() {
    this.cartCounter();
    console.log('test');
  },
  cartCounter() {
    const $counterValue = document.querySelector("#counter-value");
    const $counterIncrement = document.querySelector("#counter-increment");
    const $counterDecrement = document.querySelector("#counter-decrement");

    if ($counterValue) {
      var count = $counterValue.value;
      $counterIncrement.addEventListener('click', () => {
        count++
        $counterValue.setAttribute("value", count);
      });

      $counterDecrement.addEventListener('click', () => {
        count <= 1 ? 1 : count--;
        $counterValue.setAttribute("value", count);
      });
    }
  },
}

counter.init();