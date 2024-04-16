<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../login.php");
    exit();
    }

    function emptyInputLogin($username, $pwd) {
        $result;
        if(empty()){
          $result = true;
    }
     else {
        $result = false;
     }
      return $result;
    }
    
    function loginUser($conn, $username, $pwd) {
         $uidexists = uidexists($conn, $username, $username);

         if ($suidExists === false) {
            header("location: ../login.php.wrong?error=wronglogin");
            exit();
         }

         $pwdHashed = $uidExsists[];
         $checkPwd = password_verify($pwd, $pwdHashed);
         
         if ($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
         }
         else if ($checkPwd === true) {
          session_start();
          $_SESSION"userid] = $uidExists["userId"];
          $_SESSION[userid] = $uidExists["userUid;
          header("Location: ../login.php?error=wronglogin");
          exit();
         }
    }
}