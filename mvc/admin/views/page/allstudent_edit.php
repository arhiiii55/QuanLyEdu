<div class="content-page">
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Học Viên</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item active">Tất cả thông tin Học Viên</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                    <div class="card mb-3">
                        <div class="card-body">
                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($data["editStudent"])) {
                                $i++;
                            ?>
                            <form action="students/allstudent_update/<?php echo $row["id_students"] ?>" method="POST">
                                <div class="row">
                                    <div class="form-group col-xl-3 col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <div class="img-avatar">
                                                <img src="mvc\photo\<?php echo $row["imgHV"]; ?>" alt=""
                                                    class="img-thumbnail">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <!-- id="filer_example2" multiple="multiple" -->
                                            <input type="file" value="mvc\photo\<?php echo $row["imgHV"]; ?>"
                                                name="hinhanh" style="border: 1px solid black">
                                        </div>
                                    </div>
                                    <div class="form-group col-xl-5 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input class="form-control" value="<?php echo $row["id_students"]; ?>"
                                                name="id_student" type="text" readonly="False">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên Học Viên</label>
                                            <!-- dòng value b-->
                                            <input class="form-control" name="tenhv"
                                                value="<?php echo $row["tenhv"]; ?>">
                                        </div>
                                        <div class=" form-group">
                                            <label>Ngày sinh </label>
                                            <!-- dòng value b-->
                                            <input class="form-control" title="ví dụ 2000/12/03"
                                                placeholder="Nhập Ngày sinh.." value="<?php echo $row["ngaysinh"]; ?>"
                                                name="ngaysinh" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Trường </label>
                                            <input type="text" value="<?php echo $row["truong"]; ?>"
                                                class="form-control" name="truong">
                                        </div>
                                        <!-- required -->
                                        <!-- button   -->
                                        <div class="form-group">
                                            <!-- <button type="submit" value="" name="add_student" class="btn btn-primary">
                                                Thêm
                                                Học Viên </button> -->
                                            <button type="submit" name="edit_student" class="btn btn-primary"> Sửa
                                                Học
                                                Viên
                                            </button>
                                            <a href="Home/allstudentPage">
                                                <button type="button" name="" class=" btn btn-primary">Xem Danh
                                                    Sách Sinh Viên
                                                </button>
                                            </a>
                                        </div>
                                        <i style="color: red;">Chú ý: Phần này của Chi Tiết Học Viên</i>
                                    </div>
                                    <div class="form-group col-xl-4 col-md-5 col-sm-12 border-left">
                                        <div class="form-group">
                                            <label>sdt</label>
                                            <input type="tel" value="<?php echo $row["sdt"]; ?>"
                                                pattern="[1-9]{1}[0-9]{9}" title="Nhập sdt với 10 số"
                                                placeholder="Mobile number" class="form-control" name="sdt">
                                        </div>
                                        <div class="form-group">
                                            <label>gmail</label>
                                            <input type="text" value="<?php echo $row["gmail"]; ?>"
                                                title="vd: abc@abc.com" placeholder="Nhập gmail của bạn"
                                                class="form-control" name="gmail">
                                        </div>
                                        <div class="form-group">
                                            <label>active</label>
                                            <select name="actived" class="form-control" required>
                                                <!-- <input type="text" class="form-control" name="actived"> -->
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Ngừng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                            </form>
                            <?php
                            }
                            ?>
                            <?php
                            if (isset($data["updateStudent"])) {
                                if ($data["updateStudent"] == true) { ?>
                            <?php
                                    echo '<script language="javascript">alert("Đã upload thành công!");</script>';
                                    ?>

                            <?php  } else { ?>
                            <h4 class="alert alert-warning">
                                <?php echo 'Thêm thất bại'; ?>
                            </h4>
                            <?php    }
                            } ?>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->
            </div>


        </div>

        <!-- END container-fluid -->

    </div>

</div>