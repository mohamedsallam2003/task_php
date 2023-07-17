<?php
$page_title="";
$css_file="style.css";
include_once("./include/tamplete/header.php");
require_once("./connect_db.php");

global $con;
$stmt = $con->prepare("SELECT * FROM data");
$stmt->execute();
$data=$stmt->fetchAll();

$del_id = @$_GET["id"];
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET["id"])){
    global $con;
    $stmt=$con->prepare("DELETE FROM data WHERE id=?");
    $stmt->execute(array($del_id));
    header('location:index.php');
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




<?php
include_once("./include/tamplete/footer.php");
?>