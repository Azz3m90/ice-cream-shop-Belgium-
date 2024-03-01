// Replace 'your-json-file.json' with the actual path to your JSON file
const jsonFilePath = '../../../../../matthias-and-sea-2023/data/gallery.json'

// Fetch JSON data using Axios
axios.get(jsonFilePath)
  .then(response => {
    const galleryImages = response.data.galleryImages

    // Create the gallery cards container
    const cardsContainer = document.getElementById('galleryCards')

    // Loop through gallery images and create HTML cards
    galleryImages.forEach(image => {
      // Create card
      const card = document.createElement('div')
      card.className = 'gallery-card'

      // Create image
      const img = document.createElement('img')
      img.src = `http://127.0.0.1/matthias-and-sea-2023/assets/img/gallery/${image.path}`
      img.alt = ''

      // Create delete button
      const deleteButton = document.createElement('button')
      //deleteButton.className = 'delete-button'

      deleteButton.classList.add('btn', 'btn-sm', 'btn-submit', 'btn-danger')
      const deleteContent = document.createElement('span')
      deleteContent.innerHTML = 'Delete'
      deleteContent.classList.add('description')
      deleteButton.appendChild(deleteContent)
      deleteButton.addEventListener('click', () => deleteImage(image.id, card))

      // Append image and delete button to card
      card.appendChild(img)
      card.appendChild(deleteButton)

      // Append card to container
      cardsContainer.appendChild(card)
    })

    function deleteImage(imageId, card) {
      // Implement the logic to delete the image by sending a request to the PHP script
      // Use Axios to send a POST request to the server
      axios.post('http://127.0.0.1/matthias-and-sea-2023/php/gallery/delete-image.php', { id: imageId })
        .then(response => {
          console.log(response.data)
          // Optionally, update the UI or perform any other actions after successful deletion
          card.remove() // Remove the card from the UI
        })
        .catch(error => {
          console.error('Error deleting image:', error)
        })
    }
  })
  .catch(error => {
    console.error('Error fetching JSON data:', error)
  })
