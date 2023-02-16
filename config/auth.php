<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($pass);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE  username='$username' AND password='$password'");

    $data = mysqli_fetch_array($query);
    $username = $data['username'];
    $password = $data['password'];
    $level = $data['level'];

    if ($username==$username && $password==$password) {
        session_start();
        $_SESSION['nama'] = $username;
        $_SESSION['level'] = $level;

        if ($level === 'admin') {
            echo"
  			<script>
                alert('Anda Berhasil Login. Sebagai : $level');
                window.location.href='../asset/index.php';
         	</script>;
  			";
        }else {
            echo"
  			<script>
                alert('Anda Berhasil Login. Sebagai : $level');
                window.location.href='../asset/index.php';
         	</script>;
  			";
        }
    }else{
        echo"
        <script>
          alert('Username dan Password tidak ditemukan');
          window.location.href='../index.php';
       </script>;
        ";
    }
}


?>