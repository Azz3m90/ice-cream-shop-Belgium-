axios
  .get('../../../admin/php/dishes/load-dishes-en.php')
  .then(function (response) {
    // Handle the successful response here
    //console.log(response.data)
    const data = response.data

    // Generate menuLinks dynamically from category names in the JSON
    const menuLinks = data.menu.map(category => category.categoryName.replace(/\s+/g, ''))

    var menuCategories = document.getElementById('MenuCategory')
    var text = ``

    // Loop through the menu items and extract category names
    for (let i = 0; i < data.menu.length; i++) {
      const category = data.menu[i]
      const categoryImage = category.CategoryImage
      //console.log(categoryImage)
      var ul = document.getElementById('Category')
      ul.innerHTML += `<li><a href="#${menuLinks[i]}">${category.categoryName}</a></li>`

      text +=
        `<!-- Menu Category / ${category.categoryName} -->
      <div id="${menuLinks[i]}" class="menu-category">
          <div class="menu-category-title">
        <div class="bg-image" style="background-image: url('${categoryImage}');"> <img class="mb-4" src="./matthias-and-sea/admin/${image}" style="width: 300px;height: 200px;" alt="${plateName}">
${categoryImage}" alt="${category.categoryName}"></div>
              <h2 class="title">${category.categoryName}</h2>
          </div>
          <div class="menu-category-content padded">
              <div class="row gutters-sm">
                <!-- end-->`

      for (let j = 0; j < category.items.length; j++) {
        var categoryId = category.items[j].plateId
        var plateName = category.items[j].itemName

        var price = category.items[j].price  // Replace with your code to get the item price
        var description = category.items[j].description || '' // Replace with your code to get the item description
        var image = category.items[j].image
        //console.log(categoryId, plateName, description, price)

        text += `<div class="col-lg-4 col-6">
            <!-- Menu Item -->
            <div class="menu-item menu-grid-item">
                <img class="mb-4" src="http://localhost/matthias-and-sea/admin/${image}" style= "width: 300px;height: 200px;" alt="${plateName}">
                <h6 class="mb-0">${plateName}</h6>
                <span class="text-muted text-sm">${description}</span>
                <div class="row align-items-center mt-4">
                    <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted"></span> <span data-product-base-price>${price}</span></span></div>
                    <!-- Rest of your item details -->
                </div>
            </div>
        </div>`
      }

      text += `</div></div></div>`
      menuCategories.innerHTML = text
    }
  })
  .catch(function (error) {
    // Handle any errors here
    console.error(error)
  })
