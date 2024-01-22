 <div class="container-fluid vh-100 login-container">
     <div class="row justify-content-center align-items-center vh-100">
         <div class="col-md-4 col-sm-6 login-form">
             <h1>Login</h1>
             <form id="loginForm">
                 <div class="form-group">
                     <label for="username">Username</label>
                     <input type="text" class="form-control" id="username" required> 
                 </div>
                 <div class="form-group">
                     <label for="passwordEl">Password</label>
                     <input type="password" class="form-control" id="passwordEl" required>
                 </div>
                 <input id="submitBtn" type="submit" class="btn btn-primary" value="Log In" >
             </form>
         </div>
         <div class="col-md-4 col-sm-6">
             <img class="login-icon" src="<?php echo base_url("assets/images/logo_login.png"); ?>" alt="logo_login">
         </div>

     </div>
 </div> 