<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিপক্ষে মামলা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/bipokkhe-mamla') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bipokkhe-mamla/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3">এ পর্যন্ত মামলা </td>
                         
                         <td class="tg-pwj7" colspan="5" rowspan="2">ট্রায়াল  </td>
                         <td class="tg-pwj7 "  rowspan="3"><div><span>স্টে কতটা </span></div></td>
                         <td class="tg-pwj7 " rowspan="3"><div><span>কোয়াশমেন্ট কতটা </span></div></td>
                         <td class="tg-pwj7 " rowspan="3"><div><span>রায়ের জন্য অপেক্ষা মান </span></div></td>
                         <td class="tg-pwj7 " rowspan="3"><div><span>রিমান্ড কতটি মামলা </span></div></td>
                         <td class="tg-pwj7 " rowspan="3"><div><span>রিমান্ড হয়েছে কত জনের</span></div></td>
                       
                 
                     </tr>
                     <tr>
                         
                     </tr>
                     <tr>
                         <td class="tg-pwj7 " ><div><span> সিএস দিয়েছে গঠন</span></div></td>
                         <td class="tg-pwj7 "><div><span> সিএস গঠন </span></div></td>
                         <td class="tg-pwj7 "><div><span>অব্যাহতি কতজন  </span></div></td>
                         <td class="tg-pwj7 "><div><span>সাক্ষী কতটা </span></div></td>
                         <td class="tg-pwj7 "><div><span> যুক্তিতর্ক কতটা</span></div></td>
           
                        
                     </tr>

                     <?php $pk = (isset($bipokkhe_mamla['id']))?$bipokkhe_mamla['id']:'';?>

                     <tr>
                         <td class="tg-y698 type_1"> 2009-2018	</td>
                         <td class="tg-0pky  type_1">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_18_t_csd"
                                            data-title="Enter"><?php echo $_2009_18_t_csd=  (isset( $bipokkhe_mamla['2009_18_t_csd']))? $bipokkhe_mamla['2009_18_t_csd']:'' ?></a>
                         </td>
                         <td class="tg-0pky  type_2">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_18_t_csg"
                                            data-title="Enter"><?php echo $_2009_18_t_csg=  (isset( $bipokkhe_mamla['2009_18_t_csg']))? $bipokkhe_mamla['2009_18_t_csg']:'' ?></a>
                         </td>
                         <td class="tg-0pky  type_3">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_18_t_ohok"
                                            data-title="Enter"><?php echo $_2009_18_t_ohok=  (isset( $bipokkhe_mamla['2009_18_t_ohok']))? $bipokkhe_mamla['2009_18_t_ohok']:'' ?></a>
                         </td>
                         <td class="tg-0pky  type_4">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_18_t_sk"
                                            data-title="Enter"><?php echo $_2009_18_t_sk=  (isset( $bipokkhe_mamla['2009_18_t_sk']))? $bipokkhe_mamla['2009_18_t_sk']:'' ?></a>
                         </td>
                         <td class="tg-0pky  type_5">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_18_t_jtk"
                                            data-title="Enter"><?php echo $_2009_18_t_jtk=  (isset( $bipokkhe_mamla['2009_18_t_jtk']))? $bipokkhe_mamla['2009_18_t_jtk']:'' ?></a>
                         </td>
                         <td class="tg-0pky  type_6">
                         
                         </td>
                         <td class="tg-0pky  type_7">
                         
                         </td>
                         <td class="tg-0pky  type_8">
                         
                         </td>
                         </td>
                         <td class="tg-0pky  type_9">
                         
                         </td>
                         <td class="tg-0pky  type_10">
                         
                         </td>
                         </td>
                    

                     </tr>


                     <tr>
                         <td class="tg-y698">শুধু 2018</td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_t_csd"
                                            data-title="Enter"><?php echo $sudu_2018_t_csd=  (isset( $bipokkhe_mamla['sudu_2018_t_csd']))? $bipokkhe_mamla['sudu_2018_t_csd']:'' ?></a>
                         </td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_t_csg"
                                            data-title="Enter"><?php echo $sudu_2018_t_csg=  (isset( $bipokkhe_mamla['sudu_2018_t_csg']))? $bipokkhe_mamla['sudu_2018_t_csg']:'' ?></a>
                         </td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_t_ohok"
                                            data-title="Enter"><?php echo $sudu_2018_t_ohok=  (isset( $bipokkhe_mamla['sudu_2018_t_ohok']))? $bipokkhe_mamla['sudu_2018_t_ohok']:'' ?></a>
                         </td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_t_sk"
                                            data-title="Enter"><?php echo $sudu_2018_t_sk=  (isset( $bipokkhe_mamla['sudu_2018_t_sk']))? $bipokkhe_mamla['sudu_2018_t_sk']:'' ?></a>
                         </td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_t_jtk"
                                            data-title="Enter"><?php echo $sudu_2018_t_jtk=  (isset( $bipokkhe_mamla['sudu_2018_t_jtk']))? $bipokkhe_mamla['sudu_2018_t_jtk']:'' ?></a>
                         </td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sk"
                                            data-title="Enter"><?php echo $sk=  (isset( $bipokkhe_mamla['sk']))? $bipokkhe_mamla['sk']:'' ?></a>
                         </td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kmk"
                                            data-title="Enter"><?php echo $kmk=  (isset( $bipokkhe_mamla['kmk']))? $bipokkhe_mamla['kmk']:'' ?></a>
                         </td>
                         <td class="tg-0pky">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="rjom"
                                            data-title="Enter"><?php echo $rjom=  (isset( $bipokkhe_mamla['rjom']))? $bipokkhe_mamla['rjom']:'' ?></a>
                         </td>
                         </td>
                         <td class="tg-0pky  type_9">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="rkm"
                                            data-title="Enter"><?php echo $rkm=  (isset( $bipokkhe_mamla['rkm']))? $bipokkhe_mamla['rkm']:'' ?></a>
                         </td>
                         <td class="tg-0pky  type_10">
                         <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bipokkhe_mamla"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="rhokj"
                                            data-title="Enter"><?php echo $rhokj=  (isset( $bipokkhe_mamla['rhokj']))? $bipokkhe_mamla['rhokj']:'' ?></a>
                         </td>
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
