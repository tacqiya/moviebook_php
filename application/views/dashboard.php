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
      echo "Please Login User";exit;
      }
      ?>
    </div>
    
    <div class="container">

    
    <h3>Welcome <?php echo $details->name; ?></h3>
    </div><br/>
    <div class="container">    

    <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Create new Show
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <input type="text" class="form-control mr-3" placeholder="Show Name" aria-label="Username" id="showname">
                <textarea class="form-control mr-3" rows="3" cols="60" placeholder="Show Details" id="showdet"></textarea>
                <input type="number" class="form-control mr-3" placeholder="Ticket Price" aria-label="Username" id="price">
            </div>
        </div>
        <button type="button" class="btn btn-dark" onclick="movieInsert();">Add Movie</button>

       

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Create new seat slot for your show
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <select class="form-control" id="selectmovie">
            <?php foreach($movie_slots as $slots) { ?>
                        <option><?php echo $slots['show_name']; ?></option>
            <?php } ?>
            </select>
            </div>
        </div>
        <button type="button" class="btn btn-dark" onclick="movieInsert();">Add Movie</button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Delete
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <select class="form-control mr-3" id="removemovie">
            <?php foreach($movie_slots as $slots) { ?>
                <option><?php echo $slots['show_name']; ?></option>
            <?php } ?>
            </select>
            <button type="button" class="btn btn-dark" onclick="removeMovie();">Remove Show</button>
            </div>
            </div>
      </div>
    </div>
  </div>
</div>

</div>


    <script>

        var server_path = '<?php echo base_url(); ?>main/';
        function movieInsert()
        {
            var sname = $('#showname').val();
            var sdet = $('#showdet').val();
            var price = $('#price').val();

            $.ajax({
                type:'POST',
                url:server_path + 'movieInsert',
                data:{sname:sname,sdet:sdet,price:price},
                success:function(data){
                    console.log();
                    window.location = server_path + 'dashboard';
                    
                }

            });
        }
        
        function removeMovie()
        {
            var movie = $('#removemovie').val();

            $.ajax({
                type:'POST',
                url:server_path + 'removemovie',
                data:{movie:movie},
                success:function(data){
                    console.log();
                    window.location.reload();
                    
                }

            });
        }


    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/js/coreui.min.js"></script>
    </body>

</html>