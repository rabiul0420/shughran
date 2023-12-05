<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'অন্যান্য - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
    }
}
?>
&nbsp;&nbsp;

<span class="dropdown">

    <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Archive
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="archive">


        <?php

        echo   ' <li>' . anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
   
                </li>

                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
<script>
$(document).ready(function(){
    $("#export_all_table").on("click",function(){
        for(let i=1; i<=12;i++)
        {
            $("#table_"+i).click();
        }
    });
});
</script>
<style type="text/css">
    #export_all_table{
        cursor: pointer;
    }
</style>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>এ সেশনে বৃদ্ধিকৃত আদর্শ থানা শাখার নাম</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Other_এ সেশনে বৃদ্ধিকৃত আদর্শ থানা শাখার নাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-e-sathi-shakha-briddhi/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan="2">আদর্শ থানা শাখার নাম</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির র্বতমান সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2" >Acttions</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য		</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_e_sathi_shakha_briddhi->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['sathi_shakhar_nam'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-e-sathi-shakha-briddhi/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_e_sathi_shakha_briddhi@".$row['sathi_shakhar_nam']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b>এ সেশনে ঘাটতিকৃত আদর্শ থানা শাখার নাম</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Other_এ সেশনে ঘাটতিকৃত আদর্শ থানা শাখার নাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-e-sathi-shakha-ghatti/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan="2">আদর্শ থানা শাখার নাম</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির র্বতমান সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2" >ঘাটতির কারণ</td>
                                <td class="tg-pwj7" rowspan="2" >Acttions</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য		</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_e_sathi_shakha_ghatti->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['sathi_shakhar_nam'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ghattir_karon'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-e-sathi-shakha-ghatti/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_e_sathi_shakha_ghatti@".$row['sathi_shakhar_nam']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b>যে সব শিক্ষাপ্রতিষ্ঠানে সংগঠন ঘাটতি হয়েছে</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Other_যে সব শিক্ষাপ্রতিষ্ঠানে সংগঠন ঘাটতি হয়েছে_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-s-protishthan-shong-ghatti/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan="2">শিক্ষাপ্রতিষ্ঠানে নাম</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির র্বতমান সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2" >ঘাটতির কারণ</td>
                                <td class="tg-pwj7" rowspan="2" >Acttions</td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_s_protishthan_shong_ghatti->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['s_protishthaner_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ghattir_karon'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-s-protishthan-shong-ghatti/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_e_ghother_s_protishthan_shong_ghattiatti_thana@".$row['s_protishthaner_name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-izx2{border-color:black;background-color:#efefef;}
.tg .tg-pwj7{background-color:#efefef;border-color:black;}
.tg .tg-0pky{border-color:black;vertical-align:top}
.tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
.tg .tg-0lax{border-color:black;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

.table-header-rotated {
  border-collapse: collapse;
}
.table-header-rotated td {
  width: 30px;
}
.no-csstransforms .table-header-rotated td {
  padding: 5px 10px;
}
.table-header-rotated td {
  text-align: center;
  padding: 10px 5px;
  border: 1px solid #ccc;
}
.table-header-rotated td.rotate {
  height: 140px;
  white-space: nowrap;
}
 .table-header-rotated td.rotate > div {
  -webkit-transform: translate(10px, 51px) rotate(270deg);
          transform: translate(10px, 51px) rotate(270deg);
  width: 20px;
}
 .table-header-rotated td.rotate > div > span {
   
  padding: 5px 10px;
}
.table-header-rotated td.row-header {
  padding: 0 10px;
  border-bottom: 1px solid #ccc;
}
.table > tbody > tr > td {
	border: 1px solid #ccc;
}
.action_class{
    color:white;
}
.action_class:hover{
    color:white;
    text-decoration:none;
}
</style>

<script>

$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.fn.editable.defaults.ajaxOptions = {type: "get"}
$('#shaka_shompadok').editable({
    value: <?php echo (isset( $other_biggan_shompadok['shaka_shompadok']))? $other_biggan_shompadok['shaka_shompadok']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    },
       headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
});

$('#biggan_shompadok').editable({
    value: <?php echo (isset( $other_biggan_shompadok['biggan_shompadok']))? $other_biggan_shompadok['biggan_shompadok']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

$('#biggan_comittee_gothon').editable({
    value: <?php echo (isset( $other_biggan_magazine_circulation['biggan_comittee_gothon']))? $other_biggan_magazine_circulation['biggan_comittee_gothon']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

});

</script>
<script>

$(document).ready(function(){	
  $("button").on('click',function(){
      console.log("ok");
    var id=$(this).attr('id').split("@");
    var close_tr=$(this).closest('tr');
    if(id[0]=='delete' && confirm("আপনি কি কলামটি মুছে ফেলবেন?" ))
    {
        $.ajax({
        type: "GET",
        token: "<?php echo $this->security->get_csrf_token_name(); ?>",
        url:  "<?php echo admin_url('departmentsreport/delete-row') ?>",
        data: {
            'id':id[3],
            'table':id[1]
        },
        cache: false,
        success: function(data){
            console.log(data);
           close_tr.remove();
        }
        });
    }
    
  });
});

</script>
