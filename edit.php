<?php
 include "connection.php";
 if(isset($_GET['edit-todo']))
 {
   // echo "ok"; 
    $e_id=$_GET['edit-todo'];
 }
 if(isset($_POST['edit_todo']))
 {
     $edit_todo=$_POST['todo'];
     $query="UPDATE todo_data SET t_name ='$edit_todo' WHERE t_id = $e_id ";
     $run=mysqli_query($conn,$query);
     //$run= $mysqli -> query($query);
    // print_r($run);
     if(!$run)
     {
         die("Failed");
     }else{
         header("Location: index.php?updated");
     }
 }

?>
<!DOCTYPE HTML>
<html>
<head>
<title>  Todo list </title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> </link>
<style>
.todo{
    display :flex;
flex-direction:column;
    justify-content:center;
    align-items:center;
    border:1px solid #cccccc;    border-radius:3px;
     margin-top:5px;
}
</style>
</head>
<body>
<div class="container">
<div class="todo">
<h1> ToDo List App</h1>
<h3>Add New ToDo </h3>
<form action ="" method="POST">

<?php 
 
$sql="SELECT * FROM todo_data WHERE t_id = $e_id";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_array($result);

?>


<div class="form-group">
<input class="form-control" type="text" name="todo" placeholder="TODO Name" value="<?php echo $data['t_name'];?>">
</div>
<div class="form-group">
    <input class="btn btn-primary" value="Add a New todo Task List " type="submit" name="edit_todo">
</div>
</form>
</div>
</div>
</body>


</html>