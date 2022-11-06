<?php

class RegUser
{
    private string $name, $surname, $patronymic, $phoneNumber, $id, $clinic, $district, $street, $build, $house, $apartment, $password, $confirmedPassword;
    
    public function __construct($name, $surname, $patronymic, $phoneNumber, $id, $clinic, $district, $street, $build, $house, $apartment, $password, $confirmedPassword)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->phoneNumber = $phoneNumber;
        $this->id = $id;
        $this->clinic = $clinic;
        $this->district = $district;
        $this->street = $street;
        $this->build = $build;
        $this->house = $house;
        $this->apartment = $apartment;
        $this->password = $password;
        $this->confirmedPassword = $confirmedPassword;
    }
    
    public function formatCheck($field)
    {
        for($i = 0; $i < mb_strlen($field); $i++)
            if(!preg_match('/[а-яёa-z]/i', mb_substr($field, $i, 1)))
               return false;
        return true;
    }
    
    public function lenCheck($field)
    {
        return mb_strlen($field) > 100 ? false : true;
    }
    
    public function phoneNumberCheck()
    {
        if(preg_match('/\+375(25|29|33|44)[0-9]{3}[0-9]{2}[0-9]{2}/', $this->phoneNumber))
            return true;
        else
            return false;
    }
    
    public function idFormatCheck()
    {
        for($i = 0; $i < mb_strlen($this->id); $i++)
            if(!ctype_alpha($this->id[$i]))
                if(!ctype_digit($this->id[$i]))
                    return false;
        return true;
    }
    
    public function idLenCheck()
    {
        return mb_strlen($this->id) < 14 ? false : true;
    }
    
    public function comparePasswords()
    {
        return strcmp($this->password, $this->confirmedPassword) != 0 ? false : true;
    }
}

?>