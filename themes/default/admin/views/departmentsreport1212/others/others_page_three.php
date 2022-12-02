<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }
	
	 
     .manpower_link {
    cursor: pointer;
}
</style>


<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'অন্যান্য - পেইজ ০৩ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
			
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/others-page-three') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/others-page-three/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                </style>
                <div class="tg-wrap">
                <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>উপশাখা মজবুতিকরণ সংক্রান্ত</b>
                                </td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Other_উপশাখা মজবুতিকরণ সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">মোট উপশাখা সংখ্যা </td>
                                <td class="tg-pwj7" rowspan="">বর্তমান সক্রিয় উপশাখা</td>
                                <td class="tg-pwj7" rowspan="">দুর্বল উপশাখার মধ্যে এ বছর সক্রিয় হয়েছে কতটি </td>
                                <td class="tg-pwj7" colspan="" >উপশাখা এখনো দুর্বল আছে কতটি</td>
                               
                            </tr>
                            <tr>
                                <td class="tg-0pky type_1">
                                    <?php echo $total_uposakha = $total_other_uposhakha_mojbuti['total_uposakha'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $bortoman_shokriyo = $total_other_uposhakha_mojbuti['bortoman_shokriyo'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $durbol_shokriyou_hoyeche = $total_other_uposhakha_mojbuti['durbol_shokriyou_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $durbol_ache = $total_other_uposhakha_mojbuti['durbol_ache'] ?>
                                </td>
                              
                            </tr>
                        
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b>এ সেশনে উপশাখা বৃদ্ধি</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Other_এ সেশনে উপশাখা বৃদ্ধি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan="2">উপশাখার নাম</td>
                                <td class="tg-pwj7" rowspan="2">প্রাতিষ্ঠানিক/আবাসিক</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির র্বতমান সংখ্যা</td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য		</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($total_other_e_uposhakha_briddhi->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['uposhakhar_nam'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['abashik_pratishthanik'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shodossho'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sathi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['kormi'] ?>       
                                    </td>
            
                                
                                </tr>

                        <?php } ?>
                        </table>
     
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>এ সেশনে ঘাটতিকৃত উপশাখার নাম</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Other_এ সেশনে ঘাটতিকৃত উপশাখার নাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan="2">উপশাখার নাম</td>
                                <td class="tg-pwj7" rowspan="2">প্রাতিষ্ঠানিক/আবাসিক</td>
                                <td class="tg-pwj7" colspan="3" >জনশক্তির র্বতমান সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2" >ঘাটতির কারণ</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সদস্য</td>
                                <td class="tg-pwj7" colspan="">সাথী</td>
                                <td class="tg-pwj7" colspan="">কর্মী</td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($total_other_e_uposhakha_ghatti->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['uposhakhar_nam'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['abashik_pratishthanik'] ?>	</td>
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
            
                                
                                </tr>

                        <?php } ?>
                        </table>
                        
                       
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-izx2 {
        border-color: black;
        background-color: #efefef;
        text-align: left
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
        text-align: center
    }
    .tg .tg-0pky {
        border-color: black;
        text-align: center;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    @media screen and (max-width: 767px) {
        .tg {
            width: auto !important;
        }

        .tg col {
            width: auto !important;
        }

        .tg-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
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

    .table-header-rotated td.rotate>div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }

    .table-header-rotated td.rotate>div>span {

        padding: 5px 10px;
    }

    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>