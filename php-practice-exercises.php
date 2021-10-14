<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Practice Exercises - PHP</title>
    </head>
    <body>
<?php


/*
NOTE: in all cases where the exercise asks you to echo or print the result to the web page,
please precede the value with the exercise number, and put a line break <br> at the end
(or enclose the whole thing in paragraphs, or in a <div>, if appropriate)
to separate the values visually on the web page.

Example:

echo '4.1 ' . $myVariable . '<br>';

or:

echo '<p>4.1 ' . $myVariable . '</p>';

or:

echo '<div>4.1 ' . $myVariable . '</div>';

*/

$nl = "\n";


/*
TOPIC 1: THE BASICS -- VARIABLES, STRINGS, COMMENTS
*/

echo '<h2>TOPIC 1</h2>';

/*
1.1 Declare a variable without setting a value for that variable.
*/

$var1 = null;
echo $nl . '<p>1.1  ' . $var1 . '</p>';

/*
1.2 Set a variable to an empty string.
*/

$var2 = '';
echo $nl . '<p>1.2  ' . $var2 . '</p>';

/*
1.3 Set variable to a string of text.
*/

$var3 = 'Hello';
echo $nl . '<p>1.3  ' . $var3 . '</p>';

/* 
1.4 Set a variable to an integer.
*/

$var4 = 100;
echo $nl . '<p>1.4  ' . $var4 . '</p>';

/*
1.5 Set a variable to a numeric string.
*/

$var5 = '100';
echo $nl . '<p>1.5  ' . $var5 . '</p>';

/*
1.6 Set one of the variables above to a new value. (Redefine the value of a the variable.)
*/

$var1 = 'new';
echo $nl . '<p>1.6  ' . $var1 . '</p>';

/*
1.7 Set a variable to a string that starts with multiple spaces and ends with multiple spaces
*/

$var7 = '      multiple spaces      ';
echo $nl . '<p>1.7  ' . $var7 . '</p>';

/*
1.8 Use the trim() function to strip the spaces from the above variable.
*/

$var8 = trim($var7);
echo $nl . '<p>1.8  ' . $var8 . '</p>';

/*
1.9 Set a new variable as the concatonation (combination) of two of the above string variables.
*/

$var9 = $var3 . ' ' . $var1;
echo $nl . '<p>1.9  ' . $var9 . '</p>';

/*
1.10 Set a string variable using double quotes, with one of the above variables inside.
*/

echo $nl . "<p>1.10  The value is: $var9 </p>";

/* 
1.11 Set a variable that concatonates a string in single quotes and a string in double quotes.
*/

$var11 = 'single quotes ' . "double quotes";
echo $nl . '<p>1.11  ' . $var11 . '</p>';

/*
1.12 Set a string variable with double quotes and escaped double quotes inside of it.
*/

$var12 = "He says \"double quotes\".";
echo $nl . '<p>1.12  ' . $var12 . '</p>';

/*
1.13 Echo one of the above variables to the web page, followed by an HTML break tag.
*/

echo $nl . '<p>1.13  ' . $var12 . '</p><br>';

/*
1.14 Replace characters within the above variable with other characters, and echo the new value to the web page, followed by an HTML break tag.
*/

echo $nl . '<p>1.14  ' . str_replace('new', 'World!', $var9) . '</p><br>';

/*
1.15 Set a string variable with some HTML tags in it, and echo it to the web page, followed by an HTML break tag.
*/

$var15 = '<h2>A string variable with some HTML tags in it</h2><br>';
echo $nl . '<p>1.15  ' . $var15 . '</p><br>';

/* 
1.16 Use strip_tags() on the above variable and echo it to the web page again, followed by an HTML break tag.
*/

echo $nl . '<p>1.16  ' . strip_tags($var15) . '</p><br>';

/* 
1.17 Set a variable in single quotes that includes the following inside: double quotes, an ampersand, less than, greater than.
*/

$var17 = '""&<>';
echo $nl . '<p>1.17  ' . $var17 . '</p>';

/* 
1.18 Use htmlentities() on the above variable, and echo it to the web page, followed by an HTML break tag,
THEN view the source code of the page in a browser and 
THEN create a multi-line PHP comment in this file
THEN copy and paste the exact text of that variable as it appears in the HTML source code.
*/

echo $nl . '<p>1.18  ' . htmlentities($var17) . '</p><br>';
/*
<p>1.18  &quot;&quot;&amp;&lt;&gt;</p><br>
*/

/* 
1.19 Write a single line PHP comment.
*/

// a single line PHP comment

/* 
1.20 Use PHP to get the current date and time, and echo it to the web page in this format: YYYY-MM-DD HH:MM:SS where HH is 24 hour time (not 12 hours).
*/

$var20 = date("Y-m-d H:i:s");
echo $nl . '<p>1.20  ' . $var20 . '</p>';



/*
TOPIC 2: ARRAYS
*/

/*
2.1 Declare variable as an empty array.
*/

$array1 = array();
echo $nl . '<p>2.1</p>';
echo '<pre>' . print_r($array1, true) . '</pre>';

/* 
2.2 Add five values, one at a time, to the above array (as a simple array)
*/

$array1[] = 'one';
$array1[] = 'two';
$array1[] = 'three';
$array1[] = 'four';
$array1[] = 'five';
echo $nl . '<p>2.2</p>';
echo '<pre>' . print_r($array1, true) . '</pre>';

/*
2.3 Create a simple array with 5 values already in the array when you declare it.
*/

$array2 = array('one','two','three','four','five');
echo $nl . '<p>2.3</p>';
echo '<pre>' . print_r($array2, true) . '</pre>';

/*
2.4 Use print_r() on one of the arrays above
*/

echo $nl . '<p>2.4</p>';
echo print_r($array2, true);

/*
2.5 Use print_r() surrounded by <pre> tags on one of the arrays above.
*/

echo $nl . '<p>2.5</p>';
echo '<pre>' . print_r($array2, true) . '</pre>';

/*
2.6 Combine the two arrays into one array.
*/

$array3 = array_merge($array1,$array2);
echo $nl . '<p>2.6</p>';
echo '<pre>' . print_r($array3, true) . '</pre>';

/*
2.7 Use print_r() surrounded by <pre> tags on the combined array.
*/

echo $nl . '<p>2.7</p>';
echo '<pre>' . print_r($array3, true) . '</pre>';

/*
2.8 Sort the combined array alphabetically and use print_r() surrounded by <pre> tags on the array.
*/

sort($array3);
echo $nl . '<p>2.8</p>';
echo '<pre>' . print_r($array3, true) . '</pre>';

/*
2.9 Sort the combined array in reverse alphabetical order and use print_r() surrounded by <pre> tags on the array.
*/

rsort($array3);
echo $nl . '<p>2.9</p>';
echo '<pre>' . print_r($array3, true) . '</pre>';

/*
2.10 Set a new variable to the resulting value of using implode() on the combined array, and echo the result to the web page,
THEN paste the result into a PHP comment.
*/

$var21 = implode(', ', $array3);
echo $nl . '<p>2.10</p>';
echo $nl .'<p>' . $var21 . '</p>';

/* 
2.11 Use a built-in PHP function to count the total number of items in the array.
*/

echo $nl . '<p>2.11</p>';
echo $nl .'<p>' . count($array3) . '</p>';

/*
2.12 Echo the second item in the array, using the numeric key of the array.
*/

echo $nl . '<p>2.12</p>';
echo $nl .'<p>' . $array3[1] . '</p>';

/*
2.13 Create a multi-dimensional array of 5 key/value pairs.
*/

$array4 = [
	'E' => 'a',
	'A' => 'e',
	'B' => 'b',
	'C' => 'c',
	'D' => 'd'
];
echo $nl . '<p>2.13</p>';
echo '<pre>' . print_r($array4, true) . '</pre>';

/*
2.14 Use a built-in PHP function to sort this array by the keys, and use print_r() surrounded by <pre> tags on the array.
*/

ksort($array4);
echo $nl . '<p>2.14</p>';
echo '<pre>' . print_r($array4, true) . '</pre>';

/*
2.14 Use a built-in PHP function to sort this array by the values, and use print_r() surrounded by <pre> tags on the array.
*/

asort($array4);
echo $nl . '<p>2.14</p>';
echo '<pre>' . print_r($array4, true) . '</pre>';

/*
2.15 Add another key/value pair to this array, then sort it again by the keys, and use print_r() surrounded by <pre> tags on the array.
*/

$array4['Z'] = 'b';
ksort($array4);
echo $nl . '<p>2.15</p>';
echo '<pre>' . print_r($array4, true) . '</pre>';



/*
TOPIC 3: CONDITIONAL LOGIC
*/


/*
3.1 Write a simple if/else test to see if a variable contains any value, and echo the result to the web page.
*/

echo $nl . '<p>3.1</p>';
$var30 = 30;
if ($var30){
	echo $nl . '<p>The variable has a value, which is: ' . $var30 . '.</p>';
} else {
	echo $nl . '<p>The variable has NO value.</p>';
}


/* 
3.2 Write an if/else test with 4 possibilities. For example, if it is equal to x, y, or z (you can choose what values to test for), else default,
and echo the result to the web page.
*/

$var32 = 'x';
echo $nl . '<p>3.2</p>';
if ($var32 == 'x'){
	echo '<p>The variable is x.</p>';
} elseif ($var32 == 'y') {
	echo '<p>The variable is y.</p>';
} elseif ($var32 == 'z') {
	echo '<p>The variable is z.</p>';
} else {
	echo '<p>The variable is neither x, y, nor z.</p>';
}

/*
3.3 Write a test for the exact same conditions as above, but use switch/case syntax, and echo the result to the web page.
*/

$var32 = 'x';
echo $nl . '<p>3.3</p>';

switch ($var32) {
  case 'x':
    echo '<p>The variable is x.</p>';
    break;
  case 'y':
    echo '<p>The variable is y.</p>';
    break;
  case 'z':
    echo '<p>The variable is z.</p>';
    break;
  default:
    echo '<p>The variable is neither x, y, nor z.</p>';
}

/*
3.4 Write an if/else test in which two conditions must both be true, and echo the result to the web page.
*/

echo $nl . '<p>3.4</p>';
$var32 = 'x';
$var33 = 123;
if ((!is_int($var32)) && (!is_int($var33))) {
	echo '<p>Both conditions are true.</p>';
} else {
	echo '<p>At least one of the conditions is false.</p>';
}

/* 
3.5 Write an if/else test in which either one condition or the other must be true, and echo the result to the web page.
*/

echo $nl . '<p>3.5</p>';
$var32 = 'x';
$var33 = 123;
if ((!is_int($var32)) || (!is_int($var33))) {
	echo '<p>Either one of the conditions is true.</p>';
} else {
	echo '<p>Both conditions are false.</p>';
}


/*
3.6 Write an if/else test in which either two conditions must both be true or another condition must be true, and echo the result to the web page.
*/

echo $nl . '<p>3.6</p>';
$var32 = 'x';
$var33 = 123;
if ((!is_int($var32)) ^ (!is_int($var33))) {
	echo '<p>Either one of the conditions is true, but not both.</p>';
} else {
	echo '<p>Both conditions are true or false.</p>';
}

/*
3.7 Write an if/else test using the not operator (the exclamation mark), and echo the result to the web page.
*/

echo $nl . '<p>3.7</p>';
$var30 = 30;
if (!is_int($var30)){
	echo $nl . '<p>The variable is not an integer.</p>';
} else {
	echo $nl . '<p>The variable is an integer.</p>';
}

/*
3.8 Write an if/else test to find out if the first character of a string is the letter "A", and echo the result to the web page.
*/

$var38 = 'BCD';
echo $nl . '<p>3.8</p>';
if ($var38[0] == 'A'){
	echo $nl . '<p>The first character of the string is the letter "A".</p>';
} else {
	echo $nl . '<p>The first character of the string is NOT the letter "A".</p>';
}

/* 
3.9 Write an if/else test to find out if a variable value is an integer, or an array, or if neither, and echo the result to the web page.
*/

echo $nl . '<p>3.9</p>';
$var30 = array();
if (is_int($var30)){
	echo $nl . '<p>The variable is an integer.</p>';
} elseif (is_array($var30)) {
	echo $nl . '<p>The variable is an array.</p>';
} else {
	echo $nl . '<p>The variable is neither an array nor an integer.</p>';
}


/*
3.10 Write an if/else test to find out if a simple array contains a particular value 
(you can use one of your simple arrays that you created earlier in this file), and echo the result to the web page.
*/

$array2 = array('one','two','three','four','five');
echo $nl . '<p>3.10</p>';
if (in_array('two', $array2)) {
	echo '<p>The array contains "two".</p>';
} else {
	echo '<p>The array does not contain "two".</p>';
}


/*
3.11 Use the null coalescing operator to set the value of a variable to either:
1. the value of another variable, if it is not empty, or
2. a default value
and echo the resulting value of the variable to the web page.
*/

echo $nl . '<p>3.11</p>';
$var34 = $var100 ?? 'default';
echo $nl .'<p>' . $var34 . '</p>';




/*
TOPIC 4: MATH CALCULATIONS
*/

/*
4.1 Create two variables as integers, then create a third variable as the sum of the first two, and echo the result to the web page.
*/

$var35 = 35;
$var36 = 36;
$var37 = $var35 + $var36;
echo $nl . '<p>4.1</p>';
echo $nl .'<p>' . $var37 . '</p>';

/*
4.2 Create another variable as the product (multiplied value) of the two variables, and echo the result to the web page.
*/

$var38 = $var35 * $var36;
echo $nl . '<p>4.2</p>';
echo $nl .'<p>' . $var38 . '</p>';


/*
4.3 Create another variable as the quotient (divided by) of the two variables, and echo the result to the web page.
*/

$var39 = $var35 / $var36;
echo $nl . '<p>4.3</p>';
echo $nl .'<p>' . $var39 . '</p>';




/*
TOPIC 5: LOOPS
*/

/*
5.1 Write a for() loop to echo each value of a simple array (you can use one of your arrays above), with each item on its own line on the web page.
*/

echo $nl . '<p>5.1</p>';

$colors = array("red", "green", "blue", "yellow");

for ($i = 0; $i < count($colors); $i++) {
	echo "<p>$colors[$i]</p>";
}

/*
5.2 Write a while() loop to do the same task as above.
*/

echo $nl . '<p>5.2</p>';

$colors = array("red", "green", "blue", "yellow");
$arrayLength = count($colors);

$i = 0;
while ($i < $arrayLength) {
	echo "<p>$colors[$i]</p>";
    $i++;
}

/*
5.3 Write a foreach() loop to do the same task as above.
*/

echo $nl . '<p>5.3</p>';

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "<p>$value</p>";
}

/*
5.4 Write a foreach() loop to echo the key/value pairs of a multidimensional array (you can use one of your multidimensional arrays above).
*/

$array1 = [
	'Japan' => 'Tokyo',
	'France' => 'Paris',
	'Germany' => 'Berlin',
	'United Kingdom' => 'London',
	'United States' => 'Washington D.C.'
];

echo $nl . '<p>5.4</p>';
foreach($array1 as $key=>$value) {
	echo '<p>' . $key . ' => ' . $value . '</p>';
}

/*
5.5 Write a foreach() loop to find out if a multidimensional array contains a particular KEY, and echo the result to the web page.
*/

echo $nl . '<p>5.5</p>';
foreach($array1 as $key=>$value) {
	if ($key == 'United States') {
		echo '<p>Yes. ' . $key . ' => ' . $value . '</p>';
	} else {
		echo '<p>KEY is not "United States".</p>';
	}
}


/*
5.6 Write a foreach() loop to find out if a multidimensional array contains a particular VALUE, and echo the result to the web page.
*/

echo $nl . '<p>5.6</p>';
foreach($array1 as $key=>$value) {
	if ($value == 'London') {
		echo '<p> Yes. ' . $key . ' => ' . $value . '</p>';
	} else {
		echo '<p>VALUE is NOT "London".</p>';
	}

}



/*
TOPIC 6: FUNCTIONS
*/

/*
6.6 Write a function to do the task in exercise 5.5 above, and send an array into that function, 
plus the value to check for (2 parameters in total), and echo the result to the web page.
You don't have to write new logic here. Just take the same logic as in 5.5. and wrap it in a function.
*/

function checkArrayKey($keySearch, $array){
	$nl = "\r\r";
	if (array_key_exists($keySearch, $array)) {
		return $nl . '<p>' . $keySearch . ' is one of the array keys.</p>';
	} else {
		return $nl . '<p>' . $keySearch . ' is NOT one of the array keys.</p>';
	}
}
echo $nl . '<p>6.6</p>';
$output = checkArrayKey('Japan', $array1);
$output .= checkArrayKey('China', $array1);
echo $output;


/*
6.7 Create another function that can check either the key or the value (the logic from 5.5. and 5.6 above). To call this function,
you want to send three parameters to it:
1. an array
2. the value you want to find
3. whether to search for it in the key or in the value of the array's key/value pairs.
*/

function checkArrayKeyOrValue($array, $search, $keyOrValue){
	$nl = "\r\r";
	if (strtolower($keyOrValue) == 'key'){
	if (array_key_exists($search, $array)) {
		return $nl . '<p>' . $search . ' is one of the array keys.</p>';
	} else {
		return $nl . '<p>' . $search . ' is NOT one of the array keys.</p>';
	}} elseif (strtolower($keyOrValue) == 'value') {
		if (in_array($search, $array)) {
		return $nl . '<p>' . $search . ' is one of the array values.</p>';
	} else {
		return $nl . '<p>' . $search . ' is NOT one of the array values.</p>';
	}}
}
echo $nl . '<p>6.7</p>';
$output = checkArrayKeyOrValue($array1, 'Japan', 'key');
$output .= checkArrayKeyOrValue($array1, 'Beijing', 'VALUE');
$output .= checkArrayKeyOrValue($array1, 'Korea', 'KEY');
$output .= checkArrayKeyOrValue($array1, 'London', 'Value');
echo $output;

?>

	</body>
</html>
