<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মানবসম্পদ ব্যবস্থাপনা বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
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
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/manpower-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/manpower-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan='4'><b>HRM কমিটি </b></td>
                                <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Human_management_মানবসম্পদ বিভাগীয় সাংগঠনিক কাঠামো_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <?php
                            $pk = (isset($human_management_songothon['id']))?$human_management_songothon['id']:"";
                            ?>
                           
                           <tr>                           
                                <td class="tg-pwj7"> শাখায় এইচআরএম কমিটি আছে কিনা?</td>
                                <td class="tg-y698 type_1" rowspan="2">এইচআরএম কমিটির সদস্য সংখ্যা কত? </td>
                                <td class="tg-y698 type_1" colspan="2">এইচআরএম কমিটির সমন্বয় মিটিং </td>
                                <td class="tg-y698 type_1">সেক্টরভিত্তিক লোক তৈরীর দীর্ঘমেয়াদী পরিকল্পনা নেওয়া হয়েছে কিনা? </td>
                            
                            </tr>
                           <tr> 
                                 <td class="tg-pwj7" >(হ্যাঁ/না) </td>                          
                                <td class="tg-pwj7" > সংখ্যা </td>
                                <td class="tg-pwj7"> উপস্থিতি</td>
                                <td class="tg-pwj7" >(হ্যাঁ/না) </td>
                            
                            </tr>
                            <tr>                           
                                <td class="tg-0pky  type_3">
                                <?php echo $branch_committee=(isset( $human_management_songothon['branch_committee']))? $human_management_songothon['branch_committee']:0; ?>
                                </td>
                               
                                <td class="tg-0pky  type_3">
                                <?php echo $coun_team=(isset( $human_management_songothon['coun_team']))? $human_management_songothon['coun_team']:0; ?>
                                </td>

                               
                                <td class="tg-0pky  type_3">
                                <?php echo $bivag_com_meeting=(isset( $human_management_songothon['bivag_com_meeting']))? $human_management_songothon['bivag_com_meeting']:0; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $bivag_com_meeting_upos=(isset( $human_management_songothon['bivag_com_meeting']))? $human_management_songothon['bivag_com_meeting_upos']:0; ?>
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo $sec_man_month=(isset( $human_management_songothon['sec_man_month']))? $human_management_songothon['sec_man_month']:0; ?>
                                </td>

                            </tr>

                         
                        </table>
                        <table class="tg table table-header-rotated" id="বায়োডাটা">
                            <tr>                           
                                <td class="tg-pwj7" colspan='2'><b>জনশক্তির বায়োডাটা কালেকশন ও পর্যালোচনা হয়েছে? </b></td>
                                <td class="tg-pwj7" colspan="1">
                                <a href="#" id='বায়োডাটা' onclick="doit('xlsx','বায়োডাটা','<?php echo 'জনশক্তির বায়োডাটা কালেকশন ও পর্যালোচনা হয়েছে?_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <?php
                            $pk = (isset($human_management_jonosokti_biodata['id']))?$human_management_jonosokti_biodata['id']:"";
                            ?>
                            <tr>                           
                                
                                <td class="tg-y698 type_1" >মান</td>
                                <td class="tg-y698 type_1" >বর্তমান সংখ্যা</td>
                                <td class="tg-y698 type_1" >বায়োডাটা সংগ্রহ ও পর্যালোচনা সংখ্যা</td>
                               
                            
                            </tr>
                            <tr>
                            <td class="tg-y698 type_1" >সদস্য</td>
                            <td class="tg-0pky  type_3">
                            <?php echo $sodosso_s=(isset( $human_management_jonosokti_biodata['sodosso_s']))? $human_management_jonosokti_biodata['sodosso_s']:0; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_p=(isset( $human_management_jonosokti_biodata['sodosso_p']))? $human_management_jonosokti_biodata['sodosso_p']:0; ?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698 type_1" >সাথী </td>
                            <td class="tg-0pky  type_3">
                            <?php echo $sathi_s=(isset( $human_management_jonosokti_biodata['sathi_s']))? $human_management_jonosokti_biodata['sathi_s']:0; ?>
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_p=(isset( $human_management_jonosokti_biodata['sathi_p']))? $human_management_jonosokti_biodata['sathi_p']:0; ?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698 type_1" >কর্মী</td>
                            <td class="tg-0pky  type_3">
                            <?php echo $kormi_s=(isset( $human_management_jonosokti_biodata['kormi_s']))? $human_management_jonosokti_biodata['kormi_s']:0; ?>
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_p=(isset( $human_management_jonosokti_biodata['kormi_p']))? $human_management_jonosokti_biodata['kormi_p']:0; ?>
                                </td>
                            </tr>
                           <tr>                           
                           <td class="tg-y698 type_1" >মোট</td>
                           <td class="tg-0pky  type_3" ><?php echo $sodosso_s+$sathi_s+$kormi_s ?></td>
                           <td class="tg-0pky  type_3" ><?php echo $sodosso_p+$sathi_p+$kormi_p ?></td>
                            
                            </tr>
                            
                         
                        </table>

                        <table class="tg table table-header-rotated" id="বিদায়ীm">
                            <tr>                           
                                <td class="tg-pwj7" colspan='5'><b>বিদায়ী জনশক্তির তথ্য  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                <a href="#" id='বিদায়ীm' onclick="doit('xlsx','বিদায়ীm','<?php echo 'বিদায়ী জনশক্তির তথ্য _'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <?php
                            $pk = (isset($human_management_bidai_jonosokti['id']))?$human_management_bidai_jonosokti['id']:"";
                            ?>
                            <tr>                           
                                
                                <td class="tg-y698 type_1" rowspan="2" >মান</td>
                                <td class="tg-y698 type_1" colspan="5" >এই সেশনে বিদায়ী জনশক্তিদের তথ্য</td>
                               
                            </tr>
                            <tr>
                               <td class="tg-y698 type_1" >মোট বিদায়ী সংখ্যা</td>
                               <td class="tg-y698 type_1" >তথ্য/সিভি আছে সংখ্যা</td>
                               <td class="tg-y698 type_1" >সরকারি চাকরিতে যোগদান সংখ্যা</td>
                               <td class="tg-y698 type_1" >বেসরকারি চাকরিতে যোগদান সংখ্যা</td>
                               <td class="tg-y698 type_1" >কর্মসংস্থান হয়নি সংখ্যা</td>

                            </tr>
                            <tr>
                            <td class="tg-y698 type_1" >সদস্য</td>
                              <td class="tg-0pky  type_3">
                              <?php echo $bidai_so=(isset( $human_management_bidai_jonosokti['bidai_so']))? $human_management_bidai_jonosokti['bidai_so']:0; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $cv_so=(isset( $human_management_bidai_jonosokti['cv_so']))? $human_management_bidai_jonosokti['cv_so']:0; ?>
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo $sorkari_so=(isset( $human_management_bidai_jonosokti['sorkari_so']))? $human_management_bidai_jonosokti['sorkari_so']:0; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $besorkari_so=(isset( $human_management_bidai_jonosokti['besorkari_so']))? $human_management_bidai_jonosokti['besorkari_so']:0; ?>
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo $kormo_so=(isset( $human_management_bidai_jonosokti['kormo_so']))? $human_management_bidai_jonosokti['kormo_so']:0; ?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698 type_1" >সাথী </td>
                            <td class="tg-0pky  type_3">
                            <?php echo $bidai_sa = (isset($human_management_bidai_jonosokti['bidai_sa'])) ? $human_management_bidai_jonosokti['bidai_sa'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $cv_sa = (isset($human_management_bidai_jonosokti['cv_sa'])) ? $human_management_bidai_jonosokti['cv_sa'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $sorkari_sa = (isset($human_management_bidai_jonosokti['sorkari_sa'])) ? $human_management_bidai_jonosokti['sorkari_sa'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $besorkari_sa = (isset($human_management_bidai_jonosokti['besorkari_sa'])) ? $human_management_bidai_jonosokti['besorkari_sa'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $kormo_sa = (isset($human_management_bidai_jonosokti['kormo_sa'])) ? $human_management_bidai_jonosokti['kormo_sa'] : 0; ?>
                            </td>

                            </tr>
                            <tr>
                            <td class="tg-y698 type_1" >কর্মী</td>
                            <td class="tg-0pky  type_3">
                            <?php echo $bidai_ko = (isset($human_management_bidai_jonosokti['bidai_ko'])) ? $human_management_bidai_jonosokti['bidai_ko'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $cv_ko = (isset($human_management_bidai_jonosokti['cv_ko'])) ? $human_management_bidai_jonosokti['cv_ko'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $sorkari_ko = (isset($human_management_bidai_jonosokti['sorkari_ko'])) ? $human_management_bidai_jonosokti['sorkari_ko'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $besorkari_ko = (isset($human_management_bidai_jonosokti['besorkari_ko'])) ? $human_management_bidai_jonosokti['besorkari_ko'] : 0; ?>
                            </td>

                            <td class="tg-0pky  type_3">
                            <?php echo $kormo_ko = (isset($human_management_bidai_jonosokti['kormo_ko'])) ? $human_management_bidai_jonosokti['kormo_ko'] : 0; ?>
                            </td>

                            </tr>
                           <tr>                           
                           <td class="tg-y698 type_1" >মোট</td>
                           <td class="tg-0pky  type_3" ><?php echo $bidai_so+$bidai_sa+$bidai_ko ?></td>
                           <td class="tg-0pky  type_3" ><?php echo $cv_so+$cv_sa+$cv_ko ?></td>
                           <td class="tg-0pky  type_3" ><?php echo $sorkari_so+$sorkari_sa+$sorkari_ko ?></td>
                           <td class="tg-0pky  type_3" ><?php echo $besorkari_so+$besorkari_sa+$besorkari_ko ?></td>
                           <td class="tg-0pky  type_3" ><?php echo $kormo_so+$kormo_sa+$kormo_ko ?></td>
                           
                            
                            </tr>
                           
                         
                        </table>

                        <table class="tg table table-header-rotated" id="আইডিয়াল হোমm">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>প্রফেশনাল আইডিয়াল হোম </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='আইডিয়াল হোমm' onclick="doit('xlsx','আইডিয়াল হোমm','<?php echo 'Education_আইডিয়াল হোম (একাডেমিক ও প্রফেশনাল)_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">আইডিয়াল হোমের ধরণ</td>
                                <td class="tg-pwj7" colspan="4" style="text-align:center">হোম সংখ্যা </td>
                                <td class="tg-pwj7" colspan="4" style="text-align:center">ছাত্র সংখ্যা </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>পূর্বের সংখ্যা</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বর্তমান সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বৃদ্ধি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ঘাটতি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>পূর্বের সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বর্তমান সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বৃদ্ধি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ঘাটতি </span></div>
                                </td>

                            </tr>
                            <?php
                            $pk = (isset($education_ideal_home['id'])) ? $education_ideal_home['id'] : '';

                            ?>



                           

                            <tr>
                                <td class="tg-y698">জনসেবা আইডিয়াল হোম </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $j_she_h_prev = (isset($education_ideal_home['j_she_h_prev'])) ? $education_ideal_home['j_she_h_prev'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $j_she_h_pres = (isset($education_ideal_home['j_she_h_pres'])) ? $education_ideal_home['j_she_h_pres'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $j_she_h_bri = (isset($education_ideal_home['j_she_h_bri'])) ? $education_ideal_home['j_she_h_bri'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $j_she_h_gha = (isset($education_ideal_home['j_she_h_gha'])) ? $education_ideal_home['j_she_h_gha'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $j_she_s_prev = (isset($education_ideal_home['j_she_s_prev'])) ? $education_ideal_home['j_she_s_prev'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $j_she_s_pres = (isset($education_ideal_home['j_she_s_pres'])) ? $education_ideal_home['j_she_s_pres'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $j_she_s_bri = (isset($education_ideal_home['j_she_s_bri'])) ? $education_ideal_home['j_she_s_bri'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $j_she_s_gha = (isset($education_ideal_home['j_she_s_gha'])) ? $education_ideal_home['j_she_s_gha'] : 0 ?>
                                </td>
                            </tr>
                           

                            <tr>
                                <td class="tg-y698">মানবসেবা আইডিয়াল হোম </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $m_she_h_prev = (isset($education_ideal_home['m_she_h_prev'])) ? $education_ideal_home['m_she_h_prev'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_she_h_pres = (isset($education_ideal_home['m_she_h_pres'])) ? $education_ideal_home['m_she_h_pres'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_she_h_bri = (isset($education_ideal_home['m_she_h_bri'])) ? $education_ideal_home['m_she_h_bri'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $m_she_h_gha = (isset($education_ideal_home['m_she_h_gha'])) ? $education_ideal_home['m_she_h_gha'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $m_she_s_prev = (isset($education_ideal_home['m_she_s_prev'])) ? $education_ideal_home['m_she_s_prev'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $m_she_s_pres = (isset($education_ideal_home['m_she_s_pres'])) ? $education_ideal_home['m_she_s_pres'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $m_she_s_bri = (isset($education_ideal_home['m_she_s_bri'])) ? $education_ideal_home['m_she_s_bri'] : 0 ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $m_she_s_gha = (isset($education_ideal_home['m_she_s_gha'])) ? $education_ideal_home['m_she_s_gha'] : 0 ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সরকারি চাকরির আইডিয়াল হোম</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $sorkari_h_prev = (isset($education_ideal_home['sorkari_h_prev'])) ? $education_ideal_home['sorkari_h_prev'] : 0 ?>
                                </td>

                                <td class="tg-0pky  type_2">
                                <?php echo $sorkari_h_pres = (isset($education_ideal_home['sorkari_h_pres'])) ? $education_ideal_home['sorkari_h_pres'] : 0 ?>
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo $sorkari_h_bri = (isset($education_ideal_home['sorkari_h_bri'])) ? $education_ideal_home['sorkari_h_bri'] : 0 ?>
                                </td>

                                <td class="tg-0pky  type_4">
                                <?php echo $sorkari_h_gha = (isset($education_ideal_home['sorkari_h_gha'])) ? $education_ideal_home['sorkari_h_gha'] : 0 ?>
                                </td>

                                <td class="tg-0pky  type_5">
                                <?php echo $sorkari_s_prev = (isset($education_ideal_home['sorkari_s_prev'])) ? $education_ideal_home['sorkari_s_prev'] : 0 ?>
                                </td>

                                <td class="tg-0pky  type_6">
                                <?php echo $sorkari_s_pres = (isset($education_ideal_home['sorkari_s_pres'])) ? $education_ideal_home['sorkari_s_pres'] : 0 ?>
                                </td>

                                <td class="tg-0pky  type_7">
                                <?php echo $sorkari_s_bri = (isset($education_ideal_home['sorkari_s_bri'])) ? $education_ideal_home['sorkari_s_bri'] : 0 ?>
                                </td>

                                <td class="tg-0pky  type_8">
                                <?php echo $sorkari_s_gha = (isset($education_ideal_home['sorkari_s_gha'])) ? $education_ideal_home['sorkari_s_gha'] : 0 ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-pwj7"> মোট</td>
                                <td class="tg-0pky  type_8"> <?php echo $j_she_h_prev+$m_she_h_prev+$sorkari_h_prev?></td>
                                <td class="tg-0pky  type_8"> <?php echo $j_she_h_pres+$m_she_h_pres+$sorkari_h_pres?></td>
                                <td class="tg-0pky  type_8"> <?php echo $j_she_h_bri+$m_she_h_bri+$sorkari_h_bri?></td>
                                <td class="tg-0pky  type_8"> <?php echo $j_she_h_gha+$m_she_h_gha+$sorkari_h_gha?></td>

                                <td class="tg-0pky  type_8"> <?php echo $j_she_s_prev+$m_she_s_prev+$sorkari_s_prev?></td>
                                <td class="tg-0pky  type_8"> <?php echo $j_she_s_pres+$m_she_s_pres+$sorkari_s_pres?></td>
                                <td class="tg-0pky  type_8"> <?php echo $j_she_s_bri+$m_she_s_bri+$sorkari_s_bri?></td>
                                <td class="tg-0pky  type_8"> <?php echo $j_she_s_gha+$m_she_s_gha+$sorkari_s_gha?></td>

                               

                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="মোটিভেশনাল প্রোগ্রাম">
                            <tr>
                            <td class="tg-pwj7" colspan='2'><b>মোটিভেশনাল প্রোগ্রাম (প্রফেশনাল ও একাডেমিক) </b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_1'  onclick="doit('xlsx','মোটিভেশনাল প্রোগ্রাম','<?php echo 'Education_মোটিভেশনাল প্রোগ্রাম (প্রফেশনাল ও একাডেমিক)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <?php echo $cc_jon_num=(isset( $education_motivational_program['cc_jon_num']))? $education_motivational_program['cc_jon_num']:0 ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $cc_jon_pre=(isset( $education_motivational_program['cc_jon_pre']))? $education_motivational_program['cc_jon_pre']:0 ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">ক্যারিয়ার কাউন্সেলিং (মানবসেবা) </td>

                                <td class="tg-0pky  type_2">
                                <?php echo $cc_man_num=(isset( $education_motivational_program['cc_man_num']))? $education_motivational_program['cc_man_num']:0 ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $cc_man_pre=(isset( $education_motivational_program['cc_man_pre']))? $education_motivational_program['cc_man_pre']:0 ?>
                                </td>
                            </tr>

                           
                            <tr>
                                <td class="tg-y698">ক্যারিয়ার কাউন্সেলিং (তথ্যসেবা) </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $cc_info_num=(isset( $education_motivational_program['cc_info_num']))? $education_motivational_program['cc_info_num']:0 ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $cc_info_pre=(isset( $education_motivational_program['cc_info_pre']))? $education_motivational_program['cc_info_pre']:0 ?>
                                </td>
                            </tr>

                            <td class="tg-y698">সরকারি চাকরি কাউন্সিলিং</td>
                            <td class="tg-0pky  type_2">
                                  <?php echo $sorkari_num=(isset( $education_motivational_program['sorkari_num']))? $education_motivational_program['sorkari_num']:0 ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sorkari_pres=(isset( $education_motivational_program['sorkari_pres']))? $education_motivational_program['sorkari_pres']:0 ?>
                                </td>
                            </tr>
                           
                            <td class="tg-y698">অন্যান্য</td>
                            <td class="tg-0pky  type_2">
                            <?php echo $other_num=(isset( $education_motivational_program['other_num']))? $education_motivational_program['other_num']:0 ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $other_pre=(isset( $education_motivational_program['other_pre']))? $education_motivational_program['other_pre']:0 ?>
                                </td>
                            </tr>
                        </table>
                        				
                        <table class="tg table table-header-rotated" id="জনবল">
                            <tr>                           
                                <td class="tg-pwj7" colspan='5'><b>জনবল সরবরাহের সেক্টরসমূহ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                <a href="#" id='জনবল' onclick="doit('xlsx','জনবল','<?php echo 'Human_management_জনবল সরবরাহের সেক্টরসমূহ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" colspan='2' rowspan='2'> সেক্টরসমূহ </td>
                                <td class="tg-y698 type_1" colspan='2'>সেক্টরভিত্তিক জনশক্তি বাছাই সংখ্যা</td>
                                <td class="tg-y698 type_1" colspan='2'>প্রাতিষ্ঠানিক প্রশিক্ষণ গ্রহণ</td>
                            </tr>
                            								
                            <tr>                           
                                <td class="tg-y698 type_1">টার্গেট</td>
                                <td class="tg-pwj7" colspan=''>বাছাই</td>
                               
                                <td class="tg-y698 type_1">সাংগঠনিক</td>
                                <td class="tg-y698 type_1">সাধারণ</td>
                               
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
                                <?php echo $jonosheba_terget=(isset( $human_managemant_jonobol_shorboraho['jonosheba_terget']))? $human_managemant_jonobol_shorboraho['jonosheba_terget']:0; $total_terget = $total_terget+ $jonosheba_terget; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $jonosheba_bachai=(isset( $human_managemant_jonobol_shorboraho['jonosheba_bachai']))? $human_managemant_jonobol_shorboraho['jonosheba_bachai']:0; $total_bachai = $total_bachai+ $jonosheba_bachai;?>
                                </td>
                                
                                <td class="tg-0pky  type_3">
                                <?php echo $jonosheba_sang=(isset( $human_managemant_jonobol_shorboraho['jonosheba_sang']))? $human_managemant_jonobol_shorboraho['jonosheba_sang']:0; $total_sang = $total_sang+ $jonosheba_sang; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $jonosheba_shadha=(isset( $human_managemant_jonobol_shorboraho['jonosheba_shadha']))? $human_managemant_jonobol_shorboraho['jonosheba_shadha']:0; $total_shadha = $total_shadha+ $jonosheba_shadha; ?>
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
                              <?php echo $manobsheba_terget=(isset( $human_managemant_jonobol_shorboraho['manobsheba_terget']))? $human_managemant_jonobol_shorboraho['manobsheba_terget']:0; $total_terget = $total_terget+ $manobsheba_terget; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $manobsheba_bachai=(isset( $human_managemant_jonobol_shorboraho['manobsheba_bachai']))? $human_managemant_jonobol_shorboraho['manobsheba_bachai']:0; $total_bachai = $total_bachai+ $manobsheba_bachai; ?>
                                </td>
                                
                                <td class="tg-0pky  type_3">
                                <?php echo $manobsheba_sang=(isset( $human_managemant_jonobol_shorboraho['manobsheba_sang']))? $human_managemant_jonobol_shorboraho['manobsheba_sang']:0; $total_sang = $total_sang+ $manobsheba_sang; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $manobsheba_shadha=(isset( $human_managemant_jonobol_shorboraho['manobsheba_shadha']))? $human_managemant_jonobol_shorboraho['manobsheba_shadha']:0; $total_shadha = $total_shadha+ $manobsheba_shadha; ?>
                                </td>
                               
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                আইনজীবী
                                </td>
                              <td class="tg-0pky  type_3">
                              <?php echo $law_terget=(isset( $human_managemant_jonobol_shorboraho['law_terget']))? $human_managemant_jonobol_shorboraho['law_terget']:0; $total_terget = $total_terget+ $law_terget; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $law_bachai=(isset( $human_managemant_jonobol_shorboraho['law_bachai']))? $human_managemant_jonobol_shorboraho['law_bachai']:0; $total_bachai = $total_bachai+ $law_bachai; ?>
                                </td>
                                
                                <td class="tg-0pky  type_3">
                                <?php echo $law_sang=(isset( $human_managemant_jonobol_shorboraho['law_sang']))? $human_managemant_jonobol_shorboraho['law_sang']:0; $total_sang = $total_sang+ $law_sang; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $law_shadha=(isset( $human_managemant_jonobol_shorboraho['law_shadha']))? $human_managemant_jonobol_shorboraho['law_shadha']:0; $total_shadha = $total_shadha+ $law_shadha; ?>
                                </td>
                                
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                তথ্যসেবা
                                </td>
                              <td class="tg-0pky  type_3">
                              <?php echo $totthosheba_terget=(isset( $human_managemant_jonobol_shorboraho['totthosheba_terget']))? $human_managemant_jonobol_shorboraho['totthosheba_terget']:0; $total_terget = $total_terget+ $totthosheba_terget; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $totthosheba_bachai=(isset( $human_managemant_jonobol_shorboraho['totthosheba_bachai']))? $human_managemant_jonobol_shorboraho['totthosheba_bachai']:0; $total_bachai = $total_bachai+ $totthosheba_bachai; ?>
                                </td>
                               
                                <td class="tg-0pky  type_3">
                                <?php echo $totthosheba_sang=(isset( $human_managemant_jonobol_shorboraho['totthosheba_sang']))? $human_managemant_jonobol_shorboraho['totthosheba_sang']:0; $total_sang = $total_sang+ $totthosheba_sang; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $totthosheba_shadha=(isset( $human_managemant_jonobol_shorboraho['totthosheba_shadha']))? $human_managemant_jonobol_shorboraho['totthosheba_shadha']:0; $total_shadha = $total_shadha+ $totthosheba_shadha; ?>
                                </td>
                               
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" rowspan='3'>
                                শিক্ষক
                                </td>
                                                         
                                <td class="tg-y698 tg-0pky" >
                                কলেজ শিক্ষক (বেসরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                              <?php echo $college_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['college_teacher_terget']))? $human_managemant_jonobol_shorboraho['college_teacher_terget']:0; $total_terget = $total_terget+ $college_teacher_terget; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $college_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['college_teacher_bachai']))? $human_managemant_jonobol_shorboraho['college_teacher_bachai']:0; $total_bachai = $total_bachai+ $college_teacher_bachai; ?>
                                </td>
                                
                                <td class="tg-0pky  type_3">
                                <?php echo $college_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['college_teacher_sang']))? $human_managemant_jonobol_shorboraho['college_teacher_sang']:0; $total_sang = $total_sang+ $college_teacher_sang; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $college_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['college_teacher_shadha']))? $human_managemant_jonobol_shorboraho['college_teacher_shadha']:0; $total_shadha = $total_shadha+ $college_teacher_shadha; ?>
                                </td>
                                
                            </tr>
                            
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মাধ্যমিক বিদ্যালয় শিক্ষক (সরকারি)
                                </td>
                              <td class="tg-0pky  type_3">
                              <?php echo $maddhomik_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_terget']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_terget']:0; $total_terget = $total_terget+ $maddhomik_teacher_terget; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $maddhomik_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_bachai']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_bachai']:0; $total_bachai = $total_bachai+ $maddhomik_teacher_bachai; ?>
                                </td>
                                
                                <td class="tg-0pky  type_3">
                                <?php echo $maddhomik_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_sang']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_sang']:0; $total_sang = $total_sang+ $maddhomik_teacher_sang; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $maddhomik_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['maddhomik_teacher_shadha']))? $human_managemant_jonobol_shorboraho['maddhomik_teacher_shadha']:0; $total_shadha = $total_shadha+ $maddhomik_teacher_shadha; ?>
                                </td>
                                
                            </tr>
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" >
                                মাদরাসা শিক্ষক
                                </td>
                              <td class="tg-0pky  type_3">
                              <?php echo $madrasah_teacher_terget=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_terget']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_terget']:0; $total_terget = $total_terget+ $madrasah_teacher_terget; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $madrasah_teacher_bachai=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_bachai']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_bachai']:0; $total_bachai = $total_bachai+ $madrasah_teacher_bachai; ?>
                                </td>
                                
                                <td class="tg-0pky  type_3">
                                <?php echo $madrasah_teacher_sang=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_sang']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_sang']:0; $total_sang = $total_sang+ $madrasah_teacher_sang; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $madrasah_teacher_shadha=(isset( $human_managemant_jonobol_shorboraho['madrasah_teacher_shadha']))? $human_managemant_jonobol_shorboraho['madrasah_teacher_shadha']:0; $total_shadha = $total_shadha+ $madrasah_teacher_shadha; ?>
                                </td>
                                
                            </tr>

                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                ব্যাংকার
                                </td>
                              <td class="tg-0pky  type_3">
                              <?php echo $banker_tar=(isset( $human_managemant_jonobol_shorboraho['banker_tar']))? $human_managemant_jonobol_shorboraho['banker_tar']:0;  ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $banker_bac=(isset( $human_managemant_jonobol_shorboraho['banker_bac']))? $human_managemant_jonobol_shorboraho['banker_bac']:0; ?>
                                </td>
                               
                                <td class="tg-0pky  type_3">
                                <?php echo $banker_san=(isset( $human_managemant_jonobol_shorboraho['banker_san']))? $human_managemant_jonobol_shorboraho['banker_san']:0;  ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $banker_sad=(isset( $human_managemant_jonobol_shorboraho['banker_sad']))? $human_managemant_jonobol_shorboraho['banker_sad']:0;  ?>
                                </td>
                               
                            </tr>

                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                আন্তর্জাতিক সংস্থা
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $anto_tar=(isset($human_managemant_jonobol_shorboraho['anto_tar'])) ? $human_managemant_jonobol_shorboraho['anto_tar'] : 0; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $anto_bac=(isset($human_managemant_jonobol_shorboraho['anto_bac'])) ? $human_managemant_jonobol_shorboraho['anto_bac'] : 0; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $anto_san=(isset($human_managemant_jonobol_shorboraho['anto_san'])) ? $human_managemant_jonobol_shorboraho['anto_san'] : 0; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $anto_sad=(isset($human_managemant_jonobol_shorboraho['anto_sad'])) ? $human_managemant_jonobol_shorboraho['anto_sad'] : 0; ?>
                                </td>

                               
                            </tr>
                          
                            <tr>                                                      
                                <td class="tg-y698 tg-0pky" colspan='2'>
                                সর্বমোট
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo  $total_terget+$banker_tar+$anto_tar;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_bachai+$banker_bac+ $anto_bac;?>
                                </td>
                              
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_sang+$banker_san+$anto_san;?>
                                </td>
                              <td class="tg-0pky  type_6">
                                    <?php echo  $total_shadha+$banker_sad+$anto_sad;?>
                                </td>
                              
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="কোচিং">
                            <tr>
                            <td class="tg-pwj7" colspan="3"><b>শাখা নিয়ন্ত্রিত কোচিং সংক্রান্ত তথ্য  </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='কোচিং' onclick="doit('xlsx','কোচিং','<?php echo 'Education_শাখা নিয়ন্ত্রিত কোচিং সংক্রান্ত তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> কোচিং সংখ্যা </td>
                                <td class="tg-pwj7">ব্যাচ সংখ্যা </td>
                                <td class="tg-pwj7"> ছাত্র সংখ্যা</td>

                            </tr>

                            <?php
                            $pk = (isset($education_coaching_manob['id']))?$education_coaching_manob['id']:"";

                            ?>
                           

                            <tr>
                                <td class="tg-y698">প্রফেশনাল/জব </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $job_coaching=(isset( $education_coaching_manob['job_coaching']))? $education_coaching_manob['job_coaching']:0 ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $job_batch=(isset( $education_coaching_manob['job_batch']))? $education_coaching_manob['job_batch']:0 ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $job_student=(isset( $education_coaching_manob['job_student']))? $education_coaching_manob['job_student']:0 ?>
                                </td>
                            </tr>

                           
                        </table>

                        <table class="tg table table-header-rotated" id="কেন্দ্রীয় পাঠ-পরিকল্পনা">
                            <tr>
                            <td class="tg-pwj7" colspan="2"><b>সদস্যদের কেন্দ্রীয় পাঠ-পরিকল্পনা (ম্যানপাওয়ার প্লানিং) : </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='কেন্দ্রীয় পাঠ-পরিকল্পনা' onclick="doit('xlsx','কেন্দ্রীয় পাঠ-পরিকল্পনা','<?php echo 'সদস্যদের কেন্দ্রীয় পাঠ-পরিকল্পনা (ম্যানপাওয়ার প্লানিং)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">সদস্যদের মাসিক পরীক্ষা গ্রহণ করা হয়েছে কতটি?</td>
                                <td class="tg-pwj7"> মোট অংশগ্রহণকারী কতজন? </td>
                                <td class="tg-pwj7">গড় </td>

                            </tr>

                            <?php
                            $pk = (isset($manpower_planing['id']))?$manpower_planing['id']:"";

                            ?>
                           

                            <tr>

                                <td class="tg-0pky  type_1">
                                <?php echo $exam_sonkha=(isset( $manpower_planing['exam_sonkha']))? $manpower_planing['exam_sonkha']:0 ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $exam_uposthiti=(isset( $manpower_planing['exam_uposthiti']))? $manpower_planing['exam_uposthiti']:0 ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $exam_gor=(isset( $manpower_planing['exam_gor']))? $manpower_planing['exam_gor']:0 ?>
                                </td>
                            </tr>

                           
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Human_management_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <?php echo $shikkha_central_s=$human_management_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$human_management_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$human_management_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$human_management_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$human_management_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$human_management_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$human_management_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$human_management_training_program['kormoshala_shakha_p'] ?>
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
 
