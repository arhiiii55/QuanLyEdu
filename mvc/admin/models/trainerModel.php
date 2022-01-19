<?php
class trainerModel extends DB
{
    public function GetUser()
    {
        return "user is coming in the moment";
    }

    public function showDSTrainer()
    {
        $qrTrainer = "SELECT * FROM `trainers` 
        INNER JOIN `account_user` ON trainers.account_id = account_user.id_account ";
        return $rerult =  mysqli_query($this->conn, $qrTrainer);
    }
    public function addTrainer($nameGV, $chucvu, $dv_congtac, $thanhtich, $kinhnghiem, $sdtGV, $gmailGV, $actived, $account_id)
    {
        $qrInsert = "INSERT INTO `trainers`(`ten_gv`, `chucvu`, `dv_congtac`, `thanhtich`, `kinhnghiem`, `sdt`, `gmail`, `actived`, `account_id`) 
            VALUES ('$nameGV','$chucvu', '$dv_congtac', '$thanhtich', '$kinhnghiem', '$sdtGV', '$gmailGV','$actived','$account_id')";
        $result = false;
        if (mysqli_query($this->conn, $qrInsert)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function deleteTrainer($id)
    {
        $qrInsert = "DELETE FROM `trainers` WHERE  `id_trainer` = $id ";
        $result = false;
        if (mysqli_query($this->conn, $qrInsert)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function editTrainer($id)
    {
        $qrtrainer = "SELECT * FROM  `trainers` WHERE `id_trainer`= '$id' ";
        return  $rerult =  mysqli_query($this->conn, $qrtrainer);
    }
    public function updateTrainer($id, $imgGV, $nameGV, $chucvu, $dv_congtac, $thanhtich, $kinhnghiem, $sdtGV, $gmailGV, $actived)
    {
        $qrUpdate = "UPDATE `trainers` SET
        `img_trainer`='$imgGV',
        `ten_gv`='$nameGV',`chucvu`='$chucvu',
        `dv_congtac`='$dv_congtac',`thanhtich`='$thanhtich',`kinhnghiem`='$kinhnghiem',`sdt`='$sdtGV',
        `gmail`='$gmailGV',`actived`='$actived'
        WHERE `id_trainer`= '$id'";
        $result = false;
        if (mysqli_query($this->conn, $qrUpdate)) {
            $result = true;
        }
        return  json_encode($result);
    }
    public function editTrainer_GV($id)
    {
        $qrtrainer = "SELECT * FROM  `trainers` WHERE `account_id`= '$id' ";
        return  $rerult =  mysqli_query($this->conn, $qrtrainer);
    }
    public function updateTrainer_GV($id, $imgGV, $nameGV, $chucvu, $dv_congtac, $thanhtich, $kinhnghiem, $sdtGV, $gmailGV, $actived, $account)
    {
        $qrUpdate = "UPDATE `trainers` SET
        `img_trainer`='$imgGV',
        `ten_gv`='$nameGV',`chucvu`='$chucvu',
        `dv_congtac`='$dv_congtac',`thanhtich`='$thanhtich',`kinhnghiem`='$kinhnghiem',`sdt`='$sdtGV',
        `gmail`='$gmailGV',`actived`='$actived',`account_id`='$account'
        WHERE `account_id`= '$id'";
        $result = false;
        if (mysqli_query($this->conn, $qrUpdate)) {
            $result = true;
        }
        return  json_encode($result);
    }
}