<?php 
require_once('functions.php');
require_once('functions_db.php');

/**
 * Render an input text element.
 *
 * @param string Input name.
 * @param string Input value.
 * @param string Alternative HTML string (optional).
 * @param int Size of the input (optional).
 * @param int Maximum length allowed (optional).
 * @param bool Whether to return an output string or echo now (optional, echo by default).
 */
function print_input_text ($name, $value, $alt = '', $size = 50, $maxlength = 0,  $onblur='', $onfocus='', $return = false, $label = false, $disabled = false) {
	$output = print_input_text_extended ($name, $value, 'text-'.$name, $alt, $size, $maxlength, $disabled, '', $onblur, $onfocus, '', true, false, $label);

	if ($return)
		return $output;
	echo $output;
}

/**
 * Render an input text element. Extended version, use print_input_text() to simplify.
 *
 * @param string Input name.
 * @param string Input value.
 * @param string Alternative HTML string.
 * @param int Size of the input.
 * @param int Maximum length allowed.
 * @param bool Disable the button (optional, button enabled by default).
 * @param string Alternative HTML string.
 * @param bool Whether to return an output string or echo now (optional, echo by default).
 */
function print_input_text_extended ($name, $value, $id, $alt, $size, $maxlength, $disabled, $script,  $onblur, $onfocus, $attributes, $return = false, $password = false, $label = false) {
	$type = $password ? 'password' : 'text';

	$output = '';

	if ($label) {
		$output .= print_label ($label, $id, '', true);
	}

	if (empty ($name)) {
		$name = 'unnamed';
	}

	if (empty ($alt)) {
		$alt = 'textfield';
	}

	if (! empty ($maxlength)) {
		$maxlength = ' maxlength="'.$maxlength.'" ';
	}

	if (! empty ($script)) {
		$script = ' onClick="'.$script.'" ';
	}
	if (! empty ($onblur)) {
		$onblur = ' onBlur="'.$onblur.'" ';
	}
	if (! empty ($onfocus)) {
		$onfocus = ' onFocus="'.$onfocus.'" ';
	}

	$output .= '<input name="'.$name.'" type="'.$type.'" value="'.$value.'" size="'.$size.'" '.$maxlength.' alt="'.$alt.'" '.$script.$onblur.$onfocus;
	$output .= ' id="'.$id.'"';

	if ($disabled)
		$output .= ' disabled';

	if (is_array($attributes)) {
		foreach ($attributes as $name => $value) {
			$output .= ' ' . $name . '="' . $value . '"';
		}
	}
	else {
		if ($attributes != '')
			$output .= ' '.  $attributes;
	}
	$output .= ' />';

	if ($return)
		return $output;
	echo $output;
}

/**
 * Render a label for a input elemennt.
 *
 * @param string Label to add.
 * @param string Input id to refer.
 * @param string Input type of the element. The id of the elements using print_* functions add a prefix, this
 * variable helps with that. Values: text, password, textarea, button, submit, hidden, select. Default: text.
 * @param bool Whether to return an output string or echo now (optional, echo by default).
 * @param string Extra HTML to add after the label.
 */
function print_label ($label, $id, $input_type = 'text', $return = false, $html = false) {
	$output = '';

	switch ($input_type) {
	case 'text':
		$id = 'text-'.$id;
		break;
	case 'password':
		$id = 'password-'.$id;
		break;
	case 'textarea':
		$id = 'textarea-'.$id;
		break;
	case 'button':
		$id = 'button-'.$id;
		break;
	case 'submit':
		$id = 'submit-'.$id;
		break;
	case 'hidden':
		$id = 'hidden-'.$id;
		break;
	case 'checkbox':
		$id = 'checkbox-'.$id;
		break;
	case 'file':
		$id = 'file-'.$id;
		break;
	case 'image':
		$id = 'image-'.$id;
		break;
	case 'select':
	default:
		break;
	}

	$output .= '<label id="label-'.$id.'" for="'.$id.'">';
	$output .= $label;
	$output .= '</label>';

	if ($html)
		$output .= $html;

	if ($return)
		return $output;

	echo $output;
}


/**
 * Prints an array of fields in a popup menu of a form.
 *
 * Based on choose_from_menu() from Moodle
 *
 * $fields Array with dropdown values. Example: $fields["value"] = "label"
 * $name Select form name
 * $selected Current selected value.
 * $script Javascript onChange code.
 * $nothing Label when nothing is selected.
 * $nothing_value Value when nothing is selected
 */

function print_select ($fields, $name, $selected = '', $script = '', $nothing = 'select', $nothing_value = '0', $return = false, $multiple = 0, $sort = true, $label = false, $disabled = false, $style='') {

	$output = "\n";

	if ($label) {
		$output .= print_label ($label, $name, 'select', true);
	}

	$attributes = ($script) ? 'onchange="'. $script .'"' : '';
	if ($multiple) {
		$attributes .= ' multiple="yes" size="'.$multiple.'" ';
	}

	if ($disabled) {
		$disabledText = 'disabled';
	}
	else {
		$disabledText = '';
	}

	if ($style == "")
		$output .= '<select style="width: 170px" ' . $disabledText . ' id="'.$name.'" name="'.$name.'" '.$attributes.">\n";
	else
		$output .= '<select style="'.$style.'" ' . $disabledText . ' id="'.$name.'" name="'.$name.'" '.$attributes.">\n";

	if ($nothing != '') {
		$output .= '   <option value="'.$nothing_value.'"';
		if ($nothing_value == $selected) {
			$output .= " selected";
		}
		$output .= '>'.$nothing."</option>\n";
	}

	if (!empty ($fields)) {
		if ($sort)
			asort ($fields);
		foreach ($fields as $value => $label) {
			$optlabel = $label;
			if(is_array($label)){
				if(!isset($lastopttype) || ($label['optgroup'] != $lastopttype)) {
					if(isset($lastopttype) && ($lastopttype != '')) {
						$output .=  '</optgroup>';
					}
					$output .=  '<optgroup label="'.$label['optgroup'].'">';
					$lastopttype = $label['optgroup'];
				}
				$optlabel = $label['name'];
			}

			$output .= '   <option value="'. $value .'"';
			if (safe_output($value) == safe_output($selected)) {
				$output .= ' selected';
			}
			if ($optlabel === '') {
				$output .= '>'. $value ."</option>\n";
			} else {
				$output .= '>'. $optlabel ."</option>\n";
			}
		}
	}

	$output .= "</select>\n";
	if ($return)
		return $output;

	echo $output;
}




/**
 * Prints an array of fields in a popup menu of a form based on a SQL query.
 * The first and second columns of the query will be used.
 *
 * Based on choose_from_menu() from Moodle
 *
 * $sql SQL sentence, the first field will be the identifier of the option.
 *      The second field will be the shown value in the dropdown.
 * $name Select form name
 * $selected Current selected value.
 * $script Javascript onChange code.
 * $nothing Label when nothing is selected.
 * $nothing_value Value when nothing is selected
 */
function print_select_from_sql ($sql, $name, $selected = '', $script = '', $nothing = 'select', $nothing_value = '0', $return = false, $multiple = false, $sort = true, $label = false, $disabled = false) {

	$fields = array ();
    
    $result = get_db()->query($sql);
        
	if (! $result) {
		echo "<H3> ERROR IN QUERY </H3>";
		return "";
	}

	foreach ( $result as $row)
	{
		
		$fields[$row[0]] = $row[1];
	}

	$output = print_select ($fields, $name, $selected, $script, $nothing, $nothing_value, true, $multiple, $sort, $label, $disabled);

	if ($return)
		return $output;

	echo $output;
}


?>