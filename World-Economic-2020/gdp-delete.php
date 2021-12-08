<?php
include 'init/init.php';

$values->title = 'Delete GDP';
$values->heading = 'Delete GDP';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);