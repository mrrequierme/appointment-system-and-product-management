<div class="modal fade" id="editModal{{ $appointment->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to edit <strong>{{ $appointment->user->name }}</strong>’s
        appointment at <strong>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="{{ route('admin.appointments.edit', ['id' => $appointment->id]) }}" class="btn btn-warning">
          Confirm Edit
        </a>
      </div>
    </div>
  </div>
</div>