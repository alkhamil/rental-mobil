<?php  

if ($this->session->flashdata('sukses')) {
	$sukses = $this->session->flashdata('sukses');
	echo $sukses;
}

$data = $this->session->userdata('data');

?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4">
          <div class="nav flex-column nav-pills bg-dark" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active bg-dark" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All Product</a>
            <a class="nav-link bg-dark" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Toyota</a>
            <a class="nav-link bg-dark" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Honda</a>
            <a class="nav-link bg-dark" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Suzuki</a>
          </div>
        </div>
        <div class="col-md-8">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- all product -->
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <?php foreach ($product as $p) { ?>
                  <div class="col-md-4 mb-2">
                  <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="<?= base_url('assets/upload/'.$p['image']) ?>" title="<?= $p['name'] ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?= $p['name'] ?></h5>
                      <p class="card-text">Harga sewa : <?= $p['price'] ?>/Hari</p>
                      <?php  

                          if ($data['username'] != null) {
                            echo '<a href="'.base_url('home/sewa/'.$p['id']).'" class="btn btn-primary">Sewa</a>';
                          }else{
                            echo '<button class="btn btn-danger" disabled>Sewa</button>';
                            echo '<br>';
                            echo '<small class="text-warning">Anda Harus login terlebih dahulu !</small>';
                          }
                      
                      ?>
                    </div>
                  </div>
                  </div>
                <?php } ?> 
              </div>
            </div>
            <!-- end all product -->

            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="row">
                          
                <?php  
                  $productByType = $this->db->get_where('products', ['type'=>'Toyota'])->result_array();
                ?>
                <?php foreach ($productByType as $pc) { ?>
                  <div class="col-md-4 mb-2">
                  <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="<?= base_url('assets/upload/'.$pc['image']) ?>" title="<?= $p['name'] ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?= $pc['name'] ?></h5>
                      <p class="card-text">Harga sewa : <?= $pc['price'] ?>/Hari</p>
                      <?php  

                          if ($data['username'] != null) {
                            echo '<a href="'.base_url('home/sewa/'.$pc['id']).'" class="btn btn-primary">Sewa</a>';
                          }else{
                            echo '<button class="btn btn-danger" disabled>Sewa</button>';
                            echo '<br>';
                            echo '<small class="text-warning">Anda Harus login terlebih dahulu !</small>';
                          }
                      
                      ?>
                    </div>
                  </div>
                  </div>
                <?php } ?> 
              </div>
            </div>
            
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="row">
                <?php  
                  $productByType = $this->db->get_where('products', ['type'=>'Honda'])->result_array();
                ?>
                <?php foreach ($productByType as $pc) { ?>
                  <div class="col-md-4 mb-2">
                  <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="<?= base_url('assets/upload/'.$pc['image']) ?>" title="<?= $p['name'] ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?= $pc['name'] ?></h5>
                      <p class="card-text">Harga sewa : <?= $pc['price'] ?>/Hari</p>
                      <?php  

                          if ($data['username'] != null) {
                            echo '<a href="'.base_url('home/sewa/'.$pc['id']).'" class="btn btn-primary">Sewa</a>';
                          }else{
                            echo '<button class="btn btn-danger" disabled>Sewa</button>';
                            echo '<br>';
                            echo '<small class="text-warning">Anda Harus login terlebih dahulu !</small>';
                          }
                      
                      ?>
                    </div>
                  </div>
                  </div>
                <?php } ?> 
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <div class="row">
                <?php  
                  $productByType = $this->db->get_where('products', ['type'=>'Suzuki'])->result_array();
                ?>
                <?php foreach ($productByType as $pc) { ?>
                  <div class="col-md-4 mb-2">
                  <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="<?= base_url('assets/upload/'.$pc['image']) ?>" title="<?= $p['name'] ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?= $pc['name'] ?></h5>
                      <p class="card-text">Harga sewa : <?= $pc['price'] ?>/Hari</p>
                      <?php  

                          if ($data['username'] != null) {
                            echo '<a href="'.base_url('home/sewa/'.$pc['id']).'" class="btn btn-primary">Sewa</a>';
                          }else{
                            echo '<button class="btn btn-danger" disabled>Sewa</button>';
                            echo '<br>';
                            echo '<small class="text-warning">Anda Harus login terlebih dahulu !</small>';
                          }
                      
                      ?>
                    </div>
                  </div>
                  </div>
                <?php } ?> 
                </div>
            </div>
          </div>
        </div>
    </div>
</div>