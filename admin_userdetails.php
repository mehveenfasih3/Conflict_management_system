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
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: #f3f4f6;
      padding: 40px;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background-color: #374151;
      color: #fff;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #e5e7eb;
    }

    tbody tr:hover {
      background-color: #f9fafb;
    }

    .actions button {
      padding: 6px 12px;
      margin: 2px;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      color: white;
    }

    .approve {
      background-color: #10b981;
    }

    .view-btn {
      background-color: #3b82f6;
      color: white;
      padding: 4px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 0.85rem;
    }

    .view-btn a {
      color: white;
      text-decoration: none;
      display: inline-block;
    }

    .view-btn a:hover {
      text-decoration: none;
    }
     .back-btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #ccc;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
            text-decoration: none;
            color: black;
        }
        .back-btn:hover {
            background-color: #bbb;
        }
  </style>
</head>
<body>
  <a href="adminmain1.html" class="back-btn">← Back</a>
  <div class="container">
    <h2>Users Detail</h2>
    <table>
      <thead>
        <tr>
          <th>SNo</th>
          <th>Name</th>
          <th>Email</th>
          <th>View1</th>
          <th>View2</th>
          <th>View3</th>
          <th>Actions</th>
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
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";

        // View1 as button if exists
        if (!empty($row['view1'])) {
    echo "<td>
            <a href='userdetails2.php?userid={$userid}&conflictType=conflict1' 
               class='btn btn-light btn-sm' 
               title='View Conflict 1'>
               <i class='fas fa-eye'></i>
            </a>
          </td>";
} else {
    echo "<td>-</td>";
}

        // View2 as button if exists
       if (!empty($row['view2'])) {
    echo "<td>
            <a href='userdetails2.php?userid={$userid}&conflictType=conflict2' 
               class='btn btn-light btn-sm' 
               title='View Conflict 2'>
               <i class='fas fa-eye'></i>
            </a>
          </td>";
} else {
    echo "<td>-</td>";
}

        // View3 as button if exists
       if (!empty($row['view3'])) {
    echo "<td>
            <a href='userdetails2.php?userid={$userid}&conflictType=conflict3' 
               class='btn btn-light btn-sm' 
               title='View Conflict 3'>
               <i class='fas fa-eye'></i>
            </a>
          </td>";
} else {
    echo "<td>-</td>";
}

        echo '<td class="actions">
                <button class="approve">Update</button>
              </td>';
        echo "</tr>";
        $sno++;
    }
}
?>
</tbody>
    </table>
  </div>
</body>
</html>
<?php $conn->close(); ?>
