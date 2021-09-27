
    <div class="wrapper">
        <section class="form signup">
          <header>Hello Strangers</header>
          <form id="sign_up_form" class="sign_up_form_class" action="<?= base_url();?>/Home/sign_up_action" method="POST" enctype="multipart/form-data" autocomplete="off"><!--method='POST' action='<1?= base_url();?>/Home/sign_up_action'--->
            <div class="error-text"></div>
            <div class="name-details">
              <div class="field input">
                <label>First Name</label>
                <input type="text" name="user_fname" placeholder="First name" required>
              </div>
              <div class="field input">
                <label>Last Name</label>
                <input type="text" name="user_lname" placeholder="Last name" required>
              </div>
            </div>
            <div class="field input">
              <label>Email Address</label>
              <input type="text" name="user_email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
              <label>Password</label>
              <input type="password" name="user_password" placeholder="Enter new password" required>
              <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
              <label>Select Image</label>
              <input type="file" name="user_image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
              <input type="submit" name="submit" value="Continue to Chat">
            </div>
          </form>
          <div class="link">Already signed up? <a href="<?= base_url()?>/Home/login">Login now</a></div>
        </section>
      </div>
