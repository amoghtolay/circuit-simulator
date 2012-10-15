	<?php
	function is_input_properly_named($arr)
	{
		
		$return=1;
		$tempcount=0;
		$no_of_inputs=0;
		unset($is_input_covered);
		while(isset($arr["Circuit"]["Gates"]["Gate"][$tempcount]["Type"]))
		{
			
			if($arr["Circuit"]["Gates"]["Gate"][$tempcount]["Type"]=='UserInput')
			{
				$is_input_covered[$no_of_inputs]=1;
				$no_of_inputs++;
			}
			$tempcount++;
		}
		
		$tempcount=0;
		
		while(isset($arr["Circuit"]["Gates"]["Gate"][$tempcount]["Type"]))
		{
			
			if($arr["Circuit"]["Gates"]["Gate"][$tempcount]["Type"]=="UserInput")
			{
				$input_name=$arr["Circuit"]["Gates"]["Gate"][$tempcount]["Name"];
				if(!isset($is_input_covered[$input_name]))
				{
					$return=0; 
				}
				else
					$is_input_covered[$input_name]=0;
			}
			$tempcount++;
		}
		
		$tempcount=0;
		while(isset($is_input_covered[$tempcount]))		
		{
			if($is_input_covered[$tempcount]!=0)
			{
				$return=0;
			}
			$tempcount++;
		}
		
	    return $return;

	}
?>