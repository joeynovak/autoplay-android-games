<?php
$commands = array(
    'closeAd' => array(
        'input touchscreen tap 1830 50'
    ),
    'autoPlay' => array(
        'input touchscreen tap 1800 1100'
    ),
    'spinWheel' => array(
        'input touchscreen tap 900 550'
    ),
    'replay' => array(
        'input touchscreen tap 900 1100'
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
                    jQuery.ajax('play_epic.php?' + $this.serialize(), {async: false});
                    return false;
                }
            )    ;
        });

        function autoPlay(){
            jQuery('body').append("AutoPlay");
            jQuery('[value=autoPlay]').click();
            setTimeout(spinWheel, 28000);
        }

        function spinWheel(){
            jQuery('body').append("Spinning Wheel");
            jQuery('[value=spinWheel]').click();
            setTimeout(replay, 3500);
        }

        function replay(){
            jQuery('body').append("Replay");
            jQuery('[value=replay]').click();
            setTimeout(closeAd, 7000);
        }

        function closeAd(){
            jQuery('body').append("Close Ad");
            jQuery('[value=closeAd]').click();
            setTimeout(closePotionsIfOpened, 1000);
        }

        function closePotionsIfOpened(){
            jQuery('body').append("Close Potions");
            jQuery('[value=spinWheel]').click();
            setTimeout(autoPlay, 700);
        }
    </script>
    <input type="button" value="Auto Play" onClick="autoPlay(); return false;"/>
    <form method="get">
        <input type="text" name="action" value="">
        <br/>
        <?php
            foreach($commands as $commandName => $events){
                ?>
                    <input type="button" name="<?=$commandName?>" value="<?=$commandName?>"><br/>
                <?
            }
        ?>
    </form>
<?

}
?>