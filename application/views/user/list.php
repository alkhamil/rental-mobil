
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
                      <th>Username</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Created At</th>
                      <th>Approve Admin</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($user as $u) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $u['username'] ?></td>
                      <td><?php echo sha1($u['password']) ?></td>
                      <td><?php echo $u['role'] ?></td>
                      <td><?php echo date("Y-m-d H:i:s", $u['created_at'])?></td>
                      <td>
                        <?php  
                        
                          if ($u['role'] == 'admin') {
                            echo '<a href="#" class="btn btn-danger btn-sm disabled">Is Admin</a>';
                          }else{
                            echo '<form method="post" action="'.base_url('user/approve/'.$u['id']).'">
                                    <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                  </form>';
                          }
                        
                        ?>

                        
                      </td>
                    </tr>
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