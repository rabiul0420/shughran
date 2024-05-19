<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মিডিয়া বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/media-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/media-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan='3'><b>কমিটি</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Media_কমিটি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-pwj7" rowspan=''>ক্রম </td>
                            <td class="tg-pwj7" rowspan=''>শাখা আইডি </td>                           
                            <td class="tg-pwj7" colspan=''>শাখায় সাংবাদিক ফোরাম আছে কিনা?</td>
                            <td class="tg-pwj7" colspan=''>  সাংবাদিক ফোরাম কোন মানের? </td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($media->result_array() as $row) 
                                    {
                                    $i++;
                                    $status=array("1"=>"থানা","0"=>"শাখার বিভাগ");
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1">
                                        <?php echo $i ?>	
                                    </td>
                                    <td class="tg-0pky type_1">
                                        <?php echo $row['branch_id'] ?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <?php echo ($row['shang_forum_yes_no']==1)?"হ্যাঁ":"না";?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                        <?php echo isset($row['shang_forum_man'])?$status[$row['shang_forum_man']]:"";?>      
                                    </td>
                                </tr>

                        <?php } ?>      
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='9'><b>জনশক্তি</b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Media_জনশক্তি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" >বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7" >মোট বৃদ্ধি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >আগমন </td>
                                <td class="tg-pwj7" >মোট ঘাটতি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >স্থানান্তর</td>
                                <td class="tg-pwj7" >উচ্চশিক্ষা</td>
                                <td class="tg-pwj7" >ছাত্রত্ব শেষ</td>
                                <td class="tg-pwj7" >সাংবাদিক</td>
                            </tr>



                            <tr>                  
                                
                                <td class="tg-y698 type_1"> এডমিন	</td>
                                <td class="tg-0pky type_1" > 
                               <?php echo $admin_prev = $media_manpower['admin_prev'] ?>								
								</td>
                                <td class="tg-0pky">
                                 <?php echo $admin_pres = $media_manpower['admin_pres'] ?>	
								</td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_mot = $media_manpower['admin_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_man_unnoyon = $media_manpower['admin_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_man_agomon = $media_manpower['admin_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_total_gha = $media_manpower['admin_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_man_unnoyon = $media_manpower['admin_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_sthanantor = $media_manpower['admin_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_high_study = $media_manpower['admin_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_study_finish = $media_manpower['admin_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_shangbadik = $media_manpower['admin_gha_shangbadik'] ?>	
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাব-এডমিন</td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_prev = $media_manpower['sub_admin_prev'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_pres = $media_manpower['sub_admin_pres'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_mot = $media_manpower['sub_admin_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_man_unnoyon = $media_manpower['sub_admin_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_man_agomon = $media_manpower['sub_admin_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_total_gha = $media_manpower['sub_admin_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_man_unnoyon = $media_manpower['sub_admin_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_sthanantor = $media_manpower['sub_admin_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_high_study = $media_manpower['sub_admin_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_study_finish = $media_manpower['sub_admin_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_shangbadik = $media_manpower['sub_admin_gha_shangbadik'] ?>	
                                </td>

                            </tr>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"> প্রোগ্রামার	</td>
                                <td class="tg-0pky type_1" > 	
								  <?php echo $programmer_prev = $media_manpower['programmer_prev'] ?>	
								</td>
                                <td class="tg-0pky"> 
								  <?php echo $programmer_pres = $media_manpower['programmer_pres'] ?>	
								</td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_mot = $media_manpower['programmer_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_man_unnoyon = $media_manpower['programmer_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_man_agomon = $media_manpower['programmer_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_total_gha = $media_manpower['programmer_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_man_unnoyon = $media_manpower['programmer_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_sthanantor = $media_manpower['programmer_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_high_study = $media_manpower['programmer_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_study_finish = $media_manpower['programmer_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_shangbadik = $media_manpower['programmer_gha_shangbadik'] ?>	
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষানবিশ</td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_prev = $media_manpower['shikkhanbish_prev'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_pres = $media_manpower['shikkhanbish_pres'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_mot = $media_manpower['shikkhanbish_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_man_unnoyon = $media_manpower['shikkhanbish_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_man_agomon = $media_manpower['shikkhanbish_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_total_gha = $media_manpower['shikkhanbish_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_man_unnoyon = $media_manpower['shikkhanbish_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_sthanantor = $media_manpower['shikkhanbish_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_high_study = $media_manpower['shikkhanbish_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_study_finish = $media_manpower['shikkhanbish_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_shangbadik = $media_manpower['shikkhanbish_gha_shangbadik'] ?>	
                                </td>

                            </tr>
                            <tr>
                            
                                <td class="tg-y698" >মোট</td>    
                                <td class="tg-0pky" >
								  <?php echo ($admin_prev+$sub_admin_prev+$programmer_prev+$shikkhanbish_prev) ?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_pres+$sub_admin_pres+$programmer_pres+$shikkhanbish_pres)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_mot+$sub_admin_mot+$programmer_mot+$shikkhanbish_mot)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_man_unnoyon+$sub_admin_man_unnoyon+$programmer_man_unnoyon+$shikkhanbish_man_unnoyon)?>
								</td>
                                <td class="tg-0pky" >
								   <?php echo ($admin_man_agomon+$sub_admin_man_agomon+$programmer_man_agomon+$shikkhanbish_man_agomon)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_total_gha+$sub_admin_total_gha+$programmer_total_gha+$shikkhanbish_total_gha)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_man_unnoyon+$sub_admin_gha_man_unnoyon+$programmer_gha_man_unnoyon+$shikkhanbish_gha_man_unnoyon)?>
								</td>
                                <td class="tg-0pky" >
								  <?php echo ($admin_gha_sthanantor+$sub_admin_gha_sthanantor+$programmer_gha_sthanantor+$shikkhanbish_gha_sthanantor)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_gha_high_study+$sub_admin_gha_high_study+$programmer_gha_high_study+$shikkhanbish_gha_high_study)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_study_finish+$sub_admin_gha_study_finish+$programmer_gha_study_finish+$shikkhanbish_gha_study_finish)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_shangbadik+$sub_admin_gha_shangbadik+$programmer_gha_shangbadik+$shikkhanbish_gha_shangbadik)?>
								</td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>                           
                                <td class="tg-pwj7" colspan='4'><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Media_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>                              
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" > কতজন </td>
                                <td class="tg-pwj7" >কতবার</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" > কতজন </td>
                                <td class="tg-pwj7" >কতবার</td>
                            </tr>



                            <tr>                          
                                                            
                                <td class="tg-y698 type_1"> সাংবাদিক	</td>
                               
                                <td class="tg-0pky" >
                                <?php echo $shangbadik_num = $media_contact['shangbadik_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $shangbadik_bar = $media_contact['shangbadik_bar'] ?>
                                </td>
                                <td class="tg-y698" > মালিক </td>
                                <td class="tg-0pky" >
                                <?php echo $malik_num = $media_contact['malik_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $malik_bar = $media_contact['malik_bar'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু</td>
                                <td class="tg-0pky" >
                                <?php echo $bondhu_num = $media_contact['bondhu_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondhu_bar = $media_contact['bondhu_bar'] ?>
                                </td>
                                <td class="tg-y698" > সম্পাদক</td>
                                <td class="tg-0pky" >
                                <?php echo $shompadok_num = $media_contact['shompadok_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $shompadok_bar = $media_contact['shompadok_bar'] ?>
                                </td>                                

                            </tr>
                            
                            <tr>
                                <td class="tg-y698">ছাত্র</td>
                                <td class="tg-0pky" >
                                <?php echo $student_num = $media_contact['student_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $student_bar = $media_contact['student_bar'] ?>
                                </td>
                                <td class="tg-y698" >কলামিস্ট </td>
                                <td class="tg-0pky" >
                                <?php echo $collamist_num = $media_contact['collamist_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $collamist_bar = $media_contact['collamist_bar'] ?>
                                </td>                                
                            </tr>  

                        </table>
                      
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
