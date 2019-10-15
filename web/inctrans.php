<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
include('templates/header.php'); 
$money_format = '%(#10n';
$date_format = "D, M d, Y ";
?>

<body class="subpage">
<div id="main">

<div class="top1">
<?php 
$index1="false";
$index2="false";
$index3="true";
$index4="false";
$index5="false";
include('templates/menubar.php'); 
?>

</div>

<div class="breadcrumbs1">
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;transactions</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">

		<div class="search-form-wrapper clearfix">
			<form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar-form clearfix" >
				<input type="hidden" id="seach_what" name="t" value="transactions">
				<input type="text" name="s" value='Search' onBlur="if(this.value=='') this.value='Search'" onFocus="if(this.value =='Search' ) this.value=''">
				<a href="#" onClick="document.getElementById('search-form').submit()"></a>
			</form>
		</div>

<div class="span9">
	
<h1>Transactions for the current period</h1>



<div class="col-md-6 col-md-offset-3" id="form_container">
                    <h2>CATEGORY FORM</h2> 
                    <p> Please fill the information required below. Click Send </p>
                    <form role="form" method="post" id="reused_form">
                        
                        <div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="name"> Category Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="alias"> Category Alias:</label>
                                <input type="text" class="form-control" id="name" name="alias" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="icon"> Icon:</label>
                                <input type="text" class="form-control" id="icon" name="icon" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="operation"> Operation:</label>
                                <input type="text" class="form-control" id="operation" name="operation" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"> Description:</label>
                                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-default pull-left" >Send &rarr;</button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your message successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
</div>
				


</div>
<div class="span3">

<h2>services List</h2>

	<ul class="ul1">
<?php 
	foreach ($db->query('SELECT * FROM public.ezfin_transactions') as $row)
	{
	echo '<li><a href="#">';
	echo $row['idcategory']." - ".$row['duedate']." - ". money_format($money_format, $row['amount']);
	echo '</a></li>';
	}
?>
	    	            		      	      			      
	</ul>	

	

	
</div>	
</div>
<div class="row">
<div class="span12">

<div class="line1"></div>



</div>	
</div>	
</div>	
</div>


<div class="bot1">
<div class="container">
<div class="row">
<div class="span12">
<div class="bot1_inner">

	<?php include('templates/footer.php'); ?>
	
</div>	
</div>	
</div>








	
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
	$(document).ready(function() {	
		//
	
	
	
	}); //
	$(window).load(function() {
		//
	
	}); //
	</script>	
</body>
</html>