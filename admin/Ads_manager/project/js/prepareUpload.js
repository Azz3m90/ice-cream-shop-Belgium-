$(document).ready(function () {
	var files;
	$("#messageIMG").hide();
	$("#messageBG").hide();
	$("#btnRemoveBG").hide();

	var files;
	$("#messageIMG").hide();
	$("#messageRemoved").hide();
	$("#btnRemoveIM").hide();

	// Function to handle image removal
	function removeImages(paths) {
		$.ajax({
			url: './Ads_manager/project/image_upload.php?remove_img=true',
			type: 'POST',
			data: { paths: JSON.stringify(paths) },
			success: function (result) {
				if (result === 'success') {
					$("#messageRemoved").show();
					$("#messageIMG").hide();
					$("#btnRemoveIM").hide();
					// Clear the path value
					$('#path').val('');
				} else {
					alert('Error removing image.');
				}
			}
		});
	}

	// Bind the click event to the Remove button
	$('#btnRemoveIM').click(function () {
		var paths = $('#path').val();
		if (paths) {
			paths = JSON.parse(paths);
			removeImages(paths);
		}
	});

	$('#file').change(function (event) {
		files = event.target.files;

		var data = new FormData();
		$.each(files, function (key, value) {
			data.append('files[]', value); // Use 'files[]' to handle multiple files
		});

		$.ajax({
			url: './Ads_manager/project/image_upload.php?files',
			type: 'POST',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function (result) {
				// Append the new file path to the existing paths (if any)
				var currentPath = $('#path').val();
				var newPath = currentPath ? currentPath + ',' + result : result;
				$('#path').val(newPath);

				$("#messageIMG").show();
				$("#btnRemoveIM").show(); // Show the Remove button
				$("#messageRemoved").hide(); // Hide the "Image removed successfully" message
			}
		});
	});

	$('#fileBG').change(function (event) {
		files = event.target.files;

		var data = new FormData();
		$.each(files, function (key, value) {
			data.append(key, value);
		});

		$.ajax({
			url: './Ads_manager/project/image_uploadB.php?files',
			type: 'POST',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function (result) {
				$('#pathBG').val(result);
				$("#messageBG").show();
				$("#btnRemoveBG").show();


				// If the image is in the same directory as your HTML file
				var baseUrl = window.location.href.replace(window.location.pathname, '');

				// Construct the full URL

				result = result.replace(/^\.\//, '');

				var imageUrl = baseUrl + '/matthias-and-sea/admin/Ads_manager/project/' + result;
				imageUrl = imageUrl.replace(/\/\.\//g, '/');


				// Create an image element
				var img = new Image();

				// Set the source of the image
				img.src = imageUrl;
				var imageOpacityValue = 0.8; // Adjust this value as needed
				img.style.opacity = imageOpacityValue;


				// Set the background image
				document.getElementById('richTextField').style.backgroundImage = 'url("' + img.src + '")';
				document.getElementById('richTextField').style.backgroundSize = 'cover';
				document.getElementById('richTextField').style.backgroundRepeat = 'no-repeat';
				document.getElementById('richTextField').style.backgroundSize = 'auto';
				document.getElementById('richTextField').style.opacity = 0.8;
				// Assuming you have access to the iframe element
				var richTextField = document.getElementById("richTextField");

				// Check if the iframe exists
				if (richTextField) {
					// Access the document inside the iframe
					var iframeDocument = richTextField.contentDocument || richTextField.contentWindow.document;

					// Access the body element inside the iframe
					var iframeBody = iframeDocument.body;

					// Set the background-color of the body inside the iframe to be transparent
					if (iframeBody) {
						iframeBody.style.opacity = 1;
					}
				}
				//document.getElementById('richTextField').style.opacity = 0.4;
				// Event handler to get the height once the image is loaded
				img.onload = function () {
					// Get the actual height of the image
					var imageHeight = img.naturalHeight || img.height;
					var imageWidth = img.naturalWidth || img.width;

					// Set the height of richTextField based on the image height
					document.getElementById('richTextField').style.height = imageHeight + 'px';
					document.getElementById('richTextField').style.width = 1000 + 'px';	// Set the desired width
					//console.log(imageUrl);
					// Set the background image
					// Assuming opacityValue is a number between 0 (completely transparent) and 1 (completely opaque)
					$("#btnRemoveBG").show();
				};
			}
		});
	});

	$(document).ready(function () {
		$('#btnImage').click(function () {
			$('#image').fadeIn();
		});
	});
	$(document).ready(function () {
		$('#btnBGImage').click(function () {
			$('#bgImage').fadeIn();
		});
	});
});