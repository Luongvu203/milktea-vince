<title>Honey | Thanh Toán</title>
<link rel="shortcut icon" href="images/logo-ico.png" type="image/x-icon">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/checkout.css">

<h1>Đơn hàng của bạn</h1>
<div style="display: flex;">
    <section id="cart-container">
        <!-- render items  -->
    </section>

    <?php
        session_start();

        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Lưu lại URL hiện tại
            header("Location: ./login-sigup/index.php"); // Chuyển hướng tới trang đăng nhập
            exit();
        }
        

        $hoTen = $soDienThoai = $soNhaTenDuong = $phuongXa = $quanHuyen = $thanhPho = "";

        if (isset($_SESSION['user_id'])) {
            $loggedInUserId = $_SESSION['user_id'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "z9milktea";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            $selectQuery = "SELECT user_name FROM users WHERE user_id = '$loggedInUserId'";
            $result = $conn->query($selectQuery);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hoTen = $row['user_name'];
            }

            $selectAddressQuery = "SELECT * FROM user_des WHERE user_id = '$loggedInUserId'";
            $resultAddress = $conn->query($selectAddressQuery);

            if ($resultAddress->num_rows > 0) {
                $rowAddress = $resultAddress->fetch_assoc();
                $soDienThoai = $rowAddress['SDT'];
                $soNhaTenDuong = $rowAddress['soNhaTenDuong'];
                $phuongXa = $rowAddress['phuongXa'];
                $quanHuyen = $rowAddress['quanHuyen'];
                $thanhPho = $rowAddress['tinhTP'];
            }
            $conn->close();
        }
    ?>

    <form method="POST" class="content-right">
        <div id="hidden-inputs-container">
            <input type="hidden" id="hidden-cart-input" name="cart_data">
        </div>

        <div id="sum-price-container">
            <input type="hidden" id="hidden-sum-price" name="hidden_sum_price">
        </div>

        <section style="display: flex;">
            <section style="width: 50%">
                <label>Họ Tên:</label> <br>
                <input class="input-text" id="name" name="name" type="text" placeholder="Your name..." required value="<?php echo " $hoTen"; ?>">
            </section>

            <section style="width: 50%">
                <label>Số Điện Thoại:</label> <br>
                <input class="input-text" id="SDT" name="SDT" type="text" placeholder="Your number..." required value="<?php echo " $soDienThoai"; ?>">
            </section>
        </section>

        <section style="display: flex;  margin-top: 20px">
            <section style="width: 50%">
                <label>Số nhà/ Tên Đường:</label> <br>
                <input class="input-text" id="street" name="street" type="text" placeholder="Your street name..." required value="<?php echo " $soNhaTenDuong"; ?>">
            </section>

            <section style="width: 50%">
                <label>Phường/ Xã:</label> <br>
                <input class="input-text" id="wards" name="wards" type="text" placeholder="Your wards..." required value="<?php echo " $phuongXa"; ?>">
            </section>
        </section>

        <section style="display: flex;  margin-top: 20px">
            <section style="width: 50%;">
                <label>Quận/ Huyện:</label> <br>
                <input class="input-text" id="district" name="district" type="text" placeholder="Your district..." required value="<?php echo " $quanHuyen"; ?>">
            </section>

            <section style="width: 50%">
                <label>Tỉnh/ Thành Phố:</label> <br>
                <input class="input-text" id="city" name="city" type="text" placeholder="Your city..." required value="<?php echo " $thanhPho"; ?>">
            </section>
        </section>

        <section style="margin-top: 20px">
            <label>Lưu Ý Cho Quán:</label> <br>
            <textarea name="note" id="note" cols="30" rows="1" placeholder="VD: Ít đường, đá riêng..."></textarea>
        </section>
        <section style="display: flex; margin: 20px 50px 0 0; justify-content: space-between;">
            <div class="form-des-cart-left">
                <p class="total-products">Tổng số sản phẩm: <span></span></p>
                <p>Tạm tính: <span class="total-price"></span></p>
                <p>Phí vận chuyển: <span class="shipment-price"></span></p>
                <p>Tổng tiền: <span name="sum_price" class="sum-price"></span></p>
            </div>

            <div class="form-des-cart-right">
                <h4>Phương thức thanh toán</h4>
                <div style="display: flex; margin-top: 10px">
                    <input style="margin-bottom: 20px;" type="checkbox">
                    <p style="margin-left: 10px;">Thanh toán khi nhận hàng (COD).</p>
                </div>
                <div style="display: flex; margin-top: 10px">
                    <input type="checkbox" id="bankPayment">
                    <p style="margin-left: 10px;">Thanh toán ngân hàng.</p>
                </div>

            </div>
        </section>

        <div class="btn-page">
            <button type="button">
                <a href="index.php">Trở lại</a>
            </button>

            <button class="btn-od" type="submit">Đặt Hàng</button>
        </div>
    </form>
</div>

<script src="js/checkout.js"></script>



<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "z9milktea";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $phone = mysqli_real_escape_string($conn, $_POST["SDT"]);
        $soNhaTenDuong = mysqli_real_escape_string($conn, $_POST["street"]);
        $phuongXa = mysqli_real_escape_string($conn, $_POST["wards"]);
        $quanHuyen = mysqli_real_escape_string($conn, $_POST["district"]);
        $thanhPho = mysqli_real_escape_string($conn, $_POST["city"]);
        $note = mysqli_real_escape_string($conn, $_POST["note"]);

        $address = "$soNhaTenDuong, $phuongXa, $quanHuyen, $thanhPho";

        // Lấy giá trị từ session nếu tồn tại
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        $tongTien = isset($_POST["hidden_sum_price"]) ? mysqli_real_escape_string($conn, $_POST["hidden_sum_price"]) : 0;
        $orderInfo = isset($_POST["cart_data"]) ? mysqli_real_escape_string($conn, $_POST["cart_data"]) : '';

        // Tạo mã đơn hàng tự động
        $next_id_sql = "SELECT MAX(SUBSTRING(orders_id, 3)) AS max_id FROM orders";
        $next_id_result = $conn->query($next_id_sql);

        if ($next_id_result === FALSE) {
            die("Lỗi truy vấn: " . $conn->error);
        }

        $next_id_row = $next_id_result->fetch_assoc();
        $next_id = intval($next_id_row["max_id"]) + 1;

        if ($next_id < 10) {
            $orders_id = "OD00" . $next_id;
        } elseif ($next_id < 100) {
            $orders_id = "OD0" . $next_id;
        } else {
            $orders_id = "OD" . $next_id;
        }

        $sqlInsertOrder = "INSERT INTO orders (orders_id, user_id, order_total, note, delivery_status_id) VALUES ('$orders_id', '$user_id', '$tongTien', '$note', 1)";
        $conn->query($sqlInsertOrder);

        if ($conn->error) {
            die("Lỗi SQL khi thêm vào orders: " . $conn->error);
        } else {
            echo '<script>window.location.href = "loading.html";</script>';
        }

        $sqlInsertOrderDes = "INSERT INTO order_des (orders_id, hoTen, SDT, address, order_info) VALUES ('$orders_id', '$name', '$phone', '$address', '$orderInfo')";
        $conn->query($sqlInsertOrderDes);

        if ($conn->error) {
            die("Lỗi SQL khi thêm vào order_des: " . $conn->error);
        }

        $conn->close();
    }
?>
<script>
document.querySelector(".btn-od").addEventListener("click", function (event) {
    const bankPayment = document.getElementById("bankPayment");

    if (bankPayment.checked) {
        event.preventDefault(); // Ngăn form submit ngay lập tức
        window.location.href = "bank-payment.php"; // Chuyển hướng tới trang thanh toán ngân hàng
    }
});
</script>

<script>
document.querySelector(".btn-od").addEventListener("click", function (event) {
    const codPayment = document.querySelector('input[type="checkbox"]:nth-of-type(1)');
    const bankPayment = document.getElementById("bankPayment");

    if (!codPayment.checked && !bankPayment.checked) {
        event.preventDefault(); // Ngăn form gửi đi
        alert("Vui lòng chọn phương thức thanh toán trước khi đặt hàng!");
        return;
    }

    if (bankPayment.checked) {
        event.preventDefault();
        window.location.href = "bank-payment.php"; // Chuyển hướng tới trang thanh toán ngân hàng
    }
});
</script>

