<?php
require 'includes/dbconfig.inc.php';

// Fetch users where approval = 1
$sql = "SELECT userid, name, email, view1, view2, view3 FROM users WHERE approval = '1'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Conflict Management Task</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background: #f3f4f6; padding: 40px; }
    .container { max-width: 1000px; margin: auto; background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    h2 { text-align: center; margin-bottom: 20px; color: #333; }
    table { width: 100%; border-collapse: collapse; }
    thead { background-color: #374151; color: #fff; }
    th, td { padding: 12px 15px; text-align: center; border-bottom: 1px solid #e5e7eb; }
    tbody tr:hover { background-color: #f9fafb; }
    .btn-light { background: none; border: none; cursor: pointer; }
    .back-btn { display: inline-block; padding: 6px 12px; background-color: #ccc; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 10px; text-decoration: none; color: black; }
    .back-btn:hover { background-color: #bbb; }
    .empty-cell { color: gray; cursor: pointer; }
    .dropdown { position: relative; display: inline-block; }
    .dropdown-menu {
      display: none;
      position: absolute;
      background-color: white;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
      min-width: 120px;
      border-radius: 5px;
      overflow: hidden;
    }
    .dropdown:hover .dropdown-menu { display: block; }
    .dropdown-menu .dropdown-item {
      padding: 8px 12px;
      border: none;
      background: none;
      text-align: left;
      width: 100%;
      cursor: pointer;
    }
    .dropdown-menu .dropdown-item:hover { background-color: #007bff; color: white; }
  </style>
</head>
<body>
  <a href="adminmain1.php" class="back-btn">← Back</a>
  <div class="container">
    <h2>Users Detail</h2>
    <table>
      <thead>
        <tr>
          <th>SNo</th>
          <th>Name</th>
          <th>Conflict 1</th>
          <th>Conflict 2</th>
          <th>Conflict 3</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if ($result && $result->num_rows > 0) {
          $sno = 1;
          while ($row = $result->fetch_assoc()) {
              $userid = (int)$row['userid'];
              echo "<tr>";
              echo "<td>{$sno}</td>";
              echo "<td>" . htmlspecialchars($row['name']) . "</td>";

              // Generate cells dynamically
              for ($i = 1; $i <= 3; $i++) {
                  $view = "view{$i}";
                  if (!empty($row[$view])) {
                      echo "<td class='dropdown-cell' data-userid='{$userid}' data-view='{$view}'>
                              <div class='dropdown'>
                                  <button class='btn btn-light btn-sm dropdown-toggle' type='button'>
                                      <i class='fas fa-eye'></i>
                                  </button>
                                  <div class='dropdown-menu'>
                                      <a href='userdetails2.php?userid={$userid}&conflictType=conflict {$i}' class='dropdown-item'>View</a>
                                      <button class='dropdown-item delete-view' data-view='{$view}'>Delete</button>
                                  </div>
                              </div>
                            </td>";
                  } else {
                      echo "<td class='empty-cell' data-userid='{$userid}' data-view='{$view}'>-</td>";
                  }
              }

              echo "</tr>";
              $sno++;
          }
      }
      ?>
      </tbody>
    </table>
  </div>

  <script>
  $(document).ready(function(){

      // 🟢 Double-click empty cell to grant permission
      $('.empty-cell').on('dblclick', function(){
          const userid = $(this).data('userid');
          const view = $(this).data('view');
          const conflictValue = view.replace('view', 'conflict');

          if (confirm(`Grant permission for ${conflictValue}?`)) {
              $.post('update_view.php', { userid, view, conflictValue }, function(response){
                  alert('Permission granted successfully!');
                  location.reload();
              }).fail(function(){
                  alert('Error updating permission.');
              });
          }
      });

      // 🔴 Delete permission
      $('.delete-view').on('click', function(){
          const userid = $(this).closest('.dropdown-cell').data('userid');
          const view = $(this).data('view');

          if (confirm('Remove this permission?')) {
              $.post('delete_view.php', { userid, view }, function(response){
                  alert('Permission removed successfully!');
                  location.reload();
              }).fail(function(){
                  alert('Error deleting permission.');
              });
          }
      });
  });
  </script>
</body>
</html>
<?php $conn->close(); ?>
