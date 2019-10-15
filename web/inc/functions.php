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
 * Get a parameter from get request array.
 *
 * @param name Name of the parameter
 * @param default Value returned if there were no parameter.
 *
 * @return Parameter value.
 */
function get_parameter_get ($name, $default = "") {
	if ((isset ($_GET[$name])) && ($_GET[$name] != ""))
		return safe_input ($_GET[$name]);

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
		return safe_input ($_POST[$name]);

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