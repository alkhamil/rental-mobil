<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade index" id="hapus<?php echo $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Data ( <small><?php echo $p['name'] ?></small> )</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Anda yakin ingin menghapus ini ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
        <a class="btn btn-danger btn-sm" href="<?= base_url('product/delete/'.$p['id']) ?>">
          <i class="fa fa-trash-o"></i> Hapus
        </a>
      </div>
    </div>
  </div>
</div>