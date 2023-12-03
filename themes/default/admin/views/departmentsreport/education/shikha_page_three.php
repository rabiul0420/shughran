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
        echo anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বার্ষিক\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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
            echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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

<table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="10"><b>প্রফেশনাল আউটপুট-০২ (সমাজসেবা): </b></td>
                                <td class="tg-pwj7" colspan="3">
                                <a href="#" id='প্রফেশনাল আউটপুট-০২ (সমাজসেবা):' onclick="doit('xlsx','প্রফেশনাল আউটপুট-০২ (সমাজসেবা):','<?php echo 'Education_প্রফেশনাল আউটপুট-০২ (সমাজসেবা):.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3">মান</td>
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
                    </div>
			   </div>
            </div>
        </div>
    </div>
</div>

