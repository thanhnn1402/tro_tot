<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
define("DATABASE", "tro_tot_online");
define("USERNAME", "root");
define("PASSWORD", "");
define("LOCALHOST", "localhost");


$ketnoi = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DATABASE);

$ketnoi->query("set names 'utf8'");






function tien($price)
{
    return str_replace(",", ".", number_format($price));
}

function enc_content($content){
$content = str_replace("
","<br/>",$content);
return $content;
}

function dec_content($content){
$content = str_replace("<br/>","
",$content);
return $content;
}


function cout_vung($ketnoi,$vung){
    $kq = mysqli_num_rows($ketnoi->query("SELECT * FROM `posts` WHERE `dia_chi` LIKE '%".$vung."%'"));
    return $kq;
}



if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $user = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();

    // if(empty($user['id'])) {
    // session_start();
    // session_destroy();
    // header('location: /');
    // }
    // if($user['level'] == "-1") {
    // session_start();
    // session_destroy();
    // header('location: /');
    // }

}



$_name = "Bạn chưa đăng nhập";
$level = "";
if(isset($_SESSION['username'])){
    if($user['name'] != ""){
        $_name = $user['name']." ";
    }else{
        $_name = "Bạn chưa cập nhật tên";
    }
    $level = $user['level'];
    if($level == 0){
        $level = "Thành viên";
    }elseif($level == 1){
        $level = "Admin";
    }
    $level = $level." - Số dư: ".tien($user['sodu'])."đ";
}


$time = date('h:i d-m-Y');



function kiem_tra_user(){
    if (isset($_SESSION['username'])) {
    }else{
        echo "
        <script>
            confirm('Bạn cần đăng nhập để thực hiện thao tác này.');
        </script>
        ";
        echo '<meta http-equiv="refresh" content="0;url=../login">';
    }
}


function loc_content_posts($strTitle){
    $strTitle = str_replace('username', '', $strTitle);
    $strTitle = str_replace('ten_tro', '', $strTitle);
    $strTitle = str_replace('dia_chi', '', $strTitle);
    $strTitle = str_replace('gia_phong', '', $strTitle);
    $strTitle = str_replace('mo_ta', '', $strTitle);
    $strTitle = str_replace('hinh_amh', '', $strTitle);
    $strTitle = str_replace('link_map', '', $strTitle);
    $strTitle = str_replace('gia_tien', '', $strTitle);
    $strTitle = str_replace('so_ngay', '', $strTitle);
    $strTitle = str_replace('ngay_dang_tin', '', $strTitle);
    $strTitle = str_replace('ngay_het_han', '', $strTitle);
    $strTitle = str_replace('set', '', $strTitle);
    $strTitle = str_replace('where', '', $strTitle);
    // $strTitle = strip_tags($strTitle);
    // $strTitle = addslashes($strTitle);
    return $strTitle;
}


function loc_kytu($strTitle)
{
    $strTitle = strip_tags($strTitle);
    $strTitle = addslashes($strTitle);
    $strTitle = trim($strTitle);
    $strTitle = str_replace(' ', '-', $strTitle);
    $strTitle = preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/", 'o', $strTitle);
    $strTitle = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/", 'o', $strTitle);
    $strTitle = preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/", 'a', $strTitle);
    $strTitle = preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/", 'a', $strTitle);
    $strTitle = preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/", 'e', $strTitle);
    $strTitle = preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/", 'e', $strTitle);
    $strTitle = preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/", 'u', $strTitle);
    $strTitle = preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/", 'u', $strTitle);
    $strTitle = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $strTitle);
    $strTitle = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $strTitle);
    $strTitle = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $strTitle);
    $strTitle = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $strTitle);
    $strTitle = str_replace('đ', 'd', $strTitle);
    $strTitle = str_replace('Đ', 'd', $strTitle);
    $strTitle = preg_replace("/[^-a-zA-Z0-9]/", '', $strTitle);
    $strTitle = str_replace('-', '', $strTitle);
    return $strTitle;
}

function phan_tram($phantram,$tong){
    $phantramcuatong= ($tong*$phantram)/100;
    return $phantramcuatong;
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = getdate();
$weekday = date("l");
$weekday = strtolower($weekday);
switch ($weekday) {
    case 'monday':
        $weekday = 'Thứ hai';
        $so_weekday = 1;
        break;
    case 'tuesday':
        $weekday = 'Thứ ba';
        $so_weekday = 2;
        break;
    case 'wednesday':
        $weekday = 'Thứ tư';
        $so_weekday = 3;
        break;
    case 'thursday':
        $weekday = 'Thứ năm';
        $so_weekday = 4;
        break;
    case 'friday':
        $weekday = 'Thứ sáu';
        $so_weekday = 5;
        break;
    case 'saturday':
        $weekday = 'Thứ bảy';
        $so_weekday = 6;
        break;
    default:
        $weekday = 'Chủ nhật';
        $so_weekday = 7;
        break;
}
//gio
$ngay = date('d/m/Y');
$time1 = date('H:i:s');
$today = $weekday . " | " . $ngay . " | " . $time1;
$day = $weekday . " | " . $ngay;


function weekday_cong($so_weekday)
{
    switch ($so_weekday) {
        case 1:
            $weekday = 'Thứ hai';
            break;
        case 2:
            $weekday = 'Thứ ba';
            break;
        case 3:
            $weekday = 'Thứ tư';
            break;
        case 4:
            $weekday = 'Thứ năm';
            break;
        case 5:
            $weekday = 'Thứ sáu';
            break;
        case 6:
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday;
}

function them_ngay($so)
{
    #ngày giờ việt nam hiện tại
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-j');
    $newdate = strtotime('+' . $so . ' day', strtotime($date));
    //$newdate = date ( 'j-m-Y' , $newdate );
    $ngay = date('j', $newdate);
    $thang = date('m', $newdate);
    $nam = date('Y', $newdate);
    if (strlen($ngay) == 1) {
        $ngay = "0" . $ngay;
    }
    if (strlen($thang) == 1) {
        $thang = "0" . $thang;
    }
    $aaa = $ngay . "-" . $thang . "-" . $nam;
    return $aaa;
}

function them_ngay1($so)
{
    #ngày giờ việt nam hiện tại
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-j');
    $newdate = strtotime('+' . $so . ' day', strtotime($date));
    //$newdate = date ( 'j-m-Y' , $newdate );
    $ngay = date('j', $newdate);
    $thang = date('m', $newdate);
    $nam = date('Y', $newdate);
    $aaa = $ngay . "-" . $thang . "-" . $nam;
    return $aaa;
}

function them_ngay2($so, $date)
{
    $newdate = strtotime('+' . $so . ' day', strtotime($date));
    //$newdate = date ( 'j-m-Y' , $newdate );
    $ngay = date('j', $newdate);
    $thang = date('m', $newdate);
    $nam = date('Y', $newdate);
    $aaa = $ngay . "-" . $thang . "-" . $nam;
    return $aaa;
}


function them_ngay3($so)
{
    #ngày giờ việt nam hiện tại
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-j');
    $newdate = strtotime('+' . $so . ' day', strtotime($date));
    //$newdate = date ( 'j-m-Y' , $newdate );
    $ngay = date('j', $newdate);
    $thang = date('m', $newdate);
    $nam = date('Y', $newdate);
    if (strlen($ngay) == 1) {
        $ngay = "0" . $ngay;
    }
    if (strlen($thang) == 1) {
        $thang = "0" . $thang;
    }
    $aaa = $nam . "-" . $thang . "-" . $ngay;
    return $aaa;
}


function get_random_string($length)
{
    $valid_chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
    $random_string = "";
    $num_valid_chars = strlen($valid_chars);
    for ($i = 0; $i < $length; $i++) {
        $random_pick = mt_Rand(1, $num_valid_chars);
        $random_char = $valid_chars[$random_pick - 1];
        $random_string .= $random_char;
    }
    return $random_string;
}



function so_tinh($i)
{
    switch ($i) {
        case 1:
            $tinh = "An Giang";
            break;
        case 2:
            $tinh = "Bà Rịa - Vũng Tàu";
            break;
        case 3:
            $tinh = "Bạc Liêu";
            break;
        case 4:
            $tinh = "Bắc Kạn";
            break;
        case 5:
            $tinh = "Bắc Giang";
            break;
        case 6:
            $tinh = "Bắc Ninh";
            break;
        case 7:
            $tinh = "Bến Tre";
            break;
        case 8:
            $tinh = "Bình Dương";
            break;
        case 9:
            $tinh = "Bình Định";
            break;
        case 10:
            $tinh = "Bình Phước";
            break;
        case 11:
            $tinh = "Bình Thuận";
            break;
        case 12:
            $tinh = "Cà Mau";
            break;
        case 13:
            $tinh = "Cao Bằng";
            break;
        case 14:
            $tinh = "Cần Thơ";
            break;
        case 15:
            $tinh = "Đà Nẵng";
            break;
        case 16:
            $tinh = "Đắk Lắk";
            break;
        case 17:
            $tinh = "Đắk Nông";
            break;
        case 18:
            $tinh = "Đồng Nai";
            break;
        case 19:
            $tinh = "Đồng Tháp";
            break;
        case 20:
            $tinh = "Điện Biên";
            break;
        case 21:
            $tinh = "Gia Lai";
            break;
        case 22:
            $tinh = "Hà Giang";
            break;
        case 23:
            $tinh = "Hà Nam";
            break;
        case 24:
            $tinh = "Hà Nội";
            break;
        case 25:
            $tinh = "Hà Tĩnh";
            break;
        case 26:
            $tinh = "Hải Dương";
            break;
        case 27:
            $tinh = "Hải Phòng";
            break;
        case 28:
            $tinh = "Hòa Bình";
            break;
        case 29:
            $tinh = "Hậu Giang";
            break;
        case 30:
            $tinh = "Hưng Yên";
            break;
        case 31:
            $tinh = "Thành phố Hồ Chí Minh";
            break;
        case 32:
            $tinh = "Khánh Hòa";
            break;
        case 33:
            $tinh = "Kiên Giang";
            break;
        case 34:
            $tinh = "Kon Tum";
            break;
        case 35:
            $tinh = "Lai Châu";
            break;
        case 36:
            $tinh = "Lào Cai";
            break;
        case 37:
            $tinh = "Lạng Sơn";
            break;
        case 38:
            $tinh = "Lâm Đồng";
            break;
        case 39:
            $tinh = "Long An";
            break;
        case 40:
            $tinh = "Nam Định";
            break;
        case 41:
            $tinh = "Nghệ An";
            break;
        case 42:
            $tinh = "Ninh Bình";
            break;
        case 43:
            $tinh = "Ninh Thuận";
            break;
        case 44:
            $tinh = "Phú Thọ";
            break;
        case 45:
            $tinh = "Phú Yên";
            break;
        case 46:
            $tinh = "Quảng Bình";
            break;
        case 47:
            $tinh = "Quảng Nam";
            break;
        case 48:
            $tinh = "Quảng Ngãi";
            break;
        case 49:
            $tinh = "Quảng Ninh";
            break;
        case 50:
            $tinh = "Quảng Trị";
            break;
        case 51:
            $tinh = "Sóc Trăng";
            break;
        case 52:
            $tinh = "Sơn La";
            break;
        case 53:
            $tinh = "Tây Ninh";
            break;
        case 54:
            $tinh = "Thái Bình";
            break;
        case 55:
            $tinh = "Thái Nguyên";
            break;
        case 56:
            $tinh = "Thanh Hóa";
            break;
        case 57:
            $tinh = "Thừa Thiên - Huế";
            break;
        case 58:
            $tinh = "Tiền Giang";
            break;
        case 59:
            $tinh = "Trà Vinh";
            break;
        case 60:
            $tinh = "Tuyên Quang";
            break;
        case 61:
            $tinh = "Vĩnh Long";
            break;
        case 62:
            $tinh = "Vĩnh Phúc";
            break;
        case 63:
            $tinh = "Yên Bái";
            break;
    }
    return $tinh;
}
