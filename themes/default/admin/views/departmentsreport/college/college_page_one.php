<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                    class="fa-fw fa fa-barcode"></i><?= 'কলেজ বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                    

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষান্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/college-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষান্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/college-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
							<?php
							foreach ($branches as $branch) {
								echo '<li><a href="' . admin_url('departmentsreport/college-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="17"><b>কলেজ সংগঠন</b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'College_কলেজ সংগঠন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ধরন</td>
                                <td class="tg-pwj7" colspan="3">প্রতিষ্ঠান  </td>
                                <td class="tg-pwj7" colspan="4">সংগঠন   </td>
                               
                                <td class="tg-pwj7" colspan="3"> থানা মানের  </td>
                                <td class="tg-pwj7" colspan="3"> ওয়ার্ড মানে  </td>
                                <td class="tg-pwj7" colspan="3">উপশাখা  মানের  </td>
                                <td class="tg-pwj7" colspan="3">সমর্থক সংগঠন  </td>
                            </tr>

                    <tr>

                        <td class="tg-pwj7"><div><span> সংখ্যা  </span></div></td>
                        <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                        <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                        <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                        <td class="tg-pwj7 "><div><span>নেই </span></div></td>
                        <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                        <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                        <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                        <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                        <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>


                        <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                        <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                        <td class="tg-pwj7 "><div><span>ঘাটতি</span></div></td>

                        <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                        <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                        <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                        <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                        <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                        <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                        

                    </tr>


                    <tr>
                        <td class="tg-y698 ">সরকারি কলেজ	</td>
                        <td class="tg-0pky  type_1">
							<?php echo $col_shor_pr_num = $college_shongothon['col_shor_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $col_shor_pr_bri = $college_shongothon['col_shor_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $col_shor_pr_gha = $college_shongothon['col_shor_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $col_shor_sn_num = $college_shongothon['col_shor_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $col_shor_sn_nei = $college_shongothon['col_shor_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $col_shor_sn_bri = $college_shongothon['col_shor_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $col_shor_sn_gha = $college_shongothon['col_shor_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $col_shor_th_num = $college_shongothon['col_shor_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $col_shor_th_bri = $college_shongothon['col_shor_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $col_shor_th_gha = $college_shongothon['col_shor_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $col_shor_wa_num = $college_shongothon['col_shor_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $col_shor_wa_bri = $college_shongothon['col_shor_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $col_shor_wa_gha = $college_shongothon['col_shor_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $col_shor_up_num = $college_shongothon['col_shor_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $col_shor_up_bri = $college_shongothon['col_shor_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $col_shor_up_gha = $college_shongothon['col_shor_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $col_shor_ss_num = $college_shongothon['col_shor_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $col_shor_ss_bri = $college_shongothon['col_shor_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $col_shor_ss_gha = $college_shongothon['col_shor_ss_gha'] ?>

                        </td>

                    </tr>


                    <tr>
                        <td class="tg-y698 "> কলেজ বেসরকারি	</td>
                        <td class="tg-0pky  type_1">
							<?php echo $col_beshor_pr_num = $college_shongothon['col_beshor_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $col_beshor_pr_bri = $college_shongothon['col_beshor_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $col_beshor_pr_gha = $college_shongothon['col_beshor_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $col_beshor_sn_num = $college_shongothon['col_beshor_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $col_beshor_sn_nei = $college_shongothon['col_beshor_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $col_beshor_sn_bri = $college_shongothon['col_beshor_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $col_beshor_sn_gha = $college_shongothon['col_beshor_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $col_beshor_th_num = $college_shongothon['col_beshor_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $col_beshor_th_bri = $college_shongothon['col_beshor_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $col_beshor_th_gha = $college_shongothon['col_beshor_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $col_beshor_wa_num = $college_shongothon['col_beshor_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $col_beshor_wa_bri = $college_shongothon['col_beshor_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $col_beshor_wa_gha = $college_shongothon['col_beshor_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $col_beshor_up_num = $college_shongothon['col_beshor_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $col_beshor_up_bri = $college_shongothon['col_beshor_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $col_beshor_up_gha = $college_shongothon['col_beshor_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $col_beshor_ss_num = $college_shongothon['col_beshor_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $col_beshor_ss_bri = $college_shongothon['col_beshor_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $col_beshor_ss_gha = $college_shongothon['col_beshor_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">বিএড কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $b_ed_col_pr_num = $college_shongothon['b_ed_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $b_ed_col_pr_bri = $college_shongothon['b_ed_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $b_ed_col_pr_gha = $college_shongothon['b_ed_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $b_ed_col_sn_num = $college_shongothon['b_ed_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $b_ed_col_sn_nei = $college_shongothon['b_ed_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $b_ed_col_sn_bri = $college_shongothon['b_ed_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $b_ed_col_sn_gha = $college_shongothon['b_ed_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $b_ed_col_th_num = $college_shongothon['b_ed_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $b_ed_col_th_bri = $college_shongothon['b_ed_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $b_ed_col_th_gha = $college_shongothon['b_ed_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $b_ed_col_wa_num = $college_shongothon['b_ed_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $b_ed_col_wa_bri = $college_shongothon['b_ed_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $b_ed_col_wa_gha = $college_shongothon['b_ed_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $b_ed_col_up_num = $college_shongothon['b_ed_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $b_ed_col_up_bri = $college_shongothon['b_ed_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $b_ed_col_up_gha = $college_shongothon['b_ed_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $b_ed_col_ss_num = $college_shongothon['b_ed_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $b_ed_col_ss_bri = $college_shongothon['b_ed_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $b_ed_col_ss_gha = $college_shongothon['b_ed_col_ss_gha'] ?>

                        </td>

                    </tr>


                    <tr>
                        <td class="tg-y698 ">আইন কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $aain_col_pr_num = $college_shongothon['aain_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $aain_col_pr_bri = $college_shongothon['aain_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $aain_col_pr_gha = $college_shongothon['aain_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $aain_col_sn_num = $college_shongothon['aain_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $aain_col_sn_nei = $college_shongothon['aain_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $aain_col_sn_bri = $college_shongothon['aain_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $aain_col_sn_gha = $college_shongothon['aain_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $aain_col_th_num = $college_shongothon['aain_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $aain_col_th_bri = $college_shongothon['aain_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $aain_col_th_gha = $college_shongothon['aain_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $aain_col_wa_num = $college_shongothon['aain_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $aain_col_wa_bri = $college_shongothon['aain_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $aain_col_wa_gha = $college_shongothon['aain_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $aain_col_up_num = $college_shongothon['aain_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $aain_col_up_bri = $college_shongothon['aain_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $aain_col_up_gha = $college_shongothon['aain_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $aain_col_ss_num = $college_shongothon['aain_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $aain_col_ss_bri = $college_shongothon['aain_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $aain_col_ss_gha = $college_shongothon['aain_col_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">আদর্শ কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $ideal_col_pr_num = $college_shongothon['ideal_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $ideal_col_pr_bri = $college_shongothon['ideal_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $ideal_col_pr_gha = $college_shongothon['ideal_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $ideal_col_sn_num = $college_shongothon['ideal_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $ideal_col_sn_nei = $college_shongothon['ideal_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $ideal_col_sn_bri = $college_shongothon['ideal_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $ideal_col_sn_gha = $college_shongothon['ideal_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $ideal_col_th_num = $college_shongothon['ideal_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $ideal_col_th_bri = $college_shongothon['ideal_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $ideal_col_th_gha = $college_shongothon['ideal_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $ideal_col_wa_num = $college_shongothon['ideal_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $ideal_col_wa_bri = $college_shongothon['ideal_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $ideal_col_wa_gha = $college_shongothon['ideal_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $ideal_col_up_num = $college_shongothon['ideal_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $ideal_col_up_bri = $college_shongothon['ideal_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $ideal_col_up_gha = $college_shongothon['ideal_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $ideal_col_ss_num = $college_shongothon['ideal_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $ideal_col_ss_bri = $college_shongothon['ideal_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $ideal_col_ss_gha = $college_shongothon['ideal_col_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">কৃষি কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $agri_col_pr_num = $college_shongothon['agri_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $agri_col_pr_bri = $college_shongothon['agri_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $agri_col_pr_gha = $college_shongothon['agri_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $agri_col_sn_num = $college_shongothon['agri_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $agri_col_sn_nei = $college_shongothon['agri_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $agri_col_sn_bri = $college_shongothon['agri_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $agri_col_sn_gha = $college_shongothon['agri_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $agri_col_th_num = $college_shongothon['agri_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $agri_col_th_bri = $college_shongothon['agri_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $agri_col_th_gha = $college_shongothon['agri_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $agri_col_wa_num = $college_shongothon['agri_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $agri_col_wa_bri = $college_shongothon['agri_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $agri_col_wa_gha = $college_shongothon['agri_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $agri_col_up_num = $college_shongothon['agri_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $agri_col_up_bri = $college_shongothon['agri_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $agri_col_up_gha = $college_shongothon['agri_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $agri_col_ss_num = $college_shongothon['agri_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $agri_col_ss_bri = $college_shongothon['agri_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $agri_col_ss_gha = $college_shongothon['agri_col_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">কমার্শিয়াল কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $com_col_pr_num = $college_shongothon['com_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $com_col_pr_bri = $college_shongothon['com_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $com_col_pr_gha = $college_shongothon['com_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $com_col_sn_num = $college_shongothon['com_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $com_col_sn_nei = $college_shongothon['com_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $com_col_sn_bri = $college_shongothon['com_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $com_col_sn_gha = $college_shongothon['com_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $com_col_th_num = $college_shongothon['com_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $com_col_th_bri = $college_shongothon['com_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $com_col_th_gha = $college_shongothon['com_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $com_col_wa_num = $college_shongothon['com_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $com_col_wa_bri = $college_shongothon['com_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $com_col_wa_gha = $college_shongothon['com_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $com_col_up_num = $college_shongothon['com_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $com_col_up_bri = $college_shongothon['com_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $com_col_up_gha = $college_shongothon['com_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $com_col_ss_num = $college_shongothon['com_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $com_col_ss_bri = $college_shongothon['com_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $com_col_ss_gha = $college_shongothon['com_col_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">শারীরিক শিক্ষা কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $sharirik_col_pr_num = $college_shongothon['sharirik_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $sharirik_col_pr_bri = $college_shongothon['sharirik_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $sharirik_col_pr_gha = $college_shongothon['sharirik_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $sharirik_col_sn_num = $college_shongothon['sharirik_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $sharirik_col_sn_nei = $college_shongothon['sharirik_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $sharirik_col_sn_bri = $college_shongothon['sharirik_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $sharirik_col_sn_gha = $college_shongothon['sharirik_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $sharirik_col_th_num = $college_shongothon['sharirik_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $sharirik_col_th_bri = $college_shongothon['sharirik_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $sharirik_col_th_gha = $college_shongothon['sharirik_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $sharirik_col_wa_num = $college_shongothon['sharirik_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $sharirik_col_wa_bri = $college_shongothon['sharirik_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $sharirik_col_wa_gha = $college_shongothon['sharirik_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $sharirik_col_up_num = $college_shongothon['sharirik_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $sharirik_col_up_bri = $college_shongothon['sharirik_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $sharirik_col_up_gha = $college_shongothon['sharirik_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $sharirik_col_ss_num = $college_shongothon['sharirik_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $sharirik_col_ss_bri = $college_shongothon['sharirik_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $sharirik_col_ss_gha = $college_shongothon['sharirik_col_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">চারুকলা কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $charukola_col_pr_num = $college_shongothon['charukola_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $charukola_col_pr_bri = $college_shongothon['charukola_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $charukola_col_pr_gha = $college_shongothon['charukola_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $charukola_col_sn_num = $college_shongothon['charukola_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $charukola_col_sn_nei = $college_shongothon['charukola_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $charukola_col_sn_bri = $college_shongothon['charukola_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $charukola_col_sn_gha = $college_shongothon['charukola_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $charukola_col_th_num = $college_shongothon['charukola_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $charukola_col_th_bri = $college_shongothon['charukola_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $charukola_col_th_gha = $college_shongothon['charukola_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $charukola_col_wa_num = $college_shongothon['charukola_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $charukola_col_wa_bri = $college_shongothon['charukola_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $charukola_col_wa_gha = $college_shongothon['charukola_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $charukola_col_up_num = $college_shongothon['charukola_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $charukola_col_up_bri = $college_shongothon['charukola_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $charukola_col_up_gha = $college_shongothon['charukola_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $charukola_col_ss_num = $college_shongothon['charukola_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $charukola_col_ss_bri = $college_shongothon['charukola_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $charukola_col_ss_gha = $college_shongothon['charukola_col_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">এইচএসসি(ভোক/বিএম) সরকারি </td>
                        <td class="tg-0pky  type_1">
							<?php echo $hsc_shor_pr_num = $college_shongothon['hsc_shor_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $hsc_shor_pr_bri = $college_shongothon['hsc_shor_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $hsc_shor_pr_gha = $college_shongothon['hsc_shor_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $hsc_shor_sn_num = $college_shongothon['hsc_shor_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $hsc_shor_sn_nei = $college_shongothon['hsc_shor_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $hsc_shor_sn_bri = $college_shongothon['hsc_shor_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $hsc_shor_sn_gha = $college_shongothon['hsc_shor_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $hsc_shor_th_num = $college_shongothon['hsc_shor_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $hsc_shor_th_bri = $college_shongothon['hsc_shor_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $hsc_shor_th_gha = $college_shongothon['hsc_shor_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $hsc_shor_wa_num = $college_shongothon['hsc_shor_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $hsc_shor_wa_bri = $college_shongothon['hsc_shor_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $hsc_shor_wa_gha = $college_shongothon['hsc_shor_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $hsc_shor_up_num = $college_shongothon['hsc_shor_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $hsc_shor_up_bri = $college_shongothon['hsc_shor_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $hsc_shor_up_gha = $college_shongothon['hsc_shor_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $hsc_shor_ss_num = $college_shongothon['hsc_shor_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $hsc_shor_ss_bri = $college_shongothon['hsc_shor_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $hsc_shor_ss_gha = $college_shongothon['hsc_shor_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">এইচএসসি(ভোক/বিএম)বেসরকারি </td>
                        <td class="tg-0pky  type_1">
							<?php echo $hsc_beshor_pr_num = $college_shongothon['hsc_beshor_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $hsc_beshor_pr_bri = $college_shongothon['hsc_beshor_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $hsc_beshor_pr_gha = $college_shongothon['hsc_beshor_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $hsc_beshor_sn_num = $college_shongothon['hsc_beshor_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $hsc_beshor_sn_nei = $college_shongothon['hsc_beshor_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $hsc_beshor_sn_bri = $college_shongothon['hsc_beshor_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $hsc_beshor_sn_gha = $college_shongothon['hsc_beshor_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $hsc_beshor_th_num = $college_shongothon['hsc_beshor_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $hsc_beshor_th_bri = $college_shongothon['hsc_beshor_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $hsc_beshor_th_gha = $college_shongothon['hsc_beshor_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $hsc_beshor_wa_num = $college_shongothon['hsc_beshor_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $hsc_beshor_wa_bri = $college_shongothon['hsc_beshor_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $hsc_beshor_wa_gha = $college_shongothon['hsc_beshor_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $hsc_beshor_up_num = $college_shongothon['hsc_beshor_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $hsc_beshor_up_bri = $college_shongothon['hsc_beshor_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $hsc_beshor_up_gha = $college_shongothon['hsc_beshor_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $hsc_beshor_ss_num = $college_shongothon['hsc_beshor_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $hsc_beshor_ss_bri = $college_shongothon['hsc_beshor_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $hsc_beshor_ss_gha = $college_shongothon['hsc_beshor_ss_gha'] ?>

                        </td>

                    </tr>

                    <tr>
                        <td class="tg-y698 ">টেক্সটাইল ইন্জিনিয়ারিং কলেজ </td>
                        <td class="tg-0pky  type_1">
							<?php echo $text_eng_col_pr_num = $college_shongothon['text_eng_col_pr_num'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
							<?php echo $text_eng_col_pr_bri = $college_shongothon['text_eng_col_pr_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_3">
							<?php echo $text_eng_col_pr_gha = $college_shongothon['text_eng_col_pr_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_4">
							<?php echo $text_eng_col_sn_num = $college_shongothon['text_eng_col_sn_num'] ?>
                        </td>

                        <td class="tg-0pky  type_5">
							<?php echo $text_eng_col_sn_nei = $college_shongothon['text_eng_col_sn_nei'] ?>
                        </td>

                        <td class="tg-0pky  type_6">
							<?php echo $text_eng_col_sn_bri = $college_shongothon['text_eng_col_sn_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $text_eng_col_sn_gha = $college_shongothon['text_eng_col_sn_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $text_eng_col_th_num = $college_shongothon['text_eng_col_th_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $text_eng_col_th_bri = $college_shongothon['text_eng_col_th_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_9">
							<?php echo $text_eng_col_th_gha = $college_shongothon['text_eng_col_th_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $text_eng_col_wa_num = $college_shongothon['text_eng_col_wa_num'] ?>
                        </td>

                        <td class="tg-0pky  type_10">
							<?php echo $text_eng_col_wa_bri = $college_shongothon['text_eng_col_wa_bri'] ?>
                        </td>


                        <td class="tg-0pky  type_10">
							<?php echo $text_eng_col_wa_gha = $college_shongothon['text_eng_col_wa_gha'] ?>
                        </td>


                        <td class="tg-0pky  type_6">
							<?php echo $text_eng_col_up_num = $college_shongothon['text_eng_col_up_num'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $text_eng_col_up_bri = $college_shongothon['text_eng_col_up_bri'] ?>
                        </td>

                        <td class="tg-0pky  type_7">
							<?php echo $text_eng_col_up_gha = $college_shongothon['text_eng_col_up_gha'] ?>
                        </td>

                        <td class="tg-0pky  type_8">
							<?php echo $text_eng_col_ss_num = $college_shongothon['text_eng_col_ss_num'] ?>
                        </td>

                        <td class="tg-0pky  type_9">
							<?php echo $text_eng_col_ss_bri = $college_shongothon['text_eng_col_ss_bri'] ?>
                        </td>
                        <td class="tg-0pky  type_9">

							<?php echo $text_eng_col_ss_gha = $college_shongothon['text_eng_col_ss_gha'] ?>

                        </td>

                    </tr>


                    </table>




                    <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                            <td class="tg-pwj7" colspan="17"><b>ডিপ্লোমা  ইনিষ্টিটিউট</b></td>
                            <td class="tg-pwj7" colspan="3">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'College_ডিপ্লোমা  ইনিষ্টিটিউট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" rowspan="2">ধরন</td>
                            <td class="tg-pwj7" colspan="3">প্রতিষ্ঠান  </td>
                            <td class="tg-pwj7" colspan="4">সংগঠন   </td>
                           
                            <td class="tg-pwj7" colspan="3"> থানা মানের  </td>
                            <td class="tg-pwj7" colspan="3"> ওয়ার্ড মানের  </td>
                            <td class="tg-pwj7" colspan="3">উপশাখা  মানের  </td>
                            <td class="tg-pwj7" colspan="3">সমর্থক সংগঠন  </td>
                        </tr>

                        <tr>

                            <td class="tg-pwj7"><div><span> সংখ্যা  </span></div></td>
                            <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                            <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                            <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                            <td class="tg-pwj7 "><div><span>নেই </span></div></td>
                            <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                            <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                            <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                            <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                            <td class="tg-pwj7 "><div><span>ঘাটতি</span></div></td>

                            <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                            <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                            <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                            <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                            <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                            <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                            <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                            <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                            <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                      
                        </tr>



                        <tr>
                            <td class="tg-y698 ">পলিটেকনিক ইনিস্টিটিউট সরকারি </td>
                            <td class="tg-0pky  type_1">
								<?php echo $pol_ins_shor_pr_num = $college_shongothon['pol_ins_shor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $pol_ins_shor_pr_bri = $college_shongothon['pol_ins_shor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $pol_ins_shor_pr_gha = $college_shongothon['pol_ins_shor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $pol_ins_shor_sn_num = $college_shongothon['pol_ins_shor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $pol_ins_shor_sn_nei = $college_shongothon['pol_ins_shor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $pol_ins_shor_sn_bri = $college_shongothon['pol_ins_shor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $pol_ins_shor_sn_gha = $college_shongothon['pol_ins_shor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $pol_ins_shor_th_num = $college_shongothon['pol_ins_shor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $pol_ins_shor_th_bri = $college_shongothon['pol_ins_shor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $pol_ins_shor_th_gha = $college_shongothon['pol_ins_shor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $pol_ins_shor_wa_num = $college_shongothon['pol_ins_shor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $pol_ins_shor_wa_bri = $college_shongothon['pol_ins_shor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $pol_ins_shor_wa_gha = $college_shongothon['pol_ins_shor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $pol_ins_shor_up_num = $college_shongothon['pol_ins_shor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $pol_ins_shor_up_bri = $college_shongothon['pol_ins_shor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $pol_ins_shor_up_gha = $college_shongothon['pol_ins_shor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $pol_ins_shor_ss_num = $college_shongothon['pol_ins_shor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $pol_ins_shor_ss_bri = $college_shongothon['pol_ins_shor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $pol_ins_shor_ss_gha = $college_shongothon['pol_ins_shor_ss_gha'] ?>

                            </td>

                        </tr>


                        <tr>
                            <td class="tg-y698 ">পলিটেকনিক ইনিস্টিটিউট বেসরকারি </td>
                            <td class="tg-0pky  type_1">
								<?php echo $pol_ins_beshor_pr_num = $college_shongothon['pol_ins_beshor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $pol_ins_beshor_pr_bri = $college_shongothon['pol_ins_beshor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $pol_ins_beshor_pr_gha = $college_shongothon['pol_ins_beshor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $pol_ins_beshor_sn_num = $college_shongothon['pol_ins_beshor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $pol_ins_beshor_sn_nei = $college_shongothon['pol_ins_beshor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $pol_ins_beshor_sn_bri = $college_shongothon['pol_ins_beshor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $pol_ins_beshor_sn_gha = $college_shongothon['pol_ins_beshor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $pol_ins_beshor_th_num = $college_shongothon['pol_ins_beshor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $pol_ins_beshor_th_bri = $college_shongothon['pol_ins_beshor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $pol_ins_beshor_th_gha = $college_shongothon['pol_ins_beshor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $pol_ins_beshor_wa_num = $college_shongothon['pol_ins_beshor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $pol_ins_beshor_wa_bri = $college_shongothon['pol_ins_beshor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $pol_ins_beshor_wa_gha = $college_shongothon['pol_ins_beshor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $pol_ins_beshor_up_num = $college_shongothon['pol_ins_beshor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $pol_ins_beshor_up_bri = $college_shongothon['pol_ins_beshor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $pol_ins_beshor_up_gha = $college_shongothon['pol_ins_beshor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $pol_ins_beshor_ss_num = $college_shongothon['pol_ins_beshor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $pol_ins_beshor_ss_bri = $college_shongothon['pol_ins_beshor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $pol_ins_beshor_ss_gha = $college_shongothon['pol_ins_beshor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">টেক্সটাইল ইনিষ্টিটিউট সরকারি </td>
                            <td class="tg-0pky  type_1">
								<?php echo $text_ins_shor_pr_num = $college_shongothon['text_ins_shor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $text_ins_shor_pr_bri = $college_shongothon['text_ins_shor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $text_ins_shor_pr_gha = $college_shongothon['text_ins_shor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $text_ins_shor_sn_num = $college_shongothon['text_ins_shor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $text_ins_shor_sn_nei = $college_shongothon['text_ins_shor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $text_ins_shor_sn_bri = $college_shongothon['text_ins_shor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_ins_shor_sn_gha = $college_shongothon['text_ins_shor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $text_ins_shor_th_num = $college_shongothon['text_ins_shor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $text_ins_shor_th_bri = $college_shongothon['text_ins_shor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $text_ins_shor_th_gha = $college_shongothon['text_ins_shor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $text_ins_shor_wa_num = $college_shongothon['text_ins_shor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $text_ins_shor_wa_bri = $college_shongothon['text_ins_shor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $text_ins_shor_wa_gha = $college_shongothon['text_ins_shor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $text_ins_shor_up_num = $college_shongothon['text_ins_shor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_ins_shor_up_bri = $college_shongothon['text_ins_shor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_ins_shor_up_gha = $college_shongothon['text_ins_shor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $text_ins_shor_ss_num = $college_shongothon['text_ins_shor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $text_ins_shor_ss_bri = $college_shongothon['text_ins_shor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $text_ins_shor_ss_gha = $college_shongothon['text_ins_shor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">টেক্সটাইল ইনিস্টিটিউট বেসরকারি </td>
                            <td class="tg-0pky  type_1">
								<?php echo $text_ins_beshor_pr_num = $college_shongothon['text_ins_beshor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $text_ins_beshor_pr_bri = $college_shongothon['text_ins_beshor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $text_ins_beshor_pr_gha = $college_shongothon['text_ins_beshor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $text_ins_beshor_sn_num = $college_shongothon['text_ins_beshor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $text_ins_beshor_sn_nei = $college_shongothon['text_ins_beshor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $text_ins_beshor_sn_bri = $college_shongothon['text_ins_beshor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_ins_beshor_sn_gha = $college_shongothon['text_ins_beshor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $text_ins_beshor_th_num = $college_shongothon['text_ins_beshor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $text_ins_beshor_th_bri = $college_shongothon['text_ins_beshor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $text_ins_beshor_th_gha = $college_shongothon['text_ins_beshor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $text_ins_beshor_wa_num = $college_shongothon['text_ins_beshor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $text_ins_beshor_wa_bri = $college_shongothon['text_ins_beshor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $text_ins_beshor_wa_gha = $college_shongothon['text_ins_beshor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $text_ins_beshor_up_num = $college_shongothon['text_ins_beshor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_ins_beshor_up_bri = $college_shongothon['text_ins_beshor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_ins_beshor_up_gha = $college_shongothon['text_ins_beshor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $text_ins_beshor_ss_num = $college_shongothon['text_ins_beshor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $text_ins_beshor_ss_bri = $college_shongothon['text_ins_beshor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $text_ins_beshor_ss_gha = $college_shongothon['text_ins_beshor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">টেক্সটাইল ভোকেশনাল </td>
                            <td class="tg-0pky  type_1">
								<?php echo $text_voc_pr_num = $college_shongothon['text_voc_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $text_voc_pr_bri = $college_shongothon['text_voc_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $text_voc_pr_gha = $college_shongothon['text_voc_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $text_voc_sn_num = $college_shongothon['text_voc_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $text_voc_sn_nei = $college_shongothon['text_voc_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $text_voc_sn_bri = $college_shongothon['text_voc_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_voc_sn_gha = $college_shongothon['text_voc_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $text_voc_th_num = $college_shongothon['text_voc_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $text_voc_th_bri = $college_shongothon['text_voc_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $text_voc_th_gha = $college_shongothon['text_voc_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $text_voc_wa_num = $college_shongothon['text_voc_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $text_voc_wa_bri = $college_shongothon['text_voc_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $text_voc_wa_gha = $college_shongothon['text_voc_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $text_voc_up_num = $college_shongothon['text_voc_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_voc_up_bri = $college_shongothon['text_voc_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $text_voc_up_gha = $college_shongothon['text_voc_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $text_voc_ss_num = $college_shongothon['text_voc_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $text_voc_ss_bri = $college_shongothon['text_voc_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $text_voc_ss_gha = $college_shongothon['text_voc_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">সার্ভে ইনিস্টিটিউট </td>
                            <td class="tg-0pky  type_1">
								<?php echo $surve_ins_pr_num = $college_shongothon['surve_ins_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $surve_ins_pr_bri = $college_shongothon['surve_ins_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $surve_ins_pr_gha = $college_shongothon['surve_ins_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $surve_ins_sn_num = $college_shongothon['surve_ins_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $surve_ins_sn_nei = $college_shongothon['surve_ins_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $surve_ins_sn_bri = $college_shongothon['surve_ins_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $surve_ins_sn_gha = $college_shongothon['surve_ins_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $surve_ins_th_num = $college_shongothon['surve_ins_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $surve_ins_th_bri = $college_shongothon['surve_ins_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $surve_ins_th_gha = $college_shongothon['surve_ins_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $surve_ins_wa_num = $college_shongothon['surve_ins_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $surve_ins_wa_bri = $college_shongothon['surve_ins_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $surve_ins_wa_gha = $college_shongothon['surve_ins_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $surve_ins_up_num = $college_shongothon['surve_ins_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $surve_ins_up_bri = $college_shongothon['surve_ins_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $surve_ins_up_gha = $college_shongothon['surve_ins_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $surve_ins_ss_num = $college_shongothon['surve_ins_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $surve_ins_ss_bri = $college_shongothon['surve_ins_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $surve_ins_ss_gha = $college_shongothon['surve_ins_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">কৃষি ইনিস্টিটিউট সরকারি </td>
                            <td class="tg-0pky  type_1">
								<?php echo $agri_ins_shor_pr_num = $college_shongothon['agri_ins_shor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $agri_ins_shor_pr_bri = $college_shongothon['agri_ins_shor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $agri_ins_shor_pr_gha = $college_shongothon['agri_ins_shor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $agri_ins_shor_sn_num = $college_shongothon['agri_ins_shor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $agri_ins_shor_sn_nei = $college_shongothon['agri_ins_shor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $agri_ins_shor_sn_bri = $college_shongothon['agri_ins_shor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $agri_ins_shor_sn_gha = $college_shongothon['agri_ins_shor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $agri_ins_shor_th_num = $college_shongothon['agri_ins_shor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $agri_ins_shor_th_bri = $college_shongothon['agri_ins_shor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $agri_ins_shor_th_gha = $college_shongothon['agri_ins_shor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $agri_ins_shor_wa_num = $college_shongothon['agri_ins_shor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $agri_ins_shor_wa_bri = $college_shongothon['agri_ins_shor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $agri_ins_shor_wa_gha = $college_shongothon['agri_ins_shor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $agri_ins_shor_up_num = $college_shongothon['agri_ins_shor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $agri_ins_shor_up_bri = $college_shongothon['agri_ins_shor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $agri_ins_shor_up_gha = $college_shongothon['agri_ins_shor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $agri_ins_shor_ss_num = $college_shongothon['agri_ins_shor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $agri_ins_shor_ss_bri = $college_shongothon['agri_ins_shor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $agri_ins_shor_ss_gha = $college_shongothon['agri_ins_shor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">কৃষি ইনিস্টিটিউট বেসরকারি </td>
                            <td class="tg-0pky  type_1">
								<?php echo $agri_in_beshor_pr_num = $college_shongothon['agri_in_beshor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $agri_in_beshor_pr_bri = $college_shongothon['agri_in_beshor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $agri_in_beshor_pr_gha = $college_shongothon['agri_in_beshor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $agri_in_beshor_sn_num = $college_shongothon['agri_in_beshor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $agri_in_beshor_sn_nei = $college_shongothon['agri_in_beshor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $agri_in_beshor_sn_bri = $college_shongothon['agri_in_beshor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $agri_in_beshor_sn_gha = $college_shongothon['agri_in_beshor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $agri_in_beshor_th_num = $college_shongothon['agri_in_beshor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $agri_in_beshor_th_bri = $college_shongothon['agri_in_beshor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $agri_in_beshor_th_gha = $college_shongothon['agri_in_beshor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $agri_in_beshor_wa_num = $college_shongothon['agri_in_beshor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $agri_in_beshor_wa_bri = $college_shongothon['agri_in_beshor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $agri_in_beshor_wa_gha = $college_shongothon['agri_in_beshor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $agri_in_beshor_up_num = $college_shongothon['agri_in_beshor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $agri_in_beshor_up_bri = $college_shongothon['agri_in_beshor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $agri_in_beshor_up_gha = $college_shongothon['agri_in_beshor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $agri_in_beshor_ss_num = $college_shongothon['agri_in_beshor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $agri_in_beshor_ss_bri = $college_shongothon['agri_in_beshor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $agri_in_beshor_ss_gha = $college_shongothon['agri_in_beshor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">গ্লাস এন্ড সিরামিক ইনিস্টিটিউট </td>
                            <td class="tg-0pky  type_1">
								<?php echo $glass_ins_pr_num = $college_shongothon['glass_ins_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $glass_ins_pr_bri = $college_shongothon['glass_ins_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $glass_ins_pr_gha = $college_shongothon['glass_ins_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $glass_ins_sn_num = $college_shongothon['glass_ins_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $glass_ins_sn_nei = $college_shongothon['glass_ins_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $glass_ins_sn_bri = $college_shongothon['glass_ins_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $glass_ins_sn_gha = $college_shongothon['glass_ins_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $glass_ins_th_num = $college_shongothon['glass_ins_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $glass_ins_th_bri = $college_shongothon['glass_ins_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $glass_ins_th_gha = $college_shongothon['glass_ins_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $glass_ins_wa_num = $college_shongothon['glass_ins_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $glass_ins_wa_bri = $college_shongothon['glass_ins_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $glass_ins_wa_gha = $college_shongothon['glass_ins_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $glass_ins_up_num = $college_shongothon['glass_ins_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $glass_ins_up_bri = $college_shongothon['glass_ins_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $glass_ins_up_gha = $college_shongothon['glass_ins_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $glass_ins_ss_num = $college_shongothon['glass_ins_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $glass_ins_ss_bri = $college_shongothon['glass_ins_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $glass_ins_ss_gha = $college_shongothon['glass_ins_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">ফরেষ্টি ইনিস্টিটিউট </td>
                            <td class="tg-0pky  type_1">
								<?php echo $fores_ins_pr_num = $college_shongothon['fores_ins_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $fores_ins_pr_bri = $college_shongothon['fores_ins_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $fores_ins_pr_gha = $college_shongothon['fores_ins_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $fores_ins_sn_num = $college_shongothon['fores_ins_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $fores_ins_sn_nei = $college_shongothon['fores_ins_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $fores_ins_sn_bri = $college_shongothon['fores_ins_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fores_ins_sn_gha = $college_shongothon['fores_ins_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $fores_ins_th_num = $college_shongothon['fores_ins_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $fores_ins_th_bri = $college_shongothon['fores_ins_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $fores_ins_th_gha = $college_shongothon['fores_ins_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $fores_ins_wa_num = $college_shongothon['fores_ins_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $fores_ins_wa_bri = $college_shongothon['fores_ins_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $fores_ins_wa_gha = $college_shongothon['fores_ins_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $fores_ins_up_num = $college_shongothon['fores_ins_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fores_ins_up_bri = $college_shongothon['fores_ins_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fores_ins_up_gha = $college_shongothon['fores_ins_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $fores_ins_ss_num = $college_shongothon['fores_ins_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $fores_ins_ss_bri = $college_shongothon['fores_ins_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $fores_ins_ss_gha = $college_shongothon['fores_ins_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">লাইভস্টক </td>
                            <td class="tg-0pky  type_1">
								<?php echo $live_stock_pr_num = $college_shongothon['live_stock_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $live_stock_pr_bri = $college_shongothon['live_stock_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $live_stock_pr_gha = $college_shongothon['live_stock_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $live_stock_sn_num = $college_shongothon['live_stock_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $live_stock_sn_nei = $college_shongothon['live_stock_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $live_stock_sn_bri = $college_shongothon['live_stock_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $live_stock_sn_gha = $college_shongothon['live_stock_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $live_stock_th_num = $college_shongothon['live_stock_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $live_stock_th_bri = $college_shongothon['live_stock_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $live_stock_th_gha = $college_shongothon['live_stock_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $live_stock_wa_num = $college_shongothon['live_stock_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $live_stock_wa_bri = $college_shongothon['live_stock_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $live_stock_wa_gha = $college_shongothon['live_stock_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $live_stock_up_num = $college_shongothon['live_stock_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $live_stock_up_bri = $college_shongothon['live_stock_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $live_stock_up_gha = $college_shongothon['live_stock_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $live_stock_ss_num = $college_shongothon['live_stock_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $live_stock_ss_bri = $college_shongothon['live_stock_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $live_stock_ss_gha = $college_shongothon['live_stock_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">ফিসারিজ সরকারি </td>
                            <td class="tg-0pky  type_1">
								<?php echo $fish_shor_pr_num = $college_shongothon['fish_shor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $fish_shor_pr_bri = $college_shongothon['fish_shor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $fish_shor_pr_gha = $college_shongothon['fish_shor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $fish_shor_sn_num = $college_shongothon['fish_shor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $fish_shor_sn_nei = $college_shongothon['fish_shor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $fish_shor_sn_bri = $college_shongothon['fish_shor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fish_shor_sn_gha = $college_shongothon['fish_shor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $fish_shor_th_num = $college_shongothon['fish_shor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $fish_shor_th_bri = $college_shongothon['fish_shor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $fish_shor_th_gha = $college_shongothon['fish_shor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $fish_shor_wa_num = $college_shongothon['fish_shor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $fish_shor_wa_bri = $college_shongothon['fish_shor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $fish_shor_wa_gha = $college_shongothon['fish_shor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $fish_shor_up_num = $college_shongothon['fish_shor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fish_shor_up_bri = $college_shongothon['fish_shor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fish_shor_up_gha = $college_shongothon['fish_shor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $fish_shor_ss_num = $college_shongothon['fish_shor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $fish_shor_ss_bri = $college_shongothon['fish_shor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $fish_shor_ss_gha = $college_shongothon['fish_shor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">ফিসারিজ বেসরকারি</td>
                            <td class="tg-0pky  type_1">
								<?php echo $fish_beshor_pr_num = $college_shongothon['fish_beshor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $fish_beshor_pr_bri = $college_shongothon['fish_beshor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $fish_beshor_pr_gha = $college_shongothon['fish_beshor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $fish_beshor_sn_num = $college_shongothon['fish_beshor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $fish_beshor_sn_nei = $college_shongothon['fish_beshor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $fish_beshor_sn_bri = $college_shongothon['fish_beshor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fish_beshor_sn_gha = $college_shongothon['fish_beshor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $fish_beshor_th_num = $college_shongothon['fish_beshor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $fish_beshor_th_bri = $college_shongothon['fish_beshor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $fish_beshor_th_gha = $college_shongothon['fish_beshor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $fish_beshor_wa_num = $college_shongothon['fish_beshor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $fish_beshor_wa_bri = $college_shongothon['fish_beshor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $fish_beshor_wa_gha = $college_shongothon['fish_beshor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $fish_beshor_up_num = $college_shongothon['fish_beshor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fish_beshor_up_bri = $college_shongothon['fish_beshor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $fish_beshor_up_gha = $college_shongothon['fish_beshor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $fish_beshor_ss_num = $college_shongothon['fish_beshor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $fish_beshor_ss_bri = $college_shongothon['fish_beshor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $fish_beshor_ss_gha = $college_shongothon['fish_beshor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">মেরিন ইনিস্টিটিউট</td>
                            <td class="tg-0pky  type_1">
								<?php echo $marine_ins_pr_num = $college_shongothon['marine_ins_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $marine_ins_pr_bri = $college_shongothon['marine_ins_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $marine_ins_pr_gha = $college_shongothon['marine_ins_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $marine_ins_sn_num = $college_shongothon['marine_ins_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $marine_ins_sn_nei = $college_shongothon['marine_ins_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $marine_ins_sn_bri = $college_shongothon['marine_ins_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $marine_ins_sn_gha = $college_shongothon['marine_ins_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $marine_ins_th_num = $college_shongothon['marine_ins_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $marine_ins_th_bri = $college_shongothon['marine_ins_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $marine_ins_th_gha = $college_shongothon['marine_ins_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $marine_ins_wa_num = $college_shongothon['marine_ins_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $marine_ins_wa_bri = $college_shongothon['marine_ins_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $marine_ins_wa_gha = $college_shongothon['marine_ins_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $marine_ins_up_num = $college_shongothon['marine_ins_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $marine_ins_up_bri = $college_shongothon['marine_ins_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $marine_ins_up_gha = $college_shongothon['marine_ins_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $marine_ins_ss_num = $college_shongothon['marine_ins_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $marine_ins_ss_bri = $college_shongothon['marine_ins_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $marine_ins_ss_gha = $college_shongothon['marine_ins_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">গ্রাফিক্স আর্ট ইনিস্টিটিউট</td>
                            <td class="tg-0pky  type_1">
								<?php echo $gra_art_ins_pr_num = $college_shongothon['gra_art_ins_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $gra_art_ins_pr_bri = $college_shongothon['gra_art_ins_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $gra_art_ins_pr_gha = $college_shongothon['gra_art_ins_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $gra_art_ins_sn_num = $college_shongothon['gra_art_ins_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $gra_art_ins_sn_nei = $college_shongothon['gra_art_ins_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $gra_art_ins_sn_bri = $college_shongothon['gra_art_ins_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $gra_art_ins_sn_gha = $college_shongothon['gra_art_ins_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $gra_art_ins_th_num = $college_shongothon['gra_art_ins_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $gra_art_ins_th_bri = $college_shongothon['gra_art_ins_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $gra_art_ins_th_gha = $college_shongothon['gra_art_ins_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $gra_art_ins_wa_num = $college_shongothon['gra_art_ins_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $gra_art_ins_wa_bri = $college_shongothon['gra_art_ins_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $gra_art_ins_wa_gha = $college_shongothon['gra_art_ins_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $gra_art_ins_up_num = $college_shongothon['gra_art_ins_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $gra_art_ins_up_bri = $college_shongothon['gra_art_ins_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $gra_art_ins_up_gha = $college_shongothon['gra_art_ins_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $gra_art_ins_ss_num = $college_shongothon['gra_art_ins_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $gra_art_ins_ss_bri = $college_shongothon['gra_art_ins_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $gra_art_ins_ss_gha = $college_shongothon['gra_art_ins_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">আই এইচ টি সরকারি</td>
                            <td class="tg-0pky  type_1">
								<?php echo $h_it_shor_pr_num = $college_shongothon['h_it_shor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $h_it_shor_pr_bri = $college_shongothon['h_it_shor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $h_it_shor_pr_gha = $college_shongothon['h_it_shor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $h_it_shor_sn_num = $college_shongothon['h_it_shor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $h_it_shor_sn_nei = $college_shongothon['h_it_shor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $h_it_shor_sn_bri = $college_shongothon['h_it_shor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $h_it_shor_sn_gha = $college_shongothon['h_it_shor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $h_it_shor_th_num = $college_shongothon['h_it_shor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $h_it_shor_th_bri = $college_shongothon['h_it_shor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $h_it_shor_th_gha = $college_shongothon['h_it_shor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $h_it_shor_wa_num = $college_shongothon['h_it_shor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $h_it_shor_wa_bri = $college_shongothon['h_it_shor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $h_it_shor_wa_gha = $college_shongothon['h_it_shor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $h_it_shor_up_num = $college_shongothon['h_it_shor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $h_it_shor_up_bri = $college_shongothon['h_it_shor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $h_it_shor_up_gha = $college_shongothon['h_it_shor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $h_it_shor_ss_num = $college_shongothon['h_it_shor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $h_it_shor_ss_bri = $college_shongothon['h_it_shor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $h_it_shor_ss_gha = $college_shongothon['h_it_shor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">আই এইচ টি বেসরকারি</td>
                            <td class="tg-0pky  type_1">
								<?php echo $h_it_beshor_pr_num = $college_shongothon['h_it_beshor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $h_it_beshor_pr_bri = $college_shongothon['h_it_beshor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $h_it_beshor_pr_gha = $college_shongothon['h_it_beshor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $h_it_beshor_sn_num = $college_shongothon['h_it_beshor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $h_it_beshor_sn_nei = $college_shongothon['h_it_beshor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $h_it_beshor_sn_bri = $college_shongothon['h_it_beshor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $h_it_beshor_sn_gha = $college_shongothon['h_it_beshor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $h_it_beshor_th_num = $college_shongothon['h_it_beshor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $h_it_beshor_th_bri = $college_shongothon['h_it_beshor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $h_it_beshor_th_gha = $college_shongothon['h_it_beshor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $h_it_beshor_wa_num = $college_shongothon['h_it_beshor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $h_it_beshor_wa_bri = $college_shongothon['h_it_beshor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $h_it_beshor_wa_gha = $college_shongothon['h_it_beshor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $h_it_beshor_up_num = $college_shongothon['h_it_beshor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $h_it_beshor_up_bri = $college_shongothon['h_it_beshor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $h_it_beshor_up_gha = $college_shongothon['h_it_beshor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $h_it_beshor_ss_num = $college_shongothon['h_it_beshor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $h_it_beshor_ss_bri = $college_shongothon['h_it_beshor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $h_it_beshor_ss_gha = $college_shongothon['h_it_beshor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">ম্যাটস সরকারি</td>
                            <td class="tg-0pky  type_1">
								<?php echo $mat_shor_pr_num = $college_shongothon['mat_shor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $mat_shor_pr_bri = $college_shongothon['mat_shor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $mat_shor_pr_gha = $college_shongothon['mat_shor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $mat_shor_sn_num = $college_shongothon['mat_shor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $mat_shor_sn_nei = $college_shongothon['mat_shor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $mat_shor_sn_bri = $college_shongothon['mat_shor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $mat_shor_sn_gha = $college_shongothon['mat_shor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $mat_shor_th_num = $college_shongothon['mat_shor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $mat_shor_th_bri = $college_shongothon['mat_shor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $mat_shor_th_gha = $college_shongothon['mat_shor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $mat_shor_wa_num = $college_shongothon['mat_shor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $mat_shor_wa_bri = $college_shongothon['mat_shor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $mat_shor_wa_gha = $college_shongothon['mat_shor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $mat_shor_up_num = $college_shongothon['mat_shor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $mat_shor_up_bri = $college_shongothon['mat_shor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $mat_shor_up_gha = $college_shongothon['mat_shor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $mat_shor_ss_num = $college_shongothon['mat_shor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $mat_shor_ss_bri = $college_shongothon['mat_shor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $mat_shor_ss_gha = $college_shongothon['mat_shor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">ম্যাটস বেসরকারি</td>
                            <td class="tg-0pky  type_1">
								<?php echo $mat_beshor_pr_num = $college_shongothon['mat_beshor_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $mat_beshor_pr_bri = $college_shongothon['mat_beshor_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $mat_beshor_pr_gha = $college_shongothon['mat_beshor_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $mat_beshor_sn_num = $college_shongothon['mat_beshor_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $mat_beshor_sn_nei = $college_shongothon['mat_beshor_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $mat_beshor_sn_bri = $college_shongothon['mat_beshor_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $mat_beshor_sn_gha = $college_shongothon['mat_beshor_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $mat_beshor_th_num = $college_shongothon['mat_beshor_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $mat_beshor_th_bri = $college_shongothon['mat_beshor_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $mat_beshor_th_gha = $college_shongothon['mat_beshor_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $mat_beshor_wa_num = $college_shongothon['mat_beshor_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $mat_beshor_wa_bri = $college_shongothon['mat_beshor_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $mat_beshor_wa_gha = $college_shongothon['mat_beshor_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $mat_beshor_up_num = $college_shongothon['mat_beshor_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $mat_beshor_up_bri = $college_shongothon['mat_beshor_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $mat_beshor_up_gha = $college_shongothon['mat_beshor_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $mat_beshor_ss_num = $college_shongothon['mat_beshor_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $mat_beshor_ss_bri = $college_shongothon['mat_beshor_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $mat_beshor_ss_gha = $college_shongothon['mat_beshor_ss_gha'] ?>

                            </td>

                        </tr>

                        <tr>
                            <td class="tg-y698 ">নার্সিং ইনিস্টিটিউট সরকারি</td>
                            <td class="tg-0pky  type_1">
								<?php echo $nursing_ins_pr_num = $college_shongothon['nursing_ins_pr_num'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
								<?php echo $nursing_ins_pr_bri = $college_shongothon['nursing_ins_pr_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_3">
								<?php echo $nursing_ins_pr_gha = $college_shongothon['nursing_ins_pr_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_4">
								<?php echo $nursing_ins_sn_num = $college_shongothon['nursing_ins_sn_num'] ?>
                            </td>

                            <td class="tg-0pky  type_5">
								<?php echo $nursing_ins_sn_nei = $college_shongothon['nursing_ins_sn_nei'] ?>
                            </td>

                            <td class="tg-0pky  type_6">
								<?php echo $nursing_ins_sn_bri = $college_shongothon['nursing_ins_sn_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $nursing_ins_sn_gha = $college_shongothon['nursing_ins_sn_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $nursing_ins_th_num = $college_shongothon['nursing_ins_th_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $nursing_ins_th_bri = $college_shongothon['nursing_ins_th_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_9">
								<?php echo $nursing_ins_th_gha = $college_shongothon['nursing_ins_th_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $nursing_ins_wa_num = $college_shongothon['nursing_ins_wa_num'] ?>
                            </td>

                            <td class="tg-0pky  type_10">
								<?php echo $nursing_ins_wa_bri = $college_shongothon['nursing_ins_wa_bri'] ?>
                            </td>


                            <td class="tg-0pky  type_10">
								<?php echo $nursing_ins_wa_gha = $college_shongothon['nursing_ins_wa_gha'] ?>
                            </td>


                            <td class="tg-0pky  type_6">
								<?php echo $nursing_ins_up_num = $college_shongothon['nursing_ins_up_num'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $nursing_ins_up_bri = $college_shongothon['nursing_ins_up_bri'] ?>
                            </td>

                            <td class="tg-0pky  type_7">
								<?php echo $nursing_ins_up_gha = $college_shongothon['nursing_ins_up_gha'] ?>
                            </td>

                            <td class="tg-0pky  type_8">
								<?php echo $nursing_ins_ss_num = $college_shongothon['nursing_ins_ss_num'] ?>
                            </td>

                            <td class="tg-0pky  type_9">
								<?php echo $nursing_ins_ss_bri = $college_shongothon['nursing_ins_ss_bri'] ?>
                            </td>
                            <td class="tg-0pky  type_9">

								<?php echo $nursing_ins_ss_gha = $college_shongothon['nursing_ins_ss_gha'] ?>

                            </td>

                        </tr>


                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
 
