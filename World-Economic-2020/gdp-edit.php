<?php
include 'init/init.php';

$values->title = 'Edit GDP';
$values->heading = 'Edit GDP';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);