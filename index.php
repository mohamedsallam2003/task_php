<?php
session_start();
$page_title="index";
$css_file="style.css";
if(isset($_SESSION["name"])){
include_once("./include/tamplete/header.php");
require_once("./connect_db.php");
require_once("./include/tamplete/function.php");

$data = get_all_data("data");

$del_id = @$_GET["id"];
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET["id"])){
   delete_by_id("data",$del_id);
}
}

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Collage</th>
      <th scope="col">Dep</th>
      <th scope="col">GPA</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $student){?>
    <tr>
      <th scope="row"><?php echo $student["id"];?></th>
      <td><?php echo $student["name"];?></td>
      <td><?php echo $student["collage"];?></td>
      <td><?php echo $student["dep"];?></td>
      <td><?php echo $student["gpa"];?></td>
      <td>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
            <input type="hidden" name="id" value=<?php echo $student["id"];?>>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tr>
    <?php }?>
  </tbody>
</table>


<a href="add_students.php">add students</a>
<br>
<a href="logout.php">logout</a>



<?php
include_once("./include/tamplete/footer.php");
}
else{
  header("location:login.php");
}
?>