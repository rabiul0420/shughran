<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সাহিত্য বিভাগ- পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<?php
			if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
				if ($report_info['type'] == 'annual') {
					echo anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
					echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
					echo "&nbsp;|&nbsp;";
					echo anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
				} else {
					echo anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
					echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
				}
			} else {

				if ($report_info['type'] == 'annual') {
					echo    anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
				} else {

					echo   anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

					echo   ' <li>' . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

					for ($i = date('Y') - 1; $i >= 2019; $i--) {
						echo   ' <li>' . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
						echo   ' <li>' . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/literature-page-one/') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/literature-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>

                    </li>
                <?php } ?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> </a>
                </li>

           
            </ul>
        </div>
    </div>
    
    <div class="box-content">
        <div class="row">

            <div class="col-lg-12">
            
                <p class="introtext"><?php // lang('list_results');   ?></p>
           

                <script>
                    $(document).ready(function() {
                        $("#export_all_table").on("click", function() {
                            for (let i = 1; i <= 12; i++) {
                                $("#table_" + i).click();
                            }
                        });
                    });
                </script>

                <div class="table-responsive">


                    <style type="text/css">
                        #export_all_table {
                            cursor: pointer;
                        }

                        .tg {
                            border-collapse: collapse;
                            border-spacing: 0;
                        }

                        .tg td {
                            font-family: Arial, sans-serif;
                            font-size: 14px;
                            padding: 10px 5px;
                            border-style: solid;
                            border-width: 1px;
                            overflow: hidden;
                            word-break: normal;
                            border-color: black;
                        }

                        .tg th {
                            font-family: Arial, sans-serif;
                            font-size: 14px;
                            font-weight: normal;
                            padding: 10px 5px;
                            border-style: solid;
                            border-width: 1px;
                            overflow: hidden;
                            word-break: normal;
                            border-color: black;
                        }

                        .tg .tg-izx2 {
                            border-color: black;
                            background-color: #efefef;
                        }

                        .tg .tg-pwj7 {
                            background-color: #efefef;
                            border-color: black;
                        }

                        .tg .tg-0pky {
                            border-color: black;
                            vertical-align: top
                        }

                        .tg .tg-y698 {
                            background-color: #efefef;
                            border-color: black;
                            vertical-align: top
                        }

                        .tg .tg-0lax {
                            border-color: black;
                            vertical-align: top
                        }

                        @media screen and (max-width: 767px) {
                            .tg {
                                width: auto !important;
                            }

                            .tg col {
                                width: auto !important;
                            }

                            .tg-wrap {
                                overflow-x: auto;
                                -webkit-overflow-scrolling: touch;
                            }
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

                        .table-header-rotated td.rotate>div {
                            -webkit-transform: translate(10px, 51px) rotate(270deg);
                            transform: translate(10px, 51px) rotate(270deg);
                            width: 20px;
                        }

                        .table-header-rotated td.rotate>div>span {

                            padding: 5px 10px;
                        }

                        .table-header-rotated td.row-header {
                            padding: 0 10px;
                            border-bottom: 1px solid #ccc;
                        }

                        .table>tbody>tr>td {
                            border: 1px solid #ccc;
                        }

                        a {
                            text-decoration: none;
                        }

                        .action_class {
                            color: white;
                        }

                        .action_class:hover {
                            color: white;
                            text-decoration: none;
                        }
                    </style>
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable1">
                        <tr>
                            <td class="tg-pwj7" colspan="9"><b> পত্রিকার গ্রাহক বৃদ্ধি :</b></td>
                            <td class="tg-pwj7" colspan="7">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Literature_পত্রিকার গ্রাহক বৃদ্ধি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" rowspan="3">পত্রিকার নাম</td>
                            <td class="tg-pwj7" colspan="8">পত্রিকা </td>
                            <td class="tg-pwj7" colspan="5">গ্রাহক  </td>
                            
                        </tr>

                        <tr>
           
                            <td class="tg-pwj7" colspan="5">মাসিক সংখ্যা </td>
                            <td class="tg-pwj7" colspan="3">বার্ষিক সংখ্যা  </td>

                            <td class="tg-pwj7" rowspan="2"><div><span>পূর্ব সংখ্যা</span></div></td>
                            <td class="tg-pwj7" rowspan="2"><div><span>বর্তমান সংখ্যা</span></div></td>
                            <td class="tg-pwj7" rowspan="2"><div><span>বৃদ্ধির <br>টার্গেট </span></div></td>
                            <td class="tg-pwj7" rowspan="2"><div><span>বৃদ্ধি </span></div></td>
                            <td class="tg-pwj7" rowspan="2"><div><span>ঘাটতি </span></div></td>
                        
                        </tr>

                        <tr>
                        <td class="tg-pwj7"><div><span>পূর্ব  </span></div></td>
                        <td class="tg-pwj7"><div><span>বর্তমান </span></div></td>
                        <td class="tg-pwj7"><div><span>বৃদ্ধির <br>টার্গেট </span></div></td>
                        <td class="tg-pwj7"><div><span>বৃদ্ধি </span></div></td>
                        <td class="tg-pwj7"><div><span>ঘাটতি </span></div></td>

                        <td class="tg-pwj7"><div><span>মোট <br>সংখ্যা</span></div></td>
                        <td class="tg-pwj7"><div><span>বিক্রয়  </span></div></td>
                        <td class="tg-pwj7"><div><span>বিতরণ </span></div></td>

                        
                    </tr>

                            <tr>
                                <td class="tg-y698 type_1">বাংলা কিশোর পত্রিকা  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $potrikar_grahok_briddhi['bkp_pn_before'] ?>
                                </td>
                                 

                                <td class="tg-0pky  type_2">
                                    <?php echo $potrikar_grahok_briddhi['bkp_pn_present'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $potrikar_grahok_briddhi['bkp_bt_potrika'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $potrikar_grahok_briddhi['bkp_briddhi_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $potrikar_grahok_briddhi['bkp_ghatti_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo $potrikar_grahok_briddhi['bkp_bmn'] ?>

                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $potrikar_grahok_briddhi['bkp_bbkry'] ?>

                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $potrikar_grahok_briddhi['bkp_bbitrn'] ?>

                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $potrikar_grahok_briddhi['bkp_gn_before'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $potrikar_grahok_briddhi['bkp_gn_present'] ?>
                                </td>
                                
                                <td class="tg-0pky  type_6">
                                    <?php echo $potrikar_grahok_briddhi['bkp_bt_grahok'] ?>

                                </td>
                                
                                <td class="tg-0pky type_8">
                                    <?php echo $potrikar_grahok_briddhi['bkp_briddhi_grahok'] ?>

                                </td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $potrikar_grahok_briddhi['bkp_ghatti_grahok'] ?>

                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698">নতুন বাংলা কিশোর পত্রিকা </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_pn_before'] ?>
                                </td>
                                 

                                <td class="tg-0pky  type_2">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_pn_present'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_bt_potrika'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_briddhi_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_ghatti_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_bmn'] ?>

                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_bbkry'] ?>

                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_bbitrn'] ?>

                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_gn_before'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_gn_present'] ?>
                                </td>
                                
                                <td class="tg-0pky  type_6">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_bt_grahok'] ?>

                                </td>
                                
                                <td class="tg-0pky type_8">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_briddhi_grahok'] ?>

                                </td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $potrikar_grahok_briddhi['nbkp_ghatti_grahok'] ?>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">ইংরেজি কিশোর পত্রিকা </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $potrikar_grahok_briddhi['ekp_pn_before'] ?>
                                </td>
                                 

                                <td class="tg-0pky  type_2">
                                    <?php echo $potrikar_grahok_briddhi['ekp_pn_present'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $potrikar_grahok_briddhi['ekp_bt_potrika'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $potrikar_grahok_briddhi['ekp_briddhi_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $potrikar_grahok_briddhi['ekp_ghatti_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo $potrikar_grahok_briddhi['ekp_bmn'] ?>

                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $potrikar_grahok_briddhi['ekp_bbkry'] ?>

                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $potrikar_grahok_briddhi['ekp_bbitrn'] ?>

                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $potrikar_grahok_briddhi['ekp_gn_before'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $potrikar_grahok_briddhi['ekp_gn_present'] ?>
                                </td>
                                
                                <td class="tg-0pky  type_6">
                                    <?php echo $potrikar_grahok_briddhi['ekp_bt_grahok'] ?>

                                </td>
                                
                                <td class="tg-0pky type_8">
                                    <?php echo $potrikar_grahok_briddhi['ekp_briddhi_grahok'] ?>

                                </td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $potrikar_grahok_briddhi['ekp_ghatti_grahok'] ?>

                                </td>

                            </tr>



                            <tr>
                                <td class="tg-y698">ছাত্রসংবাদ </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $potrikar_grahok_briddhi['cs_pn_before'] ?>
                                </td>
                                 

                                <td class="tg-0pky  type_2">
                                    <?php echo $potrikar_grahok_briddhi['cs_pn_present'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $potrikar_grahok_briddhi['cs_bt_potrika'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $potrikar_grahok_briddhi['cs_briddhi_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $potrikar_grahok_briddhi['cs_ghatti_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo $potrikar_grahok_briddhi['cs_bmn'] ?>

                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $potrikar_grahok_briddhi['cs_bbkry'] ?>

                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $potrikar_grahok_briddhi['cs_bbitrn'] ?>

                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $potrikar_grahok_briddhi['cs_gn_before'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $potrikar_grahok_briddhi['cs_gn_present'] ?>
                                </td>
                                
                                <td class="tg-0pky  type_6">
                                    <?php echo $potrikar_grahok_briddhi['cs_bt_grahok'] ?>

                                </td>
                                
                                <td class="tg-0pky type_8">
                                    <?php echo $potrikar_grahok_briddhi['cs_briddhi_grahok'] ?>

                                </td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $potrikar_grahok_briddhi['cs_ghatti_grahok'] ?>

                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">বড় ইংরেজি পত্রিকা</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $potrikar_grahok_briddhi['bep_pn_before'] ?>
                                </td>
                                 

                                <td class="tg-0pky  type_2">
                                    <?php echo $potrikar_grahok_briddhi['bep_pn_after'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $potrikar_grahok_briddhi['bep_bt_potrika'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $potrikar_grahok_briddhi['bep_briddhi_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $potrikar_grahok_briddhi['bep_ghatti_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo $potrikar_grahok_briddhi['bep_bmn'] ?>

                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $potrikar_grahok_briddhi['bep_bbkry'] ?>

                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $potrikar_grahok_briddhi['bep_bbitrn'] ?>

                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $potrikar_grahok_briddhi['bep_gn_before'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $potrikar_grahok_briddhi['bep_gn_present'] ?>
                                </td>
                                
                                <td class="tg-0pky  type_6">
                                    <?php echo $potrikar_grahok_briddhi['bep_bt_grahok'] ?>

                                </td>
                                
                                <td class="tg-0pky type_8">
                                    <?php echo $potrikar_grahok_briddhi['bep_briddhi_grahok'] ?>

                                </td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $potrikar_grahok_briddhi['bep_ghatti_grahok'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাহিত্য পত্রিকা </td>
                                 <td class="tg-0pky  type_1">
                                    <?php echo $potrikar_grahok_briddhi['sp_pn_before'] ?>
                                </td>
                                 

                                <td class="tg-0pky  type_2">
                                    <?php echo $potrikar_grahok_briddhi['sp_pn_present'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $potrikar_grahok_briddhi['sp_bt_potrika'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $potrikar_grahok_briddhi['sp_briddhi_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $potrikar_grahok_briddhi['sp_ghatti_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo $potrikar_grahok_briddhi['sp_bmn'] ?>

                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $potrikar_grahok_briddhi['sp_bbkry'] ?>

                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $potrikar_grahok_briddhi['sp_bbitrn'] ?>

                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $potrikar_grahok_briddhi['sp_gn_before'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $potrikar_grahok_briddhi['sp_gn_present'] ?>
                                </td>
                                
                                <td class="tg-0pky  type_6">
                                    <?php echo $potrikar_grahok_briddhi['sp_bt_grahok'] ?>

                                </td>
                                
                                <td class="tg-0pky type_8">
                                    <?php echo $potrikar_grahok_briddhi['sp_briddhi_grahok'] ?>

                                </td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $potrikar_grahok_briddhi['sp_ghatti_grahok'] ?>

                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শাখা কর্তৃক প্রকাশিত পত্রিকা </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $potrikar_grahok_briddhi['skpp_pn_before'] ?>
                                </td>
                                 

                                <td class="tg-0pky  type_2">
                                    <?php echo $potrikar_grahok_briddhi['skpp_pn_present'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $potrikar_grahok_briddhi['skpp_bt_potrika'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $potrikar_grahok_briddhi['skpp_briddhi_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $potrikar_grahok_briddhi['skpp_ghatti_potrika'] ?>

                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo $potrikar_grahok_briddhi['skpp_bmn'] ?>

                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $potrikar_grahok_briddhi['skpp_bbkry'] ?>

                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $potrikar_grahok_briddhi['skpp_bbitrn'] ?>

                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $potrikar_grahok_briddhi['skpp_gn_before'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $potrikar_grahok_briddhi['skpp_gn_present'] ?>
                                </td>
                                
                                <td class="tg-0pky  type_6">
                                    <?php echo $potrikar_grahok_briddhi['skpp_bt_grahok'] ?>

                                </td>
                                
                                <td class="tg-0pky type_8">
                                    <?php echo $potrikar_grahok_briddhi['skpp_briddhi_grahok'] ?>

                                </td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $potrikar_grahok_briddhi['skpp_ghatti_grahok'] ?>

                                </td>
                            </tr>
                            
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b> শাখার উদ্যোগে সাহিত্য প্রকাশ </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Literature_শাখার উদ্যোগে সাহিত্য প্রকাশ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7">শাখা আইডি</td>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7"> সময়কাল </td>
                                <td class="tg-pwj7">নাম </td>
                                <!-- <td class="tg-pwj7"> বিষয় </td> -->
                                <td class="tg-pwj7"> ইস্যু সংখ্যা </td>
                                <!-- <td class='tg-pwj7'>Actions</td> -->
                            </tr>

                            <?php
                            $i = 0;
                            foreach ($shakhar_literature_publish->result_array() as $row) {
                                $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?> </td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?> </td>
                                    <td class="tg-0pky type_1"><?php echo $row['literature_type'] ?> </td>
                                    <td class="tg-0pky  type_2">
                                        <?php echo $row['literature_time'] ?>
                                    </td>

                                    <td class="tg-0pky  type_3">
                                        <?php echo $row['literature_name'] ?>
                                    </td>
                                    <!-- <td class="tg-0pky  type_4"> -->

                                        <!-- <?php echo $row['literature_term'] ?> -->

                                    <!-- </td> -->
                                    <td class="tg-0pky  type_1">
                                        <?php echo $row['literature_amount'] ?>
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