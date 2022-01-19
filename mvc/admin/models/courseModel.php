<?php
class courseModel extends DB
{
    public function ShoweduCourse()
    {
        $qreduCourse = "SELECT * FROM  edusourses";
        return $rerult =  mysqli_query($this->conn, $qreduCourse);
        // echo $qrstudent ;
    }
    public function ShowCourseDetail()
    {
        $qrCourseDetail = "SELECT * FROM  soursedetail
        INNER JOIN timeabledays ON soursedetail.day_id = timeabledays.id_days
        INNER JOIN timeabletime ON soursedetail.time_id = timeabletime.id_time
       ";
        return $rerult =  mysqli_query($this->conn, $qrCourseDetail);
        // echo $qrstudent ;
    }

    public function trainerInCourse()
    {
        $qrtrainerInCourse = "SELECT * FROM trainnerincoursedetail AS ctgvkh
        INNER JOIN trainers ON ctgvkh.id_trainer = trainers.id_trainer
        INNER JOIN soursedetail AS sdetail ON ctgvkh.id_sourse_detail = sdetail.id_sourse_detail
        INNER JOIN class ON ctgvkh.class_id = class.id_class 
        ";
        return $rerult =  mysqli_query($this->conn, $qrtrainerInCourse);
        // echo $qrstudent ;

    }
    public function eduCourse_all()
    {
        $qrCourse = " SELECT * FROM trainnerincoursedetail AS ctgvkh
        INNER JOIN trainers ON ctgvkh.id_trainer = trainers.id_trainer 	
        INNER JOIN soursedetail AS sdetail ON ctgvkh.id_sourse_detail = sdetail.id_sourse_detail
				INNER JOIN edusourses ON edusourses.id_eduSource = sdetail.edusource_id ";
        return $rerult =  mysqli_query($this->conn, $qrCourse);
        // echo $qrstudent ;

    }
    // public function getEdu_byid($edusource_id)
    // {
    //     $qrCourse = " SELECT * FROM  soursedetail 
    //     WHERE edusource_id = '$edusource_id'
    //     ";
    //     return $rerult =  mysqli_query($this->conn, $qrCourse);
    // }
    public function ShowtimeableDays()
    {
        $qrtimeabledays = "SELECT * FROM  timeabledays ";
        return $rerult =  mysqli_query($this->conn, $qrtimeabledays);
    }
    public function ShowtimeableTime()
    {
        $qrtimeabletime = "SELECT * FROM  timeabletime ";
        return $rerult =  mysqli_query($this->conn, $qrtimeabletime);
    }

    public function insertSourseDeitail($edu, $tenkh, $mota, $ngay, $gio, $sltuan, $sltiet, $ngaykhaigiang, $ngayketthuc, $active, $price)
    {
        $qrInsert = "INSERT INTO `soursedetail` (`id_sourse_detail`, `edusource_id`, `tenkhoahoc`, `mota`, 
        `day_id`, `time_id`, `sl_tuan`, `sl_tiet`, `ngaykhaigiang`, `ngayketthuc`, `active`, `price`) VALUES
         (null,'$edu' , '$tenkh', '$mota', '$ngay', '$gio', '$sltuan','$sltiet','$ngaykhaigiang','$ngayketthuc','$active','$price')";
        $result = false;
        if (mysqli_query($this->conn, $qrInsert)) {
            $result;
        }
        return  json_encode($result);
    }
    public function insert_courseDeitail_trainer($id_trainer, $id_sourse_detail, $class_id, $danhgia)
    {
        $qrInsert = "INSERT INTO `trainnerincoursedetail`(`id_trainer`, `id_sourse_detail`, `class_id`, `danhgia`) VALUES
         ('$id_trainer' , '$id_sourse_detail', '$class_id', '$danhgia')";
        $result = false;
        if (mysqli_query($this->conn, $qrInsert)) {
            $result;
        }
        return  json_encode($result);
    }
    public function deleteSourseDeitail($id)
    {
        $qrDelete = "DELETE FROM `soursedetail` WHERE `id_sourse_detail`='$id'";
        $result = false;
        if (mysqli_query($this->conn, $qrDelete)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function delete_EduSourse($id)
    {
        $qrDelete = "DELETE FROM `edusourses` WHERE `id_eduSource`='$id'";
        $result = false;
        if (mysqli_query($this->conn, $qrDelete)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function editSourseDeitail($id)
    {
        $qrEdit = "SELECT * FROM  soursedetail 
        INNER JOIN timeabledays ON soursedetail.day_id = timeabledays.id_days
        INNER JOIN timeabletime ON soursedetail.time_id = timeabletime.id_time
        WHERE `id_sourse_detail`= '$id' ";
        return  $rerult =  mysqli_query($this->conn, $qrEdit);
    }
    public function updateSourseDeitail($id, $edu, $tenkh, $mota, $ngay, $gio, $sltuan, $sltiet, $ngaykhaigiang, $ngayketthuc, $active, $price)
    {
        $qrUpdate = "UPDATE `soursedetail` SET `edusource_id`='$edu',`tenkhoahoc`='$tenkh',`mota`='$mota',`day_id`='$ngay',`time_id`='$gio',`sl_tuan`='$sltuan',
        `sl_tiet`='$sltiet',`ngaykhaigiang`='$ngaykhaigiang',`ngayketthuc`='$ngayketthuc',`active`='$active',`price`='$price'
        WHERE `id_sourse_detail`='$id'
        ";
        $result = false;
        if (mysqli_query($this->conn, $qrUpdate)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function getEdu_byid($edusource_id)
    {

        $qrCourse = " SELECT * FROM  soursedetail 
			INNER JOIN edusourses ON soursedetail.edusource_id = edusourses.id_eduSource
			WHERE edusource_id = '$edusource_id'
            ";
        return $rerult =  mysqli_query($this->conn, $qrCourse);
    }
    public function timeabledays_delete($id_day)
    {
        $qrDelete = " DELETE FROM `timeabledays`
        WHERE id_days = '$id_day'
        ";
        return $rerult =  mysqli_query($this->conn, $qrDelete);
    }
    public function timeabletime_delete($id_time)
    {
        $qrDelete = " DELETE FROM `timeabletime`
        WHERE id_time = '$id_time'
        ";
        return $rerult =  mysqli_query($this->conn, $qrDelete);
    }
}