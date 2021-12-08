<?php
class GDP extends Base {
	public $id;
	public $WEO_country_group_code;
	public $country_group_name;
	public $gdp;
	public $units;
	public $scale;
	public $percent_change;
	public $table;

	function __construct() {
	    $this->table = 'gdp';
	  }
}