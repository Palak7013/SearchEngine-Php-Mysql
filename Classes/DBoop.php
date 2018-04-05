<?php
class Database{
  private $Connection;
  private $ConnectingDB;
  public function __Database(){
    $Connection= mysql_connect('localhost','root',"");
    $ConnectingDB= mysql_select_db("searchengine",$Connection);
  }
}
?>
