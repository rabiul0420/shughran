<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মানবসম্পদ ব্যবস্থাপনা বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষান্মাসিক ' . $report_info['year']);
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
            echo   ' <li>' . anchor('admin/departmentsreport/manpower-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষান্মাসিক ' . $i) . ' </li>';
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
  
    <script>
	
$(function(){
  
   $.fn.editable.defaults.ajaxOptions = {type: "get"}
    $('#status5').editable({
        value: <?php echo (isset( $human_management_songothon['branch_committee']))? $human_management_songothon['branch_committee']:3; ?>,    
        source: [
              {value: 1, text: 'হ্যাঁ'},
              {value: 0, text: 'না'},
              {value: 3, text: 'Enter'},
              
           ],
           success: function(response, newValue) {
        response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
       
    });
    $('#status6').editable({
        value: <?php echo (isset( $human_management_songothon['sec_man_month']))? $human_management_songothon['sec_man_month']:3; ?>,    
        source: [
              {value: 1, text: 'হ্যাঁ'},
              {value: 0, text: 'না'},
              {value: 3, text: 'Enter'},
              
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
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>                           
                                <td class="tg-pwj7" colspan=''><b>মানবসম্পদ বিভাগীয় সাংগঠনিক কাঠামো</b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Human_management_মানবসম্পদ বিভাগীয় সাংগঠনিক কাঠামো_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <?php
                            $pk = (isset($human_management_songothon['id']))?$human_management_songothon['id']:"";
                            ?>
                            <tr>                           
                                <td class="tg-pwj7" colspan=''> বিবরণ </td>
                                <td class="tg-y698 type_1">
                                মন্তব্য
                                 </td>
                            
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" rowspan=''> শাখায় মানবসম্পদ বিভাগীয় কমিটি আছে কিনা? </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"   id="status5" class="editable editable-click"  data-type="select" 
                                    data-table="human_management_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id );?>" 
                                    data-name="branch_committee@human_management_songothon" 
                                    data-title="শাখায় মানবসম্পদ বিভাগীয় কমিটি আছে কিনা?">  </a>
                                </td>
                            </tr>

                        
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan=''>
                                মানবসম্পদ বিভাগীয় কাউন্সেলিং টিমে সদস্য সংখ্যা কত?
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_management_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="coun_team" 
                                    data-title="Enter"><?php echo $coun_team=(isset( $human_management_songothon['coun_team']))? $human_management_songothon['coun_team']:0; $total_terget = $total_terget+ $jonosheba_terget; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan=''>
                                বৃহত্তর আন্দোলনের মানবসম্পদ বিভাগীয় কমিটির সাথে মিটিং সংখ্যা কতটি? 
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_management_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="bivag_com_meeting" 
                                    data-title="Enter"><?php echo $bivag_com_meeting=(isset( $human_management_songothon['bivag_com_meeting']))? $human_management_songothon['bivag_com_meeting']:0; $total_terget = $total_terget+ $jonosheba_terget; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan=''>
                                কত % জনশক্তির বায়োডাটা কালেকশন ও পর্যালোচনা হয়েছে?
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_management_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="per_biodata" 
                                    data-title="Enter"><?php echo $per_biodata=(isset( $human_management_songothon['per_biodata']))? $human_management_songothon['per_biodata']:0; $total_terget = $total_terget+ $jonosheba_terget; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" rowspan=''> নিম্নোক্ত সেক্টরভিত্তিক জনশক্তি ভাগ করে মাসভিত্তিক প্রোগ্রাম পরিকল্পনা নেওয়া হয়েছে কিনা? </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  id="status6" class="editable editable-click"  data-type="select" 
                                    data-table="human_management_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id );?>" 
                                    data-name="sec_man_month@human_management_songothon" 
                                    data-title="নিম্নোক্ত সেক্টরভিত্তিক জনশক্তি ভাগ করে মাসভিত্তিক প্রোগ্রাম পরিকল্পনা নেওয়া হয়েছে কিনা?">  </a>
                                </td>
                                </td>
                            </tr>

                         
                        </table>
                        				
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='7'><b>জনবল সরবরাহের সেক্টরসমূহ</b></td>
                                <td class="tg-pwj7" colspan="3">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Human_management_জনবল সরবরাহের সেক্টরসমূহ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            $pk = (isset($human_managemant_jonobol_shorboraho['id']))?$human_managemant_jonobol_shorboraho['id']:"";
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
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_terget" 
                                    data-title="Enter"><?php echo $jonosheba_terget=(isset( $human_managemant_jonobol_shorboraho['jonosheba_terget']))? $human_managemant_jonobol_shorboraho['jonosheba_terget']:0; $total_terget = $total_terget+ $jonosheba_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_bachai" 
                                    data-title="Enter"><?php echo $jonosheba_bachai=(isset( $human_managemant_jonobol_shorboraho['jonosheba_bachai']))? $human_managemant_jonobol_shorboraho['jonosheba_bachai']:0; $total_bachai = $total_bachai+ $jonosheba_bachai;?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_num" 
                                    data-title="Enter"><?php echo $jonosheba_num=(isset( $human_managemant_jonobol_shorboraho['jonosheba_num']))? $human_managemant_jonobol_shorboraho['jonosheba_num']:0; $total_num = $total_num+ $jonosheba_num;?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_pre" 
                                    data-title="Enter"><?php echo $jonosheba_pre=(isset( $human_managemant_jonobol_shorboraho['jonosheba_pre']))? $human_managemant_jonobol_shorboraho['jonosheba_pre']:0; $total_pre = $total_pre+ $jonosheba_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_sang" 
                                    data-title="Enter"><?php echo $jonosheba_sang=(isset( $human_managemant_jonobol_shorboraho['jonosheba_sang']))? $human_managemant_jonobol_shorboraho['jonosheba_sang']:0; $total_sang = $total_sang+ $jonosheba_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_shadha" 
                                    data-title="Enter"><?php echo $jonosheba_shadha=(isset( $human_managemant_jonobol_shorboraho['jonosheba_shadha']))? $human_managemant_jonobol_shorboraho['jonosheba_shadha']:0; $total_shadha = $total_shadha+ $jonosheba_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_ongsho" 
                                    data-title="Enter"><?php echo $jonosheba_ongsho=(isset( $human_managemant_jonobol_shorboraho['jonosheba_ongsho']))? $human_managemant_jonobol_shorboraho['jonosheba_ongsho']:0; $total_ongsho = $total_ongsho+ $jonosheba_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="jonosheba_uttirno" 
                                    data-title="Enter"><?php echo $jonosheba_uttirno=(isset( $human_managemant_jonobol_shorboraho['jonosheba_uttirno']))? $human_managemant_jonobol_shorboraho['jonosheba_uttirno']:0; $total_uttirno = $total_uttirno+ $jonosheba_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <?php 


                            ?>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                সমাজসেবা
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_terget" 
                                    data-title="Enter"><?php echo $shomajsheba_terget=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_terget']))? $human_managemant_jonobol_shorboraho['shomajsheba_terget']:0; $total_terget = $total_terget+ $shomajsheba_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_bachai" 
                                    data-title="Enter"><?php echo $shomajsheba_bachai=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_bachai']))? $human_managemant_jonobol_shorboraho['shomajsheba_bachai']:0; $total_bachai = $total_bachai+ $shomajsheba_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_num" 
                                    data-title="Enter"><?php echo $shomajsheba_num=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_num']))? $human_managemant_jonobol_shorboraho['shomajsheba_num']:0; $total_num = $total_num+ $shomajsheba_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_pre" 
                                    data-title="Enter"><?php echo $shomajsheba_pre=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_pre']))? $human_managemant_jonobol_shorboraho['shomajsheba_pre']:0; $total_pre = $total_pre+ $shomajsheba_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_sang" 
                                    data-title="Enter"><?php echo $shomajsheba_sang=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_sang']))? $human_managemant_jonobol_shorboraho['shomajsheba_sang']:0; $total_sang = $total_sang+ $shomajsheba_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_shadha" 
                                    data-title="Enter"><?php echo $shomajsheba_shadha=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_shadha']))? $human_managemant_jonobol_shorboraho['shomajsheba_shadha']:0; $total_shadha = $total_shadha+ $shomajsheba_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_ongsho" 
                                    data-title="Enter"><?php echo $shomajsheba_ongsho=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_ongsho']))? $human_managemant_jonobol_shorboraho['shomajsheba_ongsho']:0; $total_ongsho = $total_ongsho+ $shomajsheba_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shomajsheba_uttirno" 
                                    data-title="Enter"><?php echo $shomajsheba_uttirno=(isset( $human_managemant_jonobol_shorboraho['shomajsheba_uttirno']))? $human_managemant_jonobol_shorboraho['shomajsheba_uttirno']:0; $total_uttirno = $total_uttirno+ $shomajsheba_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" rowspan='2'>
                                মানবসেবা
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                মানবসেবা কর্মকর্তা
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_terget" 
                                    data-title="Enter"><?php echo $manobsheba_terget=(isset( $human_managemant_jonobol_shorboraho['manobsheba_terget']))? $human_managemant_jonobol_shorboraho['manobsheba_terget']:0; $total_terget = $total_terget+ $manobsheba_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_bachai" 
                                    data-title="Enter"><?php echo $manobsheba_bachai=(isset( $human_managemant_jonobol_shorboraho['manobsheba_bachai']))? $human_managemant_jonobol_shorboraho['manobsheba_bachai']:0; $total_bachai = $total_bachai+ $manobsheba_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_num" 
                                    data-title="Enter"><?php echo $manobsheba_num=(isset( $human_managemant_jonobol_shorboraho['manobsheba_num']))? $human_managemant_jonobol_shorboraho['manobsheba_num']:0; $total_num = $total_num+ $manobsheba_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_pre" 
                                    data-title="Enter"><?php echo $manobsheba_pre=(isset( $human_managemant_jonobol_shorboraho['manobsheba_pre']))? $human_managemant_jonobol_shorboraho['manobsheba_pre']:0; $total_pre = $total_pre+ $manobsheba_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_sang" 
                                    data-title="Enter"><?php echo $manobsheba_sang=(isset( $human_managemant_jonobol_shorboraho['manobsheba_sang']))? $human_managemant_jonobol_shorboraho['manobsheba_sang']:0; $total_sang = $total_sang+ $manobsheba_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_shadha" 
                                    data-title="Enter"><?php echo $manobsheba_shadha=(isset( $human_managemant_jonobol_shorboraho['manobsheba_shadha']))? $human_managemant_jonobol_shorboraho['manobsheba_shadha']:0; $total_shadha = $total_shadha+ $manobsheba_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_ongsho" 
                                    data-title="Enter"><?php echo $manobsheba_ongsho=(isset( $human_managemant_jonobol_shorboraho['manobsheba_ongsho']))? $human_managemant_jonobol_shorboraho['manobsheba_ongsho']:0; $total_ongsho = $total_ongsho+ $manobsheba_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manobsheba_uttirno" 
                                    data-title="Enter"><?php echo $manobsheba_uttirno=(isset( $human_managemant_jonobol_shorboraho['manobsheba_uttirno']))? $human_managemant_jonobol_shorboraho['manobsheba_uttirno']:0; $total_uttirno = $total_uttirno+ $manobsheba_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                আইনজীবী
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_terget" 
                                    data-title="Enter"><?php echo $law_terget=(isset( $human_managemant_jonobol_shorboraho['law_terget']))? $human_managemant_jonobol_shorboraho['law_terget']:0; $total_terget = $total_terget+ $law_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_bachai" 
                                    data-title="Enter"><?php echo $law_bachai=(isset( $human_managemant_jonobol_shorboraho['law_bachai']))? $human_managemant_jonobol_shorboraho['law_bachai']:0; $total_bachai = $total_bachai+ $law_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_num" 
                                    data-title="Enter"><?php echo $law_num=(isset( $human_managemant_jonobol_shorboraho['law_num']))? $human_managemant_jonobol_shorboraho['law_num']:0; $total_num = $total_num+ $law_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_pre" 
                                    data-title="Enter"><?php echo $law_pre=(isset( $human_managemant_jonobol_shorboraho['law_pre']))? $human_managemant_jonobol_shorboraho['law_pre']:0; $total_pre = $total_pre+ $law_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_sang" 
                                    data-title="Enter"><?php echo $law_sang=(isset( $human_managemant_jonobol_shorboraho['law_sang']))? $human_managemant_jonobol_shorboraho['law_sang']:0; $total_sang = $total_sang+ $law_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_shadha" 
                                    data-title="Enter"><?php echo $law_shadha=(isset( $human_managemant_jonobol_shorboraho['law_shadha']))? $human_managemant_jonobol_shorboraho['law_shadha']:0; $total_shadha = $total_shadha+ $law_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_ongsho" 
                                    data-title="Enter"><?php echo $law_ongsho=(isset( $human_managemant_jonobol_shorboraho['law_ongsho']))? $human_managemant_jonobol_shorboraho['law_ongsho']:0; $total_ongsho = $total_ongsho+ $law_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_uttirno" 
                                    data-title="Enter"><?php echo $law_uttirno=(isset( $human_managemant_jonobol_shorboraho['law_uttirno']))? $human_managemant_jonobol_shorboraho['law_uttirno']:0; $total_uttirno = $total_uttirno+ $law_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                তথ্যসেবা
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_terget" 
                                    data-title="Enter"><?php echo $totthosheba_terget=(isset( $human_managemant_jonobol_shorboraho['totthosheba_terget']))? $human_managemant_jonobol_shorboraho['totthosheba_terget']:0; $total_terget = $total_terget+ $totthosheba_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_bachai" 
                                    data-title="Enter"><?php echo $totthosheba_bachai=(isset( $human_managemant_jonobol_shorboraho['totthosheba_bachai']))? $human_managemant_jonobol_shorboraho['totthosheba_bachai']:0; $total_bachai = $total_bachai+ $totthosheba_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_num" 
                                    data-title="Enter"><?php echo $totthosheba_num=(isset( $human_managemant_jonobol_shorboraho['totthosheba_num']))? $human_managemant_jonobol_shorboraho['totthosheba_num']:0; $total_num = $total_num+ $totthosheba_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_pre" 
                                    data-title="Enter"><?php echo $totthosheba_pre=(isset( $human_managemant_jonobol_shorboraho['totthosheba_pre']))? $human_managemant_jonobol_shorboraho['totthosheba_pre']:0; $total_pre = $total_pre+ $totthosheba_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_sang" 
                                    data-title="Enter"><?php echo $totthosheba_sang=(isset( $human_managemant_jonobol_shorboraho['totthosheba_sang']))? $human_managemant_jonobol_shorboraho['totthosheba_sang']:0; $total_sang = $total_sang+ $totthosheba_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_shadha" 
                                    data-title="Enter"><?php echo $totthosheba_shadha=(isset( $human_managemant_jonobol_shorboraho['totthosheba_shadha']))? $human_managemant_jonobol_shorboraho['totthosheba_shadha']:0; $total_shadha = $total_shadha+ $totthosheba_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_ongsho" 
                                    data-title="Enter"><?php echo $totthosheba_ongsho=(isset( $human_managemant_jonobol_shorboraho['totthosheba_ongsho']))? $human_managemant_jonobol_shorboraho['totthosheba_ongsho']:0; $total_ongsho = $total_ongsho+ $totthosheba_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="totthosheba_uttirno" 
                                    data-title="Enter"><?php echo $totthosheba_uttirno=(isset( $human_managemant_jonobol_shorboraho['totthosheba_uttirno']))? $human_managemant_jonobol_shorboraho['totthosheba_uttirno']:0; $total_uttirno = $total_uttirno+ $totthosheba_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" rowspan='7'>
                                শিক্ষক
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                বিশ্ববিদ্যালয় শিক্ষক (সরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_terget" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_terget=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_terget']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_terget']:0; $total_terget = $total_terget+ $uni_teacher_govt_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_bachai" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_bachai=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_bachai']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_bachai']:0; $total_bachai = $total_bachai+ $uni_teacher_govt_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_num" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_num=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_num']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_num']:0; $total_num = $total_num+ $uni_teacher_govt_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_pre" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_pre=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_pre']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_pre']:0; $total_pre = $total_pre+ $uni_teacher_govt_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_sang" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_sang=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_sang']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_sang']:0; $total_sang = $total_sang+ $uni_teacher_govt_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_shadha" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_shadha=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_shadha']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_shadha']:0; $total_shadha = $total_shadha+ $uni_teacher_govt_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_ongsho" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_ongsho=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_ongsho']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_ongsho']:0; $total_ongsho = $total_ongsho+ $uni_teacher_govt_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_govt_uttirno" 
                                    data-title="Enter"><?php echo $uni_teacher_govt_uttirno=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_govt_uttirno']))? $human_managemant_jonobol_shorboraho['uni_teacher_govt_uttirno']:0; $total_uttirno = $total_uttirno+ $uni_teacher_govt_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                বিশ্ববিদ্যালয় শিক্ষক (বেসরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_terget" 
                                    data-title="Enter"><?php echo $uni_teacher_private_terget=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_terget']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_terget']:0; $total_terget = $total_terget+ $uni_teacher_private_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_bachai" 
                                    data-title="Enter"><?php echo $uni_teacher_private_bachai=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_bachai']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_bachai']:0; $total_bachai = $total_bachai+ $uni_teacher_private_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_num" 
                                    data-title="Enter"><?php echo $uni_teacher_private_num=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_num']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_num']:0; $total_num = $total_num+ $uni_teacher_private_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_pre" 
                                    data-title="Enter"><?php echo $uni_teacher_private_pre=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_pre']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_pre']:0; $total_pre = $total_pre+ $uni_teacher_private_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_sang" 
                                    data-title="Enter"><?php echo $uni_teacher_private_sang=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_sang']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_sang']:0; $total_sang = $total_sang+ $uni_teacher_private_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_shadha" 
                                    data-title="Enter"><?php echo $uni_teacher_private_shadha=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_shadha']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_shadha']:0; $total_shadha = $total_shadha+ $uni_teacher_private_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_ongsho" 
                                    data-title="Enter"><?php echo $uni_teacher_private_ongsho=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_ongsho']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_ongsho']:0; $total_ongsho = $total_ongsho+ $uni_teacher_private_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uni_teacher_private_uttirno" 
                                    data-title="Enter"><?php echo $uni_teacher_private_uttirno=(isset( $human_managemant_jonobol_shorboraho['uni_teacher_private_uttirno']))? $human_managemant_jonobol_shorboraho['uni_teacher_private_uttirno']:0; $total_uttirno = $total_uttirno+ $uni_teacher_private_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মেডিকেল কলেজ শিক্ষক (বেসরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_terget" 
                                    data-title="Enter"><?php echo $medi_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_terget']))? $human_managemant_jonobol_shorboraho['medi_teacher_terget']:0; $total_terget = $total_terget+ $medi_teacher_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_bachai" 
                                    data-title="Enter"><?php echo $medi_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_bachai']))? $human_managemant_jonobol_shorboraho['medi_teacher_bachai']:0; $total_bachai = $total_bachai+ $medi_teacher_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_num" 
                                    data-title="Enter"><?php echo $medi_teacher_num=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_num']))? $human_managemant_jonobol_shorboraho['medi_teacher_num']:0; $total_num = $total_num+ $medi_teacher_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_pre" 
                                    data-title="Enter"><?php echo $medi_teacher_pre=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_pre']))? $human_managemant_jonobol_shorboraho['medi_teacher_pre']:0; $total_pre = $total_pre+ $medi_teacher_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_sang" 
                                    data-title="Enter"><?php echo $medi_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_sang']))? $human_managemant_jonobol_shorboraho['medi_teacher_sang']:0; $total_sang = $total_sang+ $medi_teacher_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_shadha" 
                                    data-title="Enter"><?php echo $medi_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_shadha']))? $human_managemant_jonobol_shorboraho['medi_teacher_shadha']:0; $total_shadha = $total_shadha+ $medi_teacher_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_ongsho" 
                                    data-title="Enter"><?php echo $medi_teacher_ongsho=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_ongsho']))? $human_managemant_jonobol_shorboraho['medi_teacher_ongsho']:0; $total_ongsho = $total_ongsho+ $medi_teacher_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medi_teacher_uttirno" 
                                    data-title="Enter"><?php echo $medi_teacher_uttirno=(isset( $human_managemant_jonobol_shorboraho['medi_teacher_uttirno']))? $human_managemant_jonobol_shorboraho['medi_teacher_uttirno']:0; $total_uttirno = $total_uttirno+ $medi_teacher_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                কলেজ শিক্ষক (বেসরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_terget" 
                                    data-title="Enter"><?php echo $college_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['college_teacher_terget']))? $human_managemant_jonobol_shorboraho['college_teacher_terget']:0; $total_terget = $total_terget+ $college_teacher_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_bachai" 
                                    data-title="Enter"><?php echo $college_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['college_teacher_bachai']))? $human_managemant_jonobol_shorboraho['college_teacher_bachai']:0; $total_bachai = $total_bachai+ $college_teacher_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_num" 
                                    data-title="Enter"><?php echo $college_teacher_num=(isset( $human_managemant_jonobol_shorboraho['college_teacher_num']))? $human_managemant_jonobol_shorboraho['college_teacher_num']:0; $total_num = $total_num+ $college_teacher_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_pre" 
                                    data-title="Enter"><?php echo $college_teacher_pre=(isset( $human_managemant_jonobol_shorboraho['college_teacher_pre']))? $human_managemant_jonobol_shorboraho['college_teacher_pre']:0; $total_pre = $total_pre+ $college_teacher_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_sang" 
                                    data-title="Enter"><?php echo $college_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['college_teacher_sang']))? $human_managemant_jonobol_shorboraho['college_teacher_sang']:0; $total_sang = $total_sang+ $college_teacher_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_shadha" 
                                    data-title="Enter"><?php echo $college_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['college_teacher_shadha']))? $human_managemant_jonobol_shorboraho['college_teacher_shadha']:0; $total_shadha = $total_shadha+ $college_teacher_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_ongsho" 
                                    data-title="Enter"><?php echo $college_teacher_ongsho=(isset( $human_managemant_jonobol_shorboraho['college_teacher_ongsho']))? $human_managemant_jonobol_shorboraho['college_teacher_ongsho']:0; $total_ongsho = $total_ongsho+ $college_teacher_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="college_teacher_uttirno" 
                                    data-title="Enter"><?php echo $college_teacher_uttirno=(isset( $human_managemant_jonobol_shorboraho['college_teacher_uttirno']))? $human_managemant_jonobol_shorboraho['college_teacher_uttirno']:0; $total_uttirno = $total_uttirno+ $college_teacher_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                কারিগরি কলেজ শিক্ষক (সরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_terget" 
                                    data-title="Enter"><?php echo $karigori_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_terget']))? $human_managemant_jonobol_shorboraho['karigori_teacher_terget']:0; $total_terget = $total_terget+ $karigori_teacher_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_bachai" 
                                    data-title="Enter"><?php echo $karigori_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_bachai']))? $human_managemant_jonobol_shorboraho['karigori_teacher_bachai']:0; $total_bachai = $total_bachai+ $karigori_teacher_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_num" 
                                    data-title="Enter"><?php echo $karigori_teacher_num=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_num']))? $human_managemant_jonobol_shorboraho['karigori_teacher_num']:0; $total_num = $total_num+ $karigori_teacher_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_pre" 
                                    data-title="Enter"><?php echo $karigori_teacher_pre=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_pre']))? $human_managemant_jonobol_shorboraho['karigori_teacher_pre']:0; $total_pre = $total_pre+ $karigori_teacher_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_sang" 
                                    data-title="Enter"><?php echo $karigori_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_sang']))? $human_managemant_jonobol_shorboraho['karigori_teacher_sang']:0; $total_sang = $total_sang+ $karigori_teacher_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_shadha" 
                                    data-title="Enter"><?php echo $karigori_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_shadha']))? $human_managemant_jonobol_shorboraho['karigori_teacher_shadha']:0; $total_shadha = $total_shadha+ $karigori_teacher_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_ongsho" 
                                    data-title="Enter"><?php echo $karigori_teacher_ongsho=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_ongsho']))? $human_managemant_jonobol_shorboraho['karigori_teacher_ongsho']:0; $total_ongsho = $total_ongsho+ $karigori_teacher_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="karigori_teacher_uttirno" 
                                    data-title="Enter"><?php echo $karigori_teacher_uttirno=(isset( $human_managemant_jonobol_shorboraho['karigori_teacher_uttirno']))? $human_managemant_jonobol_shorboraho['karigori_teacher_uttirno']:0; $total_uttirno = $total_uttirno+ $karigori_teacher_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মাধ্যমিক বিদ্যালয় শিক্ষক (সরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_terget" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_terget']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_terget']:0; $total_terget = $total_terget+ $maddhomik_teacher_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_bachai" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_bachai']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_bachai']:0; $total_bachai = $total_bachai+ $maddhomik_teacher_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_num" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_num=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_num']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_num']:0; $total_num = $total_num+ $maddhomik_teacher_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_pre" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_pre=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_pre']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_pre']:0; $total_pre = $total_pre+ $maddhomik_teacher_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_sang" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_sang']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_sang']:0; $total_sang = $total_sang+ $maddhomik_teacher_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_shadha" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_shadha']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_shadha']:0; $total_shadha = $total_shadha+ $maddhomik_teacher_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_ongsho" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_ongsho=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_ongsho']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_ongsho']:0; $total_ongsho = $total_ongsho+ $maddhomik_teacher_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="maddhomik_teacher_uttirno" 
                                    data-title="Enter"><?php echo $maddhomik_teacher_uttirno=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_uttirno']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_uttirno']:0; $total_uttirno = $total_uttirno+ $maddhomik_teacher_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মাদরাসা শিক্ষক
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_terget" 
                                    data-title="Enter"><?php echo $madrasah_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_terget']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_terget']:0; $total_terget = $total_terget+ $madrasah_teacher_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_bachai" 
                                    data-title="Enter"><?php echo $madrasah_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_bachai']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_bachai']:0; $total_bachai = $total_bachai+ $madrasah_teacher_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_num" 
                                    data-title="Enter"><?php echo $madrasah_teacher_num=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_num']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_num']:0; $total_num = $total_num+ $madrasah_teacher_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_pre" 
                                    data-title="Enter"><?php echo $madrasah_teacher_pre=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_pre']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_pre']:0; $total_pre = $total_pre+ $madrasah_teacher_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_sang" 
                                    data-title="Enter"><?php echo $madrasah_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_sang']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_sang']:0; $total_sang = $total_sang+ $madrasah_teacher_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_shadha" 
                                    data-title="Enter"><?php echo $madrasah_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_shadha']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_shadha']:0; $total_shadha = $total_shadha+ $madrasah_teacher_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_ongsho" 
                                    data-title="Enter"><?php echo $madrasah_teacher_ongsho=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_ongsho']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_ongsho']:0; $total_ongsho = $total_ongsho+ $madrasah_teacher_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="madrasah_teacher_uttirno" 
                                    data-title="Enter"><?php echo $madrasah_teacher_uttirno=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_uttirno']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_uttirno']:0; $total_uttirno = $total_uttirno+ $madrasah_teacher_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                সাহিত্য ও সংস্কৃতি	
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                সাংস্কৃতিক কর্মী
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_terget" 
                                    data-title="Enter"><?php echo $cultural_worker_terget=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_terget']))? $human_managemant_jonobol_shorboraho['cultural_worker_terget']:0; $total_terget = $total_terget+ $cultural_worker_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_bachai" 
                                    data-title="Enter"><?php echo $cultural_worker_bachai=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_bachai']))? $human_managemant_jonobol_shorboraho['cultural_worker_bachai']:0; $total_bachai = $total_bachai+ $cultural_worker_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_num" 
                                    data-title="Enter"><?php echo $cultural_worker_num=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_num']))? $human_managemant_jonobol_shorboraho['cultural_worker_num']:0; $total_num = $total_num+ $cultural_worker_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_pre" 
                                    data-title="Enter"><?php echo $cultural_worker_pre=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_pre']))? $human_managemant_jonobol_shorboraho['cultural_worker_pre']:0; $total_pre = $total_pre+ $cultural_worker_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_sang" 
                                    data-title="Enter"><?php echo $cultural_worker_sang=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_sang']))? $human_managemant_jonobol_shorboraho['cultural_worker_sang']:0; $total_sang = $total_sang+ $cultural_worker_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_shadha" 
                                    data-title="Enter"><?php echo $cultural_worker_shadha=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_shadha']))? $human_managemant_jonobol_shorboraho['cultural_worker_shadha']:0; $total_shadha = $total_shadha+ $cultural_worker_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_ongsho" 
                                    data-title="Enter"><?php echo $cultural_worker_ongsho=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_ongsho']))? $human_managemant_jonobol_shorboraho['cultural_worker_ongsho']:0; $total_ongsho = $total_ongsho+ $cultural_worker_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cultural_worker_uttirno" 
                                    data-title="Enter"><?php echo $cultural_worker_uttirno=(isset( $human_managemant_jonobol_shorboraho['cultural_worker_uttirno']))? $human_managemant_jonobol_shorboraho['cultural_worker_uttirno']:0; $total_uttirno = $total_uttirno+ $cultural_worker_uttirno; ?>
                                </a>
                                </td>
                            </tr>
                            <tr>                   
                                <td class="tg-y698 tg-0pky" >
                                ক্রীড়া ব্যক্তিত্ব	
                                </td>
                                <td class="tg-y698 tg-0pky" >
                                খেলোয়ার
                                </td>
                              <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_terget" 
                                    data-title="Enter"><?php echo $player_terget=(isset( $human_managemant_jonobol_shorboraho['player_terget']))? $human_managemant_jonobol_shorboraho['player_terget']:0; $total_terget = $total_terget+ $player_terget; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_bachai" 
                                    data-title="Enter"><?php echo $player_bachai=(isset( $human_managemant_jonobol_shorboraho['player_bachai']))? $human_managemant_jonobol_shorboraho['player_bachai']:0; $total_bachai = $total_bachai+ $player_bachai; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_num" 
                                    data-title="Enter"><?php echo $player_num=(isset( $human_managemant_jonobol_shorboraho['player_num']))? $human_managemant_jonobol_shorboraho['player_num']:0; $total_num = $total_num+ $player_num; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_pre" 
                                    data-title="Enter"><?php echo $player_pre=(isset( $human_managemant_jonobol_shorboraho['player_pre']))? $human_managemant_jonobol_shorboraho['player_pre']:0; $total_pre = $total_pre+ $player_pre; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_sang" 
                                    data-title="Enter"><?php echo $player_sang=(isset( $human_managemant_jonobol_shorboraho['player_sang']))? $human_managemant_jonobol_shorboraho['player_sang']:0; $total_sang = $total_sang+ $player_sang; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_shadha" 
                                    data-title="Enter"><?php echo $player_shadha=(isset( $human_managemant_jonobol_shorboraho['player_shadha']))? $human_managemant_jonobol_shorboraho['player_shadha']:0; $total_shadha = $total_shadha+ $player_shadha; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_ongsho" 
                                    data-title="Enter"><?php echo $player_ongsho=(isset( $human_managemant_jonobol_shorboraho['player_ongsho']))? $human_managemant_jonobol_shorboraho['player_ongsho']:0; $total_ongsho = $total_ongsho+ $player_ongsho; ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_managemant_jonobol_shorboraho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="player_uttirno" 
                                    data-title="Enter"><?php echo $player_uttirno=(isset( $human_managemant_jonobol_shorboraho['player_uttirno']))? $human_managemant_jonobol_shorboraho['player_uttirno']:0; $total_uttirno = $total_uttirno+ $player_uttirno; ?>
                                </a>
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
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Human_management_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($human_management_training_program['id']))?$human_management_training_program['id']:'';
                                
                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_s=(isset( $human_management_training_program['shikkha_central_s']))? $human_management_training_program['shikkha_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_p=(isset( $human_management_training_program['shikkha_central_p']))? $human_management_training_program['shikkha_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_s=(isset( $human_management_training_program['shikkha_shakha_s']))? $human_management_training_program['shikkha_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_p=(isset( $human_management_training_program['shikkha_shakha_p']))? $human_management_training_program['shikkha_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_s=(isset( $human_management_training_program['kormoshala_central_s']))? $human_management_training_program['kormoshala_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_p=(isset( $human_management_training_program['kormoshala_central_p']))? $human_management_training_program['kormoshala_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_s=(isset( $human_management_training_program['kormoshala_shakha_s']))? $human_management_training_program['kormoshala_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="human_management_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_p=(isset( $human_management_training_program['kormoshala_shakha_p']))? $human_management_training_program['kormoshala_shakha_p']:'' ?>
                                    </a>
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

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
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
