<?PHP
include('../db_config.php');
class News{
  public $news_id;
  public $news_title ;
  public $news_image;
  public $news_region;
  public $news_details;
  public $database;

  function __construct(){
   $this->database=new DBConfig();

  }
  
  function addRow(){

    try{
    $pdo=$this->database->connect();
    $statement=$pdo->prepare('insert into pnews values(null,?,?,null,now(),?)');
    $statement->execute([$this->news_title,$this->news_region,$this->news_details]);
    return true;
    }catch(PDOException $ex){
        return false;
    }


  }

  function getRows(){
      $pdo=$this->database->connect();
      $statement=$pdo->prepare("select * from pnews");
      $statement->execute();
      $rows=$statement->fetchAll(PDO::FETCH_OBJ);
      return $rows;
  }
  function getSingleRow($id){
    $pdo=$this->database->connect();
    $statement=$pdo->prepare("select * from pnews where p_id=?");
    $statement->execute([$id]);
    $row=$statement->fetchAll(PDO::FETCH_OBJ);
    return $row;
}


  function updateRow($id){
      
}

  function deleteRow($id){

  }

}



?>
