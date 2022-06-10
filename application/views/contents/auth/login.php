<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/assets/images/favicon_1.ico">

        <title>Ubold - Responsive Admin Dashboard Template</title>

        <link href="<?php echo base_url() ?>assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url() ?>assets/assets/js/jquery.min.js"></script>
        <link href="<?php echo base_url() ?>assets/assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>assets/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="<?php echo base_url() ?>assets/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> Sign In to <strong class="text-custom">UBold</strong> </h3>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?php echo base_url('auth/login') ?>">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="username" type="text" required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button id="btn-submit" class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            </form> 
            
            </div>   
            </div>                              
                <div class="row">
            	<div class="col-sm-12 text-center">
            		<p>Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        
                    </div>
            </div>
            
        </div>
        
        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url() ?>assets/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/detect.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/waves.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/wow.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/jquery.scrollTo.min.js"></script>


        <script src="<?php echo base_url() ?>assets/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/js/jquery.app.js"></script>

         <!-- Sweet-Alert  -->
        <script src="<?php echo base_url() ?>assets/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script>
            $(document).ready(function() {
                $(document).on('submit', 'form', function(event) {
                    event.preventDefault();
                    const btn = $('#btn-submit')
                    if (btn.hasClass('disabled')) {
                        return false
                    }
                    const data = $(this).serialize()
                    const that = $(this)
                    $.ajax({
                        url: that.attr('action'),
                        type: 'POST',
                        dataType: 'JSON',
                        data: data,
                        beforeSend : function(){
                            btn.text('Logging ....')
                            btn.addClass('disabled')
                        },
                        success : function(data){
                            if (!data.status) {
                                swal({
                                  icon: 'error',
                                  title: 'Error',
                                  text: data.message,
                                  type: "error",
                                  confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',

                                })        
                            }else{
                                swal({
                                    title: "Success!",
                                    text: "Success Login !!",
                                    type: "success",
                                    confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                                }, function(res){
                                    if (res) {
                                        window.location = '<?php echo base_url() ?>auth'
                                    }
                                })
                            }

                        }
                    })
                    .fail(function() {
                        swal({
                          text: 'Something happens please contact administrator!!',
                          icon: 'error',
                          title: 'Oops...',
                          type: "error",
                          confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                        })
                    })            
                    .always(function() {
                        btn.text('Sign In')
                        btn.removeClass('disabled')
                    });

                });
            });
        </script>
	</body>
</html>