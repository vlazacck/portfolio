<?php
$username=filter_input(INPUT_POST, 'username');
$Email=filter_input(INPUT_POST, 'Email');
$project = filter_input(INPUT_POST,'Project');
$message = filter_input(INPUT_POST,'message');


if(!empty($username)){
  if (!empty($Email)){
           $host ="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="dbname";
            $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if(mysqli_connect_error()){
                die('connection failed ('. mysqli_connect_errno().')'. mysqli_connect_error());
            
            }
            else{
                $sql="INSERT INTO ipp (name,email,project,message) values ( '$username','$Email','$project','$message')";
                if($conn->query($sql)){

                   echo "New record is inserted succesfully";
                }
                else{
                       echo "Error: ". $sql. "<br>" . $conn->error;

                }
                $conn->close(); }       
  }
  else{ echo "Email shoud not be empty";
    die();
  }
}
    else{ echo "username shoud not be empty";
        die();
}
?>