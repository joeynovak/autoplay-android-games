<?php
if($_POST['event_dump']) {
    $events = explode("0000 0000 00000000", $_POST['event_dump']);

    foreach($events as $event){
        $event = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $event);
        $event = preg_replace_callback("/ [0-9a-f]+/", "convert", $event);
        ?><br/><pre><?=$event?>0000 0000 00000000</pre>
        <?
    }
}

function convert($text){
    return ' ' . hexdec($text[0]);
}
?>
<form method="post">
    <h1>Event Splitter</h1>
    <textarea name="event_dump" cols="80" rows="40"><?=htmlspecialchars($_POST['event_dump'])?></textarea>
    <input type="submit">
</form>