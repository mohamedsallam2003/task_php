<?php
$page_title="register";
$css_file="style.css";
include_once("./include/tamplete/header.php");
require_once("./connect_db.php");
require_once("./include/tamplete/function.php");


if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    add_user($name,$email,$hashed_password);
}


?>

<div class="container mt-5">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Name</label>
  <input type="text" class="form-control" name="name">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Email</label>
  <input type="email" class="form-control" name="email">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">password</label>
  <input type="password" class="form-control" name="password">
</div>

<button type="submit" class="btn btn-primary">SET</button>
</form>
</div>


<?php
include_once("./include/tamplete/footer.php");
?>