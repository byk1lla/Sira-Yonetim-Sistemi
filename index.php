<!DOCTYPE html>
<html>
<head>
    <title>Sıra Numarası Sorgula</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #1e1e1e;
        }
        .container{
            color : whitesmoke
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sıra Numarası Sorgulama | Ana Sayfa</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <h5 for="username"><b>Eğer Kayıt Olduysanız ve Sıra Numaranızı Bilmiyorsanız Aşağıya Kullanıcı Adınızı Girin.<br/> <br/>Eğer Kaydınız Yoksa <a href="kayitol.php">Burdan</a> Yeni Kayıt Oluşturun.</b></h5>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Kullanıcı Adı Girin" oninvalid="this.setCustomValidity('Lütfen Bu Alanı Doldurun')" oninput="this.setCustomValidity('')">
            </div>
            
            <button type="submit" class="btn btn-primary" >Sıra Numarası Sorgula</button>
            <a href="kayitol.php" class="btn btn-primary">Sıra Numarası Al</a>
            <?php if($_SERVER['REMOTE_ADDR'] == "::1"){?>
                    <a href="sira.php" class="btn btn-primary">Sırayı Görüntüle</a>
            <?php }?>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require("inc/connection.php");

            if ($conn->connect_error) {
                die("Veritabanına bağlanırken bir hata oluştu: " . $conn->connect_error);
            }

            $username = $_POST["username"];
            $stmt = $conn->prepare("SELECT sira_numarasi,username FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
           

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo "<h3>Sıra Numaranız - {$row['sira_numarasi']}</h3>";
                echo '<table class="table table-bordered">';
                echo '<thead><tr>
                <th>Sıra Numarası</th>
                <th>Kullanıcı Adı</th>
                
                </tr></thead>';
                echo '<tbody>';
               
                    echo '<tr>';
                    echo '<td>' . $row["sira_numarasi"] . '</td>';
                    echo '<td>' . $row["username"] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo "<br/><br/><div class='alert alert-warning'>Belirtilen kullanıcı adına sahip kullanıcı bulunamadı - {$username} isterseniz <a href='kayitol.php'>Buradan</a> Sıra Numarası Alabilirsiniz.</div>";
            }

            $conn->close();
        }
        ?>
        
    </div>
</body>
</html>
