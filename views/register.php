<html>
 
<head>
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
  <title>Sign Up</title>
<style type="text/css">
     
    body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    div.error {
        margin-bottom: 15px;
        margin-top: -6px;
        margin-left: 58px;
        color: red;
    }
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 620px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
     
    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
     
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
     
    form.form1 {
        padding-top: 40px;
    }
     
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
     
    
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
         
    }
     
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
     
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 15px;
    }
     
    button {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
     
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
         
 
 
</style>
<body>
  <div class="main">
    <p class="sign" align="center">Sign Up</p>
    <form action="post_register" method="post" id="register" accept-charset="utf-8">
      <input class="un " type="text" align="center" name="first_name" placeholder="first name" required>
      <?php echo form_error('first_name'); ?>   
 
      <input class="un " type="text" align="center" name="last_name" placeholder="last name" required>
      <?php echo form_error('last_name'); ?>  
 
      <input class="un " type="text" align="center" name="contact_no" placeholder="contact number" maxlength="10" required>
      <?php echo form_error('contact_no'); ?> 
 
      <input class="un " type="text" align="center" name="email" placeholder="email" required>
      <?php echo form_error('email'); ?> 
 
      <input class="pass" type="password" align="center" name="password" placeholder="Password" required>
      <?php echo form_error('password'); ?> 
      <button type="submit" align="center" class="submit register-submit">Sign Up</button>
      <p class="signup" align="center"><a href = "<?php echo base_url('auth/') ?>" >Sign In</a></p>
     </form>                
    </div>
</body>
</html>