<?php

	function duit($value)
	{
	    return 'Rp.'.number_format($value, 2, ',', '.' );
	}

	function infaq($value)
	{
		return  (2.5 / 100) * $value;
	}

	function _tglFormat($value){
		return date("d M Y", strtotime($value));
	}
