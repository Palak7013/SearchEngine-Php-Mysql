<?php require_once("Function/DB.php")?>
<?php require_once("Function/Messages.php")?>
<?php require_once("Function/Location.php")?>
<!DOCTYPE html>
<html>
<head>
  <link type="text/css" href="Bootstrap/css/Bootstrap.min.css" rel="stylesheet"></link>
  <script src="Bootstrap/js/jquery-3.2.1.min.js"></script>
  <script src="Bootstrap/js/bootstrap.min.js"></script>
 <title>Result Page</title>
 <style>
 .fieldinfo{
 font-weight: 900;
 font-size: 23px;
 font-family: cursive, sans-serif,serif;
 margin-top: 10px;
}
body{
  background-color: #F5DEB3;
}
.search{

  padding-right: 30%;
}

form{
  margin-left: 10%;
}
 .results{
   margin-left: 11%;
 }
 </style>
</head>

<body bgcolor="#F5DEB3">
  <form action="Result2.php" method="post">

    <span class="fieldinfo">Write Your Keyword </span>
    <br><input type="text" name="user_keyword" class="search" value="<?php echo $_POST['user_query']; ?>"/>
    <input class="btn btn-basic" type="submit" name="result" value="Search Now" >

  </form>
<?php
 $ConnectingDB;
 if(isset($_POST["search"])) {
   $get_value=$_POST['user_query'];
   $result_query="SELECT * FROM sites where sitekeywords like '%$get_value%'";
   $Execute=mysql_query($result_query);



   while($row_result=mysql_fetch_array($Execute)) {
     $SiteTitle=$row_result['sitetitle'];
     $SiteLink=$row_result['sitelink'];
     $SiteKeywords=$row_result['sitekeywords'];
     $SiteDesc=$row_result['sitedesc'];
     $SiteImage=$row_result['siteimage'];

   echo "<div class='results'>
       <h2>$SiteTitle</h2>
       <a href='$SiteLink' target='_blank'>$SiteLink</a>
       <p align='justify'>$SiteDesc</p>
       <img src='Images/$SiteImage' width='200' height='120'/>
       </div>";

}
}
?>


</body>
</html>
