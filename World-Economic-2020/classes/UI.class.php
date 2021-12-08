<?php
class UI extends Base {

	function __construct() {
	  }

	function simpleTable($caption, array $headers, array $data, $attributes = null) {
		$table = '<table><caption>' . $caption . '</caption><thead><tr>';

		foreach ($headers as $key => $value){
            $table .= '<th>' . $value . '</th>';
        }
        $table .= '</tr></thead><tbody>';

        $counter = 1;
        foreach($data as $key=>$value){
        $table .= '<tr id = "'.$counter.'">';
        	foreach($value as $key2=>$value2){
            	$table .= '<td>' . $value2 . '</td>';
        }
        $table .= '</tr>';
    	$counter++;}

        $table .= '</tbody></table>';

        return $table;
}

	function selectList($id, $name, array $options, $label = null, $required = null, $class = null) {
		if (is_numeric($id[0])) {
			echo ' Error: The ID of the select list must be a letter. It cannot start with a number.';
			return false;
		} elseif (is_numeric($name[0])) {
			echo ' Error: The name of the select list must be a letter. It cannot start with a number.';
			return false;
		}

		if (!$id) {
			echo ' Error: the ID of the select list must not be empty.';
			return;
		} elseif (!$name) {
			echo ' Error: the name of the select list must not be empty.';
			return;
		}

		// You can pass in a CSS class if you want
		$class = null;
		if ($class) {
			$class = ' class = "' . $class . '"';
		}

		if ($label) {
			$label = '<label for = "' . $id . '">' . $label . '</label> ';
		}

		if (($required == 1) || ($required === true)) {
			$required = ' required ';
		}

		$start = '<p><select id="' . $id . '" name="' . $name . '"' . $class . $required . '>' . "\n";
		$end = '</select></p>';

		$optionList = '<option value=""></option>' . "\n";;

		foreach ($options as $k => $v) {
			$optionList .= '<option value="' . $k . '">' . $v . '</option>' . "\n";
		}

		return $label . $start . $optionList . $end;
	}

	function dialog() {

	}

	function expandableButton($id, $content, $class) {

	}
}