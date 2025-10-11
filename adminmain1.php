<!-- 
// session_start();
// require 'includes/dbconfig.inc.php';
//  if(!$_SESSION['logged']){ 
//       header("Location: login/login.php"); 
//       exit; 
//   }
// // Get the logged-in user ID
// $userid = $_SESSION['userid'];
// // Fetch user info
// $sql = "SELECT name, email FROM users WHERE userid = ?";

// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $userid);
// $stmt->execute();
// $result = $stmt->get_result();
// $user = $result->fetch_assoc();

// $name = $user['name'] ?? 'Unknown';
// $email = $user['email'] ?? 'Not Available';

// $stmt->close();
// $conn->close();
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('https://tse1.mm.bing.net/th/id/OIP.Aj_BcrA3jnToAhUx7cYr_AHaEK?rs=1&pid=ImgDetMain&o=7&rm=3') no-repeat center center fixed;
      background-size: cover;
      color: black;
    }

    .dashboard {
      max-width: 800px;
      margin: 60px auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
      text-align: center;
      color: black;
    }

    h1 {
      font-size: 36px;
      margin-bottom: 20px;
      font-weight: bold;
      color: #111;
    }

    .user-info {
      font-size: 18px;
      margin-bottom: 25px;
    }

    .user-info p {
      margin: 5px 0;
    }

    .conflict-image img {
      width: 100%;
      max-width: 600px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      margin: 25px 0;
    }

    .actions {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 14px 24px;
      border-radius: 30px;
      border: none;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      color: white;
      transition: 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .approve {
      background-color: #007bff;
    }

    .approve:hover {
      box-shadow: 0 0 12px #007bff;
    }

    .reject {
      background-color: #fd7e14;
    }

    .reject:hover {
      box-shadow: 0 0 12px #fd7e14;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h1>Welcome to Admin Dashboard</h1>
     <div class="user-info">
      <p><strong>User Name:</strong> <?php echo htmlspecialchars($name); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    </div>

    <div class="conflict-image">
      <img src="https://tse4.mm.bing.net/th/id/OIP.dGIcdWcKbYnaOAH3-4bvZwAAAA?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Conflict Management">
    </div>

   <div class="actions">
    <button class="btn approve" onclick="window.location.href='userapproval.php'">
        User Registration Approval
    </button>
    <button class="btn reject" onclick="window.location.href='admin_userdetails.php'">
        User Detail
    </button>
</div>
  </div>
</body>
</html> -->


<?php
session_start();
require 'includes/dbconfig.inc.php';

if (!$_SESSION['logged']) {
  header("Location: login/login.php");
  exit;
}

// Get logged-in user ID
$userid = $_SESSION['userid'];

// Fetch user info
$sql = "SELECT name, email FROM users WHERE userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$name = $user['name'] ?? 'Unknown';
$email = $user['email'] ?? 'Not Available';
$stmt->close();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
  $new_email = $_POST['email'];
  $new_password = $_POST['password']; // no hashing

  $update_sql = "UPDATE users SET email = ?, password = ? WHERE userid = ?";
  $update_stmt = $conn->prepare($update_sql);
  $update_stmt->bind_param("ssi", $new_email, $new_password, $userid);
  $update_stmt->execute();
  $update_stmt->close();

  // Refresh email shown after update
  $email = $new_email;
  echo "<script>alert('Profile updated successfully!');</script>";
}

// Handle profile update


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('https://tse1.mm.bing.net/th/id/OIP.Aj_BcrA3jnToAhUx7cYr_AHaEK?rs=1&pid=ImgDetMain&o=7&rm=3') no-repeat center center fixed;
      background-size: cover;
      color: black;
    }

    .dashboard {
      max-width: 800px;
      margin: 60px auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
      text-align: center;
      color: black;
      position: relative;
    }

    h1 {
      font-size: 36px;
      margin-bottom: 20px;
      font-weight: bold;
      color: #111;
    }

    .user-info { font-size: 18px; margin-bottom: 25px; }
    .user-info p { margin: 5px 0; }

    .conflict-image img {
      width: 100%;
      max-width: 600px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      margin: 25px 0;
    }

    .actions {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 14px 24px;
      border-radius: 30px;
      border: none;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      color: white;
      transition: 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .approve { background-color: #007bff; }
    .approve:hover { box-shadow: 0 0 12px #007bff; }

    .reject { background-color: #fd7e14; }
    .reject:hover { box-shadow: 0 0 12px #fd7e14; }

    /* Profile Settings Icon */
    .settings-icon {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 29px;
      cursor: pointer;
      color: #111;
    }

    .settings-menu {
      position: absolute;
      top: 60px;
      right: 30px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      display: none;
      flex-direction: column;
      overflow: hidden;
    }

    .settings-menu button {
      background: none;
      border: none;
      padding: 10px 20px;
      text-align: left;
      width: 150px;
      cursor: pointer;
      font-size: 15px;
      font-weight: 500;
    }

    .settings-menu button:hover {
      background-color: #007bff;
      color: white;
    }

    /* Modal Styling */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.4);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background: white;
      padding: 25px;
      border-radius: 10px;
      width: 350px;
      text-align: left;
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    .modal-content h2 {
      text-align: center;
      margin-bottom: 15px;
    }

    .modal-content input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .modal-content button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .modal-content button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="dashboard">
   
    <div class="settings-icon" onclick="toggleMenu()">⚙️</div>
 
    <div class="settings-menu" id="settingsMenu">
      <button onclick="openModal()">Update Profile</button>
      <button onclick="logout()">Logout</button>
    </div>

    <h1>Welcome to Admin Dashboard</h1>
    <div class="user-info">
      <p><strong>User Name:</strong> <?php echo htmlspecialchars($name); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    </div>

    <div class="conflict-image">
      <img src="https://tse4.mm.bing.net/th/id/OIP.dGIcdWcKbYnaOAH3-4bvZwAAAA?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Conflict Management">
    </div>

    <div class="actions">
      <button class="btn approve" onclick="window.location.href='userapproval.php'">User Registration Approval</button>
      <button class="btn reject" onclick="window.location.href='admin_userdetails.php'">User Detail</button>
    </div>
  </div>

  <!-- Modal for Update Profile -->
  <div class="modal" id="profileModal">
    <div class="modal-content">
      <h2>Update Profile</h2>
      <form method="POST" action="">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        <label>New Password:</label>
        <input type="password" name="password" placeholder="Enter new password" required>
        <button type="submit" name="update_profile">Update</button>
      </form>
      <button style="background-color:#dc3545;" onclick="closeModal()">Cancel</button>
    </div>
  </div>

  <script>
    function toggleMenu() {
      const menu = document.getElementById('settingsMenu');
      menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
    }

    function openModal() {
      document.getElementById('profileModal').style.display = 'flex';
      document.getElementById('settingsMenu').style.display = 'none';
    }

    function closeModal() {
      document.getElementById('profileModal').style.display = 'none';
    }

    function logout() {
      window.location.href = 'login/login.php';
    }

    window.onclick = function(event) {
      const modal = document.getElementById('profileModal');
      if (event.target === modal) modal.style.display = 'none';
    };
  </script>
</body>
</html>
