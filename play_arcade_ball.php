<?php
$commands = array(
    '100right' => array(
        'input touchscreen swipe 500 1800 760 0 400',
        'input touchscreen tap 380 900'
    ),
    '100left' => array(
        'input touchscreen swipe 500 2000 215 1350 200'
    ),
    '50' => array(
        'input touchscreen swipe 380 2000 380 1345 200'
    ),
    '40' => array(
        'input touchscreen swipe 380 2000 380 1450 200'
    ),
    '30' => array(
        'input touchscreen swipe 380 2000 380 950 400'
    ),
    '20' => array(
        'input touchscreen swipe 380 2000 400 1300 400'
    ),
    '10' => array(
        'input touchscreen swipe 380 2000 500 1400 400'
    ),
    'again' => array(
        'input touchscreen tap 380 900'
    )
);
if (!empty($_GET['action'])) {
    if(isset($commands[$_GET['action']])){
        $out = system('adb shell ' . implode(";", $commands[$_GET['action']]) . ";");
        var_dump($out);
    }
} else {

    ?>
<link rel="stylesheet" type="text/css"
      href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.js"></script>
<script>
    jQuery(function () {
        jQuery('[type=button]').click(function () {
            jQuery('[name=action]').val(jQuery(this).val());
            jQuery('form').submit();
        });

        jQuery('form').submit(
            function () {
                var $this = jQuery(this);
                jQuery.ajax('play_arcade_ball.php?' + $this.serialize(), {async: false});
                return false;
            }
        )    ;
    });

    function play(){
        jQuery('[value=100right]').click();
        setTimeout(play, 1);
    }
</script>
<form method="get">
    <input type="text" name="action" value="">
    <br/>
    <input type="button" name="100right" value="100left">
    <input type="button" name="100right" value="100right"><br/>
    <input type="button" name="100right" value="50">
    <input type="button" name="100right" value="40">
    <input type="button" name="100right" value="30">
    <input type="button" name="100right" value="20">
    <input type="button" name="100right" value="10">
    <br/>
    <input type="button" name="100right" value="again">
    <input type="button" name="100right" value="play" onclick="play();">

</form>
<?

}
?>