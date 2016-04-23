<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Format numbers like 44 to '44th' or 21 to '21st'
function ordinal_suffix($num){
        $onum = $num;
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return $onum.'st';
            case 2: return $onum.'nd';
            case 3: return $onum.'rd';
        }
    }
    return $onum.'th';
}

// Adds the '+' prefix to positive numbers, leaves '-' on negative numbers.  Takes in a forward slash delimited string of numbers and returns the same 
//    after adding plus prefix.  Example input: 4/2/-3/0  output: +4/+2/-3/0
function mod_prefix($num){
    if(str_contains($num, '/')){
        $nums = explode('/',$num);
        for($i=0; $nums[$i]; $i++){
                if($nums[$i]>0){
                        $nums[$i] = '+'.$nums[$i];
                }else{
                        $nums[$i] .= $nums[$i];
                }
        }
        return implode('/',$nums);
    }else{
        if($num>0){
            $num = '+'.$num;
        }
        return $num;
    }
}

// Takes in a string and outputs a Camel Case sting (e.g. in: this_string_input  output: This String Input
function proper($string){
        $output = ucwords(str_replace('_',' ',$string));
        return $output;	
}


function output_field($row, $rsfi, $field, $tag=false, $prefix=false){
        if($rsfi[$field]['is_empty']==0){
                if($tag){
                        $output = '<'.$tag.'>';
                        if(!$row){
                                $output .= proper($field);
                        }else{
                                $output .= ($prefix?mod_prefix($row[$field]):$row[$field]);
                        }
                        $output .= '</'.$tag.'>';
                }else{
                        $output = $row[$field];
                }
                return $output;
        }else{
                return "";
        }
}


// Input a record set, output an array by key with the number of Non-NULL and Non-Empty results, the average(if applies), the total(if applies)
function recordset_field_info($rs, $calc=false){
        mysqli_data_seek($rs, 0);
        $keys = false;
        $result = array();
        while($row = mysqli_fetch_assoc($rs)){
                if(!$keys){
                        $keys = array_keys($row);
                }
                foreach($keys as $key){

                        $result[$key]['count']++;
                        $result[$key]['empty'] += ($row[$key]==NULL||$row[$key]==''?1:0);
                        $result[$key]['unempty'] += ($row[$key]==NULL||$row[$key]==''?0:1);

                        if(is_numeric($row[$key]&&$calc)){
                                $result[$key]['total'] += $row[$key];
                                $result[$key]['average'] = $result[$key]['total'] / $result[$key]['count'];
                        }
                        $result[$key]['is_empty'] = ($result[$key]['unempty']>0?0:1);
                }
        }
        mysqli_data_seek($rs, 0);
        return $result;
}