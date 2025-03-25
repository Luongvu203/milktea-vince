<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Ngân Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #ffd400;
            color:rgb(0, 0, 0);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background:rgb(0, 0, 0);
            color:#ffd400;
        }
        .qr-container {
            margin-top: 20px;
        }
        .qr-container img {
            width: 150px;
            height: 150px;
        }
    </style>
    <script>
        function redirectToConfirmation(event) {
            event.preventDefault();
            window.location.href = "loading.html";
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Thanh Toán Ngân Hàng</h2>
        <form onsubmit="redirectToConfirmation(event)">
            <div class="form-group">
                <label for="cardNumber">Số thẻ</label>
                <input type="text" id="cardNumber" placeholder="Nhập số thẻ">
            </div>
            <div class="form-group">
                <label for="cardName">Tên chủ thẻ</label>
                <input type="text" id="cardName" placeholder="Nhập tên chủ thẻ">
            </div>
            <div class="form-group">
                <label for="expiryDate">Ngày hết hạn</label>
                <input type="month" id="expiryDate">
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="password" id="cvv" placeholder="Nhập CVV">
            </div>
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input type="number" id="amount" placeholder="Nhập số tiền">
            </div>
            <button type="submit">Thanh Toán</button>
        </form>
        <div class="qr-container">
            <h3>Hoặc quét mã QR</h3>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=ThanhToanNganHang" alt="QR Code">
        </div>
    </div>
</body>
</html>
