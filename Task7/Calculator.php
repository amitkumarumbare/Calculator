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
                        $arr = explode(',',$argv[2]);
                        $negarr=$this->removeLargeno($arr);
                        $sum = $this->calculateSum($negarr);
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
        
        /**
         * check large no and remove this value
         * @param Array $arr
         * @return boolean
         */
        function removeLargeno($arr){
            $negarr=array();
            foreach ($arr as $val){
                if($val < 1000){
                    $negarr[]=$val;
                }
            }
            return $negarr;
        }
    }
    
    //Create Object
    $obj=new Calculator();
    $obj->getCalculated($argv);
?>