<?php
$db = new Database();

// make sure a gdp is 
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
	$updateSql = "UPDATE `gdp` SET `WEO_country_group_code` = \"{$postWEO_country_group_code}\", `country_group_name` = \"{$postcountry_group_name}\", `gdp` = \"{$postgdp}\", `units` = \"{$postunits}\", `scale` = \"{$postscale}\", `percent_change` = \"{$postpercent_change}\" WHERE `id` = " . $_GET['id'];
	$update = $db->query($updateSql);
	$sql = 'SELECT * FROM `gdp` WHERE `id` = ' . $_POST['id'];
	$gdp = $db->object('GDP', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$gdp = $gdp[0];

	$success = "<h2>GDP Updated</h2>\n";
	$success .= "<p>WEO Country Group Code: {$gdp->WEO_country_group_code}</p>\n";
	$success .= "<p>Country Group Name: {$gdp->country_group_name}</p>\n";
	$success .= "<p>GDP: {$gdp->gdp}</p>\n";
	$success .= "<p>Units: {$gdp->units}</p>\n";
	$success .= "<p>Scale: {$gdp->scale}</p>\n";
	$success .= "<p>Percent Change: {$gdp->percent_change}</p>\n";
	$success .= "<p><a href=\"gdp.php\" class=\"button\">Back to GDP table</a></p>";
	echo $success;
	return;

} 

$sql = 'SELECT * FROM `gdp` WHERE `id` = ' . $_GET['id'];

$gdp = $db->object('GDP', $sql);

$formStart = "<form action=\"gdp-edit.php?id={$getId}\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$data = $gdp[0];

$form .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">";
$form .= "<p><label for=\"WEO_country_group_code\">WEO Country Group Code</label> <input type=\"text\" name=\"WEO_country_group_code\" id=\"WEO_country_group_code\" value=\"{$data->WEO_country_group_code}\"></p>";
$form .= "<p><label for=\"country_group_name\">Country Group Name</label> <input type=\"text\" name=\"country_group_name\" id=\"country_group_name\" value=\"{$data->country_group_name}\"></p>";
$form .= "<p><label for=\"gdp\">GDP</label> <input type=\"text\" name=\"gdp\" id=\"gdp\" value=\"{$data->gdp}\"></p>";
$form .= "<p><label for=\"units\">Units</label> <input type=\"text\" name=\"units\" id=\"units\" value=\"{$data->units}\"></p>";
$form .= "<p><label for=\"scale\">Scale</label> <input type=\"text\" name=\"scale\" id=\"scale\" value=\"{$data->scale}\"></p>";
$form .= "<p><label for=\"percent_change\">Percent Change</label> <input type=\"text\" name=\"percent_change\" id=\"percent_change\" value=\"{$data->percent_change}\"></p>";

echo $formStart . $form . $formEnd;