<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location:inc/noaccess.php");
    //exit;
}
require_once ("inc/connect.php");
include('templates/header.php'); ?>

<body class="subpage">
<div id="main">

<div class="top1">
<?php 
$index1="false";
$index2="true";
$index3="false";
$index4="false";
$index5="false";
include('templates/menubar.php'); 
?>
</div>

<div class="breadcrumbs1">
<div class="container">
<div class="row">
<div class="span12">
<div class="breadcrumbs1_inner"><a href="index.html">home page</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;products</div>	
</div>	
</div>	
</div>	
</div>

<div id="content">
<div class="container">
<div class="row">
		
<div class="span9">
	
<h1>Add category</h1>






<!-- Form Name 
CREATE TABLE ezfin_category(
            idCat  SERIAL NOT NULL,
            idUser varchar(50) NOT NULL,
            name varchar(50) NOT NULL,
            catAlias TEXT, 
            icon TEXT,
            description TEXT,
            operation INTEGER,
            PRIMARY KEY ( idCat, idUser)
            );
-->
<div style="width:20rem">
    <div class="form-group">
        <label for="fga-1">Images</label>
        <textarea id="input-images" class="formgallery-model">
            [
                "img/annie-spratt.jpg",
                "img/jason-strull.jpg",
                "img/luca-bravo.jpg",
                "img/muneeb-syed.jpg",
                "img/timj.jpg",
                "img/vladimir-kudinov.jpg"
            ]
        </textarea>
        <div class="formgallery" id="fg-1" data-model="#input-images">
            <div class="formgallery-list formgallery-list-three">
                <div class="formgallery-item">
                    <button type="button" class="close formgallery-remove" aria-label="Close" title="Remove">
                        <span aria-hidden="true">×</span>
                    </button>
                    <a href="#" class="formgallery-image" style="background-image: url(img/annie-spratt.jpg)">
                    </a>
                </div>
                <div class="formgallery-item">
                    <button type="button" class="close formgallery-remove" aria-label="Close" title="Remove">
                        <span aria-hidden="true">×</span>
                    </button>
                    <a href="#" class="formgallery-image" style="background-image: url(img/jason-strull.jpg)">
                    </a>
                </div>
                <div class="formgallery-item">
                    <button type="button" class="close formgallery-remove" aria-label="Close" title="Remove">
                        <span aria-hidden="true">×</span>
                    </button>
                    <a href="#" class="formgallery-image" style="background-image: url(img/luca-bravo.jpg)">
                    </a>
                </div>
                <div class="formgallery-item">
                    <button type="button" class="close formgallery-remove" aria-label="Close" title="Remove">
                        <span aria-hidden="true">×</span>
                    </button>
                    <a href="#" class="formgallery-image" style="background-image: url(img/muneeb-syed.jpg)">
                    </a>
                </div>
                <div class="formgallery-item">
                    <button type="button" class="close formgallery-remove" aria-label="Close" title="Remove">
                        <span aria-hidden="true">×</span>
                    </button>
                    <a href="#" class="formgallery-image" style="background-image: url(img/timj.jpg)">
                    </a>
                </div>
                <div class="formgallery-item">
                    <button type="button" class="close formgallery-remove" aria-label="Close" title="Remove">
                        <span aria-hidden="true">×</span>
                    </button>
                    <a href="#" class="formgallery-image" style="background-image: url(img/vladimir-kudinov.jpg)">
                    </a>
                </div>
            </div>
            <button class="btn btn-light formgallery-action">
                Add Image
            </button>
        </div>
    </div>
</div>






</div>
<div class="span3">

<h2>category List</h2>

	<ul class="ul1">
	<?php 
	foreach ($db->query('SELECT name FROM public.ezfin_category') as $row)
	{
	echo '<li><a href="#">';
	echo $row['name'];
	echo '</a></li>';
	}
?>
	  	            		      	      			      
	</ul>	

	

	
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
        $('#myFormGallery').formgallery(options);
    });
	$(window).load(function() {
		//
	
	}); //
	</script>	
</body>
</html>