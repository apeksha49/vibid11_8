<?php


session_start();


if (!isset($_SESSION['email_send']) && isset($_SESSION['post_data'])) {

    require __DIR__ . '/smarty-master/libs/SmartyBC.class.php';
    require_once __DIR__ . '/phpmailer/PHPMailerAutoload.php';

    $new_smarty = new SmartyBC();


    // Send Email To customer

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'gator4148.hostgator.com';  // Specify main and backup SMTP servers

    $mail->SMTPAuth = true;                               // Enable SMTP authentication

    $mail->Username = 'info@tryvitalsleep.com';                 // SMTP username

    $mail->Password = '(L!{]cU=d#G2';                           // SMTP password

    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted

    $mail->Port = 465;                                    // TCP port to connect to
    $mail->isHTML(true);

    $mail->setFrom('info@tryvitalsleep.com', 'Vital Sleep ');

    $mail->addAddress($_SESSION['post_data']['email']);


    $mail->Subject='Thank you for your order';

    $mail->Body=$new_smarty->fetch('client_email_template.tpl');

    //$mail->SMTPDebug = 2;


    if (!$mail->send()) {


    } else {


        $mail2 = new PHPMailer();

        $mail2->isSMTP();
        $mail2->isHTML(true);
        $mail2->Host = 'gator4148.hostgator.com';  // Specify main and backup SMTP servers

        $mail2->SMTPAuth = true;                               // Enable SMTP authentication

        $mail2->Username = 'info@tryvitalsleep.com';                 // SMTP username

        $mail2->Password = '(L!{]cU=d#G2';                           // SMTP password

        $mail2->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted

        $mail2->Port = 465;                                    // TCP port to connect to


        $mail2->setFrom('info@tryvitalsleep.com', 'Vital Sleep New Order');

        $mail2->addAddress('info@vitalsleep.com');


        $mail2->Subject='There is a new order from ' . $_SESSION['post_data']['name'];

        $mail2->Body=$new_smarty->fetch('admin_email_template.tpl');


        if (!$mail2->send()) {


        } else {


            $_SESSION['email_send'] = true;


        }

    }


    if (isset($_SESSION['post_data'])) {

        require_once __DIR__ . '/add_user_to_list.php';

    }


}


?>

<!DOCTYPE html>

<html lang="en"

      class="clickfunnels-com bgCover wf-proximanova-i4-active wf-proximanova-i7-active wf-proximanova-n4-active wf-proximanova-n7-active wf-active wf-proximanova-i3-active wf-proximanova-n3-active wf-proximanovasoft-n4-active wf-proximanovasoft-n7-active"

      style="overflow: initial; background-color: rgb(248, 249, 251);">

<head data-next-url="" data-this-url="https://info359.clickfunnels.com/thank-you-page9279542">

    <meta charset="UTF-8">

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">

    <meta content="utf-8" http-equiv="encoding">

    <meta name="viewport" content="initial-scale=1">

    <title>Thank You For Your Order!</title>

    <meta class="metaTagTop" name="description" content="Vital Sleep Order Confirmation Page ">

    <meta class="metaTagTop" name="keywords" content="">

    <meta class="metaTagTop" name="author" content="Alex ">

    <meta class="metaTagTop" property="og:image" content="" id="social-image">

    <meta property="og:title" content="Thank You For Your Order!">

    <meta property="og:description" content="Vital Sleep Order Confirmation Page ">

    <meta property="og:url" content="https://info359.clickfunnels.com/thank-you-page9279542">

    <meta property="og:type" content="website">

    <link rel="stylesheet" media="screen" href="https://www.clickfunnels.com/assets/lander.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <link

            href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7COswald:400,700%7CDroid+Sans:400,700%7CRoboto:400,700%7CLato:400,700%7CPT+Sans:400,700%7CSource+Sans+Pro:400,700%7CNoto+Sans:400,700%7CPT+Sans:400,700%7CUbuntu:400,700%7CBitter:400,700%7CPT+Serif:400,700%7CRokkitt:400,700%7CDroid+Serif:400,700%7CRaleway:400,700%7CInconsolata:400,700"

            rel="stylesheet" type="text/css">

    <script>(function (i, s, o, g, r, a, m) {

            i['GoogleAnalyticsObject'] = r;

            i[r] = i[r] || function () {

                    (i[r].q = i[r].q || []).push(arguments)

                }, i[r].l = 1 * new Date();

            a = s.createElement(o), m = s.getElementsByTagName(o)[0];

            a.async = 1;

            a.src = g;

            m.parentNode.insertBefore(a, m)

        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-51074959-1', 'auto', {'name': 'cftracker'});

        ga('cftracker.send', 'pageview', 'user-page');</script>

    <link rel='icon' type='image/ico' href='favicon1.ico' />


    <script type="text/javascript">

        var im_domain = 'whitecoatdigital';

        var im_project_id = 2;

        (function (e, t) {
            window._improvely = [];
            var n = e.getElementsByTagName("script")[0];
            var r = e.createElement("script");
            r.type = "text/javascript";
            r.src = "https://" + im_domain + ".iljmp.com/improvely.js";
            r.async = true;
            n.parentNode.insertBefore(r, n);
            if (typeof t.init == "undefined") {
                t.init = function (e, t) {
                    window._improvely.push(["init", e, t])
                };
                t.goal = function (e) {
                    window._improvely.push(["goal", e])
                };
                t.conversion = function (e) {
                    window._improvely.push(["conversion", e])
                };
                t.label = function (e) {
                    window._improvely.push(["label", e])
                }
            }
            window.improvely = t;
            t.init(im_domain, im_project_id)
        })(document, window.improvely || [])

    </script>

</head>

<body data-affiliate-param="affiliate_id">
<!--Start Conversion Fly Tracking Code--><img id="cfly" style="display: none;" src="https://conversionfly.com/wcd/a.php" alt="" width="1" height="1" /><script>// <![CDATA[
    document.getElementById("cfly").src=document.getElementById("cfly").src + "?tc=" + Math.random()* 100000000000000000000; ;(function(){ 'use strict'; var cfly = window._conversionflyMagic = window._conversionflyMagic || {}; cfly.redirectCallback = function redirectCallback(response) { if (response.redirect) { window.location.replace(response.redirectUrl); } }; var cflyUrl = 'https://conversionfly.com/wcd/urlcheckJson.php'; var callback = 'callback=_conversionflyMagic.redirectCallback'; var url = 'url=' + window.location.href; var script = document.createElement('script'); script.setAttribute('src', cflyUrl + '?' + callback + '&' + url); document.head.appendChild(script); return; }());
    // ]]></script><!--End Conversion Fly Tracking Code-->

<div class="containerWrapper">

    <input id="submit-form-action" value="redirect-url" data-url="#" data-ar-service="" data-ar-list="" data-webhook=""

           type="hidden">

    <div class="nodoHiddenFormFields hide">

        <input id="elHidden1" class="elInputHidden elInput" name="ad" type="hidden">

        <input id="elHidden2" class="elInputHidden elInput" name="tag" type="hidden">

        <input id="elHidden3" class="elInputHidden elInput" name="" type="hidden">

        <input id="elHidden4" class="elInputHidden elInput" name="" type="hidden">

        <input id="elHidden5" class="elInputHidden elInput" name="" type="hidden">

    </div>

    <div class="nodoCustomHTML hide"></div>

    <div class="modalBackdropWrapper" style="display: none; background-color: rgba(0, 0, 0, 0.4);"></div>

    <div

            class="container containerModal midContainer noTopMargin padding40-top padding40-bottom padding40H  noBorder borderSolid border3px cornersAll radius10 shadow0 bgNoRepeat emptySection modalMoveOver"

            id="modalPopup" data-title="Modal" data-block-color="0074C7"

            style="display: none; margin-top: 100px; padding-top: 40px; padding-bottom: 40px; outline: none; background-color: rgb(255, 255, 255);"

            data-trigger="none" data-animate="top" data-delay="0">

        <div class="containerInner ui-sortable"></div>

        <div class="closeLPModal"><img src="https://app1assets.clickfunnels.com/images/closemodal.png" alt=""></div>

    </div>

    <div

            class="container noTopMargin padding40-top padding40-bottom padding40H  border3px cornersAll radius0 shadow0 bgNoRepeat activeSection_topBorder activeSection_bottomBorder fullContainer borderLightBottom borderDashed emptySection activeSection_topBorder0 activeSection_bottomBorder2.22222"

            id="section--60592" data-title="Section" data-block-color="0074C7"

            style="padding-top: 10px; padding-bottom: 10px; border-color: rgb(235, 235, 235); outline: none; background-color: rgb(255, 255, 255);"

            data-trigger="none" data-animate="fade" data-delay="500">

        <div class="containerInner ui-sortable">

            <div style="margin-bottom: 0px; outline: none; margin-left: 40px; margin-right: 40px;"

                 class="row bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin innerToolsTop"

                 id="row--15184" data-trigger="none" data-animate="fade" data-delay="500" data-title="1 column row">

                <div style="outline: none;" id="col-full-167" class="col-md-12 innerContent col_left" data-col="full"

                     data-trigger="none" data-animate="fade" data-delay="500" data-title="full column">

                    <div

                            class="col-inner bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin">

                        <div style="margin-top: 0px; outline: none; cursor: pointer;"

                             class="de elImageWrapper de-image-block elMargin0 elAlign_left hiddenElementTools de-editable"

                             id="tmp_image-13867" data-de-type="img" data-de-editing="false" data-title="image"

                             data-ce="false" data-trigger="none" data-animate="fade" data-delay="500">

                            <img

                                    src="http://tryvitalsleep.com/img/logo.gif"

                                    class="elIMG ximg">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div

            class="container noTopMargin padding40-top padding40-bottom padding40H  borderSolid cornersAll radius0 shadow0 bgNoRepeat activeSection_topBorder0 activeSection_bottomBorder0 border1px emptySection activeSection_topBorder activeSection_bottomBorder noBorder wideContainer"

            id="section-148010000" data-title="Section" data-block-color="0074C7"

            style="padding-top: 20px; padding-bottom: 20px; margin-top: 20px; border-color: rgba(47, 47, 47, 0.180392); outline: none; background-color: rgba(255, 255, 255, 0);"

            data-trigger="none" data-animate="fade" data-delay="500">

        <div class="containerInner ui-sortable">

            <div

                    class="row bgCover  borderSolid cornersAll shadow0 P0-top P0-bottom P0H noTopMargin radius5 borderLight border1px"

                    id="row-2307510000" data-trigger="none" data-animate="fade" data-delay="500"
                    data-title="3 column row"

                    style="padding: 0px; border-color: rgba(47, 47, 47, 0.168627); margin-left: 100px; margin-right: 100px; outline: none; margin-bottom: 0px; background-color: rgb(203, 219, 234);">

                <div id="col-left-159" class="col-md-4 innerContent col_left ui-resizable" data-col="left"

                     data-trigger="none" data-animate="fade" data-delay="500" data-title="Left column"

                     style="outline: none;">

                    <div style="background-color: rgba(23, 82, 138, 0);"

                         class="col-inner bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin">

                        <div class="de elHeadlineWrapper de-editable" id="tmp_headline1-83700" data-de-type="headline"

                             data-de-editing="false" data-title="headline" data-ce="true" data-trigger="none"

                             data-animate="fade" data-delay="500"

                             style="margin-top: 7px; outline: none; cursor: pointer;">

                            <div class="ne elHeadline lh3 elMargin0 elBGStyle0 hsTextShadow0 hsSize18 elFont_oswald"

                                 style="text-align: center; color: rgb(144, 180, 215); background-color: rgba(114, 58, 58, 0);"

                                 data-bold="inherit" contenteditable="false">

                                <b>STEP 1:</b> YOUR ORDER<br>

                            </div>

                        </div>

                    </div>

                </div>

                <div id="col-center-803" class="col-md-4 innerContent col_right ui-resizable" data-col="center"

                     data-trigger="none" data-animate="fade" data-delay="500" data-title="Center column"

                     style="outline: none;">

                    <div

                            class="col-inner bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin"

                            style="padding-top: 7px; padding-bottom: 7px; background-color: rgba(255, 255, 255, 0);">

                        <div class="de elHeadlineWrapper de-editable" id="headline-92535" data-de-type="headline"

                             data-de-editing="false" data-title="headline" data-ce="true" data-trigger="none"

                             data-animate="fade" data-delay="500"

                             style="display: block; margin-top: 0px; outline: none; cursor: pointer;">

                            <div class="ne elHeadline lh3 elMargin0 elBGStyle0 hsTextShadow0 hsSize18 elFont_oswald"

                                 style="text-align: center; color: rgb(144, 180, 215);" data-bold="inherit"

                                 contenteditable="false">

                                <b>STEP 2</b>: OPTIONAL UPGRADES<br>

                            </div>

                        </div>

                    </div>

                </div>

                <div id="col-right-394" class="col-md-4 innerContent col_right ui-resizable" data-col="right"

                     data-trigger="none" data-animate="fade" data-delay="500" data-title="Right column"

                     style="outline: none;">

                    <div

                            style="background-color: rgb(23, 82, 138); padding: 7px 0px; margin-left: -15px; margin-right: -15px;"

                            class="col-inner bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin">

                        <div class="de elHeadlineWrapper de-editable" id="headline-32189" data-de-type="headline"

                             data-de-editing="false" data-title="headline" data-ce="true" data-trigger="none"

                             data-animate="fade" data-delay="500"

                             style="display: block; margin-top: 0px; outline: none; cursor: pointer;">

                            <div class="ne elHeadline lh3 elMargin0 elBGStyle0 hsTextShadow0 hsSize18 elFont_oswald"

                                 style="text-align: center; color: rgb(255, 255, 255);" data-bold="inherit"

                                 contenteditable="false">

                                <b>STEP 3:</b> ORDER COMPLETED

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div

                    style="margin: 20px 20px 0px; outline: none; border-color: rgb(242, 242, 242); padding-bottom: 30px; padding-top: 20px; background-color: rgb(255, 255, 255);"

                    class="row bgCover  borderSolid cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin borderLight border2px"

                    id="row--49556" data-trigger="none" data-animate="fade" data-delay="500" data-title="1 column row">

                <div style="outline: none;" id="col-full-153" class="col-md-12 innerContent col_left" data-col="full"

                     data-trigger="none" data-animate="fade" data-delay="500" data-title="full column">

                    <div

                            class="col-inner bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin">

                        <div style="margin-top: 0px; display: block; cursor: pointer; outline: none;"

                             class="de elHeadlineWrapper de-editable" id="tmp_headline1-84726" data-de-type="headline"

                             data-de-editing="false" data-title="headline" data-ce="true" data-trigger="none"

                             data-animate="fade" data-delay="500">

                            <div

                                    class="ne elHeadline lh3 elMargin0 elBGStyle0 hsTextShadow0 elFont_ubuntu hsSize4 deneg1pxLetterSpacing"

                                    style="text-align: center;" data-bold="inherit" contenteditable="false">

                                <b>Thank You For Your Order!</b><br>

                            </div>

                        </div>

                        <div style="margin-top: 0px; display: block; cursor: pointer; outline: none;"

                             class="de elHeadlineWrapper de-editable" id="headline-50551" data-de-type="headline"

                             data-de-editing="false" data-title="headline" data-ce="true" data-trigger="none"

                             data-animate="fade" data-delay="500">

                            <div

                                    class="ne elHeadline lh3 elMargin0 elBGStyle0 hsTextShadow0 elFont_ubuntu deneg1pxLetterSpacing hsSize3"

                                    style="text-align: center;" data-bold="inherit" contenteditable="false">Your order
                                will be shipped within 24 business hours.<br>

                            </div>

                        </div>

                        <div style="margin-top: 10px; cursor: pointer; outline: none; display: block;"

                             class="de elHeadlineWrapper de-editable" id="tmp_headline1-67390" data-de-type="headline"

                             data-de-editing="false" data-title="headline" data-ce="true" data-trigger="none"

                             data-animate="fade" data-delay="500">

                            <div class="ne elHeadline lh3 elMargin0 elBGStyle0 hsTextShadow0 elFont_opensans hsSize18"

                                 style="text-align: center;" data-bold="inherit" contenteditable="false">For customer
                                support please contact us at support@vitalsleep.com.<br>

                            </div>

                        </div>

                        <div style="margin-top: 10px; outline: none; cursor: pointer;"

                             class="de elImageWrapper de-image-block elAlign_center elMargin0 de-editable"

                             id="tmp_image-64330" data-de-type="img" data-de-editing="false" data-title="image"

                             data-ce="false" data-trigger="none" data-animate="fade" data-delay="500">


                            <style id="media-query">

                                /* Client-specific Styles & Reset */

                                #outlook a {

                                    padding: 0;

                                }

                                /* .ExternalClass applies to Outlook.com (the artist formerly known as Hotmail) */

                                .ExternalClass {

                                    width: 100%;

                                }

                                .ExternalClass,
                                .ExternalClass p,
                                .ExternalClass span,
                                .ExternalClass font,
                                .ExternalClass td,
                                .ExternalClass div {

                                    line-height: 100%;

                                }

                                #backgroundTable {

                                    margin: 0;

                                    padding: 0;

                                    width: 100% !important;

                                    line-height: 100% !important;

                                }

                                /* Buttons */

                                .button a {

                                    display: inline-block;

                                    text-decoration: none;

                                    -webkit-text-size-adjust: none;

                                    text-align: center;

                                }

                                .button a div {

                                    text-align: center !important;

                                }

                                /* Outlook First */

                                body.outlook p {

                                    display: inline !important;

                                }

                                /*  Media Queries */

                                @media only screen and (max-width: 500px) {

                                    table[class="body"] img {

                                        height: auto !important;

                                        width: 100% !important;

                                    }

                                    table[class="body"] img.fullwidth {

                                        max-width: 100% !important;

                                    }

                                    table[class="body"] center {

                                        min-width: 0 !important;

                                    }

                                    table[class="body"] .container {

                                        width: 95% !important;

                                    }

                                    table[class="body"] .row {

                                        width: 100% !important;

                                        display: block !important;

                                    }

                                    table[class="body"] .wrapper {

                                        display: block !important;

                                        padding-right: 0 !important;

                                    }

                                    table[class="body"] .columns, table[class="body"] .column {

                                        table-layout: fixed !important;

                                        float: none !important;

                                        width: 100% !important;

                                        padding-right: 0px !important;

                                        padding-left: 0px !important;

                                        display: block !important;

                                    }

                                    table[class="body"] .wrapper.first .columns, table[class="body"] .wrapper.first .column {

                                        display: table !important;

                                    }

                                    table[class="body"] table.columns td, table[class="body"] table.column td, .col {

                                        width: 100% !important;

                                    }

                                    table[class="body"] table.columns td.expander {

                                        width: 1px !important;

                                    }

                                    table[class="body"] .right-text-pad, table[class="body"] .text-pad-right {

                                        padding-left: 10px !important;

                                    }

                                    table[class="body"] .left-text-pad, table[class="body"] .text-pad-left {

                                        padding-right: 10px !important;

                                    }

                                    table[class="body"] .hide-for-small, table[class="body"] .show-for-desktop {

                                        display: none !important;

                                    }

                                    table[class="body"] .show-for-small, table[class="body"] .hide-for-desktop {

                                        display: inherit !important;

                                    }

                                    .mixed-two-up .col {

                                        width: 100% !important;

                                    }

                                }

                                @media screen and (max-width: 500px) {

                                    div[class="col"] {

                                        width: 100% !important;

                                    }

                                }

                                @media screen and (min-width: 501px) {

                                    table[class="container"] {

                                        width: 500px !important;

                                    }

                                }

                            </style>


                            <div class="summary-table">


                                <table

                                        style="border-spacing: 0;border-collapse: collapse;vertical-align: top"

                                        cellpadding="0" cellspacing="0" width="100%">

                                    <tbody>

                                    <tr style="vertical-align: top">

                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 15px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">

                                            <div

                                                    style="color:#aaaaaa;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;">

                                                <div

                                                        style="font-size:12px;line-height:14px;color:#aaaaaa;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;">

                                                    <p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center">

                                                        <strong>Order Summary</strong>

                                                    </p></div>

                                            </div>

                                        </td>

                                    </tr>

                                    </tbody>

                                </table>

                                <table

                                        style="border-spacing: 0;border-collapse: collapse;vertical-align: top; max-width: 480px;"

                                        align="center" width="100%" border="0"

                                        cellpadding="0" cellspacing="0">

                                    <tbody>

                                    <tr style="vertical-align: top">

                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 5px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px"

                                            align="center">

                                            <div style="height: 1px;">

                                                <table

                                                        style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 1px solid #BBBBBB;width: 100%"

                                                        align="center" border="0"

                                                        cellspacing="0">

                                                    <tbody>

                                                    <tr style="vertical-align: top">

                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top"

                                                            align="center"></td>

                                                    </tr>

                                                    </tbody>

                                                </table>

                                            </div>

                                        </td>

                                    </tr>

                                    </tbody>

                                </table>

                                <?php include __DIR__ . '/order-summary.php'; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div

        class="container noTopMargin padding40-top padding40-bottom padding40H  noBorder borderSolid border3px cornersAll radius0 shadow0 bgNoRepeat activeSection_topBorder0 activeSection_bottomBorder0 emptySection activeSection_topBorder activeSection_bottomBorder fullContainer"

        id="section-5582510000" data-title="Section" data-block-color="0074C7"

        style="padding-top: 30px; padding-bottom: 30px; outline: none; margin-top: 20px; background-color: rgb(237, 237, 237);"

        data-trigger="none" data-animate="fade" data-delay="500">

    <div class="containerInner ui-sortable">

        <div

                class="row bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin"

                id="row-8893410000" data-trigger="none" data-animate="fade" data-delay="500" data-title="1 column row"

                style="outline: none; margin-bottom: 0px;">

            <div id="col-full-920" class="col-md-12 innerContent col_left" data-col="full" data-trigger="none"

                 data-animate="fade" data-delay="500" data-title="full column" style="outline: none;">

                <div

                        class="col-inner bgCover  noBorder borderSolid border3px cornersAll radius0 shadow0 P0-top P0-bottom P0H noTopMargin">

                    <div class="de elHeadlineWrapper de-editable" id="tmp_headline1-17597" data-de-type="headline"

                         data-de-editing="false" data-title="headline" data-ce="true" data-trigger="none"

                         data-animate="fade" data-delay="500" style="outline: none; cursor: pointer;">

                        <div class="ne elHeadline lh3 elMargin0 elBGStyle0 hsTextShadow0 hsSize1"

                             style="text-align: center; color: rgba(47, 47, 47, 0.541176);" data-bold="inherit"

                             contenteditable="false">

                            <a href="http://www.vitalsleep.com/privacypolicy.html" id="" class="" target="_blank">Privacy
                                Policy</a> | <a href="#http://www.vitalsleep.com/terms.html" id="link-3930-399" class=""
                                                target="_blank">Terms and Conditions</a> | <a
                                    href="http://www.vitalsleep.com/contact-us.html" id="" class=""
                                    target="_blank">Contact</a>

                            <br><br>

                            VitalSleep TM 2010 - 2017. Made in the USA. Email: support@vitalsleep.com

                            <br><br>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style id="bold_style_tmp_headline1-82608">#tmp_headline1-82608 .elHeadline b {

        color: rgb(255, 153, 25);

    }</style>

<style id="button_style_tmp_button-70655">#tmp_button-70655 .elButtonFlat:hover {

        background-color: #ffcb14 !important;

    }

    #tmp_button-70655 .elButtonBottomBorder:hover {

        background-color: #ffcb14 !important;

    }

    #tmp_button-70655 .elButtonSubtle:hover {

        background-color: #ffcb14 !important;

    }

    #tmp_button-70655 .elButtonGradient {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(255, 212, 61)), color-stop(1, #ffcb14));

        background-image: -o-linear-gradient(bottom, rgb(255, 212, 61) 0%, #ffcb14 100%);

        background-image: -moz-linear-gradient(bottom, rgb(255, 212, 61) 0%, #ffcb14 100%);

        background-image: -webkit-linear-gradient(bottom, rgb(255, 212, 61) 0%, #ffcb14 100%);

        background-image: -ms-linear-gradient(bottom, rgb(255, 212, 61) 0%, #ffcb14 100%);

        background-image: linear-gradient(to bottom, rgb(255, 212, 61) 0%, #ffcb14 100%);

    }

    #tmp_button-70655 .elButtonGradient:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgb(255, 212, 61)), color-stop(0, #ffcb14));

        background-image: -o-linear-gradient(bottom, rgb(255, 212, 61) 100%, #ffcb14 0%);

        background-image: -moz-linear-gradient(bottom, rgb(255, 212, 61) 100%, #ffcb14 0%);

        background-image: -webkit-linear-gradient(bottom, rgb(255, 212, 61) 100%, #ffcb14 0%);

        background-image: -ms-linear-gradient(bottom, rgb(255, 212, 61) 100%, #ffcb14 0%);

        background-image: linear-gradient(to bottom, rgb(255, 212, 61) 100%, #ffcb14 0%);

    }

    #tmp_button-70655 .elButtonBorder {

        border: 3px solid rgb(255, 212, 61) !important;

        color: rgb(255, 212, 61) !important;

    }

    #tmp_button-70655 .elButtonBorder:hover {

        background-color: rgb(255, 212, 61) !important;

        color: #FFF !important;

    }</style>

<style id="link_color_style">a {

        color: rgb(54, 108, 204);

    }</style>

<style id="button_style_tmp_button-65385">#tmp_button-65385 .elButtonFlat:hover {

        background-color: #2d8230 !important;

    }

    #tmp_button-65385 .elButtonBottomBorder:hover {

        background-color: #2d8230 !important;

    }

    #tmp_button-65385 .elButtonSubtle:hover {

        background-color: #2d8230 !important;

    }

    #tmp_button-65385 .elButtonGradient {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(56, 160, 59)), color-stop(1, #2d8230));

        background-image: -o-linear-gradient(bottom, rgb(56, 160, 59) 0%, #2d8230 100%);

        background-image: -moz-linear-gradient(bottom, rgb(56, 160, 59) 0%, #2d8230 100%);

        background-image: -webkit-linear-gradient(bottom, rgb(56, 160, 59) 0%, #2d8230 100%);

        background-image: -ms-linear-gradient(bottom, rgb(56, 160, 59) 0%, #2d8230 100%);

        background-image: linear-gradient(to bottom, rgb(56, 160, 59) 0%, #2d8230 100%);

    }

    #tmp_button-65385 .elButtonGradient:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgb(56, 160, 59)), color-stop(0, #2d8230));

        background-image: -o-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 0%);

        background-image: -moz-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 0%);

        background-image: -webkit-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 0%);

        background-image: -ms-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 0%);

        background-image: linear-gradient(to bottom, rgb(56, 160, 59) 100%, #2d8230 0%);

    }

    #tmp_button-65385 .elButtonGradient2 {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(56, 160, 59)), color-stop(1, #2d8230));

        background-image: -o-linear-gradient(bottom, rgb(56, 160, 59) 30%, #2d8230 80%);

        background-image: -moz-linear-gradient(bottom, rgb(56, 160, 59) 30%, #2d8230 80%);

        background-image: -webkit-linear-gradient(bottom, rgb(56, 160, 59) 30%, #2d8230 80%);

        background-image: -ms-linear-gradient(bottom, rgb(56, 160, 59) 30%, #2d8230 80%);

        background-image: linear-gradient(to bottom, rgb(56, 160, 59) 30%, #2d8230 80%);

    }

    #tmp_button-65385 .elButtonGradient2:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgb(56, 160, 59)), color-stop(0, #2d8230));

        background-image: -o-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 30%);

        background-image: -moz-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 30%);

        background-image: -webkit-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 30%);

        background-image: -ms-linear-gradient(bottom, rgb(56, 160, 59) 100%, #2d8230 30%);

        background-image: linear-gradient(to bottom, rgb(56, 160, 59) 100%, #2d8230 30%);

    }

    #tmp_button-65385 .elButtonBorder {

        border: 3px solid rgb(56, 160, 59) !important;

        color: rgb(56, 160, 59) !important;

    }

    #tmp_button-65385 .elButtonBorder:hover {

        background-color: rgb(56, 160, 59) !important;

        color: #FFF !important;

    }</style>

<style id="button_style_tmp_headline1-83700">#tmp_headline1-83700 .elButtonFlat:hover {

        background-color: #572c2c !important;

    }

    #tmp_headline1-83700 .elButtonBottomBorder:hover {

        background-color: #572c2c !important;

    }

    #tmp_headline1-83700 .elButtonSubtle:hover {

        background-color: #572c2c !important;

    }

    #tmp_headline1-83700 .elButtonGradient {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(114, 58, 58, 0)), color-stop(1, #572c2c));

        background-image: -o-linear-gradient(bottom, rgba(114, 58, 58, 0) 0%, #572c2c 100%);

        background-image: -moz-linear-gradient(bottom, rgba(114, 58, 58, 0) 0%, #572c2c 100%);

        background-image: -webkit-linear-gradient(bottom, rgba(114, 58, 58, 0) 0%, #572c2c 100%);

        background-image: -ms-linear-gradient(bottom, rgba(114, 58, 58, 0) 0%, #572c2c 100%);

        background-image: linear-gradient(to bottom, rgba(114, 58, 58, 0) 0%, #572c2c 100%);

    }

    #tmp_headline1-83700 .elButtonGradient:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgba(114, 58, 58, 0)), color-stop(0, #572c2c));

        background-image: -o-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 0%);

        background-image: -moz-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 0%);

        background-image: -webkit-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 0%);

        background-image: -ms-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 0%);

        background-image: linear-gradient(to bottom, rgba(114, 58, 58, 0) 100%, #572c2c 0%);

    }

    #tmp_headline1-83700 .elButtonGradient2 {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(114, 58, 58, 0)), color-stop(1, #572c2c));

        background-image: -o-linear-gradient(bottom, rgba(114, 58, 58, 0) 30%, #572c2c 80%);

        background-image: -moz-linear-gradient(bottom, rgba(114, 58, 58, 0) 30%, #572c2c 80%);

        background-image: -webkit-linear-gradient(bottom, rgba(114, 58, 58, 0) 30%, #572c2c 80%);

        background-image: -ms-linear-gradient(bottom, rgba(114, 58, 58, 0) 30%, #572c2c 80%);

        background-image: linear-gradient(to bottom, rgba(114, 58, 58, 0) 30%, #572c2c 80%);

    }

    #tmp_headline1-83700 .elButtonGradient2:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgba(114, 58, 58, 0)), color-stop(0, #572c2c));

        background-image: -o-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 30%);

        background-image: -moz-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 30%);

        background-image: -webkit-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 30%);

        background-image: -ms-linear-gradient(bottom, rgba(114, 58, 58, 0) 100%, #572c2c 30%);

        background-image: linear-gradient(to bottom, rgba(114, 58, 58, 0) 100%, #572c2c 30%);

    }

    #tmp_headline1-83700 .elButtonBorder {

        border: 3px solid rgba(114, 58, 58, 0) !important;

        color: rgba(114, 58, 58, 0) !important;

    }

    #tmp_headline1-83700 .elButtonBorder:hover {

        background-color: rgba(114, 58, 58, 0) !important;

        color: #000 !important;

    }</style>

<style id="bold_style_tmp_headline1-83700">#tmp_headline1-83700 .elHeadline b {

        color: rgb(144, 180, 215);

    }</style>

<style id="button_style_tmp_headline1-91760">#tmp_headline1-91760 .elButtonFlat:hover {

        background-color: #ebebeb !important;

    }

    #tmp_headline1-91760 .elButtonBottomBorder:hover {

        background-color: #ebebeb !important;

    }

    #tmp_headline1-91760 .elButtonSubtle:hover {

        background-color: #ebebeb !important;

    }

    #tmp_headline1-91760 .elButtonGradient {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(255, 255, 255, 0)), color-stop(1, #ebebeb));

        background-image: -o-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #ebebeb 100%);

        background-image: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #ebebeb 100%);

        background-image: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #ebebeb 100%);

        background-image: -ms-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #ebebeb 100%);

        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, #ebebeb 100%);

    }

    #tmp_headline1-91760 .elButtonGradient:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgba(255, 255, 255, 0)), color-stop(0, #ebebeb));

        background-image: -o-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 0%);

        background-image: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 0%);

        background-image: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 0%);

        background-image: -ms-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 0%);

        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 0%);

    }

    #tmp_headline1-91760 .elButtonGradient2 {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(255, 255, 255, 0)), color-stop(1, #ebebeb));

        background-image: -o-linear-gradient(bottom, rgba(255, 255, 255, 0) 30%, #ebebeb 80%);

        background-image: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0) 30%, #ebebeb 80%);

        background-image: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0) 30%, #ebebeb 80%);

        background-image: -ms-linear-gradient(bottom, rgba(255, 255, 255, 0) 30%, #ebebeb 80%);

        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0) 30%, #ebebeb 80%);

    }

    #tmp_headline1-91760 .elButtonGradient2:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgba(255, 255, 255, 0)), color-stop(0, #ebebeb));

        background-image: -o-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 30%);

        background-image: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 30%);

        background-image: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 30%);

        background-image: -ms-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 30%);

        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0) 100%, #ebebeb 30%);

    }

    #tmp_headline1-91760 .elButtonBorder {

        border: 3px solid rgba(255, 255, 255, 0) !important;

        color: rgba(255, 255, 255, 0) !important;

    }

    #tmp_headline1-91760 .elButtonBorder:hover {

        background-color: rgba(255, 255, 255, 0) !important;

        color: #000 !important;

    }</style>

<style id="button_style_tmp_headline1-76910">#tmp_headline1-76910 .elButtonFlat:hover {

        background-color: #e6e6e6 !important;

    }

    #tmp_headline1-76910 .elButtonBottomBorder:hover {

        background-color: #e6e6e6 !important;

    }

    #tmp_headline1-76910 .elButtonSubtle:hover {

        background-color: #e6e6e6 !important;

    }

    #tmp_headline1-76910 .elButtonGradient {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(255, 255, 255, 0)), color-stop(1, #e6e6e6));

        background-image: -o-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #e6e6e6 100%);

        background-image: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #e6e6e6 100%);

        background-image: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #e6e6e6 100%);

        background-image: -ms-linear-gradient(bottom, rgba(255, 255, 255, 0) 0%, #e6e6e6 100%);

        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, #e6e6e6 100%);

    }

    #tmp_headline1-76910 .elButtonGradient:hover {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1, rgba(255, 255, 255, 0)), color-stop(0, #e6e6e6));

        background-image: -o-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #e6e6e6 0%);

        background-image: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #e6e6e6 0%);

        background-image: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #e6e6e6 0%);

        background-image: -ms-linear-gradient(bottom, rgba(255, 255, 255, 0) 100%, #e6e6e6 0%);

        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0) 100%, #e6e6e6 0%);

    }

    #tmp_headline1-76910 .elButtonBorder {

        border: 3px solid rgba(255, 255, 255, 0) !important;

        color: rgba(255, 255, 255, 0) !important;

    }

    #tmp_headline1-76910 .elButtonBorder:hover {

        background-color: rgba(255, 255, 255, 0) !important;

        color: #000 !important;

    }</style>

<style id="bold_style_headline-32189">#headline-32189 .elHeadline b {

        color: rgb(255, 255, 255);

    }</style>

<style id="bold_style_headline-92535">#headline-92535 .elHeadline b {

        color: rgb(144, 180, 215);

    }</style>

</div>

<style id="custom-css"></style>

<div id="fb-root"></div>

<script>(function (d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) return;

        js = d.createElement(s);

        js.id = id;

        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=246441615530259&version=v2.0";

        fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));</script>

<input type="hidden" value="9279542" id="page-id">

<input type="hidden" value="9279542" id="root-id">

<input type="hidden" value="core" id="variant-check">

<input type="hidden" value="843582" id="user-id">

<script src="https://www.clickfunnels.com/assets/lander.js"></script>

<!--[if lt IE 9]>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>

<![endif]-->

<form target="_parent" data-cf-form-action="true" action="https://info359.clickfunnels.com/thank-you-page9279542"

      method="post" id="cfAR" style="display:none">

    <span data-cf-form-fields="true"></span>

    <input id="cf_contact_name" name="contact[name]" data-cf-form-field="name" placeholder="name" data-stripe="name">

    <input id="cf_contact_first_name" name="contact[first_name]" data-cf-form-field="first_name"

           placeholder="first_name">

    <input id="cf_contact_last_name" name="contact[last_name]" data-cf-form-field="last_name" placeholder="last_name">

    <input id="cf_contact_email" name="contact[email]" data-cf-form-field="email" placeholder="email" required="true">

    <input id="cf_contact_phone" name="contact[phone]" data-cf-form-field="phone" placeholder="phone">

    <input id="cf_contact_address" name="contact[address]" data-cf-form-field="address" placeholder="address"

           data-stripe="address_line1">

    <input id="cf_contact_city" name="contact[city]" data-cf-form-field="city" placeholder="city"

           data-stripe="address_city">

    <input id="cf_contact_state" name="contact[state]" data-cf-form-field="state" placeholder="state"

           data-stripe="address_state">

    <input id="cf_contact_country" name="contact[country]" data-cf-form-field="country" placeholder="country"

           data-stripe="address_country">

    <input id="cf_contact_zip" name="contact[zip]" data-cf-form-field="zip" placeholder="ZIP" data-stripe="address_zip">

    <input id="cf_contact_shipping_address" name="contact[shipping_address]" data-cf-form-field="shipping_address"

           placeholder="shipping_address" data-stripe="shipping_address">

    <input id="cf_contact_shipping_city" name="contact[shipping_city]" data-cf-form-field="shipping_city"

           placeholder="shipping_city" data-stripe="shipping_city">

    <input id="cf_contact_shipping_state" name="contact[shipping_state]" data-cf-form-field="shipping_state"

           placeholder="shipping_state" data-stripe="shipping_state">

    <input id="cf_contact_shipping_country" name="contact[shipping_country]" data-cf-form-field="shipping_country"

           placeholder="shipping_country" data-stripe="shipping_country">

    <input id="cf_contact_shipping_zip" name="contact[shipping_zip]" data-cf-form-field="shipping_zip"

           placeholder="shipping_ZIP" data-stripe="shipping_zip">

    <input id="cf_contact_vat_number" name="contact[vat_number]" data-cf-form-field="vat_number">

    <input id="cf_contact_affiliate_id" name="contact[affiliate_id]" data-cf-form-field="affiliate_id"

           data-param="affiliate_id">

    <input id="cf_contact_cf_affiliate_id" name="contact[cf_affiliate_id]" data-cf-form-field="cf_affiliate_id"

           data-param="cf_affiliate_id">

    <input id="cf_cf_affiliate_id" name="cf_affiliate_id" data-param="cf_affiliate_id">

    <input id="cf_contact_affiliate_aff_sub" name="contact[aff_sub]" data-cf-form-field="aff_sub" data-param="aff_sub">

    <input id="cf_contact_affiliate_aff_sub2" name="contact[aff_sub2]" data-cf-form-field="aff_sub2"

           data-param="aff_sub2">

    <input id="utm_source" name="utm_source" data-cf-form-field="utm_source" data-param="utm_source">

    <input id="utm_medium" name="utm_medium" data-cf-form-field="utm_medium" data-param="utm_medium">

    <input id="utm_campaign" name="utm_campaign" data-cf-form-field="utm_campaign" data-param="utm_campaign">

    <input id="utm_term" name="utm_term" data-cf-form-field="utm_term" data-param="utm_term">

    <input id="utm_content" name="utm_content" data-cf-form-field="utm_content" data-param="utm_content">

    <input type="text" name="webinar_delay" id="webinar_delay" placeholder="Webinar Delay">

    <span data-cf-product-template="true">

<input type="radio" name="purchase[product_id]" value="" data-storage="false">

<input type="checkbox" name="purchase[product_ids][]" value="" data-storage="false">

</span>

    <input name="purchase[taxamo_transaction_key]" data-storage="false">

    <input id="cf_contact_number" data-stripe="number" data-storage="false">

    <input id="cf_contact_month" data-stripe="exp-month" data-storage="">

    <input id="cf_contact_year" data-stripe="exp-year" data-storage="">

    <input id="cf_contact_cvc" data-stripe="cvc" data-storage="false">

    <input type="hidden" name="purchase[payment_method_nonce]" data-storage="false">

    <input type="submit">

    <input name="contact[cart_affiliate_id]" value="" type="hidden" style="display:none;" data-param="affiliate">

</form>

<span class="countdown-time" style="display:none;"></span>

<span class="webinar-last-time" style="display:none;"></span>

<span class="webinar-ext" style="display:none;"></span>

<span class="webinar-ot" style="display:none;"></span>

<div class="otoloading" style="display: none;">

    <div class="otoloadingtext">

        <h2>Working...</h2>

        <div><i class="fa fa-spinner fa-spin"></i></div>

    </div>

</div>

<script type="text/javascript">

    document.createElement('video');

    document.createElement('audio');

    document.createElement('track');

</script>

<style>#IntercomDefaultWidget {

        display: none

    }

    .selectAW-date-demo, .elTicketAddToCalendar {

        display: none

    }

    .video-js {

        padding-top: 56.25%

    }

    .vjs-fullscreen {

        padding-top: 0

    }

    [data-timed-style='fade'] {

        display: none

    }

    [data-timed-style='scale'] {

        display: none

    }</style>

<script>

    var page_key = 'ate20opxzhwgj36f';

    var fid = '2797979';

    var fspos = '4';

    var fvrs = '3';

    var cf_tracker = cf_tracker || [];

    (function () {

        cf_key = 'fqec8xqf';

        page_key = 'ate20opxzhwgj36f';

        serverUrl = 'https://app.clickfunnels.com/v1/track';

        var cf = document.createElement('script');

        cf.type = 'text/javascript';

        cf.async = true;

        cf.src = 'https://app.clickfunnels.com/cf.js';

        var s = document.getElementsByTagName('script')[0];

        s.parentNode.insertBefore(cf, s);

    })();

</script>

<script type="text/javascript">function getURLParameter(e) {

        return decodeURIComponent((RegExp(e + "=(.+?)(&|$)").exec(location.search) || [, null])[1])

    }</script>

<script type="text/javascript">$(function () {

        "null" != getURLParameter("email") && ($('input[name="contact[email]"]').val(getURLParameter("email")), $("[name=email]").val(getURLParameter("email"))), "null" != getURLParameter("name") && ($('input[name="contact[name]"]').val(getURLParameter("name")), $("[name=name]").val(getURLParameter("name"))), "null" != getURLParameter("first_name") && ($('input[name="contact[first_name]"]').val(getURLParameter("first_name")), $("[name=first_name]").val(getURLParameter("first_name"))), "null" != getURLParameter("last_name") && ($('input[name="contact[last_name]"]').val(getURLParameter("last_name")), $("[name=last_name]").val(getURLParameter("last_name"))), "null" != getURLParameter("address_1") && ($('input[name="contact[address_1]"]').val(getURLParameter("address")), $("[name=address_1]").val(getURLParameter("address_1"))), "null" != getURLParameter("address_2") && ($('input[name="contact[address_1]"]').val(getURLParameter("address")), $("[name=address_2]").val(getURLParameter("address_2"))), "null" != getURLParameter("city") && ($('input[name="contact[city]"]').val(getURLParameter("city")), $("[name=city]").val(getURLParameter("city"))), "null" != getURLParameter("state") && ($('input[name="contact[state]"]').val(getURLParameter("state")), $("[name=state]").val(getURLParameter("state"))), "null" != getURLParameter("zip") && ($('input[name="contact[zip]"]').val(getURLParameter("zip")), $("[name=zip]").val(getURLParameter("zip"))), "null" != getURLParameter("phone") && ($('input[name="contact[phone]"]').val(getURLParameter("phone")), $("[name=phone]").val(getURLParameter("phone")))

    });</script>

</body>

</html>

