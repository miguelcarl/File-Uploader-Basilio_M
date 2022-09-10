<?php

include "methods.php";

$dsn = "mysql:host=%;dbname=pdc10_db";
$user = "username";
$passwd = "";

$pdo = new PDO($dsn, $user, $passwd);

$result = Registration::handleUpload($_FILES['input_file']);

if ($result !== FALSE) {

	$fileObj = new Registration($_FILES['input_file']['name'], $result['complete_name'], $result['email'], $result['complete_name'],  $result['registered_at']);
	$result = $fileObj->save();

	header('Location: index.php?success=1');

} else {

	header('Location: index.php?error=' . $e->getMessage());

}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Complete Name</th>
                    <th>Email</th>
                    <th>Picture</th>
                    <th>Registered Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($register as $input){ ?>
                <tr>
                <td> <?php echo $input->getId()?> </td>
                <td> <?php echo $input->getCompleteName()?> }} </td>
                <td> <?php echo $input->getEmail() ?> </td>
		<td> <?php echo $input->getPicturePath() ?> </td> 
		<td> <?php echo $input->getRegisteredDate()?> </td>            
                </tr>
				<?php } ?>
            </tbody>
</table>    