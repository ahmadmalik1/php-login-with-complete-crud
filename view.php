<?php
  include "includes/session.php";
  include "dbconfig/config.php";
  error_reporting(~E_ALL);

    $id = $_GET['id'];
    mysqli_query($con, "delete from students where id='$id'");
    
    $query = "select * from students";
    $query_run = mysqli_query($con, $query);
    // delete record
    
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>
<?php include "includes/header.php";?>
    <div class="container">
        
        <div class="card text-dark bg-light m-5">
            
            <div class="card-header">
                Student Record <a href="form.php">Add</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <th>Sr#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Adress</th>
                    <th>More</th>
                    <tbody>
                        
                        <?php 
                        if(mysqli_num_rows($query_run) > 0 ){
                            foreach($query_run as $row){
                            ?>
                            <tr>
                            <td> <?php echo $row['id']; ?> </td>
                            <td> <img src="assets/uploads/<?php echo $row['img'] ?>" alt="loading" width="100px"> </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td> <?php echo $row['address']; ?> </td>
                            <td> <a href="edit.php?id=<?php echo $row['id'] ?>" >Edit</a> 
                                 <a href="" onclick="return del(<?php echo $row['id'] ?>)" >Delete</a> 
                            </td>
                            </tr>
                            <?php
                            } // loop end
                        
                        }else{
                            ?>
                            <tr><td> No record found </td></tr>
                            <?php
                        }
                        ?>
                       
                    
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<script>
function del(id){
    if(confirm("Delete this record?")){
        window.location = 'view.php?id=' + id;
    }
    else{}
    return false;
}


</script>
</body>
</html>