<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'আন্তর্জাতিক কনফারেন্স' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        
                    </ul>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/conference') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/conference/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7" > সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি/অংশগ্রহন </td>
                                <td class="tg-pwj7" > গড় </td>
                                <td class="tg-pwj7" > মন্তব্য/ধরণ </td>
                            </tr>

                            <?php 
                                    $pk = (isset($conference['id']))?$conference['id']:'';
                               ?>


                            <tr>
                                <td class="tg-y698 type_1">আন্তর্জাতিক কনফারেন্সে অংশগ্রহণ (যেকোন জনশক্তি)	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="conference" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aka_number" data-title="Enter"><?php echo $aka_number=(isset($conference['aka_number']))?$conference['aka_number']:0 ?></a>
                                </td>

                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="conference" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aka_attendence" data-title="Enter"><?php echo $aka_attendence=(isset($conference['aka_attendence']))?$conference['aka_attendence']:0 ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
                                <?php echo number_format( ($aka_attendence!=0)?$aka_attendence/$aka_number:0,2)?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="conference" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aka_comment" data-title="Enter"><?php echo (isset($conference['aka_comment']))?$conference['aka_comment']:0 ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">ক্যারিয়ার গাইডলাইন প্রোগ্রাম </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="conference" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kgp_number" data-title="Enter"><?php echo $kgp_number=(isset($conference['kgp_number']))?$conference['kgp_number']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="conference" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kgp_attendence" data-title="Enter"><?php echo $kgp_attendence=(isset($conference['kgp_attendence']))?$conference['kgp_attendence']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <?php echo number_format( ($kgp_attendence!=0)?$kgp_attendence/$kgp_number:0,2)?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="conference" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kgp_comment" data-title="Enter"><?php echo (isset($conference['kgp_comment']))?$conference['kgp_comment']:0 ?></a>
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
