<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মানবসম্পদ ব্যবস্থাপনা বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/manpower-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/manpower-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>


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

                <div class="table-responsive">


				<style type="text/css">
                    #export_all_table{
                        cursor: pointer;
                    }
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
</style>
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>                           
                                <td class="tg-pwj7" colspan='2'><b>মানবসম্পদ বিভাগীয় সাংগঠনিক কাঠামো</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Human_management_মানবসম্পদ বিভাগীয় সাংগঠনিক কাঠামো.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                               
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" colspan='2'> বিবরণ </td>
                                <td class="tg-y698 type_1">
                                মন্তব্য
                                 </td>
                            
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" rowspan='2'> শাখায় মানবসম্পদ বিভাগীয় কমিটি আছে কিনা? </td>
                                <td class="tg-y698 type_1">
                                হ্যাঁ
                                 </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo 
                                    $jonosheba_terget=$human_management_songothon['branch_committee']; 
                                    $total_terget=($total_terget ?? 0) + ($jonosheba_terget ?? 0);
                                    ?>
                                </td>
                            </tr>

                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                 না
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo ($total_human_management_songothon_row ?? 0 )-$human_management_songothon['branch_committee']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                মানবসম্পদ বিভাগীয় কাউন্সেলিং টিমে সদস্য সংখ্যা কত?
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_terget=$human_management_songothon['coun_team']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                বৃহত্তর আন্দোলনের মানবসম্পদ বিভাগীয় কমিটির সাথে মিটিং সংখ্যা কতটি? 
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_terget=$human_management_songothon['bivag_com_meeting']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                কত % জনশক্তির বায়োডাটা কালেকশন ও পর্যালোচনা হয়েছে?
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_terget=$human_management_songothon['per_biodata']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" rowspan='2'> নিম্নোক্ত সেক্টরভিত্তিক জনশক্তি ভাগ করে মাসভিত্তিক প্রোগ্রাম পরিকল্পনা নেওয়া হয়েছে কিনা? </td>
                                <td class="tg-y698 type_1">
                                হ্যাঁ
                                 </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_terget=$human_management_songothon['sec_man_month']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                            </tr>

                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                 না
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo ($total_human_management_songothon_row ?? 0)-$human_management_songothon['sec_man_month']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                            </tr>
                        </table>
                        				
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='7'><b>জনবল সরবরাহের সেক্টরসমূহ</b></td>
                                <td class="tg-pwj7" colspan="3">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Human_management_জনবল সরবরাহের সেক্টরসমূহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" colspan='2' rowspan='2'> সেক্টরসমূহ </td>
                                <td class="tg-y698 type_1" colspan='2'>সেক্টরভিত্তিক জনশক্তি বাছাই সংখ্যা</td>
                                <td class="tg-pwj7" colspan='2'>মোটিভেশনাল প্রোগ্রাম</td>
                                <td class="tg-y698 type_1" colspan='2'>প্রাতিষ্ঠানিক প্রশিক্ষণ গ্রহণ</td>
                                <td class="tg-y698 type_1" colspan='2'>প্রতিযোগিতামূলক পরীক্ষার ফলাফল</td>
                            </tr>
                            								
                            <tr>                           
                                <td class="tg-y698 type_1">টার্গেট</td>
                                <td class="tg-pwj7" colspan=''>বাছাই</td>
                                <td class="tg-y698 type_1">সংখ্যা</td>
                                <td class="tg-y698 type_1">উপস্থিতি</td>
                                <td class="tg-y698 type_1">সাংগঠনিক</td>
                                <td class="tg-y698 type_1">সাধারণ</td>
                                <td class="tg-pwj7" colspan=''>অংশগ্রহণ</td>
                                <td class="tg-y698 type_1">উত্তীর্ণ সংখ্যা</td>
                            </tr>
                            <?php 
                                $total_terget=0;
                                $total_bachai=0;
                                $total_num=0;
                                $total_pre=0;
                                $total_sang=0;
                                $total_shadha=0;
                                $total_ongsho=0;
                                $total_uttirno=0;
                            ?>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                জনসেবা
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_terget=$human_managemant_jonobol_shorboraho['jonosheba_terget']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_bachai=$human_managemant_jonobol_shorboraho['jonosheba_bachai']; $total_bachai=$total_bachai + $jonosheba_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_num=$human_managemant_jonobol_shorboraho['jonosheba_num']; $total_num=$total_num + $jonosheba_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_pre=$human_managemant_jonobol_shorboraho['jonosheba_pre']; $total_pre=$total_pre + $jonosheba_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_sang=$human_managemant_jonobol_shorboraho['jonosheba_sang']; $total_sang=$total_sang + $jonosheba_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_shadha=$human_managemant_jonobol_shorboraho['jonosheba_shadha']; $total_shadha=$total_shadha + $jonosheba_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_ongsho=$human_managemant_jonobol_shorboraho['jonosheba_ongsho']; $total_ongsho=$total_ongsho + $jonosheba_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_uttirno=$human_managemant_jonobol_shorboraho['jonosheba_uttirno']; $total_uttirno=$total_uttirno + $jonosheba_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                সমাজসেবা
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_terget=$human_managemant_jonobol_shorboraho['shomajsheba_terget']; $total_terget=$total_terget + $shomajsheba_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_bachai=$human_managemant_jonobol_shorboraho['shomajsheba_bachai']; $total_bachai=$total_bachai + $shomajsheba_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_num=$human_managemant_jonobol_shorboraho['shomajsheba_num']; $total_num=$total_num + $shomajsheba_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_pre=$human_managemant_jonobol_shorboraho['shomajsheba_pre']; $total_pre=$total_pre + $shomajsheba_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_sang=$human_managemant_jonobol_shorboraho['shomajsheba_sang']; $total_sang=$total_sang + $shomajsheba_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_shadha=$human_managemant_jonobol_shorboraho['shomajsheba_shadha']; $total_shadha=$total_shadha + $shomajsheba_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_ongsho=$human_managemant_jonobol_shorboraho['shomajsheba_ongsho']; $total_ongsho=$total_ongsho + $shomajsheba_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $shomajsheba_uttirno=$human_managemant_jonobol_shorboraho['shomajsheba_uttirno']; $total_uttirno=$total_uttirno + $shomajsheba_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" rowspan='2'>
                                মানবসেবা
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                মানবসেবা কর্মকর্তা
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_terget=$human_managemant_jonobol_shorboraho['manobsheba_terget']; $total_terget=$total_terget + $manobsheba_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_bachai=$human_managemant_jonobol_shorboraho['manobsheba_bachai']; $total_bachai=$total_bachai + $manobsheba_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_num=$human_managemant_jonobol_shorboraho['manobsheba_num']; $total_num=$total_num + $manobsheba_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_pre=$human_managemant_jonobol_shorboraho['manobsheba_pre']; $total_pre=$total_pre + $manobsheba_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_sang=$human_managemant_jonobol_shorboraho['manobsheba_sang']; $total_sang=$total_sang + $manobsheba_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_shadha=$human_managemant_jonobol_shorboraho['manobsheba_shadha']; $total_shadha=$total_shadha + $manobsheba_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_ongsho=$human_managemant_jonobol_shorboraho['manobsheba_ongsho']; $total_ongsho=$total_ongsho + $manobsheba_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $manobsheba_uttirno=$human_managemant_jonobol_shorboraho['manobsheba_uttirno']; $total_uttirno=$total_uttirno + $manobsheba_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                আইনজীবী
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo $law_terget=$human_managemant_jonobol_shorboraho['law_terget']; $total_terget=$total_terget + $law_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $law_bachai=$human_managemant_jonobol_shorboraho['law_bachai']; $total_bachai=$total_bachai + $law_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $law_num=$human_managemant_jonobol_shorboraho['law_num']; $total_num=$total_num + $law_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $law_pre=$human_managemant_jonobol_shorboraho['law_pre']; $total_pre=$total_pre + $law_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $law_sang=$human_managemant_jonobol_shorboraho['law_sang']; $total_sang=$total_sang + $law_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $law_shadha=$human_managemant_jonobol_shorboraho['law_shadha']; $total_shadha=$total_shadha + $law_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $law_ongsho=$human_managemant_jonobol_shorboraho['law_ongsho']; $total_ongsho=$total_ongsho + $law_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $law_uttirno=$human_managemant_jonobol_shorboraho['law_uttirno']; $total_uttirno=$total_uttirno + $law_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                তথ্যসেবা
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_terget=$human_managemant_jonobol_shorboraho['totthosheba_terget']; $total_terget=$total_terget + $totthosheba_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_bachai=$human_managemant_jonobol_shorboraho['totthosheba_bachai']; $total_bachai=$total_bachai + $totthosheba_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_num=$human_managemant_jonobol_shorboraho['totthosheba_num']; $total_num=$total_num + $totthosheba_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_pre=$human_managemant_jonobol_shorboraho['totthosheba_pre']; $total_pre=$total_pre + $totthosheba_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_sang=$human_managemant_jonobol_shorboraho['totthosheba_sang']; $total_sang=$total_sang + $totthosheba_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_shadha=$human_managemant_jonobol_shorboraho['totthosheba_shadha']; $total_shadha=$total_shadha + $totthosheba_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_ongsho=$human_managemant_jonobol_shorboraho['totthosheba_ongsho']; $total_ongsho=$total_ongsho + $totthosheba_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $totthosheba_uttirno=$human_managemant_jonobol_shorboraho['totthosheba_uttirno']; $total_uttirno=$total_uttirno + $totthosheba_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" rowspan='7'>
                                শিক্ষক
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                বিশ্ববিদ্যালয় শিক্ষক (সরকারি)
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_terget=$human_managemant_jonobol_shorboraho['uni_teacher_govt_terget']; $total_terget=$total_terget + $uni_teacher_govt_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_bachai=$human_managemant_jonobol_shorboraho['uni_teacher_govt_bachai']; $total_bachai=$total_bachai + $uni_teacher_govt_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_num=$human_managemant_jonobol_shorboraho['uni_teacher_govt_num']; $total_num=$total_num + $uni_teacher_govt_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_pre=$human_managemant_jonobol_shorboraho['uni_teacher_govt_pre']; $total_pre=$total_pre + $uni_teacher_govt_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_sang=$human_managemant_jonobol_shorboraho['uni_teacher_govt_sang']; $total_sang=$total_sang + $uni_teacher_govt_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_shadha=$human_managemant_jonobol_shorboraho['uni_teacher_govt_shadha']; $total_shadha=$total_shadha + $uni_teacher_govt_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_ongsho=$human_managemant_jonobol_shorboraho['uni_teacher_govt_ongsho']; $total_ongsho=$total_ongsho + $uni_teacher_govt_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_govt_uttirno=$human_managemant_jonobol_shorboraho['uni_teacher_govt_uttirno']; $total_uttirno=$total_uttirno + $uni_teacher_govt_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                বিশ্ববিদ্যালয় শিক্ষক (বেসরকারি)
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_terget=$human_managemant_jonobol_shorboraho['uni_teacher_private_terget']; $total_terget=$total_terget + $uni_teacher_private_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_bachai=$human_managemant_jonobol_shorboraho['uni_teacher_private_bachai']; $total_bachai=$total_bachai + $uni_teacher_private_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_num=$human_managemant_jonobol_shorboraho['uni_teacher_private_num']; $total_num=$total_num + $uni_teacher_private_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_pre=$human_managemant_jonobol_shorboraho['uni_teacher_private_pre']; $total_pre=$total_pre + $uni_teacher_private_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_sang=$human_managemant_jonobol_shorboraho['uni_teacher_private_sang']; $total_sang=$total_sang + $uni_teacher_private_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_shadha=$human_managemant_jonobol_shorboraho['uni_teacher_private_shadha']; $total_shadha=$total_shadha + $uni_teacher_private_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_ongsho=$human_managemant_jonobol_shorboraho['uni_teacher_private_ongsho']; $total_ongsho=$total_ongsho + $uni_teacher_private_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $uni_teacher_private_uttirno=$human_managemant_jonobol_shorboraho['uni_teacher_private_uttirno']; $total_uttirno=$total_uttirno + $uni_teacher_private_uttirno;?>
                                </td>
                            </tr>
                            
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মেডিকেল কলেজ শিক্ষক (বেসরকারি)
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_terget=$human_managemant_jonobol_shorboraho['medi_teacher_terget']; $total_terget=$total_terget + $medi_teacher_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_bachai=$human_managemant_jonobol_shorboraho['medi_teacher_bachai']; $total_bachai=$total_bachai + $medi_teacher_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_num=$human_managemant_jonobol_shorboraho['medi_teacher_num']; $total_num=$total_num + $medi_teacher_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_pre=$human_managemant_jonobol_shorboraho['medi_teacher_pre']; $total_pre=$total_pre + $medi_teacher_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_sang=$human_managemant_jonobol_shorboraho['medi_teacher_sang']; $total_sang=$total_sang + $medi_teacher_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_shadha=$human_managemant_jonobol_shorboraho['medi_teacher_shadha']; $total_shadha=$total_shadha + $medi_teacher_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_ongsho=$human_managemant_jonobol_shorboraho['medi_teacher_ongsho']; $total_ongsho=$total_ongsho + $medi_teacher_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $medi_teacher_uttirno=$human_managemant_jonobol_shorboraho['medi_teacher_uttirno']; $total_uttirno=$total_uttirno + $medi_teacher_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                কলেজ শিক্ষক (বেসরকারি)
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_terget=$human_managemant_jonobol_shorboraho['college_teacher_terget']; $total_terget=$total_terget + $college_teacher_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_bachai=$human_managemant_jonobol_shorboraho['college_teacher_bachai']; $total_bachai=$total_bachai + $college_teacher_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_num=$human_managemant_jonobol_shorboraho['college_teacher_num']; $total_num=$total_num + $college_teacher_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_pre=$human_managemant_jonobol_shorboraho['college_teacher_pre']; $total_pre=$total_pre + $college_teacher_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_sang=$human_managemant_jonobol_shorboraho['college_teacher_sang']; $total_sang=$total_sang + $college_teacher_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_shadha=$human_managemant_jonobol_shorboraho['college_teacher_shadha']; $total_shadha=$total_shadha + $college_teacher_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_ongsho=$human_managemant_jonobol_shorboraho['college_teacher_ongsho']; $total_ongsho=$total_ongsho + $college_teacher_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $college_teacher_uttirno=$human_managemant_jonobol_shorboraho['college_teacher_uttirno']; $total_uttirno=$total_uttirno + $college_teacher_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                কারিগরি কলেজ শিক্ষক (সরকারি)
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_terget=$human_managemant_jonobol_shorboraho['karigori_teacher_terget']; $total_terget=$total_terget + $karigori_teacher_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_bachai=$human_managemant_jonobol_shorboraho['karigori_teacher_bachai']; $total_bachai=$total_bachai + $karigori_teacher_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_num=$human_managemant_jonobol_shorboraho['karigori_teacher_num']; $total_num=$total_num + $karigori_teacher_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_pre=$human_managemant_jonobol_shorboraho['karigori_teacher_pre']; $total_pre=$total_pre + $karigori_teacher_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_sang=$human_managemant_jonobol_shorboraho['karigori_teacher_sang']; $total_sang=$total_sang + $karigori_teacher_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_shadha=$human_managemant_jonobol_shorboraho['karigori_teacher_shadha']; $total_shadha=$total_shadha + $karigori_teacher_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_ongsho=$human_managemant_jonobol_shorboraho['karigori_teacher_ongsho']; $total_ongsho=$total_ongsho + $karigori_teacher_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $karigori_teacher_uttirno=$human_managemant_jonobol_shorboraho['karigori_teacher_uttirno']; $total_uttirno=$total_uttirno + $karigori_teacher_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মাধ্যমিক বিদ্যালয় শিক্ষক (সরকারি)
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_terget=$human_managemant_jonobol_shorboraho['maddhomik_teacher_terget']; $total_terget=$total_terget + $maddhomik_teacher_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_bachai=$human_managemant_jonobol_shorboraho['maddhomik_teacher_bachai']; $total_bachai=$total_bachai + $maddhomik_teacher_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_num=$human_managemant_jonobol_shorboraho['maddhomik_teacher_num']; $total_num=$total_num + $maddhomik_teacher_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_pre=$human_managemant_jonobol_shorboraho['maddhomik_teacher_pre']; $total_pre=$total_pre + $maddhomik_teacher_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_sang=$human_managemant_jonobol_shorboraho['maddhomik_teacher_sang']; $total_sang=$total_sang + $maddhomik_teacher_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_shadha=$human_managemant_jonobol_shorboraho['maddhomik_teacher_shadha']; $total_shadha=$total_shadha + $maddhomik_teacher_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_ongsho=$human_managemant_jonobol_shorboraho['maddhomik_teacher_ongsho']; $total_ongsho=$total_ongsho + $maddhomik_teacher_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $maddhomik_teacher_uttirno=$human_managemant_jonobol_shorboraho['maddhomik_teacher_uttirno']; $total_uttirno=$total_uttirno + $maddhomik_teacher_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মাদরাসা শিক্ষক
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_terget=$human_managemant_jonobol_shorboraho['madrasah_teacher_terget']; $total_terget=$total_terget + $madrasah_teacher_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_bachai=$human_managemant_jonobol_shorboraho['madrasah_teacher_bachai']; $total_bachai=$total_bachai + $madrasah_teacher_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_num=$human_managemant_jonobol_shorboraho['madrasah_teacher_num']; $total_num=$total_num + $madrasah_teacher_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_pre=$human_managemant_jonobol_shorboraho['madrasah_teacher_pre']; $total_pre=$total_pre + $madrasah_teacher_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_sang=$human_managemant_jonobol_shorboraho['madrasah_teacher_sang']; $total_sang=$total_sang + $madrasah_teacher_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_shadha=$human_managemant_jonobol_shorboraho['madrasah_teacher_shadha']; $total_shadha=$total_shadha + $madrasah_teacher_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_ongsho=$human_managemant_jonobol_shorboraho['madrasah_teacher_ongsho']; $total_ongsho=$total_ongsho + $madrasah_teacher_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $madrasah_teacher_uttirno=$human_managemant_jonobol_shorboraho['madrasah_teacher_uttirno']; $total_uttirno=$total_uttirno + $madrasah_teacher_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                সাহিত্য ও সংস্কৃতি	
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                সাংস্কৃতিক কর্মী
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_terget=$human_managemant_jonobol_shorboraho['jonosheba_terget']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_bachai=$human_managemant_jonobol_shorboraho['jonosheba_bachai']; $total_bachai=$total_bachai + $jonosheba_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_num=$human_managemant_jonobol_shorboraho['jonosheba_num']; $total_num=$total_num + $jonosheba_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_pre=$human_managemant_jonobol_shorboraho['jonosheba_pre']; $total_pre=$total_pre + $jonosheba_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_sang=$human_managemant_jonobol_shorboraho['jonosheba_sang']; $total_sang=$total_sang + $jonosheba_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_shadha=$human_managemant_jonobol_shorboraho['jonosheba_shadha']; $total_shadha=$total_shadha + $jonosheba_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_ongsho=$human_managemant_jonobol_shorboraho['jonosheba_ongsho']; $total_ongsho=$total_ongsho + $jonosheba_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_uttirno=$human_managemant_jonobol_shorboraho['jonosheba_uttirno']; $total_uttirno=$total_uttirno + $jonosheba_uttirno;?>
                                </td>
                            </tr>
                            <tr>                   
                                <td class="tg-y698 tg-0pky" >
                                ক্রীড়া ব্যক্তিত্ব	
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                খেলোয়ার
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_terget=$human_managemant_jonobol_shorboraho['jonosheba_terget']; $total_terget=$total_terget + $jonosheba_terget;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_bachai=$human_managemant_jonobol_shorboraho['jonosheba_bachai']; $total_bachai=$total_bachai + $jonosheba_bachai;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_num=$human_managemant_jonobol_shorboraho['jonosheba_num']; $total_num=$total_num + $jonosheba_num;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_pre=$human_managemant_jonobol_shorboraho['jonosheba_pre']; $total_pre=$total_pre + $jonosheba_pre;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_sang=$human_managemant_jonobol_shorboraho['jonosheba_sang']; $total_sang=$total_sang + $jonosheba_sang;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_shadha=$human_managemant_jonobol_shorboraho['jonosheba_shadha']; $total_shadha=$total_shadha + $jonosheba_shadha;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_ongsho=$human_managemant_jonobol_shorboraho['jonosheba_ongsho']; $total_ongsho=$total_ongsho + $jonosheba_ongsho;?>
                                </td>
                                 <td class="tg-0pky  type_6">
                                    <?php echo $jonosheba_uttirno=$human_managemant_jonobol_shorboraho['jonosheba_uttirno']; $total_uttirno=$total_uttirno + $jonosheba_uttirno;?>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                সর্বমোট
                                </td>
                
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_terget;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_bachai;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_num;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_pre;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_sang;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_shadha;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_ongsho;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_uttirno;?>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Human_management_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_central_s=$human_management_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$human_management_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$human_management_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$human_management_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$human_management_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$human_management_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$human_management_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$human_management_training_program['kormoshala_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
