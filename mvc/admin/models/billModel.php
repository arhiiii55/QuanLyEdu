<?php
class billModel extends DB
{
    public function bill_all()
    {
        $qrbill = "SELECT * FROM `bill`";
        return $rerult =  mysqli_query($this->conn, $qrbill);
    }
    public function st_bill()
    {
        $qrbill_st = "SELECT * FROM `bill` 
        INNER JOIN `students` on bill.student_id = students.id_students
        INNER JOIN `sale` on bill.sale_id = sale.id_sale ";
        return $result = mysqli_query($this->conn, $qrbill_st);
    }
    public function insert_bill($id_student, $id_sourse, $id_sale, $lydo, $ngay, $total)
    {
        $qrbill_insert = "INSERT INTO `bill`(`id_bill`, `student_id`, `sourse_detail_id`, `sale_id`, `lydo`, `ngaylap_hd`, `total`)
         VALUES (null,'$id_student','$id_sourse','$id_sale','$lydo','$ngay','$total')";
        $result = false;
        if (mysqli_query($this->conn, $qrbill_insert)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function st_bill_sale_sourse()
    {
        $qrbill_all = "SELECT * FROM bill 
        INNER JOIN students on bill.student_id = students.id_students
        INNER JOIN sale on bill.sale_id = sale.id_sale
        INNER JOIN soursedetail on soursedetail.id_sourse_detail = bill.sourse_detail_id";
        return $result = mysqli_query($this->conn, $qrbill_all);
    }
    public function sale_bill()
    {
        
        $qrbill_sale = "SELECT * FROM `sale` 
        INNER JOIN `bill` on bill.sale_id = sale.id_sale";
        return $result = mysqli_query($this->conn, $qrbill_sale);
    }
}