<?php require_once("Function/DB.php")?>
<?php require_once("Function/Messages.php")?>
<?php require_once("Function/Location.php")?>

<?php
 $ConnectingDB;

 if(isset($_POST["submit"])) {
  // Redirect_to("Search.html");
  $SiteTitle=mysql_real_escape_string($_POST["sitetitle"]);
  $SiteLink=mysql_real_escape_string($_POST["sitelink"]);
  $SiteKeywords=mysql_real_escape_string($_POST["sitekeywords"]);
  $SiteDesc=mysql_real_escape_string($_POST["sitedesc"]);
  $SiteImage=$_FILES["siteimage"]["name"];
  $Target="Upload/".basename($_FILES["siteimage"]["name"]);
  if(empty($SiteTitle)||empty($SiteLink)||empty($SiteKeywords)||empty($SiteDesc)){
    $_SESSION["ErrorMessage"]="All fields must be filled.. ";
    Redirect_to("Insert_site.php");
  }

   else{
    $ConnectingDB;
    $InsertQuery="INSERT INTO sites (sitetitle,sitelink,sitekeywords,sitedesc,siteimage)
                  VALUES('$SiteTitle','$SiteLink','$SiteKeywords','$SiteDesc','$SiteImage')";
    $Execute=mysql_query($InsertQuery);
    move_uploaded_file($_FILES["SiteImage"]["tmp_name"],$Target);
    if($Execute){
      $_SESSION["SuccessMessage"]="Post Added Successfully";
        Redirect_to("Insert_site.php");
    }
    else {
      $_SESSION["ErrorMessage"]="Something went wrong ,Try again!";
       Redirect_to("Insert_site.php");
    }

}

}


?>
<!DOCTYPE html>
<html>
<head>
  <link type="text/css" href="Bootstrap/css/Bootstrap.min.css" rel="stylesheet"></link>
  <script src="Bootstrap/js/jquery-3.2.1.min.js"></script>
  <script src="Bootstrap/js/bootstrap.min.js"></script>
  <title>Search Engine</title>
  <style>
  .heading{
    font-weight: 1000;
    font-size: 35px;
    font-family: cursive, sans-serif,serif;
  }
  body{
    background-color: #99ffeb;
  }
  body{
    margin: 26px;
    margin-right: 540px;
    padding: 10px;
    margin-top: -9px;
  }
  </style>
</head>
<body>
  <h1 class="heading">Insert New Website</h1></br>

  <div><?php echo ErrorMessage();
             echo SuccessMessage(); ?></div>
  <form action="Insert_site.php" method="post" enctype="multipart/form-data">

    <fieldset>
      <div class="form-group">
        <h4><label for="sitetitle">Site Title:</label></h4>
        <input class="form-control" type="text" name="sitetitle"/>
      </div>
      <div class="form-group">
        <h4><label for="sitelink"> Site Link:</label></h4>
         <input class="form-control" type="text" name="sitelink"/>
       </div>
       <div class="form-group">
        <h4><label for="sitekeywords"> Site Keywords:</label></h4>
         <input class="form-control" type="text" name="sitekeywords"/>
       </div>
       <div class="form-group">
        <h4><label for="sitedesc">Site Description:</label></h4>
        <textarea class="form-control" type="text" name="sitedesc"></textarea>
       </div>
       <div class="form-group">
         <h4><label for="siteimage">Site Image:</label></h4>
         <input class="form-control" type="file" name="siteimage"/></br>
      </div>
    <input type="submit" name="submit" value="Create Site" class="btn btn-block btn-success">
  </fieldset>
  </form>


</body>
</html>
