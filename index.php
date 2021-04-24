<?php
 include "connection.php";
 
$query="SELECT * FROM todo_data";
$result=mysqli_query($conn,$query);
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
   $todo1=$_POST['todo'];
   $date=date('l  F\, Y');
   $sql="INSERT INTO todo_data(t_name,t_date) VALUES('$todo1','$date');";
   $result1=mysqli_query($conn,$sql);
   if(!$result1)
   {
       die("Failed");
   }else{
       header("Location: index.php?updated");
   }  
} 
   if(isset($_GET['delete_todo']))
   {
       $dt1_todo=$_GET['delete_todo'];
       $sqli="DELETE FROM todo_data WHERE t_id =$dt1_todo";
       $res=mysqli_query($conn,$sqli);
       if(!$res)
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
<form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="form-group">
    <input class="form-control" type="text" name="todo" placeholder="TODO Name">
</div>
<div class="form-group">
    <input class="btn btn-primary" value="Add a New todo Task List " type="submit">
</div>
</form>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<thead>
<th>id</th>
<th>Todo</th>
<th>Date Added</th>
<th> Edit Todo</th>
<th></th>
</thead>
<tbody>
<?php 
// if (!$result) {
//     printf("Error: %s\n", mysqli_error($conn));
//     exit();
// }else{
//    while($row = mysqli_fetch_array($result)){
//     // your code here
//    }
// }
while($row = mysqli_fetch_assoc($result))
{
   $t_id=$row['t_id'];
   $t_name=$row['t_name'];
   $t_date=$row['t_date'];
  ?>
 <tr>
<td><?php echo $t_id; ?></td>
<td><?php echo $t_name; ?></td>
<td><?php echo $t_date; ?></td>
<td><a href="edit.php?edit-todo=<?php echo $t_id;?>" class="btn btn-primary">Edit Todo</a></td>
<td><a href="index.php?delete_todo=<?php echo $t_id; ?>" class="btn btn-danger"> Delete Todo</a></td> 
</tr>    
<?php
}
?>
</tbody>


  </table>
</div>
</body>


</html>