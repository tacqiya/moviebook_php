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
            

            
            <div class="card mr-2">
            <div class="card-body">
            <div style="display: inline-grid";>
                <img class="card-img-top" src="<?php echo base_url(); ?>/images/<?php echo $film_detail->show_img; ?>" alt="Card image cap" style="width:200px">
                <button class="btn btn-dark">Watch Trailer</button>
            </div>    
                <h4 class="card-title"><?php echo $film_detail->show_name; ?></h4>
                <p class="card-text"><?php echo $film_detail->show_descr; ?></p>
            </div>
            </div>
        </div>

        <div class="container">
            <h4>Book your Show for <?php echo $film_detail->show_name; ?></h4>
            </div>
            <div class="container">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <label for="staticEmail" class="col-form-label mr-4">Select Theatre</label>
                        <select class="form-control" id="selectTheatre">
                    <?php foreach($theat_slots as $tslots) { ?>
                        <option>Select Theatre</option>
                            <option value="<?php echo $tslots['theat_id']; ?>"><?php echo $tslots['theatre_name']; ?></option>
                    <?php } ?>
                    </select>
                    </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label for="staticEmail" class="col-form-label mr-5">Pick Date</label>
                <input type="date" class="form-control" placeholder="Select Date" aria-label="Username" id="bookdate">
                
                <input type="hidden" class="form-control" placeholder="Select Date" aria-label="Username" id="showid" value="<?php echo $film_detail->show_id; ?>">
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label for="staticEmail" class="col-form-label mr-5">Pick Seats</label>
                <select class="form-control" id="noofseats" onchange="getval(this);">
                    <?php for($i=1;$i<=8;$i++) { ?>
                    <option><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label for="staticEmail" class="col-form-label mr-5">Amount</label>
                <!-- <input type="text" class="form-control" placeholder="Select Date" aria-label="Username" id="amount"> -->
                </div>
                <span id="amount" style="font-weight:bold;"></span>
            </div>

            <button type="button" class="btn btn-dark" onclick="ticketer();">Select Preferred Seats</button>

        </div>

        



        <script>

            var server_path = '<?php echo base_url(); ?>main/';
            
            function ticketer()
            {
                var theatre = $('#selectTheatre').val();
                var bdate = $('#bookdate').val();
                var seat = $('#noofseats').val();
                var show_id = $('#showid').val();
                var price = seat * 70;
                $.ajax({
                    type:'POST',
                    url:server_path + 'seatInsert',
                    data:{theatre:theatre,bdate:bdate,seat:seat,show_id:show_id,price:price},
                    success:function(data){
                        console.log();
                        window.location = server_path + 'seats';
                        
                    }

                });
            }


            function getval(sel)
            {
                var seat = $('#noofseats').val();
                var price = seat * 70;
                document.getElementById("amount").innerHTML = "Rs."+price;
            }
        


</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/js/coreui.min.js"></script>
    </body>

</html>