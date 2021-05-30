<?php

function emptyInputRegister($name,$email,$password,$password_repeat){

    $result=false;
    if(empty($name)||empty($email)||empty($password)||empty($password_repeat)){
     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
/*function invalidName($name){

    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/"),$name)
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
*/
function invalidEmail($email){

    $result=false;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
function passwordMatch($password,$password_repeat){

    $result=false;
    if($password!==$password_repeat)
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}

function nameExists($conn,$name){

    $sql="SELECT * FROM users WHERE usersName= ?;";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../register.php?error=statementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement,"s",$name);
    mysqli_stmt_execute($statement);

    $resultData=mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($resultData)){
return $row;

    }
else{
    $result=false;
    return $result;
}
mysqli_stmt_close($statement);
}


function createUser($conn,$name,$email,$password){

    $sql="INSERT INTO users (usersName,usersEmail,usersPassword) VALUES (?,?,?);";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../register.php?error=statementFailed");
        exit();
    }
$hashedPassword=password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement,"sss",$name,$email,$hashedPassword);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);
header("location:../register.php?error=none");
exit();
}



?>