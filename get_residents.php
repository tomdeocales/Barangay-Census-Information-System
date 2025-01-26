<!-- Modal -->
<div class="modal fade" id="showModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resident Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
        <p><strong>First Name:</strong> <?php echo $row['first_name']; ?></p>
        <p><strong>Middle Name:</strong> <?php echo $row['middle_name']; ?></p>
        <p><strong>Last Name:</strong> <?php echo $row['last_name']; ?></p>
        <p><strong>Purok:</strong> <?php echo $row['purok']; ?></p>
        <!-- Add more metadata fields here as needed -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
