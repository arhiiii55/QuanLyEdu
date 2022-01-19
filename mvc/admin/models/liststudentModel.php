<?php
class liststudentModel extends DB
{
    public function GetUser()
    {
        return "user is coming in the moment";
    }

    public function ShowDSStudent()
    {
        $qrstudent = " SELECT * FROM studentinsoursedetaill  
        INNER JOIN students ON studentinsoursedetaill.id_students = students.id_students 
        INNER JOIN soursedetail ON studentinsoursedetaill.id_sourse_detail = soursedetail.id_sourse_detail ";
        return $rerult =  mysqli_query($this->conn, $qrstudent);
    }
    public function ShowAllOfCourse()
    {

        $qrallofcourse = " SELECT * FROM trainnerincoursedetail AS ctgvkh
        INNER JOIN trainers ON ctgvkh.id_trainer = trainers.id_trainer
        INNER JOIN soursedetail AS sdetail ON ctgvkh.id_sourse_detail = sdetail.id_sourse_detail
        INNER JOIN class ON ctgvkh.class_id = class.id_class 
        ";
        return $rerult =  mysqli_query($this->conn, $qrallofcourse);
    }
}