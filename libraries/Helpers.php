<?
	function coalesce() {
		$args = func_get_args();
		foreach($args as $arg) {
			if(!empty($arg)) { return $arg; }
		}
		return $args[0];
	}
	function empty_r(Array $x) {
		if(empty($x)) return true;
		foreach($x as $y)
			if(!empty($y)) return false;
		return true;
	}
	function print_p($x) { echo "<pre>".print_r($x,1)."</pre>"; }
	function trunc($string, $chars) {
		if(strlen( $string ) > $chars) {
			return substr( $string, 0, $chars )."...";
		} else {
			return $string;
		}
	}
	function sum(Array $x) {
		$sum = 0;
		foreach($x as $v) { $sum += $v; }
		return $sum;
	}
	function avg(Array $x) {
		if(count($x) == 0) return null;
		$sum = sum($x);
		return $sum/count($x);
	}
	function sum_sq(Array $x) {
		$sumSq = 0;
		foreach($x as $v) { $sumSq += pow($v, 2); }
		return $sumSq;
	}
	function stdev(Array $x) {
		$n = count($x);
		if($n == 0 || ($n - 1) == 0) return null;
		$sum = sum($x);
		$sumSq = sum_sq($x);
		return sqrt(($sumSq - (pow($sum, 2)/$n))/($n - 1));
	}
