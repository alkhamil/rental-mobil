
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><?= $title ?></h1>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile mt-2">
          <div class="tile-body">
                  <!-- <?php echo $error ?> -->
                  <?php echo form_open_multipart('product/add');?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>">
                                <small class="text-danger"><?= form_error('name') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <small class="text-danger"><?= form_error('image') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" cols="20" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="Toyota">Toyota</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Suzuki">Suzuki</option>
                                </select>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label>Number</label>
                                <input type="text" placeholder="F 1234 GH" name="number" class="form-control">
                                <small class="text-danger"><?= form_error('number') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="text" name="qty" class="form-control">
                                <small class="text-danger"><?= form_error('qty') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control">
                                <small class="text-danger"><?= form_error('price') ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Data</button>
                        </div>
                    </div>
                <?php echo form_close() ?>
          </div>
        </div>
      </div>
    </div>
</main>