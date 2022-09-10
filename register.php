<?php
$success = $_GET['success'] ?? null;
$error = $_GET['error'] ?? null;
?>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>File Upload Handler in PHP</title>
</head>
<body>
<div class="container-sm">

  <?php if (!is_null($success)): ?>
  <div class="alert alert-success" role="alert">
    Your file was successfully uploaded
  </div>
  <?php endif ?>

  <?php if (!is_null($error)): ?>
  <div class="alert alert-danger" role="alert">
    Unable to upload your file
  </div>
  <?php endif ?>

  <h1>PDC10 - File Uploader</h1>
  <form method="POST" enctype="multipart/form-data" action="index.php">
    <div class="mb-3">
      <label for="complete_name" class="form-label">Complete Name</label>
      <input name="complete_name" class="form-control" type="text" id="complete_name">

      <label for="email" class="form-label">Email Address</label>
      <input name="email" class="form-control" type="email" id="email">

      <label for="password" class="form-label">Password</label>
      <input name="password" class="form-control" type="password" id="password">

      <label for="c_password" class="form-label">Confirm Password</label>
      <input name="c_password" class="form-control" type="password" id="c_password">

      <label for="input_file" class="form-label">Upload your file</label>
      <input name="input_file" class="form-control" type="file" id="input_file">
    </div>
    <input type="submit" value="Register" class="btn btn-secondary btn-lg" />
  </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>