<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

$sql = 'SELECT `id` FROM `trade`;';

$trade = $db->object('Trade');

// Using the simple data table function

include CLASS_PATH . 'UI.class.php'; 
$ui = new UI();

$caption = 'Trade';
  $headers = array('ID', 'WEO Country Group Code', 'Country Group Name', 'Imports of Goods and Services', 'Exports of Goods and Services', 'Units');
	$tableRows = array();
	$counter = 0;
foreach ($trade as $row) {
	$tableRows[$counter][] = $row->id; // this is the first cell
	$tableRows[$counter][] = $row->WEO_country_group_code;
	$tableRows[$counter][] = $row->country_group_name;
	$tableRows[$counter][] = $row->imports_of_goods_and_services;
	$tableRows[$counter][] = $row->exports_of_goods_and_services;
	$tableRows[$counter][] = $row->units;
	// and so on for each cell (or column)
	$counter++; // increment the counter by 1
}

$attributes = array('id' => 'tradeTable', 'class' => 'somePredefinedClass');

$table = $ui->simpleTable($caption, $headers, $tableRows, $attributes);

echo $table;


echo '<br><br><br><br><div id="plot-container" style="width:100%;"></div>';

echo "
<script>
Highcharts.chart('plot-container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Percent Change of Volme of Imports and Exports'
  },
  xAxis: {
    categories: ['World', 'Advanced economies', 'Euro area', 'Major advanced economies (G7)', 'Other advanced economies (Advanced economies excluding G7 and euro area)', 'Emerging market and developing economies', 'Emerging and developing Asia', 'Emerging and developing Europe', 'ASEAN-5', 'Latin America and the Caribbean', 'Middle East and Central Asia', 'Sub-Saharan Africa']
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Imports of Goods and Services',
    data: [-8.909, -9.115, -9.395, -10.505, -6.535, -8.552, -5.850, -6.289, -10.283, -13.189, -15.145, -9.844]
  }, {
    name: 'Exports of Goods and Services',
    data: [-8.102, -9.493, -9.734, -12.883, -4.818, -5.711, -2.089, -8.737, -7.661, -9.294, -9.906, -9.095]
  }]
});
</script>
<p>G7 experienced a steep decrease in exports and middle east and central Asia experienced a steep decrease in imports.</p>
    ";


