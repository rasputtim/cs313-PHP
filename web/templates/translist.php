	echo '<h2>Transactions List</h2>';

	echo '<ul class="ul1">';
		
		foreach ($db->query('SELECT * FROM public.ezfin_transactions') as $row)
		{
		echo '<li>';
		echo '<a href="inctrans.php?update='.$row['idtransaction'].'">';
		echo $row['duedate']." - ". money_format($money_format, $row['amount']);
		echo '</a></li>';
		}
	
															
		echo '</ul>	';

		