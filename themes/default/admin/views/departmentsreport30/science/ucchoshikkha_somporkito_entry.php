<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">

            <i class="fa-fw fa fa-barcode"></i><?= 'উচ্চশীক্ষা সম্পর্কিত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li>
                            <a
                                href="<?= admin_url(''.($branch_id ? '/'.$branch_id : '')) ?>">
                                <i class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (!empty($branches)) { ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                            data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= admin_url('departmentsreport/ucchoshikkha-somporkito') ?>"><i
                                    class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                        <li class="divider"></li>
                        <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/ucchoshikkha-somporkito/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                                <?php $pk = (isset($uccoshikkha_somporkito['id']))?$uccoshikkha_somporkito['id']:'';?>

                                <tr>
                                    <td class="tg-pwj7  type_1" colspan="">এ বছর বিজ্ঞানে উচ্চশিক্ষায় বিদেশে গমণকারী জনশক্তি
                                    সংখ্যা</td>
                                    <td class="tg-pwj7  type_1" colspan="">বিজ্ঞানে উচ্চশিক্ষায় বিদেশে যাওয়ার প্রস্তুতি নিচ্ছেন
                                    এমন জনশক্তি সংখ্যা</td>
                                </tr>

                                <tr>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="uccoshikkha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abushbgkjs"
                                            data-title="Enter"><?php echo $_abushbgkjs=  (isset( $uccoshikkha_somporkito['abushbgkjs']))? $uccoshikkha_somporkito['abushbgkjs']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="uccoshikkha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ushbjpnajs"
                                            data-title="Enter"><?php echo $_ushbjpnajs=  (isset( $uccoshikkha_somporkito['ushbjpnajs']))? $uccoshikkha_somporkito['ushbjpnajs']:'' ?></a>
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
        text-align: left
    }

    .tg .tg-0pky {
        border-color: black;
        text-align: left;
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