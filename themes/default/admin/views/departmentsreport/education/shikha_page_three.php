<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?=$assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?='শিক্ষা বিভাগ - পেইজ ০৩' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষান্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষান্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?="সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?=admin_url('departmentsreport/shikha-page-three') ?>"><i class="fa fa-building-o"></i> <?="সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
foreach ($branches as $branch) {
 echo '<li><a href="' . admin_url('departmentsreport/shikha-page-three/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" colspan='12'><b>প্রফেশনাল আউটপুট-০১ (জনসেবা) </b></td>
                                <td class="tg-pwj7" colspan="4">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Education_প্রফেশনাল আউটপুট-০১ (জনসেবা).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan='2'>মান</td>
                                <td class="tg-pwj7" colspan="5">৪৪ তম জনসেবা তথ্য </td>
                                <td class="tg-pwj7" colspan="5">৪১ তম জনসেবা তথ্য   </td>
                                <td class="tg-pwj7" colspan="5">৪৩ তম জনসেবা তথ্য  </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রিলি উত্তীর্ণ</span></div></td>
                                <td class="tg-pwj7 "><div><span>লিখিত উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভাইবা উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রিলি উত্তীর্ণ</span></div></td>
                                <td class="tg-pwj7 "><div><span>লিখিত উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভাইবা উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রিলি উত্তীর্ণ</span></div></td>
                                <td class="tg-pwj7 "><div><span>লিখিত উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভাইবা উত্তীর্ণ </span></div></td>

                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_t1_tar = $education_pro_output_1['m_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_t1_a = $education_pro_output_1['m_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t1_pri = $education_pro_output_1['m_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t1_li = $education_pro_output_1['m_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t1_vi = $education_pro_output_1['m_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $m_t2_tar = $education_pro_output_1['m_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_t2_a = $education_pro_output_1['m_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t2_pri = $education_pro_output_1['m_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t2_li = $education_pro_output_1['m_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t2_vi = $education_pro_output_1['m_t2_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $m_t3_tar = $education_pro_output_1['m_t3_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_t3_a = $education_pro_output_1['m_t3_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t3_pri = $education_pro_output_1['m_t3_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t3_li = $education_pro_output_1['m_t3_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t3_vi = $education_pro_output_1['m_t3_vi'] ?>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $a_t1_tar = $education_pro_output_1['a_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_t1_a = $education_pro_output_1['a_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t1_pri = $education_pro_output_1['a_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t1_li = $education_pro_output_1['a_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t1_vi = $education_pro_output_1['a_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $a_t2_tar = $education_pro_output_1['a_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_t2_a = $education_pro_output_1['a_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t2_pri = $education_pro_output_1['a_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t2_li = $education_pro_output_1['a_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t2_vi = $education_pro_output_1['a_t2_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $a_t3_tar = $education_pro_output_1['a_t3_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_t3_a = $education_pro_output_1['a_t3_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t3_pri = $education_pro_output_1['a_t3_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t3_li = $education_pro_output_1['a_t3_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t3_vi = $education_pro_output_1['a_t3_vi'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">কর্মী </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $w_t1_tar = $education_pro_output_1['w_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_t1_a = $education_pro_output_1['w_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t1_pri = $education_pro_output_1['w_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t1_li = $education_pro_output_1['w_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t1_vi = $education_pro_output_1['w_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $w_t2_tar = $education_pro_output_1['w_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_t2_a = $education_pro_output_1['w_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t2_pri = $education_pro_output_1['w_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t2_li = $education_pro_output_1['w_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t2_vi = $education_pro_output_1['w_t2_vi'] ?>
                                </td2>

                                <td class="tg-0pky  type_1">
                                <?php echo $w_t3_tar = $education_pro_output_1['w_t3_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_t3_a = $education_pro_output_1['w_t3_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t3_pri = $education_pro_output_1['w_t3_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t3_li = $education_pro_output_1['w_t3_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t3_vi = $education_pro_output_1['w_t3_vi'] ?>
                                </td2>
                            </tr>


                            <tr>
                                <td class="tg-y698">সমর্থক </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $s_t1_tar = $education_pro_output_1['s_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_t1_a = $education_pro_output_1['s_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t1_pri = $education_pro_output_1['s_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t1_li = $education_pro_output_1['s_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t1_vi = $education_pro_output_1['s_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $s_t2_tar = $education_pro_output_1['s_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_t2_a = $education_pro_output_1['s_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t2_pri = $education_pro_output_1['s_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t2_li = $education_pro_output_1['s_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t2_vi = $education_pro_output_1['s_t2_vi'] ?>
                                </td2>

                                <td class="tg-0pky  type_1">
                                <?php echo $s_t3_tar = $education_pro_output_1['s_t3_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_t3_a = $education_pro_output_1['s_t3_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t3_pri = $education_pro_output_1['s_t3_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t3_li = $education_pro_output_1['s_t3_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t3_vi = $education_pro_output_1['s_t3_vi'] ?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-0pky"> মোট</td>

                                <td class="tg-0pky">
                                <?php echo ($m_t1_tar + $a_t1_tar + $w_t1_tar + $s_t1_tar) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_a + $a_t1_a + $w_t1_a + $s_t1_a) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_pri + $a_t1_pri + $w_t1_pri + $s_t1_pri) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_li + $a_t1_li + $w_t1_li + $s_t1_li) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_vi + $a_t1_vi + $w_t1_vi + $s_t1_vi) ?>
                                </td>

                                <td class="tg-0pky">
                                <?php echo ($m_t2_tar + $a_t2_tar + $w_t2_tar + $s_t2_tar) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_a + $a_t2_a + $w_t2_a + $s_t2_a) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_pri + $a_t2_pri + $w_t2_pri + $s_t2_pri) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_li + $a_t2_li + $w_t2_li + $s_t2_li) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_vi + $a_t2_vi + $w_t2_vi + $s_t2_vi) ?>
                                </td>

                                <td class="tg-0pky">
                                <?php echo ($m_t3_tar + $a_t3_tar + $w_t3_tar + $s_t3_tar) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t3_a + $a_t3_a + $w_t3_a + $s_t3_a) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t3_pri + $a_t3_pri + $w_t3_pri + $s_t3_pri) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t3_li + $a_t3_li + $w_t3_li + $s_t3_li) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t3_vi + $a_t3_vi + $w_t3_vi + $s_t3_vi) ?>
                                </td>

                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='9'><b>প্রফেশনাল আউটপুট-০২ (মানবসেবা) </b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Education_প্রফেশনাল আউটপুট-০২ (মানবসেবা).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">মান</td>
                                <td class="tg-pwj7" colspan="5">১৫ তম মানবসেবা তথ্য </td>
                                <td class="tg-pwj7" colspan="5">১৬ তম মানবসেবা তথ্য  </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রিলি উত্তীর্ণ</span></div></td>
                                <td class="tg-pwj7 "><div><span>লিখিত উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভাইবা উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রিলি উত্তীর্ণ</span></div></td>
                                <td class="tg-pwj7 "><div><span>লিখিত উত্তীর্ণ </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভাইবা উত্তীর্ণ </span></div></td>

                            </tr>




                                     <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_t1_tar = $education_pro_output_2['m_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_t1_a = $education_pro_output_2['m_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t1_pri = $education_pro_output_2['m_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t1_li = $education_pro_output_2['m_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t1_vi = $education_pro_output_2['m_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $m_t2_tar = $education_pro_output_2['m_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_t2_a = $education_pro_output_2['m_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t2_pri = $education_pro_output_2['m_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t2_li = $education_pro_output_2['m_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_t2_vi = $education_pro_output_2['m_t2_vi'] ?>
                                </td>

                             


                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $a_t1_tar = $education_pro_output_2['a_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_t1_a = $education_pro_output_2['a_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t1_pri = $education_pro_output_2['a_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t1_li = $education_pro_output_2['a_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t1_vi = $education_pro_output_2['a_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $a_t2_tar = $education_pro_output_2['a_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_t2_a = $education_pro_output_2['a_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t2_pri = $education_pro_output_2['a_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t2_li = $education_pro_output_2['a_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_t2_vi = $education_pro_output_2['a_t2_vi'] ?>
                                </td>

                               

                            </tr>


                            <tr>
                                <td class="tg-y698">কর্মী </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $w_t1_tar = $education_pro_output_2['w_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_t1_a = $education_pro_output_2['w_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t1_pri = $education_pro_output_2['w_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t1_li = $education_pro_output_2['w_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t1_vi = $education_pro_output_2['w_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $w_t2_tar = $education_pro_output_2['w_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_t2_a = $education_pro_output_2['w_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t2_pri = $education_pro_output_2['w_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t2_li = $education_pro_output_2['w_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_t2_vi = $education_pro_output_2['w_t2_vi'] ?>
                                </td>

                              
                            </tr>


                            <tr>
                                <td class="tg-y698">সমর্থক </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $s_t1_tar = $education_pro_output_2['s_t1_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_t1_a = $education_pro_output_2['s_t1_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t1_pri = $education_pro_output_2['s_t1_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t1_li = $education_pro_output_2['s_t1_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t1_vi = $education_pro_output_2['s_t1_vi'] ?>
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $s_t2_tar = $education_pro_output_2['s_t2_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_t2_a = $education_pro_output_2['s_t2_a'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t2_pri = $education_pro_output_2['s_t2_pri'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t2_li = $education_pro_output_2['s_t2_li'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_t2_vi = $education_pro_output_2['s_t2_vi'] ?>
                                </td>

                             
                            </tr>


                            <tr>
                                <td class="tg-0pky"> মোট</td>

                                <td class="tg-0pky">
                                <?php echo ($m_t1_tar + $a_t1_tar + $w_t1_tar + $s_t1_tar) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_a + $a_t1_a + $w_t1_a + $s_t1_a) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_pri + $a_t1_pri + $w_t1_pri + $s_t1_pri) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_li + $a_t1_li + $w_t1_li + $s_t1_li) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t1_vi + $a_t1_vi + $w_t1_vi + $s_t1_vi) ?>
                                </td>

                                <td class="tg-0pky">
                                <?php echo ($m_t2_tar + $a_t2_tar + $w_t2_tar + $s_t2_tar) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_a + $a_t2_a + $w_t2_a + $s_t2_a) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_pri + $a_t2_pri + $w_t2_pri + $s_t2_pri) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_li + $a_t2_li + $w_t2_li + $s_t2_li) ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_t2_vi + $a_t2_vi + $w_t2_vi + $s_t2_vi) ?>
                                </td>

                              

                            </tr>


                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="10"><b>প্রফেশনাল আউটপুট-০৩ (সমাজসেবা) </b></td>
                                <td class="tg-pwj7" colspan="3">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Education_প্রফেশনাল আউটপুট-০৩ (সমাজসেবা).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                                <td class="tg-pwj7" colspan="6" style="text-align:center;">কমিশনার </td>
                                <td class="tg-pwj7" colspan="6" style="text-align:center;">সৈনিক  </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2">সেনা </td>
                                <td class="tg-pwj7" colspan="2">নৌ </td>
                                <td class="tg-pwj7" colspan="2">বিমান</td>
                                <td class="tg-pwj7" colspan="2">সেনা </td>
                                <td class="tg-pwj7" colspan="2">নৌ </td>
                                <td class="tg-pwj7" colspan="2"> বিমান </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>

                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $m_k_s_tar = $education_pro_output_3['m_k_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_k_s_orj = $education_pro_output_3['m_k_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_k_n_tar = $education_pro_output_3['m_k_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_k_n_orj = $education_pro_output_3['m_k_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_k_b_tar = $education_pro_output_3['m_k_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_k_b_orj = $education_pro_output_3['m_k_b_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_s_s_tar = $education_pro_output_3['m_s_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_s_s_orj = $education_pro_output_3['m_s_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_s_n_tar = $education_pro_output_3['m_s_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_s_n_orj = $education_pro_output_3['m_s_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_s_b_tar = $education_pro_output_3['m_s_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_s_b_orj = $education_pro_output_3['m_s_b_orj'] ?>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $a_k_s_tar = $education_pro_output_3['a_k_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_k_s_orj = $education_pro_output_3['a_k_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_k_n_tar = $education_pro_output_3['a_k_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_k_n_orj = $education_pro_output_3['a_k_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_k_b_tar = $education_pro_output_3['a_k_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_k_b_orj = $education_pro_output_3['a_k_b_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_s_s_tar = $education_pro_output_3['a_s_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_s_s_orj = $education_pro_output_3['a_s_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_s_n_tar = $education_pro_output_3['a_s_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_s_n_orj = $education_pro_output_3['a_s_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_s_b_tar = $education_pro_output_3['a_s_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_s_b_orj = $education_pro_output_3['a_s_b_orj'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $w_k_s_tar = $education_pro_output_3['w_k_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_k_s_orj = $education_pro_output_3['w_k_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_k_n_tar = $education_pro_output_3['w_k_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_k_n_orj = $education_pro_output_3['w_k_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_k_b_tar = $education_pro_output_3['w_k_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_k_b_orj = $education_pro_output_3['w_k_b_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_s_s_tar = $education_pro_output_3['w_s_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_s_s_orj = $education_pro_output_3['w_s_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_s_n_tar = $education_pro_output_3['w_s_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_s_n_orj = $education_pro_output_3['w_s_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_s_b_tar = $education_pro_output_3['w_s_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_s_b_orj = $education_pro_output_3['w_s_b_orj'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $s_k_s_tar = $education_pro_output_3['s_k_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_k_s_orj = $education_pro_output_3['s_k_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $s_k_n_tar = $education_pro_output_3['s_k_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_k_n_orj = $education_pro_output_3['s_k_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $s_k_b_tar = $education_pro_output_3['s_k_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_k_b_orj = $education_pro_output_3['s_k_b_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $s_s_s_tar = $education_pro_output_3['s_s_s_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_s_s_orj = $education_pro_output_3['s_s_s_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $s_s_n_tar = $education_pro_output_3['s_s_n_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_s_n_orj = $education_pro_output_3['s_s_n_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $s_s_b_tar = $education_pro_output_3['s_s_b_tar'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_s_b_orj = $education_pro_output_3['s_s_b_orj'] ?>
                                </td>
                            </tr>
                            </tr>

                                <td class="tg-0pky"> মোট</td>

                                <td class="tg-0pky">
                                <?php echo ($m_k_s_tar + $a_k_s_tar + $w_k_s_tar + $s_k_s_tar)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_k_s_orj + $a_k_s_orj + $w_k_s_orj + $s_k_s_orj)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_k_n_tar + $a_k_n_tar + $w_k_n_tar + $s_k_n_tar)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_k_n_orj + $a_k_n_orj + $w_k_n_orj + $s_k_n_orj)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_k_b_tar + $a_k_b_tar + $w_k_b_tar + $s_k_b_tar)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_k_b_orj + $a_k_b_orj + $w_k_b_orj + $s_k_b_orj)  ?>
                                </td>

                                <td class="tg-0pky">
                                <?php echo  ($m_s_s_tar + $a_s_s_tar + $w_s_s_tar + $s_s_s_tar)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo  ($m_s_s_orj + $a_s_s_orj + $w_s_s_orj + $s_s_s_orj)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo  ($m_s_n_tar + $a_s_n_tar + $w_s_n_tar + $s_s_n_tar)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo  ($m_s_n_orj + $a_s_n_orj + $w_s_n_orj + $s_s_n_orj)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo  ($m_s_b_tar + $a_s_b_tar + $w_s_b_tar + $s_s_b_tar)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo  ($m_s_b_orj + $a_s_b_orj + $w_s_b_orj + $s_s_b_orj)  ?>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                            <td class="tg-pwj7" colspan="8"><b>প্রফেশনাল আউটপুট-০৪ (অন্যান্য) </b></td>
                                <td class="tg-pwj7" colspan="4">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Education_প্রফেশনাল আউটপুট-০৪ (অন্যান্য).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">সেক্টরসমূহ</td>
                                <td class="tg-pwj7" colspan="2">সদস্য </td>
                                <td class="tg-pwj7" colspan="2">সাথী  </td>
                                <td class="tg-pwj7" colspan="2"> কর্মী </td>
                                <td class="tg-pwj7" colspan="2">সমর্থক  </td>
                                <td class="tg-pwj7" colspan="2">মোট  </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>

                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> পাবলিক বিশ্ববিদ্যালয় শিক্ষক	</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_m_abe = $education_pro_output_4['pub_t_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_m_orj = $education_pro_output_4['pub_t_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_a_abe = $education_pro_output_4['pub_t_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_a_orj = $education_pro_output_4['pub_t_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_w_abe = $education_pro_output_4['pub_t_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_w_orj = $education_pro_output_4['pub_t_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_s_abe = $education_pro_output_4['pub_t_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pub_t_s_orj = $education_pro_output_4['pub_t_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($pub_t_m_abe + $pub_t_a_abe + $pub_t_w_abe + $pub_t_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($pub_t_m_orj + $pub_t_a_orj + $pub_t_w_orj + $pub_t_s_orj)  ?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698">প্রাইভেট বিশ্ববিদ্যালয় শিক্ষক</td>

                                  <td class="tg-0pky  type_1">
                                <?php echo $pri_t_m_abe = $education_pro_output_4['pri_t_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pri_t_m_orj = $education_pro_output_4['pri_t_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pri_t_a_abe = $education_pro_output_4['pri_t_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pri_t_a_orj = $education_pro_output_4['pri_t_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pri_t_w_abe = $education_pro_output_4['pri_t_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pri_t_w_orj = $education_pro_output_4['pri_t_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pri_t_s_abe = $education_pro_output_4['pri_t_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pri_t_s_orj = $education_pro_output_4['pri_t_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($pri_t_m_abe + $pri_t_a_abe + $pri_t_w_abe + $pri_t_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($pri_t_m_orj + $pri_t_a_orj + $pri_t_w_orj + $pri_t_s_orj)  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">পুলিশ এস আই ও সার্জেন্ট </td>

                                  <td class="tg-0pky  type_1">
                                <?php echo $pol_m_abe = $education_pro_output_4['pol_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pol_m_orj = $education_pro_output_4['pol_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pol_a_abe = $education_pro_output_4['pol_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pol_a_orj = $education_pro_output_4['pol_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pol_w_abe = $education_pro_output_4['pol_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pol_w_orj = $education_pro_output_4['pol_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pol_s_abe = $education_pro_output_4['pol_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pol_s_orj = $education_pro_output_4['pol_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($pol_m_abe + $pol_a_abe + $pol_w_abe + $pol_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($pol_m_orj + $pol_a_orj + $pol_w_orj + $pol_s_orj)  ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারি কলেজ শিক্ষক</td>

                                  <td class="tg-0pky  type_1">
                                <?php echo $bc_t_m_abe = $education_pro_output_4['bc_t_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bc_t_m_orj = $education_pro_output_4['bc_t_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bc_t_a_abe = $education_pro_output_4['bc_t_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bc_t_a_orj = $education_pro_output_4['bc_t_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bc_t_w_abe = $education_pro_output_4['bc_t_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bc_t_w_orj = $education_pro_output_4['bc_t_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bc_t_s_abe = $education_pro_output_4['bc_t_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bc_t_s_orj = $education_pro_output_4['bc_t_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($bc_t_m_abe + $bc_t_a_abe + $bc_t_w_abe + $bc_t_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($bc_t_m_orj + $bc_t_a_orj + $bc_t_w_orj + $bc_t_s_orj)  ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">প্রাথমিক বিদ্যালয় শিক্ষক </td>

                                  <td class="tg-0pky  type_1">
                                <?php echo $ps_t_m_abe = $education_pro_output_4['ps_t_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_t_m_orj = $education_pro_output_4['ps_t_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_t_a_abe = $education_pro_output_4['ps_t_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_t_a_orj = $education_pro_output_4['ps_t_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_t_w_abe = $education_pro_output_4['ps_t_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_t_w_orj = $education_pro_output_4['ps_t_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_t_s_abe = $education_pro_output_4['ps_t_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_t_s_orj = $education_pro_output_4['ps_t_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($ps_t_m_abe + $ps_t_a_abe + $ps_t_w_abe + $ps_t_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($ps_t_m_orj + $ps_t_a_orj + $ps_t_w_orj + $ps_t_s_orj)  ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারি মাধ্যমিক স্কুল শিক্ষক </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_m_abe = $education_pro_output_4['bm_t_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_m_orj = $education_pro_output_4['bm_t_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_a_abe = $education_pro_output_4['bm_t_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_a_orj = $education_pro_output_4['bm_t_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_w_abe = $education_pro_output_4['bm_t_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_w_orj = $education_pro_output_4['bm_t_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_s_abe = $education_pro_output_4['bm_t_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bm_t_s_orj = $education_pro_output_4['bm_t_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($bm_t_m_abe + $bm_t_a_abe + $bm_t_w_abe + $bm_t_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($bm_t_m_orj + $bm_t_a_orj + $bm_t_w_orj + $bm_t_s_orj)  ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারি স্কুল শিক্ষক </td>

                                      <td class="tg-0pky  type_1">
                                <?php echo $c = $education_pro_output_4['c'] ?? 0 ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bs_t_m_orj = $education_pro_output_4['bs_t_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bs_t_a_abe = $education_pro_output_4['bs_t_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bs_t_a_orj = $education_pro_output_4['bs_t_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bs_t_w_abe = $education_pro_output_4['bs_t_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bs_t_w_orj = $education_pro_output_4['bs_t_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bs_t_s_abe = $education_pro_output_4['bs_t_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bs_t_s_orj = $education_pro_output_4['bs_t_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($c + $bs_t_a_abe + $bs_t_w_abe + $bs_t_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($bs_t_m_orj + $bs_t_a_orj + $bs_t_w_orj + $bs_t_s_orj)  ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ইংলিশ মিডিয়াম শিক্ষক </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_m_abe = $education_pro_output_4['em_t_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_m_orj = $education_pro_output_4['em_t_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_a_abe = $education_pro_output_4['em_t_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_a_orj = $education_pro_output_4['em_t_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_w_abe = $education_pro_output_4['em_t_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_w_orj = $education_pro_output_4['em_t_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_s_abe = $education_pro_output_4['em_t_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $em_t_s_orj = $education_pro_output_4['em_t_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($em_t_m_abe + $em_t_a_abe + $em_t_w_abe + $em_t_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($em_t_m_orj + $em_t_a_orj + $em_t_w_orj + $em_t_s_orj)  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারি কোম্পানি </td>

                                  <td class="tg-0pky  type_1">
                                <?php echo $besh_m_abe = $education_pro_output_4['besh_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $besh_m_orj = $education_pro_output_4['besh_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $besh_a_abe = $education_pro_output_4['besh_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $besh_a_orj = $education_pro_output_4['besh_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $besh_w_abe = $education_pro_output_4['besh_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $besh_w_orj = $education_pro_output_4['besh_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $besh_s_abe = $education_pro_output_4['besh_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $besh_s_orj = $education_pro_output_4['besh_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($besh_m_abe + $besh_a_abe + $besh_w_abe + $besh_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($besh_m_orj + $besh_a_orj + $besh_w_orj + $besh_s_orj)  ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তর্জাতিক সংস্থা </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $int_m_abe = $education_pro_output_4['int_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $int_m_orj = $education_pro_output_4['int_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $int_a_abe = $education_pro_output_4['int_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $int_a_orj = $education_pro_output_4['int_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $int_w_abe = $education_pro_output_4['int_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $int_w_orj = $education_pro_output_4['int_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $int_s_abe = $education_pro_output_4['int_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $int_s_orj = $education_pro_output_4['int_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($int_m_abe + $int_a_abe + $int_w_abe + $int_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($int_m_orj + $int_a_orj + $int_w_orj + $int_s_orj)  ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ইসলামী/বাংলাদেশ ব্যাংক </td>

                                  <td class="tg-0pky  type_1">
                                <?php echo $ism_b_m_abe = $education_pro_output_4['ism_b_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ism_b_m_orj = $education_pro_output_4['ism_b_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ism_b_a_abe = $education_pro_output_4['ism_b_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ism_b_a_orj = $education_pro_output_4['ism_b_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ism_b_w_abe = $education_pro_output_4['ism_b_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ism_b_w_orj = $education_pro_output_4['ism_b_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ism_b_s_abe = $education_pro_output_4['ism_b_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ism_b_s_orj = $education_pro_output_4['ism_b_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($ism_b_m_abe + $ism_b_a_abe + $ism_b_w_abe + $ism_b_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo  ($ism_b_m_orj + $ism_b_a_orj + $ism_b_w_orj + $ism_b_s_orj)  ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য </td>

                                 <td class="tg-0pky  type_1">
                                <?php echo $other_m_abe = $education_pro_output_4['other_m_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_m_orj = $education_pro_output_4['other_m_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_a_abe = $education_pro_output_4['other_a_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_a_orj = $education_pro_output_4['other_a_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_w_abe = $education_pro_output_4['other_w_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_w_orj = $education_pro_output_4['other_w_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_s_abe = $education_pro_output_4['other_s_abe'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_s_orj = $education_pro_output_4['other_s_orj'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($other_m_abe + $other_a_abe + $other_w_abe + $other_s_abe)  ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($other_m_orj + $other_a_orj + $other_w_orj + $other_s_orj)  ?>
                                </td>
                            </tr>
                        </table>
                    </div>
			   </div>
            </div>
        </div>
    </div>
</div>

