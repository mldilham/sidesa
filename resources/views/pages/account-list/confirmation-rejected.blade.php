<!-- Modal -->
<div class="modal fade" id="confirmationRejected-{{ $item->id }}" tabindex="-1" aria-labelledby="confirmationRejectedLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/account-request/approval/{{ $item->id }}" method="post">
        @csrf
        @method('POST')
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title fs-5" id="confirmationRejectedLabel">Konfirmasi Non-aktif</h4>
            <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="for" value="deactivate">
            <span>
                Apakah anda yakin ingin menonaktifkan akun ini?
            </span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Ya!</button>
          </div>
        </div>
    </form>
  </div>
</div>
