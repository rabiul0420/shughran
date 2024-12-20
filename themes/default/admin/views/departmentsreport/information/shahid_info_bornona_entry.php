<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'শহীদ ভাইদের তথ্যাবলী সংগৃহিত থাকলে তার বর্ণনা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/shahid-info-bornona') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/shahid-info-bornona/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                        <td class="tg-pwj7" >উপকরন</td>       
                                        <td class="tg-pwj7" >সংরক্ষিত সংখ্যা </td>
                                    </tr>

                                    <?php $pk = (isset($shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['id']))?$shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['id']:'';?>

                                    <tr>
                                        <td class="tg-y698 type_1">  ছবি	</td>
                                        <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shohid_vaider_tothoboli_songrihito_thakle_tar_bornona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ch_ss" data-title="Enter"><?php echo $ch_ss=  (isset( $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['ch_ss']))? $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['ch_ss']:'' ?></a>
                                        </td>  
                                    </tr>


                                    <tr>
                                        <td class="tg-y698"> ভিডিও </td>
                                        <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shohid_vaider_tothoboli_songrihito_thakle_tar_bornona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="vdo_ss" data-title="Enter"><?php echo $vdo_ss=  (isset( $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['vdo_ss']))? $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['vdo_ss']:'' ?></a>
                                        </td>
                                        
                                        
                                    
                                    </tr>
                                    

                                    <tr>
                                        <td class="tg-y698">শার্ট প্যান্ট   </td>
                                        <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shohid_vaider_tothoboli_songrihito_thakle_tar_bornona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shpnt_ss" data-title="Enter"><?php echo $shpnt_ss=  (isset( $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['shpnt_ss']))? $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['shpnt_ss']:'' ?></a>
                                        </td>
                                        
                                    
                                    </tr>
                                    <tr>
                                        <td class="tg-y698">ডায়েরি  </td>
                                        <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shohid_vaider_tothoboli_songrihito_thakle_tar_bornona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dr_ss" data-title="Enter"><?php echo $dr_ss=  (isset( $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['dr_ss']))? $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['dr_ss']:'' ?></a>
                                        </td>
                                        
                                    
                                    </tr>
                                    <tr>
                                        <td class="tg-y698">শহীদ এর জীবন বৃত্তান্ত </td>
                                        <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shohid_vaider_tothoboli_songrihito_thakle_tar_bornona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shjbr_ss" data-title="Enter"><?php echo $shjbr_ss=  (isset( $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['shjbr_ss']))? $shohid_vaider_tothoboli_songrihito_thakle_tar_bornona['shjbr_ss']:'' ?></a>
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
