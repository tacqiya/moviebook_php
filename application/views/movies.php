<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/css/coreui.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            

            <?php foreach ($movies as $movie){ ?>
            <div class="card mr-2">
            <div class="card-body">
            <div style="display: inline-grid";>
                <img class="card-img-top" src="<?php echo base_url(); ?>/images/<?php echo $movie['show_img']; ?>" alt="Card image cap" style="width:200px">
                <a class="btn btn-dark" href="https://youtu.be/EXeTwQWrcwY" target="_blank">Watch Trailer</a>
            </div>    
                <h4 class="card-title"><?php echo $movie['show_name']; ?></h4>
                <p class="card-text"><?php echo $movie['show_descr']; ?></p>
                <a href="<?php echo base_url(); ?>main/reservation/<?php echo $movie['show_id']; ?>" class="btn btn-dark">Book Seats</a>
            </div>
            </div>
            <?php } ?>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/js/coreui.min.js"></script>
    </body>

</html>

