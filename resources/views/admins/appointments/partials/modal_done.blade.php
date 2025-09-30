<div class="modal fade" id="doneModal{{ $appointment->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mark as Done</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Mark <strong>{{ $appointment->user->name }}</strong>’s appointment at
        <strong>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</strong> as <span class="text-success">Done</span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="{{ route('admin.appointments.markDone', ['appointment' => $appointment->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Yes, Mark Done</button>
        </form>
      </div>
    </div>
  </div>
</div>