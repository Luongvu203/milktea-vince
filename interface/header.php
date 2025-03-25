<link rel="stylesheet" href="css/style.css">

<?php
session_start();
?>

<div class="container-header">
    <header id="header-page">
        <section class="header-left">

        <section class="header-mid">
            <a href="./index.php" class="logo-page">
                <img src="./images/logo.jpg" alt="logo">
            </a>
        </section>
        
            <nav class="nav-page">
                <li><a href="./index.php">Trang Chủ</a></li>
                <li><a href="show-list-item.php">Sản Phẩm</a></li>
                <li><a href="index.php#NewItems">Tin Tức</a></li>
                <li><a href="intro.php">Giới Thiệu</a></li>

            </nav>
        </section>

        <section class="header-right">
            <form class="search-box" action="search.php" method="GET">
                <input type="text" class="search-text" placeholder="Sản phẩm cần tìm..." name="search" required>
                <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            
            <section class="action-page">
                <li><a href="orders-delivery.php"><i class="fa-solid fa-headphones-simple"></i>  Đơn Hàng</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="./login-sigup/logout.php"><i class="fa-solid fa-sign-out-alt"></i> Đăng Xuất</a></li>
                <?php else: ?>
                    <li><a href="./login-sigup/index.php"><i class="fa-regular fa-user"></i> Tài Khoản</a></li>
                <?php endif; ?>

                <li>
                    
                    <a href="#" onclick="showCart(event)">
                        <i class="fa-solid fa-basket-shopping"></i>  Giỏ Hàng
                        <p id="lenght-cart"></p>
                    </a>

                    <div id="show-cart">
                        <div id="my-cart">
                            <p id="cart-items"></p>
                        </div>

                        <div id="checkout">
                            <p id="cart-total">Tổng tiền: <span> 0 đ</span></p>

                            <div class="container-clear-cart">
                                <button type="button" class="clear-cart-btn">
                                    Clear Giỏ Hàng
                                </button>
                            </div>
                            <a id="view-cart-link" href="checkout.php">
                                Thanh Toán
                            </a>
                        </div>
                    </div>
                </li>
            </section>
        </section>
    </header>

    
<div class="hello-user">
        <?php
        if (isset($_SESSION['user_id'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "z9milktea";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }

            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM users WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (!$result) {
                die("Lỗi truy vấn: " . mysqli_error($conn));
            }

            $row = mysqli_fetch_assoc($result);

            if (isset($row['role'])) {
                if ($row['role'] == 0) {
                    echo '<a href="admin/index.php?user_id=' . $row['user_id'] . '">Tới Trang Quản Trị</a>';
                } else {
                    echo '<a href="edit-profile.php">Cập nhật thông tin</a>';
                }
            } else {
            }
            echo '<span>' . $_SESSION['user_name'] . '</span>';

            mysqli_close($conn);
        } else {
        }
        ?>
    </div>

    <button class="top-page-btn">
        <i class="fa-solid fa-angle-up"></i>
    </button>

    <div class="container-success hidden">
        <div id="success-overlay">
            <i class="fa-regular fa-circle-check"></i>
            <p>Thành Công</p>
        </div>
    </div>

    <div class="hidden" id="delete-success">
        <div id="success-overlay-delete">
            <i class="fa-regular fa-trash-can"></i>
            <p>Đã Xoá</p>
        </div>
    </div>
</div>

