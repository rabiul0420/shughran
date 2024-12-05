<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'পরিবেশ ও সমাজসেবা বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/social-welfare-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/social-welfare-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Social_walfare_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$social_welfare_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$social_welfare_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$social_welfare_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$social_welfare_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$social_welfare_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$social_welfare_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$social_welfare_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$social_welfare_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                            <table class="tg table table-header-rotated" id="testTable1">

                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>সামাজসেবামূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Social_walfare_সামাজসেবামূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7"> প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7">কতটি</td>
                                <td class="tg-pwj7"> উপস্থিতি </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>01</div>
                                </td>
                                <td class="tg-0pky ">
                                    <div><span>ফ্রি মেডিকেল ক্যাম্প (উপস্থিতির জায়গায় রোগীর সংখ্যা লিখবেন) </span>
                                    </div>
                                </td>
                                <td class="tg-0pky type-1">
                                    <div><span><?php echo $free_medical_camp_ti = $social_welfare_shebamulok_program['free_medical_camp_ti'] ?> </span></div>
                                </td>
                                <td class="tg-0pky ">
                                    <div><span><?php echo $free_medical_camp_pre = $social_welfare_shebamulok_program['free_medical_camp_pre'] ?></span></div>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">02 </td>
                                <td class="tg-0pky  type_1">
                                ফ্রি ব্লাড গ্রুপিং (উপস্থিতির জায়গায় কতজনের গ্রুপ করা হয়েছে সেটা লিখবেন)
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $free_blood_grouping_ti = $social_welfare_shebamulok_program['free_blood_grouping_ti'] ?>
                                </td>

                                <td class="tg-0pky  type_2">
                                <?php echo $free_blood_grouping_pre = $social_welfare_shebamulok_program['free_blood_grouping_pre'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">03 </td>
                                <td class="tg-0pky  type_1">
                                পরিষ্কার পরিচ্ছন্নতা অভিযান
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $porishkar_poricchonnota_ti = $social_welfare_shebamulok_program['porishkar_poricchonnota_ti'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $porishkar_poricchonnota_pre = $social_welfare_shebamulok_program['porishkar_poricchonnota_pre'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">04 </td>
                                <td class="tg-0pky  type_1">
                                স্বাস্থ্য সচেতনতা ক্যাম্পেইন
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sastho_shochetonota_ti = $social_welfare_shebamulok_program['sastho_shochetonota_ti'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sastho_shochetonota_pre = $social_welfare_shebamulok_program['sastho_shochetonota_pre'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">05 </td>
                                <td class="tg-0pky  type_1">
                                পরিবেশ ও সামাজিক সচেতনতামূলক দিবস/ক্যাম্পেইন
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $poribesh_o_shamajik_ti = $social_welfare_shebamulok_program['poribesh_o_shamajik_ti'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $poribesh_o_shamajik_pre = $social_welfare_shebamulok_program['poribesh_o_shamajik_pre'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">06 </td>
                                <td class="tg-0pky  type_1">
                                সামাজিক দায়িত্ববোধ জাগ্রত করতে সভা, সমাবেশ, সেমিনার, সিম্পোজিয়াম
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shamajik_dayittobodh_ti = $social_welfare_shebamulok_program['shamajik_dayittobodh_ti'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shamajik_dayittobodh_pre = $social_welfare_shebamulok_program['shamajik_dayittobodh_pre'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">07 </td>
                                <td class="tg-0pky  type_1">
                                সুবিধাবঞ্চিত শিশুদের নিয়ে ফ্রি স্কুল (উপস্থিতির জায়গায় মোট ছাত্র ছাত্রীর সংখ্যা লিখবেন)
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shubidha_bonchito_ti = $social_welfare_shebamulok_program['shubidha_bonchito_ti'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shubidha_bonchito_pre = $social_welfare_shebamulok_program['shubidha_bonchito_pre'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">08 </td>
                                <td class="tg-0pky  type_1">
                                স্কুল, মাদরাসা, মসজিদ, রাস্তা, ব্রিজ, কালর্ভাট মেরামত
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $school_madrasah_ti = $social_welfare_shebamulok_program['school_madrasah_ti'] ?>
                                </td>

                                <td class="tg-0pky  type_2">
                                <?php echo $school_madrasah_pre = $social_welfare_shebamulok_program['school_madrasah_pre'] ?>
                                </td>
                            </tr>
                            </table>
                            <table class="tg table table-header-rotated" id="testTable2">
                                <tr>
                                    <td class="tg-pwj7" colspan=""><b>উপহার সামগ্রী বিতরণ </b></td>
                                    <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Social_walfare_উপহার সামগ্রী বিতরণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7  type_1">
                                        কার্যক্রমের নাম 
                                    </td>

                                    <td class="tg-pwj7  type_2">
                                        কতজনকে
                                    </td>

                                </tr>

                                <tr>
                                
                                    <td class="tg-0pky  type_1" >
                                    ইয়াতিম ও অনাথ শিশুদের মাঝে খাবার বিতরণ
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $yatim_o_onath = $social_welfare_upohar['yatim_o_onath'] ?>
                                    </td>

                                </tr>
                                <tr>

                                    <td class="tg-0pky  type_1" >
                                    বন্যা বা অন্যান্য প্রাকৃতিক দুর্যোগে আক্রান্তদের সাহায্য
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $bonna_ba_onnanno = $social_welfare_upohar['bonna_ba_onnanno'] ?>
                                    </td>

                                </tr>
                                <tr>
                                
                                    <td class="tg-0pky  type_1" >
                                    কুরবানির গোশত বিতরণ
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $qurbanir_goshto = $social_welfare_upohar['qurbanir_goshto'] ?>
                                    </td>


                                </tr>
                                <tr>

                                    <td class="tg-0pky  type_1" >
                                    ঈদ/ইফতার সামগ্রী বিতরণ
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $eid_shamogri = $social_welfare_upohar['eid_shamogri'] ?>
                                </tr>
                                <tr>
                                    <td class="tg-0pky  type_1" >
                                    শীতবস্ত্র বিতরণ
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $shitbotsro = $social_welfare_upohar['shitbotsro'] ?>
                                    </td>

                                </tr>
                          
                            </table>
                            <table class="tg table table-header-rotated" id="testTable3">
                                <tr>
                                    <td class="tg-pwj7" colspan="2"><b>শিক্ষা উপকরণ বিতরণ </b></td>
                                    <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Social_walfare_শিক্ষা উপকরণ বিতরণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                </tr>
                                    <td class="tg-pwj7  type_1" >
                                        কার্যক্রমের নাম
                                    </td>

                                    <td class="tg-pwj7  type_2">
                                        কতজনকে
                                    </td>

                                    <td class="tg-pwj7  type_2">
                                        কতটি
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky  type_1">
                                    বিনামূল্যে বই বিতরণ
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $binamulle_boi_bitoron_jon = $social_welfare_shikkha_upokoron['binamulle_boi_bitoron_jon'] ?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $binamulle_boi_bitoron_ti = $social_welfare_shikkha_upokoron['binamulle_boi_bitoron_ti'] ?>
                                    </td>
                                <tr>
                            </table>
                            <table class="tg table table-header-rotated" id="testTable4">
                                <tr>
                                    <td class="tg-pwj7" colspan="2"><b>আর্থিক সহায়তা প্রদান </b></td>
                                    <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Social_walfare_আর্থিক সহায়তা প্রদান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                </tr>
                                    <td class="tg-pwj7  type_1" >
                                    কার্যক্রমের নাম
                                    </td>

                                    <td class="tg-pwj7  type_2">
                                        কতজনকে
                                    </td>
                                    <td class="tg-pwj7  type_2">
                                        কত টাকা
                                    </td>
                                </tr>
                                </tr>
                                    <td class="tg-0pky  type_1">
                                        শিক্ষাবৃত্তি প্রদান
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $shikkha_britti_jon = $social_welfare_arthik_shohayota['shikkha_britti_jon'] ?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $shikkha_britti_ti = $social_welfare_arthik_shohayota['shikkha_britti_ti'] ?>
                                    </td>
                                <tr>


                            </table>
                                        <table class="tg table table-header-rotated" id="testTable5">
                                        <tr>
                                            <td class="tg-pwj7" colspan="3"><b>সাক্ষরতা অভিযান </b></td>
                                            <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Social_walfare_সাক্ষরতা অভিযান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                        </tr>
                                            <tr>
                                                
                                                <td class="tg-pwj7"  colspan="">প্রোগ্রাম সংখ্যা </td>
                                                <td class="tg-pwj7"  colspan="">অংশগ্রহনকারী জনশক্তি   </td>
                                                <td class="tg-pwj7"  colspan="">শিক্ষা উপকরণ বিতরণ কতজনের মাঝে?   </td>
                                                <td class="tg-pwj7"  colspan="">সাক্ষরতা শিখেছে কতজন? </td>
                                            
                                            </tr>
                                            <tr>
                                                
                                                <td class="tg-0pky  type_1 " >
                                                <?php echo $program = $social_welfare_shakhorota_ovijan['program'] ?>
                                                </td>
                                                <td class="tg-0pky  type_2" >
                                                <?php echo $present = $social_welfare_shakhorota_ovijan['present'] ?>
                                                </td>
                                                <td class="tg-0pky  type_3" >
                                                <?php echo $upokoron = $social_welfare_shakhorota_ovijan['upokoron'] ?>
                                                </td>
                                                <td class="tg-0pky  type_4" >
                                                <?php echo $shikhece = $social_welfare_shakhorota_ovijan['shikhece'] ?>
                                                </td>
                                            </tr>

                                        </table>
                                <table class="tg table table-header-rotated" id="testTable6">
                                    <tr>
                                        <td class="tg-pwj7" colspan="3"><b>বৃক্ষরোপন অভিযান  </b></td>
                                        <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Social_walfare_বৃক্ষরোপন অভিযান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="tg-pwj7" colspan=""> চারা রোপণ কতটি?  </td>
                                        <td class="tg-pwj7" colspan="">চারা বিতরণ কতটি?  </td>
                                        <td class="tg-pwj7" colspan="">কতজনের মাঝে বিতরণ করা হয়েছে? </td>
                                        <td class="tg-pwj7" colspan="">কতজন জনশক্তি চারা বিতরণ করেছেন? </td>
                                    </tr>
                                    <tr>
                                    
                                    </tr>
                                    <tr>
                                      
                                        <td class="tg-0pky  type_1">
                                        <?php echo $crk = $social_welfare_brikkho_ropon['chara_ropor'] ?>
                                        </td>
                                        <td class="tg-0pky  type_2">
                                        <?php echo $cbk = $social_welfare_brikkho_ropon['chara_bitoron'] ?>
                                        </td>
                                        <td class="tg-0pky  type_2">
                                        <?php echo $kbk = $social_welfare_brikkho_ropon['koto_joner_majhe'] ?>
                                        </td>
                                        <td class="tg-0pky  type_2">
                                        <?php echo $km = $social_welfare_brikkho_ropon['koto_jonoshokti'] ?>
                                        </td>
                                        
                                        
                                    </tr>
                                </table>
                                <table class="tg table table-header-rotated" id="testTable7">
                                    <tr>
                                        <td class="tg-pwj7" colspan="3"><b>রক্তদাতা সংগঠন </b></td>
                                        <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_7' onclick="doit('xlsx','testTable7','<?php echo 'Social_walfare_রক্তদাতা সংগঠন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                    </tr>
                                <tr>
                                        <td class="tg-pwj7" >মোট রক্তদাতা সংগঠন কয়টি</td>
                                    <td class="tg-pwj7" colspan=""> মোট ডোনার সংখ্যা  </td>
                                    <td class="tg-pwj7" colspan="">এ সেশনে ডোনার বৃদ্ধি </td>
                                    <td class="tg-pwj7" colspan="">কত জনকে রক্ত দেওয়া হয়েছে? </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $crk = $social_welfare_roktodata['total_roktodata_shongothon'] ?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $cbk = $social_welfare_roktodata['total_donor'] ?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $kbk = $social_welfare_roktodata['donor_briddhi'] ?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $km = $social_welfare_roktodata['kotojon_k_blood_deya'] ?>
                                    </td>
                                    
                                    
                                </tr>
                                </table>
                                <table class="tg table table-header-rotated" id="testTable8">
                                    <tr>
                                        <td class="tg-pwj7" colspan="4"><b>রেজিস্টার্ড/নন রেজিস্টার্ড সামাজিক সংগঠন রির্পোট</b></td>
                                        <td class="tg-pwj7" colspan="2">
                                        <a href="#" id='table_8' onclick="doit('xlsx','testTable8','<?php echo 'Social_walfare_রেজিস্টার্ড/নন রেজিস্টার্ড সামাজিক সংগঠন রির্পোট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                    </tr>
                                <tr>
                                    <td class="tg-pwj7"> ক্রম</td>
                                    <td class="tg-pwj7"> শাখা আইডি </td>
                                    <td class="tg-pwj7" colspan=""> সংগঠনের নাম</td>
                                    <td class="tg-pwj7" colspan=""> রেজিস্টার্ড /নন রেজিস্টার্ড </td>
                                    <td class="tg-pwj7" colspan="">প্রতিষ্ঠা সাল </td>
                                    <td class="tg-pwj7" colspan="">চলতি সেশনে কতটি র্কমসূচি বাস্তবায়তি হয়েছে? </td>
                                </tr>
                                                
                                <?php 
                                $i=0;
                            foreach($social_welfare_shamajik_shong->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['shong_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['reg_non_reg'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['protishtha_shal'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['cholti_session_kormoshuchi'] ?>       
                                    </td>
                                   
                                </tr>

                        <?php } ?>
                                </table>
                                <table class="tg table table-header-rotated" id="testTable9">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_9' onclick="doit('xlsx','testTable9','<?php echo 'Social_walfare_সামিট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> কৃষিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (কেন্দ্র)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $agri_stu_center_manpower_num = $social_welfare_summit['agri_stu_center_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $agri_stu_center_manpower_pre = $social_welfare_summit['agri_stu_center_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_center_manpower_pre!=0 && $agri_stu_center_manpower_num!=0 )?$agri_stu_center_manpower_pre / $agri_stu_center_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $agri_stu_center_general_num = $social_welfare_summit['agri_stu_center_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $agri_stu_center_general_pre = $social_welfare_summit['agri_stu_center_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_center_general_pre!=0 && $agri_stu_center_general_num!=0 )?$agri_stu_center_general_pre / $agri_stu_center_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> কৃষিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (শাখা)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $agri_stu_shakha_manpower_num = $social_welfare_summit['agri_stu_shakha_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $agri_stu_shakha_manpower_pre = $social_welfare_summit['agri_stu_shakha_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_shakha_manpower_pre!=0 && $agri_stu_shakha_manpower_num!=0 )?$agri_stu_shakha_manpower_pre / $agri_stu_shakha_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $agri_stu_shakha_general_num = $social_welfare_summit['agri_stu_shakha_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $agri_stu_shakha_general_pre = $social_welfare_summit['agri_stu_shakha_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_shakha_general_pre!=0 && $agri_stu_shakha_general_num!=0 )?$agri_stu_shakha_general_pre / $agri_stu_shakha_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> মেডিকেলে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (কেন্দ্র)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $medical_stu_center_manpower_num = $social_welfare_summit['medical_stu_center_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $medical_stu_center_manpower_pre = $social_welfare_summit['medical_stu_center_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_center_manpower_pre!=0 && $medical_stu_center_manpower_num!=0 )?$medical_stu_center_manpower_pre / $medical_stu_center_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $medical_stu_center_general_num = $social_welfare_summit['medical_stu_center_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $medical_stu_center_general_pre = $social_welfare_summit['medical_stu_center_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_center_general_pre!=0 && $medical_stu_center_general_num!=0 )?$medical_stu_center_general_pre / $medical_stu_center_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> মেডিকেলে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (শাখা)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $medical_stu_shakha_manpower_num = $social_welfare_summit['medical_stu_shakha_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $medical_stu_shakha_manpower_pre = $social_welfare_summit['medical_stu_shakha_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_shakha_manpower_pre!=0 && $medical_stu_shakha_manpower_num!=0 )?$medical_stu_shakha_manpower_pre / $medical_stu_shakha_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $medical_stu_shakha_general_num = $social_welfare_summit['medical_stu_shakha_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $medical_stu_shakha_general_pre = $social_welfare_summit['medical_stu_shakha_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_shakha_general_pre!=0 && $medical_stu_shakha_general_num!=0 )?$medical_stu_shakha_general_pre / $medical_stu_shakha_general_num:0 ?>
                                </td>
                            </tr>
                            
                    </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
