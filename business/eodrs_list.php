<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$bdt = $_REQUEST['bdt'];

?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Service</th>
            <th scope="col">Customer Details</th>
            <th scope="col">Booked by</th>
            <th scope="col">Time slot</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $fld1['assign'] = $Members->User_Details->username;
        $op1['assign'] = "=, and";
        $fld1['stat'] = 0;
        $op1['stat'] = "=, and";
        $fld1['bdt'] = $bdt;
        $op1['bdt'] = "=, ";

        $list1  = new Init_Table();
        $list1->set_table("main_order_cart", "sl");
        $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
        $crow = $list1->row_count_custom($fld1, $op1, '', array('sl' => 'ASC'));
        if ($crow != 0) {
            $pdo = new MainPDO();
            $cnt = 0;
            foreach ($row as $value) {
                $cnt++;
                $sl = $value['sl'];
                $stat = $value['stat'];
        ?>
                <tr>


                    <td><?php echo $cnt; ?></td>
                    <td><?php
                        $fld1x['s_id'] = $value['servnm'];
                        $op1x['s_id'] = "=, ";

                        $list1x  = new Init_Table();
                        $list1x->set_table("main_service_setup", "sl");
                        $rowx = $list1x->search_custom($fld1x, $op1x, '', array('sl' => 'ASC'));
                        $pdo = new MainPDO();
                        foreach ($rowx as $valuex) {
                        }

                        echo $valuex['snm']; ?></td>
                    <td>
                        Name : <?php echo $value['prchby']; ?> <br>
                        Number : <?php echo $value['prchnum']; ?> <br>
                    </td>
                    <td><?php
                        $fld1xy['username'] = $value['eby'];
                        $op1xy['username'] = "=, ";

                        $list1xy  = new Init_Table();
                        $list1xy->set_table("main_signup", "sl");
                        $rowxy = $list1xy->search_custom($fld1xy, $op1xy, '', array('sl' => 'ASC'));
                        $pdo = new MainPDO();
                        foreach ($rowxy as $valuexy) {
                        }

                        echo $valuexy['name'];

                        ?></td>
                    <td>
                        From Time : <?php echo $value['ftm']; ?> <br>
                        To Time : <?php echo $value['ttm']; ?>
                    </td>
                    <td>
                        <div id="acrj<?php echo $sl; ?>">
                            <button class="btn btn-success" onclick="acrj('1',<?php echo $sl; ?>)">Accept</button>
                            <button class="btn btn-danger" onclick="acrj('10',<?php echo $sl; ?>)">Reject</button>
                        </div>
                    </td>
                </tr>

            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">
                    <h4 style="color:red;"> There is no orders</h4>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>