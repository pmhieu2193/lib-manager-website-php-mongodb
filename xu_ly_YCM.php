<?php
include("connection.php");
session_start();
$id=(string)$_REQUEST["id_ycm"];
$filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
if(!isset($_POST["actionYCM"])){
    //$id=$_REQUEST["id"];
    $count=$_REQUEST["count"];
    $action = $_REQUEST["actionYCM"];
    //xem cách sử dụng mảng php
    $arr_chi_tiet=array();
    $arr_book_id=array();

    if($action == "confirm"){           
        $collection = $database -> selectCollection("yeu_cau_muon");
        $id_nguoi_duyet=(string)$_SESSION["_id"];
        $update = ['$set' => ['trang_thai_yeu_cau' => 1, 'ma_nguoi_duyet' => $id_nguoi_duyet]];
        $result = $collection->updateOne($filter, $update);
        if($result){
            $collection2 = $database->selectCollection('chi_tiet_sach_muon');
            $flag=true;
            for($i=0; $i<$count; $i++){
                $arr_chi_tiet[$i]=(string)$_REQUEST["chi_tiet$i"];
                $arr_book_id[$i]=(string)$_REQUEST["book_id_$i"];
                $sach_muon=$collection2->findOne(['ma_yeu_cau_muon'=> $id, 'ma_sach'=>$arr_book_id[$i]]);
                $id_sach_muon=(string)$sach_muon->_id;
                if(!$sach_muon) {
                    $flag = false;
                    break;
                };
                $filter = ['_id' => new MongoDB\BSON\ObjectId($id_sach_muon)];
                $update = ['$set' => ['tinh_trang_sach_muon' => $arr_chi_tiet[$i]]];
                $result2 = $collection2->updateOne($filter, $update);
                if(!$result2){
                    $flag=false;
                    break;
                }
            }
            if($flag){  header("location: chi_tiet_ycm.php?id=$id");
                        exit();
            }
            else{
                echo 'cập nhật không thành công';
                exit();
            }
        }

    



    }
    if($action == "cancel"){
        $collection = $database -> selectCollection("yeu_cau_muon");
        $id_nguoi_duyet=(string)$_SESSION["_id"];
        $update = ['$set' => ['trang_thai_yeu_cau' => -1, 'ma_nguoi_duyet' => $id_nguoi_duyet]];
        $result = $collection->updateOne($filter, $update);
        if($result){
            if(isset($_REQUEST["orderpage"])){
                header("location: order.php?id=$id");
                    exit();
            }
            else{
                header("location: chi_tiet_ycm.php?id=$id");
                exit();
            }
        }
        else{
            echo'không thể huỷ yêu cầu mượn';
        }   
    }
}





?>