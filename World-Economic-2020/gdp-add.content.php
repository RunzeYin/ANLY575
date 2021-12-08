<?php
$db = new Database();

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['WEO_country_group_code'])) {

	$postWEO_country_group_code = $_POST['WEO_country_group_code'];
	$postcountry_group_name = $_POST['country_group_name'];
	$postgdp = $_POST['gdp'];
	$postunits = $_POST['units'];
	$postscale = $_POST['scale'];
	$postpercent_change = $_POST['percent_change'];
	
	//echo 'post';
	if (!isset($_POST['WEO_country_group_code']) || !isset($_POST['country_group_name']) || !isset($_POST['gdp']) || !isset($_POST['units']) || !isset($_POST['scale']) || !isset($_POST['percent_change']) ) { 
		echo $postError;
		return;
	}
	$insertSql = "INSERT INTO `gdp` (`WEO_country_group_code`, `country_group_name`, `gdp`, `units`, `scale`, `percent_change`) ";
	$insertSql .= " VALUES (\"{$postWEO_country_group_code}\", \"{$postcountry_group_name}\", \"{$postgdp}\", \"{$postunits}\", \"{$postscale}\", \"{$postpercent_change}\");";
	$insertId = $db->insert($insertSql);
	
	$sql = 'SELECT * FROM `gdp` WHERE `id` = ' . $insertId;
	$gdp = $db->object('GDP', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$gdp = $gdp[0];

	$success = "<h2>GDP Created</h2>\n";
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

$formStart = "<form action=\"gdp-add.php\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$form .= "<p><label for=\"WEO_country_group_code\">WEO Country Group Code</label> <input type=\"text\" name=\"WEO_country_group_code\" id=\"WEO_country_group_code\" value=\"\"></p>";
$form .= "<p><label for=\"country_group_name\">Country Group Name</label> <input type=\"text\" name=\"country_group_name\" id=\"country_group_name\" value=\"\"></p>";
$form .= "<p><label for=\"gdp\">GDP</label> <input type=\"text\" name=\"gdp\" id=\"gdp\" value=\"\"></p>";
$form .= "<p><label for=\"units\">Units</label> <input type=\"text\" name=\"units\" id=\"units\" value=\"\"></p>";
$form .= "<p><label for=\"scale\">Scale</label> <input type=\"text\" name=\"scale\" id=\"scale\" value=\"\"></p>";
$form .= "<p><label for=\"percent_change\">Percent Change</label> <input type=\"text\" name=\"percent_change\" id=\"percent_change\" value=\"\"></p>";
echo $formStart . $form . $formEnd;