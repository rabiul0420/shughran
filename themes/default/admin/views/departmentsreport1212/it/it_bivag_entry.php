<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'তথ্যপ্রযুক্তি ও সোশ্যাল মিডিয়া বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                   
                </li>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
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
<style type="text/css">
    #export_all_table{
        cursor: pointer;
    }
</style>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                            <td class="tg-pwj7" colspan="7"><b>জনশক্তি ও রিসোর্স<b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'IT_জনশক্তি ও রিসোর্স_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        <tr>
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                             
                                
                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>পিসি/ল্যাপটপ <br> আছে  </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>এন্ড্রয়েড ফোন <br> আছে</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ইন্টারনেট <br> আছে </span></div></td>
                                <td class="tg-pwj7" colspan="2">নিয়মিত ব্লগ লেখেন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ফেসবুক <br> ক্যাম্পেইন করেন </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>টুইটার <br> ক্যাম্পেইন করেন</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>CSE তে <br> অধ্যয়নরত</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  বাংলা  </span></div></td>
                                <td class="tg-pwj7 "><div><span> ইংরেজি</span></div></td>
                              
                         
                        
                               
                            </tr>


                            <?php
                            $pk = (isset($it_jonoshoktiorisors['id']))?$it_jonoshoktiorisors['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_s" data-title="Enter"><?php echo $sod_s =  (isset( $it_jonoshoktiorisors['sod_s']))? $it_jonoshoktiorisors['sod_s']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_pltpa" data-title="Enter"><?php echo $sod_pltpa =  (isset( $it_jonoshoktiorisors['sod_pltpa']))? $it_jonoshoktiorisors['sod_pltpa']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_adphna" data-title="Enter"><?php echo $sod_adphna =  (isset( $it_jonoshoktiorisors['sod_adphna']))? $it_jonoshoktiorisors['sod_adphna']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_ena" data-title="Enter"><?php echo $sod_ena =  (isset( $it_jonoshoktiorisors['sod_ena']))? $it_jonoshoktiorisors['sod_ena']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_nmble_enrj" data-title="Enter"><?php echo $sod_nmble_enrj =  (isset( $it_jonoshoktiorisors['sod_nmble_enrj']))? $it_jonoshoktiorisors['sod_nmble_enrj']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_nmble_bnl" data-title="Enter"><?php echo $sod_nmble_bnl =  (isset( $it_jonoshoktiorisors['sod_nmble_bnl']))? $it_jonoshoktiorisors['sod_nmble_bnl']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_fbkpk" data-title="Enter"><?php echo $sod_fbkpk =  (isset( $it_jonoshoktiorisors['sod_fbkpk']))? $it_jonoshoktiorisors['sod_fbkpk']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_tutkpk" data-title="Enter"><?php echo $sod_tutkpk =  (isset( $it_jonoshoktiorisors['sod_tutkpk']))? $it_jonoshoktiorisors['sod_tutkpk']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_itap" data-title="Enter"><?php echo $sod_itap =  (isset( $it_jonoshoktiorisors['sod_itap']))? $it_jonoshoktiorisors['sod_itap']:0; ?></a>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_s" data-title="Enter"><?php echo $sat_s =  (isset( $it_jonoshoktiorisors['sat_s']))? $it_jonoshoktiorisors['sat_s']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_pltpa" data-title="Enter"><?php echo $sat_pltpa =  (isset( $it_jonoshoktiorisors['sat_pltpa']))? $it_jonoshoktiorisors['sat_pltpa']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_adphna" data-title="Enter"><?php echo $sat_adphna =  (isset( $it_jonoshoktiorisors['sat_adphna']))? $it_jonoshoktiorisors['sat_adphna']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_ena" data-title="Enter"><?php echo $sat_ena =  (isset( $it_jonoshoktiorisors['sat_ena']))? $it_jonoshoktiorisors['sat_ena']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_nmble_enrj" data-title="Enter"><?php echo $sat_nmble_enrj =  (isset( $it_jonoshoktiorisors['sat_nmble_enrj']))? $it_jonoshoktiorisors['sat_nmble_enrj']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_nmble_bnl" data-title="Enter"><?php echo $sat_nmble_bnl =  (isset( $it_jonoshoktiorisors['sat_nmble_bnl']))? $it_jonoshoktiorisors['sat_nmble_bnl']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_fbkpk" data-title="Enter"><?php echo $sat_fbkpk =  (isset( $it_jonoshoktiorisors['sat_fbkpk']))? $it_jonoshoktiorisors['sat_fbkpk']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_tutkpk" data-title="Enter"><?php echo $sat_tutkpk =  (isset( $it_jonoshoktiorisors['sat_tutkpk']))? $it_jonoshoktiorisors['sat_tutkpk']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_itap" data-title="Enter"><?php echo $sat_itap =  (isset( $it_jonoshoktiorisors['sat_itap']))? $it_jonoshoktiorisors['sat_itap']:0; ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_s" data-title="Enter"><?php echo $kor_s =  (isset( $it_jonoshoktiorisors['kor_s']))? $it_jonoshoktiorisors['kor_s']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_pltpa" data-title="Enter"><?php echo $kor_pltpa =  (isset( $it_jonoshoktiorisors['kor_pltpa']))? $it_jonoshoktiorisors['kor_pltpa']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_adphna" data-title="Enter"><?php echo $kor_adphna =  (isset( $it_jonoshoktiorisors['kor_adphna']))? $it_jonoshoktiorisors['kor_adphna']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_ena" data-title="Enter"><?php echo $kor_ena =  (isset( $it_jonoshoktiorisors['kor_ena']))? $it_jonoshoktiorisors['kor_ena']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_nmble_enrj" data-title="Enter"><?php echo $kor_nmble_enrj =  (isset( $it_jonoshoktiorisors['kor_nmble_enrj']))? $it_jonoshoktiorisors['kor_nmble_enrj']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_nmble_bnl" data-title="Enter"><?php echo $kor_nmble_bnl =  (isset( $it_jonoshoktiorisors['kor_nmble_bnl']))? $it_jonoshoktiorisors['kor_nmble_bnl']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_fbkpk" data-title="Enter"><?php echo $kor_fbkpk =  (isset( $it_jonoshoktiorisors['kor_fbkpk']))? $it_jonoshoktiorisors['kor_fbkpk']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_tutkpk" data-title="Enter"><?php echo $kor_tutkpk =  (isset( $it_jonoshoktiorisors['kor_tutkpk']))? $it_jonoshoktiorisors['kor_tutkpk']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_itap" data-title="Enter"><?php echo $kor_itap =  (isset( $it_jonoshoktiorisors['kor_itap']))? $it_jonoshoktiorisors['kor_itap']:0; ?></a>
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
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'IT_জনশক্তির দক্ষতা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        <tr>
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                             
                                
                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> ওয়ার্ড </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> এক্সেল </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> পাওয়ারপয়ন্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ভিডিও <br> এডিটিং </span></div></td>
                                <td class="tg-pwj7" colspan="2">গ্রাফিক ডিজাইন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ওয়েব <br> ডেভেলপম্যান্ট </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> অ্যাপ <br> ডেভেলপম্যান্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>আইটি এক্সপার্ট</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  ফটোশপ  </span></div></td>
                                <td class="tg-pwj7 "><div><span> ইলাস্ট্রেটর</span></div></td>
                              
                         
                        
                               
                            </tr>


                            <?php
                            $pk = (isset($it_dept_jonoshoktir_dokkhota['id']))?$it_dept_jonoshoktir_dokkhota['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mio" data-title="Enter"><?php echo $sod_mio =  (isset( $it_dept_jonoshoktir_dokkhota['sod_mio']))? $it_dept_jonoshoktir_dokkhota['sod_mio']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_miax" data-title="Enter"><?php echo $sod_miax =  (isset( $it_dept_jonoshoktir_dokkhota['sod_miax']))? $it_dept_jonoshoktir_dokkhota['sod_miax']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mipp" data-title="Enter"><?php echo $sod_mipp =  (isset( $it_dept_jonoshoktir_dokkhota['sod_mipp']))? $it_dept_jonoshoktir_dokkhota['sod_mipp']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_vdoe" data-title="Enter"><?php echo $sod_vdoe =  (isset( $it_dept_jonoshoktir_dokkhota['sod_vdoe']))? $it_dept_jonoshoktir_dokkhota['sod_vdoe']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_gdp" data-title="Enter"><?php echo $sod_gdp =  (isset( $it_dept_jonoshoktir_dokkhota['sod_gdp']))? $it_dept_jonoshoktir_dokkhota['sod_gdp']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_gde" data-title="Enter"><?php echo $sod_gde =  (isset( $it_dept_jonoshoktir_dokkhota['sod_gde']))? $it_dept_jonoshoktir_dokkhota['sod_gde']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_web" data-title="Enter"><?php echo $sod_web =  (isset( $it_dept_jonoshoktir_dokkhota['sod_web']))? $it_dept_jonoshoktir_dokkhota['sod_web']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_app" data-title="Enter"><?php echo $sod_app =  (isset( $it_dept_jonoshoktir_dokkhota['sod_app']))? $it_dept_jonoshoktir_dokkhota['sod_app']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_it" data-title="Enter"><?php echo $sod_it =  (isset( $it_dept_jonoshoktir_dokkhota['sod_it']))? $it_dept_jonoshoktir_dokkhota['sod_it']:0; ?></a>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mio" data-title="Enter"><?php echo $sat_mio =  (isset( $it_dept_jonoshoktir_dokkhota['sat_mio']))? $it_dept_jonoshoktir_dokkhota['sat_mio']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_miax" data-title="Enter"><?php echo $sat_miax =  (isset( $it_dept_jonoshoktir_dokkhota['sat_miax']))? $it_dept_jonoshoktir_dokkhota['sat_miax']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mipp" data-title="Enter"><?php echo $sat_mipp =  (isset( $it_dept_jonoshoktir_dokkhota['sat_mipp']))? $it_dept_jonoshoktir_dokkhota['sat_mipp']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_vdoe" data-title="Enter"><?php echo $sat_vdoe =  (isset( $it_dept_jonoshoktir_dokkhota['sat_vdoe']))? $it_dept_jonoshoktir_dokkhota['sat_vdoe']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_gdp" data-title="Enter"><?php echo $sat_gdp =  (isset( $it_dept_jonoshoktir_dokkhota['sat_gdp']))? $it_dept_jonoshoktir_dokkhota['sat_gdp']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_gde" data-title="Enter"><?php echo $sat_gde =  (isset( $it_dept_jonoshoktir_dokkhota['sat_gde']))? $it_dept_jonoshoktir_dokkhota['sat_gde']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_web" data-title="Enter"><?php echo $sat_web =  (isset( $it_dept_jonoshoktir_dokkhota['sat_web']))? $it_dept_jonoshoktir_dokkhota['sat_web']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_app" data-title="Enter"><?php echo $sat_app =  (isset( $it_dept_jonoshoktir_dokkhota['sat_app']))? $it_dept_jonoshoktir_dokkhota['sat_app']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_it" data-title="Enter"><?php echo $sat_it =  (isset( $it_dept_jonoshoktir_dokkhota['sat_it']))? $it_dept_jonoshoktir_dokkhota['sat_it']:0; ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mio" data-title="Enter"><?php echo $kor_mio =  (isset( $it_dept_jonoshoktir_dokkhota['kor_mio']))? $it_dept_jonoshoktir_dokkhota['kor_mio']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_miax" data-title="Enter"><?php echo $kor_miax =  (isset( $it_dept_jonoshoktir_dokkhota['kor_miax']))? $it_dept_jonoshoktir_dokkhota['kor_miax']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mipp" data-title="Enter"><?php echo $kor_mipp =  (isset( $it_dept_jonoshoktir_dokkhota['kor_mipp']))? $it_dept_jonoshoktir_dokkhota['kor_mipp']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_vdoe" data-title="Enter"><?php echo $kor_vdoe =  (isset( $it_dept_jonoshoktir_dokkhota['kor_vdoe']))? $it_dept_jonoshoktir_dokkhota['kor_vdoe']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_gdp" data-title="Enter"><?php echo $kor_gdp =  (isset( $it_dept_jonoshoktir_dokkhota['kor_gdp']))? $it_dept_jonoshoktir_dokkhota['kor_gdp']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_gde" data-title="Enter"><?php echo $kor_gde =  (isset( $it_dept_jonoshoktir_dokkhota['kor_gde']))? $it_dept_jonoshoktir_dokkhota['kor_gde']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_web" data-title="Enter"><?php echo $kor_web =  (isset( $it_dept_jonoshoktir_dokkhota['kor_web']))? $it_dept_jonoshoktir_dokkhota['kor_web']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_app" data-title="Enter"><?php echo $kor_app =  (isset( $it_dept_jonoshoktir_dokkhota['kor_app']))? $it_dept_jonoshoktir_dokkhota['kor_app']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_it" data-title="Enter"><?php echo $kor_it =  (isset( $it_dept_jonoshoktir_dokkhota['kor_it']))? $it_dept_jonoshoktir_dokkhota['kor_it']:0; ?></a>
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

                           
                            </tr>




                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                        <tr>
                        <td class="tg-pwj7" colspan="7"><b>শাখার অনলাইন রিসোর্স<b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'IT_শাখার অনলাইন রিসোর্স_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php
                            $pk = (isset($it_dept_shakhar_online_risors['id']))?$it_dept_shakhar_online_risors['id']:'';
                            ?>

                            
                            <tr>
                                <td class="tg-y698 type_1">সংখ্যা</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_ose_bm" data-title="Enter"><?php echo $s_ose_bm =  (isset( $it_dept_shakhar_online_risors['s_ose_bm']))? $it_dept_shakhar_online_risors['s_ose_bm']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_ose_br" data-title="Enter"><?php echo $s_ose_br =  (isset( $it_dept_shakhar_online_risors['s_ose_br']))? $it_dept_shakhar_online_risors['s_ose_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_fbpj_bm" data-title="Enter"><?php echo $s_fbpj_bm =  (isset( $it_dept_shakhar_online_risors['s_fbpj_bm']))? $it_dept_shakhar_online_risors['s_fbpj_bm']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_fbpj_br" data-title="Enter"><?php echo $s_fbpj_br =  (isset( $it_dept_shakhar_online_risors['s_fbpj_br']))? $it_dept_shakhar_online_risors['s_fbpj_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_tuta_bm" data-title="Enter"><?php echo $s_tuta_bm =  (isset( $it_dept_shakhar_online_risors['s_tuta_bm']))? $it_dept_shakhar_online_risors['s_tuta_bm']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_tuta_br" data-title="Enter"><?php echo $s_tuta_br =  (isset( $it_dept_shakhar_online_risors['s_tuta_br']))? $it_dept_shakhar_online_risors['s_tuta_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_youtub_bm" data-title="Enter"><?php echo $s_youtub_bm =  (isset( $it_dept_shakhar_online_risors['s_youtub_bm']))? $it_dept_shakhar_online_risors['s_youtub_bm']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_youtub_br" data-title="Enter"><?php echo $s_youtub_br =  (isset( $it_dept_shakhar_online_risors['s_youtub_br']))? $it_dept_shakhar_online_risors['s_youtub_br']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="it_dept_shakhar_online_risors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_onnoannososhal" data-title="Enter"><?php echo $s_onnoannososhal =  (isset( $it_dept_shakhar_online_risors['s_onnoannososhal']))? $it_dept_shakhar_online_risors['s_onnoannososhal']:'' ?></a>
                                </td>
                               
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'IT_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($it_training_program['id']))?$it_training_program['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                          <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                          <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                          <td class="tg-pwj7" colspan=''>গড়</td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $it_training_program['shikkha_central_s']))? $it_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $it_training_program['shikkha_central_p']))? $it_training_program['shikkha_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                          {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $it_training_program['shikkha_shakha_s']))? $it_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $it_training_program['shikkha_shakha_p']))? $it_training_program['shikkha_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                          {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $it_training_program['kormoshala_central_s']))? $it_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $it_training_program['kormoshala_central_p']))? $it_training_program['kormoshala_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                          {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $it_training_program['kormoshala_shakha_s']))? $it_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="it_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $it_training_program['kormoshala_shakha_p']))? $it_training_program['kormoshala_shakha_p']:'' ?>
                              </a>
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
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'IT_প্রশিক্ষণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            $pk = (isset($it_proshikkhon['id']))?$it_proshikkhon['id']:'';
                            $total_s=0;
                            $total_upthi=0;
                            ?>


                   <tr>
                       <td class="tg-y698 type_1">বেসিক কম্পিউটার 	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bscmput_s" data-title="Enter">
                            <?php echo $bscmput_s =  (isset( $it_proshikkhon['bscmput_s']))? $it_proshikkhon['bscmput_s']:0; $total_s=$total_s+$bscmput_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bscmput_upthi" data-title="Enter">
                            <?php echo $bscmput_upthi =  (isset( $it_proshikkhon['bscmput_upthi']))? $it_proshikkhon['bscmput_upthi']:0; $total_upthi=$total_upthi+$bscmput_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ফটোশপ	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="msford_s" data-title="Enter">
                            <?php echo $msford_s =  (isset( $it_proshikkhon['msford_s']))? $it_proshikkhon['msford_s']:0; $total_s=$total_s+ $msford_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="msford_upthi" data-title="Enter">
                            <?php echo $msford_upthi =  (isset( $it_proshikkhon['msford_upthi']))? $it_proshikkhon['msford_upthi']:0; $total_upthi=$total_upthi+ $msford_upthi; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msford_s!=0)?($msford_upthi/$msford_s):0?>
                       </td>
                      
                       
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1">বেসিক মোবাইল (অ্যান্ড্রোয়েড) 	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bsmobile_s" data-title="Enter">
                            <?php echo $bsmobile_s =  (isset( $it_proshikkhon['bsmobile_s']))? $it_proshikkhon['bsmobile_s']:0; $total_s=$total_s+ $bsmobile_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bsmobile_upthi" data-title="Enter">
                            <?php echo $bsmobile_upthi =  (isset( $it_proshikkhon['bsmobile_upthi']))? $it_proshikkhon['bsmobile_upthi']:0; $total_upthi=$total_upthi+$bsmobile_upthi; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bsmobile_s!=0)?($bsmobile_upthi/$bsmobile_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ইলাস্ট্রেটর	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="eltt_s" data-title="Enter">
                            <?php echo $eltt_s =  (isset( $it_proshikkhon['eltt_s']))? $it_proshikkhon['eltt_s']:0; $total_s=$total_s+ $eltt_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="eltt_upthi" data-title="Enter">
                            <?php echo $eltt_upthi =  (isset( $it_proshikkhon['eltt_upthi']))? $it_proshikkhon['eltt_upthi']:0; $total_upthi=$total_upthi+ $eltt_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($eltt_s!=0)?($eltt_upthi/$eltt_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> মাইক্রোসফট ওয়ার্ড 	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="msword_s" data-title="Enter">
                            <?php echo $msword_s =  (isset( $it_proshikkhon['msword_s']))? $it_proshikkhon['msword_s']:0; $total_s=$total_s+$msword_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="msword_upthi" data-title="Enter">
                            <?php echo $msword_upthi =  (isset( $it_proshikkhon['msword_upthi']))? $it_proshikkhon['msword_upthi']:0; $total_upthi=$total_upthi+$msword_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msword_s!=0)?($msword_upthi/$msword_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ভিডিও এডিটিং	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="video_s" data-title="Enter">
                            <?php echo $video_s =  (isset( $it_proshikkhon['video_s']))? $it_proshikkhon['video_s']:0; $total_s=$total_s+ $video_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="video_upthi" data-title="Enter">
                            <?php echo $video_upthi =  (isset( $it_proshikkhon['video_upthi']))? $it_proshikkhon['video_upthi']:0; $total_upthi=$total_upthi+$video_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($video_s!=0)?($video_upthi/$video_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">মাইক্রোসফট এক্সেল	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="msfexl_s" data-title="Enter">
                            <?php echo $msfexl_s =  (isset( $it_proshikkhon['msfexl_s']))? $it_proshikkhon['msfexl_s']:0; $total_s=$total_s+  $msfexl_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="msfexl_upthi" data-title="Enter">
                            <?php echo $msfexl_upthi =  (isset( $it_proshikkhon['msfexl_upthi']))? $it_proshikkhon['msfexl_upthi']:0; $total_upthi=$total_upthi+ $msfexl_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msfexl_s!=0)?($msfexl_upthi/$msfexl_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ওয়েব ডেভেলপমেন্ট	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="web_s" data-title="Enter">
                            <?php echo $web_s =  (isset( $it_proshikkhon['web_s']))? $it_proshikkhon['web_s']:0; $total_s=$total_s+$web_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="web_upthi" data-title="Enter">
                            <?php echo $web_upthi =  (isset( $it_proshikkhon['web_upthi']))? $it_proshikkhon['web_upthi']:0; $total_upthi=$total_upthi+$web_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($web_s!=0)?($web_upthi/$web_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">  মাইক্রোসফট পাওয়ারপয়েন্ট</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="pwrp_s" data-title="Enter">
                            <?php echo $pwrp_s =  (isset( $it_proshikkhon['pwrp_s']))? $it_proshikkhon['pwrp_s']:0; $total_s=$total_s+ $pwrp_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="pwrp_upthi" data-title="Enter">
                            <?php echo $pwrp_upthi =  (isset( $it_proshikkhon['pwrp_upthi']))? $it_proshikkhon['pwrp_upthi']:0; $total_upthi=$total_upthi+ $pwrp_upthi; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($pwrp_s!=0)?($pwrp_upthi/$pwrp_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অ্যাপ ডেভেলপমেন্ট  </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="apsdpm_s" data-title="Enter">
                            <?php echo $apsdpm_s =  (isset( $it_proshikkhon['apsdpm_s']))? $it_proshikkhon['apsdpm_s']:0; $total_s=$total_s+$apsdpm_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="apsdpm_upthi" data-title="Enter">
                            <?php echo $apsdpm_upthi =  (isset( $it_proshikkhon['apsdpm_upthi']))? $it_proshikkhon['apsdpm_upthi']:0; $total_upthi=$total_upthi+$apsdpm_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($apsdpm_s!=0)?($apsdpm_upthi/$apsdpm_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ফেসবুক	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="fb_s" data-title="Enter">
                            <?php echo $fb_s =  (isset( $it_proshikkhon['fb_s']))? $it_proshikkhon['fb_s']:0; $total_s=$total_s+ $fb_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="fb_upthi" data-title="Enter">
                            <?php echo $fb_upthi =  (isset( $it_proshikkhon['fb_upthi']))? $it_proshikkhon['fb_upthi']:0; $total_upthi=$total_upthi+$fb_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($fb_s!=0)?($fb_upthi/$fb_s):0?>
                       </td>

                       <td class="tg-y698 type_1">বেসিক ইন্টারনেট</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bsicint_s" data-title="Enter">
                            <?php echo $bsicint_s =  (isset( $it_proshikkhon['bsicint_s']))? $it_proshikkhon['bsicint_s']:0; $total_s=$total_s+$bsicint_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bsicint_upthi" data-title="Enter">
                            <?php echo $bsicint_upthi =  (isset( $it_proshikkhon['bsicint_upthi']))? $it_proshikkhon['bsicint_upthi']:0; $total_upthi=$total_upthi+ $bsicint_upthi; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bsicint_s!=0)?($bsicint_upthi/$bsicint_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> টুইটার	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="tutr_s" data-title="Enter">
                            <?php echo $tutr_s =  (isset( $it_proshikkhon['tutr_s']))? $it_proshikkhon['tutr_s']:0; $total_s=$total_s+ $tutr_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="tutr_upthi" data-title="Enter">
                            <?php echo $tutr_upthi =  (isset( $it_proshikkhon['tutr_upthi']))? $it_proshikkhon['tutr_upthi']:0; $total_upthi=$total_upthi+ $tutr_upthi; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($tutr_s!=0)?($tutr_upthi/$tutr_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অনলাইন নিরাপত্তা	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="onlinept_s" data-title="Enter">
                            <?php echo $onlinept_s =  (isset( $it_proshikkhon['onlinept_s']))? $it_proshikkhon['onlinept_s']:0; $total_s=$total_s+$onlinept_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="onlinept_upthi" data-title="Enter">
                            <?php echo $onlinept_upthi =  (isset( $it_proshikkhon['onlinept_upthi']))? $it_proshikkhon['onlinept_upthi']:0; $total_upthi=$total_upthi+ $onlinept_upthi; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($onlinept_s!=0)?($onlinept_upthi/$onlinept_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ব্লগ (বাংলা/ ইংরেজি )	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bgbe_s" data-title="Enter">
                            <?php echo $bgbe_s =  (isset( $it_proshikkhon['bgbe_s']))? $it_proshikkhon['bgbe_s']:0; $total_s=$total_s+$bgbe_s ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="bgbe_upthi" data-title="Enter">
                            <?php echo $bgbe_upthi =  (isset( $it_proshikkhon['bgbe_upthi']))? $it_proshikkhon['bgbe_upthi']:0; $total_upthi=$total_upthi+$bgbe_upthi ; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bgbe_s!=0)?($bgbe_upthi/$bgbe_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অনলাইন নীতিমালা	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="onlineni_s" data-title="Enter">
                            <?php echo $onlineni_s =  (isset( $it_proshikkhon['onlineni_s']))? $it_proshikkhon['onlineni_s']:0; $total_s=$total_s+ $onlineni_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="onlineni_upthi" data-title="Enter">
                            <?php echo $onlineni_upthi =  (isset( $it_proshikkhon['onlineni_upthi']))? $it_proshikkhon['onlineni_upthi']:0; $total_upthi=$total_upthi+ $onlineni_upthi; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($onlineni_s!=0)?($onlineni_upthi/$onlineni_s):0?>
                       </td>
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> উইকিপিডিয়া	</td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="ukp_s" data-title="Enter">
                            <?php echo $ukp_s =  (isset( $it_proshikkhon['ukp_s']))? $it_proshikkhon['ukp_s']:0; $total_s=$total_s+ $ukp_s; ?>
                        </a>
                        </td>
                       <td class="tg-0pky  type_9">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="it_proshikkhon" data-pk="<?php echo $pk ?>" 
                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="ukp_upthi" data-title="Enter">
                            <?php echo $ukp_upthi =  (isset( $it_proshikkhon['ukp_upthi']))? $it_proshikkhon['ukp_upthi']:0; $total_upthi=$total_upthi+$ukp_upthi ; ?>
                        </a>
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

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
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
