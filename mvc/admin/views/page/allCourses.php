<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Khóa Học</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item active">Tất cả thông tin khóa học</li>
                        </ol>
                        <div class="modal fade custom-modal" tabindex="-1" role="dialog"
                            aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form action="course/courseDeitail_trainer" method="post"
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
                                                        <label>Mã Giáo Viên</label>
                                                        <select name="id_trainer" class="form-control">
                                                            <?php
                                                            $i = 1;
                                                            while ($row3 = mysqli_fetch_array($data["showstrainer"])) {
                                                                $i++;
                                                            ?>
                                                            <option name="id_trainer"
                                                                value="<?php echo $row3["id_trainer"] ?>">
                                                                <?php echo '[' . $row3["id_trainer"] . '] ' . $row3["ten_gv"] ?>
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
                                                        <label>Mã khóa học theo lớp:</label>

                                                        <select name="id_sourse_detail" class="form-control">
                                                            <?php
                                                            $i = 1;
                                                            while ($row = mysqli_fetch_array($data["class_all"])) {
                                                                $i++;
                                                            ?>
                                                            <option value=" <?php echo $row["id_sourse_detail"]; ?>">
                                                                <?php echo '[' . $row["id_sourse_detail"] . '] ' . $row["tenkhoahoc"] ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Mã Lớp :</label>
                                                        <select name="class_id" class="form-control" required>
                                                            <?php
                                                            $i = 1;
                                                            while ($row4 = mysqli_fetch_array($data["class_all_id"])) {
                                                                $i++;
                                                            ?>
                                                            <option value="<?php echo $row4["id_class"]; ?>">
                                                                <?php echo '[' . $row4["id_class"] . '] ' . $row4["ten_lop"] ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Tình trạng:</label>
                                                        <select name="tinhtrang" class="form-control" required>
                                                            <option value="Dự Kiến">Dự Kiến
                                                            </option>
                                                            <option value="Đang Học">Đang Học
                                                            </option>
                                                            <option value="Kết Thúc">Kết Thúc
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" name="submit_add" class="btn btn-primary">Xác
                                                nhận</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row center-row">

                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">

                    <div class="card mb-3">

                        <div class="card-body">

                            <form action="course/coursesDetail_create" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-xl-7 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>ID </label>
                                            <input class="form-control" name="id" type="text" readonly="Fasle">
                                        </div>
                                        <div class="form-group">
                                            <label>Chương Trình Đạo Tạo</label>
                                            <select name="edu" class="form-control" required>
                                                <option value="1">lập Trình Font-End</option>
                                                <option value="2">lập Trình Back-End</option>
                                                <option value="3">Tiếng Anh</option>
                                                <option value="4">Tiếng Nhật</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tên Khóa Học</label>
                                            <input class="form-control" name="tenkh" type="text" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Nội Dung</label>
                                            <!-- <input class="form-control" name="title" type="text" required> -->
                                            <textarea rows="3" class="form-control editor" name="mota"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>lịch học</label>
                                            <select name="day_id" class="form-control">
                                                <option value="1">19h30 - 21h30</option>
                                                <option value="2">18h30 - 21h</option>
                                                <option value="3">8h - 10h</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit_add" class="btn btn-primary btn-sm ">Thêm
                                                Khóa
                                                Học</button>
                                            <a href="Home/coursesDetail">
                                                <button type="button" class="btn btn-primary btn-sm ">load lại</button>
                                            </a>
                                            <span class="">
                                                <!-- pull-right -->
                                                <!-- btn btn-primary btn-sm -->
                                                <button class="btn btn-primary btn-sm " data-toggle="modal"
                                                    data-target="#modal_add_user">
                                                    <i class="fas fa-user-plus" aria-hidden="true"></i>Thêm Người phụ
                                                    trách</button>
                                            </span>

                                        </div>
                                        <i style="color: red;">Chú ý: Phần này của Chi Tiết Khóa Học</i>
                                    </div>

                                    <div class="form-group col-xl-5 col-md-6 col-sm-12 border-left">
                                        <div class="form-group">
                                            <label>Thời gian</label>
                                            <select name="time_id" class="form-control" required>
                                                <option value="1">Thứ: 2 - 4 -6</option>
                                                <option value="2">thứ: 3 - 5 -7</option>
                                                <option value="3">Thứ: 7 - CN</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng tuần</label>
                                            <input type="text" class="form-control" name="sl_tuan">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng tiết dạy</label>
                                            <input type="text" class="form-control" name="sl_tiet">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Khai Giảng</label>
                                            <input type="text" class="form-control" name="ngaykhaigiang">
                                        </div>

                                        <div class="form-group">
                                            <label>Ngày Kết Thúc</label>
                                            <input type="text" class="form-control" name="ngayketthuc">
                                        </div>
                                        <div class="form-group">
                                            <label>trạng thái hoạt động </label>
                                            <select name="actived" class="form-control">
                                                <!-- <input type="text" class="form-control" name="actived"> -->
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Ngừng</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>giá</label>
                                            <input type="text" class="form-control" name="price">
                                        </div>
                                    </div>

                                </div><!-- end row -->
                            </form>

                            <?php
                            if (isset($data["result_insert"])) {
                                if ($data["result_insert"] == true) { ?>
                            <?php
                                    echo '<script language="javascript">alert("Đã upload thành công!");</script>'; ?>

                            <?php }
                            } ?>
                        </div>
                        <!-- end card-body -->

                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->
            </div>
            <div class="row center-row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-table"></i> Bảng Thông tin Học sinh thu thập được</h3>
                            <p> Thông tin tất cả chương trình khóa học đào tạo
                            </p>

                        </div>


                        <div class="card-body">

                            <div id="accordion" role="tablist">
                                <?php
                                // $i = 1;
                                // while ($row = mysqli_fetch_array($data["class_all"])) {
                                //     $i++;
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Thông tin chương trình đào tạo
                                                <?php echo $row["ten_lop"]; ?>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel"
                                        aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="dataTable" class="table table-bordered table-hover display"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Tên chương trình đào tạo</th>
                                                            <th>mô tả</th>
                                                            <th>Thời gian tạo</th>
                                                            <th style="min-width:60px;">action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($data["eduCourse"])) {
                                                    ?>
                                                    <tbody>
                                                        <tr><?php $i++; ?>
                                                            <th>CTDT:
                                                                <?php echo $row["id_eduSource"] ?></th>
                                                            <td><?php echo $row["ten_daotao_khoahoc"] ?> </td>
                                                            <td><?php echo $row["mota"] ?></td>
                                                            <td><?php echo $row["datetime"] ?></td>
                                                            <td><a href="students/eduCourse_delete/<?php echo $row["id_eduSource"] ?>"
                                                                    class="btn btn-danger btn-sm btn-block mt-2"><i
                                                                        class="fas fa-trash"></i> Delete</a>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                    <?php } ?>
                                                </table>
                                                <?php
                                                if (isset($data["delete_eduCourse"])) {
                                                    if ($data["delete_eduCourse"] == true) {
                                                        echo '<script language="javascript">alert("Xóa thành công!");</script>';
                                                    } else {
                                                        echo '<script language="javascript">alert("Xóa thất bại!");</script>';
                                                    }
                                                } ?>
                                            </div>
                                            <!-- end table-responsive-->

                                        </div>
                                    </div>
                                </div>
                                <?php
                                //  } 
                                ?>
                                <!-- <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Collapsible Group Item #2
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird
                                            on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim
                                            keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                            proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                                            nesciunt you probably haven't heard of them accusamus labore sustainable
                                            VHS.
                                        </div>
                                    </div>
                                </div> -->

                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Thông tin các khóa học được mở
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <p>Thông tin các khóa học đang mở lớp và giảng dạy </p>
                                                <table id="dataTable" class="table table-bordered table-hover display"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>mã CTĐT</th>
                                                            <th>Tên Khóa Học</th>
                                                            <th>Nội Dung</th>
                                                            <th>Thời khóa biểu</th>
                                                            <th>Khung Giờ</th>
                                                            <th>số lượng tuần</th>
                                                            <th>số tiết học</th>
                                                            <th>Ngày khai giảng</th>
                                                            <th>Ngày kết thúc</th>
                                                            <th>trạng thái hoạt động</th>
                                                            <th> học Phí</th>
                                                            <th style="min-width:100px;">action</th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($data["courseDetail"])) {
                                                    ?>
                                                    <tbody>
                                                        <tr><?php $i++; ?>
                                                            <th>
                                                                <?php echo $row["id_sourse_detail"]; ?></th>
                                                            <td>CTDT: <?php echo $row["edusource_id"]; ?></td>
                                                            <td> <?php echo $row["tenkhoahoc"]; ?></td>
                                                            <td><?php echo $row["mota"]; ?></td>
                                                            <td><?php echo $row["lichhoc"]; ?></td>
                                                            <td><?php echo $row["thoigian"]; ?></td>
                                                            <td><?php echo $row["sl_tuan"]; ?></td>
                                                            <td><?php echo $row["sl_tiet"]; ?></td>
                                                            <td><?php echo $row["ngaykhaigiang"]; ?></td>
                                                            <td><?php echo $row["ngayketthuc"]; ?></td>
                                                            <td><?php echo $row["active"]; ?></td>
                                                            <td><?php echo $row["price"]; ?></td>
                                                            <td><a href="course/coursesDetail_delete/<?php echo $row["id_sourse_detail"]; ?>"
                                                                    class="btn btn-danger btn-sm btn-block mt-2"><i
                                                                        class="fas fa-trash"></i> Delete</a>
                                                                <a href="course/coursesDetail_edit/<?php echo $row["id_sourse_detail"]; ?>"
                                                                    class="btn btn-primary btn-sm btn-block"><i
                                                                        class="far fa-edit"></i>
                                                                    Edit</a>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                            <!-- end table-responsive-->

                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseThree" aria-expanded="true"
                                                aria-controls="collapseThree">
                                                Giáo viên phụ trách các lớp
                                                <?php echo $row["ten_lop"]; ?>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseThree" class="collapse show" role="tabpanel"
                                        aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="dataTable" class="table table-bordered table-hover display"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Khóa Học </th>
                                                            <th>Tên Khóa Học </th>
                                                            <th>Tên Giáo Viên</th>
                                                            <th>SĐT</th>
                                                            <th>Gmail</th>
                                                            <th>Ngày Khai Giảng</th>
                                                            <th>Ngày Kết Thúc</th>
                                                            <th>Tên Lớp</th>
                                                            <th>Phòng Học</th>
                                                            <th>Số Lượng Học Sinh</th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $i = 1;
                                                    while ($data2 = mysqli_fetch_array($data["ShowAllOfCourse"])) {
                                                    ?>
                                                    <tbody>
                                                        <tr><?php $i++; ?>
                                                            <th>
                                                                <?php echo $data2["id_sourse_detail"]; ?></th>
                                                            <td> <?php echo $data2["tenkhoahoc"]; ?></td>
                                                            <td> <?php echo $data2["ten_gv"]; ?></td>
                                                            <td> <?php echo $data2["sdt"]; ?></td>
                                                            <td> <?php echo $data2["gmail"]; ?></td>
                                                            <td> <?php echo $data2["ngaykhaigiang"]; ?></td>
                                                            <td> <?php echo $data2["ngayketthuc"]; ?></td>
                                                            <td> <?php echo $data2["ten_lop"]; ?></td>
                                                            <td> <?php echo $data2["phong"]; ?></td>
                                                            <td> <?php echo $data2["so_luongHV"]; ?></td>

                                                        </tr>
                                                    </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                            <!-- end table-responsive-->

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end card-->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-table"></i> Thời gian biểu</h3>
                            Hiển thị thời gian cụ thể cho từng khóa học</br>
                            <strong style="color: red;">lưu ý bạn xóa
                                mục này là các khóa lớp hiện tại của bạn bị
                                xóa</strong>
                        </div>

                        <div class="card-body">

                            <table class="table table-responsive-xl table-hover">
                                <the ad>
                                    <tr>

                                        <th>ID</th>
                                        <th>Thời gian </th>
                                        <th>Buổi</th>
                                        <th style="width:100px;">action</th>
                                    </tr>
                                </the>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($data["timeabletime"])) {
                                ?>
                                <tbody>
                                    <tr><?php $i++; ?>
                                        <th>
                                            <?php echo $row["id_time"] ?></th>
                                        <td><?php echo $row["thoigian"] ?> </td>
                                        <td><?php echo $row["buoi"] ?></td>
                                        <td><a href="course/timeableTime_delete/<?php echo $row["id_time"] ?>"
                                                class="btn btn-danger btn-sm btn-block mt-2"><i
                                                    class="fas fa-trash"></i> Delete</a>
                                        </td>

                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>

                        </div>
                    </div>
                    <!-- end card-->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-table"></i> Thời Khóa Biểu Ca Học</h3>
                            Hiển thị lịch học cụ thể cho từng khóa học</br>
                            <strong style="color: red;">lưu ý bạn xóa
                                mục này là các khóa lớp hiện tại của bạn bị
                                xóa</strong>
                            <!-- Add <i>.table-hover</i> to enable a hover state on table rows within a 'tbody'. <a
                                target="_blank"
                                href="https://getbootstrap.com/docs/4.3/content/tables/#bordered-table">(more
                                info)</a> -->
                        </div>

                        <div class="card-body">

                            <table class="table table-responsive-xl table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Lịch Học</th>
                                        <th>loại Ngày Học</th>
                                        <th style="width:100px;">action</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($data["timeabledays"])) {
                                ?>
                                <tbody>
                                    <tr><?php $i++; ?>
                                        <th>
                                            <?php echo $row["id_days"] ?></th>
                                        <td><?php echo $row["lichhoc"] ?> </td>
                                        <td><?php echo $row["loaingayhoc"] ?></td>
                                        <td><a href="course/timeableDays_delete/<?php echo $row["id_days"] ?>"
                                                class="btn btn-danger btn-sm btn-block mt-2"><i
                                                    class="fas fa-trash"></i> Delete</a>
                                        </td>

                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>

                        </div>
                    </div>
                    <!-- end card-->
                </div>
            </div>
        </div>
        <!-- END container-fluid -->

    </div>

</div>