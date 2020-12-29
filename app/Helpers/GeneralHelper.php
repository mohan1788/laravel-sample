<?php
namespace App\Helpers;

class GeneralHelper
{
    public function sort(&$a, $start = 0, $last = null) {    
        // Init
        $wall = $start;
        $last = is_null($last) ? count($a) - 1 : $last;
        
        if($last - $start < 1) {
            return;
        }
        
        $this->__swapValues($a, (int) (($start + $last) / 2), $last);
        
        for ($i = $start; $i < $last; $i++) {
            if ($a[$i] < $a[$last]) {
                $this->__swapValues($a, $i, $wall);
                $wall++;
            }
        }
        
        $this->__swapValues($a, $wall, $last);
        $this->sort($a, $start, $wall - 1);
        $this->sort($a, $wall + 1, $last);  
    }

    private function __swapValues(&$a, $i1, $i2) {
        if ($i1 !== $i2) {
            $temp = $a[$i1];
            $a[$i1] = $a[$i2];
            $a[$i2] = $temp;
        }
    }
}