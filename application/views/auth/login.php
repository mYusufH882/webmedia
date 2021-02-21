<?php $this->load->view('templates/header'); ?>
<body class="bg-info">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-5">
                      <div class="card shadow-lg border-0 rounded-lg mt-5 mb-3">
                            <div class="card-header">
                              <h3 class="text-center font-weight-light my-4"><?php echo lang('login_heading');?> Administrator</h3>
                            </div>
                            <div class="card-body">
                              <?php if($message): ?>
                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                  <strong><?php echo $message;?></strong>
                                </div>
                              <?php endif; ?>
                              <?= $this->session->flashdata('msg'); ?>
                              <?php echo form_open("auth/login");?>
                                  <div class="form-group">
                                    <label><?php echo lang('login_identity_label', 'identity','class = small mb-1');?></label>
                                    <?php echo form_input($identity,'','class = "form-control py-4" placeholder = "Enter Email Address" ');?>
                                  </div>
                                  <div class="form-group">
                                    <label><?php echo lang('login_password_label', 'password','class = small mb-1');?></label>
                                    <?php echo form_input($password,'','class = "form-control py-4" placeholder = "Enter Password"');?>
                                  </div>
                                  <div class="fomr-group">
                                    <?php echo form_submit('submit', lang('login_submit_btn'),'class ="mt-4 btn btn-block btn-primary"');?>
                                  </div>
                                  <?php echo form_close();?>
                                  <!-- <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                    <a class="small" href="forgot_password"><?//php echo lang('login_forgot_password');?></a>
                                  </div> -->
                            </div>
                            <div class="card-footer text-center">
                                <div class="small">
                                  Copyright &copy; <?= appname; ?> <?= date('Y'); ?>
                                </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
        </main>
    </div>
  </div>
<?php $this->load->view('templates/footer'); ?>
