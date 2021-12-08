<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

$sql = 'SELECT `id` FROM `unemployment`;';

$unemployment = $db->object('Unemployment');

// Using the simple data table function

include CLASS_PATH . 'UI.class.php'; 
$ui = new UI();

$caption = 'Unemployment Rate';
  $headers = array('ID', 'WEO Country Group Code', 'Country Group Name', '2018', '2019', '2020', 'Units');
	$tableRows = array();
	$counter = 0;
foreach ($unemployment as $row) {
	$tableRows[$counter][] = $row->id; // this is the first cell
	$tableRows[$counter][] = $row->WEO_country_group_code;
	$tableRows[$counter][] = $row->country_group_name;
	$tableRows[$counter][] = $row->year2018;
	$tableRows[$counter][] = $row->year2019;
	$tableRows[$counter][] = $row->year2020;
	$tableRows[$counter][] = $row->units;
	// and so on for each cell (or column)
	$counter++; // increment the counter by 1
}

$attributes = array('id' => 'unemploymentTable', 'class' => 'somePredefinedClass');

$table = $ui->simpleTable($caption, $headers, $tableRows, $attributes);

echo $table;


echo '<br><br><br><br><div id="plot-container" style="width:100%;"></div>';

echo "
<script>
Highcharts.chart('plot-container', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Historic World Unemployment Rate by Advanced Economy'
  },
  xAxis: {
    categories: ['Advanced economies', 'Euro area', 'Major advanced economies (G7)', 'Other advanced economies (Advanced economies excluding G7 and euro area)'],
    title: {
      text: null
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Unemployment Rate (percent of total labor force)',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: '%'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: 10,
    y: 20,
    floating: true,
    borderWidth: 1,
    backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Year 2018',
    data: [5.117, 8.183, 4.554, 4.012]
  }, {
    name: 'Year 2019',
    data: [4.817, 7.558, 4.290, 3.964]
  }, {
    name: 'Year 2020',
    data: [6.621, 7.933, 6.527, 4.671]
  }]
});
</script>
<p>In advanced economies, Euro area has the highest unemployment rate every year in 2018, 2019 and 2020.</p>
    ";

