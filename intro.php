<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu - Trà Sữa Ngon</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
    include "./interface/header.php";
    ?>
    
<body>
<div class="nobody">
    <section class="intro">
        <div class="content">
            <div class="gt">Chào mừng đến với chúng tôi!</div>
            <h2>Về Chúng Tôi</h2>
            <p>Trà Sữa Ngon là điểm đến lý tưởng cho những tín đồ yêu thích trà sữa. Chúng tôi mang đến những ly trà sữa thơm ngon, chất lượng với nguyên liệu tươi sạch và công thức độc quyền.</p>
            <h3>Sứ Mệnh</h3>
            <p>Chúng tôi cam kết mang lại trải nghiệm tuyệt vời nhất cho khách hàng thông qua chất lượng đồ uống, không gian ấm cúng và dịch vụ tận tâm.</p>
            <h3>Sản Phẩm Nổi Bật</h3>
            <ul>
                <li>Trà sữa trân châu đường đen</li>
                <li>Trà sữa matcha kem cheese</li>
                <li>Trà oolong sữa tươi</li>
                <li>Trà sữa socola</li>
            </ul>
            <h3>Địa Chỉ</h3>
            <p>Số 133, ngõ 296, đường lĩnh lam, phường Lĩnh Nam, Hoàng Mai, Hà Nội</p>
            <h3>Liên Hệ</h3>
            <p>Điện thoại: 09128461942</p>
            <p>Email: Trasuahoney@gmail.com</p>
        </div>
    </section>
    </div>
</body>
</html>

<style>
/* Thiết lập chung */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
    color: #333;
}

/* Phần nội dung chính */
.nobody {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.intro {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    width: 100%;
    text-align: center;
}

h2, h3 {
    color: #d35400;
}

.gt {
    font-size: 35px;
    font-weight: bold;
    color:rgb(230, 34, 34);
    margin-bottom: 10px;
}

/* Danh sách sản phẩm */
ul {
    list-style: none;
    padding: 0;
}

ul li {
    background: #ffebcd;
    margin: 5px 0;
    padding: 10px;
    border-radius: 5px;
}

/* Thông tin liên hệ */
p {
    margin: 10px 0;
}

p:last-child {
    font-weight: bold;
}

</style>
