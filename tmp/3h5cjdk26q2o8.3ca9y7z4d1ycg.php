<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Hendro Steven">
    <title>Contact Us | FlatFree Framework</title>
    <link href="<?php echo $BASE; ?>/ui/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $BASE; ?>/ui/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $BASE; ?>/ui/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo $BASE; ?>/ui/css/animate.css" rel="stylesheet">
    <link href="<?php echo $BASE; ?>/ui/css/main.css" rel="stylesheet">
    <link href="<?php echo $BASE; ?>/ui/css/sweetalert.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<!--/head-->

<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $BASE; ?>/"><img src="<?php echo $BASE; ?>/ui/images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $BASE; ?>/">Home</a></li>
                    <li><a href="<?php echo $BASE; ?>/contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!--/header-->

    <section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-8">
                <h4>Contact Form</h4>
                <div class="status alert alert-success" style="display: none"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" id="name" class="form-control" required="required" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" class="form-control" required="required" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <a id="btnSend" class="btn btn-primary btn-lg">Send Message</a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <textarea name="comments" id="comments" required="required" class="form-control" rows="6" placeholder="Comments"></textarea>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--/#contact-page-->

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a href="http://github.com/hendrosteven" target="_blank">Hendro Steven</a> | Themes by <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?php echo $BASE; ?>/">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="<?php echo $BASE; ?>/contact">Contact Us</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li>
                        <!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script src="<?php echo $BASE; ?>/ui/js/jquery.js"></script>
    <script src="<?php echo $BASE; ?>/ui/js/bootstrap.min.js"></script>
    <script src="<?php echo $BASE; ?>/ui/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo $BASE; ?>/ui/js/main.js"></script>
    <script src="<?php echo $BASE; ?>/ui/js/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('#btnSend').click(function() {
            var _email = $('#email').val();
            var _name = $('#name').val();
            var _comments = $('#comments').val();
            $.post('<?php echo $BASE; ?>/contact/save', {
                name: _name,
                email: _email,
                comments: _comments
            }, function(out) {
                var result = $.parseJSON(out);
                if (!result['status']) {
                    var msg = "";
                    $.each(result['errors'], function(i, obj) {
                        msg += obj + ' \n\n';
                    });
                    swal("Upps, please fix this error(s)", msg, "error");
                } else {
                    swal("Thank You!", result['message'], "success")
                    $('#name').val('');
                    $('#email').val('');
                    $('#comments').val('');
                }
            });
        });

    </script>
</body>

</html>
