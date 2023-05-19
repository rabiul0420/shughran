<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'পাঠাগার বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'জুলাই-নভেম্বর\'' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষান্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষান্মাসিক ' . $i) . ' </li>';
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
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable10">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Library_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($pathagar_training_program['id']))?$pathagar_training_program['id']:'';
                          
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
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $pathagar_training_program['shikkha_central_s']))? $pathagar_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $pathagar_training_program['shikkha_central_p']))? $pathagar_training_program['shikkha_central_p']:'' ?>
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
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $pathagar_training_program['shikkha_shakha_s']))? $pathagar_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $pathagar_training_program['shikkha_shakha_p']))? $pathagar_training_program['shikkha_shakha_p']:'' ?>
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
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $pathagar_training_program['kormoshala_central_s']))? $pathagar_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $pathagar_training_program['kormoshala_central_p']))? $pathagar_training_program['kormoshala_central_p']:'' ?>
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
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $pathagar_training_program['kormoshala_shakha_s']))? $pathagar_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="pathagar_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $pathagar_training_program['kormoshala_shakha_p']))? $pathagar_training_program['kormoshala_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                          {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                  </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                        <tr>
                            <td class="tg-pwj7" colspan="2"><b>এ সেশনে পাঠাগার বৃদ্ধি ও ঘাটতি </b></td>
                            
                            <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Library_এ সেশনে পাঠাগার বৃদ্ধি ও ঘাটতি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan='2'>বিষয় </td>
                            <td class="tg-pwj7  type_1">সংখ্যা</td>
                        </tr>				
                        <?php
                                $pk = (isset($pathagar_birdhi_garthi['id']))?$pathagar_birdhi_garthi['id']:'';

                                ?>						
                        <tr>
                            <td class="tg-pwj7" colspan='2'>মোট থানা </td>
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="total_t" 
                                    data-title="Enter"><?php echo $total_t=(isset( $pathagar_birdhi_garthi['total_t']))? $pathagar_birdhi_garthi['total_t']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>

                            <td class="tg-pwj7" colspan='2'>থানাভিত্তিক পাঠাগার সংখ্যা  </td>
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t_boi_s" 
                                    data-title="Enter"><?php echo $t_boi_s=(isset( $pathagar_birdhi_garthi['t_boi_s']))? $pathagar_birdhi_garthi['t_boi_s']:0 ?>
                                </a>
                                 </td>
                           
                        </tr>
                        <tr>

                        <td class="tg-pwj7" colspan='2'>মোট ওয়ার্ড </td>
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="total_w" 
                                    data-title="Enter"><?php echo $total_w=(isset( $pathagar_birdhi_garthi['total_w']))? $pathagar_birdhi_garthi['total_w']:0 ?>
                                </a>
                                 </td>

                        </tr>
                        <tr>
                        <td class="tg-pwj7" colspan='2'>ওয়ার্ডভিত্তিক পাঠাগার সংখ্যা  </td>
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="w_boi_s" 
                                    data-title="Enter"><?php echo $w_boi_s=(isset( $pathagar_birdhi_garthi['w_boi_s']))? $pathagar_birdhi_garthi['w_boi_s']:0 ?>
                                </a>
                                 </td>

                        </tr>
                        <tr>

                        <td class="tg-pwj7" colspan='2'>মোট উপশাখা </td>
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="total_u" 
                                    data-title="Enter"><?php echo $total_u=(isset( $pathagar_birdhi_garthi['total_u']))? $pathagar_birdhi_garthi['total_u']:0 ?>
                                </a>
                                 </td>

                        </tr>
                        <tr>
                        <td class="tg-pwj7" colspan='2'>উপশাখাভিত্তিক পাঠাগার সংখ্যা  </td>
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="u_boi_s" 
                                    data-title="Enter"><?php echo $u_boi_s=(isset( $pathagar_birdhi_garthi['u_boi_s']))? $pathagar_birdhi_garthi['u_boi_s']:0 ?>
                                </a>
                                 </td>

                        </tr>
                        <tr>

                        <td class="tg-pwj7" rowspan='4' >এ বছরে পাঠাগার বৃদ্ধি  </td>
                        <td class="tg-pwj7" >শাখা</td>   
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="inc_p_s" 
                                    data-title="Enter"><?php echo $inc_p_s=(isset( $pathagar_birdhi_garthi['inc_p_s']))? $pathagar_birdhi_garthi['inc_p_s']:0 ?>
                                </a>
                                 </td>

                        </tr>
                        <tr>

                        <td class="tg-pwj7" >থানা</td>   
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="inc_p_t" 
                                    data-title="Enter"><?php echo $inc_p_t=(isset( $pathagar_birdhi_garthi['inc_p_t']))? $pathagar_birdhi_garthi['inc_p_t']:0 ?>
                                </a>
                                 </td>

                        </tr>
                        <tr>
                            <td class="tg-pwj7" >ওয়ার্ড  </td> 
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="inc_p_w" 
                                    data-title="Enter"><?php echo $inc_p_w=(isset( $pathagar_birdhi_garthi['inc_p_w']))? $pathagar_birdhi_garthi['inc_p_w']:0 ?>
                                </a>
                                 </td>
                       </tr>
                       <tr>
                            <td class="tg-pwj7" >উপশাখা </td>
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="inc_p_u" 
                                    data-title="Enter"><?php echo $inc_p_u=(isset( $pathagar_birdhi_garthi['inc_p_u']))? $pathagar_birdhi_garthi['inc_p_u']:0 ?>
                                </a>
                                 </td>
                       </tr>
                        <tr>
                        <td class="tg-pwj7" rowspan='4' >মোট বই সংখ্যা </td>
                        <td class="tg-pwj7" >শাখা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_s" 
                                    data-title="Enter"><?php echo $boi_s=(isset( $pathagar_birdhi_garthi['boi_s']))? $pathagar_birdhi_garthi['boi_s']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                        <td class="tg-pwj7" >থানা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_t" 
                                    data-title="Enter"><?php echo $boi_t=(isset( $pathagar_birdhi_garthi['boi_t']))? $pathagar_birdhi_garthi['boi_t']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" >ওয়ার্ড  </td> 
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_w" 
                                    data-title="Enter"><?php echo $boi_w=(isset( $pathagar_birdhi_garthi['boi_w']))? $pathagar_birdhi_garthi['boi_w']:0 ?>
                                </a>
                                 </td>
                       </tr>
                       <tr>
                            <td class="tg-pwj7" >উপশাখা </td>
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_u" 
                                    data-title="Enter"><?php echo $boi_u=(isset( $pathagar_birdhi_garthi['boi_u']))? $pathagar_birdhi_garthi['boi_u']:0 ?>
                                </a>
                                 </td>
                       </tr>
                        <tr>
                        <td class="tg-pwj7" rowspan='4'>মোট বই বৃদ্ধি</td>
                        <td class="tg-pwj7" >শাখা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_inc_s" 
                                    data-title="Enter"><?php echo $boi_inc_s=(isset( $pathagar_birdhi_garthi['boi_inc_s']))? $pathagar_birdhi_garthi['boi_inc_s']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                        <td class="tg-pwj7" >থানা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_inc_t" 
                                    data-title="Enter"><?php echo $boi_inc_t=(isset( $pathagar_birdhi_garthi['boi_inc_t']))? $pathagar_birdhi_garthi['boi_inc_t']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" >ওয়ার্ড  </td> 
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_inc_w" 
                                    data-title="Enter"><?php echo $boi_inc_w=(isset( $pathagar_birdhi_garthi['boi_inc_w']))? $pathagar_birdhi_garthi['boi_inc_w']:0 ?>
                                </a>
                                 </td>
                       </tr>
                       <tr>
                            <td class="tg-pwj7" >উপশাখা </td>
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="boi_inc_u" 
                                    data-title="Enter"><?php echo $boi_inc_u=(isset( $pathagar_birdhi_garthi['boi_inc_u']))? $pathagar_birdhi_garthi['boi_inc_u']:0 ?>
                                </a>
                                 </td>
                       </tr>
                        <tr>
                        <td class="tg-pwj7" rowspan='4'>পাঠাগার ঘাটতি </td>
                        <td class="tg-pwj7" >শাখা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_p_s" 
                                    data-title="Enter"><?php echo $dec_p_s=(isset( $pathagar_birdhi_garthi['dec_p_s']))? $pathagar_birdhi_garthi['dec_p_s']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                        <td class="tg-pwj7" >থানা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_p_t" 
                                    data-title="Enter"><?php echo $dec_p_t=(isset( $pathagar_birdhi_garthi['dec_p_t']))? $pathagar_birdhi_garthi['dec_p_t']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" >ওয়ার্ড  </td> 
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_p_w" 
                                    data-title="Enter"><?php echo $dec_p_w=(isset( $pathagar_birdhi_garthi['dec_p_w']))? $pathagar_birdhi_garthi['dec_p_w']:0 ?>
                                </a>
                                 </td>
                       </tr>
                       <tr>
                            <td class="tg-pwj7" >উপশাখা </td>
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_p_u" 
                                    data-title="Enter"><?php echo $dec_p_u=(isset( $pathagar_birdhi_garthi['dec_p_u']))? $pathagar_birdhi_garthi['dec_p_u']:0 ?>
                                </a>
                                 </td>
                       </tr>
                        <tr>
                        <td class="tg-pwj7" rowspan='4'>বই ঘাটতি </td>
                        <td class="tg-pwj7" >শাখা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_boi_s" 
                                    data-title="Enter"><?php echo $dec_boi_s=(isset( $pathagar_birdhi_garthi['dec_boi_s']))? $pathagar_birdhi_garthi['dec_boi_s']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                        <td class="tg-pwj7" >থানা</td>  
                         <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_boi_t" 
                                    data-title="Enter"><?php echo $dec_boi_t=(isset( $pathagar_birdhi_garthi['dec_boi_t']))? $pathagar_birdhi_garthi['dec_boi_t']:0 ?>
                                </a>
                                 </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" >ওয়ার্ড  </td> 
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_boi_w" 
                                    data-title="Enter"><?php echo $dec_boi_w=(isset( $pathagar_birdhi_garthi['dec_boi_w']))? $pathagar_birdhi_garthi['dec_boi_w']:0 ?>
                                </a>
                                 </td>
                       </tr>
                       <tr>
                            <td class="tg-pwj7" >উপশাখা </td>
                             <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_birdhi_garthi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="dec_boi_u" 
                                    data-title="Enter"><?php echo $dec_boi_u=(isset( $pathagar_birdhi_garthi['dec_boi_u']))? $pathagar_birdhi_garthi['dec_boi_u']:0 ?>
                                </a>
                                 </td>
                       </tr>
                            
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="8"><b>রেজিস্টার সংরক্ষণ</b></td>
                                <td class="tg-pwj7" colspan="5">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Library_রেজিস্টার সংরক্ষণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='4'>রেজিস্টার সংরক্ষণ করা হয় কতটি পাঠাগারে </td>
                                <td class="tg-pwj7  type_1" colspan='4'>ইস্যুকৃত বই</td>
                                <td class="tg-pwj7  type_1" colspan='4'>পঠিত বই</td>
                                <td class="tg-pwj7  type_1" rowspan='2'>দাওয়াতের উদ্দেশ্যে বই  বিতরণ</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >শাখা</td>    
                                <td class="tg-pwj7" >থানা</td>
                                <td class="tg-pwj7" >ওয়ার্ড  </td>
                                <td class="tg-pwj7" >উপশাখা </td>
                                <td class="tg-pwj7" >শাখা</td>
                                <td class="tg-pwj7" >থানা</td>
                                <td class="tg-pwj7" >ওয়ার্ড  </td>
                                <td class="tg-pwj7" >উপশাখা </td> 
                                <td class="tg-pwj7" >শাখা</td>
                                <td class="tg-pwj7" >থানা</td>
                                <td class="tg-pwj7" >ওয়ার্ড  </td>
                                <td class="tg-pwj7" >উপশাখা </td> 
                            </tr>
                            <?php
                                $pk = (isset($pathagar_register['id']))?$pathagar_register['id']:'';

                                ?>	
                            <tr>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_st_s" 
                                    data-title="Enter"><?php echo $reg_st_s=(isset( $pathagar_register['reg_st_s']))? $pathagar_register['reg_st_s']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_st_t" 
                                    data-title="Enter"><?php echo $reg_st_t=(isset( $pathagar_register['reg_st_t']))? $pathagar_register['reg_st_t']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_st_w" 
                                    data-title="Enter"><?php echo $reg_st_w=(isset( $pathagar_register['reg_st_w']))? $pathagar_register['reg_st_w']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_st_u" 
                                    data-title="Enter"><?php echo $reg_st_u=(isset( $pathagar_register['reg_st_u']))? $pathagar_register['reg_st_u']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_is_s" 
                                    data-title="Enter"><?php echo $reg_is_s=(isset( $pathagar_register['reg_is_s']))? $pathagar_register['reg_is_s']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_is_t" 
                                    data-title="Enter"><?php echo $reg_is_t=(isset( $pathagar_register['reg_is_t']))? $pathagar_register['reg_is_t']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_is_w" 
                                    data-title="Enter"><?php echo $reg_is_w=(isset( $pathagar_register['reg_is_w']))? $pathagar_register['reg_is_w']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_is_u" 
                                    data-title="Enter"><?php echo $reg_is_u=(isset( $pathagar_register['reg_is_u']))? $pathagar_register['reg_is_u']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_re_s" 
                                    data-title="Enter"><?php echo $reg_re_s=(isset( $pathagar_register['reg_re_s']))? $pathagar_register['reg_re_s']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_re_t" 
                                    data-title="Enter"><?php echo $reg_re_t=(isset( $pathagar_register['reg_re_t']))? $pathagar_register['reg_re_t']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_re_w" 
                                    data-title="Enter"><?php echo $reg_re_w=(isset( $pathagar_register['reg_re_w']))? $pathagar_register['reg_re_w']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_re_u" 
                                    data-title="Enter"><?php echo $reg_re_u=(isset( $pathagar_register['reg_re_u']))? $pathagar_register['reg_re_u']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_register" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reg_boi_b_dowah" 
                                    data-title="Enter"><?php echo $reg_boi_b_dowah=(isset( $pathagar_register['reg_boi_b_dowah']))? $pathagar_register['reg_boi_b_dowah']:0 ?>
                                </a>
                                 </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>মসজিদভিত্তিক পাঠাগার</b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Library_মসজিদভিত্তিক পাঠাগার_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            <tr>
                                <td class="tg-pwj7" colspan=''>মসজিদভিত্তিক পাঠাগার সংখ্যা</td>
                                <td class="tg-pwj7  type_1" colspan=''>বই সংখ্যা</td>
                                <td class="tg-pwj7  type_1" colspan=''>মসজিদভিত্তিক পাঠাগার বৃদ্ধি সংখ্যা</td>
                                <td class="tg-pwj7  type_1" rowspan=''>বই বৃদ্ধি সংখ্যা </td>
                            </tr>
                            <?php
                                $pk = (isset($pathagar_mosque['id']))?$pathagar_mosque['id']:'';

                                ?>	
                            <tr>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_mosque" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mos_p_s" 
                                    data-title="Enter"><?php echo $mos_p_s=(isset( $pathagar_mosque['mos_p_s']))? $pathagar_mosque['mos_p_s']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_mosque" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mos_boi_s" 
                                    data-title="Enter"><?php echo $mos_boi_s=(isset( $pathagar_mosque['mos_boi_s']))? $pathagar_mosque['mos_boi_s']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_mosque" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mos_inc_p" 
                                    data-title="Enter"><?php echo $mos_inc_p=(isset( $pathagar_mosque['mos_inc_p']))? $pathagar_mosque['mos_inc_p']:0 ?>
                                </a>
                                 </td>
                                 <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="pathagar_mosque" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mos_inc_boi" 
                                    data-title="Enter"><?php echo $mos_inc_boi=(isset( $pathagar_mosque['mos_inc_boi']))? $pathagar_mosque['mos_inc_boi']:0 ?>
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
    }
</style>
