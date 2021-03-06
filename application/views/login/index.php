<?=form_open('login/proses_login');?>
<div class="container py-lg-5 border-0">
    <div class="row py-lg-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- form card login -->
                    <div class="alert alert-info border-0 text-center" role="alert">
                        <?php 
                            if(isset($pesan)){
                                echo $pesan;
                            }
                            else{
                                echo "Please insert your username and password!";
                            }
                        ?>
                    </div>
                    <div class="card rounded-6 border-0">
                        <div class="card-header bg-dark text-center">
                            <h3 class="mb-0" style="color:white;">Login</h3>
                        </div>
                        <div class="card-body" style="background-color: #585858; color: #adadad;">
                            <form action="form" role="form" autocomplete="off" id="formlogin" novalidate="" method="POST">
                                <div class="form-group border-0">
                                    <label for="uname1">Username</label>
                                    <input type="text" name="uname1" class="form-control form-control-lg rounded-8 border-0" style="color: #adadad; background-color: #6b6b6b;" id="uname1" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group border-0">
                                    <label for="pwd1">Password</label>
                                    <input type="password" name="pwd1" id="pwd1" class="form-control form-control-lg rounded-8 border-0" style="color: #adadad; background-color: #6b6b6b;" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-lg d-flex justify-content-center" id="btnLogin">Login</button>
                                </div>
                            </form>
                        </div>
                        <!-- card block -->
                    </div>
                    <!-- form card login -->
                    <!-- cek pesan -->

                </div>
            </div>
            <!-- row -->
        </div>
        <!-- col -->
    </div>
    <!-- row -->
</div>
<!-- container -->

<?= form_close();?>