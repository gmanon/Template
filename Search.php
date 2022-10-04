<?php

class Search{
   
   public $key_word;
   private $number_ocurrences = 0;
   private $found = 0;
   
   function findMatches($keyword,$target)
   {
      $this->key_word = htmlspecialchars($keyword);
      
      if(preg_match_all("/^".$keyword."/$", $target, $word_found))
      {
         $this->number_ocurrences = count($word_found) + 1;
         $this->found = 1;
         
         
         
         return $word_found;
      
      }else{
         
         echo "Nothing found under your search in this site.<br/>\n";
      }
   }
   
   function throwResult($target,$link)
   {
      // Do this only under an open database.  The database should be already selected 
      // and match the target; otherwise nothing will work
      
      $result = $link->query("SELECT * FROM `$target` WHERE `content` is like %".$this->getkeyWord().";");
	
	      $search_result = $result->fetch_assoc();
         echo '<h3>'.htmlentities($search_result['title']);
         echo '</h3><br><p>'.htmlentities($search_result['content']);
         echo '</p><br>'.htmlentities($search_result['date']);
         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
         echo '<br>'.htmlentities($search_result['author']);
   }
   
   function getNumberOcurrences(){ return $this->numer_ocurrences; }
   function getFound(){ return $this->found; }
   function getKeyWord(){ return $this->found; }
}   

$search = new Search();
require_once "../../.scr/db.cnf.php";
$connect = new mysqli($db_server, $db_username, $db_password, $db_database);

if($connect->connect_errno){ echo $connect->connect_errno().$connect->connect_error();}
else { echo " Able to connect, you are connected!";
	//$connect->query("INSERT INTO `id`,`title`,`content`,`author`) VALUES ('1','First Article','My short paragraph goes here.','gmanon');");
	//echo '<pre>';print_r($connect);
	
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
			echo '<br><h3>'.$row['title'].'</h3>';
			echo '<br><b>Author: </b>'.$row['author'];
			echo '<br><b>Date: </b>'.$row['date'];
			echo '<br><b>Content: </b>'.$row['content'];
		}
	}
}
echo '<pre>';
print_r($row);
 

