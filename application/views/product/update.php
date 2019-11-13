
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
                  <?php echo form_open_multipart(base_url('product/update/'.$product['id']));?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>">
                                <small class="text-danger"><?= form_error('name') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <br>
                                <img src="<?= base_url('assets/upload/'.$product['image']) ?>" class="img-thumbnail">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" cols="20" rows="5"><?= $product['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <?php  
                                        switch ($product['type']) {
                                            case 'Toyota':
                                                echo '<option value="Toyota" selected>Toyota</option>';
                                                echo '<option value="Honda">Honda</option>';
                                                echo '<option value="Suzuki">Suzuki</option>';
                                                break;
                                            case 'Honda':
                                                echo '<option value="Toyota">Toyota</option>';
                                                echo '<option value="Honda" selected>Honda</option>';
                                                echo '<option value="Suzuki">Suzuki</option>';
                                                break;
                                            case 'Suzuki':
                                                echo '<option value="Toyota">Toyota</option>';
                                                echo '<option value="Honda">Honda</option>';
                                                echo '<option value="Suzuki" selected>Suzuki</option>';
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input type="text" placeholder="F 1234 GH" name="number" class="form-control" value="<?= $product['number'] ?>">
                                <small class="text-danger"><?= form_error('number') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="text" name="qty" class="form-control" value="<?= $product['qty'] ?>"
                                <small class="text-danger"><?= form_error('qty') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="<?= $product['price'] ?>">
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