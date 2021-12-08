<?php
class Unemployment extends Base {
	public $id;
	public $WEO_country_group_code;
	public $country_group_name;
	public $year2018;
	public $year2019;
	public $year2020;
	public $units;
	public $table;

	function __construct() {
	    $this->table = 'unemployment';
	  }
}

