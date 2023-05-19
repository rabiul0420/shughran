<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'যোগাযোগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/dawah-jogajog') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/dawah-jogajog/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7 "><div><span>ধরণ    </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>সরাসরি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ইমেইল </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোবাইলে/ স্কাইপ </span></div></td>
                                
                              
                               
                            </tr>


                            <?php
                            $pk = (isset($daoyaho_bivag_jogajog['id']))?$daoyaho_bivag_jogajog['id']:'';
                            ?>

                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                জাতীয় দাওয়াতি সংগঠন
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jds_s" data-title="Enter"><?php echo $jds_s =  (isset( $daoyaho_bivag_jogajog['jds_s']))? $daoyaho_bivag_jogajog['jds_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jds_ss" data-title="Enter"><?php echo $jds_ss =  (isset( $daoyaho_bivag_jogajog['jds_ss']))? $daoyaho_bivag_jogajog['jds_ss']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jds_emil" data-title="Enter"><?php echo $jds_emil =  (isset( $daoyaho_bivag_jogajog['jds_emil']))? $daoyaho_bivag_jogajog['jds_emil']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jds_mesp" data-title="Enter"><?php echo $jds_mesp =  (isset( $daoyaho_bivag_jogajog['jds_mesp']))? $daoyaho_bivag_jogajog['jds_mesp']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                আন্তর্জাতিক দাওয়াতি সংগঠন
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajds_s" data-title="Enter"><?php echo $ajds_s =  (isset( $daoyaho_bivag_jogajog['ajds_s']))? $daoyaho_bivag_jogajog['ajds_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajds_ss" data-title="Enter"><?php echo $ajds_ss =  (isset( $daoyaho_bivag_jogajog['ajds_ss']))? $daoyaho_bivag_jogajog['ajds_ss']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajds_emil" data-title="Enter"><?php echo $ajds_emil =  (isset( $daoyaho_bivag_jogajog['ajds_emil']))? $daoyaho_bivag_jogajog['ajds_emil']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajds_mesp" data-title="Enter"><?php echo $ajds_mesp =  (isset( $daoyaho_bivag_jogajog['ajds_mesp']))? $daoyaho_bivag_jogajog['ajds_mesp']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                জাতীয় দায়ী
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jd_s" data-title="Enter"><?php echo $jd_s =  (isset( $daoyaho_bivag_jogajog['jd_s']))? $daoyaho_bivag_jogajog['jd_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jd_ss" data-title="Enter"><?php echo $jd_ss =  (isset( $daoyaho_bivag_jogajog['jd_ss']))? $daoyaho_bivag_jogajog['jd_ss']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jd_emil" data-title="Enter"><?php echo $jd_emil =  (isset( $daoyaho_bivag_jogajog['jd_emil']))? $daoyaho_bivag_jogajog['jd_emil']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jd_mesp" data-title="Enter"><?php echo $jd_mesp =  (isset( $daoyaho_bivag_jogajog['jd_mesp']))? $daoyaho_bivag_jogajog['jd_mesp']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                আন্তর্জাতিক দায়ী
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajd_s" data-title="Enter"><?php echo $ajd_s =  (isset( $daoyaho_bivag_jogajog['ajd_s']))? $daoyaho_bivag_jogajog['ajd_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajd_ss" data-title="Enter"><?php echo $ajd_ss =  (isset( $daoyaho_bivag_jogajog['ajd_ss']))? $daoyaho_bivag_jogajog['ajd_ss']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajd_emil" data-title="Enter"><?php echo $ajd_emil =  (isset( $daoyaho_bivag_jogajog['ajd_emil']))? $daoyaho_bivag_jogajog['ajd_emil']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajd_mesp" data-title="Enter"><?php echo $ajd_mesp =  (isset( $daoyaho_bivag_jogajog['ajd_mesp']))? $daoyaho_bivag_jogajog['ajd_mesp']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                প্রখ্যাত আলেম ওলিমা
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pao_s" data-title="Enter"><?php echo $pao_s =  (isset( $daoyaho_bivag_jogajog['pao_s']))? $daoyaho_bivag_jogajog['pao_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pao_ss" data-title="Enter"><?php echo $pao_ss =  (isset( $daoyaho_bivag_jogajog['pao_ss']))? $daoyaho_bivag_jogajog['pao_ss']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pao_emil" data-title="Enter"><?php echo $pao_emil =  (isset( $daoyaho_bivag_jogajog['pao_emil']))? $daoyaho_bivag_jogajog['pao_emil']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pao_mesp" data-title="Enter"><?php echo $pao_mesp =  (isset( $daoyaho_bivag_jogajog['pao_mesp']))? $daoyaho_bivag_jogajog['pao_mesp']:'' ?></a>

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
