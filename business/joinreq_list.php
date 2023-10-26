<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);

$fld1['sl'] = '0';
$op1['sl'] = ">, and";
$fld1['status'] = '-1';
$op1['status'] = "=, ";

$list1  = new Init_Table();
$list1->set_table("main_service_provider", "sl");
$row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
$path1 = "";
?>
<table class="table">
    <tr>
        <th width="10%">SL</th>
        <th width="18%">Name of Company</th>
        <th width="18%">Name of Owner</th>
        <th width="18%">Details</th>
        <th width="18%">Contacts</th>
        <th width="18%">Actions</th>


    </tr>
    <?php
    $cnt = 0;
    $pdo = new MainPDO();
    foreach ($row as $value) {
        $cnt++;
        $sl = $value['sl'];
    ?>
        <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $value['cname']; ?></td>
            <td><?php echo $value['oname']; ?></td>
            <td>
                <span>Service Category : <b><?php 
                $fld10['cat_id'] = $value['servcat'];
                $op10['cat_id'] = "=, ";
                
                $list10  = new Init_Table();
                $list10->set_table("main_service_category", "sl");
                $row0 = $list10->search_custom($fld10, $op10, '', array('sl' => 'ASC'));
                foreach ($row0 as $value1) {
                }
                echo $value1['cat_nm']; 
                
                ?></b></span><br>
                <span>No of employee : <b><?php echo $value['noem']; ?></b></span><br>
                <span>Government ID : <b><?php echo $value['govid']; ?></b></span><br>
            </td>
            <td>
                <span>Address : <b><?php echo $value['profadd']; ?></b></span><br>
                <span>Contact number : <b><?php echo $value['offcnum']; ?></b></span><br>
                <span>Website : <b><a href="https://<?php echo $value['offweb']; ?>" target="_blank"><?php echo $value['offweb']; ?></a></b></span><br>
            </td>
            <td><div class="box-body" id="show2<?php echo $sl; ?>">
                <input type="button" value="Accept" onclick="acrj(5,'<?php echo $sl; ?>')" class="btn btn-success btn-sm">
                <input type="button" value="Reject" onclick="acrj(-10,'<?php echo $sl; ?>')" class="btn btn-danger btn-sm">
                </div>
                <input type="hidden" name="" id="sl<?php echo $sl; ?>" value="<?php echo $sl; ?>">
                
            </td>
        </tr>
    <?php
    }
    ?>
</table>