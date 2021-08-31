
<?php      
    session_start();
    session_destroy();
    require('connection.php');
    

    include('connection.php'); 
   
    $username = $_POST['name'];  
    // $password = md5($_POST['password']);  
    $password = $_POST['password'];


    $sql1 = "SELECT * from user where user_email = '$username' and user_pwd = '$password' and user_type='admin' "  ;  
    $result1 = mysqli_query($con, $sql1);

    $sql = "SELECT * from user where user_email = '$username' and user_pwd = '$password' " ;  
    $result = mysqli_query($con, $sql);

 if(mysqli_num_rows($result1))
 {  
        session_start();
        $_SESSION['user']=mysqli_fetch_assoc($result1);
        header("location:admin/dashboard.php");
    }
    else if(mysqli_num_rows($result)) 
    {  
        session_start();
        $_SESSION['user']=mysqli_fetch_assoc($result);
        header("location:index.php");  
    } 
     else{  
        header("location:login.php?unsuccessfull");
    } 


    

?>  