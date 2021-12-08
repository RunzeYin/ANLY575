<?php

$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

$sql = 'SELECT `id` FROM `gdp`;';

$gdp = $db->object('GDP');

// Using the simple data table function

include CLASS_PATH . 'UI.class.php'; 
$ui = new UI();

$caption = 'GDP';
if ($loggedIn) {
	$headers = array('ID', 'WEO Country Group Code', 'Country Group Name', 'GDP', 'Units', 'Scale', 'Percent Change', 'Actions');
	$tableRows = array();
	$counter = 0;
	foreach ($gdp as $row) {
	$tableRows[$counter][] = $row->id;
	$tableRows[$counter][] = $row->WEO_country_group_code;
	$tableRows[$counter][] = $row->country_group_name;
	$tableRows[$counter][] = $row->gdp;
	$tableRows[$counter][] = $row->units;
	$tableRows[$counter][] = $row->scale;
	$tableRows[$counter][] = $row->percent_change;
	$tableRows[$counter][] = "<a href=\"gdp-edit.php?id={$row->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a><a href=\"gdp-delete.php?id={$row->id}\" class=\"icon-button-delete\" data-gdpid=\"{$row->id}\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a>";
	$counter++;}

	$dialog = '<div id="dialog-wrapper"><div id="deque-dialog" class="deque-dialog" data-id="first-deque-dialog">
  <div class="deque-dialog-screen-wrapper"></div>
  <div class="deque-dialog-screen">
    <h1 id="dialogHeading" class="deque-dialog-heading">Dialog</h1>
    <p class="deque-dialog-description" id="dialogDescription">Are you sure you want to delete?</p>
    <div class="deque-dialog-buttons">
      <button id="delete-gdp" class="deque-button deque-dialog-button-submit">Delete</button>
      <button id="cancel-delete" class="deque-button deque-dialog-button-cancel">Cancel</button>
      <button class="deque-dialog-button-close" aria-label="Close dialog"><span aria-hidden="true"></span></button>
    </div>
  </div>
</div>
<div>
  <button id="deque-dialog-trigger" class="deque-dialog-trigger hideFromQuizHint deque-button" aria-controls="deque-dialog"  data-id="first-deque-dialog">Show Dialog!</button>
</div></div>
';

	$attributes = array('id' => 'gdpTable', 'class' => 'somePredefinedClass');

	$table = $ui->simpleTable($caption, $headers, $tableRows, $attributes);

	$addGDP = "<p><a href=\"gdp-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i>Add GDP</a></p>";

	echo $table . $addGDP;

	echo '<div id="deletionResultMessage" tabindex="-1"></div>';

	echo $dialog;


	$java = '
<script>
$( document ).ready(function() {
	$("#dialog-wrapper").hide();
	});

$("a.icon-button-delete").click(function(event){
    
    event.preventDefault();
    
    var gdpId = $(this).data("gdpid");
    
    console.log(gdpId);
    $("#deque-dialog-trigger").click();
  
    $("#delete-gdp").click(function(){
    		var ajaxResultMessage = "Successfully deleted!";
        var dynmaicUrl ="'. URL_ROOT . 'dynamic/gdp-delete.dynamic.php?id="+gdpId;
     		console.log(dynmaicUrl);
     
     $.ajax({
     url:dynmaicUrl,
     cache: false
     })

    .done(function(html){
    		$("tr#"+gdpId).remove();
        $( "#deletionResultMessage" ).html( ajaxResultMessage );
         setTimeout(function(){
                $("#deletionResultMessage").focus();
            }, 1000);
    });

});
});
</script>
';

	echo $java;
} 
else {
  $headers = array('ID', 'WEO Country Group Code', 'Country Group Name', 'GDP', 'Units', 'Scale', 'Percent Change');
	$tableRows = array();
	$counter = 0;
foreach ($gdp as $row) {
	$tableRows[$counter][] = $row->id;
	$tableRows[$counter][] = $row->WEO_country_group_code;
	$tableRows[$counter][] = $row->country_group_name;
	$tableRows[$counter][] = $row->gdp;
	$tableRows[$counter][] = $row->units;
	$tableRows[$counter][] = $row->scale;
	$tableRows[$counter][] = $row->percent_change;
	$counter++; // increment the counter by 1
}

$attributes = array('id' => 'gdpTable', 'class' => 'somePredefinedClass');

$table = $ui->simpleTable($caption, $headers, $tableRows, $attributes);

echo $table;
};

echo '<br><br><br><br><div id="plot-container" style="width:100%;"></div>';


echo "
<script>
Highcharts.chart('plot-container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'GDP shares in 2020'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    name: 'Country Group',
    colorByPoint: true,
    data: [{
      name: 'Euro area',
      y: 13.91
    }, {
      name: 'Major advanced economies (G7)',
      y: 41.61
    }, {
      name: 'Other advanced economies (Advanced economies excluding G7 and euro area)',
      y: 7.91
    }, {
      name: 'Emerging and developing Asia',
      y: 22.27
    }, {
      name: 'Emerging and developing Europe',
      y: 3.93
    }, {
      name: 'Latin America and the Caribbean',
      y: 4.65
    }, {
      name: 'Middle East and Central Asia',
      y: 3.97
    }, {
      name: 'Sub-Saharan Africa',
      y: 1.75 
    }]
  }]
});
</script>
<p>In terms of GDP, G7 and emerging and developing Asia are the two largest economies in the world today. But although emerging and developing Asia is composed of 30 countries, their GDP is still much lower than that of G7, which is composed of only 7 countries.</p>
    ";




