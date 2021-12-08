<?php
include 'init/init.php';

$values->title = 'World Economic 2020';
$values->heading = 'World Economic 2020';
$values->header = 'main.header.template.php';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);