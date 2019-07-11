<?php
class LocalizedDecimalField extends DecimalField {

	function clean($value){
		$value = preg_replace('/\'/','',$value); // "123'456" -> "123456"

		$decimal_point = Atk14Locale::DecimalPoint();
		$thousands_separator = Atk14Locale::ThousandsSeparator();

		$value = str_replace($thousands_separator,'',$value);
		$value = str_replace($decimal_point,'.',$value);

		return parent::clean($value);
	}

	function format_initial_data($data){
		return Atk14Locale::FormatNumber($data);
	}
}
