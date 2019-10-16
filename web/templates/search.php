<?php
echo'<div class="search-form-wrapper clearfix">';
echo'<form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="my-form clearfix" >';
echo'<input type="hidden" id="seach_what" name="t" value="category">';
echo'<input type="text" name="s" value="Search" onBlur="if(this.value=="") this.value="Search" onFocus="if(this.value =="Search" ) this.value=""">';
				echo'<a href="#" onClick="document.getElementById("search-form").submit()"></a>';
                echo'</form>';
                echo'</div> ';
?>