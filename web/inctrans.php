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
			<label for="category"> Select Period:</label>
			<select class="custom-select">
				<option selected>Select Period</option>
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
			</select>
			</form>
		</div>

<div class="span9">
	
<!--

CREATE TABLE ezfin_transactions (
            idTransaction SERIAL NOT NULL,
            idUser varchar(50) NOT NULL,
            dueDate DATE,
            description TEXT,
            idCategory INTEGER NOT NULL,
            amount REAL,
            paymentDate DATE,
            status INTEGER,
            modificationDateTime timestamp without time zone DEFAULT CURRENT_TIMESTAMP(0),
            PRIMARY KEY (idTransaction, idUser),
            FOREIGN KEY (idCategory,idUser) REFERENCES ezfin_category (idCat,idUser),
            FOREIGN KEY (idUser) REFERENCES ezfin_tusuario (id_usuario)
            );
-->
<h1>Include Finance moves</h1>



<div class="col-md-6 col-md-offset-3" id="form_container">
                    <h2>TRANSACTION FORM</h2> 
                    <p> Please fill the information required below. Click Send </p>
                    <form role="form" method="post" id="reused_form">
                        
                        <div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="category"> Select Category:</label>
                                <input type="text" class="form-control" id="name" name="category" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="due_date"> Due Date:</label>
                                <input type="text" class="form-control" id="name" name="due_date" required>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-6 form-group">

                                <label for="amount"> amount:</label>
                                <input type="text" class="form-control" id="icon" name="amount" required>
                            </div>
                            <div class="col-sm-6 form-group">

                                <label for="paymentdate"> Payment Date:</label>
								<input type="text" class="form-control" id="operation" name="paymentdate" required>
								<div class="form-date-from form-icon">
									<label for="date_from">From</label>
									<input type="text" id="date_from" class="date_from" placeholder="Pick a date" />
									<!-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> -->
								</div>
								<div class="form-date-to form-icon">
									<label for="date_to">To</label>
									<input type="text" id="date_to" class="date_to" placeholder="Pick a date" />
									<!-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> -->
								
								</div>
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

<h2>Transactions List</h2>

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
<script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>
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