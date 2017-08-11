<?php
    session_start();
    function get_site_url()
    {
        if ($_SERVER['HTTP_HOST'] == "localhost") {
            if (!defined('SITEURL')) {
                define('SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
            }
            if (!defined('SITEPATH')) {
                define('SITEPATH', $_SERVER['DOCUMENT_ROOT']);
            }
        } else {
            if (!defined('SITEURL')) {
                define('SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
            }
            if (!defined('SITEPATH')) {
                define('SITEPATH', $_SERVER['DOCUMENT_ROOT']);
            }
        }


        return SITEURL . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1);
    }

    if (isset($_POST['survey']) && !empty($_POST['survey'])) {
        
        foreach ($_POST['survey'] as $survey) {
            if ($survey === 'yes') {
                exit;
            }

        }
    } else {
            header('Location: ' . get_site_url());
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Payment Form</title>
    <link rel="stylesheet" href="css/bootstrap-min.css">
    <link rel="stylesheet" href="css/bootstrap-formhelpers-min.css" media="screen">
    <link rel="stylesheet" href="css/bootstrapValidator-min.css"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/bootstrap-side-notes.css"/>
    <style type="text/css">
        .col-centered {
            display: inline-block;
            float: none;
            text-align: left;
            margin-right: -4px;
        }

        .row-centered {
            margin-left: 9px;
            margin-right: 9px;
        }
    </style>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap-min.js"></script>
    <script src="js/bootstrap-formhelpers-min.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator-min.js"></script>

</head>
<body>
<form action="<?php echo get_site_url(); ?>capture.php" method="POST" id="payment-form" class="form-horizontal">
    <div class="row row-centered">
        <div class="col-md-4 col-md-offset-4">
            <div class="page-header">
                <h2 class="gdfg">Upsell page buy promotional package</h2>
            </div>

            <fieldset>
                <!-- Form Name -->
                <legend>Upsell Page</legend>
                <!-- Street -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="textinput" style="text-align: left;">Do you want to buy
                        this promotional product ? </label>
                    <div class="col-sm-6">
                        <label class="control-label">
                            Yes
                            <input type="radio" name="promotional" checked value="yes" class="address">
                        </label>

                        <label class="control-label">
                            No
                            <input type="radio" name="promotional" value="no" class="address">
                        </label>

                    </div>
                </div>
                <input type="hidden" name="promotion_amount" value="2000">
            </fieldset>
            <!-- Submit -->
            <div class="control-group">
                <div class="controls">
                    <center>
                        <button class="btn btn-success" type="submit">Finish Order</button>
                    </center>
                </div>
            </div>
        </div>
</form>
</body>
</html>
