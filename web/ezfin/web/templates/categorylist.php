<?php
echo '<h2>category List</h2>';

echo '<ul class="ul1">';
    $myoper = "UNDEFINED";
    foreach (get_db()->query('SELECT * FROM public.ezfin_category order by operation, alias') as $row)
    {
        switch ($row['operation']){
            case -1:
            break;
            case 0:
            $myoper = "CREDIT";
            break;
            case 1:
            $myoper = "DEBIT";
            break;
            case 2:
            $myoper = "INFORMATIVE";
            break;
        }
    echo '<li><a href="inccats.php?update='.$row['idcat'].'">';
    echo $row['alias']. " is a $myoper Operation";
    echo '</a></li>';
    }

                                                        
    echo '</ul>	';
?>