<?php 
    
    /**
    *Create Calculator class 
    */
    class Calculator extends CommonFunction{
        /**
         * Read command line parameter and return sum of inputed data
         * @param Array $argv
         */
        function getCalculated($argv){
            //check command line parameter is set
            if(isset($argv[1])) {	
                if(strtolower($argv[1]) == 'multiply') {
                    if(isset($argv[2])) {
                       $flag=strpos($argv[2], '\n');
                       $flag1=strpos($argv[2], '//');
                        if(!empty($flag)){
                            $arrdata=str_replace('\n',',',$argv[2]);
                            $arr = explode(',',$arrdata);
                        } 
                        if(!empty($flag1)){
                            $del=substr($argv[2],2,1);
                            $data=substr($argv[2],5,strlen($argv[2])-5);
                            $arr = explode($del,$data);
                        } else {
                            $arr = explode(',',$argv[2]);
                            $arr=$this::removeLargeno($arr);
                        }
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
    /**
    *Create CommonFunction class 
    */
    class CommonFunction{
                
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