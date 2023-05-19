<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'আইন বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষান্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষান্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        
                    </ul>
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
                    <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Law_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                          $pk = (isset($law_summit['id']))?$law_summit['id']:'';
                          
                      ?>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'>আইন বিভাগে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                              <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_center_manpower_num" 
                                    data-title="Enter">
                                    <?php echo $law_stu_center_manpower_num=(isset( $law_summit['law_stu_center_manpower_num']))? $law_summit['law_stu_center_manpower_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_center_manpower_pre" 
                                    data-title="Enter">
                                    <?php echo $law_stu_center_manpower_pre=(isset( $law_summit['law_stu_center_manpower_pre']))? $law_summit['law_stu_center_manpower_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_center_manpower_pre!=0 && $law_stu_center_manpower_num!=0 )?$law_stu_center_manpower_pre / $law_stu_center_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_center_general_num" 
                                    data-title="Enter">
                                    <?php echo $law_stu_center_general_num=(isset( $law_summit['law_stu_center_general_num']))? $law_summit['law_stu_center_general_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_center_general_pre" 
                                    data-title="Enter">
                                    <?php echo $law_stu_center_general_pre=(isset( $law_summit['law_stu_center_general_pre']))? $law_summit['law_stu_center_general_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_center_general_pre!=0 && $law_stu_center_general_num!=0 )?$law_stu_center_general_pre / $law_stu_center_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> আইন বিভাগে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_shakha_manpower_num" 
                                    data-title="Enter">
                                    <?php echo $law_stu_shakha_manpower_num=(isset( $law_summit['law_stu_shakha_manpower_num']))? $law_summit['law_stu_shakha_manpower_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_shakha_manpower_pre" 
                                    data-title="Enter">
                                    <?php echo $law_stu_shakha_manpower_pre=(isset( $law_summit['law_stu_shakha_manpower_pre']))? $law_summit['law_stu_shakha_manpower_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_shakha_manpower_pre!=0 && $law_stu_shakha_manpower_num!=0 )?$law_stu_shakha_manpower_pre / $law_stu_shakha_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_shakha_general_num" 
                                    data-title="Enter">
                                    <?php echo $law_stu_shakha_general_num=(isset( $law_summit['law_stu_shakha_general_num']))? $law_summit['law_stu_shakha_general_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="law_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_stu_shakha_general_pre" 
                                    data-title="Enter">
                                    <?php echo $law_stu_shakha_general_pre=(isset( $law_summit['law_stu_shakha_general_pre']))? $law_summit['law_stu_shakha_general_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_shakha_general_pre!=0 && $law_stu_shakha_general_num!=0 )?$law_stu_shakha_general_pre / $law_stu_shakha_general_num:0 ?>
                                </td>
                            </tr>
                            
                            
                    </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                        <tr>
                            <td class="tg-pwj7" colspan="10"><b>কারাগার সংক্রান্ত (গ্রেফতার)</b> </td>
                            <td class="tg-pwj7" colspan="5">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Law_কারাগার সংক্রান্ত (গ্রেফতার)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                           
                                <td class="tg-pwj7" colspan="5"  style="text-align:center;">শুধু <?php echo $report_info['year']; ?> সালে গ্রেফতার  </td>
                                <td class="tg-pwj7" colspan="5" style="text-align:center;"><?php echo $report_info['year'] -1; ?> পর্যন্ত গ্রেফতার  </td>
                                <td class="tg-pwj7" colspan="5" style="text-align:center;">বর্তমান কারাগারে  </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                            </tr>


                            <?php
                            $pk = (isset($law_karagar_greftar['id']))?$law_karagar_greftar['id']:'';
                            // var_dump($law_amader_bipokkhe_mamla) ;
                            ?>


                            <tr>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_member" data-title="Enter">
                                    <?php echo $t1_member =  (isset( $law_karagar_greftar['t1_member']))? $law_karagar_greftar['t1_member']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_sathi" data-title="Enter">
                                    <?php echo $t1_sathi =  (isset( $law_karagar_greftar['t1_sathi']))? $law_karagar_greftar['t1_sathi']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_kormi" data-title="Enter">
                                    <?php echo $t1_kormi =  (isset( $law_karagar_greftar['t1_kormi']))? $law_karagar_greftar['t1_kormi']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_shomorthok" data-title="Enter">
                                    <?php echo $t1_shomorthok =  (isset( $law_karagar_greftar['t1_shomorthok']))? $law_karagar_greftar['t1_shomorthok']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($t1_member+$t1_sathi+$t1_kormi+$t1_shomorthok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_member" data-title="Enter">
                                    <?php echo $t2_member =  (isset( $law_karagar_greftar['t2_member']))? $law_karagar_greftar['t2_member']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_sathi" data-title="Enter">
                                    <?php echo $t2_sathi =  (isset( $law_karagar_greftar['t2_sathi']))? $law_karagar_greftar['t2_sathi']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_kormi" data-title="Enter">
                                    <?php echo $t2_kormi =  (isset( $law_karagar_greftar['t2_kormi']))? $law_karagar_greftar['t2_kormi']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_shomorthok" data-title="Enter">
                                    <?php echo $t2_shomorthok =  (isset( $law_karagar_greftar['t2_shomorthok']))? $law_karagar_greftar['t2_shomorthok']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($t2_member+$t2_sathi+$t2_kormi+$t2_shomorthok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t3_member" data-title="Enter">
                                    <?php echo $t3_member =  (isset( $law_karagar_greftar['t3_member']))? $law_karagar_greftar['t3_member']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t3_sathi" data-title="Enter">
                                    <?php echo $t3_sathi =  (isset( $law_karagar_greftar['t3_sathi']))? $law_karagar_greftar['t3_sathi']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t3_kormi" data-title="Enter">
                                    <?php echo $t3_kormi =  (isset( $law_karagar_greftar['t3_kormi']))? $law_karagar_greftar['t3_kormi']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_karagar_greftar" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t3_shomorthok" data-title="Enter">
                                    <?php echo $t3_shomorthok =  (isset( $law_karagar_greftar['t3_shomorthok']))? $law_karagar_greftar['t3_shomorthok']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($t3_member+$t3_sathi+$t3_kormi+$t3_shomorthok) ?>
                                </td>
                                
                            </tr>
                 </table>
                 <table class="tg table table-header-rotated" id="testTable2">
                 <tr>
                    <td class="tg-pwj7" colspan="6"><b>আমাদের পক্ষ থেকে মামলা সংক্রান্ত</b> </td>
                    <td class="tg-pwj7" colspan="2">
                        <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Law_আমাদের পক্ষ থেকে মামলা সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                    </td>
                    <td class="tg-pwj7" colspan="2">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-law-amader-pokkhe-mamla/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                </tr>
                 <tr>
                   <td class="tg-pwj7">ক্রম</td>
                   <td class="tg-pwj7 "><div><span>মামলার নাম্বার </span></div></td>
                   <td class="tg-pwj7">তারিখ</td>
                   <td class="tg-pwj7 " ><div><span>বাদীর নাম </span></div></td>
                   <td class="tg-pwj7">আসামির সংখ্যা</td>
                   <td class="tg-pwj7 "><div><span>আসামির নাম ও পরিচয় </span></div></td>
                   
                   <td class="tg-pwj7 " ><div><span>রায় হয়েছে কিনা</span></div></td>
                   <td class="tg-pwj7 "><div><span>রায়ের ফলাফল </span></div></td>
                   <td class="tg-pwj7 "><div><span>বর্তমান অবস্থা </span></div></td>
                   <td class="tg-pwj7 "><div><span>Actions </span></div></td>
           
               </tr>
              
            
               <?php 
                                $i=0;
                            foreach($law_amader_pokkhe_mamla->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                
                                    <td class="tg-0pky type_1"><?php echo $row['mamlar_number'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['tarikh'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['badir_name'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ashami_num'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ashami_porichoy'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ray_hoyeche'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['rayer_folafol'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['bortoman'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-law-amader-pokkhe-mamla/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@law_amader_pokkhe_mamla@".$row['mamlar_number']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>

                </table>
                <table class="tg table table-header-rotated" id="testTable3">
                <td class="tg-pwj7" colspan='4'><b>গুম, খুন, হামলা নির্যাতন বিষয়ে আমাদের পক্ষ থেকে পত্রিকায় প্রচারসংক্রান্ত :</b></td>
                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Law_গুম, খুন, হামলা নির্যাতন বিষয়ে আমাদের_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                <td class="tg-pwj7">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-law-gum-khun-hamla/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                        </tr>
                            
                    <tr>
                            <td class="tg-pwj7">ক্রম</td>
                            
                            <td class="tg-pwj7" >ঘটনার তারিখ</td>
                            <td class="tg-pwj7 "><div><span>প্রচারের তারিখ </span></div></td>
                            <td class="tg-pwj7 "  ><div><span>পত্রিকার নাম</span></div></td>
                            
                            <td class="tg-pwj7 " ><div><span>যার/যাদের ব্যাপারে প্রচার </span></div></td>
                            <td class="tg-pwj7 " ><div><span>সাংবাদিক সম্মেলনে হয়েছে কিনা? </span></div></td>
                            <td class="tg-pwj7 " ><div><span> Actions </span></div></td>
                    
                        </tr>
                        <?php 
                                $i=0;
                            foreach($law_gum_khun_hamla->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                   
                                    <td class="tg-0pky type_1"><?php echo $row['ghotonar_tarikh'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['procharer_tarikh'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['potrikar_nam'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['jader_bepare_prochar'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['shong_shommelon'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-law-gum-khun-hamla/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@law_gum_khun_hamla@".$row['mamla_nghotonar_tarikhum']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                   
                </table>
                <table class="tg table table-header-rotated" id="testTable4">
                <tr>
                    <td class="tg-pwj7" colspan='4'><b>নথি-সংক্রান্ত (শাখায় নিম্ন নথি সংরক্ষিত আছে কতটির) :</b></td>
                    <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Law_নথি-সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                    <td class="tg-pwj7">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-law-shakhar-shongrokkhon/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                </tr>
                
                    <tr>
                        <td class="tg-pwj7">ক্রম</td>
                       
                        <td class="tg-pwj7"> মোট মামলা সংখ্যা</td>
            
                        <td class="tg-pwj7" ><div><span>ফরওয়ার্ডিং</span></div></td>
                        <td class="tg-pwj7"><div><span>এজহার </span></div></td>
                        <td class="tg-pwj7" ><div><span>চার্জশিট </span></div></td>
                        <td class="tg-pwj7" ><div><span>রায়ের কপি </span></div></td>
                        <td class="tg-pwj7" ><div><span>Actions </span></div></td>
                        
                    </tr>
                    <?php 
                                $i=0;
                            foreach($law_shakhar_shongrokkhon->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                  
                                    <td class="tg-0pky type_1"><?php echo $row['total_mamla'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['forwarding'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['ejhar'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['chargeshit'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['rayer_copy'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-law-shakhar-shongrokkhon/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@law_shakhar_shongrokkhon@".$row['total_mamla']."@".$row['id'] ?>'>Delete</button>
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
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-wlaw:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
    }

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
        hlaw: 140px;
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
    }.action_class{
    color:white;
}
.action_class:hover{
    color:white;
    text-decoration:none;
}
</style>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>

$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.fn.editable.defaults.ajaxOptions = {type: "get"}
$('#info_house').editable({
    value: <?php echo (isset( $information_house['info_house']))? $information_house['info_house']:2; ?>,    
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

$('#manpower_active_bool').editable({
    value: <?php echo (isset( $human_rights_branch_info['manpower_active_bool']))? $human_rights_branch_info['manpower_active_bool']:2; ?>,    
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

$('#human_rights_committee').editable({
    value: <?php echo (isset( $human_rights_branch_info['human_rights_committee']))? $human_rights_branch_info['human_rights_committee']:2; ?>,    
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
