<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'অন্যান্য - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>

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
                                <td class="tg-pwj7" colspan="12"><b>সাংগঠনিক সফর সংক্রান্ত</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Other_সাংগঠনিক সফর সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">সদস্য সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3">সাথী সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3" >কর্মী সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3">সুধি সমাবেশ</td>
                                <td class="tg-pwj7" rowspan="3">কার্যকারী পরিষদ সদস্য উপস্থিতি ছিলেন কতটি</td>
                                <td class="tg-pwj7" rowspan="3" >কার্যকারী পরিষদ অন্যান্য দায়িত্বশীল উপস্থিতি ছিলেন কতটি </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7"  rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7"  colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্য</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>

                               
                            </tr>


                            <?php
                                $pk = (isset($other_shang_sofor['id']))?$other_shang_sofor['id']:'';
                            ?>

                            <tr>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shod_shomabesh_num" data-title="Enter">
                                        <?php echo $shod_shomabesh_num =  (isset($other_shang_sofor['shod_shomabesh_num'])) ? $other_shang_sofor['shod_shomabesh_num'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shod_shomabesh_pre" data-title="Enter">
                                        <?php echo $shod_shomabesh_pre =  (isset($other_shang_sofor['shod_shomabesh_pre'])) ? $other_shang_sofor['shod_shomabesh_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($shod_shomabesh_pre!=0 && $shod_shomabesh_num !=0 )?($shod_shomabesh_pre/$shod_shomabesh_num):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_shomabesh_num" data-title="Enter">
                                        <?php echo $sathi_shomabesh_num =  (isset($other_shang_sofor['sathi_shomabesh_num'])) ? $other_shang_sofor['sathi_shomabesh_num'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_shomabesh_pre" data-title="Enter">
                                        <?php echo $sathi_shomabesh_pre =  (isset($other_shang_sofor['sathi_shomabesh_pre'])) ? $other_shang_sofor['sathi_shomabesh_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($sathi_shomabesh_pre!=0 && $sathi_shomabesh_num !=0 )?($sathi_shomabesh_pre/$sathi_shomabesh_num):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_shomabesh_num" data-title="Enter">
                                        <?php echo $kormi_shomabesh_num =  (isset($other_shang_sofor['kormi_shomabesh_num'])) ? $other_shang_sofor['kormi_shomabesh_num'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_shomabesh_pre" data-title="Enter">
                                        <?php echo $kormi_shomabesh_pre =  (isset($other_shang_sofor['kormi_shomabesh_pre'])) ? $other_shang_sofor['kormi_shomabesh_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($kormi_shomabesh_pre!=0 && $kormi_shomabesh_num !=0 )?($kormi_shomabesh_pre/$kormi_shomabesh_num):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shudhi_shomabesh_num" data-title="Enter">
                                        <?php echo $shudhi_shomabesh_num =  (isset($other_shang_sofor['shudhi_shomabesh_num'])) ? $other_shang_sofor['shudhi_shomabesh_num'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shudhi_shomabesh_pre" data-title="Enter">
                                        <?php echo $shudhi_shomabesh_pre =  (isset($other_shang_sofor['shudhi_shomabesh_pre'])) ? $other_shang_sofor['shudhi_shomabesh_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($shudhi_shomabesh_pre!=0 && $shudhi_shomabesh_num !=0 )?($shudhi_shomabesh_pre/$shudhi_shomabesh_num):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="cup_pre_num" data-title="Enter">
                                        <?php echo $cup_pre_num =  (isset($other_shang_sofor['cup_pre_num'])) ? $other_shang_sofor['cup_pre_num'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="other_shang_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="cup_other_pre_num" data-title="Enter">
                                        <?php echo $cup_other_pre_num =  (isset($other_shang_sofor['cup_other_pre_num'])) ? $other_shang_sofor['cup_other_pre_num'] : 0; ?>
                                    </a>
                                </td>
                           
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>এ সেশনে বৃদ্ধিকৃত ওয়ার্ড/ ইউনিয়নের নাম</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Other_এ সেশনে বৃদ্ধিকৃত ওয়ার্ড/ ইউনিয়নের নাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-e-briddhi-ward/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">ওয়ার্ড/ ইউনিয়নের নাম</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> Actions </span></div></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য		</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_e_briddhi_ward->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                 
                                    <td class="tg-0pky type_1"><?php echo $row['ward_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-e-briddhi-ward/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_e_briddhi_ward@".$row['ward_name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>এ সেশনে ঘাটতিকৃত ওয়ার্ড/ইউনিয়নের নাম</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Other_এ সেশনে ঘাটতিকৃত ওয়ার্ড/ইউনিয়নের নাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-e-ghatti-ward/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                
                                <td class="tg-pwj7" rowspan="2">ওয়ার্ড/ ইউনিয়নের নাম</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2" >ঘাটতির কারণ</td>
                                <td class="tg-pwj7 " rowspan="2" ><div><span> Actions </span></div></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য		</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_e_ghatti_ward->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                          
                                    <td class="tg-0pky type_1"><?php echo $row['ward_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ghattir_karon'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-e-ghatti-ward/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_e_ghatti_ward@".$row['ward_name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>এ সেশনে বৃদ্ধিকৃত থানার নাম</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Other_এ সেশনে বৃদ্ধিকৃত থানার নাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-e-briddhi-thana/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                      
                                <td class="tg-pwj7" rowspan="2">থানার নাম</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7 " rowspan="2" ><div><span> Actions </span></div></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য		</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_e_briddhi_thana->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    
                                    <td class="tg-0pky type_1"><?php echo $row['thana_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-e-briddhi-thana/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_e_briddhi_thana@".$row['thana_name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>এ সেশনে ঘাটতিকৃত থানার নাম</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Other_এ সেশনে ঘাটতিকৃত থানার নাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-e-ghatti-thana/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                               
                                <td class="tg-pwj7" rowspan="2">থানার নাম</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2" >ঘাটতির কারণ</td>
                                <td class="tg-pwj7 " rowspan="2" ><div><span> Actions </span></div></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য		</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_e_ghatti_thana->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                  
                                    <td class="tg-0pky type_1"><?php echo $row['thana_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ghattir_karon'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-e-ghatti-thana/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_e_ghatti_thana@".$row['thana_name']."@".$row['id'] ?>'>Delete</button>
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

<style type="text/css">
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
.action_class{
    color:white;
}
.action_class:hover{
    color:white;
    text-decoration:none;
}
</style>

<script>

$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.fn.editable.defaults.ajaxOptions = {type: "get"}
$('#shaka_shompadok').editable({
    value: <?php echo (isset( $other_biggan_shompadok['shaka_shompadok']))? $other_biggan_shompadok['shaka_shompadok']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    },
       headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
});

$('#biggan_shompadok').editable({
    value: <?php echo (isset( $other_biggan_shompadok['biggan_shompadok']))? $other_biggan_shompadok['biggan_shompadok']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

$('#biggan_comittee_gothon').editable({
    value: <?php echo (isset( $other_biggan_magazine_circulation['biggan_comittee_gothon']))? $other_biggan_magazine_circulation['biggan_comittee_gothon']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

});

</script>
<script>

$(document).ready(function(){	
  $("button").on('click',function(){
      console.log("ok");
    var id=$(this).attr('id').split("@");
    var close_tr=$(this).closest('tr');
    if(id[0]=='delete' && confirm("আপনি কি কলামটি মুছে ফেলবেন?" ))
    {
        $.ajax({
        type: "GET",
        token: "<?php echo $this->security->get_csrf_token_name(); ?>",
        url:  "<?php echo admin_url('departmentsreport/delete-row') ?>",
        data: {
            'id':id[3],
            'table':id[1]
        },
        cache: false,
        success: function(data){
            console.log(data);
           close_tr.remove();
        }
        });
    }
    
  });
});

</script>
