<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/css/coreui.min.css">
    </head>

    <body>
    <div>
      <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
      include('includes/header.php'); 
      }
      else
      {
      include('includes/loggedout_header.php');
      }
      ?>

    
    <div class="container">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img width="800" height="400" class="card-img-top" src="<?php echo base_url(); ?>/images/the11v.jpg" alt="Card image cap">

        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
      <img width="800" height="400" class="card-img-top" src="<?php echo base_url(); ?>/images/cod.jpg" alt="Card image cap">

        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
      <img width="800" height="400" class="card-img-top" src="<?php echo base_url(); ?>/images/the11v.jpg" alt="Card image cap">

        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="container mt-5" style="display: flex">
            
        
            <?php foreach ($movies as $movie){ ?>
            <div class="card mr-3 ml-3" style="display: flex;width:15rem">
            <div class="card-body">
            <div style="display: inline-grid";>
                <img class="card-img-top" src="<?php echo base_url(); ?>/images/<?php echo $movie['show_img']; ?>" alt="Card image cap" style="width:200px">
                <button class="btn btn-dark">Watch Trailer</button>
            </div>    
                <h4 class="card-title"><?php echo $movie['show_name']; ?></h4>
                <p class="card-text"><?php echo $movie['show_descr']; ?></p>
                <a href="<?php echo base_url(); ?>main/<?php echo $movie['show_id']; ?>" class="btn btn-dark">Book Seats</a>
            </div>
            </div>
            <?php } ?>
        </div>





        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/js/coreui.min.js"></script>
    </body>

</html>