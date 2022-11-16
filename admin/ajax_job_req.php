<?php

include("../include/connection.php");


$qu= "SELECT * FROM doctors WHERE status='Pending' ORDER BY data_reg ASC";
$res=mysqli_query($con,$qu);

$output="";

$output .="
<table class='table table-bordered'>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Gender</th>
        <th>Country</th>
        <th>Date Register</th>
        <th>Action</th>
    </tr>

";

if(mysqli_num_rows($res)<1){
    $output .="
    <tr>
        <td colspan='10' class='text-center'>No job Request Yet.</td>
    </tr>
    "
    ;
}

while($row = mysqli_fetch_array($res)){
    $output .="
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['lastname']."</td>
        <td>".$row['username']."</td>
        <td>".$row['email']."</td>
        <td>".$row['phone']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['country']."</td>
        <td>".$row['data_reg']."</td>
        <td>
            <div class='col-md-12'>
                <div class='row'>
                    <div class='col-md-6'>
                        <button id='".$row['id']."' class='btn btn-success approve btn-sm'>Approve</button>
                    </div>
                    <div class='col-md-6'>
                    <button id='".$row['id']."' class='btn btn-danger reject btn-sm '>Reject</button>
                    </div>
                </div>
            </div>
        </td>
   
    ";
}

$output .="
</tr>
</table>
";

echo $output;


?>