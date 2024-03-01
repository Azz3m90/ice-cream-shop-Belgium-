axios
  .get('../../../../matthias-and-sea-2023/data/menu_en.json')
  .then(function (response) {
    const data = response.data;
    const menuSamplesCarousel = document.querySelector('.menu-sample-carousel');

    // Loop through the menu categories and generate carousel elements
    for (let i = 0; i < data.menu.length; i++) {
      const category = data.menu[i];
      const categoryName = category.categoryName.replace(/\s+/g, '');
      const categoryImage = category.CategoryImage;

      // Create a new menu sample element
      const menuSampleElement = createMenuSampleElement(categoryName, categoryImage, i);

      // Append the menu sample element to the carousel
      menuSamplesCarousel.querySelector('.slick-track').appendChild(menuSampleElement);
    }

    // Initialize Slick
    $(menuSamplesCarousel).slick({
      dots: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 690,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ],
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>'
    });
  })
  .catch(function (error) {
    // Handle any errors here
    console.error(error);
  });

// Function to create a menu sample element
function createMenuSampleElement(categoryName, categoryImage, index) {
  const menuSampleElement = document.createElement('div');
  menuSampleElement.className = 'slick-slide';
  menuSampleElement.setAttribute('data-slick-index', index);
  menuSampleElement.id = `slick-slide${index < 10 ? '0' : ''}${index}`;
  menuSampleElement.setAttribute('aria-hidden', 'true');
  menuSampleElement.style.width = '413px';
  menuSampleElement.tabIndex = -1;

  const linkElement = document.createElement('a');
  linkElement.href = `menu-grid-navigation.html#${categoryName}`;
  linkElement.tabIndex = -1;

  const imageElement = document.createElement('img');
  imageElement.src = categoryImage;
  imageElement.alt = categoryName;
  imageElement.className = 'image';

  const titleElement = document.createElement('h5');
  titleElement.className = 'title';
  titleElement.textContent = categoryName;

  const menuSampleContent = document.createElement('div');
  menuSampleContent.className = 'menu-sample';
  menuSampleContent.style.width = '100%';
  menuSampleContent.style.height = '150px';
  menuSampleContent.style.display = 'inline-block';

  linkElement.appendChild(imageElement);
  linkElement.appendChild(titleElement);

  menuSampleContent.appendChild(linkElement);
  menuSampleElement.appendChild(menuSampleContent);

  return menuSampleElement;
}
