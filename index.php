<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームのデータを受け取る
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // 現在の日付を取得
    $date = date("Y-m-d H:i:s");

    // CSVファイルのパス
    $csvFile = 'contact_data.csv';

    // データをCSVファイルに保存
    $file = fopen($csvFile, 'a'); // ファイルを追記モードで開く
    if ($file) {
        // CSVに書き込む
        fputcsv($file, [$date, $name, $email, $message]);
        fclose($file);
    } else {
        echo "ファイルを開くことができませんでした。";
    }

    // 送信完了メッセージ
    echo "<h2>お問い合わせいただきありがとうございます。</h2>";
    echo "<p>内容を確認の上、担当者よりご連絡いたします。</p>";
    echo "<a href='index.html'>ホームページに戻る</a>";
} else {
    echo "<p>不正なアクセスです。</p>";
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>株式会社Jecコンサルティング</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(to right, #007bff, #6610f2);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
        }
        .contact-section {
            background-color: #343a40;
            color: white;
            padding: 50px 0;
        }
        .contact-section h2 {
            font-size: 2rem;
        }
        .footer {
            background-color: #212529;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- ヒーローセクション -->
    <section class="hero-section">
        <div class="container">
            <h1>株式会社Jecコンサルティングへようこそ</h1>
            <p>ビジネスの成長をサポートするパートナーです</p>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2>お問い合わせ</h2>
            <p>お気軽にご連絡ください。以下のフォームに必要事項を入力して送信してください。</p>

            <!-- お問い合わせフォーム -->
            <form action="contact.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">お名前</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">メールアドレス</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">お問い合わせ内容</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-light">送信</button>
            </form>
        </div>
    </section>

    <!-- フッター -->
    <footer class="footer">
        <p>&copy; 2025 株式会社Jecコンサルティング. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
