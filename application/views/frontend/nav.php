<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">

  <a class="navbar-brand" href="#">KELOMPOK V</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php 
        if ($this->session->userdata('username')) {
          echo '<i class="nav-link text-danger">'.$this->session->userdata('username').' |</i>';
          echo '<a href="'.base_url("auth/logout/".$data['role']).'" class="nav-link active">Logout</a>';   
        }else{
          echo '<a href="'.base_url("auth/login").'" class="nav-link active">Login</a>';
        }
      ?>
      
    </ul>
  </div>
  
  </div>
</nav>