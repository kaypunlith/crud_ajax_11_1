<?php 
include("../config.php");
  header('content-type: application/json');
  $type=$_GET['type'];
  switch($type){
    case 'upload':{
          $img_name=$_FILES['img']['name'];
          $img_tmp=$_FILES['img']['tmp_name'];
          $img_Dir="../public/temp/$img_name";
          move_uploaded_file($img_tmp,$img_Dir);
           echo json_encode([
            'status'=>200,
            'img_name'=>$img_name,
            'message'=>"updated successfully"
          ]);
          break;
    }
    case 'cencel':{
        $img_name=$_POST['image_Name'];
        $img_Dir="../public/temp/$img_name";
        if(file_exists($img_Dir)){
            unlink($img_Dir);
            echo json_encode([
                'status'=>200,
                'message'=>"Cencel successfully"
              
            ]);
        }
        break;
    }
    case 'insert':{
        $fname=$_POST['fname'];
        $gender=$_POST['gender'];
        $pos=$_POST['pos'];
        $salary=$_POST['salry'];
        $image=$_POST['img'];
        $sql="INSERT INTO `tbl_ajax_new`(`id`, `name`, `gender`, `pos`, `salary`, `iamge`) VALUES
         (null,'$fname','$gender','$pos','$salary','$image')";
         $img_temp="../public/temp/$image";
         $img_image="../public/image/$image";
         if(file_exists($img_temp)){
            copy($img_temp,$img_image);
            unlink($img_temp);
         }
         mysqli_query($con,$sql);
        echo json_encode([
            'status'=>200,
            'message'=>"Insert successfully"
        ]);
        break;
    }
    case 'select':{
        $sql="SELECT * FROM `tbl_ajax_new`";
        $result=mysqli_query($con,$sql);
        $data=[];
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
      echo json_encode([
        'status'=>200,
        'data'=>$data,
        'message'=>"Select successfully"
      ]);
      break;
    }
    case 'delete':{
        $del_id=$_POST['del_id'];
        $sql="DELETE FROM `tbl_ajax_new` WHERE `id`=$del_id";
        mysqli_query($con,$sql);
        echo json_encode([
            'status'=>200,
            'message'=>"Delete successfully"
        ]);
        break;
    }
    case 'edit':{
        $edit_id=$_POST['edit_id'];
        $sql="SELECT * FROM `tbl_ajax_new` WHERE `id`=$edit_id";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        echo json_encode([
            'status'=>2002,
            'data'=>$row,
            'message'=>"Edit successfully"	
        ]);
        break;
    }
    case 'update':{
        $edit_id=$_POST['id_edit'];
        $fname=$_POST['fname'];
        $gender=$_POST['gender'];
        $pos=$_POST['pos'];
        $salary=$_POST['salry'];
        $image=$_POST['img'];
        if(isset($_POST['img'])){
            $img=$_POST['img'];
            $img_tem="../public/temp/$img";
            $img_image="../public/image/$img";
            if(file_exists($img_tem)){
                copy($img_tem,$img_image);
                unlink($img_tem);
            }
          
        }
       else{
          $img=$_POST['old_img'];
       }
        $sql="UPDATE `tbl_ajax_new` SET 
        `name`='$fname',`gender`='$gender',`pos`='$pos',`salary`='$salary',`iamge`='$img' WHERE `id`='$edit_id'";
        mysqli_query($con,$sql);
        echo json_encode([
            'status'=>200,
            'message'=>"Update successfully"
        ]);
       
    }
    
  }
  
?>