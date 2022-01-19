<div class="content-page">
    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">
            <!-- form đăng ký ẩn -->
            <div class="row center-row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Học Viên</h1>
                        <ol class="breadcrumb float-right">
                            <!-- <li class="breadcrumb-item active">Tất cả thông tin Học Viên</li> -->
                            <li class="breadcrumb-item active"> <span class="pull-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modal_add_user">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i> Học viên
                                        đăng ký khóa học</button>
                                </span>
                                <div class="modal fade custom-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form action="Home2/student_resgiter" method="post"
                                                enctype="multipart/form-data">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Học Viên đăng ký khóa học</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Id đăng ký</label>
                                                                <select name="id_students" class="form-control">
                                                                    <?php
                                                                    $i = 1;
                                                                    while ($row3 = mysqli_fetch_array($data["showstudent"])) {
                                                                        $i++;
                                                                    ?>
                                                                    <option name="id_students"
                                                                        value="<?php echo $row3["id_students"] ?>">
                                                                        <?php echo '[' . $row3["id_students"] . '] ' . $row3["tenhv"] ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                    <!-- <option value="0">NO</option> -->
                                                                </select>
                                                                <!-- <input class="form-control" name="id_students"
                                                                    type="text" /> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Mã khóa học:</label>

                                                                <select name="id_sourse_detail" class="form-control">
                                                                    <?php
                                                                    $i = 1;
                                                                    while ($row = mysqli_fetch_array($data["ShowAllOfCourse"])) {
                                                                        $i++;
                                                                    ?>
                                                                    <option
                                                                        value=" <?php echo $row["id_sourse_detail"]; ?>">
                                                                        <?php echo '[' . $row["id_sourse_detail"] . ']' . $row["tenkhoahoc"]; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <!-- <input class="form-control" name="id_sourse_detail"
                                                                    type="text" placeholder="vui lòng nhập vào đây" /> -->
                                                                <!-- <div class="card-body">
                                                                                    <input type="text" class="form-control"
                                                                                        name="singledatepicker" />
                                                                                </div> -->

                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class=" row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Tình trạng:</label>
                                                                <select name="tinhtrang" class="form-control" required>
                                                                    <option value="Đã thanh toán">Đã đóng tiền
                                                                    </option>
                                                                    <option value="Chưa thanh toán">Chưa đóng tiền
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>Email verified</label>
                                                                                    <select name="email_verified" class="form-control">
                                                                                        <option value="1">YES</option>
                                                                                        <option value="0">NO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>Active</label>
                                                                                    <select name="active" class="form-control">
                                                                                        <option value="1">YES</option>
                                                                                        <option value="0">NO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div> -->

                                                    <!-- <div class="form-group">
                                                                            <label>Avatar image (optional):</label>
                                                                            <br />
                                                                            <input type="file" name="image">
                                                                        </div> -->

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" name="submit_add" class="btn btn-primary">Xác
                                                        nhận</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                        <div class="clearfix">

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row center-row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                    <div class="card mb-3">

                        <div class="card-body">
                            <form action="Home2/allstudent_insert" method="POST" enctype="multipart/form-data">
                                <div class=" row">
                                    <div class="form-group col-xl-3 col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <!-- // id="filer_example2" multiple="multiple" -->
                                            <input class="form-control" name="hinhanh" type="file"
                                                style="border: 1px solid black">
                                        </div>
                                        <!-- <div class="card-header"> -->
                                    </div>
                                    <div class=" form-group col-xl-5 col-md-6 col-sm-12 border-left">

                                        <div class="form-group">
                                            <label>Tên Học Viên</label>
                                            <!-- dòng value b-->
                                            <input class="form-control" value="" name="tenhv" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày sinh </label>
                                            <!-- dòng value b-->
                                            <input class="form-control" title="ví dụ 2000/12/03"
                                                placeholder="Nhập Ngày sinh.." value="" name="ngaysinh" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Trường </label>
                                            <input type="text" class="form-control" name="truong">
                                        </div>
                                        <!-- required -->
                                        <!-- button   -->
                                        <div class="form-group">
                                            <button type="submit" name="add_student" class="btn btn-primary"> Thêm
                                                Học Viên </button>
                                            <a href="Home2/allstudentPage">
                                                <button type="button" name="" class=" btn btn-primary">Xem Danh
                                                    Sách Sinh Viên
                                                </button>
                                            </a>

                                        </div>
                                        <i style="color: red;">Chú ý: Phần này của Chi Tiết Học Viên</i>
                                    </div>

                                    <div class="form-group col-xl-4 col-md-5 col-sm-12 border-left">
                                        <div class="form-group">
                                            <label>số điện thoại</label>
                                            <!-- pattern="[1-9]{1}[0-9]{9}"  -->
                                            <input type="tel" title="Nhập sdt với 10 số" placeholder="Mobile number"
                                                class=" form-control" name="sdt">
                                        </div>
                                        <div class="form-group">
                                            <label>gmail</label>
                                            <input type="text" title="vd: abc@abc.com" placeholder="Nhập gmail của bạn"
                                                class="form-control" name="gmail">
                                        </div>
                                        <div class="form-group">
                                            <label>active</label>
                                            <select name="actived" class="form-control">
                                                <!-- <input type="text" class="form-control" name="actived"> -->
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Ngừng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    //  $count = mysqli_fetch_field($data["showstudent"])  
                                    //  
                                    ?>
                                    <!-- <input type="submit" class="btn btn-primary" value="Thêm Khóa Học"> -->
                                    <!-- <input type="submit" class="btn btn-primary" value="DS Học Viên"> -->
                                    <!-- <button type="submit" class="btn btn-primary"> Thêm Khóa
                                            Học </button> -->
                                    <!-- <a href="./student_view">
                                            <button type="button" class="btn btn-primary">DS Học Viên</button>
                                        </a> -->

                                </div>
                                <!-- end row -->

                            </form>

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