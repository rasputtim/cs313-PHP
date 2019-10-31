<?php	echo '<h2>Transactions List</h2>';

	echo '<ul class="ul1">';
		
		foreach (get_db()->query('SELECT * FROM public.ezfin_transactions') as $row)
		{
		echo '<li>';
		echo '<a href="inctrans.php?update='.$row['idtransaction'].'">';
		echo 'Due on: '.$row['duedate']." - $ ". money_format($money_format, $row['amount']);
		echo '</a></li>';
		}
	
															
		echo '</ul>	';

?>