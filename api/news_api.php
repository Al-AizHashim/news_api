<?php
include('../model/news.php');
$news_model=new News();

if(isset($_POST)&&!empty($_POST)){
    $news_model->news_title=$_POST['title'];
    $news_model->news_region=$_POST['region'];
    $news_model->news_details=$_POST['details'];

if($news_model->addRow()){
    $feedback['code']=200;
    $feedback['message']="data inserted successfully";

}else{
    $feedback['code']=400;
    $feedback['message']="failed to inserted data";

}
 echo json_encode($feedback);
}


//else if(isset($_GET['id'])){
  //  echo json_encode($news_model->getSingleRow($_GET['id']));
//}else
//echo json_encode($news_model->getRows());



?>