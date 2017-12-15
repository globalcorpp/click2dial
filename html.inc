<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="icon" type="image/ico" href="images/tabLogo.ico" />
        <script src="js/jquery-1.8.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <!--<div>-->
        <h2><?php echo $heading; ?></h2>
        <div class="container">
            <div class="header">
                <img src="images/logo.png" />
                <h2>سامانه تماس ایزابل</h2>
            </div><!-- header -->



            <div class="content">
                <form>
                    <script type="text/javascript">
                        (function () {
                            var po = document.createElement('script');
                            po.type = 'text/javascript';
                            po.async = true;
                            po.src = 'js/plusone.js';
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(po, s);
                        })();
                    </script>

                    <p>
                        <?php if (!isset($pre)) { ?>
                            <pre>
                                <?php print_r($content); ?>
                            </pre>
                        <?php } else { ?>
                            <?php print_r($content); ?>
                        <?php } ?>
                    </p>
            </div>
            <div class="push"></div>
        </div>
        </form>
        <!--</div> content-->     
        <div class="footer">
            Powered by <a href="https://github.com/globalcorpp/" target="blank">GlobalCorp</a>
        </div><!-- footer -->
    </body>
</html>