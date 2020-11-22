<?PHP
include('../db_config.php');
class News {
    public $news_id;
    public $news_category;
    public $news_region;
    public $news_title;
    public $news_image;
    public $news_details;
    public $database;

    function __construct()
    {
        $this->database = new DBConfig();

    }

    function updateRow()
    {
        try {
            $pdo= $this->database->connect();
            $sql = "update pnews set category=?,region=?, title=? , info=? WHERE id=?";
            $statement= $pdo->prepare($sql);
            $statement->execute([$this->news_category, $this->news_region, $this->news_title, $this->news_details, $this->news_id]);
            return true;
        } catch (PDOException $ex) {
            return false;
        }

    }

    function getRows()
    {
        $pdo= $this->database->connect();
        $statement= $pdo->prepare("select id,title from pnews");
        $statement->execute();
        $rows= $statement->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
    function getSingleRow($id)
    {
        $pdo= $this->database->connect();
        $statement= $pdo->prepare("select * from pnews where id=?");
        $statement->execute([$id]);
        $row= $statement->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    function getRowsByCategoryAndRegion($category,$region)
    {
        $pdo= $this->database->connect();
        $statement= $pdo->prepare("select id,title from pnews where category=? and region=?");
        $statement->execute([$category, $region]);
        $rows= $statement->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
    function getRowsByCategory($category)
    {
        $pdo= $this->database->connect();
        $statement= $pdo->prepare("select id,title from pnews where category=?");
        $statement->execute([$category]);
        $rows= $statement->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
    function getRowsByRegion($region)
    {
        $pdo= $this->database->connect();
        $statement= $pdo->prepare("select id,title from pnews where  region=?");
        $statement->execute([$region]);
        $rows= $statement->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    function addRow()
    {

        try {
            $pdo= $this->database->connect();
            $statement= $pdo->prepare('insert into pnews values(null,?,?,?,null,now(),?)');
            $statement->execute([  $this->news_category,$this->news_region,$this->news_title, $this->news_details]);
            return true;
        } catch (PDOException $ex) {
            return false;
        }

    }


    function deleteRow()
    {
        try {
            $pdo= $this->database->connect();
            $sql = "delete from pnews WHERE id=?";
            $statement= $pdo->prepare($sql);
            $statement->execute([$this->news_id]);
            return true;
        } catch (PDOException $ex) {
            return false;
        }

    }

}



?>
