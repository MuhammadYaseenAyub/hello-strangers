
    <div class="wrapper">
        <section class="form login">
          <header>Hello Strangers</header>
          <form id="login_form" class="login_form_class" action="<?= base_url();?>/Home/login_action" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
              <label>Email Address</label>
              <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter your password" required>
              <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
              <input type="submit" name="submit" value="Continue to Chat">
            </div>
          </form>
          <div class="link">Not yet signed up? <a href="<?= base_url();?>/Home/index">Sign up now</a></div>
        </section>
      </div>
    
      <!--script src="<-?php echo base_url();?>/assets/js/show-hide-pass.js"></script>
      <!--script src="<-?php echo base_url();?>/assets/js/login.js"></script--->


<!--/body>
</html-->