<?php
include 'init/init.php';

$values->title = 'Trade';
$values->heading = 'Trade';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);