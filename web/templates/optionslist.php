<?php	echo '<h2>Transactions List</h2>';

	echo '<ul class="ul1">';
		
		foreach (get_db()->query('SELECT * FROM public.ezfin_config') as $row)
		{
		echo '<li>';
		echo '<a href="incoption.php?update='.$row['idoption'].'">';
		echo $row['key']." - ".$row['value'];
		echo '</a></li>';
		}
	
															
		echo '</ul>	';

?>