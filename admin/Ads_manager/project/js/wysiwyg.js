function iFrameOn() {
	richTextField.document.designMode = 'On';
}
function iBold() {
	richTextField.document.execCommand('bold', false, null);
}
function iUnderline() {
	richTextField.document.execCommand('underline', false, null);
}
function iItalic() {
	richTextField.document.execCommand('italic', false, null);
}
function iFontName() {
	//var size = prompt('Enter a size 1 - 7', '');
	var font = document.getElementById('fontname').value;
	richTextField.document.execCommand('FontName', false, font);
}
function iFontSize() {
	//var size = prompt('Enter a size 1 - 7', '');
	var size = document.getElementById('fontsize').value;
	richTextField.document.execCommand('FontSize', false, size);
}
function iForeColor() {
	//var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
	var color = document.getElementById('forecolor').value;
	richTextField.document.execCommand('ForeColor', false, color);
}
function iJustifyLeft() {
	richTextField.document.execCommand('JustifyLeft', false, null);
}
function iJustifyCenter() {
	richTextField.document.execCommand('JustifyCenter', false, null);
}
function iJustifyRight() {
	var marginValue = '25px';
	var style = 'margin-right: ' + marginValue + '; text-align: right;';
	richTextField.document.execCommand('styleWithCSS', false, true);
	richTextField.document.execCommand('justifyRight', false, null);
	richTextField.document.execCommand('insertHTML', false, '<div style="' + style + '">' + richTextField.document.getSelection() + '</div>');
}

function iHorizontalRule() {
	richTextField.document.execCommand('inserthorizontalrule', false, null);
}
function iUnorderedList() {
	richTextField.document.execCommand("InsertOrderedList", false, "newOL");
}
function iOrderedList() {
	richTextField.document.execCommand("InsertUnorderedList", false, "newUL");
}
function iImage() {
	var imgSrc = document.getElementById('path').value;
	// Hide the element

	if (imgSrc != null) {
		richTextField.document.execCommand('InsertImage', false, imgSrc);


	}
}

$(document).ready(function () {
	$('#addform').submit(function (e) {
		e.preventDefault(); // Prevent the default form submission

		$('h8').hide();
		var addform = document.getElementById("addform");
		addform.elements["body"].value = window.frames['richTextField'].document.body.innerHTML;

		// Get the path and pathBG values
		//var img_bg = document.getElementById("pathBG").value;
		var img = document.getElementById("path").value;

		//console.log("Path BG:", img_bg);
		console.log("Path:", img);

		// Use AJAX to submit the form data to the server
		$.ajax({
			type: "POST",
			url: "../admin/Ads_manager/project/insert.php",
			data: {
				subject: addform.elements["subject"].value,
				body: addform.elements["body"].value,
				path: img,
				//pathBG: img_bg
			},
			success: function (response) {
				console.log(response);

				// Display the message with color based on success or error
				var addform = document.getElementById("addform");
				var formIM = document.getElementById("frmFile");

				var messageContainer = $('#message-container');
				messageContainer.text(response.message);
				if (response.status === 'success') {
					messageContainer.css('color', 'green');
					addform.reset();

					resetRichTextField();
					// Reset the file input and text input fields inside the forms
					resetFileForms();
				} else {
					messageContainer.css('color', 'red');
				}

				// Additional actions after successful insertion if needed
			},
			error: function (error) {
				console.error("Error:", error);

				// Display a generic error message with red color
				$('#message-container').text("Error occurred during submission.").css('color', 'red');

				// Handle errors if needed
			}
		});
	});
});

function resetFileForms() {
	// Reset the file input and text input inside the form with id "frmFile"
	var frmFile = document.getElementById("frmFile");
	frmFile.reset();

	// Reset the file input and text input inside the form with id "frmFileBG"


	// Reset the path and pathBG inputs manually (assuming you want to clear the text inputs)
	document.getElementById("path").value = "";

}

