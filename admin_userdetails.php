<?php
session_start();
require 'includes/dbconfig.inc.php';

if (!isset($_SESSION['logged']) || !$_SESSION['logged']) {
    header("Location: login/login.php");
    exit;
}

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
      z-index: 10;
      min-width: 150px;
      border-radius: 5px;
      overflow: hidden;
      text-align: left;
    }
    .dropdown:hover .dropdown-menu { display: block; }
    .dropdown-menu .dropdown-item {
      display: block;
      padding: 8px 12px;
      border: none;
      background: none;
      text-align: left;
      width: 100%;
      cursor: pointer;
      font-size: 14px;
      color: #333;
      text-decoration: none;
    }
    .dropdown-menu .dropdown-item:hover { background-color: #007bff; color: white; }
    .dropdown-menu .dropdown-item.delete-view:hover { background-color: #f44336; color: white; }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      align-items: center;
      justify-content: center;
    }
    .modal.show { display: flex; }
    .modal-content {
      background: #fff;
      border-radius: 10px;
      width: 90%;
      max-width: 460px;
      padding: 24px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
      position: relative;
      text-align: left;
    }
    .modal-content h3 {
      margin-bottom: 6px;
      color: #222;
    }
    .modal-sub {
      color: #666;
      font-size: 13px;
      margin-bottom: 18px;
    }
    .modal-close {
      position: absolute;
      top: 10px;
      right: 14px;
      background: none;
      border: none;
      font-size: 22px;
      cursor: pointer;
      color: #888;
    }
    .modal-close:hover { color: #333; }
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-bottom: 16px;
    }
    .info-item {
      background: #f7f7f7;
      border-radius: 8px;
      padding: 12px;
    }
    .info-item label {
      display: block;
      font-size: 12px;
      color: #777;
      margin-bottom: 4px;
    }
    .info-item .value {
      font-size: 15px;
      font-weight: bold;
      color: #222;
    }
    .attempt-control {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      margin: 14px 0;
      padding: 14px;
      background: #f0f7ff;
      border-radius: 8px;
    }
    .attempt-control button {
      width: 40px;
      height: 40px;
      border: none;
      border-radius: 8px;
      background: #2196F3;
      color: white;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
    }
    .attempt-control button:hover { background: #0b7dda; }
    .attempt-control input {
      width: 80px;
      text-align: center;
      font-size: 22px;
      font-weight: bold;
      border: 2px solid #2196F3;
      border-radius: 8px;
      padding: 8px;
    }
    .modal-actions {
      display: flex;
      justify-content: flex-end;
      gap: 8px;
      margin-top: 12px;
      flex-wrap: wrap;
    }
    .btn {
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      color: white;
    }
    .btn.primary { background: #2196F3; }
    .btn.primary:hover { background: #0b7dda; }
    .btn.secondary { background: #6c757d; }
    .btn.secondary:hover { background: #5a6268; }
    .btn.success { background: #4CAF50; }
    .btn.success:hover { background: #45a049; }
    .modal-status {
      min-height: 18px;
      font-size: 13px;
      margin-top: 8px;
      text-align: center;
    }
    .modal-status.ok { color: #155724; }
    .modal-status.err { color: #721c24; }
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
              $name = htmlspecialchars($row['name'], ENT_QUOTES);
              echo "<tr>";
              echo "<td>{$sno}</td>";
              echo "<td>" . htmlspecialchars($row['name']) . "</td>";

              for ($i = 1; $i <= 3; $i++) {
                  $view = "view{$i}";
                  $conflictLabel = "conflict {$i}";
                  if (!empty($row[$view])) {
                      echo "<td class='dropdown-cell' data-userid='{$userid}' data-view='{$view}' data-conflict='{$conflictLabel}' data-name='{$name}'>
                              <div class='dropdown'>
                                  <button class='btn-light dropdown-toggle' type='button'>
                                      <i class='fas fa-eye'></i>
                                  </button>
                                  <div class='dropdown-menu'>
                                      <a href='userdetails2.php?userid={$userid}&conflictType=conflict {$i}' class='dropdown-item'>View</a>
                                      <button type='button' class='dropdown-item edit-attempts'>Edit Attempts</button>
                                      <button type='button' class='dropdown-item delete-view' data-view='{$view}'>Delete</button>
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

  <!-- Edit Attempts Modal -->
  <div class="modal" id="attemptsModal" role="dialog" aria-modal="true">
    <div class="modal-content">
      <button type="button" class="modal-close" id="closeAttemptsModal">&times;</button>
      <h3>Edit Attempts</h3>
      <p class="modal-sub">Increase or decrease the user's current allocated attempts</p>

      <div class="info-grid">
        <div class="info-item">
          <label>User Name</label>
          <div class="value" id="modalUserName">—</div>
        </div>
        <div class="info-item">
          <label>Conflict</label>
          <div class="value" id="modalConflict">—</div>
        </div>
        <div class="info-item">
          <label>Used Attempts</label>
          <div class="value" id="modalUsed">—</div>
        </div>
        <div class="info-item">
          <label>Requested</label>
          <div class="value" id="modalRequested">—</div>
        </div>
      </div>

      <label style="font-size:13px;color:#555;display:block;text-align:center;">Current Allocated Attempts</label>
      <div class="attempt-control">
        <button type="button" id="decAttempts">−</button>
        <input type="number" id="allocatedInput" min="0" value="0">
        <button type="button" id="incAttempts">+</button>
      </div>

      <div class="modal-actions">
        <button type="button" class="btn secondary" id="cancelAttemptsModal">Cancel</button>
        <button type="button" class="btn primary" id="saveAttemptsBtn">Save Attempts</button>
      </div>

      <hr style="margin: 18px 0; border: none; border-top: 1px solid #eee;">

      <label style="font-size:13px;color:#555;display:block;margin-bottom:6px;">Add Extra Attempts</label>
      <div class="attempt-control" style="background:#e8f5e9;">
        <button type="button" id="decAddAmount" style="background:#4CAF50;">−</button>
        <input type="number" id="addAmountInput" min="0" value="1" style="border-color:#4CAF50;">
        <button type="button" id="incAddAmount" style="background:#4CAF50;">+</button>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn success" id="addAttemptsBtn">Add Attempts</button>
      </div>

      <div class="modal-status" id="modalStatus"></div>
    </div>
  </div>

  <script>
  $(document).ready(function(){
      let currentUserId = 0;
      let currentConflict = '';

      function showModal() {
          $('#attemptsModal').addClass('show').css('display', 'flex');
          $('#modalStatus').removeClass('ok err').text('');
      }

      function hideModal() {
          $('#attemptsModal').removeClass('show').hide();
      }

      function setStatus(msg, ok) {
          $('#modalStatus').removeClass('ok err').addClass(ok ? 'ok' : 'err').text(msg);
      }

      // Double-click empty cell to grant permission
      $('.empty-cell').on('dblclick', function(){
          const userid = $(this).data('userid');
          const view = $(this).data('view');
          const conflictValue = view.replace('view', 'conflict');

          if (confirm(`Grant permission for ${conflictValue}?`)) {
              $.post('update_view.php', { userid, view, conflictValue }, function(){
                  alert('Permission granted successfully!');
                  location.reload();
              }).fail(function(){
                  alert('Error updating permission.');
              });
          }
      });

      // Delete permission
      $('.delete-view').on('click', function(){
          const userid = $(this).closest('.dropdown-cell').data('userid');
          const view = $(this).data('view');

          if (confirm('Remove this permission?')) {
              $.post('delete_view.php', { userid, view }, function(){
                  alert('Permission removed successfully!');
                  location.reload();
              }).fail(function(){
                  alert('Error deleting permission.');
              });
          }
      });

      // Edit Attempts — open modal
      $('.edit-attempts').on('click', function(e){
          e.preventDefault();
          e.stopPropagation();

          const cell = $(this).closest('.dropdown-cell');
          currentUserId = cell.data('userid');
          currentConflict = cell.data('conflict');
          const name = cell.data('name') || 'Unknown';

          $('#modalUserName').text(name);
          $('#modalConflict').text(currentConflict);
          $('#modalUsed').text('…');
          $('#modalRequested').text('…');
          $('#allocatedInput').val(0);
          $('#addAmountInput').val(1);
          showModal();

          $.get('admin_manage_attempt.php', {
              action: 'get',
              userid: currentUserId,
              conflict: currentConflict
          }).done(function(data){
              if (!data.success) {
                  setStatus(data.message || 'Failed to load attempts', false);
                  return;
              }
              $('#modalUserName').text(data.name || name);
              $('#modalConflict').text(data.conflict || currentConflict);
              $('#modalUsed').text(data.attempt_used);
              $('#modalRequested').text('+' + data.requested_attempt);
              $('#allocatedInput').val(data.allocated_attempts);
          }).fail(function(){
              setStatus('Error loading attempts', false);
          });
      });

      $('#incAttempts').on('click', function(){
          const input = $('#allocatedInput');
          input.val(Math.max(0, (parseInt(input.val(), 10) || 0) + 1));
      });

      $('#decAttempts').on('click', function(){
          const input = $('#allocatedInput');
          input.val(Math.max(0, (parseInt(input.val(), 10) || 0) - 1));
      });

      $('#incAddAmount').on('click', function(){
          const input = $('#addAmountInput');
          input.val(Math.max(0, (parseInt(input.val(), 10) || 0) + 1));
      });

      $('#decAddAmount').on('click', function(){
          const input = $('#addAmountInput');
          input.val(Math.max(0, (parseInt(input.val(), 10) || 0) - 1));
      });

      $('#saveAttemptsBtn').on('click', function(){
          const allocated = Math.max(0, parseInt($('#allocatedInput').val(), 10) || 0);
          $.post('admin_manage_attempt.php', {
              action: 'set',
              userid: currentUserId,
              conflict: currentConflict,
              allocated_attempts: allocated
          }).done(function(data){
              if (data.success) {
                  setStatus('Attempts saved: ' + data.allocated_attempts, true);
                  $('#allocatedInput').val(data.allocated_attempts);
              } else {
                  setStatus(data.message || 'Save failed', false);
              }
          }).fail(function(){
              setStatus('Error saving attempts', false);
          });
      });

      $('#addAttemptsBtn').on('click', function(){
          const amount = Math.max(0, parseInt($('#addAmountInput').val(), 10) || 0);
          if (amount <= 0) {
              setStatus('Enter an amount greater than 0', false);
              return;
          }
          $.post('admin_manage_attempt.php', {
              action: 'add',
              userid: currentUserId,
              conflict: currentConflict,
              add_amount: amount
          }).done(function(data){
              if (data.success) {
                  setStatus('Added ' + amount + ' attempt(s). Total: ' + data.allocated_attempts, true);
                  $('#allocatedInput').val(data.allocated_attempts);
                  $('#addAmountInput').val(1);
              } else {
                  setStatus(data.message || 'Add failed', false);
              }
          }).fail(function(){
              setStatus('Error adding attempts', false);
          });
      });

      $('#closeAttemptsModal, #cancelAttemptsModal').on('click', hideModal);

      $('#attemptsModal').on('click', function(e){
          if (e.target === this) hideModal();
      });

      $(document).on('keydown', function(e){
          if (e.key === 'Escape') hideModal();
      });
  });
  </script>
</body>
</html>
<?php $conn->close(); ?>
