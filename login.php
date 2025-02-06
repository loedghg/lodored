<?php
try {
    // إنشاء اتصال بقاعدة بيانات SQLite
    $db = new PDO("sqlite:users.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // إنشاء جدول إذا لم يكن موجودًا
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        password TEXT NOT NULL,
        gems INTEGER DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $gems = isset($_POST["gems"]) ? intval($_POST["gems"]) : 0;

        if (empty($username) || empty($password)) {
            die("❌ الرجاء إدخال جميع البيانات.");
        }

        // تشفير كلمة المرور
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // إدخال البيانات في قاعدة البيانات
        $stmt = $db->prepare("INSERT INTO users (username, password, gems) VALUES (?, ?, ?)");
        $stmt->execute([$username, $hashed_password, $gems]);

        echo "✅ تم التسجيل بنجاح!";

        // إرسال إشعار إلى تيليجرام
        $botToken = "7195022142:AAHt6p0rRaDBUgHOhJzBYHQXnamHPJYBrsg"; // 🔹 ضع توكن البوت هنا
        $chatId = "6801056679"; // 🔹 ضع معرف الشات هنا
        $message = "🛍️ طلب شراء جواهر\n👤 المستخدم: $username\n💎 عدد الجواهر: $gems";

        file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message));

        header("Location: success.html");
        exit();
    }
} catch (PDOException $e) {
    die("❌ خطأ في قاعدة البيانات: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>تسجيل الدخول</h1>
        <p>أدخل بياناتك لإكمال عملية الشراء</p>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="اسم المستخدم" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <input type="hidden" name="gems" value="100">
            <button type="submit">تأكيد</button>
        </form>
    </div>

</body>
</html>
