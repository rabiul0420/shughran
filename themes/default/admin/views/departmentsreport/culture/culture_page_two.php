<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শিল্প ও সংস্কৃতি বিভাগ - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/culture-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" colspan='7'><b>যোগাযোগ</b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Culture_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>
                    <tr>
                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>
                   </tr>

                   <tr>
                       <td class="tg-0pky  type_1">
                       গীতিকার
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $gitikar_jon = $culture_contact['gitikar_jon'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $gitikar_bar = $culture_contact['gitikar_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ক্বারী
                       </td>
                       
                       <td class="tg-0pky  type_1">
                       <?php echo $kari_jon = $culture_contact['kari_jon'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kari_bar = $culture_contact['kari_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সাংস্কৃতিক প্রতিষ্ঠান
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shang_protishthan_jon = $culture_contact['shang_protishthan_jon'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $shang_protishthan_bar = $culture_contact['shang_protishthan_bar'] ?>
                        </td>
                      
                   </tr>


                   <tr>
                       <td class="tg-0pky  type_1">
                       সুরকার
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shurokar_jon = $culture_contact['shurokar_jon'] ?>
                       </td>
                       
                       <td class="tg-0pky  type_1">
                       <?php echo $shurokar_bar = $culture_contact['shurokar_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       আবৃত্তিকার			
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $abrittikar_jon = $culture_contact['abrittikar_jon'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $abrittikar_bar = $culture_contact['abrittikar_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সাংবাদিক		
                       </td>


                       <td class="tg-0pky  type_1">
                       <?php echo $shangbadik_jon = $culture_contact['shangbadik_jon'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $shangbadik_bar = $culture_contact['shangbadik_bar'] ?>
                        </td>
                      
                   </tr> 
                   <tr>
                       <td class="tg-0pky  type_1">
                       নাট্যকার			
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nattokar_jon = $culture_contact['nattokar_jon'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $nattokar_bar = $culture_contact['nattokar_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       উপস্থাপক			
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $uposthapok_jon = $culture_contact['uposthapok_jon'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $uposthapok_bar = $culture_contact['uposthapok_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ইলেকট্রনিক মিডিয়া
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $electronic_media_jon = $culture_contact['electronic_media_jon'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $electronic_media_bar = $culture_contact['electronic_media_bar'] ?>
                        </td>
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       নির্দেশক
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nirdeshok_jon = $culture_contact['nirdeshok_jon'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $nirdeshok_bar = $culture_contact['nirdeshok_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       কবি			
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $kobi_jon = $culture_contact['kobi_jon'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kobi_bar = $culture_contact['kobi_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অভিভাবক		
                       </td>


                       <td class="tg-0pky  type_1">
                       <?php echo $ovivabok_jon = $culture_contact['ovivabok_jon'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $ovivabok_bar = $culture_contact['ovivabok_bar'] ?>
                        </td>                     
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       শিল্পী			
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shilpi_jon = $culture_contact['shilpi_jon'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shilpi_bar = $culture_contact['shilpi_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       লেখক			
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $lekhok_jon = $culture_contact['lekhok_jon'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $lekhok_bar = $culture_contact['lekhok_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       উপদেষ্টা		
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $upodeshta_jon = $culture_contact['upodeshta_jon'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $upodeshta_bar = $culture_contact['upodeshta_bar'] ?>
                        </td>                     
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       অভিনেতা			
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ovineta_jon = $culture_contact['ovineta_jon'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $ovineta_bar = $culture_contact['ovineta_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সাংস্কৃতিক পৃষ্ঠপোষক
                       </td>

                       <td class="tg-0pky  type_1">
                        <?php echo $shang_pri_jon = $culture_contact['shang_pri_jon'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $shang_pri_bar = $culture_contact['shang_pri_bar'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অন্যান্য		
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $onnanno_jon = $culture_contact['onnanno_jon'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $onnanno_bar = $culture_contact['onnanno_bar'] ?>
                        </td>                      
                   </tr>
                   
                    </table>
                <table class="tg table table-header-rotated" id="testTable2">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>প্রকাশনা </b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Culture_প্রকাশনা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>
                    <tr>
                    <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>

                       <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>

                       <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>

                       <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                              
                   </tr>
                  
                   <tr>
                       <td class="tg-0pky  type_1">
                       নতুন গান বাঁধা 
                       </td>
                       <td class="tg-0pky  type_1">
						   <?php echo $culture_prokashona['notun_gan_badha'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       নতুন গান নির্মাণ
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['notun_gan_nirman'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ছড়া-কবিতার বই
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['chora_kobitar_boi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ম্যাগাজিন	
                       </td>
                       <td class="tg-0pky  type_2">
						   <?php echo $culture_prokashona['magazine'] ?>
                       </td>
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       নতুন সুরারোপ
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['notun_shurarop'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ভিজ্যুয়াল নাটক
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['visual_natok'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       শর্টফিল্ম নির্মাণ
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['shortflim_nirman'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       প্রচারপত্র
                       </td>
                       <td class="tg-0pky  type_2">
						   <?php echo $culture_prokashona['prochar_potro'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       নাটকের পাণ্ডুলিপি
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['natoker_pandulipi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       কবিতার পাণ্ডুলিপি
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['kobitar_pandulipi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       পুঁথি নির্মাণ
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['puthi_nirman'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       মঞ্চ নাটক
                       </td>
                       <td class="tg-0pky  type_2">
						   <?php echo $culture_prokashona['moncho_natok'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       চিত্রনাট্য পাণ্ডুলিপি
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['chitronatto_pandulipi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ভিডিও অ্যালবাম
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['video_album'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সাহিত্য পত্রিকা
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['sahitto_potrika'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ক্যালিওগ্রাফী
                       </td>
                       <td class="tg-0pky  type_2">
						   <?php echo $culture_prokashona['calligraphy'] ?>
                       </td>
                      
                      
                   </tr>
                 
                   
                   <tr>
                       <td class="tg-0pky  type_1">
                       নাটিকার পাণ্ডুলিপি 
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $culture_prokashona['natikar_pandulipi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অডিও অ্যালবাম
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $culture_prokashona['audio_album'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ক্যালেন্ডার
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $culture_prokashona['calender'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       চিত্রাংকন
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $culture_prokashona['chitrangkon'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       কৌতুকের পাণ্ডুলিপি 
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['koutuk_pandulipi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       গানের বই
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['ganer_boi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       স্মরণিকা/স্মারক
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['sharok'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অন্যান্য
                       </td>
                       <td class="tg-0pky  type_2">
                            <?php echo $culture_prokashona['onnano'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       শর্টফিল্ম পাণ্ডুলিপি
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['shortfilm_pandulipi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       নাটকের বই
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['natoker_boi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       দেয়ালিকা
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $culture_prokashona['deyalika'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_2">

                       </td>
                   </tr>

                </table>
                <table class="tg table table-header-rotated" id="testTable3">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>নিয়মিত প্রশিক্ষণ </b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Culture_নিয়মিত প্রশিক্ষণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>                   
                    <tr>
                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মোট উপস্থিতি</td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি  </td>
                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মোট উপস্থিতি</td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি  </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       সংগীত ক্লাস
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $shongit_class_num = $culture_regular_training['shongit_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $shongit_class_pre = $culture_regular_training['shongit_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo number_format(($shongit_class_pre!=0 && $shongit_class_num !=0)?$shongit_class_pre/$shongit_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অগ্রজ কুরআন ক্লাস
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $ogroj_quran_class_num = $culture_regular_training['ogroj_quran_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $ogroj_quran_class_pre = $culture_regular_training['ogroj_quran_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($ogroj_quran_class_pre!=0 && $ogroj_quran_class_num !=0)?$ogroj_quran_class_pre/$ogroj_quran_class_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       অভিনয় ক্লাস				
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $ovinoy_class_num = $culture_regular_training['ovinoy_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $ovinoy_class_pre = $culture_regular_training['ovinoy_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($ovinoy_class_pre!=0 && $ovinoy_class_num !=0)?$ovinoy_class_pre/$ovinoy_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অগ্রজ আলোচনা চক্র
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $ogroj_alochona_chokro_num = $culture_regular_training['ogroj_alochona_chokro_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $ogroj_alochona_chokro_pre = $culture_regular_training['ogroj_alochona_chokro_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($ogroj_alochona_chokro_pre!=0 && $ogroj_alochona_chokro_num !=0)?$ogroj_alochona_chokro_pre/$ogroj_alochona_chokro_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       আবৃত্তি-উপস্থাপনা ক্লাস				
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $abritti_presentation_class_num = $culture_regular_training['abritti_presentation_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $abritti_presentation_class_pre = $culture_regular_training['abritti_presentation_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($abritti_presentation_class_pre!=0 && $abritti_presentation_class_num !=0)?$abritti_presentation_class_pre/$abritti_presentation_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       উন্মেষ আলোচনা চক্র
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $unmesh_alochona_chokro_num = $culture_regular_training['unmesh_alochona_chokro_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $unmesh_alochona_chokro_pre = $culture_regular_training['unmesh_alochona_chokro_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($unmesh_alochona_chokro_pre!=0 && $unmesh_alochona_chokro_num !=0)?$unmesh_alochona_chokro_pre/$unmesh_alochona_chokro_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       ক্বিরাআত ক্লাস				
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $kirat_class_num = $culture_regular_training['kirat_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $kirat_class_pre = $culture_regular_training['kirat_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($kirat_class_pre!=0 && $kirat_class_num !=0)?$kirat_class_pre/$kirat_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সামষ্টিক পাঠ
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $shamoshtik_path_num = $culture_regular_training['shamoshtik_path_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $shamoshtik_path_pre = $culture_regular_training['shamoshtik_path_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($shamoshtik_path_pre!=0 && $shamoshtik_path_num !=0)?$shamoshtik_path_pre/$shamoshtik_path_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       রংতুলি ক্লাস				
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $rongtuli_class_num = $culture_regular_training['rongtuli_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $rongtuli_class_pre = $culture_regular_training['rongtuli_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($rongtuli_class_pre!=0 && $rongtuli_class_num !=0)?$rongtuli_class_pre/$rongtuli_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অনুষ্ঠান প্রস্তুতি ক্লাস
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $onushtha_prep_class_num = $culture_regular_training['onushtha_prep_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $onushtha_prep_class_pre = $culture_regular_training['onushtha_prep_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($onushtha_prep_class_pre!=0 && $onushtha_prep_class_num !=0)?$onushtha_prep_class_pre/$onushtha_prep_class_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       হস্তশিল্প (কারু) ক্লাস				
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $hostoshilpo_class_num = $culture_regular_training['hostoshilpo_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $hostoshilpo_class_pre = $culture_regular_training['hostoshilpo_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($hostoshilpo_class_pre!=0 && $hostoshilpo_class_num !=0)?$hostoshilpo_class_pre/$hostoshilpo_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       শব্বেদারী
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $shobbedari_num = $culture_regular_training['shobbedari_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $shobbedari_pre = $culture_regular_training['shobbedari_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($shobbedari_pre!=0 && $shobbedari_num !=0)?$shobbedari_pre/$shobbedari_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       ক্যালিওগ্রাফি ক্লাস				
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $calligraphy_class_num = $culture_regular_training['calligraphy_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $calligraphy_class_pre = $culture_regular_training['calligraphy_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($calligraphy_class_pre!=0 && $calligraphy_class_num !=0)?$calligraphy_class_pre/$calligraphy_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       টেকনিক্যাল/আইটি ক্লাস
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $it_class_num = $culture_regular_training['it_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $it_class_pre = $culture_regular_training['it_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($it_class_pre!=0 && $it_class_num !=0)?$it_class_pre/$it_class_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       স্থাপত্য শিল্প ক্লাস				
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $sthapotto_class_num = $culture_regular_training['sthapotto_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $sthapotto_class_pre = $culture_regular_training['sthapotto_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($sthapotto_class_pre!=0 && $sthapotto_class_num !=0)?$sthapotto_class_pre/$sthapotto_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অন্যান্য
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $other_num = $culture_regular_training['other_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $other_pre = $culture_regular_training['other_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($other_pre!=0 && $other_num !=0)?$other_pre/$other_num:0,2)?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-0pky  type_1">
                       ফ্যাশন ডিজাইন ক্লাস
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $fashion_class_num = $culture_regular_training['fashion_class_num'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo $fashion_class_pre = $culture_regular_training['fashion_class_pre'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                            <?php echo number_format(($fashion_class_pre!=0 && $fashion_class_num !=0)?$fashion_class_pre/$fashion_class_num:0,2)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                    </tr>
                </table>
                <table class="tg table table-header-rotated" id="testTable4">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>কর্মশালা </b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Culture_কর্মশালা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>            

                   <tr>
                     <td class="tg-pwj7" rowspan="">বিবরণ</td>
                       <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি</td>

                       <td class="tg-pwj7" rowspan="">বিবরণ</td>
                       <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1">  সঙ্গীত কর্মশালা 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shongit_workshop_num = $culture_workshop['shongit_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shongit_workshop_dur = $culture_workshop['shongit_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shongit_workshop_pre = $culture_workshop['shongit_workshop_pre'] ?>
                       </td>

                       <td class="tg-y698">শিশুতোষ সঙ্গীত কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shishutosh_shong_workshop_num = $culture_workshop['shishutosh_shong_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shishutosh_shong_workshop_dur = $culture_workshop['shishutosh_shong_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shishutosh_shong_workshop_pre = $culture_workshop['shishutosh_shong_workshop_pre'] ?>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">নাট্য কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $natto_workshop_num = $culture_workshop['natto_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $natto_workshop_dur = $culture_workshop['natto_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $natto_workshop_pre = $culture_workshop['natto_workshop_pre'] ?>
                       </td>

                       <td class="tg-y698">শিশুতোষ নাট্য কর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shishutosh_natto_workshop_num = $culture_workshop['shishutosh_natto_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shishutosh_natto_workshop_dur = $culture_workshop['shishutosh_natto_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shishutosh_natto_workshop_pre = $culture_workshop['shishutosh_natto_workshop_pre'] ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">আবৃত্তি উপস্থাপনা কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $abritti_workshop_num = $culture_workshop['abritti_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $abritti_workshop_dur = $culture_workshop['abritti_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $abritti_workshop_pre = $culture_workshop['abritti_workshop_pre'] ?>
                       </td>

                       <td class="tg-y698">টেকনিক্যাল কর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $technical_workshop_num = $culture_workshop['technical_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $technical_workshop_dur = $culture_workshop['technical_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $technical_workshop_pre = $culture_workshop['technical_workshop_pre'] ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ক্বিরাআত কর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kirat_workshop_num = $culture_workshop['kirat_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kirat_workshop_dur = $culture_workshop['kirat_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $kirat_workshop_pre = $culture_workshop['kirat_workshop_pre'] ?>
                       </td>

                       <td class="tg-y698">সাংস্কৃতিক কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $cultural_workshop_num = $culture_workshop['cultural_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $cultural_workshop_dur = $culture_workshop['cultural_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $cultural_workshop_pre = $culture_workshop['cultural_workshop_pre'] ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">অগ্রজ মানোন্নয়ন কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ogroj_man_workshop_num = $culture_workshop['ogroj_man_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ogroj_man_workshop_dur = $culture_workshop['ogroj_man_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $ogroj_man_workshop_pre = $culture_workshop['ogroj_man_workshop_pre'] ?>
                       </td>
                       
    
                       <td class="tg-y698">উন্মেষ মানোন্নয়ন কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $unmesh_man_workshop_num = $culture_workshop['unmesh_man_workshop_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $unmesh_man_workshop_dur = $culture_workshop['unmesh_man_workshop_dur'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $unmesh_man_workshop_pre = $culture_workshop['unmesh_man_workshop_pre'] ?>
                       </td>
              
                   
                   </tr>
                 

                </table>
                </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
