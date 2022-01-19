<?php
class bill extends Controllers
{
    public function billPage()
    {
        $qrbill = $this->model("billModel");
        $this->view("masterAdminLayout", [
            "pages" => "page/bill_page_list",
            "bill_all" => $qrbill->bill_all(),
            "st_for_bill" => $qrbill->st_bill()
        ]);
    }
    public function createBill_page()
    {
        $result_mess = false;
        if (isset($_POST['submit_add'])) {
            $id_student = isset($_POST['id_student']) ? $_POST['txt_stid_student'] : '';
            $id_sourse = isset($_POST['id_sourse']) ? $_POST['id_sourse'] : '';
            $id_sale = isset($_POST['id_sale']) ? $_POST['id_sale'] : '';
            $lydo = isset($_POST['lydo']) ? $_POST['lydo'] : '';
            $ngay = isset($_POST['ngay']) ? $_POST['ngay'] : '';
            $total  = isset($_POST['total']) ? $_POST['total'] : '';
            $qrbill = $this->model("billModel");
            $qrsourse = $this->model("courseModel");
            if (empty($_POST["id_student"] && $_POST["id_sourse"] && $_POST["id_sale"] && $_POST["lydo"] && $_POST["ngay"] && $_POST["total"])) {
                $qrbill = $this->model("billModel");
                $qrsourse = $this->model("courseModel");
                $this->view("masterAdminLayout", [
                    "pages" => "page/bill_insert",
                    "bill_all" => $qrbill->bill_all(),
                    "st_for_bill" => $qrbill->st_bill(),
                    "insert_bill" => $qrbill->insert_bill($id_student, $id_sourse, $id_sale, $lydo, $ngay, $total),
                    "show_bill_full" => $qrbill->st_bill_sale_sourse(),
                    "sale_bill" => $qrbill->sale_bill(),
                    "ShowCourseDetail" => $qrsourse->ShowCourseDetail()
                ]);
            }

            $this->view("masterAdminLayout", [
                "pages" => "page/bill_insert",
                "bill_all" => $qrbill->bill_all(),
                "st_for_bill" => $qrbill->st_bill(),
                "insert_bill" => $qrbill->insert_bill($id_student, $id_sourse, $id_sale, $lydo, $ngay, $total),
                "show_bill_full" => $qrbill->st_bill_sale_sourse(),
                "ShowCourseDetail" => $qrsourse->ShowCourseDetail(),
                "sale_bill" => $qrbill->sale_bill()

            ]);
        } else {
            $qrbill = $this->model("billModel");
            $qrsourse = $this->model("courseModel");
            $this->view("masterAdminLayout", [
                "pages" => "page/bill_insert",
                "bill_all" => $qrbill->bill_all(),
                "st_for_bill" => $qrbill->st_bill(),
                "show_bill_full" => $qrbill->st_bill_sale_sourse(),
                "ShowCourseDetail" => $qrsourse->ShowCourseDetail(),
                "sale_bill" => $qrbill->sale_bill()
                // "insert_bill" => $qrbill->insert_bill($id_student, $id_sourse, $id_sale, $lydo, $ngay, $total)
            ]);
        }
    }
}