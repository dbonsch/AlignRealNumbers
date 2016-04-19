<?php 

header('Content-type: text/plain');

$elements = [0,1,2,3,4,5,6,7,8,9];

// warning 5 is the max amount browsers can handle
$depth = 5;

// avaoid to check for 0X Values
echo "0\n";


for ( $c1 = 1; $c1 <= $depth; ++ $c1  )
{
    buildRow(0,$c1,$elements);
}  

function buildRow($num, $max, $elements, $prev = [])
{
    
    if ($num == $max) {
        //echo "|$num == $max|";

        $fullNum = implode('',$prev);
        
        if ( !bccomp('0', $fullNum ) ){
            return;
        }
        
        if ($prev[0] != 0) {
            echo $fullNum."\n";
        }
        
        $numEntry = count($prev);
        
        if ($numEntry == 1) {
            return;
        }
        
        $preStack = [];
        
        for ($pos = 0; $pos < $numEntry-1 ; ++$pos ) {
   
            $preStack[] = array_shift($prev);
            
            $end = implode('', $prev);
            
            // no zero after comma
            if ( !bccomp('0', $end ) ){
                continue;
            }
            
            echo implode('', $preStack).'.'.implode('', $prev)."\n";
            
            // don't need more than one leading zero
            if($preStack[0] == 0){
                break;
            }
            
            
        }
        
        
        //echo '-'.implode('',$prev)."\n";
        return;
    }
    
    for ($p = 0; $p < count($elements); ++$p) {
        $next = $prev;
        $next[] = $elements[$p];
        buildRow($num+1, $max, $elements, $next);
    }

}

/* Output:

*/
