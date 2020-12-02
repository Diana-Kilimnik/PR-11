<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/style.css">

<form action="upload.php?id=1" method="post" enctype="multipart/form-data">
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    
    <?php require_once('tableOfUsers.php');?>
</form>
