<!DOCTYPE html>
<html>

<head>

 <script src="./Ads_manager/project/js/jquery.min.js"></script>
 <script src="./Ads_manager/project/js/jquery-ui.min.js"></script>

</head>

<body onLoad="iFrameOn();">
 <div id="container">
  <div class="content_wrapper">
   <form method="post" action="" enctype="multipart/form-data" name="addform" id="addform">
    <table>
     <tr>
      <th colspan="2">Insert Ads</th>
     </tr>
     <tr>
      <td></td>
      <td style="color:red;">
       <div id="message-container"></div>

      </td>
     </tr>
     <tr>
      <td>Subject:</td>
      <td><input type="text" name="subject" id="subject" placeholder="your subject here"></td>
     </tr>
     <tr>
      <td></td>
      <td>
       <select name="fontname" id="fontname" onChange="iFontName()">
        <option id="1">Verdana</option>
        <option id="2">Arial</option>
        <option id="3">Georgia</option>
        <option id="4">Trebuchet MS</option>
        <option id="5">Times New Roman</option>
        <option id="6">Sans-serif</option>
        <option id="7">Comic Sans MS</option>
        <select>
         <select name="fontsize" id="fontsize" onChange="iFontSize()">
          <option id="1">1</option>
          <option id="2">2</option>
          <option id="3">3</option>
          <option id="4">4</option>
          <option id="5">5</option>
          <option id="6">6</option>
          <option id="7">7</option>
          <select>
           <select name="forecolor" id="forecolor" onChange="iForeColor()" style="width:60px;">
            <option id="2" style="background:#000; color:#000;" value="black">black</option>
            <option id="1" style="background:#FFF; color:#FFF;" value="white">white</option>
            <option id="3" style="background:green; color:green;" value="green">green</option>
            <option id="4" style="background:red; color:red;" value="red">red</option>
            <option id="5" style="background:blue; color:blue;" value="blue">blue</option>
            <option id="6" style="background:yellow; color:yellow;" value="yellow">yellow</option>
            <option id="7" style="background:violet; color:violet;" value="violet">violet</option>
            <option id="8" style="background:pink; color:pink;" value="pink">pink</option>
            <option id="9" style="background:orange; color:orange;" value="orange">orange</option>
            <option id="10" style="background:brown; color:brown;" value="brown">brown</option>
            <select>
             <input type="button" onClick="iJustifyLeft()" value="Left">
             <input type="button" onClick="iJustifyCenter()" value="Center">
             <input type="button" onClick="iJustifyRight()" value="Right">
      </td>
     </tr>
     <tr>
      <td></td>
      <td>
       <input type="button" onClick="iBold()" value="B">
       <input type="button" onClick="iUnderline()" value="U">
       <input type="button" onClick="iItalic()" value="I">
       <input type="button" onClick="iHorizontalRule()" value="HR">
       <input type="button" onClick="iUnorderedList()" value="UL">
       <input type="button" onClick="iOrderedList()" value="OL">
       <input type="button" id="btnImage" value="Image">
       <input type="button" id="btnBGImage" value="Backgound">
      </td>
     </tr>
     <tr>
      <td></td>
      <td>
       <div id="image" style="display:none;">
        <form enctype="multipart/form-data" method="post" action="./ads_manager/project/image_upload.php" name="frmFile"
         id="frmFile">
         <input name="files[]" type="file" id="file" multiple />
         <input readonly type="text" name="path" id="path" style="width:150px;" hidden>
         <span id="messageIMG" style="color:green;">Success</span>
         <span id="messageRemoved" style="color:green;font:bold;">Images removed successfully</span>

         <input type="button" id="btnRemoveIM" value="Remove">
         <!--<input type="button" name="btnok" id="ok" value="Ok" onClick="iImage()">-->
        </form>
       </div>

      </td>
     </tr>
     <tr>
      <td>Body:</td>
      <textarea style="display:none;" name="body" id="body"></textarea>
      <td>

       <iframe name="richTextField" id="richTextField" scrolling="no"
        style="border:#CCC 1px solid; width:1000px; height:380px;" allowtransparency="true"></iframe>
      </td>
     </tr>
     <tr>
      <td colspan="3"><input type="submit" id="submit" name="submit" value="Add Ads"></td>
     </tr>
    </table>
   </form>
   <script>
   $('#messageBGRemoved').hide();
   // Add this function to handle background image removal
   function removeBackgroundImage() {
    $('#messageBG').hide();
    var bgImagePath = $('#pathBG').val();

    // Make an AJAX request to remove the background image
    $.ajax({
     url: '../../../../matthias-and-sea/admin/Ads_manager/project/image_uploadB.php?remove_bg=true',
     type: 'POST',
     data: {
      bg_image_path: bgImagePath
     },
     success: function(result) {
      console.log(result);
      //$('#messageBG').text(result).css('color', 'green');
      // Check the response from the server
      if (response === 'Background image removed successfully') {
       // Show the success message
       $('#messageBGRemoved').show();
      } else {
       // Hide the success message
       $('#messageBGRemoved').hide();
       $('#messageBG').hide();
      }
     },
     error: function(error) {
      console.error("Error:", error);
      $('#messageBG').text("Error occurred during background image removal.").css('color', 'red');
     }
    });
   }

   // Update your existing code to include the new button
   $(document).ready(function() {
    $("#btnRemoveBG").hide();

    $('#btnRemoveBG').click(function() {
     // Call the function to remove the background image
     removeBackgroundImage();
     $("#btnRemoveBG").hide();
     var richTextField = document.getElementById('richTextField');
     richTextField.style.backgroundImage = 'none';
    });
   });
   </script>
  </div>
 </div>
</body>

</html>