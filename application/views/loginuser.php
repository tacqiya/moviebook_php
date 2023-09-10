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
            <div class="row">
                <div class="col-9">
                    <div class="input-group mb-3 mt-5 ml-5">
                        <div class="input-group-prepend">
                        <input type="text" class="form-control mr-3" placeholder="Username" aria-label="Username" id="logusername">
                        <input type="password" class="form-control" placeholder="Password" aria-label="Name" id="pwd">
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark ml-5" onclick="login();">Login</button>
                </div>
                <div class="col-2">
                    <h4>Register</h4>
                    <div class="form-group  mb-3">
                    <div class="input-group-prepend">
                        <select class="form-control" id="selectrole">
                        <option>Customer</option>
                        <option>Owner</option>
                        </select>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" id="username">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name" id="name">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <input type="email" class="form-control" placeholder="Email" id="email">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <input type="password" class="form-control" placeholder="Password" aria-label="Name" id="regpwd">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Name" id="conpwd">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="Theatre" id="theatre">
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark" onclick="register();">Register</button>

                    </div>
                </div>
            </div>


        </div>

    

    <script>
        var server_path = '<?php echo base_url(); ?>main/';
        function register()
        {
            var role = $('#selectrole').val();
            var uname = $('#username').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var theatre = $('#theatre').val();
            var pwd = $('#regpwd').val();

            $.ajax({
                type:'POST',
                url:server_path + 'registerdata',
                data:{role:role,uname:uname,name:name,email:email,theatre:theatre,pwd:pwd},
                success:function(data){
                    console.log();
                }

            });
        }

        function login()
        {
            var uname = $('#logusername').val();
            var pwd = $('#pwd').val();

            $.ajax({
                type:'POST',
                url:server_path + 'logindata',
                data:{uname:uname,pwd:pwd},
                success:function(data){
                    console.log();
                    if(data=='CustomerSuccess')
                    {
                        window.location = server_path + 'movies';
                    }
                    else if(data=='AdminSuccess')
                    {
                        window.location = server_path + 'dashboard';
                    }
                }

            });
        }

    </script>
        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/js/coreui.min.js"></script>
    </body>

</html>