<?php 
    
    /**
    *Create Calculator class 
    */
    class Calculator{
        
        /**
         * Read command line parameter and return sum of inputed data
         * @param Array $argv
         */
        function getCalculated($argv){
            
            //check command line parameter is set
            if(isset($argv[1])) {	
                if(strtolower($argv[1]) == 'add') {
                    if(isset($argv[2])) {	
                        $arrdata=str_replace('\n',',',$argv[2]);
                        $arr = explode(',',$arrdata);
                        $sum = $this->calculateSum($arr);
                        echo $sum;
                    } else {
                        echo 0;
                    }
                } else {
                    echo "Invalid Method Name.";
                }	
            } else {
                echo "Invalid Method Call.";
            }	
        }
        
        /**
         * Calculate sum of array
         * @param array $arr
         * @return int
         */
        function calculateSum($arr){
            if(count($arr) > 0) {
                return array_sum($arr);
            }
            return 0;
        }
    }
    
    //Create Object
    $obj=new Calculator();
    $obj->getCalculated($argv);
?>