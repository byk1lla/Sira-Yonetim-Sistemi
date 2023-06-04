<?php

require("inc/connection.php");
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Bu kullanıcı adıyla zaten kayıtlı bir kullanıcı var.</div>";
    } else {
  
        $ip = $_SERVER["REMOTE_ADDR"];

        // Aynı IP adresinden kayıt var mı kontrol et
        $stmt = $conn->prepare("SELECT * FROM users WHERE IP_ADD = ?");
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<div class='alert alert-warning'>Birden Fazla Kayıt Oluşturamazsınız!</div>";
        } else {
            // user_id'yi rastgele oluştur
            $user_id = generateUserID();

            // Kaydı ekle
            $stmt = $conn->prepare("INSERT INTO users (user_id, username, kayit_tarihi, IP_ADD) VALUES (?, ?, NOW(), ?)");
            $stmt->bind_param("sss", $user_id, $username, $ip);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Kaydınız başarıyla eklendi. Kullanıcı ID'niz: {$user_id}</div>";
            } else {
                echo "<div class='alert alert-danger'>Kaydınız eklenemedi.</div>";
            }
        }
    }
}
function generateUserID() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 6;
    $randomString = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $max)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            padding: 20px;
            background-color: #1e1e1e;
        }
        .container{
            color : whitesmoke
        }
    </style>
    <title>Sıraya Gir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color: #1e1e1e;">
    <div class="container">
        <h2>Sıraya Gir</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username"><b>Aşağıya Kullanıcı Adınızı Girerek Kaydolabilir, <a href="index.php">Buradan</a> da Sıra Numaranızı Sorgulayabilirsiniz.</b></label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Kullanıcı Adı" required oninvalid="this.setCustomValidity('Lütfen Bu Alanı Doldurun')" oninput="this.setCustomValidity('')">
                <span id="username-error" class="help-block"></span>
            </div>
            
            <button type="submit" class="btn btn-primary">Kayıt Ekle</button>
            <a href="index.php" class="btn btn-primary">Sıra Numaranı Sorgula</a>
            <?php if($_SERVER['REMOTE_ADDR'] == "::1"){?>
                    <a href="sira.php" class="btn btn-primary">Sırayı Görüntüle</a>
            <?php }?>
            
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            if (username == "") {
                document.getElementById("username-error").innerHTML = "Lütfen bir kullanıcı adı girin.";
                return false;
            } else {
                document.getElementById("username-error").innerHTML = "";
                return true;
            }
        }
    </script>
</body>
</html>

