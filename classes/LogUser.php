<?php

class LogUser
{
    private string $phoneNumber, $password;
    
    public function __construct($phoneNumber, $password)
    {
        $this->phoneNumber = $phoneNumber;
        $this->password = base64_encode(md5($password));
    }
    
    public function checkExistsUser()
    {
        $command = "SELECT * FROM Users WHERE phone_number = '$this->phoneNumber' AND password = '$this->password'";
        if($user = mysqli_fetch_row(mysqli_query(mysqli_connect('localhost', 'root', '', 'health'), $command)))
        {
            $_SESSION['surname'] = $user[0];
            $_SESSION['name'] = $user[1];
            $_SESSION['id'] = $user[4];
            setcookie('surname', $user[0], 0);
            setcookie('name', $user[1], 0);
            setcookie('id', $user[4], 0);
            return true;
        }
        else
            return false;
    }
}

?>