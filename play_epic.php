<?php
$commands = array(
    'closeAd' => array(
        'input touchscreen tap 50 50'
    ),
    'autoPlay' => array(
        'input touchscreen tap 1800 1100'
    ),
    'spinWheel' => array(
        'input touchscreen tap 900 550'
    ),
    'replay' => array(
        'input touchscreen tap 900 1100'
    ),
    'make' => array(
        'input touchscreen tap 1600 1100'
    ),
    'accept' => array(
        'input touchscreen tap 1200 1100'
    ),


);
if (!empty($_GET['action'])) {
    if(isset($commands[$_GET['action']])){
        $cmd = '"C:\Program Files (x86)\Android\android-sdk\platform-tools\adb" shell ' . implode(";", $commands[$_GET['action']]) . ";";
        $out = system($cmd);
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
            setTimeout(spinWheel, 35000);
        }

        function spinWheel(){
            jQuery('body').append("Spinning Wheel");
            jQuery('[value=spinWheel]').click();
            setTimeout(replay, 3500);
        }

        function replay(){
            jQuery('body').append("Replay");
            jQuery('[value=replay]').click();
            setTimeout(closeAd, 15000);
        }

        function closeAd(){
            jQuery('body').append("Close Ad");
            jQuery('[value=closeAd]').click();
            setTimeout(closeAd2, 1000);
        }

        function closeAd2(){
            jQuery('body').append("Close Ad");
            jQuery('[value=closeAd]').click();
            setTimeout(autoPlay, 5000);
        }


        function closePotionsIfOpened(){
            jQuery('body').append("Close Potions");
            jQuery('[value=spinWheel]').click();
            setTimeout(autoPlay, 700);
        }

        function make(){
            jQuery('body').append("Making");
            jQuery('[value=make]').click();
            setTimeout(accept, 6000);
        }

        function accept(){
            jQuery('body').append("Accepting");
            jQuery('[value=accept]').click();
            setTimeout(make, 1000);
        }
    </script>
    <input type="button" value="Auto Play" onClick="autoPlay(); return false;"/>
    <input type="button" value="Auto Make" onClick="make(); return false;"/>
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