<?php
require_once("../admin/config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin đăng</title>
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../pages/assets/css/style.css">
    <link rel="stylesheet" href="../pages/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
</head>

<body>
    <div class="main">
        <!--  Header  -->
        <?php require_once('../admin/header.php'); ?>
        <!--End Header-->

        <!-- Start Breadcrumb-->
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../pages/index.html"><i class="fa-solid fa-house me-1"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý tin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-content">
                        <h6 class="post-content__title">QUẢN LÝ ĐƠN HỖ TRỢ</h6>
                        <div class="post-content__heading">
                            <div class="row mx-0">
                                <div class="col-lg-2 col-md-3 col-4 px-0 ">
                                    <a href="#post-success" class="tabs active">Đang xử lý (<?=mysqli_num_rows($ketnoi->query("SELECT * FROM `support` WHERE `trang_thai` = '0'"));?>)</a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-4 px-0">
                                    <a href="#post-waiting" class="tabs">Đã xử lý (<?=mysqli_num_rows($ketnoi->query("SELECT * FROM `support` WHERE `trang_thai` = '1'"));?>)</a>
                                </div>
                            </div>
                        </div>
                        <div class="post-content__body">
                            <!--Tin đăng thành công-->
                            <div class="tab-content active" id="post-success">
                                <table>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Nội dung</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $page = 1;
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    }
                                    if ($page == "" or $page < 1) {
                                        $page = 1;
                                    }
                                    $so_tab = $page * 10;
                                    $i = 0;
                                    $SQL = "SELECT * FROM `support` WHERE `trang_thai` = '0'";
                                    //echo($SQL);
                                    $querryy = $ketnoi->query($SQL);
                                    while ($row = mysqli_fetch_array($querryy)) {
                                        $id = $row['id'];
                                        $username_ = $row['username'];
                                        $email = $row['email'];
                                        $tieu_de = $row['tieu_de'];
                                        $noi_dung = $row['noi_dung'];
                                        $ngay_gui = $row['ngay_gui'];


                                        $tk = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username_' ")->fetch_array();

                                        $i++;
                                        if ($i >= ($so_tab - 10) and $i < $so_tab) {
                                    ?>
                                    <tr>
                                        <td><?=$id?></td>
                                        <td style="text-align: left; padding-left: 5px;">
                                                Tên: <?=$tk['name']?> 
                                            <br/> Email: <?=$email?> 
                                            <br/> Tiêu đề: <?=$tieu_de?> 
                                            <br/> Nội Dung: <?=$noi_dung?> 
                                            <br/> Thời gian: <?=$ngay_gui?> 
                                        </td>
                                        <td>
                                            <a href="../pages/run_code.php?HOANTAT_SP=<?=$id?>" style="background-color:#4fba69;"><i class="fa-solid fa-check"></i> Hoàn tất</a>
                                        </td>
                                    </tr>
                                <?php } }?>
                                </table>
                            </div>


                            <!--Tin đang xử lý-->
                            <div class="tab-content" id="post-waiting">
                                <table class="w-100 ">
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Nội dung</th>
                                    </tr>
                                    <?php
                                    $page = 1;
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    }
                                    if ($page == "" or $page < 1) {
                                        $page = 1;
                                    }
                                    $so_tab = $page * 10;
                                    $i = 0;
                                    $SQL = "SELECT * FROM `support` WHERE `trang_thai` = '1'";
                                    //echo($SQL);
                                    $querryy = $ketnoi->query($SQL);
                                    while ($row = mysqli_fetch_array($querryy)) {
                                        $id = $row['id'];
                                        $username_ = $row['username'];
                                        $email = $row['email'];
                                        $tieu_de = $row['tieu_de'];
                                        $noi_dung = $row['noi_dung'];
                                        $ngay_gui = $row['ngay_gui'];


                                        $tk = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username_' ")->fetch_array();

                                        $i++;
                                        if ($i >= ($so_tab - 10) and $i < $so_tab) {
                                    ?>
                                    <tr>
                                        <td><?=$id?></td>
                                        <td style="text-align: left; padding-left: 5px;">
                                                Tên: <?=$tk['name']?> 
                                            <br/> Email: <?=$email?> 
                                            <br/> Tiêu đề: <?=$tieu_de?> 
                                            <br/> Nội Dung: <?=$noi_dung?> 
                                            <br/> Thời gian: <?=$ngay_gui?> 
                                        </td>
                                    </tr>
                                <?php } }?>
                                </table>
                            </div>


                            <!--Tin lỗi-->
                            <div class="tab-content" id="post-error">
                                <table class="w-100 ">
                                    <tr>
                                        <th>Mã tin</th>
                                        <th>Tên nhà trọ</th>
                                        <th>Giá tiền</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày đăng</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <nav class="mt-4" aria-label="Page navigation example">
                    <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="../quan-ly-don-ho-tro?page=<?= $page - 3 ?>"><i class="fa-solid fa-angles-left"></i></a></li>
                            <?php
                            if ($page == 1) { ?>
                                <li class="page-item"><a class="page-link active" href="../quan-ly-don-ho-tro?page=1">1</a></li>
                                <li class="page-item"><a class="page-link" href="../quan-ly-don-ho-tro?page=2">2</a></li>
                                <li class="page-item"><a class="page-link" href="../quan-ly-don-ho-tro?page=3">3</a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="../quan-ly-don-ho-tro?page=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                                <li class="page-item"><a class="page-link active" href="../quan-ly-don-ho-tro?page=<?= $page ?>"><?= $page ?></a></li>
                                <li class="page-item"><a class="page-link" href="../quan-ly-don-ho-tro?page=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                            <?php }
                            ?>

                            <li class="page-item"><a class="page-link" href="../quan-ly-don-ho-tro?page=<?= $page + 3 ?>"><i class="fa-solid fa-angles-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!--Start footer-->
        <?php require_once('../admin/footer.php'); ?>
        <!-- End footer -->
    </div>

    <script src="../pages/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../pages/assets/js/bootstrap.min.js"></script>
    <script src="../pages/assets/js/main.js"></script>
</body>

</html>