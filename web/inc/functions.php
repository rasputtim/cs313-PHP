<?php
function ValidateEmail($email)
{

$regex = '/([a-z0-9_.-]+)'. # name

'@'. # at

'([a-z0-9.-]+){2,255}'. # domain & possibly subdomains

'.'. # period

'([a-z]+){2,10}/i'; # domain extension 

if($email == '') { 
	return false;
}
else {
$eregi = preg_replace($regex, '', $email);
}

return empty($eregi) ? true : false;
}

/**
 * Cleans a string by encoding to UTF-8 and replacing the HTML
 * entities. UTF-8 is necessary for foreign chars like asian
 * and our databases are (or should be) UTF-8
 *
 * @param mixed String or array of strings to be cleaned.
 *
 * @return mixed The cleaned string or array.
 */
function safe_input($value) {
	//Stop!! Are you sure to modify this critical code? Because the older
	//versions are serius headache in many places.

	if (is_numeric($value))
		return $value;

	if (is_array($value)) {
		array_walk($value, "safe_input_array");
		return $value;
	}


	//Clean the trash mix into string because of magic quotes.
	//if (get_magic_quotes_gpc() == 1) {
		$value = stripslashes($value);
	//}

	//if (! mb_check_encoding ($value, 'UTF-8'))
		$value = utf8_encode ($value);

	$valueHtmlEncode =  htmlentities ($value);
	//$valueHtmlEncode =  htmlspecialchars($value); //
	//Replace the character '\' for the equivalent html entitie
	$valueHtmlEncode = str_replace('\\', "&#92;", $valueHtmlEncode);

	// First attempt to avoid SQL Injection based on SQL comments
	// Specific for MySQL.
	$valueHtmlEncode = str_replace('/*', "&#47;&#42;", $valueHtmlEncode);
	$valueHtmlEncode = str_replace('*/', "&#42;&#47;", $valueHtmlEncode);

	//Replace ( for the html entitie
	$valueHtmlEncode = str_replace('(', "&#40;", $valueHtmlEncode);

	//Replace ( for the html entitie
	$valueHtmlEncode = str_replace(')', "&#41;", $valueHtmlEncode);

	//Replace some characteres for html entities
	//for ($i=0;$i<33;$i++) {
	//	$valueHtmlEncode = str_ireplace(chr($i),ascii_to_html($i), $valueHtmlEncode);
	//}

	return $valueHtmlEncode;
}


/**
 * Get a parameter from get request array.
 *
 * @param name Name of the parameter
 * @param default Value returned if there were no parameter.
 *
 * @return Parameter value.
 */
function get_parameter_get ($name, $default = "") {
	if ((isset ($_GET[$name])) && ($_GET[$name] != ""))
		return safe_input($_GET[$name]);

	return $default;
}

/**
 * Get a parameter from post request array.
 *
 * @param name Name of the parameter
 * @param default Value returned if there were no parameter.
 *
 * @return Parameter value.
 */
function get_parameter_post ($name, $default = "") {
	if ((isset ($_POST[$name])) && ($_POST[$name] != ""))
		return safe_input($_POST[$name]);

	return $default;
}

/**
 * Get a paramter from a request.
 *
 * It checks first on post request, if there were nothing defined, it
 * would return get request
 *
 * @param name
 * @param default
 *
 * @return
 */
function get_parameter ($name, $default = '') {

	
	// POST has precedence
	if (isset($_POST[$name]))
		return get_parameter_post ($name, $default);

	if (isset($_GET[$name]))
		return get_parameter_get ($name, $default);

	return $default;
}



?>