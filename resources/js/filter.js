const filter = {
  init() {
    this.fetchCategories();
    this.generateCategoryProducts();
  },
  async fetchCategories() {
    const response = await fetch(`/api/categories`);
    this.categories = await response.json();
  },
  async generateCategoryProducts() {
    /* 
    Cache elements
    */
    const $categories = document.querySelectorAll('.category');
    const $sortItems = document.querySelectorAll('.sort');
    const $allCategories = document.querySelectorAll('.all-categories');
    const $categoryContainer = document.querySelector(".category-products");
    const $submitBtn = document.querySelectorAll('.filter-btn');
    const $searchResult = document.querySelector('.search-result');

    /* 
    Get Url param and fetch products
    */
    let params = new URLSearchParams(document.location.search);
    let urlCategory = params.get("category");
    const response = await fetch(`/api/products/category/${urlCategory}`);
    this.products = await response.json();

    /* 
    Get category value
    */
    $categories.forEach(category => {
      // If category is in param, toggle as active
      if (urlCategory) {
        // Generate HTML for category product
        $categoryContainer.innerHTML = this.products.map((product) => this.generateHTMLForCategories(product)).join('');

        // Set search result
        const activeCategory = this.categories.filter(category => category.id === this.products[0].category_id);
        $searchResult.innerHTML = `${this.products.length} results - "${activeCategory[0].name}"`;

        // Set category as active
        urlCategory === category.dataset.id ? category.classList.add('font-bold') : category.classList.remove('font-bold');
      } else {
        category.dataset.id == 0 ? category.classList.add('font-bold') : "";

      }

      // Generate category products
      category.addEventListener('click', async (ev) => {
        // Get id from dom element
        const { id } = ev.target.dataset;
        // Get all category products and send response
        const response = await fetch(`/api/products/category/${id}`);
        this.products = await response.json();

        // Toggle active link
        if (!category.classList.contains('font-bold')) {
          category.classList.add('font-bold');
          $categories.forEach(category => {
            id === category.dataset.id ? category.classList.add('font-bold') : category.classList.remove('font-bold');
          })
        }
      })
    });

    /* 
    Show all categories
    */
    $allCategories.forEach(btn => {
      btn.addEventListener('click', async (ev) => {
        const response = await fetch(`/api/products`);
        this.products = await response.json();
      })
    })

    /* 
    Generate sort filter 
    */
    $sortItems.forEach(item => {
      // Set date as standard value

      if (item.dataset.name === "name") {
        item.classList.add('border-gray-700');
      };

      // Toggle active link
      item.addEventListener('click', (ev) => {
        this.name = ev.target.dataset.name;

        if (!item.classList.contains('border-gray-700')) {
          $sortItems.forEach(item => {
            this.name === item.dataset.name ? item.classList.add('border-gray-700') : item.classList.remove('border-gray-700');
          })
        }
      })
    })

    /* 
    Submit filter options
    */
    $submitBtn.forEach(btn => {

      btn.addEventListener('click', () => {
        let result = "";

        switch (this.name) {
          case 'name':
            result = this.products.sort(function (a, b) {
              if (a.name < b.name) {
                return -1;
              }
              if (a.name > b.name) {
                return 1;
              }
              return 0;
            });
            break;
          case 'artisan':
            result = this.products.sort(function (a, b) {
              if (a.artisan < b.artisan) {
                return -1;
              }
              if (a.artisan > b.artisan) {
                return 1;
              }
              return 0;
            });
            break;
          case 'price':
            result = this.products.sort(function (a, b) {
              return a.price - b.price;
            });
            break;
          default:
            result = this.products.sort(function (a, b) {
              if (a.name < b.name) {
                return -1;
              }
              if (a.name > b.name) {
                return 1;
              }
              return 0;
            });
            break;
        }

        /*
        Generate HTML 
        */
        $categoryContainer.innerHTML = result.map((product) => this.generateHTMLForCategories(product)).join('');

        /* 
        Generate search result
        */
        const category = this.categories.filter(category => category.id === this.products[0].category_id);
        $searchResult.innerHTML = result.length <= 10 ? `${result.length} results - "${category[0].name}"` : ``;

        /* 
        Generate search result
        */
        let tl = gsap.timeline()
        tl.to(".filter-menu", { x: "-32rem" }).to(".filter-bg", { display: "none", opacity: 0 }, '<.1');
      })
    })

  },
  generateHTMLForCategories(product) {
    return `
    <li class="md:w-[calc(50%-0.75rem)] lg:w-[calc(33.33%-0.75rem)] xl:w-[calc(33.33%-0.75rem)] ">
    <a href="/products/${product.id}" class="h-full" href="/product">
    <div class="flex flex-col items-center mx-6 mb-5 font-medium md:mx-0">
    <img class="w-full pb-3" src="/storage/${product.image}" alt="">
    <span>${product.artisan}</span>
              <span>${product.name}</span>
              <span class="text-sm font-normal">€${product.price}</span>
          </div>
          </a>
          </li>`
  }
}

filter.init();