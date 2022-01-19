<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Invoice</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- end row-->
            <div class="row center-row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-table"></i> Bảng Thông tin Học sinh thu thập được</h3>
                            <p> Quản lý học viên gồm thông tin cơ bản của học viên và những học viên đã đăng ký khóa học
                            </p>
                        </div>

                        <div class="card-body">

                            <div class="container">

                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="invoice-title text-left mb-3">
                                            <h2>Biên Lai Thu Học phí : </h2>
                                            <strong>Ngày
                                                lập
                                                Bill:</strong> April 17, 2018
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">

                                            <div class="modal-body box-class">
                                                <div class="form-group">
                                                    <label>Mã Học Viên</label>
                                                    <input class="form-control" value="" name="id_student"
                                                        type="text" />
                                                    <!-- <select name="id_student" class="form-control">

                                                        <option value="">
                                                          
                                                        </option>
                                                    </select> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label> Mã Khóa Học: </label>
                                                            <select name="id_sourse" class="form-control">
                                                                <?php
                                                                $i = 1;
                                                                while ($row = mysqli_fetch_array($data["ShowCourseDetail"])) {
                                                                    $i++;
                                                                ?>
                                                                <!-- <input type="text" class="form-control" name="actived"> -->
                                                                <option value="<?php echo $row["id_sourse_detail"] ?>">
                                                                    <?php echo $row["id_sourse_detail"] . ' | ' . $row["tenkhoahoc"] ?>
                                                                </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Giảm giá:</label>
                                                            <select name="id_student" class="form-control">
                                                                <?php
                                                                $i = 1;
                                                                while ($row = mysqli_fetch_array($data["sale_bill"])) {
                                                                    $i++;
                                                                ?>
                                                                <!-- <input type="text" class="form-control" name="actived"> -->
                                                                <option value="<?php echo $row["id_sale"] ?>">
                                                                    <?php echo $row["id_sale"] . ' | ' . $row["type"] ?>
                                                                </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label> ghi chú: </label>
                                                            <input class="form-control" value="" name="lydo"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Ngày lập Hóa đơn:</label>
                                                            <input class="form-control" value="" name="ngay"
                                                                type="date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Học phí:</label>
                                                            <input class="form-control" value="" name="sourse_detail_id"
                                                                type="text" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Thành tiền:</label>
                                                            <input class="form-control" value=" " name="total"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                            <div class="modal-footer">
                                                <a hef="Home/allstudentPage">
                                                    <button style="margin: 0rem 1rem;" class=" btn btn-primary btn-sm"
                                                        name="">xem danh sách
                                                        HĐ</button>
                                                </a>
                                                <a hef="Home/studentPage" class="">
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#modal_add_user">
                                                        <i class="fas fa-user-plus" aria-hidden="true"></i>Tạo Học
                                                        viên

                                                    </button></a>
                                                <button type="submit" style="background-color: red;" name="submit_add"
                                                    class="btn btn-primary">Xác
                                                    nhận</button>

                                            </div>

                                        </form>
                                        <hr>
                                        <!-- 
                                        <div class="row">
                                            <button type="submit" style="margin: 0rem 1rem;"
                                                class=" btn btn-primary btn-sm" name="">xem danh sách HĐ</button> <a
                                                href="Home/studentPage" class="">
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#modal_add_user">
                                                    <i class="fas fa-user-plus" aria-hidden="true"></i>Tạo Học viên

                                                </button></a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div id="accordion" role="tablist">
                                <?php
                                // $i = 1;
                                // while ($row = mysqli_fetch_array($data["class_all"])) {
                                //     $i++;
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true"
                                                aria-controls="collapseTwo">
                                                Tất cả Hóa đơn
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" role="tabpanel"
                                        aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div clazss="table-responsive">
                                                <input type="search" name="search_st" class="search_st form-control"
                                                    placeholder="Nhập vào mã hóa đơn" id="search_st">
                                                <table id="output_search"
                                                    class="table table-bordered table-hover display" style="width:100%">
                                                    <!-- <ul id="output_search"></ul> -->
                                                    <thead>
                                                        <tr>
                                                            <th>Mã bill</th>
                                                            <th>Mã học Học viên</th>
                                                            <th>Tên Học viên</th>
                                                            <th>Số điện Thoại</th>
                                                            <th>gmail</th>
                                                            <th>Mã khóa học</th>
                                                            <th>giảm giá</th>
                                                            <th>ghi chú</th>
                                                            <th>Ngày lập hóa đơn</th>
                                                            <th>Tổng tiền</th>
                                                            <th style="min-width:60px;">
                                                                action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        while ($row = mysqli_fetch_assoc($data["st_for_bill"])) {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $row["id_bill"] ?>
                                                            </th>
                                                            <td> <?php echo $row["student_id"]; ?>
                                                            </td>
                                                            <td> <?php echo $row["tenhv"]; ?>
                                                            </td>
                                                            <td><?php echo $row["sdt"]; ?>
                                                            </td>
                                                            <td><?php echo $row["gmail"]; ?>
                                                            </td>
                                                            <td><?php echo $row["sourse_detail_id"]; ?>
                                                            </td>
                                                            <td><?php echo $row["type"]; ?>
                                                            </td>
                                                            <td><?php echo $row["lydo"]; ?>
                                                            </td>
                                                            <td><?php echo $row["ngaylap_hd"]; ?>
                                                            </td>
                                                            <td><?php echo $row["total"]; ?>
                                                            </td>

                                                            <!-- <td>
                                                                <input type="submit" class="btn btn-primary" value="DS Học Viên">
                                                             </td> -->
                                                            <td>
                                                                <a href="students/allstudent_edit/<?php echo $row1["id_students"]; ?>"
                                                                    class="btn btn-primary btn-sm btn-block"><i
                                                                        class="far fa-edit"></i>
                                                                    Xem</a>

                                                                <a href="students/allstudent_delete/<?php echo $row1["id_students"]; ?>"
                                                                    class="btn 
                                                              btn-danger btn-sm btn-block mt-2"><i
                                                                        class="fas fa-trash">
                                                                    </i>
                                                                    Delete </a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                    <?php

                                                        } ?>
                                                    <?php
                                                if (isset($data["deleteStudent"])) {
                                                    if ($data["deleteStudent"] == true) { ?>
                                                    <h4 class="alert alert-success">
                                                        <?php echo 'xóa thành công'; ?>
                                                    </h4>
                                                    <?php  } else { ?>
                                                    <h4 class="alert alert-warning">
                                                        <?php echo 'xóa thất bại'; ?>
                                                    </h4>
                                                    <?php    }
                                                } ?>
                                                </table>
                                            </div>
                                            <!-- end table-responsive-->

                                        </div>
                                    </div>

                                </div>
                                <?php
                                //  } 
                                ?>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end card-->
    </div>
</div>

</div>
<!-- END container-fluid -->

</div>
<!-- END content -->

</div>
<!-- END content-page -->