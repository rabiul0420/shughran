<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রকাশনা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/dawah-prokashona') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/dawah-prokashona/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7 "><div><span> উপকরণ   </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span> বিক্রয়/ বিতরণ</span></div></td>
                                <td class="tg-pwj7 "><div><span>উপহার </span></div></td>
                                <td class="tg-pwj7 "><div><span>মন্তব্য </span></div></td>
                                
                              
                               
                            </tr>


                            <?php
                            $pk = (isset($daoyaho_bivag_prokashona['id']))?$daoyaho_bivag_prokashona['id']:'';
                            ?>

                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                অর্থসহ আল কুরআন 
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="osak_s" data-title="Enter"><?php echo $osak_s =  (isset( $daoyaho_bivag_prokashona['osak_s']))? $daoyaho_bivag_prokashona['osak_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="osak_bb" data-title="Enter"><?php echo $osak_bb =  (isset( $daoyaho_bivag_prokashona['osak_bb']))? $daoyaho_bivag_prokashona['osak_bb']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="osak_uph" data-title="Enter"><?php echo $osak_uph =  (isset( $daoyaho_bivag_prokashona['osak_uph']))? $daoyaho_bivag_prokashona['osak_uph']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="osak_mb" data-title="Enter"><?php echo $osak_mb =  (isset( $daoyaho_bivag_prokashona['osak_mb']))? $daoyaho_bivag_prokashona['osak_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                আল হাদিস 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aha_s" data-title="Enter"><?php echo $aha_s =  (isset( $daoyaho_bivag_prokashona['aha_s']))? $daoyaho_bivag_prokashona['aha_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aha_bb" data-title="Enter"><?php echo $aha_bb =  (isset( $daoyaho_bivag_prokashona['aha_bb']))? $daoyaho_bivag_prokashona['aha_bb']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aha_uph" data-title="Enter"><?php echo $aha_uph =  (isset( $daoyaho_bivag_prokashona['aha_uph']))? $daoyaho_bivag_prokashona['aha_uph']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aha_mb" data-title="Enter"><?php echo $aha_mb =  (isset( $daoyaho_bivag_prokashona['aha_mb']))? $daoyaho_bivag_prokashona['aha_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                বই
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_s" data-title="Enter"><?php echo $b_s =  (isset( $daoyaho_bivag_prokashona['b_s']))? $daoyaho_bivag_prokashona['b_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_bb" data-title="Enter"><?php echo $b_bb =  (isset( $daoyaho_bivag_prokashona['b_bb']))? $daoyaho_bivag_prokashona['b_bb']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_uph" data-title="Enter"><?php echo $b_uph =  (isset( $daoyaho_bivag_prokashona['b_uph']))? $daoyaho_bivag_prokashona['b_uph']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="b_mb" data-title="Enter"><?php echo $b_mb =  (isset( $daoyaho_bivag_prokashona['b_mb']))? $daoyaho_bivag_prokashona['b_mb']:'' ?></a>

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
