<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সাহিত্য বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<?php
			if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
				if ($report_info['type'] == 'annual') {
					echo anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
					echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
					echo "&nbsp;|&nbsp;";
					echo anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
				} else {
					echo anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
					echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
				}
			} else {

				if ($report_info['type'] == 'annual') {
					echo    anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
				} else {

					echo   anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

					echo   ' <li>' . anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

					for ($i = date('Y') - 1; $i >= 2019; $i--) {
						echo   ' <li>' . anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
						echo   ' <li>' . anchor('admin/departmentsreport/literature-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/literature-page-two/') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/literature-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" colspan="13"><b>সাহিত্য সংগঠন সম্পর্কিত </b></td>
                            <td class="tg-pwj7" colspan="2">
                                <a href="#" id="table_1" onclick="doit('xlsx','testTable1','<?php echo 'Literature_সাহিত্য সংগঠন সম্পর্কিত : ১.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                            <tr>
                                <td class="tg-pwj7" rowspan='3'>ক্রম</td>
                                <td class="tg-pwj7" rowspan='3'>শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan='3'>সাহিত্য সংগঠনের নাম</td>
                                <td class="tg-pwj7" colspan='12'> নিয়োজিত জনবল </td>
                                
                            </tr>
                            					
                            <tr>
                                <td class="tg-pwj7" colspan='2'>সদস্য</td>
                                <td class="tg-pwj7" colspan='2'> সাথী</td>
                                <td class="tg-pwj7" colspan='2'>কর্মী</td>
                                <td class="tg-pwj7" colspan='2'>সমর্থক</td>
                                <td class="tg-pwj7" colspan='2'>বন্ধু</td>
                                <td class="tg-pwj7" colspan='2'>মোট</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >পূর্ব</td>
                                <td class="tg-pwj7" >বর্তমান</td>
                                <td class="tg-pwj7" >পূর্ব</td>
                                <td class="tg-pwj7" >বর্তমান</td>
                                <td class="tg-pwj7" >পূর্ব</td>
                                <td class="tg-pwj7" >বর্তমান</td>
                                <td class="tg-pwj7" >পূর্ব</td>
                                <td class="tg-pwj7" >বর্তমান</td>
                                <td class="tg-pwj7" >পূর্ব</td>
                                <td class="tg-pwj7" >বর্তমান</td>
                                <td class="tg-pwj7" >পূর্ব</td>
                                <td class="tg-pwj7" >বর্তমান</td>
                                
                            </tr>
                            <?php
                            $i=0;
                            foreach($literature_songothon_one->result_array() as $row) 
                                {
                                    $i++;
                        ?>

                            <tr>
                                <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                <td class="tg-0pky type_1"><?php echo $row['s_name'] ?>	</td>
                            
                                <td class="tg-0pky  type_2">
                                <?php echo $row['s_m_p'] ?>      
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $row['s_m'] ?>      
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo $row['s_a_p'] ?>      
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $row['s_a'] ?>      
                                </td>

                                <td class="tg-0pky  type_4">
                                <?php echo $row['s_w_p'] ?>       
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $row['s_w'] ?>       
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $row['s_s_p'] ?> 
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $row['s_s'] ?> 
                                </td>

                                <td class="tg-0pky  type_4">
                                <?php echo $row['s_f_p'] ?>       
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $row['s_f'] ?>       
                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $row['s_m_p'] +$row['s_a_p'] +$row['s_w_p'] +$row['s_s_p'] +$row['s_f_p'] ?> 
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $row['s_m'] +$row['s_a'] +$row['s_w'] +$row['s_s'] +$row['s_f'] ?> 
                                </td>
                              
                            </tr>

                    <?php } ?>
                       <!--  </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                        
                        <tr>
                            <td class="tg-pwj7" colspan="2"><b>সাহিত্য সংগঠন সম্পর্কিত : ২</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id="table_2" onclick="doit('xlsx','testTable2','<?php echo 'Literature_সাহিত্য সংগঠন সম্পর্কিত : ২.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        
                            					
                            <tr>
                                <td class="tg-pwj7">সাহিত্য সভার ধরণ </td>
                                <td class="tg-pwj7" > সভা সংখ্যা</td>
                                <td class="tg-pwj7" >সদস্য সংখ্যা</td>
                            </tr>
                            <tr>
                                <td class="type_1 tg-y698">শাখাভিত্তিক</td>
                                <td class="type_1"> <?php echo $literature_songothon_two['s_s_sonkha'] ?></td>
                                <td class="type_1"> <?php echo $literature_songothon_two['s_m_sonkha'] ?></td>
                            </tr>
                            <tr>
                                <td class="type_1 tg-y698">থানাভিত্তিক</td>
                                <td class="type_1"> <?php echo $literature_songothon_two['t_s_sonkha'] ?></td>
                                <td class="type_1"> <?php echo $literature_songothon_two['t_m_sonkha'] ?></td>
                            </tr>
                        </table> -->
    <table class="tg table table-header-rotated" id="testTable3">
        <tr>
            <td class="tg-pwj7" colspan="3"><b>প্রোগ্রাম</b></td>
            <td class="tg-pwj7" colspan="">
                <a href="#" id="table_3" onclick="doit('xlsx','testTable3','<?php echo 'Literature_প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
            </td>
        </tr> 
        <tr>
            <td class="tg-pwj7">প্রোগ্রামের নাম</td>
            <!-- <td class="tg-pwj7" > টার্গেট গ্রুপ (যাদের নিয়ে আয়োজন) </td> -->
            <td class="tg-pwj7" >প্রোগ্রাম সংখ্যা </td>
            <td class="tg-pwj7" > মোট উপস্থিতি </td>
            <td class="tg-pwj7" >  গড় উপস্থিতি </td>
        </tr>


        <tr>
            <td class="tg-y698 type_1">কার্যকরী কমিটির বৈঠক	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['kj_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['kj_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['kj_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['kj_p_sonkha']) && isset( $literature_program['kj_t_upostit']) && (int)$literature_program['kj_t_upostit']>0)?
            ($literature_program['kj_t_upostit']/$literature_program['kj_p_sonkha']):''?>
            </td>

        </tr>
            
        <tr>
            <td class="tg-y698 type_1">সাহিত্য সভা	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['kj_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['saso_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['saso_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['saso_p_sonkha']) && isset( $literature_program['saso_t_upostit']) && (int)$literature_program['saso_t_upostit']>0)?
            ($literature_program['saso_t_upostit']/$literature_program['saso_p_sonkha']):''?>
            </td>

        </tr>

        <tr>
            <td class="tg-y698 type_1">গুনীজন সংবর্ধনা	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['guso_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['guso_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['guso_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['guso_p_sonkha']) && isset( $literature_program['guso_t_upostit']) && (int)$literature_program['guso_t_upostit']>0)?
            ($literature_program['guso_t_upostit']/$literature_program['guso_p_sonkha']):''?>
            </td>

        </tr>
        <tr>
            <td class="tg-y698 type_1">ইফতার মাহফিল/ ঈদ পুনর্মিলনী	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['ifpur_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['ifpur_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['ifpur_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['ifpur_p_sonkha']) && isset( $literature_program['ifpur_t_upostit']) && (int)$literature_program['ifpur_t_upostit']>0)?
            ($literature_program['ifpur_t_upostit']/$literature_program['ifpur_p_sonkha']):''?>
            </td>

        </tr>
        <tr>
            <td class="tg-y698 type_1">সাহিত্য সম্পর্কিত প্রতিযোগিতা 	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['sapro_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['sapro_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['sapro_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['sapro_p_sonkha']) && isset( $literature_program['sapro_t_upostit']) && (int)$literature_program['sapro_t_upostit']>0)?
            ($literature_program['sapro_t_upostit']/$literature_program['sapro_p_sonkha']):''?>
            </td>

        </tr>
        <tr>
            <td class="tg-y698 type_1">নবীন লেখক সংবর্ধনা	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['noso_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['noso_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['noso_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['noso_p_sonkha']) && isset( $literature_program['noso_t_upostit']) && (int)$literature_program['noso_t_upostit']>0)?
            ($literature_program['noso_t_upostit']/$literature_program['noso_p_sonkha']):''?>
            </td>

        </tr>
        <tr>
            <td class="tg-y698 type_1">সাহিত্য সম্পর্কিত দিবস উদযাপন	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['saud_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['saud_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['saud_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['saud_p_sonkha']) && isset( $literature_program['saud_t_upostit']) && (int)$literature_program['saud_t_upostit']>0)?
            ($literature_program['saud_t_upostit']/$literature_program['saud_p_sonkha']):''?>
            </td>

        </tr>
        <tr>
            <td class="tg-y698 type_1">লেখক সমাবেশ	</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['leso_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['leso_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['leso_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['leso_p_sonkha']) && isset( $literature_program['leso_t_upostit']) && (int)$literature_program['leso_t_upostit']>0)?
            ($literature_program['leso_t_upostit']/$literature_program['leso_p_sonkha']):''?>
            </td>

        </tr>

        <tr>
            <td class="tg-y698">সাহিত্য উৎসব</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['su_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['su_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['su_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['su_p_sonkha']) && isset( $literature_program['su_t_upostit']) && (int)$literature_program['su_t_upostit']>0)?
            ($literature_program['su_t_upostit']/$literature_program['su_p_sonkha']):''?>
            </td>

        </tr>

        <tr>
            <td class="tg-y698">সাহিত্য আড্ডা </td>
           <!--  <td class="tg-0pky type_1">
                <?php echo $literature_program['sd_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['sd_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['sd_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['sd_p_sonkha']) && isset( $literature_program['sd_t_upostit']) && (int)$literature_program['sd_t_upostit']>0)?
            ($literature_program['sd_t_upostit']/$literature_program['sd_p_sonkha']):''?>
            </td>

        </tr>

         
        <tr>
            <td class="tg-y698">সাহিত্য পাঠচক্র</td>
           <!--  <td class="tg-0pky type_1">
                <?php echo $literature_program['sp_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['sp_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['sp_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['sp_p_sonkha']) && isset( $literature_program['sp_t_upostit']) && (int)$literature_program['sp_t_upostit']>0)?
            ($literature_program['sp_t_upostit']/$literature_program['sp_p_sonkha']):''?>
            </td>
        </tr>

        <tr>
            <td class="tg-y698">সাহিত্য সামষ্টিক পাঠ</td>
           <!--  <td class="tg-0pky type_1">
                <?php echo $literature_program['ssp_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['ssp_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['ssp_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['ssp_p_sonkha']) && isset( $literature_program['ssp_t_upostit']) && (int)$literature_program['ssp_t_upostit']>0)?
            ($literature_program['ssp_t_upostit']/$literature_program['ssp_p_sonkha']):''?>
            </td>

        </tr>

        <tr>
            <td class="tg-y698">সাহিত্য কর্মশালা</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['sk_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['sk_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['sk_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['sk_p_sonkha']) && isset( $literature_program['sk_t_upostit']) && (int)$literature_program['sk_t_upostit']>0)?
            ($literature_program['sk_t_upostit']/$literature_program['sk_p_sonkha']):''?>
            </td>

        </tr>

        


       
        <tr>
            <td class="tg-y698">কেন্দ্র আয়োজিত সাহিত্য কর্মশালায় অংশগ্রহণ</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['ck_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['ck_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['ck_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['ck_p_sonkha']) && isset( $literature_program['ck_t_upostit']) && (int)$literature_program['ck_t_upostit']>0)?
            ($literature_program['ck_t_upostit']/$literature_program['ck_p_sonkha']):''?>
            </td>

        </tr>
        <tr>
            <td class="tg-y698">শাখা সাহিত্য সংগঠনের উদ্যোগে সাধারণ সভা</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['bs_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['bs_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['bs_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['bs_p_sonkha']) && isset( $literature_program['bs_t_upostit']) && (int)$literature_program['bs_t_upostit']>0)?
            ($literature_program['bs_t_upostit']/$literature_program['bs_p_sonkha']):''?>
            </td>

        </tr>
        <tr>
            <td class="tg-y698">থানা সাহিত্য সংগঠনের উদ্যোগে সাধারণ সভা</td>
            <!-- <td class="tg-0pky type_1">
                <?php echo $literature_program['ts_tg_sonkha'] ?>
            </td> -->
            <td class="tg-0pky type_1">
                <?php echo $literature_program['ts_p_sonkha'] ?>
            </td>
            <td class="tg-0pky  type_2">
                <?php echo $literature_program['ts_t_upostit'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo (isset( $literature_program['ts_p_sonkha']) && isset( $literature_program['ts_t_upostit']) && (int)$literature_program['ts_t_upostit']>0)?
            ($literature_program['ts_t_upostit']/$literature_program['ts_p_sonkha']):''?>
            </td>

           

        </tr>
    </table>
    <table class="tg table table-header-rotated" id="testTable5">
        <tr>
            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
            <td class="tg-pwj7" colspan="1">
                <a href="#" id="table_5" onclick="doit('xlsx','testTable5','<?php echo 'Literature_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
            <?php echo $shikkha_central_s=$literature_training_program['shikkha_central_s'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $shikkha_central_p=$literature_training_program['shikkha_central_p'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
            <td class="tg-0pky type_1">
            <?php echo $shikkha_shakha_s=$literature_training_program['shikkha_shakha_s'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $shikkha_shakha_p=$literature_training_program['shikkha_shakha_p'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
            <td class="tg-0pky type_1">
            <?php echo $kormoshala_central_s=$literature_training_program['kormoshala_central_s'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $kormoshala_central_p=$literature_training_program['kormoshala_central_p'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">কর্মশালা (শাখা)</td>
            <td class="tg-0pky type_1">
            <?php echo $kormoshala_shakha_s=$literature_training_program['kormoshala_shakha_s'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $kormoshala_shakha_p=$literature_training_program['kormoshala_shakha_p'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
            </td>
        </tr>
    </table>
    <table class="tg table table-header-rotated" id="testTable4">
        <tr>
            <td class="tg-pwj7" colspan="4"><b>যোগাযোগ ও আউটপুট</b></td>
            <td class="tg-pwj7" colspan="1">
                <a href="#" id="table_4" onclick="doit('xlsx','testTable4','<?php echo 'Literature_যোগাযোগ ও আউটপুট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
            </td>
        </tr> 
        <tr>
            <td class="tg-pwj7" rowspan='2'>ধরন</td>
            <td class="tg-pwj7" colspan='2'> যোগাযোগ </td>
            <td class="tg-pwj7" colspan='2'>আউটপুট </td>
        </tr>
        <tr>
            <td class="tg-pwj7">প্রবীণ</td>
            <td class="tg-pwj7" > নবীন </td>
            <td class="tg-pwj7" >টার্গেট </td>
            <td class="tg-pwj7" > অর্জন </td>
        </tr>
	
        <tr>
            <td class="tg-y698">কবি</td>
            <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['kb_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['kb_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['kb_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['kb_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">গল্পকার</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['gl_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['gl_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['gl_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['gl_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">ছড়াকার</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['ch_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['ch_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['ch_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['ch_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">প্রাবন্ধিক</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['pro_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['pro_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['pro_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['pro_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">ঔপন্যাসিক</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['op_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['op_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['op_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['op_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">সম্পাদক</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['sm_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['sm_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['sm_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['sm_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">প্রকাশক</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['pb_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['pb_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['pb_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['pb_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">বাচিক শিল্পী</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['bs_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['bs_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['bs_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['bs_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">চারু শিল্পী</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['cs_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['cs_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['cs_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['cs_o_a'] ?>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">অন্যান্য</td>
             <td class="tg-0pky type_1">
            <?php echo $literature_gogajok_output['ot_j_p'] ?>
            </td>
            <td class="tg-0pky  type_2">
            <?php echo $literature_gogajok_output['ot_j_n'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['ot_o_t'] ?>
            </td>
            <td class="tg-0pky  type_3">
            <?php echo $literature_gogajok_output['ot_o_a'] ?>
            </td>
        </tr>
    </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
