<?php

   function ragesub()
     { 

      $memberId = mysql_real_escape_string($_POST['name']);
      $rageId = mysql_real_escape_string($_POST['rage']);
      $description = mysql_real_escape_string($_POST['description']);
      $manualImage = mysql_real_escape_string($_POST['manualImage']);

      if ($rageId == NULL || $rageId == "")
      {
        //Default
        $rageId = "54";
      }

      $date = date("n/j/Y - g:i A");
      if ($manualImage == NULL || $manualImage == "")
      {
        $sql = ("UPDATE members SET rage_id='$rageId', lastUpdated='$date', description='$description', manualImage='' WHERE name='$memberId'");
        $result = mysql_query($sql) or die(mysql_error());

      }
      else
      {  
	$sql = ("UPDATE members SET rage_id='$rageId', lastUpdated='$date', description='$description', manualImage='$manualImage' WHERE name='$memberId'");
	$result = mysql_query($sql) or die(mysql_error());
      }
 
   }

   function quotesub()
   {
     $memberId = mysql_real_escape_string($_POST['name']);
     $context = mysql_real_escape_string($_POST['context']);
     $quote = mysql_real_escape_string($_POST['quote']);
     $date = date("n/j/Y");

     if($memberId == "(Pick one)")
     {
       die('Set a member you goof! <br /><a href="quoterage">Sorry, my bad.</a>');
     }
     if ($context == "")
     {
       $context = "No context";
     }
  
     $query = "INSERT INTO quotes(member_id,context,quote,date) VALUES('$memberId','$context','$quote','$date')";
     $result = mysql_query($query) or die(mysql_error());
   }

   function addmember()
   {
     $name = mysql_real_escape_string($_POST['name']);
     $pass = mysql_real_escape_string($_POST['inputPassword']);

     $result = mysql_query("INSERT INTO members (name,password,rage_id) VALUES('$name','$pass','25')");
   }

   function deleteMember()
   {
     $name = mysql_real_escape_string($_POST['name']);

     $result = mysql_query("DELETE FROM members WHERE id='$name'") or die(mysql_error());
   }

   function addImage()
   {
     $url = $_POST['newImage'];
     $name = mysql_real_escape_string($_POST['imageName']);
     $directory = "../../../assets/img/rage_guys/";
     file_put_contents($directory, file_get_contents($url));

     //$result = mysql_query("INSERT INTO rages ('image','name') VALUES($directory,$name)") or die(mysql_error());
   }

if(isset($_POST['sent']))
{
  ragesub();
  header('Location: http://arcticbase.student.rit.edu');
}elseif (isset($_POST['quoterage'])){
  quotesub();
  header('Location: http://arcticbase.student.rit.edu');
}elseif (isset($_POST['member'])){
  addmember();
  header('Location: http://arcticbase.student.rit.edu');
}elseif (isset($_POST['deleteuser'])){
  deleteMember();
  header('Location: http://arcticbase.student.rit.edu/');
}elseif (isset($_POST['newImage'])){
//  addImage();
  header('Location: http://arcticbase.student.rit.edu/index.php');
}else{
  header('Location: http://arcticbase.student.rit.edu');
}

?>
