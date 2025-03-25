<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="images/logo-ico.png" type="image/x-icon">
    <title>Honey | Tất Cả Sản Phẩm</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include "./interface/header.php";
    ?>

    <div class="container-list-product">
        <h3 class="link-nav-page">
            <button id="show-hide-bar-btn" type="button"><i class="fa-solid fa-bars"></i></button>
            <p><a href="index.php">Trang Chủ</a></p> <i class="fa-solid fa-circle-right"></i>
            <p><a href="#">Tất Cả Sản Phẩm</a></p>
        </h3>

        <section id="bar-container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "z9milktea";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối CSDL thất bại: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM categorys";
            $result = $conn->query($sql);

            if ($result === false) {
                echo "Lỗi truy vấn: " . $conn->error;
                exit;
            }

            if ($result->num_rows > 0) {
                echo '<ul id="container-bar">';
                echo '<li data-category-id="all" data-php-file="all-item.php"><i class="fa-solid fa-tag"></i>Tất Cả Sản Phẩm</li>';

                while ($row = $result->fetch_assoc()) {
                    $category_id = $row["category_id"];
                    $category_name = $row["category_name"];
                    $php_file_name = strtolower(str_replace(' ', '', $category_name)) . ".php";

                    echo '<li data-category-id="' . $category_id . '" data-php-file="' . $php_file_name . '"><i class="fa-solid fa-tag"></i>' . $category_name . '</li>';
                }
                echo '</ul>';
            } else {
                echo "Không có danh mục sản phẩm.";
            }

            $conn->close();
            ?>
        </section>

        <section id="content-list-product">
            <!-- <div class="loading-container hidden">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div> -->

            <div class="container-content-list-product ">
                <div class="list-product-all-item">
                    <?php
                    include "./interface/all-item.php";
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>

<!-- filter -->
<style>
    .hidden{
        display: none;
    }

    .loading-container {
        text-align: center;
        position: absolute;
        justify-content: center;
        margin: 0;
        width: 100%;
        display: flex;
        align-items: center;
        height: 100%;
    }
    
    .circle {
        width: 20px;
        height: 20px;
        margin: 0 10px;
        border: 3px solid #000;
        border-radius: 50%;
        animation: bounce 0.5s infinite alternate;
    }
    
    .circle:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .circle:nth-child(3) {
        animation-delay: 0.4s;
    }
    
    @keyframes bounce {
        to {
            transform: translateY(-10px);
            border-color: #ffdb58;
        }
    }
</style>
<script src="js/sidebar.js"></script>
<script src="js/add-.js"></script>

<!-- show-cart -->
<script>
    function showCart(event) {
        event.preventDefault();
        var showCart = document.getElementById('show-cart');
        var iconCart = event.currentTarget;
        var cartLengthElement = document.getElementById('lenght-cart');

        if (showCart.classList.contains('show')) {
            showCart.classList.remove('show');
            iconCart.style.color = '#221F20';
            cartLengthElement.style.color = '#221F20';
        } else {
            showCart.classList.add('show');
            iconCart.style.color = '#fff';
            cartLengthElement.style.color = '#fff';
        }
    }
</script>

</html>