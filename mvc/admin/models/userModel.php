<?php

class usermodel extends DB
{

    public function GetUser()
    {
        return "user is coming in the moment";
    }

    public function gettk()
    {

        $qr_user = " SELECT * 
        FROM account_user ac JOIN `role` r  
         ON r.id_role = ac.role_id";
        return $rerult =  mysqli_query($this->conn, $qr_user);
    }
    public function login($username, $password_input)
    {
        $qrlogin = " SELECT * FROM account_user WHERE `ten_taikhoan` = '$username' AND `mk_taikhoan` = '$password_input' ";
        return mysqli_query($this->conn, $qrlogin);
    }
    public function loginadmin($username)
    {
        $qrlogin = " SELECT * FROM account_user WHERE `ten_taikhoan` = '$username' ";
        return mysqli_query($this->conn, $qrlogin);
    }
    public function insertUser($tenTk, $password, $role_id, $phone, $ngaytao_tk)
    {
        $qrInsert = "INSERT INTO `account_user`(`id_account`, `ten_taikhoan`, `mk_taikhoan`, `role_id`, `phone`, `ngaytao_tk`) 
        VALUES (null,'$tenTk', '$password','$role_id','$phone','$ngaytao_tk')";
        $result = false;
        if (mysqli_query($this->conn, $qrInsert)) {
            $result;
        }
        return  json_encode($result);
    }
    public function deleteUser($id)
    {
        $qrdelete = "DELETE FROM `account_user` WHERE  `id_account` = $id ";
        $result = false;
        if (mysqli_query($this->conn, $qrdelete)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function editUser($id)
    {
        $qredituser = "SELECT * FROM  `account_user` WHERE `id_account`= '$id' ";
        return  $rerult =  mysqli_query($this->conn, $qredituser);
    }
    public function updateUser($id, $tenTk, $password, $role_id, $phone, $ngaytao_tk)
    {
        $qrUpdate = "UPDATE `account_user` SET `ten_taikhoan`='$tenTk',
        `mk_taikhoan`='$password',`role_id`='$role_id',`phone`='$phone',`ngaytao_tk`='$ngaytao_tk' 
        WHERE `id_account`='$id'";
        $result = false;
        if (mysqli_query($this->conn, $qrUpdate)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function logintest($username)
    {
        $qrlogin = " SELECT * FROM account_user WHERE `ten_taikhoan` = '$username' ";
        return mysqli_query($this->conn, $qrlogin);
    }
}