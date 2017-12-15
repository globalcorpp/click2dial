<?php

require_once('/var/lib/asterisk/agi-bin/phpagi-asmanager.php');
include './db/manager.php';

function Dial() {
    $asm = new AGI_AsteriskManager();

    require_once('/var/www/html/contact/ipPrivilege.php');

    if ($asm->connect($SERVERMANAGER, $USERMANAGER, $PASSWORDMANAGER)) {

        $call = $asm->send_request('Originate', array('Channel' => "SIP/$source",
            'Context' => 'default',
            'Exten' => "$destination",
            'Priority' => 1,
            'Callerid' => "Connect To " . $destination));
        if ($call == null) {
            exit(1);
        }
        $asm->disconnect();
    } else {
        exit(1);
    }
}

if ($_POST['action'] == 'call') {
    Dial();
}
?>