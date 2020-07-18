<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntegerController extends Controller
{
	// --------------------------------------------------------------------
	/**
	 * Numbers
	 *
	 * Note: Lets users set their own tag name on the fly.
	 *
	 * @param string $tag for html tag name
	 * @param variable $numbers to hold the number number
	 * @param variable $min_int to hold the number minimum number
	 * @param variable $max_int to hold the number maximum number
	 *
	 * Example: Integer::Write('li', 2000, 2017);
	 */
	public static function Write($tag, $min_int, $max_int) {
		if(empty($tag)):
			for ($number =  $min_int; $number <= $max_int; $number++) {
				echo $tag;
				echo $number;
				echo $tag;
			}

		else:

			for ($number =  $min_int; $number <= $max_int; $number++){
				echo '<'.$tag.'>';
				echo $number;
				echo '</'.$tag.'>';
			}
		endif;
	}


	/*

		Return random numbers

		*/
	public static function RandInt($randomLength) {
		$length = $randomLength; //to generate the length of numbers you desire;
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomStrings = '';
		for ($i = 0; $i < $length; $i++){
			$randomStrings .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomStrings;
	}
}
