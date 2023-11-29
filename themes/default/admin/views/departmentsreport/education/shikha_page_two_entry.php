<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= ' শিক্ষা বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <td class="tg-pwj7" colspan='2'><b>মোটিভেশনাল প্রোগ্রাম (প্রফেশনাল ও একাডেমিক) </b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_1'  onclick="doit('xlsx','testTable1','<?php echo 'Education_মোটিভেশনাল প্রোগ্রাম (প্রফেশনাল ও একাডেমিক)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি  </td>

                            </tr>
                            <?php
                            $pk = (isset($education_motivational_program['id']))?$education_motivational_program['id']:"";

                            ?>
                            <tr>
                                <td class="tg-y698 type_1" >ক্যারিয়ার কাউন্সেলিং (জনসেবা)	</td>

                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_jon_num" 
                                    data-title="Enter"><?php echo $cc_jon_num=(isset( $education_motivational_program['cc_jon_num']))? $education_motivational_program['cc_jon_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_jon_pre" 
                                    data-title="Enter"><?php echo $cc_jon_pre=(isset( $education_motivational_program['cc_jon_pre']))? $education_motivational_program['cc_jon_pre']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">ক্যারিয়ার কাউন্সেলিং (মানবসেবা) </td>

                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_man_num" 
                                    data-title="Enter"><?php echo $cc_man_num=(isset( $education_motivational_program['cc_man_num']))? $education_motivational_program['cc_man_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_man_pre" 
                                    data-title="Enter"><?php echo $cc_man_pre=(isset( $education_motivational_program['cc_man_pre']))? $education_motivational_program['cc_man_pre']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">ক্যারিয়ার কাউন্সেলিং (সমাজসেবা) </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_sho_num" 
                                    data-title="Enter"><?php echo $cc_sho_num=(isset( $education_motivational_program['cc_sho_num']))? $education_motivational_program['cc_sho_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_sho_pre" 
                                    data-title="Enter"><?php echo $cc_sho_pre=(isset( $education_motivational_program['cc_sho_pre']))? $education_motivational_program['cc_sho_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যারিয়ার কাউন্সেলিং (তথ্যসেবা) </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_info_num" 
                                    data-title="Enter"><?php echo $cc_info_num=(isset( $education_motivational_program['cc_info_num']))? $education_motivational_program['cc_info_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_info_pre" 
                                    data-title="Enter"><?php echo $cc_info_pre=(isset( $education_motivational_program['cc_info_pre']))? $education_motivational_program['cc_info_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যারিয়ার কাউন্সেলিং (বিশ্ব. শিক্ষক তৈরি) </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_tea_num" 
                                    data-title="Enter"><?php echo $cc_tea_num=(isset( $education_motivational_program['cc_tea_num']))? $education_motivational_program['cc_tea_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_tea_pre" 
                                    data-title="Enter"><?php echo $cc_tea_pre=(isset( $education_motivational_program['cc_tea_pre']))? $education_motivational_program['cc_tea_pre']:0 ?>
                                </a>
                                </td>
                            <tr>
                                <td class="tg-y698">আদর্শ কলেজে কাউন্সেলিং </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="ideal_cc_num" 
                                    data-title="Enter"><?php echo $ideal_cc_num=(isset( $education_motivational_program['ideal_cc_num']))? $education_motivational_program['ideal_cc_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="ideal_cc_pre" 
                                    data-title="Enter"><?php echo $ideal_cc_pre=(isset( $education_motivational_program['ideal_cc_pre']))? $education_motivational_program['ideal_cc_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোটিভেশনাল প্রোগ্রাম (জেএসসি/জেডিসি/এসএসসি/দাখিল) </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_ssc_num" 
                                    data-title="Enter"><?php echo $mot_pro_ssc_num=(isset( $education_motivational_program['mot_pro_ssc_num']))? $education_motivational_program['mot_pro_ssc_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_ssc_pre" 
                                    data-title="Enter"><?php echo $mot_pro_ssc_pre=(isset( $education_motivational_program['mot_pro_ssc_pre']))? $education_motivational_program['mot_pro_ssc_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোটিভেশনাল প্রোগ্রাম (এইচএসসি/আলিম)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_hsc_num" 
                                    data-title="Enter"><?php echo $mot_pro_hsc_num=(isset( $education_motivational_program['mot_pro_hsc_num']))? $education_motivational_program['mot_pro_hsc_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_hsc_pre" 
                                    data-title="Enter"><?php echo $mot_pro_hsc_pre=(isset( $education_motivational_program['mot_pro_hsc_pre']))? $education_motivational_program['mot_pro_hsc_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="tg-y698">মোটিভেশনাল প্রোগ্রাম (বিশ্ববিদ্যালয় ভর্তিচ্ছু)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_uni_num" 
                                    data-title="Enter"><?php echo $mot_pro_uni_num=(isset( $education_motivational_program['mot_pro_uni_num']))? $education_motivational_program['mot_pro_uni_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_uni_pre" 
                                    data-title="Enter"><?php echo $mot_pro_uni_pre=(isset( $education_motivational_program['mot_pro_uni_pre']))? $education_motivational_program['mot_pro_uni_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                           

                            <tr>
                            <td class="tg-y698">মেধাবী সংবর্ধনা (অনার্স এবং মাস্টার্সে প্লেস ধারী)</td>
                            <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="meritorious_num" 
                                    data-title="Enter"><?php echo $meritorious_num=(isset( $education_motivational_program['meritorious_num']))? $education_motivational_program['meritorious_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="meritorious_pre" 
                                    data-title="Enter"><?php echo $meritorious_pre=(isset( $education_motivational_program['meritorious_pre']))? $education_motivational_program['meritorious_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">ইংলিশ স্পোকেন কোর্স</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_course_num" 
                                    data-title="Enter"><?php echo $eng_course_num=(isset( $education_motivational_program['eng_course_num']))? $education_motivational_program['eng_course_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_course_pre" 
                                    data-title="Enter"><?php echo $eng_course_pre=(isset( $education_motivational_program['eng_course_pre']))? $education_motivational_program['eng_course_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কম্পিউটার কোর্স</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="com_course_num" 
                                    data-title="Enter"><?php echo $com_course_num=(isset( $education_motivational_program['com_course_num']))? $education_motivational_program['com_course_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="com_course_pre" 
                                    data-title="Enter"><?php echo $com_course_pre=(isset( $education_motivational_program['com_course_pre']))? $education_motivational_program['com_course_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698">দোয়া মাহফিল</td>
                            <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dowa_num" 
                                    data-title="Enter"><?php echo $dowa_num=(isset( $education_motivational_program['dowa_num']))? $education_motivational_program['dowa_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dowa_pre" 
                                    data-title="Enter"><?php echo $dowa_pre=(isset( $education_motivational_program['dowa_pre']))? $education_motivational_program['dowa_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698">অন্যান্য</td>
                            <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_num" 
                                    data-title="Enter"><?php echo $other_num=(isset( $education_motivational_program['other_num']))? $education_motivational_program['other_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_pre" 
                                    data-title="Enter"><?php echo $other_pre=(isset( $education_motivational_program['other_pre']))? $education_motivational_program['other_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                        <td class="tg-pwj7" colspan="4"><b>সামিট </b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Education_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                      <?php
                          $pk = (isset($education_summit['id']))?$education_summit['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                          <td class="tg-pwj7" rowspan=''>ধরন</td>
                          <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                          <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                          <td class="tg-pwj7" colspan=''>গড়</td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সামাজিক বিজ্ঞান, কলা ও ফাইন আর্টসে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_manpower_s" 
                              data-title="Enter">
                              <?php echo $hons_central_manpower_s=(isset( $education_summit['hons_central_manpower_s']))? $education_summit['hons_central_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_manpower_p" 
                              data-title="Enter">
                              <?php echo $hons_central_manpower_p=(isset( $education_summit['hons_central_manpower_p']))? $education_summit['hons_central_manpower_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_central_manpower_s>0 && $hons_central_manpower_p>0)
                          {echo ($hons_central_manpower_p/$hons_central_manpower_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">সাধারণ</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_general_s" 
                              data-title="Enter">
                              <?php echo $hons_central_general_s=(isset( $education_summit['hons_central_general_s']))? $education_summit['hons_central_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_general_p" 
                              data-title="Enter">
                              <?php echo $hons_central_general_p=(isset( $education_summit['hons_central_general_p']))? $education_summit['hons_central_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_central_general_s>0 && $hons_central_general_p>0)
                          {echo ($hons_central_general_p/$hons_central_general_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সামাজিক বিজ্ঞান, কলা ও ফাইন আর্টসে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_manpower_s" 
                              data-title="Enter">
                              <?php echo $hons_shakha_manpower_s=(isset( $education_summit['hons_shakha_manpower_s']))? $education_summit['hons_shakha_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_manpower_p" 
                              data-title="Enter">
                              <?php echo $hons_shakha_manpower_p=(isset( $education_summit['hons_shakha_manpower_p']))? $education_summit['hons_shakha_manpower_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_shakha_manpower_s>0 && $hons_shakha_manpower_p>0)
                          {echo ($hons_shakha_manpower_p/$hons_shakha_manpower_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">সাধারণ</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_general_s" 
                              data-title="Enter">
                              <?php echo $hons_shakha_general_s=(isset( $education_summit['hons_shakha_general_s']))? $education_summit['hons_shakha_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_general_p" 
                              data-title="Enter">
                              <?php echo $hons_shakha_general_p=(isset( $education_summit['hons_shakha_general_p']))? $education_summit['hons_shakha_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_shakha_general_s>0 && $hons_shakha_general_p>0)
                          {echo ($hons_shakha_general_p/$hons_shakha_general_s);}else{echo 0;}?>
                          </td>
                      </tr>
                  </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Education_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($education_training_program['id']))?$education_training_program['id']:'';
                          
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $education_training_program['shikkha_central_s']))? $education_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $education_training_program['shikkha_central_p']))? $education_training_program['shikkha_central_p']:'' ?>
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $education_training_program['shikkha_shakha_s']))? $education_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $education_training_program['shikkha_shakha_p']))? $education_training_program['shikkha_shakha_p']:'' ?>
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $education_training_program['kormoshala_central_s']))? $education_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $education_training_program['kormoshala_central_p']))? $education_training_program['kormoshala_central_p']:'' ?>
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $education_training_program['kormoshala_shakha_s']))? $education_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $education_training_program['kormoshala_shakha_p']))? $education_training_program['kormoshala_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                          {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                  </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                            <td class="tg-pwj7" colspan="3"><b>শাখা নিয়ন্ত্রিত কোচিং সংক্রান্ত তথ্য  </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Education_শাখা নিয়ন্ত্রিত কোচিং সংক্রান্ত তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> কোচিং সংখ্যা </td>
                                <td class="tg-pwj7">ব্যাচ সংখ্যা </td>
                                <td class="tg-pwj7"> ছাত্র সংখ্যা</td>

                            </tr>

                            <?php
                            $pk = (isset($education_coaching['id']))?$education_coaching['id']:"";

                            ?>
                            <tr>
                                <td class="tg-y698 type_1">চতুর্থ-দশম শ্রেণি</td>

                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="4to10_coaching" 
                                    data-title="Enter"><?php echo $ssc_coaching=(isset( $education_coaching['4to10_coaching']))? $education_coaching['4to10_coaching']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="4to10_batch" 
                                    data-title="Enter"><?php echo $ssc_batch=(isset( $education_coaching['4to10_batch']))? $education_coaching['4to10_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="4to10_student" 
                                    data-title="Enter"><?php echo $ssc_student=(isset( $education_coaching['4to10_student']))? $education_coaching['4to10_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">একাদশ-দ্বাদশ শ্রেণি </td>

                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="11_12_coaching" 
                                    data-title="Enter"><?php echo $hsc_coaching=(isset( $education_coaching['11_12_coaching']))? $education_coaching['11_12_coaching']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="11_12_batch" 
                                    data-title="Enter"><?php echo $hsc_batch=(isset( $education_coaching['11_12_batch']))? $education_coaching['11_12_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="11_12_student" 
                                    data-title="Enter"><?php echo $hsc_student=(isset( $education_coaching['11_12_student']))? $education_coaching['11_12_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698"> বিশ্ববিদ্যালয় ভর্তিচ্ছু </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="university_coaching" 
                                    data-title="Enter"><?php echo $university_coaching=(isset( $education_coaching['university_coaching']))? $education_coaching['university_coaching']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="university_batch" 
                                    data-title="Enter"><?php echo $university_batch=(isset( $education_coaching['university_batch']))? $education_coaching['university_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="university_student" 
                                    data-title="Enter"><?php echo $university_student=(isset( $education_coaching['university_student']))? $education_coaching['university_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">মেডিকেল ভর্তিচ্ছু </td>

                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_coaching" 
                                    data-title="Enter"><?php echo $medical_coaching=(isset( $education_coaching['medical_coaching']))? $education_coaching['medical_coaching']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_batch" 
                                    data-title="Enter"><?php echo $medical_batch=(isset( $education_coaching['medical_batch']))? $education_coaching['medical_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_student" 
                                    data-title="Enter"><?php echo $medical_student=(isset( $education_coaching['medical_student']))? $education_coaching['medical_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">ইঞ্জিনিয়ারিং ভর্তিচ্ছু </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_coaching" 
                                    data-title="Enter"><?php echo $eng_coaching=(isset( $education_coaching['eng_coaching']))? $education_coaching['eng_coaching']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_batch" 
                                    data-title="Enter"><?php echo $eng_batch=(isset( $education_coaching['eng_batch']))? $education_coaching['eng_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_student" 
                                    data-title="Enter"><?php echo $eng_student=(isset( $education_coaching['eng_student']))? $education_coaching['eng_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">প্রফেশনাল/জব </td>

                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="job_coaching" 
                                    data-title="Enter"><?php echo $job_coaching=(isset( $education_coaching['job_coaching']))? $education_coaching['job_coaching']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="job_batch" 
                                    data-title="Enter"><?php echo $job_batch=(isset( $education_coaching['job_batch']))? $education_coaching['job_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="job_student" 
                                    data-title="Enter"><?php echo $job_student=(isset( $education_coaching['job_student']))? $education_coaching['job_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_coaching" 
                                    data-title="Enter"><?php echo $other_coaching=(isset( $education_coaching['other_coaching']))? $education_coaching['other_coaching']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_batch" 
                                    data-title="Enter"><?php echo $other_batch=(isset( $education_coaching['other_batch']))? $education_coaching['other_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_student" 
                                    data-title="Enter"><?php echo $other_student=(isset( $education_coaching['other_student']))? $education_coaching['other_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($ssc_coaching + $hsc_coaching + $university_coaching + $medical_coaching + $eng_coaching + $job_coaching + $other_coaching)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo  ($ssc_batch + $hsc_batch + $university_batch + $medical_batch + $eng_batch + $job_batch + $other_batch)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($ssc_student + $hsc_student + $university_student + $medical_student + $eng_student + $job_student + $other_student) ?>
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
