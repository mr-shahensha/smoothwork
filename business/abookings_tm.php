<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$s_id = $_REQUEST['srv'];
if ($s_id != "") {

    $fld1['s_id'] = $s_id;
    $op1['s_id'] = "=, ";

    $list1  = new Init_Table();
    $list1->set_table("main_service_setup", "sl");
    $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
    $path1 = "";
    foreach ($row as $value) {
    }

?>
    <div class="form-group col-md-3">
        <label>
            <b>
                <font color="#ed2618"></font>Starting service time:
            </b>
        </label>
        <input type="text" class="form-control" id="sst" value="<?php echo $value['sftm']; ?>" readonly>

    </div>
    <div class="form-group col-md-3">
        <label>
            <b>
                <font color="#ed2618"></font>End service time :
            </b>
        </label>
        <input type="text" class="form-control" id="est" value="<?php echo $value['sttm']; ?>" readonly>

    </div>
    <div class="form-group col-md-3">
        <label>
            <b>
                <font color="#ed2618"></font>Duration (in minutes):
            </b>
        </label>
        <input type="text" class="form-control" value="<?php echo $value['sdr']; ?>" readonly>

    </div>

<?php
} else {
?>
    <div class="form-group col-md-3">
        <label>
            <b>
                <font color="#ed2618"></font>Starting service time:
            </b>
        </label>
        <input type="time" id="sst" class="form-control" readonly>

    </div>
    <div class="form-group col-md-3">
        <label>
            <b>
                <font color="#ed2618"></font>End service time :
            </b>
        </label>
        <input type="time" id="est" class="form-control" readonly>

    </div>
    <div class="form-group col-md-3">
        <label>
            <b>
                <font color="#ed2618"></font>Duration (in minutes):
            </b>
        </label>
        <input type="time" class="form-control" readonly>

    </div>
<?php
}
?>