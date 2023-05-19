<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/madrasha-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/madrasha-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable6">
                        <tr>
                            <td class="tg-pwj7" colspan="4"><b>সামিট </b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Madrasha_সামিট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <tr>
                            <td class="tg-pwj7" colspan=''>প্রোগ্রামের নাম</td>
                            <td class="tg-pwj7" colspan=''>ধরন</td>
                            <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                            <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                            <td class="tg-pwj7" colspan=''>গড়</td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>থিওলোজি বিভাগে অধ্যয়নরত স্নাতক ও স্নাতকোত্তর পর্যায়ের ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $physio_manpower_central_s=$total_madrasah_summit['physio_manpower_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $physio_manpower_central_p=$total_madrasah_summit['physio_manpower_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($physio_manpower_central_s>0 && $physio_manpower_central_p>0)
                            {echo ($physio_manpower_central_p/$physio_manpower_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $physio_general_central_s=$total_madrasah_summit['physio_general_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $physio_general_central_p=$total_madrasah_summit['physio_general_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($physio_general_central_s>0 && $physio_general_central_p>0)
                            {echo ($physio_general_central_p/$physio_general_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>থিওলোজি বিভাগে অধ্যয়নরত স্নাতক ও স্নাতকোত্তর পর্যায়ের ছাত্রদের নিয়ে সামিট (শাখা)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $physio_manpower_shakha_s=$total_madrasah_summit['physio_manpower_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $physio_manpower_shakha_p=$total_madrasah_summit['physio_manpower_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($physio_manpower_shakha_s>0 && $physio_manpower_shakha_p>0)
                            {echo ($physio_manpower_shakha_p/$physio_manpower_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $physio_general_shakha_s=$total_madrasah_summit['physio_general_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $physio_general_shakha_p=$total_madrasah_summit['physio_general_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($physio_general_shakha_s>0 && $physio_general_shakha_p>0)
                            {echo ($physio_general_shakha_p/$physio_general_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>কওমি শিক্ষা প্রতিষ্ঠান অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $kowmi_manpower_central_s=$total_madrasah_summit['kowmi_manpower_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kowmi_manpower_central_p=$total_madrasah_summit['kowmi_manpower_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kowmi_manpower_central_s>0 && $kowmi_manpower_central_p>0)
                            {echo ($kowmi_manpower_central_p/$kowmi_manpower_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $kowmi_general_central_s=$total_madrasah_summit['kowmi_general_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kowmi_general_central_p=$total_madrasah_summit['kowmi_general_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kowmi_general_central_s>0 && $kowmi_general_central_p>0)
                            {echo ($kowmi_general_central_p/$kowmi_general_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>কওমি শিক্ষা প্রতিষ্ঠান অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $kowmi_manpower_shakha_s=$total_madrasah_summit['kowmi_manpower_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kowmi_manpower_shakha_p=$total_madrasah_summit['kowmi_manpower_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kowmi_manpower_shakha_s>0 && $kowmi_manpower_shakha_p>0)
                            {echo ($kowmi_manpower_shakha_p/$kowmi_manpower_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td> 
                            <td class="tg-0pky type_1">
                            <?php echo $kowmi_general_shakha_s=$total_madrasah_summit['kowmi_general_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kowmi_general_shakha_p=$total_madrasah_summit['kowmi_general_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kowmi_general_shakha_s>0 && $kowmi_general_shakha_p>0)
                            {echo ($kowmi_general_shakha_p/$kowmi_general_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>

                    </table>
                    <table class="tg table table-header-rotated" id="testTable5">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Madrasha_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$total_madrasah_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$total_madrasah_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$total_madrasah_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$total_madrasah_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$total_madrasah_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$total_madrasah_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$total_madrasah_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$total_madrasah_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan='5'><b>জনশক্তি ও দাওয়াত (আলিয়া)</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_জনশক্তি ও দাওয়াত (আলিয়া).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-pwj7" rowspan="">জনশক্তি ও দাওয়াত</td>
                                <td class="tg-pwj7" colspan=""style="">পূর্ব সংখ্যা </td>
                                <td class="tg-pwj7" colspan=""style=""> বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="" style="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" colspan="">টার্গেট  </td>
                                <td class="tg-pwj7" colspan="">ঘাটতি  </td>
                                
                            </tr>
                     
                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_prev=$total_madrasah_jonoshokti['m_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $m_pres=$total_madrasah_jonoshokti['m_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $m_bri=$total_madrasah_jonoshokti['m_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $m_ter=$total_madrasah_jonoshokti['m_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $m_gha=$total_madrasah_jonoshokti['m_gha'] ?>
                                </td>
                                 
                            
                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_prev=$total_madrasah_jonoshokti['a_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_pres=$total_madrasah_jonoshokti['a_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_bri=$total_madrasah_jonoshokti['a_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $a_ter=$total_madrasah_jonoshokti['a_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $a_gha=$total_madrasah_jonoshokti['a_gha'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_prev=$total_madrasah_jonoshokti['w_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $w_pres=$total_madrasah_jonoshokti['w_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $w_bri=$total_madrasah_jonoshokti['w_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $w_ter=$total_madrasah_jonoshokti['w_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $w_gha=$total_madrasah_jonoshokti['w_gha'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $s_prev=$total_madrasah_jonoshokti['s_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_pres=$total_madrasah_jonoshokti['s_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_bri=$total_madrasah_jonoshokti['s_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $s_ter=$total_madrasah_jonoshokti['s_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $s_gha=$total_madrasah_jonoshokti['s_gha'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $f_prev=$total_madrasah_jonoshokti['f_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $f_pres=$total_madrasah_jonoshokti['f_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $f_bri=$total_madrasah_jonoshokti['f_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $f_ter=$total_madrasah_jonoshokti['f_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $f_gha=$total_madrasah_jonoshokti['f_gha'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($m_prev+$a_prev+$w_prev+$s_prev+$f_prev) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($m_pres+$a_pres+$w_pres+$s_pres+$f_pres) ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($m_bri+$a_bri+$w_bri+$s_bri+$f_bri) ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo ($m_ter+$a_ter+$w_ter+$s_ter+$f_ter) ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($m_gha+$a_gha+$w_gha+$s_gha+$f_gha) ?>
                                </td>
                            </tr>
                           
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                            <td class="tg-pwj7" colspan='5'><b>সংগঠন (আলিয়া)</b></td>
                            <td class="tg-pwj7">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_সংগঠন (আলিয়া).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" rowspan="">সংগঠন</td>
                            <td class="tg-pwj7" colspan=""style="">পূর্বের সংখ্যা </td>
                            <td class="tg-pwj7" colspan=""style=""> বর্তমান সংখ্যা </td>
                            <td class="tg-pwj7" colspan="" style="">বৃদ্ধি  </td>
                            <td class="tg-pwj7" colspan="">টার্গেট  </td>
                            <td class="tg-pwj7" colspan="">ঘাটতি  </td>



                        </tr>
                        <tr>
                                <td class="tg-y698">থানা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $th_prev=$total_madrasah_shongothon['th_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $th_pres=$total_madrasah_shongothon['th_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $th_bri=$total_madrasah_shongothon['th_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $th_ter=$total_madrasah_shongothon['th_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $th_gha=$total_madrasah_shongothon['th_gha'] ?>
                                </td>
                                
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ওয়ার্ড/জোন  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $wo_prev=$total_madrasah_shongothon['wo_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $wo_pres=$total_madrasah_shongothon['wo_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $wo_bri=$total_madrasah_shongothon['wo_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $wo_ter=$total_madrasah_shongothon['wo_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $wo_gha=$total_madrasah_shongothon['wo_gha'] ?>
                                </td>
                                
                             
                             
                            </tr>

                            <tr>
                                <td class="tg-y698">উপশাখা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $up_prev=$total_madrasah_shongothon['up_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $up_pres=$total_madrasah_shongothon['up_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $up_bri=$total_madrasah_shongothon['up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $up_ter=$total_madrasah_shongothon['up_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $up_gha=$total_madrasah_shongothon['up_gha'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> সমর্থক সংগঠন </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ss_prev=$total_madrasah_shongothon['ss_prev'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ss_pres=$total_madrasah_shongothon['ss_pres'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ss_bri=$total_madrasah_shongothon['ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ss_ter=$total_madrasah_shongothon['ss_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ss_gha=$total_madrasah_shongothon['ss_gha'] ?>
                                </td>
                            
                                
                            </tr>
                            <tr>
                                <td class="tg-0pky" rowspan="2"> মোট</td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_prev+$wo_prev+$up_prev+$ss_prev)?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_pres+$wo_pres+$up_pres+$ss_pres)?>  
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_bri+$wo_bri+$up_bri+$ss_bri)?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_ter+$wo_ter+$up_ter+$ss_ter)?> 
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_gha+$wo_gha+$up_gha+$ss_gha)?> 
                                </td>
                               
                            </tr>
                              
                        </table>
                      
                        
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
