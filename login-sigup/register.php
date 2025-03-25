<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="shortcut icon" href="../images/logo-ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login-signup.css">
    <title>Honey| Login - Register</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST">
                <h1>Tạo Tài Khoản</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>    
                </div>
                <span>Hoặc sử dụng email và mật khẩu của bạn</span>
                <input name="user_name" type="text" placeholder="Name" required>
                <input name="email" type="email" placeholder="Email" required>
                <input name="pass_word" type="password" placeholder="Password" required>
                <button type="submit" name="register">Đăng Ký</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST">
                <h1>Đăng Nhập</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>Hoặc sử dụng email và mật khẩu của bạn</span>
                <input name="email" type="email" placeholder="Email" required>
                <input name="pass_word" type="password" placeholder="Password" required>
                <a href="#">Bạn quên mật khẩu?</a>
                <button type="submit" name="login">Đăng Nhập</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Chào Mừng Trở Lại</h1>
                    <p>Đăng nhập bằng tài khoản và mật khẩu của bạn</p>
                    <button class="hidden" id="login">Đăng Nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào bạn!!</h1>
                    <p>Đăng ký tài khoản để sử dụng nhiều hơn các dịch vụ</p>
                    <button class="hidden" id="register">Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-back-home">
        <button type="button">
            <a href="../index.php">Trở Về Trang Chủ</a>
        </button>
    </div>
</body>