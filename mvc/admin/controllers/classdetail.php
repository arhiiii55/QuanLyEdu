<?php
class classdetail extends Controllers
{
    public function class_detail()
    {
        $qrdataClass = $this->model("classModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/class",
            "class_all" => $qrdataClass->class_all(),
        ]);
    }
    public function class_insert()
    {
        $result_mess = false;
        if (isset($_POST['submit_add'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $phong = isset($_POST['phong']) ? $_POST['phong'] : '';
            $so_luongHV = isset($_POST['so_luongHV']) ? $_POST['so_luongHV'] : '';
            $sourse_detail_id = isset($_POST['sourse_detail_id']) ? $_POST['sourse_detail_id'] : '';
            $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
            $qrdataClass = $this->model("classModel");
            $listdata = $this->model("liststudentModel");
            if (empty($_POST["name"] && $_POST["phong"] && $_POST["so_luongHV"] && $_POST["sourse_detail_id"] && $_POST["trangthai"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/class",
                    "result_insert" => $result_mess,
                    "class_all" => $qrdataClass->class_all(),
                    "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),
                    "Count_studentReal" => $qrdataClass->Count_studentReal(),
                ]);
            }

            $this->view("masterAdminLayout", [
                "pages" => "page/class",
                "addClass" => $qrdataClass->addClass($name, $phong, $so_luongHV, $sourse_detail_id, $trangthai),
                "class_all" => $qrdataClass->class_all(),
                "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),
                "Count_studentReal" => $qrdataClass->Count_studentReal(),
            ]);
        } else {
            $listdata = $this->model("liststudentModel");
            $qrdataClass = $this->model("classModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/class",
                "class_all" => $qrdataClass->class_all(),
                "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),
                "Count_studentReal" => $qrdataClass->Count_studentReal(),
            ]);
        }
    }
    // xóa
    public function class_delete($id_class)
    {
        $listdata = $this->model("liststudentModel");
        $qrdataClass = $this->model("classModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/class",
            "deleteClass" => $qrdataClass->deleteClass($id_class),
            "class_all" => $qrdataClass->class_all(),
            "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),
            "Count_studentReal" => $qrdataClass->Count_studentReal(),
        ]);
    }
    public function class_edit($id_class)
    {
        $listdata = $this->model("liststudentModel");
        $qrdataClass = $this->model("classModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/class_edit",
            "editClass" => $qrdataClass->editClass($id_class),
            "class_all" => $qrdataClass->class_all(),
            "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),
            "Count_studentReal" => $qrdataClass->Count_studentReal(),
        ]);
    }
    // Sửa 
    public function class_update($id_class)
    {
        $result_mess = false;
        // $ModelStudentupdate = $this->model("studentModel");
        // $qrdataClass = $this->model("classModel");
        if (isset($_POST['submit_update'])) {
            if (empty($_POST["ten_lop"] && $_POST["phong"] && $_POST["so_luongHV"] && $_POST["sourse_detail_id"] && $_POST["trangthai"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/class_edit",
                    "result" => $result_mess,
                ]);
            } else {
                $qrdataClass = $this->model("classModel");
                $name = isset($_POST['ten_lop']) ? $_POST['ten_lop'] : null;
                $phong = isset($_POST['phong']) ? $_POST['phong'] : '';
                $so_luongHV = isset($_POST['so_luongHV']) ? $_POST['so_luongHV'] : '';
                $sourse_detail_id = isset($_POST['sourse_detail_id']) ? $_POST['sourse_detail_id'] : '';
                $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
                $this->view("masterAdminLayout", [
                    "pages" => "page/class_edit",
                    "editClass" => $qrdataClass->editClass($id_class),
                    "updateClass" => $qrdataClass->updateClass($id_class, $name, $phong, $so_luongHV, $sourse_detail_id, $trangthai),
                    "class_all" => $qrdataClass->class_all(),
                ]);
            }
        }
    }
}