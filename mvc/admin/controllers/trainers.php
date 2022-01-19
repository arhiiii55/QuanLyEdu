<?php
include("./system/config.php");
class trainers extends Controllers
{
    // trả về display sliderbar
    public function accountUserPage()
    {
        //lấy model ra xài
        $userM = $this->model("userModel");
        //lấy view  
        $this->view("masterAdminLayout", [
            "pages" => "page/users",
            "mau" => 'red',
            "User" => $userM->gettk()
        ]);
    }

    public function coursesDetail()
    {
        $listdataeducourse = $this->model("courseModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/allCourses",
            "eduCourse" => $listdataeducourse->ShoweduCourse(),
            "courseDetail" => $listdataeducourse->ShowCourseDetail(),
            "timeabledays" => $listdataeducourse->ShowtimeableDays(),
            "timeabletime" => $listdataeducourse->ShowtimeableTime()
        ]);
    }
    public function studentPage()
    {
        $listdatastudent = $this->model("studentModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/allstudent_insert",
            "showstudent" => $listdatastudent->showstudent(),
            "showstrainer" => $listdatastudent->showDSTrainer(),

        ]);
    }
    public function allstudentPage()
    {
        $listdatastudent = $this->model("studentModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/allstudent",
            "showstudent" => $listdatastudent->showstudent(),
            "showstrainer" => $listdatastudent->showDSTrainer(),
        ]);
    }
    public function trainerPage()
    {
        $ModelUSER = $this->model("userModel");
        $listdataTrainer = $this->model("trainerModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/alltrainer",
            "showstrainer" => $listdataTrainer->showDSTrainer(),
            "tkofTrainer" => $ModelUSER->gettk(),
        ]);
    }
    public function tablesdatatable()
    {
        $listdata = $this->model("liststudentModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/listDatabase",
            "showstudent" => $listdata->ShowDSStudent(),
            "ShowAllOfCourse" => $listdata->ShowAllOfCourse()
        ]);
    }
    public function add_trainer()
    {
        $result_mess = false;
        $ModelUSER = $this->model("userModel");
        if (isset($_POST['submit_add'])) {
            // $imgGV = $_POST["hinhanh"];
            $nameGV = isset($_POST['name']) ? $_POST['name'] : null;
            $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : '';
            $dv_congtac = isset($_POST['donvi']) ? $_POST['donvi'] : '';
            $thanhtich = isset($_POST['thanhtich']) ? $_POST['thanhtich'] : '';
            $kinhnghiem = isset($_POST['kinhnghiem']) ? $_POST['kinhnghiem'] : '';
            $sdtGV = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $gmailGV = isset($_POST['gmail']) ? $_POST['gmail'] : '';
            $actived = isset($_POST['actived']) ? $_POST['actived'] : '';
            $account_id = isset($_POST['account_id']) ? $_POST['account_id'] : '';
            $Modeltrainer = $this->model("trainerModel");
            // if (empty($_POST["hinhanh"] && $_POST["name"] && $_POST["chucvu"] && $_POST["donvi"] && $_POST["thanhtich"] && $_POST["kinhnghiem"]
            //     && $_POST["sdt"]  && $_POST["gmail"] && $_POST["account_id"] && $_POST["actived"])) {
            //     $ModelUSER = $this->model("userModel");
            //     $this->view("masterAdminLayout", [
            //         "pages" => "page/alltrainer",
            //         "showstrainer" => $Modeltrainer->showDSTrainer(),
            //         "tkofTrainer" => $ModelUSER->gettk(),
            //         "result_insert" => $result_mess
            //     ]);
            // }
            $ModelUSER = $this->model("userModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/alltrainer",
                "result_insert" => $Modeltrainer->addTrainer($nameGV, $chucvu, $dv_congtac, $thanhtich, $kinhnghiem, $sdtGV, $gmailGV, $actived, $account_id),
                "showstrainer" => $Modeltrainer->showDSTrainer(),
                "tkofTrainer" => $ModelUSER->gettk(),
            ]);
        } else {

            $Modeltrainer = $this->model("trainerModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/alltrainer",
                "showstrainer" => $Modeltrainer->showDSTrainer(),
                "tkofTrainer" => $ModelUSER->gettk(),
            ]);
        }
    }
    // xóa
    public function delete_trainer($id)
    {
        $Modeltrainer = $this->model("trainerModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/alltrainer",
            "deleteStudent" => $Modeltrainer->deleteTrainer($id),
            "showstrainer" => $Modeltrainer->showDSTrainer(),
        ]);
    }
    public function edit_trainer($id)
    {
        $Modeltrainer = $this->model("trainerModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/alltrainer_edit",
            "editTrainer" => $Modeltrainer->editTrainer($id),
            "showDSTrainer" => $Modeltrainer->showDSTrainer(),
        ]);
    }
    // Sửa 
    public function update_trainer($id)
    {
        $result_mess = false;
        if (isset($_POST['edit_trainers'])) {
            if (empty($_POST["name"] && $_POST["chucvu"] && $_POST["donvi"]
                && $_POST["thanhtich"] && $_POST["kinhnghiem"] && $_POST["sdt"] && $_POST["gmail"] && $_POST["actived"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/alltrainer_edit",
                    "result" => $result_mess
                ]);
            } else {
                $Modeltrainer = $this->model("trainerModel");
                $imgGV = $_POST["anhanh"];
                $nameGV = isset($_POST['name']) ? $_POST['name'] : null;
                $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : '';
                $dv_congtac = isset($_POST['donvi']) ? $_POST['donvi'] : '';
                $thanhtich = isset($_POST['thanhtich']) ? $_POST['thanhtich'] : '';
                $kinhnghiem = isset($_POST['kinhnghiem']) ? $_POST['kinhnghiem'] : '';
                $sdtGV = isset($_POST['sdt']) ? $_POST['sdt'] : '';
                $gmailGV = isset($_POST['gmail']) ? $_POST['gmail'] : '';
                $actived = isset($_POST['actived']) ? $_POST['actived'] : '';
                $this->view("masterAdminLayout", [
                    "pages" => "page/alltrainer_edit",
                    "updateTrainer" => $Modeltrainer->updateTrainer($id, $imgGV, $nameGV, $chucvu, $dv_congtac, $thanhtich, $kinhnghiem, $sdtGV, $gmailGV, $actived),
                    "editTrainer" => $Modeltrainer->editTrainer($id),
                    "showDSTrainer" => $Modeltrainer->showDSTrainer(),
                ]);
            }
        }
    }
}