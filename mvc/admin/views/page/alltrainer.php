<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Giáo viên</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Giáo Viên</li>
                            <!-- <li class="breadcrumb-item active">Tables</li> -->
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                    <div class="card mb-3">

                        <div class="card-body">

                            <form action="trainers/add_trainer" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-xl-3 col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <!-- <div class="img-avatar">
                                                <img src="./mvc/photo/anhtest.jpg" alt="" name="" class="img-thumbnail">
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="file" name="hinhanh"
                                                style="border: 1px solid black">
                                        </div>
                                        <!-- <div class="card-header"> -->
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="form-group col-xl-5 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>ID giáo viên </label>
                                            <input class="form-control" name="title" type="text" readonly="False"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tên giáo viên </label>
                                            <input class="form-control" name="name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Chức vụ </label>
                                            <input class="form-control" name="chucvu" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Đơn vị công tác</label>
                                            <input class="form-control" name="donvi" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Thành tích</label>
                                            <textarea rows="3" class="form-control editor" name="thanhtich"></textarea>
                                            <!-- <input type="text" class="form-control"> -->
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="submit_add">Thêm Giáo
                                                Viên</button>
                                        </div>

                                    </div>
                                    <div class="form-group col-xl-4 col-md-5 col-sm-12 border-left">


                                        <div class="form-group">
                                            <label>kinh nghiệm</label>
                                            <textarea rows="3" class="form-control editor" name="kinhnghiem"></textarea>
                                            <!-- <input type="text" class="form-control" name="kinhnghiem"> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" name="sdt" id="tags" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Gmail</label>
                                            <input type="text" class="form-control" name="gmail" id="tags" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>trạng thái</label>
                                            <select name="actived" class="form-control">
                                                <!-- <input type="text" class="form-control" name="actived"> -->
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Ngừng</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>tài khoản</label>
                                            <select name="account_id" class="form-control">
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($data["tkofTrainer"])) {
                                                    $i++;
                                                ?>
                                                <!-- <input type="text" class="form-control" name="actived"> -->
                                                <option value="<?php echo $row["id_account"] ?>">
                                                    <?php echo $row["ten_doituong"] . ' | ' . $row["ten_taikhoan"] ?>
                                                </option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                    </div>
                                </div><!-- end row -->
                            </form>
                            <?php
                            // $row1 = mysqli_fetch_assoc($data["studentShow"]);
                            if (isset($data["result_insert"])) {
                                if ($data["result_insert"] == true) { ?>

                            <?php
                                    echo '<script language="javascript">alert("Đã upload thành công!");</script>';
                                    ?>

                            <?php }
                            } ?>
                        </div>
                        <!-- end card-body -->

                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-table"></i> Thông Tin Giáo Viên </h3>
                            Thông tin Giáo viên đầy đủ của học viện.
                            <!-- <a target="_blank" href="https://datatables.net/">(more details)</a> -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover display"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID giáo viên </th>
                                            <th>Hình ảnh </th>
                                            <th>Tên giáo viên </th>
                                            <th>Chức vụ</th>
                                            <th>Đơn vị công tác</th>
                                            <th>Thành tích</th>
                                            <th>Kinh Nghiệm</th>
                                            <th>Số điện thoại</th>
                                            <th>Gmail</th>
                                            <th>Active</th>
                                            <th>account</th>
                                            <th style="min-width:60px;">action</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($data["showstrainer"])) {
                                    ?>
                                    <tbody>
                                        <tr><?php $i++; ?>
                                            <th>
                                                <?php echo $row["id_trainer"]; ?></th>
                                            <th> <img style="width: 80px;"
                                                    src="mvc\photo\<?php echo $row["img_trainer"] ?>" alt=""
                                                    name="hinhanh" class="img-thumbnail"></th>
                                            <td> <?php echo $row["ten_gv"]; ?></td>
                                            <td> <?php echo $row["chucvu"]; ?></td>
                                            <td> <?php echo $row["dv_congtac"]; ?></td>
                                            <td> <?php echo $row["thanhtich"]; ?></td>
                                            <td> <?php echo $row["kinhnghiem"]; ?></td>
                                            <td> <?php echo $row["sdt"]; ?></td>
                                            <td> <?php echo $row["gmail"]; ?></td>
                                            <td> <?php echo $row["actived"]; ?></td>
                                            <td> <?php echo $row["ten_taikhoan"]; ?></td>
                                            <td>

                                                <a href="trainers/edit_trainer/<?php echo $row["id_trainer"]; ?>"
                                                    class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i>
                                                    Edit</a>
                                                <a href="trainers/delete_trainer/<?php echo $row["id_trainer"]; ?>"
                                                    class="btn btn-danger btn-sm btn-block mt-2"><i
                                                        class="fas fa-trash"></i> Delete</a>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- end table-responsive-->

                        </div>
                        <!-- end card-body-->

                    </div>
                    <!-- end card-->

                </div>

            </div>

        </div>
        <!-- END container-fluid -->

    </div>

</div>