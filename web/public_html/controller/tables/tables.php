<?php

	function printTable($assocResultSet)
	{
		$first = 1;
		echo "\t\t<table class=\"table table-striped\">\n";
		foreach($assocResultSet as $row)
		{
			if($first == 1)
			{
				$headersArray = array_keys($row);
				echo "\t\t\t<thead>\n";
				foreach ( $headersArray as $header)
				{
					echo "\t\t\t\t<th scope=\"col\">".$header."</th>\n";
				}
				$first = 0;
				echo "\t\t\t</thead>\n"; 
				echo "\t\t\t<tbody>\n";
			}

			echo "<tr>";
			foreach($row as $field => $field_value) 
			{	
				echo "<td>".$field_value."</td>";
			}
			echo "</tr>\n";
		}
		echo "\t\t\t</tbody>\n"; 
		echo "\t\t</table>\n";
	}


	function printTable2dNumericArrayAssocArray($twoDimArray)
	{
		$first = 1;
		echo "\t\t<table class=\"table table-striped\">\n";
		foreach($twoDimArray as $row)
		{
			if($first == 1)
			{
				$headersArray = array_keys($row);
				echo "\t\t\t<thead>\n";
				foreach ( $headersArray as $header)
				{
					echo "\t\t\t\t<th scope=\"col\">".$header."</th>\n";
				}
				$first = 0;
				echo "\t\t\t</thead>\n"; 
				echo "\t\t\t<tbody>\n";
			}

			echo "<tr>";
			foreach($row as $field => $field_value)
			{
				echo "<td>".$field_value."</td>";
			}
			echo "</tr>\n";
		}
		echo "\t\t\t</tbody>\n"; 
		echo "\t\t</table>\n";
	}

	function printTableSkipLastIndexCol($assocResultSet)
	{
		$first = 1;
		echo "\t\t<table class=\"table table-striped\">\n";
		foreach($assocResultSet as $row)
		{
			$printCols = count($row) -2; # 0 index and one more
			if($first == 1)
			{
				$headersArray = array_keys($row);
				echo "\t\t\t<thead>\n";
				$currColHead = 0;
				foreach ( $headersArray as $header)
				{
					if($currColHead <= $printCols)
					{
						echo "\t\t\t\t<th scope=\"col\">".$header."</th>\n";
						$currColHead++;
					}
					else
					{
					       # skip 	
					}

				}
				$first = 0;
				echo "\t\t\t</thead>\n"; 
				echo "\t\t\t<tbody>\n";
			}

			echo "<tr>";
			$currCol = 0;
			foreach($row as $field => $field_value) 
			{	
				if($currCol <= $printCols)
				{
					echo "<td>".$field_value."</td>";
					$currCol++;
				}
				else
				{
					# Do nothing 
				}
			}
			echo "</tr>\n";
		}
		echo "\t\t\t</tbody>\n"; 
		echo "\t\t</table>\n";
	}
	function printVerticalInfoTable($assocResultSet)
	{	
		echo "\t\t\t<table class=\"table\">\n";
		echo "\t\t\t<tbody>\n";
		foreach($assocResultSet as $row)
		{

			foreach($row as $field => $field_value) 
			{
				echo "\t\t\t\t<tr>\n";
				echo "\t\t\t\t\t<th class=\"table-info\">".$field."</th>\n";	
				echo "\t\t\t\t\t<td>".$field_value."</td>\n";
				echo "\t\t\t\t</tr>\n";
			}
		}
		echo "\t\t\t</tbody>\n";
		echo "\t\t\t</table>\n"; 
	}

	function printVerticalInfoTableAssocArray($assocArray)
	{
		                echo "\t\t\t<table class=\"table\">\n";
                echo "\t\t\t<tbody>\n";
                foreach($assocArray as $field =>$field_value)
                {

                	echo "\t\t\t\t<tr>\n";
                        echo "\t\t\t\t\t<th class=\"table-info\">".$field."</th>\n";
                        echo "\t\t\t\t\t<td>".$field_value."</td>\n";
                        echo "\t\t\t\t</tr>\n";
                }
                echo "\t\t\t</tbody>\n";
                echo "\t\t\t</table>\n";

	}
?>
