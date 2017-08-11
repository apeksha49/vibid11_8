<?php


session_destroy();
//require __DIR__.'/phpmailer/PHPMailerAutoload.php';
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


    //return SITEURL . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1);
    return 'http://tryvitalsleep.com/';
}
if(array_key_exists('charged', $_SESSION) &&  $_SESSION['charged'] === true){
    header('Location:'.get_site_url().'/thank-you.php');
}

if (isset($_SESSION['post_data']) && empty($_SESSION['post_data']) && !isset($_POST['extra'])) {
    header('Location: ' . get_site_url() . 'order-form.php');
    exit;
}

require 'lib/Stripe.php';

Stripe::setApiKey("sk_live_3wG6INdNMsyreFAaxCg50Vw4");

$amount = $_SESSION['post_data']['amount'] * 100;
if (isset($_POST['promotional']) && $_POST['promotional'] == 'yes') {
    $amount = $amount + $_POST['promotion_amount'];
}

function customer_exists($email)
{
    $all = Stripe_Customer::all();
    foreach ($all->data as $customer) {
        if ($email == $customer->email) {
            return $customer->id;
        }
    }

}

$charge_meta = array();
if ($_SESSION['post_data']['not_set1']) {
    $charge_meta['Product1Size'] = $_SESSION['post_data']['not_set1'];
}

if (isset($_POST['extra']) && $_POST['extra'] == 'yes') {
    $charge_meta['Product2Size'] = $_POST['not_set2'];
}

$new = false;
if (!($customer_id = customer_exists($_SESSION['post_data']['email']))) {
    try {
        $customer_obj = Stripe_Customer::create(array(
            "description" => "Customer for " . $_SESSION['post_data']['email'],
            "card" => $_SESSION['post_data']['stripeToken'],
            "email" => $_SESSION['post_data']['email'],
            "metadata" => array('Name' => $_SESSION['post_data']['name'])
        ));
        $new = true;
        $customer_id = $customer_obj->id;
    } catch (Exception $e) {
        header('Location: ' . get_site_url() . 'order-form.php');
    }


}
try {

    if ($new) {
        Stripe_Charge::create(array(
            "amount" => $amount,
            "currency" => "usd",
            "capture" => true,
            "customer" => $customer_id,
            "description" => $_SESSION['post_data']['email'],
            "metadata" => $charge_meta

        ));
    } else {
        Stripe_Charge::create(array(
            "amount" => $amount,
            "currency" => "usd",
            "capture" => true,
            "card" => $_SESSION['post_data']['stripeToken'],
            "description" => $_SESSION['post_data']['email'],
            "metadata" => $charge_meta
        ));
    }

    $_SESSION['charged'] = true;

} catch (Exception $e) {
    header('Location: ' . get_site_url() . 'order-form.php');

}

try {
    if (isset($_POST['extra']) && $_POST['extra'] == 'yes') {
        if(array_key_exists('extra-prod',$_SESSION['post_data'])){
            Stripe_Subscription::create(array(
                'customer' => $customer_id,
                'plan' => 'new-plan-s2-2'
            ));
        }else{
            Stripe_Subscription::create(array(
                'customer' => $customer_id,
                'plan' => 'new-plan-s1-2'
            ));
        }

    } else {
        if(array_key_exists('extra-prod',$_SESSION['post_data'])){
            Stripe_Subscription::create(array(
                'customer' => $customer_id,
                'plan' => 'new-plan-s2-1'
            ));
        }else{
            Stripe_Subscription::create(array(
                'customer' => $customer_id,
                'plan' => 'new-plan-s1-1'
            ));
        }

    }
} catch (Exception $e) {
    header('Location: ' . get_site_url() . 'order-form.php');

}


$_SESSION['post_data']['new_post_data'] = $_POST;


if(!isset($_SESSION['current_order_send']) || ($_SESSION['current_order_send']) == false){
    try{
        require_once __DIR__.'/add_order_to_shipstation.php';
    }catch (Exception $e){

    }

}


header('Location: ' . get_site_url() . 'thank-you.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Payment Form</title>
<link rel='icon' type='image/ico' href='favicon1.ico' />
    <link rel="stylesheet" href="css/bootstrap-min.css">
    <link rel="stylesheet" href="css/bootstrap-formhelpers-min.css" media="screen">
    <link rel="stylesheet" href="css/bootstrapValidator-min.css"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/bootstrap-side-notes.css"/>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap-min.js"></script>
    <script src="js/bootstrap-formhelpers-min.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator-min.js"></script>

</head>
<body>
<?php


?>
<div class="row row-centered">
    <div class="col-md-4 col-md-offset-4">
        <div class="page-header">
            <h2 class="gdfg">Process Complete</h2>
        </div>
    </div>
</div>

</body>
</html>
