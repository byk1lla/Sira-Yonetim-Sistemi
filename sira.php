<?php
require("inc/connection.php");
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

// Sadece ::1 IP adresinden erişim sağlama kontrolü
$remoteAddress = $_SERVER["REMOTE_ADDR"];
if ($remoteAddress !== "::1") {
    die('<!DOCTYPE html>
    <html>
    <head>
        <title>403 Forbidden</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <style>
    body {
        padding: 20px;
        background-color: #1e1e1e;
    }</style>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>403 Forbidden</h1>
                <p>Üzgünüz, bu sayfaya <b>erişim izniniz</b> bulunmamaktadır.</p>
            </div>
        </div>
    </body>
    </html>
    '); // eğer ip adresi ::1 değil ise Burayı Gösteriyor
}

?>

<?php
if (isset($_POST["sil"])) {
    $user_id = $_POST["user_id"];
    // Kaydı sil
$sql = "DELETE FROM users WHERE user_id = '$user_id'";
if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success'>Kayıt başarıyla silindi.</div>";
} else {
    echo "Kayıt silinirken hata oluştu: " . $conn->error;
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sırada Bekleyen Kullanıcılar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body {
            padding: 20px;
            background-color: #1e1e1e;
        }
        .container{
            color : whitesmoke
        }
</style>
<body>
    <div class="container">
        <h2>Sırada Bekleyen Kullanıcılar</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sıra Numarası</th>
                    <th>Username</th>
                    <th>User ID</th>
                    <th>Kayıt Tarihi</th> 
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<div class='alert alert-success'>$result->num_rows  Adet Kayıt Veritabanından Getirildi!</div>";
                    while ($row = $result->fetch_assoc()) {

                        
                        echo "<tr>";
                        echo "<td>" . $row["sira_numarasi"] . "</td>";
                        echo "<td>" . $row['username']. "</td>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["kayit_tarihi"] . "</td>";
                        
                        echo "<td><form method='POST' action=''><input type='hidden' name='user_id' value='" . $row["user_id"] . "'><button type='submit' name='sil' class='btn btn-danger'>Sil</button></form></td>";
                        echo "</tr></br>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>Hmm Veritabanı Boş Görünüyor...</div>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>