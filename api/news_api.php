<?php
include('../model/news.php');
$news_model=new News();




 if(isset($_POST)&&!empty($_POST)){
    $news_model->news_category = $_POST['category'];
    $news_model->news_region = $_POST['region'];
    $news_model->news_title = $_POST['title'];
    $news_model->news_details = $_POST['details'];

    if ($news_model->addRow()){
        $feedback['code'] = 200;
        $feedback['message'] = "data inserted successfully";

    }else{
        $feedback['code'] = 400;
        $feedback['message'] = "failed to insert data";

    }
    echo json_encode ($feedback);
}




else if($_SERVER['REQUEST_METHOD']=="PUT"){
    $_PUT= array();
    parse_str(file_get_contents('php://input'), $_PUT);
    $news_model->news_category = $_PUT['category'];
    $news_model->news_region = $_PUT['region'];
    $news_model->news_title = $_PUT['title'];
    $news_model->news_details = $_PUT['details'];
    $news_model->news_id = $_PUT['id'];



    if ($news_model->updateRow()){
        $feedback['code'] = 200;
        $feedback['message'] = "row ".$_PUT['id']." updated successfully";

    }else{
        $feedback['code'] = 400;
        $feedback['message'] = "failed to update row ".$_PUT['id'];

    }
    echo json_encode ($feedback);


}
else if($_SERVER['REQUEST_METHOD']=="DELETE"){
    // $_DELETE=array();
    //parse_str(file_get_contents('php://input'), $_DELETE);

    $news_model->news_id = $_GET['id'];
    if ($news_model->deleteRow()){
        $feedback['code'] = 200;
        $feedback['message'] = "the row  is deleted successfully";

    }else{
        $feedback['code'] = 400;
        $feedback['message'] = "failed to delete row ";

    }
    echo json_encode ($feedback);


}
else if(isset($_GET)){
    if (isset($_GET['id'])){
        echo json_encode ($news_model->getSingleRow($_GET['id']));
    }
    else if (isset($_GET['category']) && isset($_GET['region'])){
        echo json_encode ($news_model->getRowsByCategoryAndRegion($_GET['category'], $_GET['region']));

    }
    else if (isset($_GET['category']) && !isset($_GET['region'])){
        echo json_encode ($news_model->getRowsByCategory($_GET['category']));

    }
    else if (!isset($_GET['category']) && isset($_GET['region'])){
        echo json_encode ($news_model->getRowsByRegion($_GET['region']));

    }
    else {
        echo json_encode ($news_model->getRows());
    }


}// end of get








?>