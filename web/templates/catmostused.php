<?php
require_once('inc/functions_db.php');

$sql = 'SELECT       idcategory,
             COUNT(idcategory) AS value_occurrence 
        FROM     public.ezfin_transactions
        GROUP BY idcategory
        ORDER BY value_occurrence DESC
        LIMIT    8';

$stmt = get_db()->prepare($sql);
//$stmt->bindValue(':op', $myOperation, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<ul>';
foreach ($rows as $row){
    $stmt = get_db()->prepare('SELECT * FROM public.ezfin_category WHERE id = :id');
    $stmt->bindValue(':id', $row['idcategory'], PDO::PARAM_INT);
    $stmt->execute();
    $category = $stmt->fetch();
										echo'<li>';
                                            echo'<div class="thumb-carousel2 banner1">';
                                                echo'<div class="thumbnail clearfix">';
                                                    echo'<a href="#">';
                                                        echo'<figure>';
                                                            echo'<img src="images/'.trim($category['icon']).'" alt="">';
                                                        echo'</figure>';
														echo'<div class="caption">';
                                                        echo'<div class="txt1">'.$category['alias'].'</div>';
                                                        echo'<div class="txt2">'.$category['description'].'</div>';								
														echo'</div>';								
                                                        echo'</a>';								
                                                echo'</div>';
                                            echo'</div>';
                                        echo'</li>';
}
																																	
echo'</ul>';




?>