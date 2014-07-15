<?php
if (!empty($_GET['action'])) {
    $commands = array();
    if ($_GET['action'] == 'click') {
        //Up
        $commands[] = "sendevent /dev/input/event2 3 48 0";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";

        //Down
        $commands[] = "sendevent /dev/input/event2 3 57 0";
        $commands[] = "sendevent /dev/input/event2 3 53 " . $_GET['y'];
        $commands[] = "sendevent /dev/input/event2 3 54 " . $_GET['x'];
        $commands[] = "sendevent /dev/input/event2 3 48 1";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";

        //Up
        $commands[] = "sendevent /dev/input/event2 3 48 0";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";
    } elseif ($_GET['action'] == 'move') {
        $commands[] = "sendevent /dev/input/event2 3 57 0";
        $commands[] = "sendevent /dev/input/event2 3 53 " . $_GET['y'];
        $commands[] = "sendevent /dev/input/event2 3 54 " . $_GET['x'];
        $commands[] = "sendevent /dev/input/event2 3 48 1";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";
    } elseif ($_GET['action'] == 'up') {
        $commands[] = "sendevent /dev/input/event2 3 48 0";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";
    } elseif ($_GET['action'] == 'fire') {
        //Up
        $commands[] = "sendevent /dev/input/event2 3 48 0";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";

        //Down
        $commands[] = "sendevent /dev/input/event2 3 57 0";
        $commands[] = "sendevent /dev/input/event2 3 53 450";
        $commands[] = "sendevent /dev/input/event2 3 54 2650";
        $commands[] = "sendevent /dev/input/event2 3 48 1";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";

        //Drag middle
        $commands[] = "sendevent /dev/input/event2 3 57 0";
        $commands[] = "sendevent /dev/input/event2 3 53 1250";
        $commands[] = "sendevent /dev/input/event2 3 54 2900";
        $commands[] = "sendevent /dev/input/event2 3 48 1";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";

        //Up
        $commands[] = "sendevent /dev/input/event2 3 48 0";
        $commands[] = "sendevent /dev/input/event2 0 2 0";
        $commands[] = "sendevent /dev/input/event2 0 0 0";
    }

<<<<<<< HEAD
    system('C:/Program Files (x86)/Android/android-sdk/platform-tools/adb shell ' . implode(";", $commands) . ";");
=======
    system('C:/adt-bundle-windows-x86_64-20130219/sdk/platform-tools/adb shell ' . implode(";", $commands) . ";");
>>>>>>> origin/master
} else {

    ?>
<link rel="stylesheet" type="text/css"
      href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.js"></script>
<script>
    jQuery(function () {
        jQuery('[x]').click(function () {
            var $this = jQuery(this);
            jQuery('[name=x]').val($this.attr('x'));
            jQuery('[name=y]').val($this.attr('y'));
            jQuery('[name=action]').val(jQuery(this).attr('name'));
        });

        jQuery('[type=button]').click(function () {
            jQuery('[name=action]').val(jQuery(this).attr('name'));
            jQuery('form').submit();
        });

        jQuery('form').submit(
            function () {
                var $this = jQuery(this);
                jQuery.ajax('send_input.php?' + $this.serialize(), {async: false});
                return false;
            }
        )    ;



    });

    function play(){
        jQuery('[value=Top]').click();
        jQuery('[value=Top]').click();
        jQuery('[value=MiddleTop]').click();
        jQuery('[value=MiddleTop]').click();
        jQuery('[value=Middle]').click();
        jQuery('[value=Middle]').click();
        jQuery('[value=MiddleBottom]').click();
        jQuery('[value=MiddleBottom]').click();
        jQuery('[value=AdClose]').click();
        jQuery('[value=Top]').click();
        jQuery('[value=Top]').click();
        jQuery('[value=MiddleTop]').click();
        jQuery('[value=MiddleTop]').click();
        jQuery('[value=Middle]').click();
        jQuery('[value=Middle]').click();
        jQuery('[value=MiddleBottom]').click();
        jQuery('[value=MiddleBottom]').click();
        jQuery('[value=ContinueButton]').click();
        setTimeout(play, 1);
    }

</script>
<form method="get">
    X: <input type="text" name="x" value="<?=!empty($_GET['x']) ? $_GET['x'] : 0 ?>">
    <br/>
    Y: <input type="text" name="y" value="<?=!empty($_GET['y']) ? $_GET['y'] : 0 ?>">
    <br/>
    Action: <input type="text" name="action" value="<?=!empty($_GET['action']) ? $_GET['action'] : '' ?>">
    <br/>

    <input type="button" name="click" value="Down">
    <input type="button" name="move" value="Move">
    <input type="button" name="up" value="Up">
    <br/>
    <input type="button" name="move" value="HighGutter" x="1300" y="2100">
    <input type="button" name="move" value="Top" x="3500" y="2100">
    <input type="button" name="move" value="MiddleTop" x="3500" y="1575">
    <input type="button" name="move" value="Middle" x="3500" y="1050">
    <input type="button" name="move" value="MiddleBottom" x="3500" y="525">
    <input type="button" name="move" value="LowGutter" x="1000" y="525">

    <input type="button" name="move" value="Bottom" x="3500" y="0">
    <br/>
    <input type="button" name="click" value="ContinueButton" x="3500" y="2100">
    <input type="button" name="fire" value="UseFireball" x="3500" y="2100">
    <input type="button" name="click" value="AdClose" x="3500" y="1000">
</form>
    <input type="button" name="start" value="Auto Play" onclick="play();"/>
<?

}
?>