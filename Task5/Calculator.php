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
                        $del=substr($argv[2],2,1);
                        $data=substr($argv[2],5,strlen($argv[2])-5);
                        $arr = explode($del,$data);
                        $flag=$this->checkNegative($arr);
                        if($flag){
                            $sum = $this->calculateSum($arr);
                            echo $sum;
                        } else {
                            echo "Error: Negative numbers not allowed";
                        }
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
         * check Negative value
         * @param Array $arr
         */
        function checkNegative($arr){
            foreach ($arr as $val){
                if($val < 0){
                    return false;
                }
            }
            return true;
        }
    }
    
    //Create Object
    $obj=new Calculator();
    $obj->getCalculated($argv);
?>