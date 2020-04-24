<?php
namespace Dadi;

use core\EquationInterface;

// Решение квадратного уравнения ax^2 + bx + c = 0
Class Square extends Linear implements EquationInterface {

  protected function findDiscriminant($a, $b, $c) {
	   return pow($b, 2) - 4 * $a * $c;
  }

  public function solve($a, $b, $c) {
  	if($a == 0) {
		$this->x = array($this->linearSolve($b, $c));
		return $this->x[0];
    }

    Log::log("Entered equation is square");

  	$disc = $this->findDiscriminant($a, $b, $c);

  	if($disc < 0) {
  		throw new MyException("This equation has no roots");
  	}

  	if($disc > 0) {
  	  array_push($this->x, round((-1 * $b + sqrt($disc))/(2 * $a), 3), round((-1 * $b - sqrt($disc))/(2 * $a), 3));
  	}

  	if($disc == 0) {
  	  $this->x[] = (-1 * $b)/(2 * $a);
  	}

  	return $this->x;
  }

}

?>
