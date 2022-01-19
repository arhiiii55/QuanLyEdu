<?php
class course extends Controllers
{
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
    public function coursesDetail_create()
    {
        $result_mess = false;
        if (isset($_POST['submit_add'])) {
            $edu = isset($_POST['edu']) ? $_POST['edu'] : null;
            $tenkh = isset($_POST['tenkh']) ? $_POST['tenkh'] : null;
            $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
            $ngay = isset($_POST['day_id']) ? $_POST['day_id'] : '';
            $gio = isset($_POST['time_id']) ? $_POST['time_id'] : '';
            $sltuan = isset($_POST['sl_tuan']) ? $_POST['sl_tuan'] : '';
            $sltiet = isset($_POST['sl_tiet']) ? $_POST['sl_tiet'] : '';
            $ngaykhaigiang = isset($_POST['ngaykhaigiang']) ? $_POST['ngaykhaigiang'] : '';
            $ngayketthuc = isset($_POST['ngayketthuc']) ? $_POST['ngayketthuc'] : '';
            $active = isset($_POST['actived']) ? $_POST['actived'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $listdataeducourse = $this->model("courseModel");
            if (empty($_POST["edu"] && $_POST["tenkh"] && $_POST["mota"]
                && $_POST["day_id"] && $_POST["time_id"] && $_POST["sl_tuan"]
                && $_POST["sl_tiet"] && $_POST["ngaykhaigiang"]
                && $_POST["ngayketthuc"] && $_POST["actived"] && $_POST["price"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/allCourses",
                    "eduCourse" => $listdataeducourse->ShoweduCourse(),
                    "courseDetail" => $listdataeducourse->ShowCourseDetail(),
                    "timeabledays" => $listdataeducourse->ShowtimeableDays(),
                    "timeabletime" => $listdataeducourse->ShowtimeableTime(),
                    "result_insert" => $result_mess
                ]);
            }
            $this->view("masterAdminLayout", [
                "pages" => "page/allCourses",
                "result_insert" => $listdataeducourse->insertSourseDeitail($edu, $tenkh, $mota, $ngay, $gio, $sltuan, $sltiet, $ngaykhaigiang, $ngayketthuc, $active, $price),
                "eduCourse" => $listdataeducourse->ShoweduCourse(),
                "courseDetail" => $listdataeducourse->ShowCourseDetail(),
                "timeabledays" => $listdataeducourse->ShowtimeableDays(),
                "timeabletime" => $listdataeducourse->ShowtimeableTime()
            ]);
        } else {
            $listdataeducourse = $this->model("courseModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/allCourses",
                "eduCourse" => $listdataeducourse->ShoweduCourse(),
                "courseDetail" => $listdataeducourse->ShowCourseDetail(),
                "timeabledays" => $listdataeducourse->ShowtimeableDays(),
                "timeabletime" => $listdataeducourse->ShowtimeableTime()
            ]);
        }
    }
    public function courseDeitail_trainer()
    {
        $result_mess = false;


        if (isset($_POST['submit_add'])) {
            $id_trainer = isset($_POST['id_trainer']) ? $_POST['id_trainer'] : null;
            $id_sourse_detail = isset($_POST['id_sourse_detail']) ? $_POST['id_sourse_detail'] : null;
            $class_id = isset($_POST['class_id']) ? $_POST['class_id'] : null;
            $danhgia = isset($_POST['danhgia']) ? $_POST['danhgia'] : '';
            $listdataeducourse = $this->model("courseModel");
            $listdataTrainer = $this->model("trainerModel");
            $classdata = $this->model("classModel");
            $listdata = $this->model("liststudentModel");

            if (empty($_POST["id_trainer"] && $_POST["id_sourse_detail"] && $_POST["class_id"]
                && $_POST["danhgia"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/allCourses",
                    "eduCourse" => $listdataeducourse->ShoweduCourse(),
                    "courseDetail" => $listdataeducourse->ShowCourseDetail(),
                    "timeabledays" => $listdataeducourse->ShowtimeableDays(),
                    "timeabletime" => $listdataeducourse->ShowtimeableTime(),
                    "class_all" =>  $classdata->class_all(),
                    "class_all_id" => $classdata->class_all_id(),
                    "showstrainer" => $listdataTrainer->showDSTrainer(),
                    "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),
                    "result_insert" => $result_mess
                ]);
            }
            $this->view("masterAdminLayout", [
                "pages" => "page/allCourses",
                "result_insert" => $listdataeducourse->insert_courseDeitail_trainer($id_trainer, $id_sourse_detail, $class_id, $danhgia),
                "eduCourse" => $listdataeducourse->ShoweduCourse(),
                "courseDetail" => $listdataeducourse->ShowCourseDetail(),
                "timeabledays" => $listdataeducourse->ShowtimeableDays(),
                "timeabletime" => $listdataeducourse->ShowtimeableTime(),
                "class_all" =>  $classdata->class_all(),
                "class_all_id" => $classdata->class_all_id(),
                "showstrainer" => $listdataTrainer->showDSTrainer(),
                "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),

            ]);
        } else {
            $listdata = $this->model("liststudentModel");
            $listdataTrainer = $this->model("trainerModel");
            $classdata = $this->model("classModel");
            $listdataeducourse = $this->model("courseModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/allCourses",
                "eduCourse" => $listdataeducourse->ShoweduCourse(),
                "courseDetail" => $listdataeducourse->ShowCourseDetail(),
                "timeabledays" => $listdataeducourse->ShowtimeableDays(),
                "timeabletime" => $listdataeducourse->ShowtimeableTime(),
                "class_all" =>  $classdata->class_all(),
                "class_all_id" => $classdata->class_all_id(),
                "showstrainer" => $listdataTrainer->showDSTrainer(),
                "ShowAllOfCourse" => $listdata->ShowAllOfCourse(),


            ]);
        }
    }
    // xóa
    public function coursesDetail_delete($id)
    {
        $listdataeducourse = $this->model("courseModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/allCourses",
            "delete_course" => $listdataeducourse->deleteSourseDeitail($id),
            "eduCourse" => $listdataeducourse->ShoweduCourse(),
            "courseDetail" => $listdataeducourse->ShowCourseDetail(),
            "timeabledays" => $listdataeducourse->ShowtimeableDays(),
            "timeabletime" => $listdataeducourse->ShowtimeableTime()
        ]);
    }
    public function eduCourse_delete($id)
    {
        $listdataeducourse = $this->model("courseModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/allCourses",
            "delete_eduCourse" => $listdataeducourse->delete_EduSourse($id),
            "eduCourse" => $listdataeducourse->ShoweduCourse(),
            "courseDetail" => $listdataeducourse->ShowCourseDetail(),
            "timeabledays" => $listdataeducourse->ShowtimeableDays(),
            "timeabletime" => $listdataeducourse->ShowtimeableTime()
        ]);
    }
    public function timeableDays_delete($id_day)
    {
        $listdataeducourse = $this->model("courseModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/allCourses",
            "timeabledays_delete" => $listdataeducourse->timeabledays_delete($id_day),
            "eduCourse" => $listdataeducourse->ShoweduCourse(),
            "courseDetail" => $listdataeducourse->ShowCourseDetail(),
            "timeabledays" => $listdataeducourse->ShowtimeableDays(),
            "timeabletime" => $listdataeducourse->ShowtimeableTime()
        ]);
    }
    public function timeableTime_delete($id_time)
    {
        $listdataeducourse = $this->model("courseModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/allCourses",
            "timeabletime_delete" => $listdataeducourse->timeabletime_delete($id_time),
            "eduCourse" => $listdataeducourse->ShoweduCourse(),
            "courseDetail" => $listdataeducourse->ShowCourseDetail(),
            "timeabledays" => $listdataeducourse->ShowtimeableDays(),
            "timeabletime" => $listdataeducourse->ShowtimeableTime()
        ]);
    }
    public function coursesDetail_edit($id)
    {
        $listdataeducourse = $this->model("courseModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/CourseDeitail_edit",
            "editSourseDeitail" => $listdataeducourse->editSourseDeitail($id),
            "eduCourse" => $listdataeducourse->ShoweduCourse(),
            "courseDetail" => $listdataeducourse->ShowCourseDetail(),
            "timeabledays" => $listdataeducourse->ShowtimeableDays(),
            "timeabletime" => $listdataeducourse->ShowtimeableTime()
        ]);
    }
    // Sửa 
    public function coursesDetail_update($id)
    {
        $result_mess = false;
        if (isset($_POST["submit_edit"])) {

            if (empty($_POST["edu"] && $_POST["tenkh"] && $_POST["mota"]
                && $_POST["day_id"] && $_POST["time_id"] && $_POST["sl_tuan"]
                && $_POST["sl_tiet"] && $_POST["ngaykhaigiang"]
                && $_POST["ngayketthuc"] && $_POST["actived"] && $_POST["price"])) {
                $this->view("masterAdminLayout", [
                    "pages" => "page/CourseDeitail_edit",
                    "result" => $result_mess
                ]);
            } else {
                $listdataeducourse = $this->model("courseModel");
                $edu = isset($_POST['edu']) ? $_POST['edu'] : null;
                $tenkh = isset($_POST['tenkh']) ? $_POST['tenkh'] : null;
                $mota = isset($_POST['mota']) ? $_POST['mota'] : null;
                $ngay = isset($_POST['day_id']) ? $_POST['day_id'] : '';
                $gio = isset($_POST['time_id']) ? $_POST['time_id'] : '';
                $sltuan = isset($_POST['sl_tuan']) ? $_POST['sl_tuan'] : '';
                $sltiet = isset($_POST['sl_tiet']) ? $_POST['sl_tiet'] : '';
                $ngaykhaigiang = isset($_POST['ngaykhaigiang']) ? $_POST['ngaykhaigiang'] : '';
                $ngayketthuc = isset($_POST['ngayketthuc']) ? $_POST['ngayketthuc'] : '';
                $active = isset($_POST['actived']) ? $_POST['actived'] : '';
                $price = isset($_POST['price']) ? $_POST['price'] : '';
                $this->view("masterAdminLayout", [
                    "pages" => "page/CourseDeitail_edit",
                    "updateSourseDeitail" => $listdataeducourse->updateSourseDeitail($id, $edu, $tenkh, $mota, $ngay, $gio, $sltuan, $sltiet, $ngaykhaigiang, $ngayketthuc, $active, $price),
                    "editSourseDeitail" => $listdataeducourse->editSourseDeitail($id),
                    "eduCourse" => $listdataeducourse->ShoweduCourse(),
                    "courseDetail" => $listdataeducourse->ShowCourseDetail(),
                    "timeabledays" => $listdataeducourse->ShowtimeableDays(),
                    "timeabletime" => $listdataeducourse->ShowtimeableTime()
                ]);
            }
        }
    }
}