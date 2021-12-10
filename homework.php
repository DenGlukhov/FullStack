<?php

//Task 1: Keep Hydrated!
//https://www.codewars.com/kata/582cb0224e56e068d800003c/php

function litres($t) {
    
    $water = 0.5 * $t;
    return floor($water);
  }

//Task 2: String repeat
//https://www.codewars.com/kata/57a0e5c372292dd76d000d7e

  function repeatStr($n, $str) {
    
    /*$outputString = ''; //Способ, который я реализовал.
    for ($i = 0; $i < $n; $i++) {
      $outputString .= $str;
    }
    return $outputString;*/
  
    return str_repeat($str, $n); //Способ, который удалось нагуглить.
}

//Task 3: Reversed Strings
//https://www.codewars.com/kata/5168bb5dfe9a00b126000018/php

function solution($str) {
    
    /*$outputString = ''; //Способ, который я реализовал.
    for ($i = strlen($str); $i >= 0 ; $i--) {
     $outputString .= $str[$i];
    }
    return $outputString;*/

    return strrev($str); //Способ, который удалось нагуглить.
  }

//Task 4: Thinkful - String Drills: Quotable
//https://www.codewars.com/kata/5859c82bd41fc6207900007a/php

  function quotable($name, $quote) {
  
    $string = "$name said: \"$quote\"";
    return $string;
}

//Task 5: Vowel Count
//https://www.codewars.com/kata/54ff3102c1bad923760001f3/php

function getCount($str) {
    
    $vowelsCount = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || $str[$i] == 'o' || $str[$i] == 'u') {
         $vowelsCount++;
        }
    }
    return $vowelsCount;
}

//Task 6: Persistent Bugger "Задача еще не решена"
//https://www.codewars.com/kata/55bf01e5a717a0d57e0000ec/php

function persistence(int $num): int {
    
  
  }

//Task 7: Get Nth Even Number
//https://www.codewars.com/kata/5933a1f8552bc2750a0000ed/php

function nthEven($n) {
    
    if ($n > 0) {
        return $n * 2 - 2;
    }
  }