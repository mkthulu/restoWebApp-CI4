<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login V10</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="/login/vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="/login/vendor/css-hamburgers/hamburgers.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="/login/vendor/animsition/css/animsition.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="/login/vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="/login/vendor/daterangepicker/daterangepicker.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/css/util.css" />
    <link rel="stylesheet" type="text/css" href="/login/css/main.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    

      
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
        
            <span class="login100-form-title p-b-51"> Sugeng Rawuh </span>

            <div
              class="wrap-input100 validate-input m-b-16"
              data-validate="Username is required"
            >
              <input
                class="input100 username"
                type="text"
                name="username"
                placeholder="Username"

              />
              <span class="focus-input100"></span>
            </div>

            <div
              class="wrap-input100 validate-input m-b-16"
              data-validate="No Meja is required"
            >
              <input
                class="input100 nomeja"
                type="number"
                name="nomeja"
                placeholder="Nomer Meja"
              />
              <span class="focus-input100"></span>
            </div>

        

            <div class="container-login100-form-btn m-t-17">
              <button type="buton" class="login100-form-btn click">Pilih Menu Anda <i class="fas fa-arrow-right" style="margin-left: 10px;"></i></button>
             
            </div>
          
        </div>
      </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/bootstrap/js/popper.js"></script>
    <script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/login/js/main.js"></script>
    <script>
        let btn = document.querySelector('.click');
       
            
            btn.addEventListener('click', () => {
                
                if(document.querySelector('.username').value !== '' && document.querySelector('.nomeja').value !== ''){

                    localStorage.setItem('username',document.querySelector('.username').value);
                    localStorage.setItem('nomeja',document.querySelector('.nomeja').value);
                    location.href = '<?php echo base_url('user-watch'); ?>';
                   
                }
            })
        
    </script>
 
  </body>
</html>
