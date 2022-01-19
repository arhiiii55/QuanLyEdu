<?php
class classModel extends DB
{

    public function class_all()
    {
        $qrclass = "SELECT * FROM `class` 
		INNER JOIN soursedetail ON class.sourse_detail_id = soursedetail.id_sourse_detail
				INNER JOIN timeabledays ON timeabledays.id_days = soursedetail.day_id
			INNER JOIN timeabletime ON timeabletime.id_time = soursedetail.time_id
			ORDER BY id_class";
        return $rerult =  mysqli_query($this->conn, $qrclass);
    }
    public function class_all_id()
    {
        $qrclass = "SELECT * FROM `class` 
        INNER JOIN soursedetail ON class.sourse_detail_id = soursedetail.id_sourse_detail
			ORDER BY id_class";
        return $rerult =  mysqli_query($this->conn, $qrclass);
    }
    public function Count_studentReal()
    {
        $qrclass = "SELECT `id_class`, `ten_lop`, `phong`, `tenkhoahoc`,`thoigian` ,`buoi`,`lichhoc`,`sl_tuan`,  `so_luongHV` ,COUNT(id_class) as 'sl_Real' , `ngaykhaigiang` 
        FROM `class` 
        INNER JOIN soursedetail ON class.sourse_detail_id = soursedetail.id_sourse_detail
        INNER JOIN studentinsoursedetaill ON studentinsoursedetaill.id_sourse_detail = soursedetail.id_sourse_detail
            INNER JOIN timeabledays ON timeabledays.id_days = soursedetail.day_id
        INNER JOIN timeabletime ON timeabletime.id_time = soursedetail.time_id
        GROUP BY `id_class`, `ten_lop`, `phong`, `tenkhoahoc`, `so_luongHV`, `ngaykhaigiang` ,`thoigian` ,`buoi`,`lichhoc`,`sl_tuan`
        HAVING  COUNT(id_class) 
        ";
        return $rerult =  mysqli_query($this->conn, $qrclass);
    }
    public function countClass_forIndex()
    {
        $qrclass = "SELECT COUNT(id_class) AS 'tong' 
		FROM `class`
        ";
        return $rerult =  mysqli_query($this->conn, $qrclass);
    }
    public function addClass($name, $phong, $so_luongHV, $sourse_detail_id, $trangthai)
    {
        $qrInsert = "INSERT INTO `class`(`id_class`, `ten_lop`, `phong`, `so_luongHV`, `sourse_detail_id`, `trangthai`) 
            VALUES (null,'$name','$phong', '$so_luongHV', '$sourse_detail_id','$trangthai')";
        $result = false;
        if (mysqli_query($this->conn, $qrInsert)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function deleteClass($id_class)
    {
        $qrInsert = "DELETE FROM `class` WHERE  `id_class` = $id_class ";
        $result = false;
        if (mysqli_query($this->conn, $qrInsert)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function editClass($id_class)
    {
        $qrClassDetail = "SELECT * FROM  `class` WHERE `id_class`= '$id_class' ";
        return  $rerult =  mysqli_query($this->conn, $qrClassDetail);
    }
    public function updateClass($id_class, $name, $phong, $so_luongHV, $sourse_detail_id, $trangthai)
    {
        $qrUpdate = "UPDATE `class` SET `ten_lop`='$name',
        `phong`='$phong',`so_luongHV`='$so_luongHV',
        `sourse_detail_id`='$sourse_detail_id',`trangthai`='$trangthai' '
        WHERE `id_class`= '$id_class'";
        $result = false;
        if (mysqli_query($this->conn, $qrUpdate)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function editclass_getIdTrainer($id)
    {
        $qrallofcourse = "SELECT * FROM trainnerincoursedetail AS ctgvkh
        INNER JOIN trainers ON ctgvkh.id_trainer = trainers.id_trainer
				INNER JOIN account_user ON trainers.account_id = account_user.id_account
        INNER JOIN soursedetail AS sdetail ON ctgvkh.id_sourse_detail = sdetail.id_sourse_detail
				INNER JOIN timeabledays ON sdetail.day_id = timeabledays.id_days
        INNER JOIN timeabletime ON sdetail.time_id = timeabletime.id_time
        INNER JOIN class ON ctgvkh.class_id = class.id_class  
		WHERE `trainers`. `account_id`= '$id'
        ";
        return $rerult =  mysqli_query($this->conn, $qrallofcourse);
    }
    public function editclass_IdTrainer()
    {
        $qrallofcourse = "SELECT * FROM trainnerincoursedetail AS ctgvkh
        INNER JOIN trainers ON ctgvkh.id_trainer = trainers.id_trainer
				INNER JOIN account_user ON trainers.account_id = account_user.id_account
        INNER JOIN soursedetail AS sdetail ON ctgvkh.id_sourse_detail = sdetail.id_sourse_detail
				INNER JOIN timeabledays ON sdetail.day_id = timeabledays.id_days
        INNER JOIN timeabletime ON sdetail.time_id = timeabletime.id_time
        INNER JOIN class ON ctgvkh.class_id = class.id_class  
        ";
        return $rerult =  mysqli_query($this->conn, $qrallofcourse);
    }
}