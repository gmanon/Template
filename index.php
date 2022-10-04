<?php 
require_once "../../.scr/db.cnf.php";
$connect = new mysqli($db_server, $db_username, $db_password, $db_database);

if($connect->connect_errno){ echo $connect->connect_errno().$connect->connect_error();}
//else { echo " Able to connect, you are connected!"; }
?>

<!DOCTYPE html>
<html>
   <head>
   <title>My Page</title>
   <style type="text/css">
   <!--

   -->   
   
   </style>
   <link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />
   <base href="http://localhost:8989/Template/"/>
  </head>
   <body>
      <div class="menu">
				<a href="?page=home">Home</a> 
				<a href="?page=contact">Contact</a> 
				<a href="?page=about">About</a> 
				<a href="?page=catalog">Catalog</a> 
				<a href="?page=privacy">Privacy</a>
      </div>
      
               <div class="top"><img src="images/me.jpg"><span>GManon Web Presence</span></div>
               <div class="text">
               <div class="social-media">
               <a href="#"><span class="social youtube">y</a></a>
               <a href="#"><span class="social google">g</a></a>
               <a href="#"><span class="social twiter">t</a></a>
               <a href="#"><span class="social blogger">b</a></a>
               </div>
               <img src="images/gms.png">
               <div class="search">
                  <form name="form" action="_self" method="get"><label class="search">SEARCH: </label>
                     <input type="text" name="q" value="<?php echo '&nbsp;&nbsp;'.$_GET['q'];?>" />
                     <input type="hidden" name="page" value="search" />
                  </form></div>
               <hr><h4>SUB TITLE FOR THIS PAGE GOES HERE</h4>
               
               <h2>Title goes here</h2>
              
               <img src="images/touch.png" align="left">
               <?php //if($_GET['page']=='search'){ echo $_GET['page']." <b>".$_GET['q'].$_rows['articles']." </b>"; }
					/*else*/if($_GET['page']=='contact'){ echo 'contact'; } 
					elseif($_GET['page']=='about'){ echo 'about'; } 
					elseif($_GET['page']=='privacy'){ echo 'privacy'; } 
					elseif($_GET['page']=='home'){ echo 'home'; } 
					else{ echo '<blockquote>';
               //<div class='date-author'>". date('M, d Y'). $tab." <strong>By</strong> Guillermina Gonjon</div>
               
               //<p><img src='images/half.png' width='100%'></p>
						$articles = $connect->query("SELECT * FROM `articles`;");
	
	echo '<ul>';
	
	foreach($articles as $article)
	{
		echo '<li><a href="?page='. str_replace(" ", "_", $article['title']).'" target="_self">'.$article['title'] .'</a></li>'."\n";
		
	}
	echo '</ul>';
	
	foreach($articles as $row){
		
		if($row['title']==str_replace("_"," ", $_GET['page']))
		{
		
			//echo '<br><br/><b>Id: </b>'.$row['id'];
			echo '<br><h1>'.$row['title'].'</h1>';
			echo '<br><b>Author: </b>'.$row['author'];
			echo '<br><b>Date: </b>'.$row['date'];
			echo '<br>'.$row['content'];
		}
	}

echo '<pre>';
					echo '</blockquote>';
                }
               ?>
      
      <div class="footer">&nbsp;</div>
      <div class="side-menu">
			   <div class="side-top"><span> TITLE </span></div>
			   <br/>
			   <br/>
			   <a href="#">Message</a>
               <a href="#">Message 1</a>
               <a href="#">Message 2</a>
               <hr>
               <a href="#">Message 3</a>
			   <a href="#">Message</a>
               <a href="#">Message 1</a>
               <a href="#">Message 2</a>
                <hr>
               <a href="#">Message 3</a>
               <a href="#">Message 3</a>
			   <a href="#">Message</a>
               <a href="#">Message 1</a>
               <a href="#">Message 2</a>
               <div class="side-bottom">&nbsp;</div>
      </div> 
      
   </body>
</html>
<!--
/* pt-sans-narrow-regular - latin */

-->
