<?php
session_start();
function ErrorMessage(){
  if(isset($_SESSION["ErrorMessage"])){
    $output="<div class=\"alert alert-danger\">";
    $output.=htmlentities($_SESSION["ErrorMessage"]);
    $output.="</div>";
    $_SESSION["ErrorMessage"]=null;
    return $output;
  }
}

function SuccessMessage() {
  if(isset($_SESSION["SuccessMessage"])) {
    $Output="<div class=\"alert alert-success\">";
    $Output.=htmlentities($_SESSION["SuccessMessage"]);
    $Output.="</div>";
    $_SESSION["SuccessMessage"]=null;
    return $Output;
  }
}


?>
