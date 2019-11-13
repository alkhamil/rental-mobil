
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><?= $title ?></h1>
    </div>
  </div>
    <?php 
        if ($this->session->flashdata('sukses')) {
            $sukses = $this->session->flashdata('sukses');
            echo $sukses;
        }
    ?>
    <div class="row">
      <div class="col-md-12">
      <a class="btn btn-primary btn-md" href="<?= base_url('product/add') ?>">Tambah Product</a>
        <div class="tile mt-2">
          <div class="tile-body">
            <div class="card">
              <div class="card-header">
                <?php echo $title ?>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="myTable" class="table table-sm table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Type</th>
                      <th>Number</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Created At</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($product as $p) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?= $p['name'] ?></td>
                      <td><img class="img-thumbnail" style="width : 150px; height: 100px;" src="<?= base_url('assets/upload/') . $p['image'] ?>"></td>
                      <td><?= $p['type'] ?></td>
                      <td><?= $p['number'] ?></td>
                      <td><?= $p['qty'] ?></td>
                      <td><?= $p['price'] ?></td>
                      <td><?= date("Y-m-d H:i:s", $p['created_at']) ?></td>
                      <th>
                        <div class="input-group">
                        <div class="input-group-append">
                          <button type="button" class="btn btn-outline-secondary">Action</button>
                          <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url('product/update/'.$p['id']) ?>">Edit</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#hapus<?php echo $p['id'] ?>" href="#">Hapus</a>
                          </div>
                        </div>
                        </div>
                      </th>
                    </tr>
                    <?php include 'delete.php' ?>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>