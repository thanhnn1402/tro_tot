<?php
session_start();
error_reporting(0);
require_once("../admin/config.php");


if (isset($_POST['DANGKY'])) {

    $name = $_POST['last-name'];

    $username = loc_kytu($_POST['username']);

    $rpassword = loc_kytu($_POST['rpassword']);

    $password = loc_kytu($_POST['password']);

    $email = $_POST['email'];

    $sdt = $_POST['phone'];

    if ($name != "" and $username != "" and $rpassword != "" and $password != "" and $email != "" and $sdt != "") {
        if ($password == $rpassword) {
            if ($username == $_POST['username'] and $password == $_POST['password']) {
                $sql = "SELECT * FROM users WHERE username ='$username'";
                $query = mysqli_query($ketnoi, $sql);
                $checkus = mysqli_num_rows($query);
                if ($checkus == 0) {
                    $query = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ");
                    if ($check_username->num_rows != 0) { ?>
                        <script>
                            confirm('Tài khoản đã tồn tại.');
                        </script>
                        <?php } else {
                        $tao = $ketnoi->query("INSERT INTO `users`(`email`, `name`, `username`, `password`, `tel`, `level`, `link_avt`, `date_c`) VALUES ('" . $email . "','" . $name . "','" . $username . "','" . $password . "','" . $sdt . "','0','../pages/assets/img/icon-256x256.png','" . date('Y-m-d') . "')");
                        if ($tao) { ?>
                            <script>
                                confirm('Đăng ký thành công.');
                            </script>
                        <?php
                            echo '<meta http-equiv="refresh" content="0;url=../login">';
                        } else { ?>
                            <script>
                                confirm('Đăng ký thất bại.');
                            </script>
        <?php
                            echo '<meta http-equiv="refresh" content="0;url=../login">';
                        }
                    }
                } else {
                    echo "<script>confirm('Tài khoản đã tồn tại.');</script>";
                    echo '<meta http-equiv="refresh" content="0;url=register">';
                }
            } else {

                echo "<script>confirm('Tài khoản hoặc mật khẩu không hợp lệ, lưu ý chỉ sử dụng chữ cái in hoa, thường và chữ số, không dùng ký tự đặc biệt!!.');</script>";
            }
        } else {
            echo "<script>confirm('Mật khẩu nhập lại không khớp.');</script>";
            echo '<meta http-equiv="refresh" content="0;url=register">';
        }
    } else {
        ?>

        <script>
            confirm('Vui Lòng Nhập Đầy Đủ Thông Tin!');
        </script>

    <?php
    }
} elseif (isset($_POST['DANGNHAP'])) {
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $query = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
    $user = $query;
    if ($username == "" || $password == "") { ?>
        <script>
            confirm('Vui lòng nhập đầy đủ thông tin.');
        </script>
    <?php } else if (empty($query)) { ?>
        <script>
            confirm('Tài khoản hoặc mật khẩu sai.');
        </script>
        <meta http-equiv="refresh" content="0;url=login">
    <?php } else if ($password != $query['password']) { ?>
        <script>
            confirm('Tài khoản hoặc mật khẩu sai.');
        </script>
        <meta http-equiv="refresh" content="0;url=login">
        <?php } else {
        if ($query['level'] == '-1') {
        ?>
            <script>
                confirm('Tài khoản đã bị khóa.');
            </script>
        <?php
            echo '<meta http-equiv="refresh" content="0;url=login">';
        } else {
            $_SESSION['username'] = $query['username'];
        ?>
            <script>
                confirm('Đăng nhập thành công');
            </script>
        <?php
            echo '<meta http-equiv="refresh" content="0;url=../trang-chu">';
        }
    }
} elseif (isset($_GET['DANGXUAT'])) {
    unset($_SESSION['username']);
    header('location: ../trang-chu');
    mysqli_close($ketnoi);
} elseif (isset($_POST['UPDATE_PROFILE'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $diachi = $_POST['dia_chi'];

    $file = $_FILES['image'];
    //$file_name = loc_kytu($file['name']) . ".png";
    // while(true){
    //     $file_name = get_random_string(10).".png";
    //     if(!file_exists("uploads/".$file_name)){
    //         break;
    //     }
    // }
    $file_name = "AVT_" . $_SESSION['username'] . ".png";
    
    if($file['tmp_name'] != ''){
        $file_xoa = explode("uploads/", $user['link_avt'])[1];
        unlink("uploads/" . $file_xoa);
        move_uploaded_file($file['tmp_name'], 'uploads/' . $file_name);
        $link_avt = '../pages/uploads/' . $file_name;
    }else{
        $link_avt = $user['link_avt'];
    }



    $tao = $ketnoi->query("UPDATE `users` SET `email`='" . $email . "',`name`='" . $name . "',`tel`='" . $phone . "',`diachi`='" . $diachi . "',`link_avt`='" . $link_avt . "' WHERE username = '" . $_SESSION['username'] . "' ");
    if ($tao) { ?>
        <script>
            confirm('Cập nhật thành công.');
        </script>
    <?php

    } else { ?>
        <script>
            confirm('Cập nhật thất bại.');
        </script>
<?php
    }
    echo '<meta http-equiv="refresh" content="0;url=../profile">';
} elseif (isset($_POST['UPDATE_PASSWPRD'])) {
    if ($_POST['password'] == "" or $_POST['npassword'] == "" or $_POST['rnpassword'] == "") {
        echo "
        <script>
            confirm('Vui lòng nhập đầy đủ thông tin.');
        </script>
        ";
    } else {
        $password = strip_tags($_POST['password']);
        $password =  addslashes($password);
        $password = loc_kytu($password);


        $password1 = strip_tags($_POST['npassword']);
        $password1 =  addslashes($password1);
        $password1 = loc_kytu($password1);

        $password2 = strip_tags($_POST['rnpassword']);
        $password2 =  addslashes($password2);
        $password2 = loc_kytu($password2);

        if ($password != $_POST['password'] or $password1 != $_POST['npassword'] or $password2 != $_POST['rnpassword']) {
            echo "
        <script>
            confirm('Mật khẩu chứa ký tự đặc biệt.');
        </script>
        ";
        } elseif ($password1 != $password2) {
            echo "
            <script>
                confirm('Mật khẩu nhập lại không đúng.');
            </script>
            ";
        } else {
            $query = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "' ")->fetch_array();
            if (empty($query)) {
                echo "
                <script>
                    confirm('Mật khẩu cũ sai.');
                </script>
                ";
            } else {
                $query = $ketnoi->query("UPDATE `users` SET `password`='" . $password2 . "' WHERE  `username` = '" . $username . "' AND `password` = '" . $password . "' ");
                if ($query) {
                    echo "
                    <script>
                        confirm('Cập nhật mật khẩu thành công.');
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        confirm('Cập nhật mật khẩu thất bại.');
                    </script>
                    ";
                }
            }
        }
    }
    echo '<meta http-equiv="refresh" content="0;url=../thay-doi-mat-khau">';
} elseif (isset($_POST['INSERT_POSTS'])) {
    $link_png = "";
    if (isset($_FILES['upload'])) {
        $total = count($_FILES['upload']['name']);
        // Loop through each file
        for ($i = 0; $i < $total; $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            //Make sure we have a file path
            if ($tmpFilePath != "") {
                //Setup our new file path
                //$file_name =  loc_kytu($_FILES['upload']['name'][$i]).".png";
                while (true) {
                    $file_name = "POSTS_" . $_SESSION['username'] . get_random_string(5) . ".png";
                    if (!file_exists("uploads/" . $file_name)) {
                        break;
                    }
                }
                $newFilePath = "uploads/" . $file_name;
                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    //Handle other code here
                }
                $link_anh = '../pages/uploads/' . $file_name;
                if ($i == 0) {
                    $link_png = $link_anh;
                } else {
                    $link_png = $link_png . ", " . $link_anh;
                }
            }
        }
    }
    if ($total < 4) {
        echo "
        <script>
            confirm('Đăng thất bại, số ảnh không thể nhỏ hơn 4.');
        </script>
        ";
    } elseif ($total > 10) {
        echo "
        <script>
            confirm('Đăng thất bại, số ảnh không thể lớn hơn 10.');
        </script>
        ";
    } else {
        $so_ngay = $_POST['so_ngay'];
        $gia_tien = $so_ngay * 1000;
        if ($gia_tien <= $user['sodu']) {
            $username = $_SESSION['username'];
            $ten_tro = $_POST['ten_tro'];
            $gia_tro = $_POST['gia_tro'];
            $dia_chi = $_POST['calc_shipping_district'] . " | " . so_tinh(trim($_POST['calc_shipping_provinces']));
            $mo_ta = enc_content($_POST['mo_ta']);
            $link_map = "../pages/getmap.php?vung=".$_POST['toa_do']."&tieude=".$ten_tro."&mota=".$_POST['mo_ta'];
            $ngay_dang = date('Y-m-d');
            $ngay_het_han = them_ngay3($so_ngay);

            $tru_tien = $ketnoi->query("UPDATE `users` SET `sodu` = `sodu` - '".$gia_tien."'  WHERE `username` = '".$username."'");
            if($tru_tien){
                $them = $ketnoi->query("INSERT INTO `posts`(`username`, `ten_tro`, `dia_chi`,`gia_phong`, `mo_ta`, `hinh_anh`, `link_map`, `gia_tien`, `so_ngay`, `ngay_dang_tin`, `ngay_het_han`) 
                VALUES ('" . $username . "','" . $ten_tro . "','" . $dia_chi . "', '".$gia_tro."','" . $mo_ta . "','" . $link_png . "','" . $link_map . "','" . $gia_tien . "','" . $so_ngay . "','" . $ngay_dang . "','" . $ngay_het_han . "')");
            }else{
                $them = false;
            }
            if ($them) {
                echo "
            <script>
                confirm('Đăng bài thành công.');
            </script>
            ";
            } else {
                echo "
            <script>
                confirm('Đăng bài thất bại.');
            </script>
            ";
            }
        } else {
            echo "
        <script>
            confirm('Số dư không đủ.');
        </script>
        ";
        }
    }
    echo '<meta http-equiv="refresh" content="0;url=../dang-tin-moi">';
} elseif (isset($_GET['LIKES'])) {
    $username = $_SESSION['username'];
    $id = $_GET['ID'];
    if(strlen($id) > 0){
        if($_GET['LIKES'] == "like"){
            $like = $ketnoi->query("INSERT INTO `likes`(`username`, `id_baidang`) VALUES ('".$username."','".$id."')");
            if($like){
                echo "
            <script>
                confirm('Đã thêm vào danh sách yêu thích.');
            </script>
            ";
            }
        }elseif($_GET['LIKES'] == "unlike"){
            $unlike = $ketnoi->query("DELETE FROM `likes` WHERE `username` = '".$username."' AND `id_baidang` = '".$id."'");
            if($unlike){
                echo "
                <script>
                    confirm('Đã xóa khỏi danh sách yêu thích.');
                </script>
                ";
            }
        }
    }
    echo '<meta http-equiv="refresh" content="0;url=../product-detail?id='.$id.'">';
} elseif (isset($_GET['DELETE_POSTS'])) {
    $id = $_GET['ID'];
    
    $hang = $ketnoi->query("SELECT * FROM `posts` WHERE `id` = '".$id."'")->fetch_array();
    for($i = 1; $i < 15; $i++){
        $hinh_anh = explode("../pages/uploads/", $hang['hinh_anh'])[$i];
        $file_xoa = explode(",",$hinh_anh)[0];
        unlink("uploads/" . $file_xoa);
    }

    $DELETE = $ketnoi->query("DELETE FROM `posts` WHERE `id` = '".$id."'");
    if($DELETE){
        echo "
        <script>
            confirm('Đã xóa bài viết thành công.');
        </script>
        ";
    }else{
        echo "
        <script>
            confirm('Đã xóa bài viết thất bại.');
        </script>
        ";
    }
    echo '<meta http-equiv="refresh" content="0;url=../quan-ly-tin">';
} elseif (isset($_POST['UPDATE_POSTS'])) {
    $id = $_POST['UPDATE_POSTS'];
    $hang = $ketnoi->query("SELECT * FROM `posts` WHERE `id` = '".$id."'")->fetch_array();
    if($hang['username'] != $_SESSION['username']){
        echo "
        <script>
            confirm('Đây không phải bài viết của bạn, bạn không có quyền cập nhật nội dung của nó.');
        </script>
        ";
    }else{

        $link_png = "";
        if (isset($_FILES['upload'])) {
            $total = count($_FILES['upload']['name']);
            // Loop through each file
            for ($i = 0; $i < $total; $i++) {
                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    //$file_name =  loc_kytu($_FILES['upload']['name'][$i]).".png";
                    while (true) {
                        $file_name = "POSTS_" . $_SESSION['username'] . get_random_string(5) . ".png";
                        if (!file_exists("uploads/" . $file_name)) {
                            break;
                        }
                    }
                    $newFilePath = "uploads/" . $file_name;
                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                    }
                    $link_anh = '../pages/uploads/' . $file_name;
                    if ($i == 0) {
                        $link_png = $link_anh;
                    } else {
                        $link_png = $link_png . ", " . $link_anh;
                    }
                }
            }
        }
        if ($total > 3 and $total < 11) {
            $hang = $ketnoi->query("SELECT * FROM `posts` WHERE `id` = '".$id."'")->fetch_array();
            for($i = 1; $i < 15; $i++){
                $hinh_anh = explode("../pages/uploads/", $hang['hinh_anh'])[$i];
                $file_xoa = explode(",",$hinh_anh)[0];
                unlink("uploads/" . $file_xoa);
            }
            $DELETE = $ketnoi->query("DELETE FROM `posts` WHERE `id` = '".$id."'");
        }else{
            $link_png = $hang['hinh_anh'];
        }

        $ten_tro = ($_POST['ten_tro']);
        $dia_chi = ($_POST['dia_chi__']);
        $toa_do = ($_POST['toa_do']);
        $mo_ta_map = ($_POST['mo_ta_map']);
        $gia_tro = ($_POST['gia_tro']);
        $mo_ta = enc_content($_POST['mo_ta']);

        $link_map = "../pages/getmap.php?vung=".$toa_do."&tieude=".$ten_tro."&mota=".$mo_ta_map;
        $sql = "UPDATE `posts` SET `ten_tro`='".$ten_tro."',`dia_chi`='".$dia_chi."',`gia_phong`='".$gia_tro."',`mo_ta`='".$mo_ta."',`hinh_anh`='".$link_png."',`link_map`='".$link_map."' WHERE `id` = '".$id."' AND `username` = '".$_SESSION['username']."'";
        //echo $sql;
        
        
        $UPDATE = $ketnoi->query($sql);
        if($UPDATE){
            echo "
            <script>
                confirm('Chỉnh sửa thành công.');
            </script>
            ";
        }
        
    }
    echo '<meta http-equiv="refresh" content="0;url=../chinh-sua-tin?ID='.$id.'">';

} elseif (isset($_POST['POSTS_SUPPORT'])) {
    $email = ($_POST['email']);
    $tieude = ($_POST['tieude']);
    $noidung = ($_POST['noidung']);
    if($email == "" or $tieude == "" or $noidung){
        echo "
        <script>
            confirm('Vui lòng nhập đầy đủ thông tin.');
        </script>
        ";
    }else{
        $them_bv = $ketnoi->query("INSERT INTO `support`(`username`, `email`, `tieu_de`, `noi_dung`, `ngay_gui`) VALUES ('".$_SESSION['username']."','".$email."','".$tieude."','".$noidung."','". date('Y-m-d')."')");
        if($them_bv){
            echo "
            <script>
                confirm('Gửi đơn hỗ trợ thành công.');
            </script>
            ";
        }
    }
    echo '<meta http-equiv="refresh" content="0;url=../lien-he-ho-tro">';
}elseif (isset($_POST['HOANTAT_SP'])) {
    $id = $_POST['HOANTAT_SP'];
    $HOANTAT_SP = $ketnoi->query("UPDATE `support` SET `trang_thai`='' WHERE `id` = '".$id."'");
    if($HOANTAT_SP){
        echo "
        <script>
            confirm('Xử lý hoàn tất.');
        </script>
        ";
    }
    echo '<meta http-equiv="refresh" content="0;url=../quan-ly-don-ho-tro">';
}



?>