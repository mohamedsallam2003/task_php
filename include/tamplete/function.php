<?php
$page_title="function.php";
$css_file="style.css";
include_once("./include/tamplete/header.php");
require_once("./connect_db.php");




function get_all_data($table){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table");
    $stmt->execute();
    $data=$stmt->fetchAll();
    return $data ;
}
// ******************************************************************************************************************
function delete_by_id($table,$id){
    global $con;
    $stmt=$con->prepare("DELETE FROM $table WHERE id=?");
    $stmt->execute(array($id));
    header('location:index.php');
}
// ******************************************************************************************************************
function add_student($name,$collage,$dep,$gpa){
    global $con;
    $stmt = $con->prepare("INSERT INTO data (name,collage,dep,gpa) VALUES (?,?,?,?)");
    $stmt->execute(array($name,$collage,$dep,$gpa));
    echo "
    <script>
        toastr.error('تمت الاضافه بنجاح')
    </script>";
}
// ******************************************************************************************************************
function add_user($name,$email,$password){
    global $con;
    $stmt = $con->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
    $stmt->execute(array($name,$email,$password));
}
// ******************************************************************************************************************
function login($email,$password){
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    $user=$stmt->fetch();
    $row_count = $stmt->rowCount();
    if($row_count > 0){
        if(password_verify($password,$user["password"])){
            session_start();
            $_SESSION['name']=$user["name"];
            echo "
            <script>
                toastr.error('تم الدخول بنجاح')
            </script>";
             header("Refresh:2;url=index.php");
        }
        else{
            echo "
            <script>
                toastr.error(' كلمة السر او البريد غير صحيحه')
            </script>";
        }
    }
    else{
        echo"
        <script>
                toastr.error('كلمه السر او البريد غير صحيحه')
            </script>";
    }
}




?>


<?php
include_once("./include/tamplete/footer.php");
?>