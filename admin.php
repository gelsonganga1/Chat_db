<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Realtime Chat App</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<?php
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "chat_db";
  
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if(!$conn){
      echo "Database connection error".mysqli_connect_error();
    }
    $sql = "SELECT `user_id`, `unique_id`, `name`, `email` FROM `users`";
    $result = mysqli_query($conn, $sql);


?>
<div class="wrapper">
    <section class="users">
      <header style="font-size: 16px;">Welcome to Admin Panel</header>
        <div class="content"> 

    

        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr style="margin:5px">
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                   
                    <td>
                        <form method="post" action="admin.php">
                            <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                            <input type="submit" name="submit" value="Remove" class="btn btn-outline-danger btn-sm">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>


</div>
    </section>
  </div>

    
</body>

<?php
mysqli_close($conn);
?>

<?php
session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "chat_db";
  
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if(!$conn){
      echo "Database connection error".mysqli_connect_error();
    }

    $sql = "DELETE FROM `users` WHERE user_id=$id";
    mysqli_query($conn, $sql);
    header("location: admin.php");  
    mysqli_close($conn);
   

 
}


?>