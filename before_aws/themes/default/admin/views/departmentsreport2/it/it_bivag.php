<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'তথ্যপ্রযুক্তি ও সোশ্যাল মিডিয়া বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষান্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষান্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/it-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="7"><b>জনশক্তি ও রিসোর্স<b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'IT_জনশক্তি ও রিসোর্স.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                             
                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>পিসি/ল্যাপটপ <br> আছে  </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>এন্ড্রয়েড ফোন<br> আছে</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ইন্টারনেট <br> আছে </span></div></td>
                                <td class="tg-pwj7" colspan="2">নিয়মিত ব্লগ লেখেন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ফেসবুক <br> ক্যাম্পেইন করেন </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>টুইটার <br> ক্যাম্পেইন করেন</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>CSE তে <br> অধ্যয়নরত</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  বাংলা </span></div></td>
                                <td class="tg-pwj7 "><div><span>ইংরেজি </span></div></td>
                              
                         
                        
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sod_s = $total_it_jonoshoktiorisors['sod_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sod_pltpa = $total_it_jonoshoktiorisors['sod_pltpa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sod_adphna = $total_it_jonoshoktiorisors['sod_adphna'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sod_ena = $total_it_jonoshoktiorisors['sod_ena'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $sod_nmble_enrj = $total_it_jonoshoktiorisors['sod_nmble_enrj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sod_nmble_bnl = $total_it_jonoshoktiorisors['sod_nmble_bnl'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sod_fbkpk = $total_it_jonoshoktiorisors['sod_fbkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sod_tutkpk = $total_it_jonoshoktiorisors['sod_tutkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $sod_itap = $total_it_jonoshoktiorisors['sod_itap'] ?>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_s = $total_it_jonoshoktiorisors['sat_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_pltpa = $total_it_jonoshoktiorisors['sat_pltpa'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $sat_adphna = $total_it_jonoshoktiorisors['sat_adphna'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_ena = $total_it_jonoshoktiorisors['sat_ena'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_nmble_enrj = $total_it_jonoshoktiorisors['sat_nmble_enrj'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_nmble_bnl = $total_it_jonoshoktiorisors['sat_nmble_bnl'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_fbkpk = $total_it_jonoshoktiorisors['sat_fbkpk'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_tutkpk = $total_it_jonoshoktiorisors['sat_tutkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sat_itap = $total_it_jonoshoktiorisors['sat_itap'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_s = $total_it_jonoshoktiorisors['kor_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_pltpa = $total_it_jonoshoktiorisors['kor_pltpa'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_adphna = $total_it_jonoshoktiorisors['kor_adphna'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_ena = $total_it_jonoshoktiorisors['kor_ena'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $kor_ena = $total_it_jonoshoktiorisors['kor_nmble_enrj'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_nmble_bnl = $total_it_jonoshoktiorisors['kor_nmble_bnl'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_fbkpk = $total_it_jonoshoktiorisors['kor_fbkpk'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_tutkpk = $total_it_jonoshoktiorisors['kor_tutkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kor_itap = $total_it_jonoshoktiorisors['kor_itap'] ?>
                                </td>
                               
                            </tr>


                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                    <?php echo ($sod_s+$sat_s+$kor_s)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_pltpa+$sat_pltpa+$kor_pltpa)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_adphna+$sat_adphna+$kor_adphna)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_ena+$sat_ena+$kor_ena)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_nmble_enrj+$sat_nmble_enrj+$kor_nmble_enrj)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_nmble_bnl+$sat_nmble_bnl+$kor_nmble_bnl)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_fbkpk+$sat_fbkpk+$kor_fbkpk)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_tutkpk+$sat_tutkpk+$kor_tutkpk)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sod_itap+$sat_itap+$kor_itap)?>
                                </td>
                              
                            </tr>




                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">

                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>জনশক্তির দক্ষতা<b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'IT_জনশক্তির দক্ষতা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                             
                                
                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> ওয়ার্ড  </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> এক্সেল </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> পাওয়ারপয়ন্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ভিডিও <br> এডিটিং </span></div></td>
                                <td class="tg-pwj7" colspan="2">গ্রাফিক ডিজাইন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> ওয়েব <br> ডেভেলপম্যান্ট </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>অ্যাপ <br> ডেভেলপম্যান্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>আইটি এক্সপার্ট</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span> ফটোশপ  </span></div></td>
                                <td class="tg-pwj7 "><div><span> ইলাস্ট্রেটর</span></div></td>
                              
                         
                        
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sod_mio = $total_it_dept_jonoshoktir_dokkhota['sod_mio'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sod_miax = $total_it_dept_jonoshoktir_dokkhota['sod_miax'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sod_mipp = $total_it_dept_jonoshoktir_dokkhota['sod_mipp'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sod_vdoe = $total_it_dept_jonoshoktir_dokkhota['sod_vdoe'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $sod_gdp = $total_it_dept_jonoshoktir_dokkhota['sod_gdp'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sod_gde = $total_it_dept_jonoshoktir_dokkhota['sod_gde'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sod_web = $total_it_dept_jonoshoktir_dokkhota['sod_web'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sod_app = $total_it_dept_jonoshoktir_dokkhota['sod_app'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $sod_it = $total_it_dept_jonoshoktir_dokkhota['sod_it'] ?>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_mio = $total_it_dept_jonoshoktir_dokkhota['sat_mio'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_miax = $total_it_dept_jonoshoktir_dokkhota['sat_miax'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $sat_mipp = $total_it_dept_jonoshoktir_dokkhota['sat_mipp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_vdoe = $total_it_dept_jonoshoktir_dokkhota['sat_vdoe'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_gdp = $total_it_dept_jonoshoktir_dokkhota['sat_gdp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_gde = $total_it_dept_jonoshoktir_dokkhota['sat_gde'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_web = $total_it_dept_jonoshoktir_dokkhota['sat_web'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_app = $total_it_dept_jonoshoktir_dokkhota['sat_app'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sat_it = $total_it_dept_jonoshoktir_dokkhota['sat_it'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_mio = $total_it_dept_jonoshoktir_dokkhota['kor_mio'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_miax = $total_it_dept_jonoshoktir_dokkhota['kor_miax'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_mipp = $total_it_dept_jonoshoktir_dokkhota['kor_mipp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_vdoe = $total_it_dept_jonoshoktir_dokkhota['kor_vdoe'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $kor_gdp = $total_it_dept_jonoshoktir_dokkhota['kor_gdp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_gde = $total_it_dept_jonoshoktir_dokkhota['kor_gde'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_web = $total_it_dept_jonoshoktir_dokkhota['kor_web'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_app = $total_it_dept_jonoshoktir_dokkhota['kor_app'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kor_it = $total_it_dept_jonoshoktir_dokkhota['kor_it'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                    <?php echo ($sod_mio+$sat_mio+$kor_mio)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_miax+$sat_miax+$kor_miax)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_mipp+$sat_mipp+$kor_mipp)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_vdoe+$sat_vdoe+$kor_vdoe)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_gdp+$sat_gdp+$kor_gdp)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_gde+$sat_gde+$kor_gde)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_web+$sat_web+$kor_web)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_app+$sat_app+$kor_app)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sod_it+$sat_it+$kor_it)?>
                                </td>
                                
                              
                            </tr>




                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>শাখার অনলাইন রিসোর্স<b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'IT_শাখার অনলাইন রিসোর্স.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3"></td>
                                <td class="tg-pwj7" colspan="2"style="border-bottom: hidden;">ওয়েবসাইট</td>
                                <td class="tg-pwj7" colspan="2" style="border-bottom: hidden;"> ফেসবুক পেইজ </td>
                                <td class="tg-pwj7" colspan="2"> টুইটার একাউন্ট  </td>
                                <td class="tg-pwj7" colspan="2">ইউটিউব চ্যানেল  </td>
                                <td class="tg-pwj7" rowspan="2" style="border-bottom: hidden;">অন্যান্য সোশ্যাল  </td>
                            </tr>
                            <tr>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span> </span></div></td>
                                
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1">সংখ্যা</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $s_ose_bm = $total_it_dept_shakhar_online_risors['s_ose_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_ose_br = $total_it_dept_shakhar_online_risors['s_ose_br'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_fbpj_bm = $total_it_dept_shakhar_online_risors['s_fbpj_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $s_fbpj_br = $total_it_dept_shakhar_online_risors['s_fbpj_br'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $s_tuta_bm = $total_it_dept_shakhar_online_risors['s_tuta_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $s_tuta_br = $total_it_dept_shakhar_online_risors['s_tuta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $s_youtub_bm = $total_it_dept_shakhar_online_risors['s_youtub_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $s_youtub_br = $total_it_dept_shakhar_online_risors['s_youtub_br'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $s_onnoannososhal = $total_it_dept_shakhar_online_risors['s_onnoannososhal'] ?>
                                </td>
                               
                            </tr>
                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'IT_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$total_it_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$total_it_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$total_it_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$total_it_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$total_it_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$total_it_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$total_it_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$total_it_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                <table class="tg table table-header-rotated" id="testTable4">
                        <tr>
                            <td class="tg-pwj7" colspan="5"><b>প্রশিক্ষণ<b></td>
                            <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'IT_প্রশিক্ষণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                        </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>

                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>
  
                       
                   </tr>
                   <?php
                          
                            $total_s=0;
                            $total_upthi=0;
                            ?>


                   <tr>
                       <td class="tg-y698 type_1">বেসিক কম্পিউটার 	</td>
                       <td class="tg-0pky  type_9">
                        
                            <?php echo $bscmput_s =  (isset( $total_it_proshikkhon['bscmput_s']))? $total_it_proshikkhon['bscmput_s']:0; $total_s=$total_s+$bscmput_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $bscmput_upthi =  (isset( $total_it_proshikkhon['bscmput_upthi']))? $total_it_proshikkhon['bscmput_upthi']:0; $total_upthi=$total_upthi+$bscmput_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ফটোশপ	</td>
                        <td class="tg-0pky  type_1">
                            <?php echo $msford_s =  (isset( $total_it_proshikkhon['msford_s']))? $total_it_proshikkhon['msford_s']:0; $total_s=$total_s+ $msford_s; ?>
                       
                        </td>
                       <td class="tg-0pky  type_9">
                          
                            <?php echo $msford_upthi =  (isset( $total_it_proshikkhon['msford_upthi']))? $total_it_proshikkhon['msford_upthi']:0; $total_upthi=$total_upthi+ $msford_upthi; ?>
                       
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msford_s!=0)?($msford_upthi/$msford_s):0?>
                       </td>
                      
                       
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1">বেসিক মোবাইল (অ্যান্ড্রোয়েড) 	</td>
                       <td class="tg-0pky  type_9">
                         
                            <?php echo $bsmobile_s =  (isset( $total_it_proshikkhon['bsmobile_s']))? $total_it_proshikkhon['bsmobile_s']:0; $total_s=$total_s+ $bsmobile_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                          
                            <?php echo $bsmobile_upthi =  (isset( $total_it_proshikkhon['bsmobile_upthi']))? $total_it_proshikkhon['bsmobile_upthi']:0; $total_upthi=$total_upthi+$bsmobile_upthi; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bsmobile_s!=0)?($bsmobile_upthi/$bsmobile_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ইলাস্ট্রেটর	</td>
                       <td class="tg-0pky  type_9">
                            
                            <?php echo $eltt_s =  (isset( $total_it_proshikkhon['eltt_s']))? $total_it_proshikkhon['eltt_s']:0; $total_s=$total_s+ $eltt_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $eltt_upthi =  (isset( $total_it_proshikkhon['eltt_upthi']))? $total_it_proshikkhon['eltt_upthi']:0; $total_upthi=$total_upthi+ $eltt_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($eltt_s!=0)?($eltt_upthi/$eltt_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> মাইক্রোসফট ওয়ার্ড 	</td>
                       <td class="tg-0pky  type_9">
                          
                            <?php echo $msword_s =  (isset( $total_it_proshikkhon['msword_s']))? $total_it_proshikkhon['msword_s']:0; $total_s=$total_s+$msword_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                         
                            <?php echo $msword_upthi =  (isset( $total_it_proshikkhon['msword_upthi']))? $total_it_proshikkhon['msword_upthi']:0; $total_upthi=$total_upthi+$msword_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msword_s!=0)?($msword_upthi/$msword_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ভিডিও এডিটিং	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $video_s =  (isset( $total_it_proshikkhon['video_s']))? $total_it_proshikkhon['video_s']:0; $total_s=$total_s+ $video_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                          
                            <?php echo $video_upthi =  (isset( $total_it_proshikkhon['video_upthi']))? $total_it_proshikkhon['video_upthi']:0; $total_upthi=$total_upthi+$video_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($video_s!=0)?($video_upthi/$video_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">মাইক্রোসফট এক্সেল	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $msfexl_s =  (isset( $total_it_proshikkhon['msfexl_s']))? $total_it_proshikkhon['msfexl_s']:0; $total_s=$total_s+  $msfexl_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                        
                            <?php echo $msfexl_upthi =  (isset( $total_it_proshikkhon['msfexl_upthi']))? $total_it_proshikkhon['msfexl_upthi']:0; $total_upthi=$total_upthi+ $msfexl_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msfexl_s!=0)?($msfexl_upthi/$msfexl_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ওয়েব ডেভেলপমেন্ট	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $web_s =  (isset( $total_it_proshikkhon['web_s']))? $total_it_proshikkhon['web_s']:0; $total_s=$total_s+$web_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                         
                            <?php echo $web_upthi =  (isset( $total_it_proshikkhon['web_upthi']))? $total_it_proshikkhon['web_upthi']:0; $total_upthi=$total_upthi+$web_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($web_s!=0)?($web_upthi/$web_s):0?>
                       </td>
                      
                       
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1">  মাইক্রোসফট পাওয়ারপয়েন্ট</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $pwrp_s =  (isset( $total_it_proshikkhon['pwrp_s']))? $total_it_proshikkhon['pwrp_s']:0; $total_s=$total_s+ $pwrp_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $pwrp_upthi =  (isset( $total_it_proshikkhon['pwrp_upthi']))? $total_it_proshikkhon['pwrp_upthi']:0; $total_upthi=$total_upthi+ $pwrp_upthi; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($pwrp_s!=0)?($pwrp_upthi/$pwrp_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অ্যাপ ডেভেলপমেন্ট  </td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $apsdpm_s =  (isset( $total_it_proshikkhon['apsdpm_s']))? $total_it_proshikkhon['apsdpm_s']:0; $total_s=$total_s+$apsdpm_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                         
                            <?php echo $apsdpm_upthi =  (isset( $total_it_proshikkhon['apsdpm_upthi']))? $total_it_proshikkhon['apsdpm_upthi']:0; $total_upthi=$total_upthi+$apsdpm_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($apsdpm_s!=0)?($apsdpm_upthi/$apsdpm_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ফেসবুক	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $fb_s =  (isset( $total_it_proshikkhon['fb_s']))? $total_it_proshikkhon['fb_s']:0; $total_s=$total_s+ $fb_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                         
                            <?php echo $fb_upthi =  (isset( $total_it_proshikkhon['fb_upthi']))? $total_it_proshikkhon['fb_upthi']:0; $total_upthi=$total_upthi+$fb_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($fb_s!=0)?($fb_upthi/$fb_s):0?>
                       </td>

                       <td class="tg-y698 type_1">বেসিক ইন্টারনেট</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $bsicint_s =  (isset( $total_it_proshikkhon['bsicint_s']))? $total_it_proshikkhon['bsicint_s']:0; $total_s=$total_s+$bsicint_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                      
                            <?php echo $bsicint_upthi =  (isset( $total_it_proshikkhon['bsicint_upthi']))? $total_it_proshikkhon['bsicint_upthi']:0; $total_upthi=$total_upthi+ $bsicint_upthi; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bsicint_s!=0)?($bsicint_upthi/$bsicint_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> টুইটার	</td>
                       <td class="tg-0pky  type_9">
                          
                            <?php echo $tutr_s =  (isset( $total_it_proshikkhon['tutr_s']))? $total_it_proshikkhon['tutr_s']:0; $total_s=$total_s+ $tutr_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                            
                            <?php echo $tutr_upthi =  (isset( $total_it_proshikkhon['tutr_upthi']))? $total_it_proshikkhon['tutr_upthi']:0; $total_upthi=$total_upthi+ $tutr_upthi; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($tutr_s!=0)?($tutr_upthi/$tutr_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অনলাইন নিরাপত্তা	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $onlinept_s =  (isset( $total_it_proshikkhon['onlinept_s']))? $total_it_proshikkhon['onlinept_s']:0; $total_s=$total_s+$onlinept_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                          
                            <?php echo $onlinept_upthi =  (isset( $total_it_proshikkhon['onlinept_upthi']))? $total_it_proshikkhon['onlinept_upthi']:0; $total_upthi=$total_upthi+ $onlinept_upthi; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($onlinept_s!=0)?($onlinept_upthi/$onlinept_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ব্লগ (বাংলা/ ইংরেজি )	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $bgbe_s =  (isset( $total_it_proshikkhon['bgbe_s']))? $total_it_proshikkhon['bgbe_s']:0; $total_s=$total_s+$bgbe_s ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                         
                            <?php echo $bgbe_upthi =  (isset( $total_it_proshikkhon['bgbe_upthi']))? $total_it_proshikkhon['bgbe_upthi']:0; $total_upthi=$total_upthi+$bgbe_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bgbe_s!=0)?($bgbe_upthi/$bgbe_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অনলাইন নীতিমালা	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $onlineni_s =  (isset( $total_it_proshikkhon['onlineni_s']))? $total_it_proshikkhon['onlineni_s']:0; $total_s=$total_s+ $onlineni_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $onlineni_upthi =  (isset( $total_it_proshikkhon['onlineni_upthi']))? $total_it_proshikkhon['onlineni_upthi']:0; $total_upthi=$total_upthi+ $onlineni_upthi; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($onlineni_s!=0)?($onlineni_upthi/$onlineni_s):0?>
                       </td>
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> উইকিপিডিয়া	</td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $ukp_s =  (isset( $total_it_proshikkhon['ukp_s']))? $total_it_proshikkhon['ukp_s']:0; $total_s=$total_s+ $ukp_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                           
                            <?php echo $ukp_upthi =  (isset( $total_it_proshikkhon['ukp_upthi']))? $total_it_proshikkhon['ukp_upthi']:0; $total_upthi=$total_upthi+$ukp_upthi ; ?>
                        
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($ukp_s!=0)?($ukp_upthi/$ukp_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> মোট	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $total_s; ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $total_upthi; ?>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo ($total_upthi!=0 && $total_s!=0)?round(($total_upthi/$total_s),2):0?>
                       </td>
                      
                       
                   </tr>
                 
                  

                        </table>

                    </div>


                  
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
