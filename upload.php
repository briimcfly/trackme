<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>File Upload</title>
</head>

<body>


<form action="uploadaction.php" method="post" enctype="multipart/form-data">
<label for="thefile">Like, pick a file and stuff</label>
<input type="file" name ="thefile" id="thefile">
<input type="submit" value="upload">
</form>

</body>
</html>