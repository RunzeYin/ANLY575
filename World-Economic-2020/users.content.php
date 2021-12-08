<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

$sql = 'SELECT `id` FROM `users`;';

$users = $db->object('User');

// Using the simple data table function

include CLASS_PATH . 'UI.class.php'; 
$ui = new UI();

$caption = 'Users';
if ($loggedIn) {
	$headers = array('ID', 'First Name', 'Last Name', 'Email', 'Approved', 'Actions');
	$tableRows = array();
	$counter = 0;
	foreach ($users as $row) {
	$tableRows[$counter][] = $row->id;
	$tableRows[$counter][] = $row->firstname;
	$tableRows[$counter][] = $row->lastname;
	$tableRows[$counter][] = $row->email;
	$tableRows[$counter][] = $row->approved;
	$tableRows[$counter][] = "<a href=\"user-edit.php?id={$row->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a><a href=\"user-delete.php?id={$row->id}\" class=\"icon-button-delete\" data-userid=\"{$row->id}\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a>";
	$counter++;}

	$dialog = '<div id="dialog-wrapper"><div id="deque-dialog" class="deque-dialog" data-id="first-deque-dialog">
  <div class="deque-dialog-screen-wrapper"></div>
  <div class="deque-dialog-screen">
    <h1 id="dialogHeading" class="deque-dialog-heading">Dialog</h1>
    <p class="deque-dialog-description" id="dialogDescription">Are you sure you want to delete?</p>
    <div class="deque-dialog-buttons">
      <button id="delete-user" class="deque-button deque-dialog-button-submit">Delete</button>
      <button id="cancel-delete" class="deque-button deque-dialog-button-cancel">Cancel</button>
      <button class="deque-dialog-button-close" aria-label="Close dialog"><span aria-hidden="true"></span></button>
    </div>
  </div>
</div>
<div>
  <button id="deque-dialog-trigger" class="deque-dialog-trigger hideFromQuizHint deque-button" aria-controls="deque-dialog"  data-id="first-deque-dialog">Show Dialog!</button>
</div></div>
';

	$attributes = array('id' => 'userTable', 'class' => 'somePredefinedClass');

	$table = $ui->simpleTable($caption, $headers, $tableRows, $attributes);

	$addUser = "<p><a href=\"user-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add user</a></p>";

	echo $table . $addUser;

	echo '<div id="deletionResultMessage" tabindex="-1"></div>';

	echo $dialog;


	$java = '
<script>
$( document ).ready(function() {
	$("#dialog-wrapper").hide();
	});

$("a.icon-button-delete").click(function(event){
    
    event.preventDefault();
    
    var userId = $(this).data("userid");
    
    console.log(userId);
    $("#deque-dialog-trigger").click();
  
    $("#delete-user").click(function(){
    		var ajaxResultMessage = "Successfully deleted!";
        var dynmaicUrl ="'. URL_ROOT . 'dynamic/user-delete.dynamic.php?id="+userId;
     		console.log(dynmaicUrl);
     
     $.ajax({
     url:dynmaicUrl,
     cache: false
     })

    .done(function(html){
    		$("tr#"+userId).remove();
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
  $headers = array('ID', 'First Name', 'Last Name', 'Email', 'Approved');
	$tableRows = array();
	$counter = 0;
foreach ($users as $row) {
	$tableRows[$counter][] = $row->id; // this is the first cell
	$tableRows[$counter][] = $row->firstname;
	$tableRows[$counter][] = $row->lastname;
	$tableRows[$counter][] = $row->email;
	$tableRows[$counter][] = $row->approved;
	// and so on for each cell (or column)
	$counter++; // increment the counter by 1
}

$attributes = array('id' => 'userTable', 'class' => 'somePredefinedClass');

$table = $ui->simpleTable($caption, $headers, $tableRows, $attributes);

echo 'Sorry, you have to login to view this page.';
};


