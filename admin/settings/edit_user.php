<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../images/logo-ico.png" type="image/x-icon">
    <title>Z9 | Người Dùng</title>

    <?php
    include "../public/header-admin.php";
    ?>
</head>

<body>
    <div class="container-nav">
        <nav class="nav-admin-page">
            <li class="nav-item">
                <i class="fa-solid fa-house"></i>
                <a href="../index.php">Trang Chủ</a>
            </li>
            <li class="dropdown">
                <i class="fa-solid fa-wine-glass"></i>
                <a href="#">Cửa Hàng</a>
                <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="../categoryAD/index.php">Loại Sản Phẩm</a></li>
                    <li class="dropdown-item"><a href="../productAD/index.php">Sản Phẩm</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <i class="fa-regular fa-calendar"></i>
                <a href="../orders/index.php">Đơn Hàng</a>
            </li>
            <li class="nav-item">
                <i class="fa-solid fa-comments"></i>
                <a href="#">Bình Luận</a>
            </li>
            <li class="nav-item">
                <i class="fa-solid fa-users"></i>
                <a href="../users/index.php">Người Dùng</a>
            </li>

            <li class="nav-item">
                <i class="fa-solid fa-gears"></i>
                <a href="../settings/index.php">Cài Đặt</a>
            </li>

            <li class="nav-item">
                <i class="fa-solid fa-rotate-left"></i>
                <a href="../../index.php">về Trang Web</a>
            </li>

            <li class="nav-item">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="../logout.php">Đăng Xuất</a>
            </li>
        </nav>
    </div>

    <div class="thongtin">Chỉnh sửa thông tin</div>

    <div class="container-action-orders-page">
        <button class="return-index-btn">
            <a href="javascript:history.back()">Trở lại</a>
        </button>
    </div>

<?php
// Kết nối cơ sở dữ liệu
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "z9milktea";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin người dùng dựa trên ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user_des WHERE user_des_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Người dùng không tồn tại.";
        exit;
    }
}

// Cập nhật thông tin người dùng
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sdt = $_POST['SDT'];
    $sonha = $_POST['soNhaTenDuong'];
    $phuongxa = $_POST['phuongXa'];
    $quanhuyen = $_POST['quanHuyen'];
    $tinhtp = $_POST['tinhTP'];

    $sql = "UPDATE user_des SET SDT = '$sdt', soNhaTenDuong = '$sonha', phuongXa = '$phuongxa', quanHuyen = '$quanhuyen', tinhTP = '$tinhtp' WHERE user_des_id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Quay lại trang chính
    } else {
        echo "Lỗi khi cập nhật: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post">
        <label>Số Điện Thoại:</label><br>
        <input type="text" name="SDT" value="<?= $user['SDT'] ?>"><br><br>

        <label>Địa Chỉ:</label><br>
        <input type="text" name="soNhaTenDuong" value="<?= $user['soNhaTenDuong'] ?>"><br><br>

        <label>Phường/Xã:</label><br>
        <input type="text" name="phuongXa" value="<?= $user['phuongXa'] ?>"><br><br>

        <label>Quận/Huyện:</label><br>
        <input type="text" name="quanHuyen" value="<?= $user['quanHuyen'] ?>"><br><br>

        <label>Tỉnh/Thành Phố:</label><br>
        <input type="text" name="tinhTP" value="<?= $user['tinhTP'] ?>"><br><br>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>

<style>
    .container-action-orders-page {
        width: 95%;
        margin: 30px auto;
        display: flex;
        justify-content: space-between;
    }

    .return-index-btn {
        padding: 15px 50px;
        background-color: #FFD400;
        border: none;
        cursor: pointer;
        transition: all ease-in-out 0.5s;
    }

    .return-index-btn a {
        font-weight: 700;
        color: #221F20;
    }

    .return-index-btn:hover {
        background-color: #221F20;
    }

    .return-index-btn:hover a {
        color: #FFD400;
    }

    .thongtin {
    text-align: center;
    font-size: 24px;
    font-weight: bold; /* Làm chữ đậm */
    margin-top: 20px;
    margin-bottom: 20px;
    color: #333; /* Màu chữ */
}

</style>