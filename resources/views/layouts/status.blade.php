
<!-- Modal HTML -->
<div class="modal fade" id="sessionAlertModal" tabindex="-1" aria-labelledby="sessionAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sessionAlertModalLabel">Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Success Message -->
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Kiểm tra nếu session có thông tin thì hiển thị modal
    document.addEventListener('DOMContentLoaded', function () {
        @if (session()->has('success') || session()->has('error'))
            let sessionModal = new bootstrap.Modal(document.getElementById('sessionAlertModal'));
            sessionModal.show();
        @endif
    });
</script>