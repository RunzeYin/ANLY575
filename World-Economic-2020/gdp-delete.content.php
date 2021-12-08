<?php

$db = new Database();

if (!isset($_GET['id'])) {
	echo "<p>Error: No gdp selected</p>";
	return;
}
if (!is_numeric($_GET['id'])) {
	echo "<p>Error: The id must be numeric.</p>";
	return;
} else {
	$getId = $_GET['id'];
}

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['id'])) {

	if (!is_numeric($_POST['id'])) {
		echo '<p>Error: the posted id was not numeric.</p>';
		return;
	} else {
		$postId = $_POST['id'];
	}

	$postWEO_country_group_code = $_POST['WEO_country_group_code'];
	$postcountry_group_name = $_POST['country_group_name'];
	$postgdp = $_POST['gdp'];
	$postunits = $_POST['units'];
	$postscale = $_POST['scale'];
	$postpercent_change = $_POST['percent_change'];
	

	//echo 'post';
	if (!isset($_POST['id']) || !isset($_POST['WEO_country_group_code']) || !isset($_POST['country_group_name']) || !isset($_POST['gdp']) || !isset($_POST['units']) || !isset($_POST['scale']) || !isset($_POST['percent_change']) ) { 
		echo $postError;
		return;
	}

	$deleteSql = "Delete FROM `gdp` WHERE `id` = " . $_GET['id'];
	$delete = $db->query($deleteSql);

	$success = "<h2>GDP Deleted</h2>\n";
	$success .= "<p>{$postWEO_country_group_code} {$postcountry_group_name} {$postgdp} {$postunits} {$postscale} {$postpercent_change}</p>\n";
	$success .= "<p><a href=\"gdp.php\" class=\"button\">Back to GDP table</a></p>";
	echo $success;
	return;

} 

$sql = 'SELECT * FROM `gdp` WHERE `id` = ' . $_GET['id'];

$gdp = $db->object('GDP', $sql);

$gdpData = '';

$data = $gdp[0];


$formStart = "<form action=\"gdp-delete.php?id={$getId}\" method=\"post\">\n";
$gdpData .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">\n";
$gdpData .= "<input type=\"hidden\" name=\"WEO_country_group_code\" id=\"WEO_country_group_code\" value=\"{$data->WEO_country_group_code}\">\n";
$gdpData .= "<input type=\"hidden\" name=\"country_group_name\" id=\"country_group_name\" value=\"{$data->country_group_name}\">\n";
$gdpData .= "<input type=\"hidden\" name=\"gdp\" id=\"gdp\" value=\"{$data->gdp}\">\n";
$gdpData .= "<input type=\"hidden\" name=\"units\" id=\"units\" value=\"{$data->units}\">\n";
$gdpData .= "<input type=\"hidden\" name=\"scale\" id=\"scale\" value=\"{$data->scale}\">\n";
$gdpData .= "<input type=\"hidden\" name=\"percent_change\" id=\"percent_change\" value=\"{$data->percent_change}\">\n";
$gdpData .= "<p>Are you sure you want to delete?</p>\n";
$confirm = "<p><a href=\"\"><input type=\"submit\" value=\"Delete\"> <a href=\"gdp.php\">Back to GDP table</a></p>\n";
$formEnd = "</form>";

echo $formStart . $gdpData . $confirm . $formEnd;