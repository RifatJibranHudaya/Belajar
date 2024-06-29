
<!DOCTYPE html>
<html>
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  background-color: #f0f0f0;  /* Light gray background */
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  font-size: 20px;
}

form {
  display: flex;
  flex-direction: column;
  align-items: left;
  width: 300px; /* Adjust width as needed */
  margin: 0 auto; /* Center the form horizontally */
  border: 1px solid #ccc; /* Light border */
  border-radius: 5px; /* Rounded corners */
  padding: 20px;
  background-color: #fff; /* White background */
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}
.checkbox-container {
display: flex;
align-items: center; /* Menyelaraskan item secara vertikal */
 margin-top: 10px; /* Memberikan ruang di atas container */
}
.checkbox-label {
margin-right: 10px; /* Memberikan ruang di antara label dan checkbox */
}

input[type="text"],
input[type="password"]
 {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px; /* Rounded corners for inputs */
  box-sizing: border-box; /* Include padding in width calculation */
}
input[type="checkbox"]{
  cursor: pointer;
}
input[type="submit"] {
  background-color: blue; /* Green button color */
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px; 
  cursor: pointer;
  transition: background-color 0.2s ease-in-out; 
}

input[type="submit"]:hover {
  background-color: #3e8e41; 
}
    </style>

<body>

    <h2>Form Login</h2>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan Password salah!";
        } elseif ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } elseif ($_GET['pesan'] == "belum_login") {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>
    <form action="login_exe.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" placeholder="Username" multiple><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="Password">
        <div class="checkbox-container">
            <label class="checkbox-label" for="checkbox">Tampilkan</label>
            <input type="checkbox" id="checkbox" name="checkbox" onclick="myFunction()">
        </div>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
        <input type="submit" value="Submit">
    </form>

</body>

</html>