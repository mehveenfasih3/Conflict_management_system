<?php
session_start();
require 'includes/dbconfig.inc.php';

// If you want the logged-in user instead of hardcoded:
$userid = $_SESSION['userid'] ?? 18; // fallback to 18 for testing

// Fetch the data
$sql = "SELECT conflict_type, colorfeed, value, text_feed, date_time 
        FROM details 
        WHERE conflict_type = 'conflict 1' AND userid = ? 
        ORDER BY date_time DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Conflict Feed Table</title>
<style>
    body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background: linear-gradient(135deg, #bcbcbc, #e0e0e0); color: #000; }
    .container { max-width: 1100px; margin: 40px auto; background: rgba(255, 255, 255, 0.9); padding: 25px; border-radius: 15px; box-shadow: 0 8px 30px rgba(0,0,0,0.15); }
    h1 { text-align: center; margin-bottom: 20px; font-size: 28px; letter-spacing: 1px; font-weight: bold; }
    table { width: 100%; border-collapse: collapse; font-size: 15px; overflow: hidden; border-radius: 10px; }
    thead { background: linear-gradient(90deg, #c1c1c1, #a8a8a8); color: #000; }
    thead th { padding: 14px; text-align: left; font-weight: bold; }
    tbody tr { background: rgba(255, 255, 255, 0.8); transition: background 0.3s ease; }
    tbody tr:nth-child(even) { background: rgba(230, 230, 230, 0.8); }
    tbody tr:hover { background: #dcdcdc; transform: scale(1.01); }
    tbody td { padding: 12px; border-bottom: 1px solid #ccc; }
    .badge { padding: 5px 10px; border-radius: 8px; font-weight: bold; font-size: 13px; color: #fff; }
    .badge-red { background: red; }
    .badge-green { background: green; }
    .badge-yellow { background: goldenrod; }
    .val { background: #f1f1f1; padding: 5px 8px; border-radius: 6px; font-family: monospace; }
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
<!-- Back Button -->
<a href="userdetails2.html" class="back-btn">← Back</a>
<div class="container">
    <h1>Conflict Feed — Recent Entries</h1>
    <h2>Conflict Type: Conflict 1</h2>
    <table>
        <thead>
            <tr>
                <th>S.no</th>
                <th>ColorFeed</th>
                <th>Values</th>
                <th>Text</th>
                <th>Date &amp; Time</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php $count = 1; ?>
                <?php foreach ($data as $row): ?>
                    <?php
                        // Map DB color values to badge classes
                        $colorValue = strtolower(trim($row['colorfeed']));
                        $colorClass = 'badge-info'; // default
                        if ($colorValue === 'red') $colorClass = 'badge-red';
                        elseif ($colorValue === 'green') $colorClass = 'badge-green';
                        elseif ($colorValue === 'yellow') $colorClass = 'badge-yellow';
                    ?>
                    <tr>
                        <td><?= $count++; ?></td>
                        <td><span class="badge <?= $colorClass; ?>"><?= htmlspecialchars(ucfirst($colorValue)); ?></span></td>
                        <td><span class="val"><?= htmlspecialchars($row['value']); ?></span></td>
                        <td><?= htmlspecialchars($row['text_feed']); ?></td>
                        <td><?= htmlspecialchars($row['date_time']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No data found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
