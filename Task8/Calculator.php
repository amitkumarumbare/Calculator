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
                        $s=0;$arr=array();
                        $arrdata=$argv[2];
                        $flag=strpos($arrdata, '\n');
                        if($flag !== false){
                            $s++;
                            $arrd=str_replace('\n',',',$arrdata);
                            $arr = explode(',',$arrd);
                        } 
                        $flag1=preg_match('/[\\\]/',$arrdata);
                        if($flag1){
                            $s++;
                            $del=substr($arrdata,2,1);
                            $data=substr($arrdata,5,strlen($arrdata)-5);
                            $arr = explode($del,$data);
                        } 
                        if($s==0){
                            $arr = explode(',',$arrdata);
                        }
                        $flag=$this->checkNegative($arr);
                        if(!$flag){
                            $negarr=$this->checkNegativearray($arr);
                            $negdata = implode(',',$negarr);
                            echo "Error: Negative numbers(".$negdata.") not allowed";
                            exit;
                        }
                        $arr=$this::removeLargeno($arr);
                        $sum = $this->calculatemultiply($arr);
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
        function calculatemultiply($arr){
            if(count($arr) > 0) {
                return array_product($arr);
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
         * check Negative value
         * @param Array $arr
         * @return boolean
         */
        function checkNegativearray($arr){
            $negarr=array();
            foreach ($arr as $val){
                if($val < 0){
                    $negarr[]=$val;
                }
            }
            return $negarr;
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