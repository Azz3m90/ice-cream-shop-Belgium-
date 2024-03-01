if ('caches' in window) {
  caches.keys().then(cacheNames => {
    cacheNames.forEach(cacheName => {
      caches.delete(cacheName)
    })
  })
}
axios
  .get('../../../../../matthias-and-sea/admin/php/dishes/load-dishes.php')
  .then(function (response) {
    const data = response.data
    console.log(data)
    const menuLinks = data.menu.map(category => category.categoryName.replace(/\s+/g, ''))

    var menuCategories = document.getElementById('MenuCategory')
    var text = ''

    for (let i = 0; i < data.menu.length; i++) {
      const category = data.menu[i]
      const categoryId = category.categoryId
      const categoryImage = category.CategoryImage
      const categoryIdFormatted = `categoryId-${categoryId}`


      var ul = document.getElementById('Category')
      ul.innerHTML += `<li><a href="#${menuLinks[i]}">${category.categoryName}</a></li>`

      text +=
        `<!-- Menu Category / ${category.categoryName} -->
        <div id="${menuLinks[i]}" class="menu-category" data-category-id="${categoryIdFormatted}">
            <div class="menu-category-title">
                <div class="bg-image" style="background-image: url('')">
                    <img src="" alt="${category.categoryName}">
                </div>
                <h2 class="title">${category.categoryName}</h2>
                <div class="category-buttons">
                        <button class="btn btn-sm btn-outline-primary btn-primary" onclick="editCategory('${categoryId}','${categoryImage}','${category.categoryName}')"><span class="description">Edit</span></button>
                        <button class="btn btn-sm btn-outline-danger btn-danger" onclick="deleteCategory('${categoryId}')"><span class="description">Delete</span> </button>
                    </div>
            </div>
            <div class="menu-category-content padded">
                <div class="row gutters-sm">
                    `

      for (let j = 0; j < category.items.length; j++) {
        const plateId = category.items[j].plateId
        const plateName = category.items[j].itemName
        const plateIdFormatted = `plateId-${plateId}`
        const price = category.items[j].price
        const description = category.items[j].description || ''
        const image = category.items[j].image

        text += `<div class="col-lg-4 col-6">
                    <div class="menu-item menu-grid-item" id="${plateIdFormatted}">
                        <img class="mb-4" src=".././assets/img/matthiasandsea.jpg" style="width: 300px;height: 200px" alt="${plateName}">
                        <h6 class="mb-0">${plateName}</h6>
                        <span class="text-muted text-sm">${description}</span>
                        <div class="row align-items-center mt-4">
                            <div class="col-sm-6">
                                <span class="text-md mr-4">
                                    <span class="text-muted"></span>
                                    <span data-product-base-price>${price}</span>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="item-buttons">
                                    <button class="btn btn-sm btn-outline-primary btn-primary" onclick="editItem('${categoryId}','${category.categoryName}', '${plateId}','${plateName}','${price}','${description}','${image}')"><span class="description">Edit</span></button>
                                    <button class="btn btn-sm btn-outline-danger btn-danger" onclick="deleteItem('${categoryId}','${category.categoryName}', '${plateId}')"><span class="description">Delete</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`
      }

      text += `</div></div></div>`
      menuCategories.innerHTML = text
    }
  })
  .catch(function (error) {
    //console.error(error)
  })

function editCategory(categoryId, categoryImage, categoryName) {
  console.log(`Edit category: ${categoryId},${categoryImage},${categoryName}`)
  openEditCategoryModal(categoryId, categoryImage, categoryName)
}

function deleteCategory(categoryId) {
  console.log(`Delete category: ${categoryId}`)
  document.getElementById('DPlateNumber').value = -1
  document.getElementById('DCategoryId').value = categoryId
  document.getElementById('categoryName4D').value = 'undefined'
  openConfirmationModal()
}

function editItem(categoryId, categoryName, plateId, plateName, price, description, image) {
  console.log(`Edit category: '${categoryId}', '${plateId}','${plateName}','${price}','${description}','${image}'`)
  openEditItemModal(categoryId, categoryName, plateId, plateName, price, description, image)
}

function deleteItem(categoryId, categoryName, plateId) {
  console.log(`Delete category: ${categoryId}, item: ${plateId}`)
  document.getElementById('DPlateNumber').value = plateId
  document.getElementById('DCategoryId').value = categoryId
  document.getElementById('categoryName4D').value = categoryName
  openConfirmationModal()
}

// Function to open the edit category modal and fill its fields with data
function openEditCategoryModal(categoryId, categoryImage, categoryName) {
  // Get references to the input fields in your modal
  document.getElementById('category-id').value = categoryId
  document.getElementById('title').value = categoryName
  document.getElementById('image').src = categoryImage
  document.getElementById('image-thumbnail').src = categoryImage
  // Get references to the input fields in your modal
  const categoryIdInput = document.getElementById('category-id')
  const titleInput = document.getElementById('title')
  const imageInput = document.getElementById('image')
  const imageThumbnail = document.getElementById('image-thumbnail')

  // Fill the input fields with category data
  categoryIdInput.value = categoryId || ''
  titleInput.value = categoryName || ''
  imageInput.value = '' // You can set the image path if you have it in your data
  imageThumbnail.src = categoryImage || '../assets/img/offers/7.jpeg' // Set the image thumbnail

  // Open the modal (replace 'editDishModal' with the actual ID of your modal)
  // eslint-disable-next-line no-undef
  const editDishModal = new bootstrap.Modal(document.getElementById('editCategoryModal'))
  editDishModal.show()
}

// Function to open the edit category modal and fill its fields with data
function openEditItemModal(categoryId, categoryName, plateId, plateName, price, description, image) {
  console.log(categoryId, plateId, plateName, price, description, image)
  // Get references to the input fields in your modal
  const dishIdInput = document.getElementById('dish-id')
  const categoryIdInput = document.getElementById('categoryIdD')
  const titleInput = document.getElementById('DishTitle')
  const priceInput = document.getElementById('DishPrice')
  const descriptionInput = document.getElementById('DishDescription')
  const categoryNameInput = document.getElementById('categoryName')
  const imageThumbnail = document.getElementById('image-thumbnail-dish')


  // Fill the input fields with category data
  categoryIdInput.value = categoryId || ''
  dishIdInput.value = plateId || ''
  priceInput.value = price || ''

  titleInput.value = plateName || ''
  descriptionInput.value = description || '' // You can set the description if you have it in your data
  categoryNameInput.value = categoryName || '' // You can set the image path if you have it in your data
  imageThumbnail.src = image || '../assets/img/offers/7.jpeg' // Set the image thumbnail


  // Open the modal (replace 'editDishModal' with the actual ID of your modal)
  var modal = document.getElementById('editDishModal')
  modal.style.display = 'block'
}

// Function to update the thumbnail image when a user selects an image
function updateThumbnail() {
  const imageInput = document.getElementById('image')
  const imageThumbnail = document.getElementById('image-thumbnail')

  // Add an event listener to the image input element
  imageInput.addEventListener('change', function () {
    if (imageInput.files && imageInput.files[0]) {
      const reader = new FileReader()

      // When the file is loaded, update the thumbnail
      reader.onload = function (e) {
        imageThumbnail.src = e.target.result
        //console.log(imageThumbnail)
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(imageInput.files[0])
    }
  })
}
function updateThumbnailAddCategory() {
  const imageInput = document.getElementById('addCategoryimage')
  const imageThumbnail = document.getElementById('addCategoryimage-thumbnail')

  // Add an event listener to the image input element
  imageInput.addEventListener('change', function () {
    if (imageInput.files && imageInput.files[0]) {
      const reader = new FileReader()

      // When the file is loaded, update the thumbnail
      reader.onload = function (e) {
        imageThumbnail.src = e.target.result
        //console.log(imageThumbnail)
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(imageInput.files[0])
    }
  })
}

function updateThumbnailAddCategoryDish() {
  const imageInput = document.getElementById('addDishCategoryimage')
  const imageThumbnail = document.getElementById('addDishCategoryimage-thumbnail')

  // Add an event listener to the image input element
  imageInput.addEventListener('change', function () {
    if (imageInput.files && imageInput.files[0]) {
      const reader = new FileReader()

      // When the file is loaded, update the thumbnail
      reader.onload = function (e) {
        imageThumbnail.src = e.target.result
        //console.log(imageThumbnail)
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(imageInput.files[0])
    }
  })
}

function closeEditCategoryModal() {
  var modal = document.getElementById('editCategoryModal')
  var modalA = document.getElementById('editDishModal')
  var modalCategoryAddition = document.getElementById('addCategoryModal')
  var addDishModal = document.getElementById('addDishModal')
  modal.style.display = 'none'
  modalA.style.display = 'none'
  addDishModal.style.display = 'none'
  modalCategoryAddition.style.display = 'none'
  var modalform = document.getElementById('edit-category-form')
  var modalAform = document.getElementById('edit-dish-form')
  var modalCategoryAdditionform = document.getElementById('add-category-form')
  var addDishModalform = document.getElementById('add-dish-form')
  modalform.reset()
  modalAform.reset()
  modalCategoryAdditionform.reset()
  addDishModalform.reset()
  // Remove the modal-open class from the body
  document.body.classList.remove('modal-open')
  // Remove the modal backdrop
  const modalBackdrop = document.querySelector('.modal-backdrop')
  if (modalBackdrop) {
    document.body.removeChild(modalBackdrop)
  }
  // Make the body scrollable
  document.body.style.overflow = 'visible'
}
// Add an event listener to the form for the submit event
const editCategoryForm = document.getElementById('edit-category-form'); // Replace with your form ID
// Add an event listener to the form for the submit event

editCategoryForm.addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent the default form submission

  const categoryId = document.getElementById('category-id').value; // Replace with your category ID input element
  const newCategoryName = document.getElementById('title').value; // Replace with your category name input element
  const newImageInput = document.getElementById('image'); // Replace with your image input element

  if (!categoryId || !newCategoryName) {
    // Validation: Ensure required fields are not empty
    console.error('Category ID and Category Name are required.');
    return;
  }

  const newImage = newImageInput.files[0];
  const formData = new FormData(); // Create a new FormData object

  // Append fields to the FormData
  formData.append('categoryId', categoryId);
  formData.append('newCategoryName', newCategoryName);
  formData.append('newImage', newImage);

  // Log the formData to check its content
  //console.log('FormData:', formData);

  updateCategory(formData)
    .then(function (response) {
      // Handle the response as needed

      // Assuming the response contains a status field
      if (response.data.status === 'success') {
        // Do something on success
        // console.log(response.data);
        showSuccessMessage();
        document.getElementById('successButton').click();
        closeEditCategoryModal();
        const form = document.getElementById('edit-category-form');
        form.reset();
        // Reload the page after 2000 milliseconds (2 seconds)
        setTimeout(function () {
          location.reload();
        }, 1000);
      } else {
        // Handle the error
        showDangerMessage('Something went wrong.');
      }
    })
    .catch(function (error) {
      // Handle any errors from the updateCategory function
      console.error('Error updating category:', error);
    });
});

// Function to update the category (name and image) using Axios
function updateCategory(formData) {
  return axios.post('../../../../matthias-and-sea/admin/php/dishes/edit-category-fr.php', formData, {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
}




// Function to update the thumbnail image when a user selects an image
function updateDishThumbnail() {
  const imageInput = document.getElementById('imageDish')
  const imageThumbnail = document.getElementById('image-thumbnail-dish')

  // Add an event listener to the image input element
  imageInput.addEventListener('change', function () {
    if (imageInput.files && imageInput.files[0]) {
      const reader = new FileReader()

      // When the file is loaded, update the thumbnail
      reader.onload = function (e) {
        imageThumbnail.src = e.target.result
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(imageInput.files[0])
    }
  })
}



// Add an event listener to the form
document.getElementById('edit-dish-form').addEventListener('submit', function (event) {
  event.preventDefault() // Prevent the default form submission

  // Get form data
  const formData = new FormData(this)
  const imageInput = document.getElementById('imageDish')
  console.log(imageInput)
  console.log(imageInput.files[0])
  const imageThumbnail = document.getElementById('image-thumbnail-dish')
  formData.set('imageInput', imageInput.files[0])


  // Use axios to submit the form data
  axios.post('../../../../matthias-and-sea/admin/php/dishes/edit-dish-fr.php', formData)
    .then(function (response) {
      // Handle the success response
      console.log(response.data)
      // You may want to close the modal or perform other actions here
      setTimeout(function () {
        location.reload()
      }, 1000)
    })
    .catch(function (error) {
      // Handle the error
      //console.error(error)
      showDangerMessage(error.response.data.message)
      // You may want to display an error message to the user
    })
})

function closeEditDishModal() {
  var modal = document.getElementById('editDishModal')
  modal.style.display = 'none'
  // Remove the modal-open class from the body
  document.body.classList.remove('modal-open')
  // Remove the modal backdrop
  const modalBackdrop = document.querySelector('.modal-backdrop')
  if (modalBackdrop) {
    document.body.removeChild(modalBackdrop)
  }
  // Make the body scrollable
  document.body.style.overflow = 'visible'
}

// Load and display offers when the page loads
window.addEventListener('load', function () {
  updateThumbnail()
  updateDishThumbnail()
  updateThumbnailAddCategory()
  updateThumbnailAddCategoryDish()
  populateCategoryDropdown()
})
function showDangerMessage(errorMessage) {
  const alert = document.getElementById('alert-error')
  const message = document.getElementById('errorMessage')
  message.innerHTML = errorMessage
  alert.classList.add('show')

  setTimeout(() => {
    alert.style.transition = 'transform 0.5s ease-in-out'
    alert.style.transform = 'translateX(0)'
    setTimeout(() => {
      alert.style.opacity = 0
      setTimeout(() => {
        alert.classList.remove('show')
      }, 500)
    }, 1000)
  }, 100)
}

function showSuccessMessage() {
  const alertMessageContainer = document.getElementById('alert-message-success')
  // Remove the existing alert message if it exists
  if (alertMessageContainer) {
    alertMessageContainer.remove()
  }

  // Create the HTML structure
  const containerDiv = document.createElement('div')
  containerDiv.id = 'alert-message'

  const alertDiv = document.createElement('div')
  alertDiv.classList.add('alert', 'alert-success')
  alertDiv.id = 'alert-success'

  const iconWrapper = document.createElement('div')
  iconWrapper.classList.add('icon__wrapper')

  const iconSpan = document.createElement('span')
  iconSpan.classList.add('fa', 'fa-check')

  const paragraph = document.createElement('p')
  paragraph.textContent = 'completed successfully'

  iconWrapper.appendChild(iconSpan)
  alertDiv.appendChild(iconWrapper)
  alertDiv.appendChild(paragraph)
  containerDiv.appendChild(alertDiv)

  // Append the container div to the document body or any other desired location
  document.body.appendChild(containerDiv)

  // Call the showSuccessMessage function to display the success message
  setTimeout(() => {
    alertDiv.classList.remove('show')
    alertDiv.classList.add('show')

    setTimeout(() => {
      alertDiv.style.transition = 'transform 0.5s ease-in-out'
      alertDiv.style.transform = 'translateX(0)'
      setTimeout(() => {
        alertDiv.style.opacity = 0
        setTimeout(() => {
          alertDiv.classList.remove('show')
          alertDiv.classList.remove('alert')
          alertMessageContainer.remove()
        }, 500)
      }, 500)
    }, 1000)
  }, 100)
}

document.getElementById('dangerButton').addEventListener('click', showDangerMessage)
document.getElementById('successButton').addEventListener('click', showSuccessMessage)
document.getElementById('successButton').click()
// JavaScript for Confirmation Modal
const confirmationModal = document.getElementById('confirmationModal')
const confirmDeleteButton = document.getElementById('confirmDeleteButton')
const cancelDeleteButton = document.getElementById('cancelDeleteButton')
const confirmationModalAddition = document.getElementById('confirmationModalAddition')
const confirmAddDishButton = document.getElementById('confirmAddDishButton')
const confirmAddCategButton = document.getElementById('confirmAddCategButton')
const cancelAdditionButton = document.getElementById('cancelAdditionButton')

// Function to open the confirmation modal for a specific offer
function openConfirmationModal() {
  confirmationModal.style.display = 'block'
}

// Function to close the confirmation modal
function closeConfirmationModal() {
  confirmationModal.style.display = 'none'
}
// Function to open the confirmation modal for a specific offer
function openAdditionConfirmationModal() {
  confirmationModalAddition.style.display = 'block'
}

// Function to close the confirmation modal
function closeAdditionConfirmationModal() {
  confirmationModalAddition.style.display = 'none'
}
confirmDeleteButton.addEventListener('click', function (event) {
  event.preventDefault()
  var plateId = document.getElementById('DPlateNumber').value
  var categoryId = document.getElementById('DCategoryId').value
  var categoryName4D = document.getElementById('categoryName4D').value
  const form = document.getElementById('deletionProccess')
  //console.log(plateId, categoryId)
  if (parseInt(plateId, 10) !== -1 && !isNaN(parseInt(plateId, 10))) {
    // Use axios to submit the form data to delete a dish
    const formData = new FormData()
    formData.append('categoryIdD', categoryId)
    formData.append('plateId', plateId)
    form.reset()
    axios.post('../../../../matthias-and-sea/admin/php/dishes/delete-dish-fr.php', formData)
      .then(function (response) {
        // Handle the success response
        //console.log(response.data)
        showSuccessMessage() // You can customize this function based on your UI
        closeConfirmationModal()
        setTimeout(function () {
          location.reload()
        }, 1000)
      })
      .catch(function (error) {
        // Handle the error
        //console.error(error)
        showDangerMessage(error.response.data.message) // You can customize this function based on your UI
      })
  } else if (parseInt(categoryId, 10) !== -1 && !isNaN(parseInt(categoryId, 10))) {
    // Use axios to submit the form data to delete a category
    const formData = new FormData()
    formData.append('categoryId', categoryId)
    form.reset()
    axios.post('../../../../matthias-and-sea/admin/php/dishes/delete-category-fr.php', formData)
      .then(function (response) {
        // Handle the success response
        console.log(response.data)
        showSuccessMessage() // You can customize this function based on your UI
        closeConfirmationModal()
        setTimeout(function () {
          location.reload()
        }, 1000)
      })
      .catch(function (error) {
        // Handle the error
        console.log(error)
        showDangerMessage(error.response.data.message) // You can customize this function based on your UI
      })
  } else {
    showDangerMessage('some thing went wrong.') // You can customize this function based on your UI
  }
})


// Event listener for canceling the dishes categories deletion
cancelDeleteButton.addEventListener('click', function (event) {
  event.preventDefault()
  closeConfirmationModal()
})

// Event listener for canceling the dishes category addition
cancelAdditionButton.addEventListener('click', function (event) {
  event.preventDefault()
  closeAdditionConfirmationModal()
})
const plusButton = document.getElementById('plus-button')
plusButton.addEventListener('click', function (event) {
  event.preventDefault()
  openAdditionConfirmationModal()
})

document.addEventListener('DOMContentLoaded', function () {
  const addCategoryModal = document.getElementById('addCategoryModal')
  const addCategoryForm = document.getElementById('add-category-form')

  // Show the modal
  document.getElementById('confirmAddCategButton').addEventListener('click', function () {
    // Get the unique category ID
    getUniqueCategoryId()
      .then(uniqueCategoryId => {
        // Set the unique category ID to the hidden field
        document.getElementById('addCategoryID').value = uniqueCategoryId
        console.log(uniqueCategoryId)

        // Open the modal
        addCategoryModal.style.display = 'block'
      })
      .catch(error => {
        //console.error(error)
      })
  })

  // Close the modal
  document.getElementById('cancelAdditionButton').addEventListener('click', function () {
    addCategoryModal.style.display = 'none'
  })

  // Handle form submission
  addCategoryForm.addEventListener('submit', function (event) {
    event.preventDefault()

    // Get form data
    const categoryId = document.getElementById('addCategoryID').value
    const categoryName = document.getElementById('addCategorytitle').value
    const categoryImageInput = document.getElementById('addCategoryimage')
    const categoryImage = categoryImageInput.files[0]

    // Create FormData object
    const formData = new FormData()

    // Append data to FormData
    formData.append('categoryId', categoryId)
    formData.append('categoryName', categoryName)
    formData.append('categoryImage', categoryImage)

    // Perform AJAX request to add category
    axios.post('../../../../matthias-and-sea/admin/php/dishes/add-category-fr.php', formData)
      .then(function (response) {
        // Handle success (you may want to close the modal or update UI)
        //console.log(response.data)
        showSuccessMessage()
        document.getElementById('successButton').click()
        // Reload the page after 2000 milliseconds (2 seconds)
        setTimeout(function () {
          location.reload()
        }, 1000)
      })
      .catch(function (error) {
        // Handle error (you may want to display an error message to the user)
        //console.error(error)
        showDangerMessage(error.response.data.message)
        document.getElementById('dangerbutton').click()
      })
  })

  // Function to get a unique category ID
  async function getUniqueCategoryId() {
    // Fetch JSON data using Axios
    const response = await axios.get('../../../../../matthias-and-sea/admin/php/dishes/load-dishes.php')
    const jsonData = response.data
    console.log(jsonData)

    // Replace this with the logic to generate a unique ID based on existing IDs in your JSON data
    // For example, you can find the maximum existing ID and add 1 to it
    const existingIds = getExistingCategoryIdsFromJson(jsonData)
    const maxId = Math.max(...existingIds)
    const uniqueId = maxId + 1

    return uniqueId
  }

  // Function to get existing category IDs from JSON data
  function getExistingCategoryIdsFromJson(jsonData) {
    // Replace this with the logic to extract existing category IDs from your JSON data
    // For example, you can use jsonData.menu.map(category => category.categoryId)
    const existingIds = jsonData.menu.map(category => category.categoryId)

    return existingIds
  }
})

//Add new Dish Handler
document.addEventListener('DOMContentLoaded', function () {
  const addDishModal = document.getElementById('addDishModal')
  const addDishForm = document.getElementById('add-dish-form')
  const categoryDropdown = document.getElementById('categoryDropdown')

  // Show the modal
  document.getElementById('confirmAddDishButton').addEventListener('click', function () {
    // Get the unique dish ID
    getUniqueDishId()
      .then(uniqueDishId => {
        // Set the unique dish ID to the hidden field
        document.getElementById('categoryIdDish').value = uniqueDishId
        //console.log(uniqueDishId)

        // Populate the category dropdown dynamically
        populateCategoryDropdown()
        // Open the modal
        addDishModal.style.display = 'block'

      })
      .catch(error => {
        // Handle error if needed
        //console.error(error)
      })
  })

  // Close the modal
  document.getElementById('cancelAdditionButton').addEventListener('click', function () {
    addDishModal.style.display = 'none'
  })

  // Handle form submission
  addDishForm.addEventListener('submit', function (event) {
    event.preventDefault()

    // Get form data
    const categoryId = document.getElementById('categoryIdDish').value
    console.log(categoryId)
    const addDishCategoryName = document.getElementById('addDishCategorytitle').value
    const categoryName = document.getElementById('categoryNameDish').value
    const dishPrice = document.getElementById('addDishPrice').value
    const dishImageInput = document.getElementById('addDishCategoryimage')
    const dishImage = dishImageInput.files[0]
    const dishDescription = document.getElementById('addDishDescription').value

    // Create FormData object
    const formData = new FormData(this)

    // Append data to FormData
    formData.set('categoryId', categoryId)
    formData.set('categoryName', categoryName)
    formData.set('addDishCategoryName', addDishCategoryName)
    formData.set('dishPrice', dishPrice)
    formData.set('dishImage', dishImage)
    formData.set('dishDescription', dishDescription)

    // Perform AJAX request to add dish
    axios.post('../../../../matthias-and-sea/admin/php/dishes/add-dish-fr.php', formData)
      .then(function (response) {
        // Handle success (you may want to close the modal or update UI)
        console.log(response.data)
        populateCategoryDropdown()
        showSuccessMessage()
        document.getElementById('successButton').click()
        // Reload the page after 2000 milliseconds (2 seconds)
        setTimeout(function () {
          location.reload()
        }, 1000)
      })
      .catch(function (error) {
        // Handle error (you may want to display an error message to the user)
        //console.error(error)
        // Show an error message to the user if needed
      })
  })


  // Function to get a unique dish ID
  async function getUniqueDishId() {
    // Fetch JSON data using Axios
    const response = await axios.get('../../../../../matthias-and-sea/admin/php/dishes/load-dishes.php')
    const jsonData = response.data

    // Replace this with the logic to generate a unique ID based on existing IDs in your JSON data
    // For example, you can find the maximum existing ID and add 1 to it
    const existingIds = getExistingDishIdsFromJson(jsonData)
    const maxId = Math.max(...existingIds)
    const uniqueId = maxId + 1

    return uniqueId
  }

  // Function to get existing dish IDs from JSON data
  function getExistingDishIdsFromJson(jsonData) {
    // Replace this with the logic to extract existing dish IDs from your JSON data
    // For example, you can use jsonData.menu.flatMap(category => category.items.map(item => item.plateId))
    const existingIds = jsonData.menu.flatMap(category => category.items.map(item => item.plateId))

    return existingIds
  }
})
async function populateCategoryDropdown() {
  const response = await axios.get('../../../../../matthias-and-sea/admin/php/dishes/load-dishes.php')
  const jsonData = response.data

  const dropdown = document.getElementById('categoryDropdown')

  // Clear existing options
  dropdown.innerHTML = ''

  // Populate the dropdown with category names and IDs
  jsonData.menu.forEach(category => {
    const option = document.createElement('option')
    option.value = category.categoryId
    option.text = category.categoryName
    dropdown.add(option)
  })

  // Add an event listener to the dropdown to handle the selection
  dropdown.addEventListener('change', function (event) {
    const selectedCategoryId = event.target.value
    document.getElementById('categoryIdDish').value = event.target.value
    document.getElementById('categoryNameDish').value = event.target.options[event.target.selectedIndex].text
    const selectedCategoryName = event.target.options[event.target.selectedIndex].text

    // You can now use selectedCategoryId and selectedCategoryName as needed
    console.log('Selected Category ID:', selectedCategoryId)
    console.log('Selected Category Name:', selectedCategoryName)
  })
  // Automatically select the first option
  dropdown.selectedIndex = 0

  // Programmatically click the first option
  dropdown.options[0].click()

  // Set values for categoryIdDish and categoryNameDish based on the first option
  document.getElementById('categoryIdDish').value = dropdown.options[0].value
  document.getElementById('categoryNameDish').value = dropdown.options[0].text
}
