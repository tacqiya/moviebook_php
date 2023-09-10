<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Movie Book</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#newNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="newNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active"><a class="nav-link" href="<?php echo base_url(); ?>"> Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> About </a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>main/movies"> Movies </a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>main/dashboard"> Dashboard </a></li>
                    <li class="nav-item"><button class="btn btn-secondary" onclick="logout();"> Logout </button></li>
                </ul>
            </div>
        </nav>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
        

        var server_path = '<?php echo base_url(); ?>main/';
        function logout()
        {
            $.ajax({
                type:'POST',
                url:server_path + 'logout',
                data:{},
                success:function(data){
                    console.log();
                    window.location = server_path;
                    
                }

            });
        }

        </script>