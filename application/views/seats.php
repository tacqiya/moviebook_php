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
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <?php foreach($seat_slots as $seat) { ?>
    <button type="button" class="btn btn-dark mr-2"><?php echo $seat['seat_row'].$seat['seat_no']; ?></button>
    <?php } ?>
  </div>
</div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/js/coreui.min.js"></script>
    </body>

</html>