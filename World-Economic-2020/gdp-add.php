<?php
include 'init/init.php';

$values->title = 'Add GDP';
$values->heading = 'Add GDP';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);