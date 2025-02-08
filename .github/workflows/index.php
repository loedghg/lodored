<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ره</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('santa do.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            margin: 157;
            padding: 130;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .logo {
            width: 120px;
            margin-bottom: 30px;
        }

        h1 {
            color: white;
            text-align: center;
        }

        .store-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }

        .item {
            margin-bottom: 20px;
        }

        .item img {
            width: 140px;
            margin-bottom: 10px;
        }

        .item p {
            font-size: 18px;
            color: #333;
        }

        .price {
            font-size: 20px;
            color: #e91e63;
            font-weight: bold;
        }

        .buy-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .buy-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <img src="ooti.jpeg" alt="شعار الموقع" class="logo">
    <h1>💎 متجر الجواهر</h1>

    <div class="store-container">
        <div class="item">
            <img src="box.png" alt="جوهره">
            <p>صندوق نادر</p>
            <p class="price">100 جوهره</p>

            <a href="login.php">
                <button class="buy-button">افتح الآن</button>
            </a>
        </div>
    </div>

</body>
</html>
