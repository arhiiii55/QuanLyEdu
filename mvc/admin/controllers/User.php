<?php
class User extends Controllers
{
    function datalist()
    {
        $this->view("home");
        $user = $this->model("userModel");
        echo $user->GetUser();
        // echo "haloo";
    }
    public function show()
    {
        //lấy model ra xài
        $userM = $this->model("userModel");
        //lấy view  
        $this->view("masterAdminLayout", [
            "mau" => 'red',
            "pages" => "page/users",
            "User" => $userM->gettk()
        ]);
    }
    public function loginpage()
    {
        $result_mess = false;
        // $qrTK = $this->model("userModel");
        if (isset($_POST["btn_dangnhap"])) {
            $username = $_POST["username"];
            $userpass = $_POST["password"];
            // $username = strip_tags($username);
            // $username = addslashes($username);
            // $password = strip_tags($password);
            // $password = addslashes($password);
            // $userpass = md5($userpass);
            $result = $this->model("userModel")->login($username);
            $count = mysqli_num_rows($result);
            if ($count >= 1) {
                // echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                // exit;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id_account"];
                    $username = $row["ten_taikhoan"];
                    $password = $row["mk_taikhoan"];
                    // $role = $row["role_id"];
                    // $phone = $row["phone"];
                    // $ngay = $row["ngaytao_tk"];
                }
                if (password_verify($userpass, $password)) {
                    $_SESSION["id_account"] = $id;
                    $this->view("masterAdminLayout", [
                        "pages" => "page/home",
                        "result" => $result_mess = true
                    ]);
                } else {
                    // $qrTK = $this->model("userModel");
                    $this->view("page/login", [
                        "result" => $result_mess
                    ]);
                }
                // if ($userpass != $_POST['password'] || $username != $_POST['username']) {
                //     echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                //     exit;
                // }
                // if ($password != $row['password']) {
                //     echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                //     exit;
                // } else {
                //     $this->view("masterAdminLayout", [
                //         "pages" => "page/home",
                //         "loginAdmin" => $qrTK->login($username)
                //     ]);
                // }
            }
        }

        $this->view("page/login", [
            // "loginAdmin" => $qrTK->login($username),
        ]);
    }
    public function addUser()
    {
        $result_mess = false;
        if (isset($_POST['addUser_submit'])) {


            if (empty($_POST["nameTk"] && $_POST["password"] && $_POST["role_id"] && $_POST["phone"] && $_POST["ngaytao"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/users",
                    "result_insert" => $result_mess
                ]);
            }
            $tenTk = isset($_POST['nameTk']) ? $_POST['nameTk'] : null;
            $password = $_POST['password'];
            // $password = password_hash($password, PASSWORD_DEFAULT);
            $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $ngaytao_tk = isset($_POST['ngaytao']) ? $_POST['ngaytao'] : null;
            $ModelUser = $this->model("userModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/users",
                "result_insert" => $ModelUser->insertUser($tenTk, $password, $role_id, $phone, $ngaytao_tk),
                "User" => $ModelUser->gettk(),
            ]);
        } else {
            $ModelUser = $this->model("userModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/users",
                "User" => $ModelUser->gettk(),
            ]);
        }
    }
    // xóa
    public function User_delete($id)
    {
        $ModelUser = $this->model("userModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/users",
            "deleteUser" => $ModelUser->deleteUser($id),
            "User" => $ModelUser->gettk(),
        ]);
    }
    public function User_edit($id)
    {
        $ModelUser = $this->model("userModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/user_edit",
            "editUser" => $ModelUser->editUser($id),
            "User" => $ModelUser->gettk(),
        ]);
    }
    // Sửa 
    public function User_update($id)
    {
        $result_mess = false;
        if (isset($_POST['editUser_submit'])) {
            if (empty($_POST["nameTk"] && $_POST["password"] && $_POST["role_id"] && $_POST["phone"] && $_POST["ngaytao"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/user_edit",
                    "result" => $result_mess
                ]);
            } else {
                $ModelUserupdate = $this->model("userModel");
                $tenTk = isset($_POST['nameTk']) ? $_POST['nameTk'] : null;
                $password = isset($_POST['password']) ? $_POST['password'] : null;
                $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : '';
                $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
                $ngaytao_tk = isset($_POST['ngaytao']) ? $_POST['ngaytao'] : '';
                $this->view("masterAdminLayout", [
                    "pages" => "page/user_edit",
                    "updateUser" => $ModelUserupdate->updateUser($id, $tenTk, $password, $role_id, $phone, $ngaytao_tk),
                    "editUser" => $ModelUserupdate->editUser($id),
                    "gettk" => $ModelUserupdate->gettk()
                ]);
            }
        }
    }
    public function test_editUser()
    {
        $this->view("masterAdminLayout", [
            "pages" => "page/user_edit",
            // "result" => $result_mess
        ]);
    }
}