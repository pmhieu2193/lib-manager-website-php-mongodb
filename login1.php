<?php
    include("connection.php");
    session_start(); 

    if (isset($_POST['email']) && isset($_POST['password'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        //mấy cái bắt lỗi này nên bắt ở js
        //mấy cái này chỉ để bắt lỗi khi tạo tài khoản trùng hay gì đó mà thôi
        if (empty($email)) {
            header("Location: login.php?error=User Name is required");
            exit();
        } else if (empty($password)) {
            header("Location: login.php?error=Password is required");
            exit();
        } else {
            $collection = $database->selectCollection('user');
            $login = $collection->findOne(['email'=> $email, 'mat_khau' => $password]);
            if ($login) {;
                $_SESSION['_id'] = $login->_id;
            	$_SESSION['ten'] = $login->ten;
            	$_SESSION['ma_rank'] = $login->ma_rank;
                $_SESSION['email'] = $login->email;
                if($login->ma_rank == 0){
                    header("Location: admin.php");
                    exit();
                }
                else{
                    header("Location: index.php");
                    exit();
                }
            }
            else{
                header("Location: login.php?error=Incorect!");
                exit();
            }

        }
}

?>