// Define a function to load and display the offers from offers.json using Axios
function loadOffers() {
  if ('caches' in window) {
    caches.keys().then(cacheNames => {
      cacheNames.forEach(cacheName => {
        caches.delete(cacheName)
      })
    })
  }
  clearOfferContainer()
  // Define an object to hold the last IDs for each language
  const lastOfferIds = {}
  // Use Axios to fetch the JSON data
  axios.get('../../../../matthias-and-sea-2023/data/offers.json')
    .then(response => {
      const data = response.data
      //clearOfferContainer()
      const offerContainer = document.getElementById('offer-container')
      for (const language in data) {
        if (data.hasOwnProperty(language)) {
          // Set the last ID for the current language
          lastOfferIds[language] = 0
          const offers = data[language].offers
          // Create a form element
          const form = document.createElement('form')
          form.method = 'post' // Set the HTTP method to POST
          //form.action = '../../../../matthias-and-sea-2023/php/your_form_handler.php' // Set the form action to your PHP script
          offers.forEach(offer => {
            // Update the last ID for the current language
            lastOfferIds[language] = offer.id
            const offerCard = document.createElement('div')
            offerCard.className = 'offer-card'
            offerCard.id = 'offer-card-' + offer.id // Set the ID attribute
            offerCard.setAttribute('data-offer-id', offer.id) // Set the data-offer-id attribute
            offerCard.setAttribute('data-offer-lang', language) // Set the data-offer-lang attribute

            const languageIndicator = document.createElement('div')
            languageIndicator.className = `language-indicator ${language}`
            languageIndicator.textContent = language.toUpperCase()
            offer['language'] = language

            const offerIdInput = document.createElement('input') // Hidden input for offer ID
            offerIdInput.type = 'hidden'
            offerIdInput.name = 'offerId' // Set the name for the input
            offerIdInput.id = 'offerId' + offer.id // Set the name for the input
            offerIdInput.value = offer.id // Set the offer ID as the input's value

            const offerLanguageInput = document.createElement('input') // Hidden input for offer ID
            offerLanguageInput.type = 'hidden'
            offerLanguageInput.name = 'offerLanguage' // Set the name for the input
            offerLanguageInput.id = 'offerLanguageInput' + offer.id // Set the name for the input
            offerLanguageInput.value = language // Set the offer ID as the input's value

            const image = document.createElement('img')
            image.className = 'offer-image'
            image.src = '../' + offer.image
            image.alt = 'Offer Image'

            const content = document.createElement('div')
            content.className = 'offer-content'

            const title = document.createElement('h2')
            title.className = 'offer-title'
            title.textContent = offer.title

            const description = document.createElement('p')
            description.className = 'offer-description'
            description.textContent = offer.description

            const detailsList = document.createElement('ul')
            detailsList.className = 'offer-details'

            offer.details.forEach(detail => {
              const detailItem = document.createElement('li')
              detailItem.textContent = detail.text
              if (detail.class === 'false') {
                detailItem.className = 'false'
              }
              detailsList.appendChild(detailItem)
            })

            // Create a div to hold the edit and delete buttons
            const editDeleteContainer = document.createElement('div')
            editDeleteContainer.className = 'edit-delete-container'

            const editButton = document.createElement('button')
            //deleteButton.className = 'delete-button'

            editButton.classList.add('btn', 'btn-sm', 'btn-submit', 'btn-primary')
            const editContent = document.createElement('span')
            editContent.innerHTML = 'Edit'
            editContent.classList.add('description')
            editButton.appendChild(editContent)

            editButton.addEventListener('click', () => makeCardEditable(offerCard, offer))

            const deleteButton = document.createElement('button')
            //deleteButton.className = 'delete-button'

            deleteButton.classList.add('btn', 'btn-sm', 'btn-submit', 'btn-danger')
            const deleteContent = document.createElement('span')
            deleteContent.innerHTML = 'Delete'
            deleteContent.classList.add('description')
            deleteButton.appendChild(deleteContent)

            deleteButton.addEventListener('click', () => deleteOffer(offerIdInput.id, offerLanguageInput.id))

            // Append the edit and delete buttons to the container
            editDeleteContainer.appendChild(editButton)
            editDeleteContainer.appendChild(deleteButton)

            content.appendChild(title)
            content.appendChild(description)
            content.appendChild(detailsList)

            offerCard.appendChild(languageIndicator)
            offerCard.appendChild(image)
            offerCard.appendChild(content)
            offerCard.appendChild(offerIdInput) // Append the hidden input for offer ID
            offerCard.appendChild(offerLanguageInput) // Append the hidden input for offer language
            // Append the edit and delete buttons container to the card
            offerCard.appendChild(editDeleteContainer)

            offerContainer.appendChild(offerCard)
          })
        }
      }
      const addButton = document.createElement('button')
      addButton.className = 'edit-button'
      addButton.textContent = '+'
      addButton.classList.add('plus-button')
      addButton.id = 'plus-button'
      addButton.title = "Add an Offer"

      addButton.addEventListener('click', () => {
        openAddModal(lastOfferIds)
      })
      offerContainer.appendChild(addButton)

      console.log(lastOfferIds)
    })
    .catch(error => console.error('Error loading offers:', error))
}

// Function to make the card editable
function makeCardEditable(card, offer) {
  // Implement editing functionality, for example, using a form or modal
  // You can populate a form with the offer's details and allow editing
  // Upon submission of the form, update the offer details
  console.log('Make card editable:', offer)

  // Example: Open a form or modal for editing
  const editForm = document.createElement('form')
  // Populate the form with offer details for editing
  // Add input fields and save/update buttons
  // Update the offer details when the form is submitted
  // Close the form when editing is complete
  var modal = document.getElementById('editOfferModal')
  var form = document.getElementById('edit-offer-form')
  if (modal && form) {
    // Set values for the form fields
    document.getElementById('offer-id').value = offer.id
    document.getElementById('language').value = offer.language
    document.getElementById('title').value = offer.title
    document.getElementById('description').value = offer.description
    document.getElementById('image-thumbnail').src = '../' + offer.image
    document.getElementById('selected-language').value = offer.language

    // Handle image upload as needed

    var detailsContainer = document.getElementById('details')
    detailsContainer.innerHTML = '' // Clear any existing details

    // Loop through and add details
    for (var i = 0; i < offer.details.length; i++) {
      var detail = offer.details[i]
      addDetail(detail.text, detail.class)
    }

    openEditModal(offer)
  }
}

// Function to handle offer deletion
function handleDeleteOffer(offerId, offerLanguage) {
  // Create a FormData object to serialize the form data

  const formData = new FormData()

  // Append offer ID and offer language to the form data
  formData.append('offerId', offerId)
  formData.append('offerLang', offerLanguage)

  // Send a POST request to the PHP script using Axios
  axios.post('../../../../matthias-and-sea-2023/php/offers/delete_offer.php', formData)
    .then(response => {
      if (response.status === 200) {
        // Handle a successful response, e.g., redirect to a success page
        // window.location.href = 'success_page.php' // Replace with the actual success page URL
        //console.log('Offer deleted successfully', response.data)
        if (response.data === 'Offer deleted successfully') {
          const offerElement = document.getElementById(`offer-card-${offerId}`)
          //console.log(offerElement)
          if (offerElement) {
            offerElement.remove()
            document.getElementById('successButton').click()
            closeEditModal()
            setTimeout(() => {
              loadOffers()
            }, 50)

          }
        }
      } else {
        // Handle an error response, e.g., display an error message
        console.error('Failed to delete offer')
      }
    })
    .catch(error => {
      // Handle network or other errors
      console.error('Error:', error)
    })
}

// Example of how to use the delete function
function deleteOffer(offerId, offerLanguageId) {
  const offerIdInput = document.getElementById(offerId)
  const offerLanguageInput = document.getElementById(offerLanguageId)

  if (offerIdInput && offerLanguageInput) {
    const offerId = offerIdInput.value
    const offerLanguage = offerLanguageInput.value

    // Ask for confirmation before deleting
    openConfirmationModal(offerId, offerLanguage)
  } else {
    console.error('Offer ID input or language input not found')
  }
}

// Function to clear the form fields
function clearFormFields() {
  document.getElementById('edit-offer-form').reset()
  // Clear the image thumbnail
  document.getElementById('image-thumbnail').src = '../assets/img/offers/11.jpeg'
  // Clear the details section
  const details = document.getElementById('details');
  while (details.firstChild) {
    details.removeChild(details.firstChild)
  }
}

function openEditModal(offer) {
  var modal = document.getElementById('editOfferModal')

  modal.style.display = 'block'
}

function openAddModal(lastOfferIds) {
  // Get the modal element and the form
  const modal = document.getElementById('editOfferModalA')
  const modalTitle = modal.querySelector('.modal-header h2')
  const form = document.getElementById('edit-offer-formA')
  // Find the existing button within the modal
  modalTitle.value = 'Add an offer'
  // Reset the form fields
  //form.reset()


  // Update the offer ID input based on the selected language
  const languageSelect = form.querySelector('#languageA')
  const selectedLanguage = languageSelect.value
  const offerIdInput = form.querySelector('#offer-idA')
  offerIdInput.value = ++lastOfferIds[selectedLanguage]
  // Handle image upload as needed
  modal.style.display = 'block'
  var addDetailA = document.getElementById('detailsA')
  addDetailA.innerHTML = '' // Clear any existing details
  var details = [
    { text: 'Only on Weekends', class: 'list-check' },
    { text: 'Order higher than 15.60\u20ac', class: 'false' }
  ]
  // Loop through and add details
  detailsData.forEach(function (item) {
    addDetailAFunction(item.text, item.class)
  })
}

function handleAddOfferForm() {
  const form = document.getElementById('edit-offer-formA')
  form.addEventListener('submit', function (event) {
    event.preventDefault()

    // Create a new FormData object to serialize the form data
    const formData = new FormData()

    formData.append('id', document.getElementById('offer-idA').value)
    formData.append('title', document.getElementById('titleA').value)
    formData.append('description', document.getElementById('descriptionA').value)
    formData.append('language', document.getElementById('languageA').value)

    // Assuming you have an input field for the image file
    const imageInput = document.getElementById('imageA')
    if (imageInput.files.length > 0) {
      formData.append('image', imageInput.files[0])
    }

    const collectedDetails = collectDetailsA()
    formData.append('details', JSON.stringify(collectedDetails))

    // Send a POST request to your PHP script to add the new offer
    axios.post('../../../../matthias-and-sea-2023/php/offers/add_offer.php', formData, {
      headers: {
        'Content-Type': 'multipart/form-data', // Add this header for file upload
      }
    })
      .then(response => {
        if (response.status === 200) {
          // Handle a successful response, e.g., close the modal, update the displayed offers, etc.
          //loadOffers() // You can define and use the loadOffers function to refresh the displayed offers.
          //closeEditModal() // Close the modal
          //console.log(response.data)
          form.reset()
          document.getElementById('successButton').click()
          closeEditModal()
          loadOffers()
          setTimeout(() => {
            if ('caches' in window) {
              caches.keys().then(cacheNames => {
                cacheNames.forEach(cacheName => {
                  caches.delete(cacheName)
                })
              })
            }
            clearOfferContainer()
            loadOffers()
          }, 50)
        } else {
          // Handle an error response, e.g., display an error message.
          console.error('Failed to add offer')
        }
      })
      .catch(error => {
        // Handle network or other errors
        console.error('Error:', error)
      })
  })
}
// Sample JSON structure with class property
var detailsData = [
  { text: 'Only on Tuesdays', class: 'list-check' },
  { text: 'Add some details', class: 'false' }
]

var detailsContainer = document.getElementById('details')
var checkNumber = 1

detailsData.forEach(function (item) {
  addDetail(item.text, item.class)
})

document.getElementById('addNewDetailButton').addEventListener('click', function () {
  addDetail('New Detail ' + checkNumber, 'list-check')
})

function addDetail(detailText, detailClass) {
  var detailDiv = document.createElement('div')
  detailDiv.classList.add('form-check')
  detailDiv.classList.add('detail-row') // Add a custom class for horizontal layout

  var checkboxInput = document.createElement('input')
  checkboxInput.type = 'checkbox'
  checkboxInput.id = 'detail' + checkNumber
  checkboxInput.name = 'details[]'
  checkboxInput.value = detailText
  checkboxInput.classList.add('form-check-input')
  checkboxInput.classList.add(detailClass)
  if (detailClass === 'list-check') {
    // If the detail has a class of 'list-check', check the checkbox
    checkboxInput.checked = true
  }
  var textInput = document.createElement('input')
  textInput.type = 'text'
  textInput.id = 'text' + checkNumber
  textInput.name = 'detailText[]'
  textInput.value = detailText
  textInput.classList.add('form-control')
  textInput.classList.add('col-7')

  const deleteButton = document.createElement('button')
  //deleteButton.className = 'delete-button'

  deleteButton.classList.add('btn', 'btn-sm', 'btn-submit', 'btn-danger')
  const deleteContent = document.createElement('span')
  deleteContent.innerHTML = 'Delete'
  deleteContent.classList.add('description')
  deleteButton.appendChild(deleteContent)
  deleteButton.addEventListener('click', function () {
    // Remove the entire detailDiv when the delete button is clicked
    detailDiv.remove()
  })

  detailDiv.appendChild(checkboxInput)
  detailDiv.appendChild(textInput)
  detailDiv.appendChild(deleteButton)
  detailsContainer.appendChild(detailDiv)

  checkNumber++
}
var detailsContainerA = document.getElementById('detailsA')
var checkNumberA = 1

detailsData.forEach(function (item) {
  addDetailAFunction(item.text, item.class)
})

document.getElementById('addNewDetailButtonA').addEventListener('click', function () {
  addDetailAFunction('New Detail ' + checkNumberA, 'list-check')
})
function addDetailAFunction(detailText, detailClass) {
  var detailDiv = document.createElement('div')
  detailDiv.classList.add('form-checkA')
  detailDiv.classList.add('detail-rowA') // Add a custom class for horizontal layout

  var checkboxInput = document.createElement('input')
  checkboxInput.type = 'checkbox'
  checkboxInput.id = 'detailA' + checkNumberA
  checkboxInput.name = 'detailsA[]'
  checkboxInput.value = detailText
  checkboxInput.classList.add('form-check-input')
  checkboxInput.classList.add(detailClass)
  if (detailClass === 'list-check') {
    // If the detail has a class of 'list-check', check the checkbox
    checkboxInput.checked = true
  }
  var textInput = document.createElement('input')
  textInput.type = 'text'
  textInput.id = 'text' + checkNumberA
  textInput.name = 'detailText[]'
  textInput.value = detailText
  textInput.classList.add('form-control')
  textInput.classList.add('col-7')

  const deleteButton = document.createElement('button')
  //deleteButton.className = 'delete-button'

  deleteButton.classList.add('btn', 'btn-sm', 'btn-submit', 'btn-danger')
  const deleteContent = document.createElement('span')
  deleteContent.innerHTML = 'Delete'
  deleteContent.classList.add('description')
  deleteButton.appendChild(deleteContent)
  deleteButton.addEventListener('click', function () {
    // Remove the entire detailDiv when the delete button is clicked
    detailDiv.remove()
  })

  detailDiv.appendChild(checkboxInput)
  detailDiv.appendChild(textInput)
  detailDiv.appendChild(deleteButton)
  detailsContainerA.appendChild(detailDiv)

  checkNumberA++
}

function closeEditModal() {
  var modal = document.getElementById('editOfferModal')
  var modalA = document.getElementById('editOfferModalA')
  modal.style.display = 'none'
  modalA.style.display = 'none'
}

// Load and display offers when the page loads
window.addEventListener('load', function () {
  loadOffers()
  closeEditModal()
  handleFormSubmission() // Attach the form submission handler
  handleAddOfferForm()
  updateThumbnail()
  updateThumbnailA()
})

// Function to handle form submission
function handleFormSubmission() {
  const form = document.getElementById('edit-offer-form')
  form.addEventListener('submit', function (event) {
    event.preventDefault()

    // Create a FormData object to serialize the form data
    const formData = new FormData(form)
    //console.log(formData)
    // Remove the 'disabled' attribute from the language select
    const detailsElements = document.querySelectorAll('.detail-row')
    const detailRows = document.querySelectorAll('.detail-row')
    console.log('handle Edit offer')
    // Loop through each detail row and update the "details" input field
    // Usage:
    const collectedDetails = collectDetails()
    //console.log(collectedDetails)

    formData.append('details', JSON.stringify(collectedDetails))
    formData.append('language', document.getElementById('selected-language').value)
    // Send a POST request to the PHP script using Axios

    axios.post('../../../../matthias-and-sea-2023/php/offers/edit_offers.php', formData)
      .then(response => {
        if (response.status === 200) {
          // Handle a successful response, e.g., redirect to a success page
          // window.location.href = 'success_page.php' // Replace with the actual success page URL
          //console.log(response.data)
          document.getElementById('successButton').click()
          closeEditModal()
          setTimeout(() => {
            loadOffers()
          }, 50)
        } else {
          // Handle an error response, e.g., display an error message
          console.error('Failed to update offer')
        }
      })
      .catch(error => {
        // Handle network or other errors
        console.error('Error:', error)
      })
  })
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
        console.log(imageThumbnail)
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(imageInput.files[0])
    }
  })
}

// Function to update the thumbnail image when a user selects an image
function updateThumbnailA() {
  const imageInput = document.getElementById('imageA')
  const imageThumbnail = document.getElementById('image-thumbnailA')

  // Add an event listener to the image input element
  imageInput.addEventListener('change', function () {
    if (imageInput.files && imageInput.files[0]) {
      const reader = new FileReader()

      // When the file is loaded, update the thumbnail
      reader.onload = function (e) {
        imageThumbnail.src = e.target.result
        console.log(imageThumbnail)
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(imageInput.files[0])
    }
  })
}
function collectDetails() {
  const detailsArray = []
  const detailElements = document.querySelectorAll('.detail-row')

  detailElements.forEach((detailElement) => {
    const checkbox = detailElement.querySelector('input[type="checkbox"]')
    const textInput = detailElement.querySelector('input[type="text"]')

    if (checkbox && textInput) {
      const text = textInput.value
      const isListCheck = checkbox.checked

      const detail = {
        text: text,
        class: isListCheck ? 'list-check' : 'false',
      }

      detailsArray.push(detail)
    }
  })

  return detailsArray
}
function collectDetailsA() {
  const detailsArray = []
  const detailElements = document.querySelectorAll('.detail-rowA')

  detailElements.forEach((detailElement) => {
    const checkbox = detailElement.querySelector('input[type="checkbox"]')
    const textInput = detailElement.querySelector('input[type="text"]')

    if (checkbox && textInput) {
      const text = textInput.value
      const isListCheck = checkbox.checked

      const detail = {
        text: text,
        class: isListCheck ? 'list-check' : 'false',
      }

      detailsArray.push(detail)
    }
  })

  return detailsArray
}
// Function to clear the content of the offerContainer
function clearOfferContainer() {
  const offerContainer = document.getElementById('offer-container')
  while (offerContainer.firstChild) {
    offerContainer.removeChild(offerContainer.firstChild)
  }
}

function showDangerMessage() {
  const alert = document.getElementById('alert-error')
  alert.classList.add('show')

  setTimeout(() => {
    alert.style.transition = 'transform 0.5s ease-in-out'
    alert.style.transform = 'translateX(0)'
    setTimeout(() => {
      alert.style.opacity = 0
      setTimeout(() => {
        alert.classList.remove('show')
      }, 500)
    }, 100)
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
    }, 100)
  }, 100)
}

document.getElementById('dangerButton').addEventListener('click', showDangerMessage)
document.getElementById('successButton').addEventListener('click', showSuccessMessage)
// JavaScript for Confirmation Modal
const confirmationModal = document.getElementById('confirmationModal')
const confirmDeleteButton = document.getElementById('confirmDeleteButton')
const cancelDeleteButton = document.getElementById('cancelDeleteButton')

let offerToDeleteId = null // Variable to store the ID of the offer to be deleted

// Function to open the confirmation modal for a specific offer
function openConfirmationModal(offerId, offerLanguage) {
  offerToDeleteId = offerId
  offerToDeleteL = offerLanguage
  confirmationModal.style.display = 'block'
}

// Function to close the confirmation modal
function closeConfirmationModal() {
  confirmationModal.style.display = 'none'
}

// Event listener for confirming the offer deletion
confirmDeleteButton.addEventListener('click', () => {
  if (offerToDeleteId) {
    // Call the function to handle the offer deletion
    handleDeleteOffer(offerToDeleteId, offerToDeleteL)
  }
  closeConfirmationModal()
})

// Event listener for canceling the offer deletion
cancelDeleteButton.addEventListener('click', () => {
  closeConfirmationModal()
})

