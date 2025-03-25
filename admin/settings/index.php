<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../images/logo-ico.png" type="image/x-icon">
    <title>Thông Tin Người Dùng</title>

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
    <div class="thongtin">Thông tin quản trị viên</div>
</html>
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

// Truy vấn dữ liệu từ bảng user_des
$sql = "SELECT user_des_id, user_id, SDT, soNhaTenDuong, phuongXa, quanHuyen, tinhTP FROM user_des";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Mã Người Dùng</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Phường/Xã</th>
            <th>Quận/Huyện</th>
            <th>Tỉnh/Thành Phố</th>
            <th>Hành Động</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Hiển thị dữ liệu
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['user_des_id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['SDT']}</td>
                        <td>{$row['soNhaTenDuong']}</td>
                        <td>{$row['phuongXa']}</td>
                        <td>{$row['quanHuyen']}</td>
                        <td>{$row['tinhTP']}</td>
                        <td>
                            <a class='edit-btn' href='edit_user.php?id={$row['user_des_id']}'>Chỉnh sửa</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>

<style>

.thongtin{
    text-align: center;
    margin: 20px 0;
    font-size: 28px;
    color: #000;
    font-weight: bold; /* Làm chữ đậm */
    padding: 20px;
}

/* Table Styles */
table {
    width: 90%;
    margin: 0 auto 20px auto;
    border-collapse: collapse;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
}

table th, table td {
    padding: 10px 12px;
    text-align: center;
    border: 1px solid #ddd;
}

table th {
    background-color: #FFD400; /* Yellow header */
    color: #000;
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

.edit-btn {
    text-decoration: none;
    padding: 5px 10px;
    background-color: #1ab6a1;
    color:rgb(0, 0, 0);
    border-radius: 4px;
    font-size: 14px;
    transition: all 0.3s;
}

.edit-btn:hover {
    background-color:rgb(8, 8, 8);
    color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
</style>