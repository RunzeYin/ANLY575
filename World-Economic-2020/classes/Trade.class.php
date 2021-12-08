<?php
class Trade extends Base {
	public $id;
	public $WEO_country_group_code;
	public $country_group_name;
	public $imports_of_goods_and_services;
	public $exports_of_goods_and_services;
	public $units;
	public $table;

	function __construct() {
	    $this->table = 'trade';
	  }
}