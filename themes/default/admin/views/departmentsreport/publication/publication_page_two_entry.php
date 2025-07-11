<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রকাশনা বিভাগ - পেইজ ০২'  . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/publication-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/publication-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/publication-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                  <!--Hide this table  বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম -->
                  <table class="tg table table-header-rotated" id="testTable4" >
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Publication_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($publication_training_program['id']))?$publication_training_program['id']:'';
                                
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
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_s=(isset( $publication_training_program['shikkha_central_s']))? $publication_training_program['shikkha_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_p=(isset( $publication_training_program['shikkha_central_p']))? $publication_training_program['shikkha_central_p']:'' ?>
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
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_s=(isset( $publication_training_program['shikkha_shakha_s']))? $publication_training_program['shikkha_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_p=(isset( $publication_training_program['shikkha_shakha_p']))? $publication_training_program['shikkha_shakha_p']:'' ?>
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
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_s=(isset( $publication_training_program['kormoshala_central_s']))? $publication_training_program['kormoshala_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_p=(isset( $publication_training_program['kormoshala_central_p']))? $publication_training_program['kormoshala_central_p']:'' ?>
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
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_s=(isset( $publication_training_program['kormoshala_shakha_s']))? $publication_training_program['kormoshala_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="publication_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_p=(isset( $publication_training_program['kormoshala_shakha_p']))? $publication_training_program['kormoshala_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                        <!-- Hide this table কেন্দ্র হতে বিবিধ/অন্যান্য প্রকাশনা সামগ্রী সংগ্রহ -->
                    <table class="tg table table-header-rotated" id="testTable1" >
                            <tr>                           
                                <td class="tg-pwj7" colspan='4'><b>বিবিধ/অন্যান্য </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Publication_কেন্দ্র হতে বিবিধ/অন্যান্য প্রকাশনা সামগ্রী সংগ্রহ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-publication-bibidh/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr> 

                                <td class="tg-pwj7" colspan=''>  ক্রম </td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                                <td class="tg-pwj7" colspan=''>  Actions </td>

                            </tr>
                            <?php 
                                $i=0;
                            foreach($publication_bibidh->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['upokoron'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['number'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['bikri'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['bitoron'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-publication-bibidh/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@publication_bibidh@".$row['upokoron']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                        </table>



                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='2'><b>প্রকাশনা সংক্রান্ত আয়-ব্যয়</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Publication_প্রকাশনা সংক্রান্ত আয়-ব্যয়_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr> 
                                <td class="tg-pwj7" colspan=''> বিবরণ</td>
                                <td class="tg-pwj7" colspan=''>  টাকার পরিমাণ </td>
                                <td class="tg-pwj7" colspan=''>  মন্তব্য </td>
                            </tr>
                            <?php
                                $pk = (isset($publication_ay_bey['id']))?$publication_ay_bey['id']:'';

                                ?>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                অধস্তন শাখায় বিক্রয়
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bikroy_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bikroy_amount']))? $publication_ay_bey['odh_shakhar_bikroy_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bikroy_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bikroy_com']))? $publication_ay_bey['odh_shakhar_bikroy_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                অধস্তন শাখার বাহিরে বিক্রয়
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bahire_bikroy_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bahire_bikroy_amount']))? $publication_ay_bey['odh_shakhar_bahire_bikroy_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bahire_bikroy_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bahire_bikroy_com']))? $publication_ay_bey['odh_shakhar_bahire_bikroy_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                মোট আয় 
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_ay_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_ay_amount']))? $publication_ay_bey['pro_hote_total_ay_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_ay_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_ay_com']))? $publication_ay_bey['pro_hote_total_ay_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                মোট ব্যয় 
                                </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_bay_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_bay_amount']))? $publication_ay_bey['pro_hote_total_bay_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_bay_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_bay_com']))? $publication_ay_bey['pro_hote_total_bay_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                             <tr>                                                     
                                <td class="tg-y698 type_1">
                                প্রকাশনা সামগ্রী হতে লাভ (উদ্বৃত্ত)
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="publicationProfit_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['publicationProfit_amount']))? $publication_ay_bey['publicationProfit_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="publicationProfit_com" 
                                    data-title="Enter"><?php echo (isset( $publication_ay_bey['publicationProfit_com']))? $publication_ay_bey['publicationProfit_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                             <tr>                                                     
                                <td class="tg-y698 type_1">
                                শাখা হতে ভর্তুকি (ঘাটতি) 
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="shakaLoss_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['shakaLoss_amount']))? $publication_ay_bey['shakaLoss_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="shakaLoss_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['shakaLoss_com']))? $publication_ay_bey['shakaLoss_com']:'' ?>
                                        </a>
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
    }.action_class{
    color:white;
}
.action_class:hover{
    color:white;
    text-decoration:none;
}
</style>
<script>

$(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-Token': "<?php echo $this->security->get_csrf_token_name(); ?>"
    }
});
	
  $("button").on('click',function(){
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