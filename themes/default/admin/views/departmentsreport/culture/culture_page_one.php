<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শিল্প ও সংস্কৃতি বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/culture-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable5">
                            <tr>                           
                                <td class="tg-pwj7" colspan='2'><b>সাংস্কৃতিক সংগঠনের তথ্য</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Culture_সাংস্কৃতিক সংগঠনের তথ্য.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan=''>ক্রম </td>
                                <td class="tg-pwj7" rowspan=''>শাখা আইডি </td>
                                <td class="tg-pwj7" rowspan=''>নাম </td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($culture_name->result_array() as $row) 
                                    {
                                    $i++;
                                    
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                </tr>
                        <?php } ?> 
                    </table>
                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>                           
                                <td class="tg-pwj7" colspan='9'><b>জনশক্তি</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Culture_জনশক্তি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">মান</td>
                                <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                                <td class="tg-pwj7" colspan="">মানোন্নয়ন </td>
                                <td class="tg-pwj7" colspan="">আগমন </td>
                                <td class="tg-pwj7" colspan="">ঘাটতি</td>
                                <td class="tg-pwj7" colspan="">মানোন্নয়ন</td>
                                <td class="tg-pwj7" colspan="">স্থানান্তর</td>
                                <td class="tg-pwj7" colspan="">ছাত্রত্ব শেষ </td>
                                <td class="tg-pwj7" colspan="">বাতিল</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> নকিব 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_prev = $culture_manpower['nokib_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $nokib_pres = $culture_manpower['nokib_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $nokib_bri = $culture_manpower['nokib_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $nokib_bri_man = $culture_manpower['nokib_bri_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $nokib_bri_ago = $culture_manpower['nokib_bri_ago'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $nokib_gha = $culture_manpower['nokib_gha'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_gha_man = $culture_manpower['nokib_gha_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_gha_sthan = $culture_manpower['nokib_gha_sthan'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_gha_chattrotto = $culture_manpower['nokib_gha_chattrotto'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_gha_batil = $culture_manpower['nokib_gha_batil'] ?>
                                </td>
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">নকিব প্রার্থী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_prarthi_prev = $culture_manpower['nokib_prarthi_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $nokib_prarthi_pres = $culture_manpower['nokib_prarthi_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $nokib_prarthi_bri = $culture_manpower['nokib_prarthi_bri'] ?>
                                </td>
								<td class="tg-0pky  type_3">
                                <?php echo $nokib_prarthi_bri_man = $culture_manpower['nokib_prarthi_bri_man'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $nokib_prarthi_bri_ago = $culture_manpower['nokib_prarthi_bri_ago'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_prarthi_gha = $culture_manpower['nokib_prarthi_gha'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_prarthi_gha_man = $culture_manpower['nokib_prarthi_gha_man'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_prarthi_gha_sthan = $culture_manpower['nokib_prarthi_gha_sthan'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_prarthi_gha_chattrotto = $culture_manpower['nokib_prarthi_gha_chattrotto'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_prarthi_gha_batil	 = $culture_manpower['nokib_prarthi_gha_batil'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogroj_prev = $culture_manpower['ogroj_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $ogroj_pres = $culture_manpower['ogroj_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $ogroj_bri = $culture_manpower['ogroj_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $ogroj_bri_man = $culture_manpower['ogroj_bri_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogroj_bri_ago  = $culture_manpower['ogroj_bri_ago'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ogroj_gha = $culture_manpower['ogroj_gha'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogroj_gha_man = $culture_manpower['ogroj_gha_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogroj_gha_sthan	 = $culture_manpower['ogroj_gha_sthan'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogroj_gha_chattrotto = $culture_manpower['ogroj_gha_chattrotto'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogroj_gha_batil = $culture_manpower['ogroj_gha_batil'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ প্রার্থী  </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogroj_prarthi_prev  = $culture_manpower['ogroj_prarthi_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $ogroj_prarthi_pres  = $culture_manpower['ogroj_prarthi_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogroj_prarthi_bri	 = $culture_manpower['ogroj_prarthi_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogroj_prarthi_bri_man	 = $culture_manpower['ogroj_prarthi_bri_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $ogroj_prarthi_bri_ago	 = $culture_manpower['ogroj_prarthi_bri_ago'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogroj_prarthi_gha	 = $culture_manpower['ogroj_prarthi_gha'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogroj_prarthi_gha_man = $culture_manpower['ogroj_prarthi_gha_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $ogroj_prarthi_gha_sthan	 = $culture_manpower['ogroj_prarthi_gha_sthan'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogroj_prarthi_gha_chattrotto  = $culture_manpower['ogroj_prarthi_gha_chattrotto'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogroj_prarthi_gha_batil  = $culture_manpower['ogroj_prarthi_gha_batil'] ?>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> উন্মেষ 	</td>
                                
                                <td class="tg-0pky  type_1">
                                <?php echo $unmesh_prev	 = $culture_manpower['unmesh_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $unmesh_pres	 = $culture_manpower['unmesh_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $unmesh_bri	 = $culture_manpower['unmesh_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $unmesh_bri_man	 = $culture_manpower['unmesh_bri_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $unmesh_bri_ago	 = $culture_manpower['unmesh_bri_ago'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $unmesh_gha	 = $culture_manpower['unmesh_gha'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $unmesh_gha_man	 = $culture_manpower['unmesh_gha_man'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $unmesh_gha_sthan	 = $culture_manpower['unmesh_gha_sthan'] ?>
                                </td>
								<td class="tg-0pky  type_3">
								<?php echo $unmesh_gha_chattrotto	 = $culture_manpower['unmesh_gha_chattrotto'] ?>
								</td>
								<td class="tg-0pky  type_1">
								<?php echo $unmesh_gha_batil	 = $culture_manpower['unmesh_gha_batil'] ?>
								</td>
                               
                            
                            </tr>


                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $nokib_prev+$nokib_prarthi_prev+$ogroj_prev+$ogroj_prarthi_prev+$unmesh_prev  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_pres+$nokib_prarthi_pres+$ogroj_pres+$ogroj_prarthi_pres+$unmesh_pres  ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_bri+$nokib_prarthi_bri+$ogroj_bri+$ogroj_prarthi_bri+$unmesh_bri  ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_bri_man+$nokib_prarthi_bri_man+$ogroj_bri_man+$ogroj_prarthi_bri_man+$unmesh_bri_man  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_bri_ago+$nokib_prarthi_bri_ago+$ogroj_bri_ago+$ogroj_prarthi_bri_ago+$unmesh_bri_ago  ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_gha+$nokib_prarthi_gha+$ogroj_gha+$ogroj_prarthi_gha+$unmesh_gha  ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_gha_man+$nokib_prarthi_gha_man+$ogroj_gha_man+$ogroj_prarthi_gha_man+$unmesh_gha_man  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_gha_sthan+$nokib_prarthi_gha_sthan+$ogroj_gha_sthan+$ogroj_prarthi_gha_sthan+$unmesh_gha_sthan  ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_gha_chattrotto+$nokib_prarthi_gha_chattrotto+$ogroj_gha_chattrotto+$ogroj_prarthi_gha_chattrotto+$unmesh_gha_chattrotto  ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_gha_batil+$nokib_prarthi_gha_batil+$ogroj_gha_batil+$ogroj_prarthi_gha_batil+$unmesh_gha_batil  ?>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='8'><b>দাওয়াত</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Culture_দাওয়াত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan=""> বিবরণ   </td>
                                <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">বর্তমান </td>
                                <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                                <td class="tg-pwj7" colspan="">ঘাটতি </td>
                                <td class="tg-pwj7" rowspan=""> বিবরণ   </td>
                                <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">বর্তমান </td>
                                <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                                <td class="tg-pwj7" colspan="">ঘাটতি </td>

                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> পরশ 	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $porosh_prev = $culture_dawat['porosh_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $porosh_pres = $culture_dawat['porosh_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $porosh_bri = $culture_dawat['porosh_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $porosh_ghat = $culture_dawat['porosh_ghat'] ?>
                                </td>
                                <td class="tg-y698 type_1"> ক্যালিওগ্রাফার 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $calligrapher_prev = $culture_dawat['calligrapher_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $calligrapher_pres = $culture_dawat['calligrapher_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $calligrapher_bri = $culture_dawat['calligrapher_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $calligrapher_ghat = $culture_dawat['calligrapher_ghat'] ?>
                                </td>
                              
                           
                            </tr>


                            <tr>
                                <td class="tg-y698">সঙ্গীত শিল্পী  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shongit_prev = $culture_dawat['shongit_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $shongit_pres = $culture_dawat['shongit_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shongit_bri = $culture_dawat['shongit_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shongit_ghat = $culture_dawat['shongit_ghat'] ?>
                                </td>
                                <td class="tg-y698">হস্ত (কারু) শিল্পী  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hosto_shilpi_prev = $culture_dawat['hosto_shilpi_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $hosto_shilpi_pres = $culture_dawat['hosto_shilpi_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $hosto_shilpi_bri = $culture_dawat['hosto_shilpi_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hosto_shilpi_ghat = $culture_dawat['hosto_shilpi_ghat'] ?>
                                </td>
                              
                             
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">অভিনয় শিল্পী  </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $ovinoy_prev = $culture_dawat['ovinoy_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ovinoy_pres = $culture_dawat['ovinoy_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ovinoy_bri = $culture_dawat['ovinoy_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $ovinoy_ghat = $culture_dawat['ovinoy_ghat'] ?>
                                </td>
                                <td class="tg-y698">ফ্যাশন ডিজাইনার  </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $fashion_designer_prev = $culture_dawat['fashion_designer_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $fashion_designer_pres = $culture_dawat['fashion_designer_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $fashion_designer_bri = $culture_dawat['fashion_designer_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $fashion_designer_ghat = $culture_dawat['fashion_designer_ghat'] ?>
                                </td>
                              
                             
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">আবৃত্তি শিল্পী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $abritti_prev = $culture_dawat['abritti_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $abritti_pres = $culture_dawat['abritti_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $abritti_bri = $culture_dawat['abritti_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $abritti_ghat = $culture_dawat['abritti_ghat'] ?>
                                </td>
                                <td class="tg-y698">স্থাপত্য শিল্পী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $sthapotto_shilpo_prev = $culture_dawat['sthapotto_shilpo_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $sthapotto_shilpo_pres = $culture_dawat['sthapotto_shilpo_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $sthapotto_shilpo_bri = $culture_dawat['sthapotto_shilpo_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $sthapotto_shilpo_ghat = $culture_dawat['sthapotto_shilpo_ghat'] ?>
                                </td>
                    
                            </tr>
                            <tr>
                                <td class="tg-y698">উপস্থাপক </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $uposthapok_prev = $culture_dawat['uposthapok_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $uposthapok_pres = $culture_dawat['uposthapok_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $uposthapok_bri = $culture_dawat['uposthapok_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $uposthapok_ghat = $culture_dawat['uposthapok_ghat'] ?>
                                </td>
                                <td class="tg-y698">শুভাকাঙ্ক্ষী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $shuva_kangkhi_prev = $culture_dawat['shuva_kangkhi_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $shuva_kangkhi_pres = $culture_dawat['shuva_kangkhi_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $shuva_kangkhi_bri = $culture_dawat['shuva_kangkhi_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $shuva_kangkhi_ghat = $culture_dawat['shuva_kangkhi_ghat'] ?>
                                </td>
                    
                            </tr>
                            <tr>
                                <td class="tg-y698"> চিত্র শিল্পী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $chitro_shilpi_prev = $culture_dawat['chitro_shilpi_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $chitro_shilpi_pres = $culture_dawat['chitro_shilpi_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $chitro_shilpi_bri = $culture_dawat['chitro_shilpi_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $chitro_shilpi_ghat = $culture_dawat['chitro_shilpi_ghat'] ?>
                                </td>
                                <td class="tg-y698">উপদেষ্টা </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $opodeshta_prev = $culture_dawat['opodeshta_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $opodeshta_pres = $culture_dawat['opodeshta_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $opodeshta_bri = $culture_dawat['opodeshta_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $opodeshta_ghat = $culture_dawat['opodeshta_ghat'] ?>
                                </td>
                    
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>                           
                                <td class="tg-pwj7" colspan='6'><b>সভাসমূহ </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Culture_সভাসমূহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি </td>
                                <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি </td>
                                <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                        
                            </tr>
        
                            <tr>
                                <td class="tg-y698 type_1"> নকীব বৈঠক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_boithok_num = $culture_shova['nokib_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_boithok_pre = $culture_shova['nokib_boithok_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($nokib_boithok_pre!=0 && $nokib_boithok_num!=0 )?$nokib_boithok_pre/$nokib_boithok_num:0,2)?>
                                </td>

                                <td class="tg-y698 type_1"> উপদেষ্টা বৈঠক 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $upodeshta_boithok_num=$culture_shova['upodeshta_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $upodeshta_boithok_pre=$culture_shova['upodeshta_boithok_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($upodeshta_boithok_pre!=0 && $upodeshta_boithok_num!=0)?$upodeshta_boithok_pre/$upodeshta_boithok_num:0,2)?>
                                </td>
                      
                               
                            </tr>


                            <tr>
                                <td class="tg-y698">পরিচালনা পরিষদ সভা  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $porichalona_porishod_num = $culture_shova['porichalona_porishod_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $porichalona_porishod_pre = $culture_shova['porichalona_porishod_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($porichalona_porishod_pre!=0 && $porichalona_porishod_num!=0)?$porichalona_porishod_pre/$porichalona_porishod_num:0,2)?>
                                </td>

                                <td class="tg-y698">শিল্পী সমাবেশ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shilpi_shomabesh_num=$culture_shova['shilpi_shomabesh_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shilpi_shomabesh_pre=$culture_shova['shilpi_shomabesh_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($shilpi_shomabesh_pre!=0 && $shilpi_shomabesh_num!=0)?$shilpi_shomabesh_pre/$shilpi_shomabesh_num:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ বৈঠক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $agroj_boithok_num= $culture_shova['agroj_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $agroj_boithok_pre=$culture_shova['agroj_boithok_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($agroj_boithok_pre!=0 && $agroj_boithok_num!=0)?$agroj_boithok_pre/$agroj_boithok_num:0,2)?>
                                </td>

                                <td class="tg-y698">সংবর্ধনা অনুষ্ঠান </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shongbordhona_num= $culture_shova['shongbordhona_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shongbordhona_pre=$culture_shova['shongbordhona_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($shongbordhona_pre!=0 && $shongbordhona_num!=0)?$shongbordhona_pre/$shongbordhona_num:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">উন্মেষ বৈঠক </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $unmesh_boithok_num=$culture_shova['unmesh_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $unmesh_boithok_pre=$culture_shova['unmesh_boithok_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($unmesh_boithok_pre!=0 && $unmesh_boithok_num!=0)?$unmesh_boithok_pre/$unmesh_boithok_num:0,2)?>
                                </td>

                                <td class="tg-y698">সাহিত্য আসর </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $sahitto_ashor_num=$culture_shova['sahitto_ashor_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $sahitto_ashor_pre=$culture_shova['sahitto_ashor_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($sahitto_ashor_pre!=0 && $sahitto_ashor_num!=0)?$sahitto_ashor_pre/$sahitto_ashor_num:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">পরশ বৈঠক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $porosh_boithok_num=$culture_shova['porosh_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $porosh_boithok_pre=$culture_shova['porosh_boithok_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($porosh_boithok_pre!=0 && $porosh_boithok_num!=0)?$porosh_boithok_pre/$porosh_boithok_num:0,2)?>
                                </td>

                                <td class="tg-y698">ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $iftar_mahfil_num=$culture_shova['iftar_mahfil_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $iftar_mahfil_pre=$culture_shova['iftar_mahfil_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($iftar_mahfil_pre!=0 && $iftar_mahfil_num!=0)?$iftar_mahfil_pre/$iftar_mahfil_num:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">পর্যালোচনা সভা  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $porjalochona_shova_num=$culture_shova['porjalochona_shova_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $porjalochona_shova_pre=$culture_shova['porjalochona_shova_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($porjalochona_shova_pre!=0 && $porjalochona_shova_num!=0)?$porjalochona_shova_pre/$porjalochona_shova_num:0,2)?>
                                </td>

                                <td class="tg-y698">দিবস পালন  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $dibosh_palon_num=$culture_shova['dibosh_palon_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $dibosh_palon_pre=$culture_shova['dibosh_palon_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($dibosh_palon_pre!=0 && $dibosh_palon_num!=0)?$dibosh_palon_pre/$dibosh_palon_num:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">কমিটি গঠন  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $committee_gothon_num=$culture_shova['committee_gothon_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $committee_gothon_pre=$culture_shova['committee_gothon_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($committee_gothon_pre!=0 && $committee_gothon_num!=0)?$committee_gothon_pre/$committee_gothon_num:0,2)?>
                                </td>

                                <td class="tg-y698">র‌্যালি  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $rally_num=$culture_shova['rally_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $rally_pre=$culture_shova['rally_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($rally_pre!=0 && $rally_num!=0)?$rally_pre/$rally_num:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ সমাবেশ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogroj_shomabesh_num=$culture_shova['ogroj_shomabesh_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogroj_shomabesh_pre=$culture_shova['ogroj_shomabesh_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ogroj_shomabesh_pre!=0 && $ogroj_shomabesh_num!=0)?$ogroj_shomabesh_pre/$ogroj_shomabesh_num:0,2)?>
                                </td>

                                <td class="tg-y698">চা-চক্র  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $cha_chokro_num=$culture_shova['cha_chokro_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $cha_chokro_pre=$culture_shova['cha_chokro_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($cha_chokro_pre!=0 && $cha_chokro_num!=0)?$cha_chokro_pre/$cha_chokro_num:0,2)?>
                                </td>
                            </tr>  

                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>                           
                                <td class="tg-pwj7" colspan='7'><b>সংগঠন  </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Culture_সংগঠন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                   <tr>
                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                       <td class="tg-pwj7" colspan="">ঘাটতি  </td>
                       <td class="tg-pwj7" colspan="">জনশক্তি  </td>
                       <td class="tg-pwj7" colspan="">থানা মানের </td>
                       <td class="tg-pwj7" colspan="">ওয়ার্ড মানের</td>
                       <td class="tg-pwj7" colspan="">উপশাখা মানের</td>
                   </tr>
         
                   <tr>
                       <td class="tg-y698 type_1"> শিল্পগোষ্ঠী 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['shilpi_prev'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['shilpi_pres'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['shilpi_bri'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['shilpi_gha'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['shilpi_jonoshokti'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['shilpi_thana_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['shilpi_ward_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['shilpi_uposhakha_maner'] ?>
                       </td>
                    
                   </tr>


                   <tr>
                       <td class="tg-y698">বিভাগ  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['bivag_prev'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['bivag_pres'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['bivag_bri'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['bivag_gha'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['bivag_jonoshokti'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['bivag_thana_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['bivag_ward_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['bivag_uposhakha_maner'] ?>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">শাখা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_prev'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_pres'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_bri'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_gha'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_jonoshokti'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_thana_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_ward_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['thanar_odhin_shilpi_uposhakha_maner'] ?>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">উপসংগঠন </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['up_shongothon_prev'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['up_shongothon_pres'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['up_shongothon_bri'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['up_shongothon_gha'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['up_shongothon_jonoshokti'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $culture_shongothon['up_shongothon_thana_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $culture_shongothon['up_shongothon_ward_maner'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $culture_shongothon['up_shongothon_uposhakha_maner'] ?>
                       </td>
                     
                   
                   </tr>
                        </table>  
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
