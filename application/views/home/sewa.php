<?php 
$p = $productByID; 
$data = $this->session->userdata('data');

?>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-7 mx-auto">
      <form method="post" action="<?= base_url('home/lanjut_sewa') ?>">
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <img src="<?= base_url('assets/upload/'.$p['image']) ?>" class="img-thumbnail">
                </div>
                <div class="col">
                    <h4><?= $p['name'] ?></h4>
                    <small>Decription : </small><br>
                    <i>"<?= $p['description'] ?>"</i><br>
                    Harga sewa : <strong class="text-info"><?= $p['price'] ?>/hari</strong>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?= strtoupper($data['username']) ?>" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" name="sim" placeholder="No SIM" required autocomplete="off">
                  </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="start_date" name="start_date" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off">
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="<?= base_url('home') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            <button type="submit" class="btn btn-primary">Lanjutkan Sewa</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
$('#start_date').on('change', function(){
  console.log($(this).val());
})
</script>