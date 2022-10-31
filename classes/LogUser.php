<?php

session_start();

class LogUser
{
    private string $phoneNumber, $password;
    
    public function __construct($phoneNumber, $password)
    {
        $this->phoneNumber = $phoneNumber;
        $this->password = base64_encode(md5($password));
    }
    
    public function phoneNumberCheck()
    {
        if(preg_match('/\+375\((25|29|33|44)\)[0-9]{3}\-[0-9]{2}\-[0-9]{2}/', $this->phoneNumber))
            return true;
        else
            return false;
    }
    
    public function checkExistsUser()
    {
        $command = "SELECT * FROM Users WHERE phone_number = '$this->phoneNumber' AND password = '$this->password'";
        if($user = mysqli_fetch_row(mysqli_query(mysqli_connect('localhost', 'root', '', 'health'), $command)))
        {
            $_SESSION['surname'] = $user[0];
            $_SESSION['name'] = $user[1];
            $_SESSION['password'] = $user[7];
            setcookie('surname', $user[0], 0);
            setcookie('name', $user[1], 0);
            setcookie('password', $user[7], 0);
            return true;
        }
        else
            return false;
    }
}

?>