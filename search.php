<?php
require_once('/var/lib/asterisk/agi-bin/phpagi-asmanager.php');
include './db/db.php';
include './db/manager.php';

if ($_POST) {
    $q = mysqli_real_escape_string($connection, $_POST['search']);
    $strSQL_Result = mysqli_query($connection, "select * from users where extension like '%$q%' or sipname like '%$q%' order by extension LIMIT 5");
    while ($row = mysqli_fetch_array($strSQL_Result)) {
        $name = $row['sipname'];
        $extension = $row['extension'];

        $asm = new AGI_AsteriskManager();
        if ($asm->connect($SERVERMANAGER, $USERMANAGER, $PASSWORDMANAGER)) {
            $status = $asm->ExtensionState($extension, 'from-internal', 1);
            $status = $status['Status'];
            ?>

            <div id="demo" class="show" align="right">
                <a id="showid" style="border: black"><img data-extension="<?php echo $extension; ?>" data-ip="<?php echo $_SERVER['REMOTE_ADDR']; ?>"  data-status="<?php echo $status ?>" src="images/c2d.png" style="width:34px; height:34px; float:right; margin-right:0px; margin-left: 10px;" /></a><span style="line-height: 32px;margin-right: 12px;"class="name"><?php echo $name; ?></span><span style="float:left;margin-left: 6px;line-height: 32px;">
                    <?php
                    //  Status codes:
                    //  -1 = Extension not found
                    //  0 = Idle
                    //  1 = In Use
                    //  2 = Busy
                    //  4 = Unavailable
                    //  8 = Ringing
                    //  16 = On Hold
                    switch ($status) {
                        case 0:
                            //echo 'Idle';
                            echo '<img src="images/statusLogo/avail.png" style=" width:34px; height:34px; float:left; margin-right:10px; margin-left: 0px;" />';
                            break;
                        case 1:
                            //echo 'In Use';
                            echo '<img src="images/statusLogo/busy.png" style=" width:34px; height:34px; float:left; margin-right:10px; margin-left: 0px;" />';
                            break;
                        case 2:
                            //echo 'Busy';
                            echo '<img src="images/statusLogo/busy.png" style=" width:34px; height:34px; float:left; margin-right:10px; margin-left: 0px;" />';
                            break;
                        case 4:
                            //echo 'Unavailable';
                            echo '<img src="images/statusLogo/away.png" style=" width:34px; height:34px; float:left; margin-right:10px; margin-left: 0px;" />';
                            break;
                        case 8:
                            //echo 'Ringing';
                            echo '<img src="images/statusLogo/ringing.png" style=" width:34px; height:34px; float:left; margin-right:10px; margin-left: 0px;" />';
                            break;
                        case 16:
                            //echo 'On Hold';
                            echo '<img src="images/statusLogo/onhold.png" style=" width:34px; height:34px; float:left; margin-right:10px; margin-left: 0px;" />';
                            break;
                        default:
                            //echo 'Other';
                            echo '<img src="images/statusLogo/other.png" style=" width:34px; height:34px; float:left; margin-right:10px; margin-left: 0px;" />';
                            break;
                    }
//                    var_dump($status1);
                    $asm->disconnect();
                } else {
                    exit(1);
                }
//                exit(0);
                ?>
                <?php echo $extension ?></span>
        </div>
        <?php
    }// end while
    ?>
    <script>
        function myAjax(para, para2, para3) {
            $.ajax({
                type: "POST",
                url: 'ajax.php',
                data: {action: 'call', id: para, ip: para2, status: para3},
                success: function (html) {
    //                    alert(html);
                    console.log('salam');
                }
            });
        }
        $("img").click(function () {
            para = $(this).data('extension'); //extension
            para2 = $(this).data('ip'); //REMOTE_ADDR - just trust network
            para3 = $(this).data('status'); //status
            myAjax(para, para2, para3);
        });
    </script>
    <?php
}
?>