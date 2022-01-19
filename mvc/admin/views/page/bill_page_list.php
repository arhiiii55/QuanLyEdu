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

                                        <div class="invoice-title text-center mb-3">
                                            <h2>Biên Lai Thu Học phí : </h2>
                                            <strong sclass="text-left">Mã biên lai:</strong> <br>
                                            <strong>Ngày
                                                lập
                                                Bill:</strong> April 17, 2018
                                        </div>
                                        <hr>
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <h5>Trạng thái</h5>
                                                    <select name="actived" class=" form-control">
                                                        <!-- <input type="text" class="form-control" name="actived"> -->
                                                        <option value="1">Hoạt động</option>
                                                        <option value="0">Ngừng</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                                                <h5>Người lập Bill:</h5><br>
                                                <address>
                                                    Jane Smith<br>
                                                    1234 Main<br>
                                                    Apt. 4B<br>
                                                    Springfield, ST 54321
                                                </address>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <h5>Hình thức thanh toán:</h5>
                                                <address>
                                                    Visa ending **** 7879<br>
                                                    johndoe@email.com
                                                </address>

                                            </div>
                                            <div class="col-xs-12 col-md-6 text-right">
                                                <h5>Order Date:</h5>
                                                <address>
                                                    April 17, 2018<br><br>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" style="margin: 0rem 1rem;"
                                                class=" btn btn-primary btn-sm" name="">Lập
                                                Hóa
                                                đơn</button> <a href="Home/studentPage" class="">
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#modal_add_user">
                                                    <i class="fas fa-user-plus" aria-hidden="true"></i>Tạo Học viên

                                                </button></a>
                                        </div>
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
                                                            <th style="min-width:60px;">action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        while ($row = mysqli_fetch_assoc($data["st_for_bill"])) {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $row["id_bill"] ?></th>
                                                            <td> <?php echo $row["student_id"]; ?></td>
                                                            <td> <?php echo $row["tenhv"]; ?></td>
                                                            <td><?php echo $row["sdt"]; ?></td>
                                                            <td><?php echo $row["gmail"]; ?></td>
                                                            <td><?php echo $row["sourse_detail_id"]; ?></td>
                                                            <td><?php echo $row["type"]; ?></td>
                                                            <td><?php echo $row["lydo"]; ?></td>
                                                            <td><?php echo $row["ngaylap_hd"]; ?></td>
                                                            <td><?php echo $row["total"]; ?></td>

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
                                <!-- <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Những Học viên đăng ký khóa học
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel"
                                        aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <p>Cho biết tình trạng học phí , Học đang học khóa học nào </p>
                                                <table id="dataTable" class="table table-bordered table-hover display"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Tên học Viên</th>
                                                            <th>Mã khóa học</th>
                                                            <th>Khóa Học Đăng Ký</th>
                                                            <th>Học Phí</th>
                                                            <th>Ngày Khai Giảng</th>
                                                            <th>Ngày Kết Thúc</th>
                                                            <th>tinh trạng</th>
                                                            <th>chức năng</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $i = 1;
                                                    while ($row1 = mysqli_fetch_assoc($data["showDSstudent"])) {
                                                    ?>
                                                    <tbody>
                                                        <tr><?php $i++; ?>
                                                            <th>
                                                                <?php echo $row1["id_students"] ?></th>
                                                            <td> <?php echo $row1["tenhv"]; ?></td>

                                                            <td><?php echo $row1["id_sourse_detail"]; ?></td>
                                                            <td><?php echo $row1["tenkhoahoc"]; ?></td>
                                                            <td> <?php echo $row1["price"] ?></td>
                                                            <td><?php echo $row1["ngaykhaigiang"]; ?> </td>
                                                            <td><?php echo $row1["ngayketthuc"]; ?></td>
                                                            <td><?php echo $row1["tinhtrang"]; ?></td>
                                                            <td><a href="students/student_incourse_delete/<?php echo $row1["id_students"]; ?>"
                                                                    class="btn 
                                                                 btn-danger btn-sm btn-block mt-2"><i
                                                                        class="fas fa-trash">
                                                                    </i>
                                                                    Delete </a></td>
                                                        </tr>
                                                    </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                             end table-responsive-->

                                <!-- </div>
                            <div class="card-body"> -->

                            </div>
                        </div>
                    </div> -->
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