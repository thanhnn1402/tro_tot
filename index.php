<?php
error_reporting(0);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm trọ sinh viên</title>
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../pages/assets/css/style.css">
    <link rel="stylesheet" href="../pages/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
</head>

<body>
    <div class="main">
        
        <div class="container">
            <div class="row">
                <div class=" offset-lg-2 col-lg-8 my-4">
                    <h5 class="text-justify" style="margin-top: 32px; color: var(--primary-color)">
                        Nếu bạn thấy dòng này có nghĩa là bạn chưa kết nối SQL cho trang web vui lòng vào file admin/config.php để thêm database hoặc bạn đã để nó sai vị trí, nếu bạn dùng hosting vui lòng bỏ tất cả file vào public_html, nếu bạn dùng xampp hãy bỏ tất cả vào thư
                        mục htdocs
                    </h5>
                </div>
            </div>
        </div>

    </div>

    <script src="../pages/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../pages/assets/js/bootstrap.min.js"></script>
    <script src="../pages/assets/js/main.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
</body>

</html>

<?php
require_once("./admin/config.php");

if($ketnoi){
    echo '<meta http-equiv="refresh" content="0;url=../trang-chu">';
}

?>