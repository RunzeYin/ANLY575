<?php
$db = new Database();

$postError = "<p>Error: form assignment was incomplete.</p>\n";

if (isset($_POST['name'])) {

	$postname = $_POST['name'];
	$postdescription = $_POST['description'];
	$postcourse_id = $_POST['course_id'];
	$postdeadline = $_POST['deadline'];

	if (!isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['course_id']) || !isset($_POST['deadline'])) { 
		echo $postError;
		return;
	}
	$insertSql = "INSERT INTO `assignments` (`name`, `description`, `course_id`, `deadline`) ";
	$insertSql .= " VALUES (\"{$postname}\", \"{$postdescription}\", \"{$postcourse_id}\", \"{$postdeadline}\");";
	$insertId = $db->insert($insertSql);
	
	$sql = 'SELECT * FROM `assignments` WHERE `id` = ' . $insertId;
	$assignment = $db->object('Assignment', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$assignment = $assignment[0];

	$success = "<h2>Assignment Created</h2>\n";
	$success .= "<p>Name: {$assignment->name}</p>\n";
	$success .= "<p>Description: {$assignment->description}</p>\n";
	$success .= "<p>Course ID: {$assignment->course_id}</p>\n";
	$success .= "<p>Deadline: {$assignment->deadline}</p>\n";
	$success .= "<p><a href=\"assignments.php\" class=\"button\">Back to assignment list</a></p>";
	echo $success;
	return;
} 

$formStart = "<form action=\"assignment-add.php\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$form .= "<p><label for=\"name\">Name</label> <input type=\"text\" name=\"name\" id=\"name\" value=\"\"></p>";
$form .= "<p><label for=\"description\">Description</label> <input type=\"text\" name=\"description\" id=\"description\" value=\"\"></p>";
$form .= "<p><label for=\"course_id\">Course ID</label> <input type=\"text\" name=\"course_id\" id=\"course_id\" value=\"\"></p>";
$form .= "<p><label for=\"deadline\">Deadline</label> <input type=\"text\" name=\"deadline\" id=\"deadline\" value=\"\"></p>";


echo $formStart . $form . $formEnd;
