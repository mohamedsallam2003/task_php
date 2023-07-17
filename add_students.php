<?php
$page_title="";
$css_file="style.css";
include_once("./include/tamplete/header.php");
require_once("./connect_db.php");


if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST["name"];
    $collage = $_POST["collage"];
    $dep = $_POST["dep"];
    $gpa = $_POST["gpa"];

global $con;
$stmt = $con->prepare("INSERT INTO data (name,collage,dep,gpa) VALUES (?,?,?,?)");
$stmt->execute(array($name,$collage,$dep,$gpa));
}
?>

<div class="container mt-5">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Name</label>
  <input type="text" class="form-control" name="name">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Collage</label>
  <input type="text" class="form-control" name="collage">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Dep</label>
  <input type="text" class="form-control" name="dep">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">GPA</label>
  <input type="text" class="form-control" name="gpa">
</div>
<button type="submit" class="btn btn-primary">SET</button>
</form>
</div>

<a href="index.php">students data</a>

<?php
include_once("./include/tamplete/footer.php");
?>