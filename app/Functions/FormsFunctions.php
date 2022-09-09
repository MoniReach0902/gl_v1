<?php
	function cmb_listing($arr_list,$arr_select,$disable,$disablestatus,$by_key=[]){
		//key store as value and value as label of combo
		$stm='';
		$selected="";
        if(empty($arr_list))return $stm;
        $count_select=count($arr_select);
		foreach($arr_list as $key=>$value){
      if(!empty($by_key)){
        $key = $value[$by_key[0]];
        $value = $value[$by_key[1]];
      }
			for($i=0;$i<$count_select;$i++){
				if(strcasecmp(trim($arr_select[$i]),trim((string)$key))==0){
				/*if(trim((string)$arr_select[$i])==trim((string)$key)){	*/
					$selected="selected='selected'";
					break;
				}
				else{ $selected="";}
			}//end for
			
			/*check for disable*/
			$disable_value="";
			if($disable==$key){
				$disable_value="disabled='disabled'";
			}
			 $stm.="<option value='$key' $selected $disable_value>".$value."</option>";
		}//end for each	
		return $stm;
	}///end function

	function check_select($chk_name,$arr_chk,$chked,$js_fun){
		//key store as label and value as value of checkbox
		$stm='';
		if(empty($arr_chk))return $stm;
		$i=0;
		foreach($arr_chk as $label=>$value){
			if($label=="<br>"){
				$stm.= "<br /><br class='line-height-10'/>";
			}
			else{
				
				/*echo "<label><input name='".$chk_name."' type='radio' value='".$value."' ".$js_fun.""; if(strtolower($chked)==strtolower($value)){ echo "checked='checked'";}  echo " />".$label."</label> ";*/    
				$stm.= "<label class='radio-inline frm-label' style='padding:0px 10px;'>";
				if($value<>(string)$chked){  
					
					if($i==0){       //when the value of u 12 select='' must set the slect to the first value
						$stm.= "<input name='".$chk_name."' id='".$chk_name."' type='radio' value='".$value."' ".$js_fun." checked='checked' />";
						
					}
					else{$stm.= "<input name='".$chk_name."' id='".$chk_name."' type='radio' value='".$value."' ".$js_fun." />";}			                 
				}
				else{
					$stm.= "<input name='".$chk_name."' id='".$chk_name."' type='radio' value='".$value."' ".$js_fun." checked='checked' />";
				}//end if	
				
				$stm.= '&nbsp;' .$label; //for label
				$stm.= "</label>";
				
			}
			$i+=1;			                                     
		}//end for
		return $stm;
	}/**@endfun**/