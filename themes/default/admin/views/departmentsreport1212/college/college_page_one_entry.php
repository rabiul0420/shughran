<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'কলেজ বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">


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
                                <td class="tg-pwj7" colspan="17"><b>কলেজ সংগঠন</b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'College_কলেজ সংগঠন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ধরন</td>
                                <td class="tg-pwj7" colspan="3">প্রতিষ্ঠান  </td>
                                <td class="tg-pwj7" colspan="4">সংগঠন   </td>
                               
                                <td class="tg-pwj7" colspan="3"> থানা মানের  </td>
                                <td class="tg-pwj7" colspan="3"> ওয়ার্ড মানে  </td>
                                <td class="tg-pwj7" colspan="3">উপশাখা  মানের  </td>
                                <td class="tg-pwj7" colspan="3">সমর্থক সংগঠন  </td>
                            </tr>

                            <tr>

                                <td class="tg-pwj7"><div><span> সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>নেই </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>


                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি</span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                           

                            </tr>
							<?php $pk = (isset($college_shongothon['id']))?$college_shongothon['id']:'';?>

                            <tr>
                                <td class="tg-y698 ">সরকারি কলেজ	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_pr_num" data-title="Enter">
										<?php echo $col_shor_pr_num=  (isset( $college_shongothon['col_shor_pr_num']))?$college_shongothon['col_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_pr_bri" data-title="Enter">
										<?php echo $col_shor_pr_bri=  (isset( $college_shongothon['col_shor_pr_bri']))?$college_shongothon['col_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_pr_gha" data-title="Enter">
										<?php echo $col_shor_pr_gha=  (isset( $college_shongothon['col_shor_pr_gha']))?$college_shongothon['col_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_sn_num" data-title="Enter">
										<?php echo $col_shor_sn_num=  (isset( $college_shongothon['col_shor_sn_num']))?$college_shongothon['col_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_sn_nei" data-title="Enter">
										<?php echo $col_shor_sn_nei=  (isset( $college_shongothon['col_shor_sn_nei']))?$college_shongothon['col_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_sn_bri" data-title="Enter">
										<?php echo $col_shor_sn_bri=  (isset( $college_shongothon['col_shor_sn_bri']))?$college_shongothon['col_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_sn_gha" data-title="Enter">
										<?php echo $col_shor_sn_gha=  (isset( $college_shongothon['col_shor_sn_gha']))?$college_shongothon['col_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_th_num" data-title="Enter">
										<?php echo $col_shor_th_num=  (isset( $college_shongothon['col_shor_th_num']))?$college_shongothon['col_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_th_bri" data-title="Enter">
										<?php echo $col_shor_th_bri=  (isset( $college_shongothon['col_shor_th_bri']))?$college_shongothon['col_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_th_gha" data-title="Enter">
										<?php echo $col_shor_th_gha=  (isset( $college_shongothon['col_shor_th_gha']))?$college_shongothon['col_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_wa_num" data-title="Enter">
										<?php echo $col_shor_wa_num=  (isset( $college_shongothon['col_shor_wa_num']))?$college_shongothon['col_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_wa_bri" data-title="Enter">
										<?php echo $col_shor_wa_bri=  (isset( $college_shongothon['col_shor_wa_bri']))?$college_shongothon['col_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_wa_gha" data-title="Enter">
										<?php echo $col_shor_wa_gha=  (isset( $college_shongothon['col_shor_wa_gha']))?$college_shongothon['col_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_up_num" data-title="Enter">
										<?php echo $col_shor_up_num=  (isset( $college_shongothon['col_shor_up_num']))?$college_shongothon['col_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_up_bri" data-title="Enter">
										<?php echo $col_shor_up_bri=  (isset( $college_shongothon['col_shor_up_bri']))?$college_shongothon['col_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_up_gha" data-title="Enter">
										<?php echo $col_shor_up_gha=  (isset( $college_shongothon['col_shor_up_gha']))?$college_shongothon['col_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_ss_num" data-title="Enter">
										<?php echo $col_shor_ss_num=  (isset( $college_shongothon['col_shor_ss_num']))?$college_shongothon['col_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_ss_bri" data-title="Enter">
										<?php echo $col_shor_ss_bri=  (isset( $college_shongothon['col_shor_ss_bri']))?$college_shongothon['col_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_shor_ss_gha" data-title="Enter">
										<?php echo $col_shor_ss_gha=  (isset( $college_shongothon['col_shor_ss_gha']))?$college_shongothon['col_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698 "> কলেজ বেসরকারি	</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_pr_num" data-title="Enter">
										<?php echo $col_beshor_pr_num=  (isset( $college_shongothon['col_beshor_pr_num']))?$college_shongothon['col_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_pr_bri" data-title="Enter">
										<?php echo $col_beshor_pr_bri=  (isset( $college_shongothon['col_beshor_pr_bri']))?$college_shongothon['col_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_pr_gha" data-title="Enter">
										<?php echo $col_beshor_pr_gha=  (isset( $college_shongothon['col_beshor_pr_gha']))?$college_shongothon['col_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_sn_num" data-title="Enter">
										<?php echo $col_beshor_sn_num=  (isset( $college_shongothon['col_beshor_sn_num']))?$college_shongothon['col_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_sn_nei" data-title="Enter">
										<?php echo $col_beshor_sn_nei=  (isset( $college_shongothon['col_beshor_sn_nei']))?$college_shongothon['col_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_sn_bri" data-title="Enter">
										<?php echo $col_beshor_sn_bri=  (isset( $college_shongothon['col_beshor_sn_bri']))?$college_shongothon['col_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_sn_gha" data-title="Enter">
										<?php echo $col_beshor_sn_gha=  (isset( $college_shongothon['col_beshor_sn_gha']))?$college_shongothon['col_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_th_num" data-title="Enter">
										<?php echo $col_beshor_th_num=  (isset( $college_shongothon['col_beshor_th_num']))?$college_shongothon['col_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_th_bri" data-title="Enter">
										<?php echo $col_beshor_th_bri=  (isset( $college_shongothon['col_beshor_th_bri']))?$college_shongothon['col_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_th_gha" data-title="Enter">
										<?php echo $col_beshor_th_gha=  (isset( $college_shongothon['col_beshor_th_gha']))?$college_shongothon['col_beshor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_wa_num" data-title="Enter">
										<?php echo $col_beshor_wa_num=  (isset( $college_shongothon['col_beshor_wa_num']))?$college_shongothon['col_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_wa_bri" data-title="Enter">
										<?php echo $col_beshor_wa_bri=  (isset( $college_shongothon['col_beshor_wa_bri']))?$college_shongothon['col_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_wa_gha" data-title="Enter">
										<?php echo $col_beshor_wa_gha=  (isset( $college_shongothon['col_beshor_wa_gha']))?$college_shongothon['col_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_up_num" data-title="Enter">
										<?php echo $col_beshor_up_num=  (isset( $college_shongothon['col_beshor_up_num']))?$college_shongothon['col_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_up_bri" data-title="Enter">
										<?php echo $col_beshor_up_bri=  (isset( $college_shongothon['col_beshor_up_bri']))?$college_shongothon['col_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_up_gha" data-title="Enter">
										<?php echo $col_beshor_up_gha=  (isset( $college_shongothon['col_beshor_up_gha']))?$college_shongothon['col_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_ss_num" data-title="Enter">
										<?php echo $col_beshor_ss_num=  (isset( $college_shongothon['col_beshor_ss_num']))?$college_shongothon['col_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_ss_bri" data-title="Enter">
										<?php echo $col_beshor_ss_bri=  (isset( $college_shongothon['col_beshor_ss_bri']))?$college_shongothon['col_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="col_beshor_ss_gha" data-title="Enter">
										<?php echo $col_beshor_ss_gha=  (isset( $college_shongothon['col_beshor_ss_gha']))?$college_shongothon['col_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">বিএড কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_pr_num" data-title="Enter">
										<?php echo $b_ed_col_pr_num=  (isset( $college_shongothon['b_ed_col_pr_num']))?$college_shongothon['b_ed_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_pr_bri" data-title="Enter">
										<?php echo $b_ed_col_pr_bri=  (isset( $college_shongothon['b_ed_col_pr_bri']))?$college_shongothon['b_ed_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_pr_gha" data-title="Enter">
										<?php echo $b_ed_col_pr_gha=  (isset( $college_shongothon['b_ed_col_pr_gha']))?$college_shongothon['b_ed_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_sn_num" data-title="Enter">
										<?php echo $b_ed_col_sn_num=  (isset( $college_shongothon['b_ed_col_sn_num']))?$college_shongothon['b_ed_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_sn_nei" data-title="Enter">
										<?php echo $b_ed_col_sn_nei=  (isset( $college_shongothon['b_ed_col_sn_nei']))?$college_shongothon['b_ed_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_sn_bri" data-title="Enter">
										<?php echo $b_ed_col_sn_bri=  (isset( $college_shongothon['b_ed_col_sn_bri']))?$college_shongothon['b_ed_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_sn_gha" data-title="Enter">
										<?php echo $b_ed_col_sn_gha=  (isset( $college_shongothon['b_ed_col_sn_gha']))?$college_shongothon['b_ed_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_th_num" data-title="Enter">
										<?php echo $b_ed_col_th_num=  (isset( $college_shongothon['b_ed_col_th_num']))?$college_shongothon['b_ed_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_th_bri" data-title="Enter">
										<?php echo $b_ed_col_th_bri=  (isset( $college_shongothon['b_ed_col_th_bri']))?$college_shongothon['b_ed_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_th_gha" data-title="Enter">
										<?php echo $b_ed_col_th_gha=  (isset( $college_shongothon['b_ed_col_th_gha']))?$college_shongothon['b_ed_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_wa_num" data-title="Enter">
										<?php echo $b_ed_col_wa_num=  (isset( $college_shongothon['b_ed_col_wa_num']))?$college_shongothon['b_ed_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_wa_bri" data-title="Enter">
										<?php echo $b_ed_col_wa_bri=  (isset( $college_shongothon['b_ed_col_wa_bri']))?$college_shongothon['b_ed_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_wa_gha" data-title="Enter">
										<?php echo $b_ed_col_wa_gha=  (isset( $college_shongothon['b_ed_col_wa_gha']))?$college_shongothon['b_ed_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_up_num" data-title="Enter">
										<?php echo $b_ed_col_up_num=  (isset( $college_shongothon['b_ed_col_up_num']))?$college_shongothon['b_ed_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_up_bri" data-title="Enter">
										<?php echo $b_ed_col_up_bri=  (isset( $college_shongothon['b_ed_col_up_bri']))?$college_shongothon['b_ed_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_up_gha" data-title="Enter">
										<?php echo $b_ed_col_up_gha=  (isset( $college_shongothon['b_ed_col_up_gha']))?$college_shongothon['b_ed_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_ss_num" data-title="Enter">
										<?php echo $b_ed_col_ss_num=  (isset( $college_shongothon['b_ed_col_ss_num']))?$college_shongothon['b_ed_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_ss_bri" data-title="Enter">
										<?php echo $b_ed_col_ss_bri=  (isset( $college_shongothon['b_ed_col_ss_bri']))?$college_shongothon['b_ed_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="b_ed_col_ss_gha" data-title="Enter">
										<?php echo $b_ed_col_ss_gha=  (isset( $college_shongothon['b_ed_col_ss_gha']))?$college_shongothon['b_ed_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698 ">আইন কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_pr_num" data-title="Enter">
										<?php echo $aain_col_pr_num=  (isset( $college_shongothon['aain_col_pr_num']))?$college_shongothon['aain_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_pr_bri" data-title="Enter">
										<?php echo $aain_col_pr_bri=  (isset( $college_shongothon['aain_col_pr_bri']))?$college_shongothon['aain_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_pr_gha" data-title="Enter">
										<?php echo $aain_col_pr_gha=  (isset( $college_shongothon['aain_col_pr_gha']))?$college_shongothon['aain_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_sn_num" data-title="Enter">
										<?php echo $aain_col_sn_num=  (isset( $college_shongothon['aain_col_sn_num']))?$college_shongothon['aain_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_sn_nei" data-title="Enter">
										<?php echo $aain_col_sn_nei=  (isset( $college_shongothon['aain_col_sn_nei']))?$college_shongothon['aain_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_sn_bri" data-title="Enter">
										<?php echo $aain_col_sn_bri=  (isset( $college_shongothon['aain_col_sn_bri']))?$college_shongothon['aain_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_sn_gha" data-title="Enter">
										<?php echo $aain_col_sn_gha=  (isset( $college_shongothon['aain_col_sn_gha']))?$college_shongothon['aain_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_th_num" data-title="Enter">
										<?php echo $aain_col_th_num=  (isset( $college_shongothon['aain_col_th_num']))?$college_shongothon['aain_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_th_bri" data-title="Enter">
										<?php echo $aain_col_th_bri=  (isset( $college_shongothon['aain_col_th_bri']))?$college_shongothon['aain_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_th_gha" data-title="Enter">
										<?php echo $aain_col_th_gha=  (isset( $college_shongothon['aain_col_th_gha']))?$college_shongothon['aain_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_wa_num" data-title="Enter">
										<?php echo $aain_col_wa_num=  (isset( $college_shongothon['aain_col_wa_num']))?$college_shongothon['aain_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_wa_bri" data-title="Enter">
										<?php echo $aain_col_wa_bri=  (isset( $college_shongothon['aain_col_wa_bri']))?$college_shongothon['aain_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_wa_gha" data-title="Enter">
										<?php echo $aain_col_wa_gha=  (isset( $college_shongothon['aain_col_wa_gha']))?$college_shongothon['aain_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_up_num" data-title="Enter">
										<?php echo $aain_col_up_num=  (isset( $college_shongothon['aain_col_up_num']))?$college_shongothon['aain_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_up_bri" data-title="Enter">
										<?php echo $aain_col_up_bri=  (isset( $college_shongothon['aain_col_up_bri']))?$college_shongothon['aain_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_up_gha" data-title="Enter">
										<?php echo $aain_col_up_gha=  (isset( $college_shongothon['aain_col_up_gha']))?$college_shongothon['aain_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_ss_num" data-title="Enter">
										<?php echo $aain_col_ss_num=  (isset( $college_shongothon['aain_col_ss_num']))?$college_shongothon['aain_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_ss_bri" data-title="Enter">
										<?php echo $aain_col_ss_bri=  (isset( $college_shongothon['aain_col_ss_bri']))?$college_shongothon['aain_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="aain_col_ss_gha" data-title="Enter">
										<?php echo $aain_col_ss_gha=  (isset( $college_shongothon['aain_col_ss_gha']))?$college_shongothon['aain_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">আদর্শ কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_pr_num" data-title="Enter">
										<?php echo $ideal_col_pr_num=  (isset( $college_shongothon['ideal_col_pr_num']))?$college_shongothon['ideal_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_pr_bri" data-title="Enter">
										<?php echo $ideal_col_pr_bri=  (isset( $college_shongothon['ideal_col_pr_bri']))?$college_shongothon['ideal_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_pr_gha" data-title="Enter">
										<?php echo $ideal_col_pr_gha=  (isset( $college_shongothon['ideal_col_pr_gha']))?$college_shongothon['ideal_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_sn_num" data-title="Enter">
										<?php echo $ideal_col_sn_num=  (isset( $college_shongothon['ideal_col_sn_num']))?$college_shongothon['ideal_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_sn_nei" data-title="Enter">
										<?php echo $ideal_col_sn_nei=  (isset( $college_shongothon['ideal_col_sn_nei']))?$college_shongothon['ideal_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_sn_bri" data-title="Enter">
										<?php echo $ideal_col_sn_bri=  (isset( $college_shongothon['ideal_col_sn_bri']))?$college_shongothon['ideal_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_sn_gha" data-title="Enter">
										<?php echo $ideal_col_sn_gha=  (isset( $college_shongothon['ideal_col_sn_gha']))?$college_shongothon['ideal_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_th_num" data-title="Enter">
										<?php echo $ideal_col_th_num=  (isset( $college_shongothon['ideal_col_th_num']))?$college_shongothon['ideal_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_th_bri" data-title="Enter">
										<?php echo $ideal_col_th_bri=  (isset( $college_shongothon['ideal_col_th_bri']))?$college_shongothon['ideal_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_th_gha" data-title="Enter">
										<?php echo $ideal_col_th_gha=  (isset( $college_shongothon['ideal_col_th_gha']))?$college_shongothon['ideal_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_wa_num" data-title="Enter">
										<?php echo $ideal_col_wa_num=  (isset( $college_shongothon['ideal_col_wa_num']))?$college_shongothon['ideal_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_wa_bri" data-title="Enter">
										<?php echo $ideal_col_wa_bri=  (isset( $college_shongothon['ideal_col_wa_bri']))?$college_shongothon['ideal_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_wa_gha" data-title="Enter">
										<?php echo $ideal_col_wa_gha=  (isset( $college_shongothon['ideal_col_wa_gha']))?$college_shongothon['ideal_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_up_num" data-title="Enter">
										<?php echo $ideal_col_up_num=  (isset( $college_shongothon['ideal_col_up_num']))?$college_shongothon['ideal_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_up_bri" data-title="Enter">
										<?php echo $ideal_col_up_bri=  (isset( $college_shongothon['ideal_col_up_bri']))?$college_shongothon['ideal_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_up_gha" data-title="Enter">
										<?php echo $ideal_col_up_gha=  (isset( $college_shongothon['ideal_col_up_gha']))?$college_shongothon['ideal_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_ss_num" data-title="Enter">
										<?php echo $ideal_col_ss_num=  (isset( $college_shongothon['ideal_col_ss_num']))?$college_shongothon['ideal_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_ss_bri" data-title="Enter">
										<?php echo $ideal_col_ss_bri=  (isset( $college_shongothon['ideal_col_ss_bri']))?$college_shongothon['ideal_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ideal_col_ss_gha" data-title="Enter">
										<?php echo $ideal_col_ss_gha=  (isset( $college_shongothon['ideal_col_ss_gha']))?$college_shongothon['ideal_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">কৃষি কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_pr_num" data-title="Enter">
										<?php echo $agri_col_pr_num=  (isset( $college_shongothon['agri_col_pr_num']))?$college_shongothon['agri_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_pr_bri" data-title="Enter">
										<?php echo $agri_col_pr_bri=  (isset( $college_shongothon['agri_col_pr_bri']))?$college_shongothon['agri_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_pr_gha" data-title="Enter">
										<?php echo $agri_col_pr_gha=  (isset( $college_shongothon['agri_col_pr_gha']))?$college_shongothon['agri_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_sn_num" data-title="Enter">
										<?php echo $agri_col_sn_num=  (isset( $college_shongothon['agri_col_sn_num']))?$college_shongothon['agri_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_sn_nei" data-title="Enter">
										<?php echo $agri_col_sn_nei=  (isset( $college_shongothon['agri_col_sn_nei']))?$college_shongothon['agri_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_sn_bri" data-title="Enter">
										<?php echo $agri_col_sn_bri=  (isset( $college_shongothon['agri_col_sn_bri']))?$college_shongothon['agri_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_sn_gha" data-title="Enter">
										<?php echo $agri_col_sn_gha=  (isset( $college_shongothon['agri_col_sn_gha']))?$college_shongothon['agri_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_th_num" data-title="Enter">
										<?php echo $agri_col_th_num=  (isset( $college_shongothon['agri_col_th_num']))?$college_shongothon['agri_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_th_bri" data-title="Enter">
										<?php echo $agri_col_th_bri=  (isset( $college_shongothon['agri_col_th_bri']))?$college_shongothon['agri_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_th_gha" data-title="Enter">
										<?php echo $agri_col_th_gha=  (isset( $college_shongothon['agri_col_th_gha']))?$college_shongothon['agri_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_wa_num" data-title="Enter">
										<?php echo $agri_col_wa_num=  (isset( $college_shongothon['agri_col_wa_num']))?$college_shongothon['agri_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_wa_bri" data-title="Enter">
										<?php echo $agri_col_wa_bri=  (isset( $college_shongothon['agri_col_wa_bri']))?$college_shongothon['agri_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_wa_gha" data-title="Enter">
										<?php echo $agri_col_wa_gha=  (isset( $college_shongothon['agri_col_wa_gha']))?$college_shongothon['agri_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_up_num" data-title="Enter">
										<?php echo $agri_col_up_num=  (isset( $college_shongothon['agri_col_up_num']))?$college_shongothon['agri_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_up_bri" data-title="Enter">
										<?php echo $agri_col_up_bri=  (isset( $college_shongothon['agri_col_up_bri']))?$college_shongothon['agri_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_up_gha" data-title="Enter">
										<?php echo $agri_col_up_gha=  (isset( $college_shongothon['agri_col_up_gha']))?$college_shongothon['agri_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_ss_num" data-title="Enter">
										<?php echo $agri_col_ss_num=  (isset( $college_shongothon['agri_col_ss_num']))?$college_shongothon['agri_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_ss_bri" data-title="Enter">
										<?php echo $agri_col_ss_bri=  (isset( $college_shongothon['agri_col_ss_bri']))?$college_shongothon['agri_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_col_ss_gha" data-title="Enter">
										<?php echo $agri_col_ss_gha=  (isset( $college_shongothon['agri_col_ss_gha']))?$college_shongothon['agri_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">কমার্শিয়াল কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_pr_num" data-title="Enter">
										<?php echo $com_col_pr_num=  (isset( $college_shongothon['com_col_pr_num']))?$college_shongothon['com_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_pr_bri" data-title="Enter">
										<?php echo $com_col_pr_bri=  (isset( $college_shongothon['com_col_pr_bri']))?$college_shongothon['com_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_pr_gha" data-title="Enter">
										<?php echo $com_col_pr_gha=  (isset( $college_shongothon['com_col_pr_gha']))?$college_shongothon['com_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_sn_num" data-title="Enter">
										<?php echo $com_col_sn_num=  (isset( $college_shongothon['com_col_sn_num']))?$college_shongothon['com_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_sn_nei" data-title="Enter">
										<?php echo $com_col_sn_nei=  (isset( $college_shongothon['com_col_sn_nei']))?$college_shongothon['com_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_sn_bri" data-title="Enter">
										<?php echo $com_col_sn_bri=  (isset( $college_shongothon['com_col_sn_bri']))?$college_shongothon['com_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_sn_gha" data-title="Enter">
										<?php echo $com_col_sn_gha=  (isset( $college_shongothon['com_col_sn_gha']))?$college_shongothon['com_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_th_num" data-title="Enter">
										<?php echo $com_col_th_num=  (isset( $college_shongothon['com_col_th_num']))?$college_shongothon['com_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_th_bri" data-title="Enter">
										<?php echo $com_col_th_bri=  (isset( $college_shongothon['com_col_th_bri']))?$college_shongothon['com_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_th_gha" data-title="Enter">
										<?php echo $com_col_th_gha=  (isset( $college_shongothon['com_col_th_gha']))?$college_shongothon['com_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_wa_num" data-title="Enter">
										<?php echo $com_col_wa_num=  (isset( $college_shongothon['com_col_wa_num']))?$college_shongothon['com_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_wa_bri" data-title="Enter">
										<?php echo $com_col_wa_bri=  (isset( $college_shongothon['com_col_wa_bri']))?$college_shongothon['com_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_wa_gha" data-title="Enter">
										<?php echo $com_col_wa_gha=  (isset( $college_shongothon['com_col_wa_gha']))?$college_shongothon['com_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_up_num" data-title="Enter">
										<?php echo $com_col_up_num=  (isset( $college_shongothon['com_col_up_num']))?$college_shongothon['com_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_up_bri" data-title="Enter">
										<?php echo $com_col_up_bri=  (isset( $college_shongothon['com_col_up_bri']))?$college_shongothon['com_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_up_gha" data-title="Enter">
										<?php echo $com_col_up_gha=  (isset( $college_shongothon['com_col_up_gha']))?$college_shongothon['com_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_ss_num" data-title="Enter">
										<?php echo $com_col_ss_num=  (isset( $college_shongothon['com_col_ss_num']))?$college_shongothon['com_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_ss_bri" data-title="Enter">
										<?php echo $com_col_ss_bri=  (isset( $college_shongothon['com_col_ss_bri']))?$college_shongothon['com_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="com_col_ss_gha" data-title="Enter">
										<?php echo $com_col_ss_gha=  (isset( $college_shongothon['com_col_ss_gha']))?$college_shongothon['com_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">শারীরিক শিক্ষা কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_pr_num" data-title="Enter">
										<?php echo $sharirik_col_pr_num=  (isset( $college_shongothon['sharirik_col_pr_num']))?$college_shongothon['sharirik_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_pr_bri" data-title="Enter">
										<?php echo $sharirik_col_pr_bri=  (isset( $college_shongothon['sharirik_col_pr_bri']))?$college_shongothon['sharirik_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_pr_gha" data-title="Enter">
										<?php echo $sharirik_col_pr_gha=  (isset( $college_shongothon['sharirik_col_pr_gha']))?$college_shongothon['sharirik_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_sn_num" data-title="Enter">
										<?php echo $sharirik_col_sn_num=  (isset( $college_shongothon['sharirik_col_sn_num']))?$college_shongothon['sharirik_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_sn_nei" data-title="Enter">
										<?php echo $sharirik_col_sn_nei=  (isset( $college_shongothon['sharirik_col_sn_nei']))?$college_shongothon['sharirik_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_sn_bri" data-title="Enter">
										<?php echo $sharirik_col_sn_bri=  (isset( $college_shongothon['sharirik_col_sn_bri']))?$college_shongothon['sharirik_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_sn_gha" data-title="Enter">
										<?php echo $sharirik_col_sn_gha=  (isset( $college_shongothon['sharirik_col_sn_gha']))?$college_shongothon['sharirik_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_th_num" data-title="Enter">
										<?php echo $sharirik_col_th_num=  (isset( $college_shongothon['sharirik_col_th_num']))?$college_shongothon['sharirik_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_th_bri" data-title="Enter">
										<?php echo $sharirik_col_th_bri=  (isset( $college_shongothon['sharirik_col_th_bri']))?$college_shongothon['sharirik_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_th_gha" data-title="Enter">
										<?php echo $sharirik_col_th_gha=  (isset( $college_shongothon['sharirik_col_th_gha']))?$college_shongothon['sharirik_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_wa_num" data-title="Enter">
										<?php echo $sharirik_col_wa_num=  (isset( $college_shongothon['sharirik_col_wa_num']))?$college_shongothon['sharirik_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_wa_bri" data-title="Enter">
										<?php echo $sharirik_col_wa_bri=  (isset( $college_shongothon['sharirik_col_wa_bri']))?$college_shongothon['sharirik_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_wa_gha" data-title="Enter">
										<?php echo $sharirik_col_wa_gha=  (isset( $college_shongothon['sharirik_col_wa_gha']))?$college_shongothon['sharirik_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_up_num" data-title="Enter">
										<?php echo $sharirik_col_up_num=  (isset( $college_shongothon['sharirik_col_up_num']))?$college_shongothon['sharirik_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_up_bri" data-title="Enter">
										<?php echo $sharirik_col_up_bri=  (isset( $college_shongothon['sharirik_col_up_bri']))?$college_shongothon['sharirik_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_up_gha" data-title="Enter">
										<?php echo $sharirik_col_up_gha=  (isset( $college_shongothon['sharirik_col_up_gha']))?$college_shongothon['sharirik_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_ss_num" data-title="Enter">
										<?php echo $sharirik_col_ss_num=  (isset( $college_shongothon['sharirik_col_ss_num']))?$college_shongothon['sharirik_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_ss_bri" data-title="Enter">
										<?php echo $sharirik_col_ss_bri=  (isset( $college_shongothon['sharirik_col_ss_bri']))?$college_shongothon['sharirik_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharirik_col_ss_gha" data-title="Enter">
										<?php echo $sharirik_col_ss_gha=  (isset( $college_shongothon['sharirik_col_ss_gha']))?$college_shongothon['sharirik_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">চারুকলা কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_pr_num" data-title="Enter">
										<?php echo $charukola_col_pr_num=  (isset( $college_shongothon['charukola_col_pr_num']))?$college_shongothon['charukola_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_pr_bri" data-title="Enter">
										<?php echo $charukola_col_pr_bri=  (isset( $college_shongothon['charukola_col_pr_bri']))?$college_shongothon['charukola_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_pr_gha" data-title="Enter">
										<?php echo $charukola_col_pr_gha=  (isset( $college_shongothon['charukola_col_pr_gha']))?$college_shongothon['charukola_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_sn_num" data-title="Enter">
										<?php echo $charukola_col_sn_num=  (isset( $college_shongothon['charukola_col_sn_num']))?$college_shongothon['charukola_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_sn_nei" data-title="Enter">
										<?php echo $charukola_col_sn_nei=  (isset( $college_shongothon['charukola_col_sn_nei']))?$college_shongothon['charukola_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_sn_bri" data-title="Enter">
										<?php echo $charukola_col_sn_bri=  (isset( $college_shongothon['charukola_col_sn_bri']))?$college_shongothon['charukola_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_sn_gha" data-title="Enter">
										<?php echo $charukola_col_sn_gha=  (isset( $college_shongothon['charukola_col_sn_gha']))?$college_shongothon['charukola_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_th_num" data-title="Enter">
										<?php echo $charukola_col_th_num=  (isset( $college_shongothon['charukola_col_th_num']))?$college_shongothon['charukola_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_th_bri" data-title="Enter">
										<?php echo $charukola_col_th_bri=  (isset( $college_shongothon['charukola_col_th_bri']))?$college_shongothon['charukola_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_th_gha" data-title="Enter">
										<?php echo $charukola_col_th_gha=  (isset( $college_shongothon['charukola_col_th_gha']))?$college_shongothon['charukola_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_wa_num" data-title="Enter">
										<?php echo $charukola_col_wa_num=  (isset( $college_shongothon['charukola_col_wa_num']))?$college_shongothon['charukola_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_wa_bri" data-title="Enter">
										<?php echo $charukola_col_wa_bri=  (isset( $college_shongothon['charukola_col_wa_bri']))?$college_shongothon['charukola_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_wa_gha" data-title="Enter">
										<?php echo $charukola_col_wa_gha=  (isset( $college_shongothon['charukola_col_wa_gha']))?$college_shongothon['charukola_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_up_num" data-title="Enter">
										<?php echo $charukola_col_up_num=  (isset( $college_shongothon['charukola_col_up_num']))?$college_shongothon['charukola_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_up_bri" data-title="Enter">
										<?php echo $charukola_col_up_bri=  (isset( $college_shongothon['charukola_col_up_bri']))?$college_shongothon['charukola_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_up_gha" data-title="Enter">
										<?php echo $charukola_col_up_gha=  (isset( $college_shongothon['charukola_col_up_gha']))?$college_shongothon['charukola_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_ss_num" data-title="Enter">
										<?php echo $charukola_col_ss_num=  (isset( $college_shongothon['charukola_col_ss_num']))?$college_shongothon['charukola_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_ss_bri" data-title="Enter">
										<?php echo $charukola_col_ss_bri=  (isset( $college_shongothon['charukola_col_ss_bri']))?$college_shongothon['charukola_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charukola_col_ss_gha" data-title="Enter">
										<?php echo $charukola_col_ss_gha=  (isset( $college_shongothon['charukola_col_ss_gha']))?$college_shongothon['charukola_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">এইচএসসি(ভোক/বিএম) সরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_pr_num" data-title="Enter">
										<?php echo $hsc_shor_pr_num=  (isset( $college_shongothon['hsc_shor_pr_num']))?$college_shongothon['hsc_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_pr_bri" data-title="Enter">
										<?php echo $hsc_shor_pr_bri=  (isset( $college_shongothon['hsc_shor_pr_bri']))?$college_shongothon['hsc_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_pr_gha" data-title="Enter">
										<?php echo $hsc_shor_pr_gha=  (isset( $college_shongothon['hsc_shor_pr_gha']))?$college_shongothon['hsc_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_sn_num" data-title="Enter">
										<?php echo $hsc_shor_sn_num=  (isset( $college_shongothon['hsc_shor_sn_num']))?$college_shongothon['hsc_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_sn_nei" data-title="Enter">
										<?php echo $hsc_shor_sn_nei=  (isset( $college_shongothon['hsc_shor_sn_nei']))?$college_shongothon['hsc_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_sn_bri" data-title="Enter">
										<?php echo $hsc_shor_sn_bri=  (isset( $college_shongothon['hsc_shor_sn_bri']))?$college_shongothon['hsc_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_sn_gha" data-title="Enter">
										<?php echo $hsc_shor_sn_gha=  (isset( $college_shongothon['hsc_shor_sn_gha']))?$college_shongothon['hsc_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_th_num" data-title="Enter">
										<?php echo $hsc_shor_th_num=  (isset( $college_shongothon['hsc_shor_th_num']))?$college_shongothon['hsc_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_th_bri" data-title="Enter">
										<?php echo $hsc_shor_th_bri=  (isset( $college_shongothon['hsc_shor_th_bri']))?$college_shongothon['hsc_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_th_gha" data-title="Enter">
										<?php echo $hsc_shor_th_gha=  (isset( $college_shongothon['hsc_shor_th_gha']))?$college_shongothon['hsc_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_wa_num" data-title="Enter">
										<?php echo $hsc_shor_wa_num=  (isset( $college_shongothon['hsc_shor_wa_num']))?$college_shongothon['hsc_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_wa_bri" data-title="Enter">
										<?php echo $hsc_shor_wa_bri=  (isset( $college_shongothon['hsc_shor_wa_bri']))?$college_shongothon['hsc_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_wa_gha" data-title="Enter">
										<?php echo $hsc_shor_wa_gha=  (isset( $college_shongothon['hsc_shor_wa_gha']))?$college_shongothon['hsc_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_up_num" data-title="Enter">
										<?php echo $hsc_shor_up_num=  (isset( $college_shongothon['hsc_shor_up_num']))?$college_shongothon['hsc_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_up_bri" data-title="Enter">
										<?php echo $hsc_shor_up_bri=  (isset( $college_shongothon['hsc_shor_up_bri']))?$college_shongothon['hsc_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_up_gha" data-title="Enter">
										<?php echo $hsc_shor_up_gha=  (isset( $college_shongothon['hsc_shor_up_gha']))?$college_shongothon['hsc_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_ss_num" data-title="Enter">
										<?php echo $hsc_shor_ss_num=  (isset( $college_shongothon['hsc_shor_ss_num']))?$college_shongothon['hsc_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_ss_bri" data-title="Enter">
										<?php echo $hsc_shor_ss_bri=  (isset( $college_shongothon['hsc_shor_ss_bri']))?$college_shongothon['hsc_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_shor_ss_gha" data-title="Enter">
										<?php echo $hsc_shor_ss_gha=  (isset( $college_shongothon['hsc_shor_ss_gha']))?$college_shongothon['hsc_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">এইচএসসি(ভোক/বিএম)বেসরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_pr_num" data-title="Enter">
										<?php echo $hsc_beshor_pr_num=  (isset( $college_shongothon['hsc_beshor_pr_num']))?$college_shongothon['hsc_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_pr_bri" data-title="Enter">
										<?php echo $hsc_beshor_pr_bri=  (isset( $college_shongothon['hsc_beshor_pr_bri']))?$college_shongothon['hsc_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_pr_gha" data-title="Enter">
										<?php echo $hsc_beshor_pr_gha=  (isset( $college_shongothon['hsc_beshor_pr_gha']))?$college_shongothon['hsc_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_sn_num" data-title="Enter">
										<?php echo $hsc_beshor_sn_num=  (isset( $college_shongothon['hsc_beshor_sn_num']))?$college_shongothon['hsc_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_sn_nei" data-title="Enter">
										<?php echo $hsc_beshor_sn_nei=  (isset( $college_shongothon['hsc_beshor_sn_nei']))?$college_shongothon['hsc_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_sn_bri" data-title="Enter">
										<?php echo $hsc_beshor_sn_bri=  (isset( $college_shongothon['hsc_beshor_sn_bri']))?$college_shongothon['hsc_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_sn_gha" data-title="Enter">
										<?php echo $hsc_beshor_sn_gha=  (isset( $college_shongothon['hsc_beshor_sn_gha']))?$college_shongothon['hsc_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_th_num" data-title="Enter">
										<?php echo $hsc_beshor_th_num=  (isset( $college_shongothon['hsc_beshor_th_num']))?$college_shongothon['hsc_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_th_bri" data-title="Enter">
										<?php echo $hsc_beshor_th_bri=  (isset( $college_shongothon['hsc_beshor_th_bri']))?$college_shongothon['hsc_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_th_gha" data-title="Enter">
										<?php echo $hsc_beshor_th_gha=  (isset( $college_shongothon['hsc_beshor_th_gha']))?$college_shongothon['hsc_beshor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_wa_num" data-title="Enter">
										<?php echo $hsc_beshor_wa_num=  (isset( $college_shongothon['hsc_beshor_wa_num']))?$college_shongothon['hsc_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_wa_bri" data-title="Enter">
										<?php echo $hsc_beshor_wa_bri=  (isset( $college_shongothon['hsc_beshor_wa_bri']))?$college_shongothon['hsc_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_wa_gha" data-title="Enter">
										<?php echo $hsc_beshor_wa_gha=  (isset( $college_shongothon['hsc_beshor_wa_gha']))?$college_shongothon['hsc_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_up_num" data-title="Enter">
										<?php echo $hsc_beshor_up_num=  (isset( $college_shongothon['hsc_beshor_up_num']))?$college_shongothon['hsc_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_up_bri" data-title="Enter">
										<?php echo $hsc_beshor_up_bri=  (isset( $college_shongothon['hsc_beshor_up_bri']))?$college_shongothon['hsc_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_up_gha" data-title="Enter">
										<?php echo $hsc_beshor_up_gha=  (isset( $college_shongothon['hsc_beshor_up_gha']))?$college_shongothon['hsc_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_ss_num" data-title="Enter">
										<?php echo $hsc_beshor_ss_num=  (isset( $college_shongothon['hsc_beshor_ss_num']))?$college_shongothon['hsc_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_ss_bri" data-title="Enter">
										<?php echo $hsc_beshor_ss_bri=  (isset( $college_shongothon['hsc_beshor_ss_bri']))?$college_shongothon['hsc_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_beshor_ss_gha" data-title="Enter">
										<?php echo $hsc_beshor_ss_gha=  (isset( $college_shongothon['hsc_beshor_ss_gha']))?$college_shongothon['hsc_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">টেক্সটাইল ইন্জিনিয়ারিং কলেজ </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_pr_num" data-title="Enter">
										<?php echo $text_eng_col_pr_num=  (isset( $college_shongothon['text_eng_col_pr_num']))?$college_shongothon['text_eng_col_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_pr_bri" data-title="Enter">
										<?php echo $text_eng_col_pr_bri=  (isset( $college_shongothon['text_eng_col_pr_bri']))?$college_shongothon['text_eng_col_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_pr_gha" data-title="Enter">
										<?php echo $text_eng_col_pr_gha=  (isset( $college_shongothon['text_eng_col_pr_gha']))?$college_shongothon['text_eng_col_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_sn_num" data-title="Enter">
										<?php echo $text_eng_col_sn_num=  (isset( $college_shongothon['text_eng_col_sn_num']))?$college_shongothon['text_eng_col_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_sn_nei" data-title="Enter">
										<?php echo $text_eng_col_sn_nei=  (isset( $college_shongothon['text_eng_col_sn_nei']))?$college_shongothon['text_eng_col_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_sn_bri" data-title="Enter">
										<?php echo $text_eng_col_sn_bri=  (isset( $college_shongothon['text_eng_col_sn_bri']))?$college_shongothon['text_eng_col_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_sn_gha" data-title="Enter">
										<?php echo $text_eng_col_sn_gha=  (isset( $college_shongothon['text_eng_col_sn_gha']))?$college_shongothon['text_eng_col_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_th_num" data-title="Enter">
										<?php echo $text_eng_col_th_num=  (isset( $college_shongothon['text_eng_col_th_num']))?$college_shongothon['text_eng_col_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_th_bri" data-title="Enter">
										<?php echo $text_eng_col_th_bri=  (isset( $college_shongothon['text_eng_col_th_bri']))?$college_shongothon['text_eng_col_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_th_gha" data-title="Enter">
										<?php echo $text_eng_col_th_gha=  (isset( $college_shongothon['text_eng_col_th_gha']))?$college_shongothon['text_eng_col_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_wa_num" data-title="Enter">
										<?php echo $text_eng_col_wa_num=  (isset( $college_shongothon['text_eng_col_wa_num']))?$college_shongothon['text_eng_col_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_wa_bri" data-title="Enter">
										<?php echo $text_eng_col_wa_bri=  (isset( $college_shongothon['text_eng_col_wa_bri']))?$college_shongothon['text_eng_col_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_wa_gha" data-title="Enter">
										<?php echo $text_eng_col_wa_gha=  (isset( $college_shongothon['text_eng_col_wa_gha']))?$college_shongothon['text_eng_col_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_up_num" data-title="Enter">
										<?php echo $text_eng_col_up_num=  (isset( $college_shongothon['text_eng_col_up_num']))?$college_shongothon['text_eng_col_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_up_bri" data-title="Enter">
										<?php echo $text_eng_col_up_bri=  (isset( $college_shongothon['text_eng_col_up_bri']))?$college_shongothon['text_eng_col_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_up_gha" data-title="Enter">
										<?php echo $text_eng_col_up_gha=  (isset( $college_shongothon['text_eng_col_up_gha']))?$college_shongothon['text_eng_col_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_ss_num" data-title="Enter">
										<?php echo $text_eng_col_ss_num=  (isset( $college_shongothon['text_eng_col_ss_num']))?$college_shongothon['text_eng_col_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_ss_bri" data-title="Enter">
										<?php echo $text_eng_col_ss_bri=  (isset( $college_shongothon['text_eng_col_ss_bri']))?$college_shongothon['text_eng_col_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_eng_col_ss_gha" data-title="Enter">
										<?php echo $text_eng_col_ss_gha=  (isset( $college_shongothon['text_eng_col_ss_gha']))?$college_shongothon['text_eng_col_ss_gha']:0; ?></a>

                                </td>

                            </tr>


                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                            <td class="tg-pwj7" colspan="17"><b>ডিপ্লোমা  ইনিষ্টিটিউট</b></td>
                            <td class="tg-pwj7" colspan="3">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'College_ডিপ্লোমা  ইনিষ্টিটিউট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ধরন</td>
                                <td class="tg-pwj7" colspan="3">প্রতিষ্ঠান  </td>
                                <td class="tg-pwj7" colspan="4">সংগঠন   </td>
                               
                                <td class="tg-pwj7" colspan="3"> থানা মানের  </td>
                                <td class="tg-pwj7" colspan="3"> ওয়ার্ড মানের  </td>
                                <td class="tg-pwj7" colspan="3">উপশাখা মানের  </td>
                                <td class="tg-pwj7" colspan="3">সমর্থক সংগঠন  </td>
                            </tr>

                            <tr>

                                <td class="tg-pwj7"><div><span> সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>নেই </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>


                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি</span></div></td>


                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                                
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                            </tr>



                            <tr>
                                <td class="tg-y698 ">পলিটেকনিক ইনিস্টিটিউট সরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_pr_num" data-title="Enter">
										<?php echo $pol_ins_shor_pr_num=  (isset( $college_shongothon['pol_ins_shor_pr_num']))?$college_shongothon['pol_ins_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_pr_bri" data-title="Enter">
										<?php echo $pol_ins_shor_pr_bri=  (isset( $college_shongothon['pol_ins_shor_pr_bri']))?$college_shongothon['pol_ins_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_pr_gha" data-title="Enter">
										<?php echo $pol_ins_shor_pr_gha=  (isset( $college_shongothon['pol_ins_shor_pr_gha']))?$college_shongothon['pol_ins_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_sn_num" data-title="Enter">
										<?php echo $pol_ins_shor_sn_num=  (isset( $college_shongothon['pol_ins_shor_sn_num']))?$college_shongothon['pol_ins_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_sn_nei" data-title="Enter">
										<?php echo $pol_ins_shor_sn_nei=  (isset( $college_shongothon['pol_ins_shor_sn_nei']))?$college_shongothon['pol_ins_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_sn_bri" data-title="Enter">
										<?php echo $pol_ins_shor_sn_bri=  (isset( $college_shongothon['pol_ins_shor_sn_bri']))?$college_shongothon['pol_ins_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_sn_gha" data-title="Enter">
										<?php echo $pol_ins_shor_sn_gha=  (isset( $college_shongothon['pol_ins_shor_sn_gha']))?$college_shongothon['pol_ins_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_th_num" data-title="Enter">
										<?php echo $pol_ins_shor_th_num=  (isset( $college_shongothon['pol_ins_shor_th_num']))?$college_shongothon['pol_ins_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_th_bri" data-title="Enter">
										<?php echo $pol_ins_shor_th_bri=  (isset( $college_shongothon['pol_ins_shor_th_bri']))?$college_shongothon['pol_ins_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_th_gha" data-title="Enter">
										<?php echo $pol_ins_shor_th_gha=  (isset( $college_shongothon['pol_ins_shor_th_gha']))?$college_shongothon['pol_ins_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_wa_num" data-title="Enter">
										<?php echo $pol_ins_shor_wa_num=  (isset( $college_shongothon['pol_ins_shor_wa_num']))?$college_shongothon['pol_ins_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_wa_bri" data-title="Enter">
										<?php echo $pol_ins_shor_wa_bri=  (isset( $college_shongothon['pol_ins_shor_wa_bri']))?$college_shongothon['pol_ins_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_wa_gha" data-title="Enter">
										<?php echo $pol_ins_shor_wa_gha=  (isset( $college_shongothon['pol_ins_shor_wa_gha']))?$college_shongothon['pol_ins_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_up_num" data-title="Enter">
										<?php echo $pol_ins_shor_up_num=  (isset( $college_shongothon['pol_ins_shor_up_num']))?$college_shongothon['pol_ins_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_up_bri" data-title="Enter">
										<?php echo $pol_ins_shor_up_bri=  (isset( $college_shongothon['pol_ins_shor_up_bri']))?$college_shongothon['pol_ins_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_up_gha" data-title="Enter">
										<?php echo $pol_ins_shor_up_gha=  (isset( $college_shongothon['pol_ins_shor_up_gha']))?$college_shongothon['pol_ins_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_ss_num" data-title="Enter">
										<?php echo $pol_ins_shor_ss_num=  (isset( $college_shongothon['pol_ins_shor_ss_num']))?$college_shongothon['pol_ins_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_ss_bri" data-title="Enter">
										<?php echo $pol_ins_shor_ss_bri=  (isset( $college_shongothon['pol_ins_shor_ss_bri']))?$college_shongothon['pol_ins_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_shor_ss_gha" data-title="Enter">
										<?php echo $pol_ins_shor_ss_gha=  (isset( $college_shongothon['pol_ins_shor_ss_gha']))?$college_shongothon['pol_ins_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698 ">পলিটেকনিক ইনিস্টিটিউট বেসরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_pr_num" data-title="Enter">
										<?php echo $pol_ins_beshor_pr_num=  (isset( $college_shongothon['pol_ins_beshor_pr_num']))?$college_shongothon['pol_ins_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_pr_bri" data-title="Enter">
										<?php echo $pol_ins_beshor_pr_bri=  (isset( $college_shongothon['pol_ins_beshor_pr_bri']))?$college_shongothon['pol_ins_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_pr_gha" data-title="Enter">
										<?php echo $pol_ins_beshor_pr_gha=  (isset( $college_shongothon['pol_ins_beshor_pr_gha']))?$college_shongothon['pol_ins_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_sn_num" data-title="Enter">
										<?php echo $pol_ins_beshor_sn_num=  (isset( $college_shongothon['pol_ins_beshor_sn_num']))?$college_shongothon['pol_ins_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_sn_nei" data-title="Enter">
										<?php echo $pol_ins_beshor_sn_nei=  (isset( $college_shongothon['pol_ins_beshor_sn_nei']))?$college_shongothon['pol_ins_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_sn_bri" data-title="Enter">
										<?php echo $pol_ins_beshor_sn_bri=  (isset( $college_shongothon['pol_ins_beshor_sn_bri']))?$college_shongothon['pol_ins_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_sn_gha" data-title="Enter">
										<?php echo $pol_ins_beshor_sn_gha=  (isset( $college_shongothon['pol_ins_beshor_sn_gha']))?$college_shongothon['pol_ins_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_th_num" data-title="Enter">
										<?php echo $pol_ins_beshor_th_num=  (isset( $college_shongothon['pol_ins_beshor_th_num']))?$college_shongothon['pol_ins_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_th_bri" data-title="Enter">
										<?php echo $pol_ins_beshor_th_bri=  (isset( $college_shongothon['pol_ins_beshor_th_bri']))?$college_shongothon['pol_ins_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_th_gha" data-title="Enter">
										<?php echo $pol_ins_beshor_th_gha=  (isset( $college_shongothon['pol_ins_beshor_th_gha']))?$college_shongothon['pol_ins_beshor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_wa_num" data-title="Enter">
										<?php echo $pol_ins_beshor_wa_num=  (isset( $college_shongothon['pol_ins_beshor_wa_num']))?$college_shongothon['pol_ins_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_wa_bri" data-title="Enter">
										<?php echo $pol_ins_beshor_wa_bri=  (isset( $college_shongothon['pol_ins_beshor_wa_bri']))?$college_shongothon['pol_ins_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_wa_gha" data-title="Enter">
										<?php echo $pol_ins_beshor_wa_gha=  (isset( $college_shongothon['pol_ins_beshor_wa_gha']))?$college_shongothon['pol_ins_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_up_num" data-title="Enter">
										<?php echo $pol_ins_beshor_up_num=  (isset( $college_shongothon['pol_ins_beshor_up_num']))?$college_shongothon['pol_ins_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_up_bri" data-title="Enter">
										<?php echo $pol_ins_beshor_up_bri=  (isset( $college_shongothon['pol_ins_beshor_up_bri']))?$college_shongothon['pol_ins_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_up_gha" data-title="Enter">
										<?php echo $pol_ins_beshor_up_gha=  (isset( $college_shongothon['pol_ins_beshor_up_gha']))?$college_shongothon['pol_ins_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_ss_num" data-title="Enter">
										<?php echo $pol_ins_beshor_ss_num=  (isset( $college_shongothon['pol_ins_beshor_ss_num']))?$college_shongothon['pol_ins_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_ss_bri" data-title="Enter">
										<?php echo $pol_ins_beshor_ss_bri=  (isset( $college_shongothon['pol_ins_beshor_ss_bri']))?$college_shongothon['pol_ins_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pol_ins_beshor_ss_gha" data-title="Enter">
										<?php echo $pol_ins_beshor_ss_gha=  (isset( $college_shongothon['pol_ins_beshor_ss_gha']))?$college_shongothon['pol_ins_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">টেক্সটাইল ইনিষ্টিটিউট সরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_pr_num" data-title="Enter">
										<?php echo $text_ins_shor_pr_num=  (isset( $college_shongothon['text_ins_shor_pr_num']))?$college_shongothon['text_ins_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_pr_bri" data-title="Enter">
										<?php echo $text_ins_shor_pr_bri=  (isset( $college_shongothon['text_ins_shor_pr_bri']))?$college_shongothon['text_ins_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_pr_gha" data-title="Enter">
										<?php echo $text_ins_shor_pr_gha=  (isset( $college_shongothon['text_ins_shor_pr_gha']))?$college_shongothon['text_ins_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_sn_num" data-title="Enter">
										<?php echo $text_ins_shor_sn_num=  (isset( $college_shongothon['text_ins_shor_sn_num']))?$college_shongothon['text_ins_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_sn_nei" data-title="Enter">
										<?php echo $text_ins_shor_sn_nei=  (isset( $college_shongothon['text_ins_shor_sn_nei']))?$college_shongothon['text_ins_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_sn_bri" data-title="Enter">
										<?php echo $text_ins_shor_sn_bri=  (isset( $college_shongothon['text_ins_shor_sn_bri']))?$college_shongothon['text_ins_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_sn_gha" data-title="Enter">
										<?php echo $text_ins_shor_sn_gha=  (isset( $college_shongothon['text_ins_shor_sn_gha']))?$college_shongothon['text_ins_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_th_num" data-title="Enter">
										<?php echo $text_ins_shor_th_num=  (isset( $college_shongothon['text_ins_shor_th_num']))?$college_shongothon['text_ins_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_th_bri" data-title="Enter">
										<?php echo $text_ins_shor_th_bri=  (isset( $college_shongothon['text_ins_shor_th_bri']))?$college_shongothon['text_ins_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_th_gha" data-title="Enter">
										<?php echo $text_ins_shor_th_gha=  (isset( $college_shongothon['text_ins_shor_th_gha']))?$college_shongothon['text_ins_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_wa_num" data-title="Enter">
										<?php echo $text_ins_shor_wa_num=  (isset( $college_shongothon['text_ins_shor_wa_num']))?$college_shongothon['text_ins_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_wa_bri" data-title="Enter">
										<?php echo $text_ins_shor_wa_bri=  (isset( $college_shongothon['text_ins_shor_wa_bri']))?$college_shongothon['text_ins_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_wa_gha" data-title="Enter">
										<?php echo $text_ins_shor_wa_gha=  (isset( $college_shongothon['text_ins_shor_wa_gha']))?$college_shongothon['text_ins_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_up_num" data-title="Enter">
										<?php echo $text_ins_shor_up_num=  (isset( $college_shongothon['text_ins_shor_up_num']))?$college_shongothon['text_ins_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_up_bri" data-title="Enter">
										<?php echo $text_ins_shor_up_bri=  (isset( $college_shongothon['text_ins_shor_up_bri']))?$college_shongothon['text_ins_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_up_gha" data-title="Enter">
										<?php echo $text_ins_shor_up_gha=  (isset( $college_shongothon['text_ins_shor_up_gha']))?$college_shongothon['text_ins_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_ss_num" data-title="Enter">
										<?php echo $text_ins_shor_ss_num=  (isset( $college_shongothon['text_ins_shor_ss_num']))?$college_shongothon['text_ins_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_ss_bri" data-title="Enter">
										<?php echo $text_ins_shor_ss_bri=  (isset( $college_shongothon['text_ins_shor_ss_bri']))?$college_shongothon['text_ins_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_shor_ss_gha" data-title="Enter">
										<?php echo $text_ins_shor_ss_gha=  (isset( $college_shongothon['text_ins_shor_ss_gha']))?$college_shongothon['text_ins_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">টেক্সটাইল ইনিস্টিটিউট বেসরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_pr_num" data-title="Enter">
										<?php echo $text_ins_beshor_pr_num=  (isset( $college_shongothon['text_ins_beshor_pr_num']))?$college_shongothon['text_ins_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_pr_bri" data-title="Enter">
										<?php echo $text_ins_beshor_pr_bri=  (isset( $college_shongothon['text_ins_beshor_pr_bri']))?$college_shongothon['text_ins_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_pr_gha" data-title="Enter">
										<?php echo $text_ins_beshor_pr_gha=  (isset( $college_shongothon['text_ins_beshor_pr_gha']))?$college_shongothon['text_ins_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_sn_num" data-title="Enter">
										<?php echo $text_ins_beshor_sn_num=  (isset( $college_shongothon['text_ins_beshor_sn_num']))?$college_shongothon['text_ins_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_sn_nei" data-title="Enter">
										<?php echo $text_ins_beshor_sn_nei=  (isset( $college_shongothon['text_ins_beshor_sn_nei']))?$college_shongothon['text_ins_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_sn_bri" data-title="Enter">
										<?php echo $text_ins_beshor_sn_bri=  (isset( $college_shongothon['text_ins_beshor_sn_bri']))?$college_shongothon['text_ins_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_sn_gha" data-title="Enter">
										<?php echo $text_ins_beshor_sn_gha=  (isset( $college_shongothon['text_ins_beshor_sn_gha']))?$college_shongothon['text_ins_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_th_num" data-title="Enter">
										<?php echo $text_ins_beshor_th_num=  (isset( $college_shongothon['text_ins_beshor_th_num']))?$college_shongothon['text_ins_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_th_bri" data-title="Enter">
										<?php echo $text_ins_beshor_th_bri=  (isset( $college_shongothon['text_ins_beshor_th_bri']))?$college_shongothon['text_ins_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_th_gha" data-title="Enter">
										<?php echo $text_ins_beshor_th_gha=  (isset( $college_shongothon['text_ins_beshor_th_gha']))?$college_shongothon['text_ins_beshor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_wa_num" data-title="Enter">
										<?php echo $text_ins_beshor_wa_num=  (isset( $college_shongothon['text_ins_beshor_wa_num']))?$college_shongothon['text_ins_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_wa_bri" data-title="Enter">
										<?php echo $text_ins_beshor_wa_bri=  (isset( $college_shongothon['text_ins_beshor_wa_bri']))?$college_shongothon['text_ins_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_wa_gha" data-title="Enter">
										<?php echo $text_ins_beshor_wa_gha=  (isset( $college_shongothon['text_ins_beshor_wa_gha']))?$college_shongothon['text_ins_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_up_num" data-title="Enter">
										<?php echo $text_ins_beshor_up_num=  (isset( $college_shongothon['text_ins_beshor_up_num']))?$college_shongothon['text_ins_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_up_bri" data-title="Enter">
										<?php echo $text_ins_beshor_up_bri=  (isset( $college_shongothon['text_ins_beshor_up_bri']))?$college_shongothon['text_ins_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_up_gha" data-title="Enter">
										<?php echo $text_ins_beshor_up_gha=  (isset( $college_shongothon['text_ins_beshor_up_gha']))?$college_shongothon['text_ins_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_ss_num" data-title="Enter">
										<?php echo $text_ins_beshor_ss_num=  (isset( $college_shongothon['text_ins_beshor_ss_num']))?$college_shongothon['text_ins_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_ss_bri" data-title="Enter">
										<?php echo $text_ins_beshor_ss_bri=  (isset( $college_shongothon['text_ins_beshor_ss_bri']))?$college_shongothon['text_ins_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_ins_beshor_ss_gha" data-title="Enter">
										<?php echo $text_ins_beshor_ss_gha=  (isset( $college_shongothon['text_ins_beshor_ss_gha']))?$college_shongothon['text_ins_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">টেক্সটাইল ভোকেশনাল </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_pr_num" data-title="Enter">
										<?php echo $text_voc_pr_num=  (isset( $college_shongothon['text_voc_pr_num']))?$college_shongothon['text_voc_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_pr_bri" data-title="Enter">
										<?php echo $text_voc_pr_bri=  (isset( $college_shongothon['text_voc_pr_bri']))?$college_shongothon['text_voc_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_pr_gha" data-title="Enter">
										<?php echo $text_voc_pr_gha=  (isset( $college_shongothon['text_voc_pr_gha']))?$college_shongothon['text_voc_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_sn_num" data-title="Enter">
										<?php echo $text_voc_sn_num=  (isset( $college_shongothon['text_voc_sn_num']))?$college_shongothon['text_voc_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_sn_nei" data-title="Enter">
										<?php echo $text_voc_sn_nei=  (isset( $college_shongothon['text_voc_sn_nei']))?$college_shongothon['text_voc_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_sn_bri" data-title="Enter">
										<?php echo $text_voc_sn_bri=  (isset( $college_shongothon['text_voc_sn_bri']))?$college_shongothon['text_voc_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_sn_gha" data-title="Enter">
										<?php echo $text_voc_sn_gha=  (isset( $college_shongothon['text_voc_sn_gha']))?$college_shongothon['text_voc_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_th_num" data-title="Enter">
										<?php echo $text_voc_th_num=  (isset( $college_shongothon['text_voc_th_num']))?$college_shongothon['text_voc_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_th_bri" data-title="Enter">
										<?php echo $text_voc_th_bri=  (isset( $college_shongothon['text_voc_th_bri']))?$college_shongothon['text_voc_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_th_gha" data-title="Enter">
										<?php echo $text_voc_th_gha=  (isset( $college_shongothon['text_voc_th_gha']))?$college_shongothon['text_voc_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_wa_num" data-title="Enter">
										<?php echo $text_voc_wa_num=  (isset( $college_shongothon['text_voc_wa_num']))?$college_shongothon['text_voc_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_wa_bri" data-title="Enter">
										<?php echo $text_voc_wa_bri=  (isset( $college_shongothon['text_voc_wa_bri']))?$college_shongothon['text_voc_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_wa_gha" data-title="Enter">
										<?php echo $text_voc_wa_gha=  (isset( $college_shongothon['text_voc_wa_gha']))?$college_shongothon['text_voc_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_up_num" data-title="Enter">
										<?php echo $text_voc_up_num=  (isset( $college_shongothon['text_voc_up_num']))?$college_shongothon['text_voc_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_up_bri" data-title="Enter">
										<?php echo $text_voc_up_bri=  (isset( $college_shongothon['text_voc_up_bri']))?$college_shongothon['text_voc_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_up_gha" data-title="Enter">
										<?php echo $text_voc_up_gha=  (isset( $college_shongothon['text_voc_up_gha']))?$college_shongothon['text_voc_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_ss_num" data-title="Enter">
										<?php echo $text_voc_ss_num=  (isset( $college_shongothon['text_voc_ss_num']))?$college_shongothon['text_voc_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_ss_bri" data-title="Enter">
										<?php echo $text_voc_ss_bri=  (isset( $college_shongothon['text_voc_ss_bri']))?$college_shongothon['text_voc_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="text_voc_ss_gha" data-title="Enter">
										<?php echo $text_voc_ss_gha=  (isset( $college_shongothon['text_voc_ss_gha']))?$college_shongothon['text_voc_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">সার্ভে ইনিস্টিটিউট </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_pr_num" data-title="Enter">
										<?php echo $surve_ins_pr_num=  (isset( $college_shongothon['surve_ins_pr_num']))?$college_shongothon['surve_ins_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_pr_bri" data-title="Enter">
										<?php echo $surve_ins_pr_bri=  (isset( $college_shongothon['surve_ins_pr_bri']))?$college_shongothon['surve_ins_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_pr_gha" data-title="Enter">
										<?php echo $surve_ins_pr_gha=  (isset( $college_shongothon['surve_ins_pr_gha']))?$college_shongothon['surve_ins_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_sn_num" data-title="Enter">
										<?php echo $surve_ins_sn_num=  (isset( $college_shongothon['surve_ins_sn_num']))?$college_shongothon['surve_ins_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_sn_nei" data-title="Enter">
										<?php echo $surve_ins_sn_nei=  (isset( $college_shongothon['surve_ins_sn_nei']))?$college_shongothon['surve_ins_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_sn_bri" data-title="Enter">
										<?php echo $surve_ins_sn_bri=  (isset( $college_shongothon['surve_ins_sn_bri']))?$college_shongothon['surve_ins_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_sn_gha" data-title="Enter">
										<?php echo $surve_ins_sn_gha=  (isset( $college_shongothon['surve_ins_sn_gha']))?$college_shongothon['surve_ins_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_th_num" data-title="Enter">
										<?php echo $surve_ins_th_num=  (isset( $college_shongothon['surve_ins_th_num']))?$college_shongothon['surve_ins_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_th_bri" data-title="Enter">
										<?php echo $surve_ins_th_bri=  (isset( $college_shongothon['surve_ins_th_bri']))?$college_shongothon['surve_ins_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_th_gha" data-title="Enter">
										<?php echo $surve_ins_th_gha=  (isset( $college_shongothon['surve_ins_th_gha']))?$college_shongothon['surve_ins_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_wa_num" data-title="Enter">
										<?php echo $surve_ins_wa_num=  (isset( $college_shongothon['surve_ins_wa_num']))?$college_shongothon['surve_ins_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_wa_bri" data-title="Enter">
										<?php echo $surve_ins_wa_bri=  (isset( $college_shongothon['surve_ins_wa_bri']))?$college_shongothon['surve_ins_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_wa_gha" data-title="Enter">
										<?php echo $surve_ins_wa_gha=  (isset( $college_shongothon['surve_ins_wa_gha']))?$college_shongothon['surve_ins_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_up_num" data-title="Enter">
										<?php echo $surve_ins_up_num=  (isset( $college_shongothon['surve_ins_up_num']))?$college_shongothon['surve_ins_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_up_bri" data-title="Enter">
										<?php echo $surve_ins_up_bri=  (isset( $college_shongothon['surve_ins_up_bri']))?$college_shongothon['surve_ins_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_up_gha" data-title="Enter">
										<?php echo $surve_ins_up_gha=  (isset( $college_shongothon['surve_ins_up_gha']))?$college_shongothon['surve_ins_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_ss_num" data-title="Enter">
										<?php echo $surve_ins_ss_num=  (isset( $college_shongothon['surve_ins_ss_num']))?$college_shongothon['surve_ins_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_ss_bri" data-title="Enter">
										<?php echo $surve_ins_ss_bri=  (isset( $college_shongothon['surve_ins_ss_bri']))?$college_shongothon['surve_ins_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="surve_ins_ss_gha" data-title="Enter">
										<?php echo $surve_ins_ss_gha=  (isset( $college_shongothon['surve_ins_ss_gha']))?$college_shongothon['surve_ins_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">কৃষি ইনিস্টিটিউট সরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_pr_num" data-title="Enter">
										<?php echo $agri_ins_shor_pr_num=  (isset( $college_shongothon['agri_ins_shor_pr_num']))?$college_shongothon['agri_ins_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_pr_bri" data-title="Enter">
										<?php echo $agri_ins_shor_pr_bri=  (isset( $college_shongothon['agri_ins_shor_pr_bri']))?$college_shongothon['agri_ins_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_pr_gha" data-title="Enter">
										<?php echo $agri_ins_shor_pr_gha=  (isset( $college_shongothon['agri_ins_shor_pr_gha']))?$college_shongothon['agri_ins_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_sn_num" data-title="Enter">
										<?php echo $agri_ins_shor_sn_num=  (isset( $college_shongothon['agri_ins_shor_sn_num']))?$college_shongothon['agri_ins_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_sn_nei" data-title="Enter">
										<?php echo $agri_ins_shor_sn_nei=  (isset( $college_shongothon['agri_ins_shor_sn_nei']))?$college_shongothon['agri_ins_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_sn_bri" data-title="Enter">
										<?php echo $agri_ins_shor_sn_bri=  (isset( $college_shongothon['agri_ins_shor_sn_bri']))?$college_shongothon['agri_ins_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_sn_gha" data-title="Enter">
										<?php echo $agri_ins_shor_sn_gha=  (isset( $college_shongothon['agri_ins_shor_sn_gha']))?$college_shongothon['agri_ins_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_th_num" data-title="Enter">
										<?php echo $agri_ins_shor_th_num=  (isset( $college_shongothon['agri_ins_shor_th_num']))?$college_shongothon['agri_ins_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_th_bri" data-title="Enter">
										<?php echo $agri_ins_shor_th_bri=  (isset( $college_shongothon['agri_ins_shor_th_bri']))?$college_shongothon['agri_ins_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_th_gha" data-title="Enter">
										<?php echo $agri_ins_shor_th_gha=  (isset( $college_shongothon['agri_ins_shor_th_gha']))?$college_shongothon['agri_ins_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_wa_num" data-title="Enter">
										<?php echo $agri_ins_shor_wa_num=  (isset( $college_shongothon['agri_ins_shor_wa_num']))?$college_shongothon['agri_ins_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_wa_bri" data-title="Enter">
										<?php echo $agri_ins_shor_wa_bri=  (isset( $college_shongothon['agri_ins_shor_wa_bri']))?$college_shongothon['agri_ins_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_wa_gha" data-title="Enter">
										<?php echo $agri_ins_shor_wa_gha=  (isset( $college_shongothon['agri_ins_shor_wa_gha']))?$college_shongothon['agri_ins_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_up_num" data-title="Enter">
										<?php echo $agri_ins_shor_up_num=  (isset( $college_shongothon['agri_ins_shor_up_num']))?$college_shongothon['agri_ins_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_up_bri" data-title="Enter">
										<?php echo $agri_ins_shor_up_bri=  (isset( $college_shongothon['agri_ins_shor_up_bri']))?$college_shongothon['agri_ins_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_up_gha" data-title="Enter">
										<?php echo $agri_ins_shor_up_gha=  (isset( $college_shongothon['agri_ins_shor_up_gha']))?$college_shongothon['agri_ins_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_ss_num" data-title="Enter">
										<?php echo $agri_ins_shor_ss_num=  (isset( $college_shongothon['agri_ins_shor_ss_num']))?$college_shongothon['agri_ins_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_ss_bri" data-title="Enter">
										<?php echo $agri_ins_shor_ss_bri=  (isset( $college_shongothon['agri_ins_shor_ss_bri']))?$college_shongothon['agri_ins_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_ins_shor_ss_gha" data-title="Enter">
										<?php echo $agri_ins_shor_ss_gha=  (isset( $college_shongothon['agri_ins_shor_ss_gha']))?$college_shongothon['agri_ins_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">কৃষি ইনিস্টিটিউট বেসরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_pr_num" data-title="Enter">
										<?php echo $agri_in_beshor_pr_num=  (isset( $college_shongothon['agri_in_beshor_pr_num']))?$college_shongothon['agri_in_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_pr_bri" data-title="Enter">
										<?php echo $agri_in_beshor_pr_bri=  (isset( $college_shongothon['agri_in_beshor_pr_bri']))?$college_shongothon['agri_in_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_pr_gha" data-title="Enter">
										<?php echo $agri_in_beshor_pr_gha=  (isset( $college_shongothon['agri_in_beshor_pr_gha']))?$college_shongothon['agri_in_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_sn_num" data-title="Enter">
										<?php echo $agri_in_beshor_sn_num=  (isset( $college_shongothon['agri_in_beshor_sn_num']))?$college_shongothon['agri_in_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_sn_nei" data-title="Enter">
										<?php echo $agri_in_beshor_sn_nei=  (isset( $college_shongothon['agri_in_beshor_sn_nei']))?$college_shongothon['agri_in_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_sn_bri" data-title="Enter">
										<?php echo $agri_in_beshor_sn_bri=  (isset( $college_shongothon['agri_in_beshor_sn_bri']))?$college_shongothon['agri_in_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_sn_gha" data-title="Enter">
										<?php echo $agri_in_beshor_sn_gha=  (isset( $college_shongothon['agri_in_beshor_sn_gha']))?$college_shongothon['agri_in_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_th_num" data-title="Enter">
										<?php echo $agri_in_beshor_th_num=  (isset( $college_shongothon['agri_in_beshor_th_num']))?$college_shongothon['agri_in_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_th_bri" data-title="Enter">
										<?php echo $agri_in_beshor_th_bri=  (isset( $college_shongothon['agri_in_beshor_th_bri']))?$college_shongothon['agri_in_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_th_gha" data-title="Enter">
										<?php echo $agri_in_beshor_th_gha=  (isset( $college_shongothon['agri_in_beshor_th_gha']))?$college_shongothon['agri_in_beshor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_wa_num" data-title="Enter">
										<?php echo $agri_in_beshor_wa_num=  (isset( $college_shongothon['agri_in_beshor_wa_num']))?$college_shongothon['agri_in_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_wa_bri" data-title="Enter">
										<?php echo $agri_in_beshor_wa_bri=  (isset( $college_shongothon['agri_in_beshor_wa_bri']))?$college_shongothon['agri_in_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_wa_gha" data-title="Enter">
										<?php echo $agri_in_beshor_wa_gha=  (isset( $college_shongothon['agri_in_beshor_wa_gha']))?$college_shongothon['agri_in_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_up_num" data-title="Enter">
										<?php echo $agri_in_beshor_up_num=  (isset( $college_shongothon['agri_in_beshor_up_num']))?$college_shongothon['agri_in_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_up_bri" data-title="Enter">
										<?php echo $agri_in_beshor_up_bri=  (isset( $college_shongothon['agri_in_beshor_up_bri']))?$college_shongothon['agri_in_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_up_gha" data-title="Enter">
										<?php echo $agri_in_beshor_up_gha=  (isset( $college_shongothon['agri_in_beshor_up_gha']))?$college_shongothon['agri_in_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_ss_num" data-title="Enter">
										<?php echo $agri_in_beshor_ss_num=  (isset( $college_shongothon['agri_in_beshor_ss_num']))?$college_shongothon['agri_in_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_ss_bri" data-title="Enter">
										<?php echo $agri_in_beshor_ss_bri=  (isset( $college_shongothon['agri_in_beshor_ss_bri']))?$college_shongothon['agri_in_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_in_beshor_ss_gha" data-title="Enter">
										<?php echo $agri_in_beshor_ss_gha=  (isset( $college_shongothon['agri_in_beshor_ss_gha']))?$college_shongothon['agri_in_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">গ্লাস এন্ড সিরামিক ইনিস্টিটিউট </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_pr_num" data-title="Enter">
										<?php echo $glass_ins_pr_num=  (isset( $college_shongothon['glass_ins_pr_num']))?$college_shongothon['glass_ins_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_pr_bri" data-title="Enter">
										<?php echo $glass_ins_pr_bri=  (isset( $college_shongothon['glass_ins_pr_bri']))?$college_shongothon['glass_ins_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_pr_gha" data-title="Enter">
										<?php echo $glass_ins_pr_gha=  (isset( $college_shongothon['glass_ins_pr_gha']))?$college_shongothon['glass_ins_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_sn_num" data-title="Enter">
										<?php echo $glass_ins_sn_num=  (isset( $college_shongothon['glass_ins_sn_num']))?$college_shongothon['glass_ins_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_sn_nei" data-title="Enter">
										<?php echo $glass_ins_sn_nei=  (isset( $college_shongothon['glass_ins_sn_nei']))?$college_shongothon['glass_ins_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_sn_bri" data-title="Enter">
										<?php echo $glass_ins_sn_bri=  (isset( $college_shongothon['glass_ins_sn_bri']))?$college_shongothon['glass_ins_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_sn_gha" data-title="Enter">
										<?php echo $glass_ins_sn_gha=  (isset( $college_shongothon['glass_ins_sn_gha']))?$college_shongothon['glass_ins_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_th_num" data-title="Enter">
										<?php echo $glass_ins_th_num=  (isset( $college_shongothon['glass_ins_th_num']))?$college_shongothon['glass_ins_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_th_bri" data-title="Enter">
										<?php echo $glass_ins_th_bri=  (isset( $college_shongothon['glass_ins_th_bri']))?$college_shongothon['glass_ins_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_th_gha" data-title="Enter">
										<?php echo $glass_ins_th_gha=  (isset( $college_shongothon['glass_ins_th_gha']))?$college_shongothon['glass_ins_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_wa_num" data-title="Enter">
										<?php echo $glass_ins_wa_num=  (isset( $college_shongothon['glass_ins_wa_num']))?$college_shongothon['glass_ins_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_wa_bri" data-title="Enter">
										<?php echo $glass_ins_wa_bri=  (isset( $college_shongothon['glass_ins_wa_bri']))?$college_shongothon['glass_ins_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_wa_gha" data-title="Enter">
										<?php echo $glass_ins_wa_gha=  (isset( $college_shongothon['glass_ins_wa_gha']))?$college_shongothon['glass_ins_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_up_num" data-title="Enter">
										<?php echo $glass_ins_up_num=  (isset( $college_shongothon['glass_ins_up_num']))?$college_shongothon['glass_ins_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_up_bri" data-title="Enter">
										<?php echo $glass_ins_up_bri=  (isset( $college_shongothon['glass_ins_up_bri']))?$college_shongothon['glass_ins_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_up_gha" data-title="Enter">
										<?php echo $glass_ins_up_gha=  (isset( $college_shongothon['glass_ins_up_gha']))?$college_shongothon['glass_ins_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_ss_num" data-title="Enter">
										<?php echo $glass_ins_ss_num=  (isset( $college_shongothon['glass_ins_ss_num']))?$college_shongothon['glass_ins_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_ss_bri" data-title="Enter">
										<?php echo $glass_ins_ss_bri=  (isset( $college_shongothon['glass_ins_ss_bri']))?$college_shongothon['glass_ins_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="glass_ins_ss_gha" data-title="Enter">
										<?php echo $glass_ins_ss_gha=  (isset( $college_shongothon['glass_ins_ss_gha']))?$college_shongothon['glass_ins_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">ফরেষ্টি ইনিস্টিটিউট </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_pr_num" data-title="Enter">
										<?php echo $fores_ins_pr_num=  (isset( $college_shongothon['fores_ins_pr_num']))?$college_shongothon['fores_ins_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_pr_bri" data-title="Enter">
										<?php echo $fores_ins_pr_bri=  (isset( $college_shongothon['fores_ins_pr_bri']))?$college_shongothon['fores_ins_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_pr_gha" data-title="Enter">
										<?php echo $fores_ins_pr_gha=  (isset( $college_shongothon['fores_ins_pr_gha']))?$college_shongothon['fores_ins_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_sn_num" data-title="Enter">
										<?php echo $fores_ins_sn_num=  (isset( $college_shongothon['fores_ins_sn_num']))?$college_shongothon['fores_ins_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_sn_nei" data-title="Enter">
										<?php echo $fores_ins_sn_nei=  (isset( $college_shongothon['fores_ins_sn_nei']))?$college_shongothon['fores_ins_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_sn_bri" data-title="Enter">
										<?php echo $fores_ins_sn_bri=  (isset( $college_shongothon['fores_ins_sn_bri']))?$college_shongothon['fores_ins_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_sn_gha" data-title="Enter">
										<?php echo $fores_ins_sn_gha=  (isset( $college_shongothon['fores_ins_sn_gha']))?$college_shongothon['fores_ins_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_th_num" data-title="Enter">
										<?php echo $fores_ins_th_num=  (isset( $college_shongothon['fores_ins_th_num']))?$college_shongothon['fores_ins_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_th_bri" data-title="Enter">
										<?php echo $fores_ins_th_bri=  (isset( $college_shongothon['fores_ins_th_bri']))?$college_shongothon['fores_ins_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_th_gha" data-title="Enter">
										<?php echo $fores_ins_th_gha=  (isset( $college_shongothon['fores_ins_th_gha']))?$college_shongothon['fores_ins_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_wa_num" data-title="Enter">
										<?php echo $fores_ins_wa_num=  (isset( $college_shongothon['fores_ins_wa_num']))?$college_shongothon['fores_ins_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_wa_bri" data-title="Enter">
										<?php echo $fores_ins_wa_bri=  (isset( $college_shongothon['fores_ins_wa_bri']))?$college_shongothon['fores_ins_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_wa_gha" data-title="Enter">
										<?php echo $fores_ins_wa_gha=  (isset( $college_shongothon['fores_ins_wa_gha']))?$college_shongothon['fores_ins_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_up_num" data-title="Enter">
										<?php echo $fores_ins_up_num=  (isset( $college_shongothon['fores_ins_up_num']))?$college_shongothon['fores_ins_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_up_bri" data-title="Enter">
										<?php echo $fores_ins_up_bri=  (isset( $college_shongothon['fores_ins_up_bri']))?$college_shongothon['fores_ins_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_up_gha" data-title="Enter">
										<?php echo $fores_ins_up_gha=  (isset( $college_shongothon['fores_ins_up_gha']))?$college_shongothon['fores_ins_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_ss_num" data-title="Enter">
										<?php echo $fores_ins_ss_num=  (isset( $college_shongothon['fores_ins_ss_num']))?$college_shongothon['fores_ins_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_ss_bri" data-title="Enter">
										<?php echo $fores_ins_ss_bri=  (isset( $college_shongothon['fores_ins_ss_bri']))?$college_shongothon['fores_ins_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fores_ins_ss_gha" data-title="Enter">
										<?php echo $fores_ins_ss_gha=  (isset( $college_shongothon['fores_ins_ss_gha']))?$college_shongothon['fores_ins_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">লাইভস্টক </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_pr_num" data-title="Enter">
										<?php echo $live_stock_pr_num=  (isset( $college_shongothon['live_stock_pr_num']))?$college_shongothon['live_stock_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_pr_bri" data-title="Enter">
										<?php echo $live_stock_pr_bri=  (isset( $college_shongothon['live_stock_pr_bri']))?$college_shongothon['live_stock_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_pr_gha" data-title="Enter">
										<?php echo $live_stock_pr_gha=  (isset( $college_shongothon['live_stock_pr_gha']))?$college_shongothon['live_stock_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_sn_num" data-title="Enter">
										<?php echo $live_stock_sn_num=  (isset( $college_shongothon['live_stock_sn_num']))?$college_shongothon['live_stock_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_sn_nei" data-title="Enter">
										<?php echo $live_stock_sn_nei=  (isset( $college_shongothon['live_stock_sn_nei']))?$college_shongothon['live_stock_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_sn_bri" data-title="Enter">
										<?php echo $live_stock_sn_bri=  (isset( $college_shongothon['live_stock_sn_bri']))?$college_shongothon['live_stock_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_sn_gha" data-title="Enter">
										<?php echo $live_stock_sn_gha=  (isset( $college_shongothon['live_stock_sn_gha']))?$college_shongothon['live_stock_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_th_num" data-title="Enter">
										<?php echo $live_stock_th_num=  (isset( $college_shongothon['live_stock_th_num']))?$college_shongothon['live_stock_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_th_bri" data-title="Enter">
										<?php echo $live_stock_th_bri=  (isset( $college_shongothon['live_stock_th_bri']))?$college_shongothon['live_stock_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_th_gha" data-title="Enter">
										<?php echo $live_stock_th_gha=  (isset( $college_shongothon['live_stock_th_gha']))?$college_shongothon['live_stock_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_wa_num" data-title="Enter">
										<?php echo $live_stock_wa_num=  (isset( $college_shongothon['live_stock_wa_num']))?$college_shongothon['live_stock_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_wa_bri" data-title="Enter">
										<?php echo $live_stock_wa_bri=  (isset( $college_shongothon['live_stock_wa_bri']))?$college_shongothon['live_stock_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_wa_gha" data-title="Enter">
										<?php echo $live_stock_wa_gha=  (isset( $college_shongothon['live_stock_wa_gha']))?$college_shongothon['live_stock_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_up_num" data-title="Enter">
										<?php echo $live_stock_up_num=  (isset( $college_shongothon['live_stock_up_num']))?$college_shongothon['live_stock_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_up_bri" data-title="Enter">
										<?php echo $live_stock_up_bri=  (isset( $college_shongothon['live_stock_up_bri']))?$college_shongothon['live_stock_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_up_gha" data-title="Enter">
										<?php echo $live_stock_up_gha=  (isset( $college_shongothon['live_stock_up_gha']))?$college_shongothon['live_stock_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_ss_num" data-title="Enter">
										<?php echo $live_stock_ss_num=  (isset( $college_shongothon['live_stock_ss_num']))?$college_shongothon['live_stock_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_ss_bri" data-title="Enter">
										<?php echo $live_stock_ss_bri=  (isset( $college_shongothon['live_stock_ss_bri']))?$college_shongothon['live_stock_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="live_stock_ss_gha" data-title="Enter">
										<?php echo $live_stock_ss_gha=  (isset( $college_shongothon['live_stock_ss_gha']))?$college_shongothon['live_stock_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">ফিসারিজ সরকারি </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_pr_num" data-title="Enter">
										<?php echo $fish_shor_pr_num=  (isset( $college_shongothon['fish_shor_pr_num']))?$college_shongothon['fish_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_pr_bri" data-title="Enter">
										<?php echo $fish_shor_pr_bri=  (isset( $college_shongothon['fish_shor_pr_bri']))?$college_shongothon['fish_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_pr_gha" data-title="Enter">
										<?php echo $fish_shor_pr_gha=  (isset( $college_shongothon['fish_shor_pr_gha']))?$college_shongothon['fish_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_sn_num" data-title="Enter">
										<?php echo $fish_shor_sn_num=  (isset( $college_shongothon['fish_shor_sn_num']))?$college_shongothon['fish_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_sn_nei" data-title="Enter">
										<?php echo $fish_shor_sn_nei=  (isset( $college_shongothon['fish_shor_sn_nei']))?$college_shongothon['fish_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_sn_bri" data-title="Enter">
										<?php echo $fish_shor_sn_bri=  (isset( $college_shongothon['fish_shor_sn_bri']))?$college_shongothon['fish_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_sn_gha" data-title="Enter">
										<?php echo $fish_shor_sn_gha=  (isset( $college_shongothon['fish_shor_sn_gha']))?$college_shongothon['fish_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_th_num" data-title="Enter">
										<?php echo $fish_shor_th_num=  (isset( $college_shongothon['fish_shor_th_num']))?$college_shongothon['fish_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_th_bri" data-title="Enter">
										<?php echo $fish_shor_th_bri=  (isset( $college_shongothon['fish_shor_th_bri']))?$college_shongothon['fish_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_th_gha" data-title="Enter">
										<?php echo $fish_shor_th_gha=  (isset( $college_shongothon['fish_shor_th_gha']))?$college_shongothon['fish_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_wa_num" data-title="Enter">
										<?php echo $fish_shor_wa_num=  (isset( $college_shongothon['fish_shor_wa_num']))?$college_shongothon['fish_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_wa_bri" data-title="Enter">
										<?php echo $fish_shor_wa_bri=  (isset( $college_shongothon['fish_shor_wa_bri']))?$college_shongothon['fish_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_wa_gha" data-title="Enter">
										<?php echo $fish_shor_wa_gha=  (isset( $college_shongothon['fish_shor_wa_gha']))?$college_shongothon['fish_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_up_num" data-title="Enter">
										<?php echo $fish_shor_up_num=  (isset( $college_shongothon['fish_shor_up_num']))?$college_shongothon['fish_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_up_bri" data-title="Enter">
										<?php echo $fish_shor_up_bri=  (isset( $college_shongothon['fish_shor_up_bri']))?$college_shongothon['fish_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_up_gha" data-title="Enter">
										<?php echo $fish_shor_up_gha=  (isset( $college_shongothon['fish_shor_up_gha']))?$college_shongothon['fish_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_ss_num" data-title="Enter">
										<?php echo $fish_shor_ss_num=  (isset( $college_shongothon['fish_shor_ss_num']))?$college_shongothon['fish_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_ss_bri" data-title="Enter">
										<?php echo $fish_shor_ss_bri=  (isset( $college_shongothon['fish_shor_ss_bri']))?$college_shongothon['fish_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_shor_ss_gha" data-title="Enter">
										<?php echo $fish_shor_ss_gha=  (isset( $college_shongothon['fish_shor_ss_gha']))?$college_shongothon['fish_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">ফিসারিজ বেসরকারি</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_pr_num" data-title="Enter">
										<?php echo $fish_beshor_pr_num=  (isset( $college_shongothon['fish_beshor_pr_num']))?$college_shongothon['fish_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_pr_bri" data-title="Enter">
										<?php echo $fish_beshor_pr_bri=  (isset( $college_shongothon['fish_beshor_pr_bri']))?$college_shongothon['fish_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_pr_gha" data-title="Enter">
										<?php echo $fish_beshor_pr_gha=  (isset( $college_shongothon['fish_beshor_pr_gha']))?$college_shongothon['fish_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_sn_num" data-title="Enter">
										<?php echo $fish_beshor_sn_num=  (isset( $college_shongothon['fish_beshor_sn_num']))?$college_shongothon['fish_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_sn_nei" data-title="Enter">
										<?php echo $fish_beshor_sn_nei=  (isset( $college_shongothon['fish_beshor_sn_nei']))?$college_shongothon['fish_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_sn_bri" data-title="Enter">
										<?php echo $fish_beshor_sn_bri=  (isset( $college_shongothon['fish_beshor_sn_bri']))?$college_shongothon['fish_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_sn_gha" data-title="Enter">
										<?php echo $fish_beshor_sn_gha=  (isset( $college_shongothon['fish_beshor_sn_gha']))?$college_shongothon['fish_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_th_num" data-title="Enter">
										<?php echo $fish_beshor_th_num=  (isset( $college_shongothon['fish_beshor_th_num']))?$college_shongothon['fish_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_th_bri" data-title="Enter">
										<?php echo $fish_beshor_th_bri=  (isset( $college_shongothon['fish_beshor_th_bri']))?$college_shongothon['fish_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_th_gha" data-title="Enter">
										<?php echo $fish_beshor_th_gha=  (isset( $college_shongothon['fish_beshor_th_gha']))?$college_shongothon['fish_beshor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_wa_num" data-title="Enter">
										<?php echo $fish_beshor_wa_num=  (isset( $college_shongothon['fish_beshor_wa_num']))?$college_shongothon['fish_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_wa_bri" data-title="Enter">
										<?php echo $fish_beshor_wa_bri=  (isset( $college_shongothon['fish_beshor_wa_bri']))?$college_shongothon['fish_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_wa_gha" data-title="Enter">
										<?php echo $fish_beshor_wa_gha=  (isset( $college_shongothon['fish_beshor_wa_gha']))?$college_shongothon['fish_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_up_num" data-title="Enter">
										<?php echo $fish_beshor_up_num=  (isset( $college_shongothon['fish_beshor_up_num']))?$college_shongothon['fish_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_up_bri" data-title="Enter">
										<?php echo $fish_beshor_up_bri=  (isset( $college_shongothon['fish_beshor_up_bri']))?$college_shongothon['fish_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_up_gha" data-title="Enter">
										<?php echo $fish_beshor_up_gha=  (isset( $college_shongothon['fish_beshor_up_gha']))?$college_shongothon['fish_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_ss_num" data-title="Enter">
										<?php echo $fish_beshor_ss_num=  (isset( $college_shongothon['fish_beshor_ss_num']))?$college_shongothon['fish_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_ss_bri" data-title="Enter">
										<?php echo $fish_beshor_ss_bri=  (isset( $college_shongothon['fish_beshor_ss_bri']))?$college_shongothon['fish_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fish_beshor_ss_gha" data-title="Enter">
										<?php echo $fish_beshor_ss_gha=  (isset( $college_shongothon['fish_beshor_ss_gha']))?$college_shongothon['fish_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">মেরিন ইনিস্টিটিউট</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_pr_num" data-title="Enter">
										<?php echo $marine_ins_pr_num=  (isset( $college_shongothon['marine_ins_pr_num']))?$college_shongothon['marine_ins_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_pr_bri" data-title="Enter">
										<?php echo $marine_ins_pr_bri=  (isset( $college_shongothon['marine_ins_pr_bri']))?$college_shongothon['marine_ins_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_pr_gha" data-title="Enter">
										<?php echo $marine_ins_pr_gha=  (isset( $college_shongothon['marine_ins_pr_gha']))?$college_shongothon['marine_ins_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_sn_num" data-title="Enter">
										<?php echo $marine_ins_sn_num=  (isset( $college_shongothon['marine_ins_sn_num']))?$college_shongothon['marine_ins_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_sn_nei" data-title="Enter">
										<?php echo $marine_ins_sn_nei=  (isset( $college_shongothon['marine_ins_sn_nei']))?$college_shongothon['marine_ins_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_sn_bri" data-title="Enter">
										<?php echo $marine_ins_sn_bri=  (isset( $college_shongothon['marine_ins_sn_bri']))?$college_shongothon['marine_ins_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_sn_gha" data-title="Enter">
										<?php echo $marine_ins_sn_gha=  (isset( $college_shongothon['marine_ins_sn_gha']))?$college_shongothon['marine_ins_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_th_num" data-title="Enter">
										<?php echo $marine_ins_th_num=  (isset( $college_shongothon['marine_ins_th_num']))?$college_shongothon['marine_ins_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_th_bri" data-title="Enter">
										<?php echo $marine_ins_th_bri=  (isset( $college_shongothon['marine_ins_th_bri']))?$college_shongothon['marine_ins_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_th_gha" data-title="Enter">
										<?php echo $marine_ins_th_gha=  (isset( $college_shongothon['marine_ins_th_gha']))?$college_shongothon['marine_ins_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_wa_num" data-title="Enter">
										<?php echo $marine_ins_wa_num=  (isset( $college_shongothon['marine_ins_wa_num']))?$college_shongothon['marine_ins_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_wa_bri" data-title="Enter">
										<?php echo $marine_ins_wa_bri=  (isset( $college_shongothon['marine_ins_wa_bri']))?$college_shongothon['marine_ins_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_wa_gha" data-title="Enter">
										<?php echo $marine_ins_wa_gha=  (isset( $college_shongothon['marine_ins_wa_gha']))?$college_shongothon['marine_ins_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_up_num" data-title="Enter">
										<?php echo $marine_ins_up_num=  (isset( $college_shongothon['marine_ins_up_num']))?$college_shongothon['marine_ins_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_up_bri" data-title="Enter">
										<?php echo $marine_ins_up_bri=  (isset( $college_shongothon['marine_ins_up_bri']))?$college_shongothon['marine_ins_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_up_gha" data-title="Enter">
										<?php echo $marine_ins_up_gha=  (isset( $college_shongothon['marine_ins_up_gha']))?$college_shongothon['marine_ins_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_ss_num" data-title="Enter">
										<?php echo $marine_ins_ss_num=  (isset( $college_shongothon['marine_ins_ss_num']))?$college_shongothon['marine_ins_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_ss_bri" data-title="Enter">
										<?php echo $marine_ins_ss_bri=  (isset( $college_shongothon['marine_ins_ss_bri']))?$college_shongothon['marine_ins_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="marine_ins_ss_gha" data-title="Enter">
										<?php echo $marine_ins_ss_gha=  (isset( $college_shongothon['marine_ins_ss_gha']))?$college_shongothon['marine_ins_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">গ্রাফিক্স আর্ট ইনিস্টিটিউট</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_pr_num" data-title="Enter">
										<?php echo $gra_art_ins_pr_num=  (isset( $college_shongothon['gra_art_ins_pr_num']))?$college_shongothon['gra_art_ins_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_pr_bri" data-title="Enter">
										<?php echo $gra_art_ins_pr_bri=  (isset( $college_shongothon['gra_art_ins_pr_bri']))?$college_shongothon['gra_art_ins_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_pr_gha" data-title="Enter">
										<?php echo $gra_art_ins_pr_gha=  (isset( $college_shongothon['gra_art_ins_pr_gha']))?$college_shongothon['gra_art_ins_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_sn_num" data-title="Enter">
										<?php echo $gra_art_ins_sn_num=  (isset( $college_shongothon['gra_art_ins_sn_num']))?$college_shongothon['gra_art_ins_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_sn_nei" data-title="Enter">
										<?php echo $gra_art_ins_sn_nei=  (isset( $college_shongothon['gra_art_ins_sn_nei']))?$college_shongothon['gra_art_ins_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_sn_bri" data-title="Enter">
										<?php echo $gra_art_ins_sn_bri=  (isset( $college_shongothon['gra_art_ins_sn_bri']))?$college_shongothon['gra_art_ins_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_sn_gha" data-title="Enter">
										<?php echo $gra_art_ins_sn_gha=  (isset( $college_shongothon['gra_art_ins_sn_gha']))?$college_shongothon['gra_art_ins_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_th_num" data-title="Enter">
										<?php echo $gra_art_ins_th_num=  (isset( $college_shongothon['gra_art_ins_th_num']))?$college_shongothon['gra_art_ins_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_th_bri" data-title="Enter">
										<?php echo $gra_art_ins_th_bri=  (isset( $college_shongothon['gra_art_ins_th_bri']))?$college_shongothon['gra_art_ins_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_th_gha" data-title="Enter">
										<?php echo $gra_art_ins_th_gha=  (isset( $college_shongothon['gra_art_ins_th_gha']))?$college_shongothon['gra_art_ins_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_wa_num" data-title="Enter">
										<?php echo $gra_art_ins_wa_num=  (isset( $college_shongothon['gra_art_ins_wa_num']))?$college_shongothon['gra_art_ins_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_wa_bri" data-title="Enter">
										<?php echo $gra_art_ins_wa_bri=  (isset( $college_shongothon['gra_art_ins_wa_bri']))?$college_shongothon['gra_art_ins_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_wa_gha" data-title="Enter">
										<?php echo $gra_art_ins_wa_gha=  (isset( $college_shongothon['gra_art_ins_wa_gha']))?$college_shongothon['gra_art_ins_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_up_num" data-title="Enter">
										<?php echo $gra_art_ins_up_num=  (isset( $college_shongothon['gra_art_ins_up_num']))?$college_shongothon['gra_art_ins_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_up_bri" data-title="Enter">
										<?php echo $gra_art_ins_up_bri=  (isset( $college_shongothon['gra_art_ins_up_bri']))?$college_shongothon['gra_art_ins_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_up_gha" data-title="Enter">
										<?php echo $gra_art_ins_up_gha=  (isset( $college_shongothon['gra_art_ins_up_gha']))?$college_shongothon['gra_art_ins_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_ss_num" data-title="Enter">
										<?php echo $gra_art_ins_ss_num=  (isset( $college_shongothon['gra_art_ins_ss_num']))?$college_shongothon['gra_art_ins_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_ss_bri" data-title="Enter">
										<?php echo $gra_art_ins_ss_bri=  (isset( $college_shongothon['gra_art_ins_ss_bri']))?$college_shongothon['gra_art_ins_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gra_art_ins_ss_gha" data-title="Enter">
										<?php echo $gra_art_ins_ss_gha=  (isset( $college_shongothon['gra_art_ins_ss_gha']))?$college_shongothon['gra_art_ins_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">আই এইচ টি সরকারি</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_pr_num" data-title="Enter">
										<?php echo $h_it_shor_pr_num=  (isset( $college_shongothon['h_it_shor_pr_num']))?$college_shongothon['h_it_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_pr_bri" data-title="Enter">
										<?php echo $h_it_shor_pr_bri=  (isset( $college_shongothon['h_it_shor_pr_bri']))?$college_shongothon['h_it_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_pr_gha" data-title="Enter">
										<?php echo $h_it_shor_pr_gha=  (isset( $college_shongothon['h_it_shor_pr_gha']))?$college_shongothon['h_it_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_sn_num" data-title="Enter">
										<?php echo $h_it_shor_sn_num=  (isset( $college_shongothon['h_it_shor_sn_num']))?$college_shongothon['h_it_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_sn_nei" data-title="Enter">
										<?php echo $h_it_shor_sn_nei=  (isset( $college_shongothon['h_it_shor_sn_nei']))?$college_shongothon['h_it_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_sn_bri" data-title="Enter">
										<?php echo $h_it_shor_sn_bri=  (isset( $college_shongothon['h_it_shor_sn_bri']))?$college_shongothon['h_it_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_sn_gha" data-title="Enter">
										<?php echo $h_it_shor_sn_gha=  (isset( $college_shongothon['h_it_shor_sn_gha']))?$college_shongothon['h_it_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_th_num" data-title="Enter">
										<?php echo $h_it_shor_th_num=  (isset( $college_shongothon['h_it_shor_th_num']))?$college_shongothon['h_it_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_th_bri" data-title="Enter">
										<?php echo $h_it_shor_th_bri=  (isset( $college_shongothon['h_it_shor_th_bri']))?$college_shongothon['h_it_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_th_gha" data-title="Enter">
										<?php echo $h_it_shor_th_gha=  (isset( $college_shongothon['h_it_shor_th_gha']))?$college_shongothon['h_it_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_wa_num" data-title="Enter">
										<?php echo $h_it_shor_wa_num=  (isset( $college_shongothon['h_it_shor_wa_num']))?$college_shongothon['h_it_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_wa_bri" data-title="Enter">
										<?php echo $h_it_shor_wa_bri=  (isset( $college_shongothon['h_it_shor_wa_bri']))?$college_shongothon['h_it_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_wa_gha" data-title="Enter">
										<?php echo $h_it_shor_wa_gha=  (isset( $college_shongothon['h_it_shor_wa_gha']))?$college_shongothon['h_it_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_up_num" data-title="Enter">
										<?php echo $h_it_shor_up_num=  (isset( $college_shongothon['h_it_shor_up_num']))?$college_shongothon['h_it_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_up_bri" data-title="Enter">
										<?php echo $h_it_shor_up_bri=  (isset( $college_shongothon['h_it_shor_up_bri']))?$college_shongothon['h_it_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_up_gha" data-title="Enter">
										<?php echo $h_it_shor_up_gha=  (isset( $college_shongothon['h_it_shor_up_gha']))?$college_shongothon['h_it_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_ss_num" data-title="Enter">
										<?php echo $h_it_shor_ss_num=  (isset( $college_shongothon['h_it_shor_ss_num']))?$college_shongothon['h_it_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_ss_bri" data-title="Enter">
										<?php echo $h_it_shor_ss_bri=  (isset( $college_shongothon['h_it_shor_ss_bri']))?$college_shongothon['h_it_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_shor_ss_gha" data-title="Enter">
										<?php echo $h_it_shor_ss_gha=  (isset( $college_shongothon['h_it_shor_ss_gha']))?$college_shongothon['h_it_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">আই এইচ টি বেসরকারি</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_pr_num" data-title="Enter">
										<?php echo $h_it_beshor_pr_num=  (isset( $college_shongothon['h_it_beshor_pr_num']))?$college_shongothon['h_it_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_pr_bri" data-title="Enter">
										<?php echo $h_it_beshor_pr_bri=  (isset( $college_shongothon['h_it_beshor_pr_bri']))?$college_shongothon['h_it_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_pr_gha" data-title="Enter">
										<?php echo $h_it_beshor_pr_gha=  (isset( $college_shongothon['h_it_beshor_pr_gha']))?$college_shongothon['h_it_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_sn_num" data-title="Enter">
										<?php echo $h_it_beshor_sn_num=  (isset( $college_shongothon['h_it_beshor_sn_num']))?$college_shongothon['h_it_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_sn_nei" data-title="Enter">
										<?php echo $h_it_beshor_sn_nei=  (isset( $college_shongothon['h_it_beshor_sn_nei']))?$college_shongothon['h_it_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_sn_bri" data-title="Enter">
										<?php echo $h_it_beshor_sn_bri=  (isset( $college_shongothon['h_it_beshor_sn_bri']))?$college_shongothon['h_it_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_sn_gha" data-title="Enter">
										<?php echo $h_it_beshor_sn_gha=  (isset( $college_shongothon['h_it_beshor_sn_gha']))?$college_shongothon['h_it_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_th_num" data-title="Enter">
										<?php echo $h_it_beshor_th_num=  (isset( $college_shongothon['h_it_beshor_th_num']))?$college_shongothon['h_it_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_th_bri" data-title="Enter">
										<?php echo $h_it_beshor_th_bri=  (isset( $college_shongothon['h_it_beshor_th_bri']))?$college_shongothon['h_it_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_th_gha" data-title="Enter">
										<?php echo $h_it_beshor_th_gha=  (isset( $college_shongothon['h_it_beshor_th_gha']))?$college_shongothon['h_it_beshor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_wa_num" data-title="Enter">
										<?php echo $h_it_beshor_wa_num=  (isset( $college_shongothon['h_it_beshor_wa_num']))?$college_shongothon['h_it_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_wa_bri" data-title="Enter">
										<?php echo $h_it_beshor_wa_bri=  (isset( $college_shongothon['h_it_beshor_wa_bri']))?$college_shongothon['h_it_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_wa_gha" data-title="Enter">
										<?php echo $h_it_beshor_wa_gha=  (isset( $college_shongothon['h_it_beshor_wa_gha']))?$college_shongothon['h_it_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_up_num" data-title="Enter">
										<?php echo $h_it_beshor_up_num=  (isset( $college_shongothon['h_it_beshor_up_num']))?$college_shongothon['h_it_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_up_bri" data-title="Enter">
										<?php echo $h_it_beshor_up_bri=  (isset( $college_shongothon['h_it_beshor_up_bri']))?$college_shongothon['h_it_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_up_gha" data-title="Enter">
										<?php echo $h_it_beshor_up_gha=  (isset( $college_shongothon['h_it_beshor_up_gha']))?$college_shongothon['h_it_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_ss_num" data-title="Enter">
										<?php echo $h_it_beshor_ss_num=  (isset( $college_shongothon['h_it_beshor_ss_num']))?$college_shongothon['h_it_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_ss_bri" data-title="Enter">
										<?php echo $h_it_beshor_ss_bri=  (isset( $college_shongothon['h_it_beshor_ss_bri']))?$college_shongothon['h_it_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="h_it_beshor_ss_gha" data-title="Enter">
										<?php echo $h_it_beshor_ss_gha=  (isset( $college_shongothon['h_it_beshor_ss_gha']))?$college_shongothon['h_it_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">ম্যাটস সরকারি</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_pr_num" data-title="Enter">
										<?php echo $mat_shor_pr_num=  (isset( $college_shongothon['mat_shor_pr_num']))?$college_shongothon['mat_shor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_pr_bri" data-title="Enter">
										<?php echo $mat_shor_pr_bri=  (isset( $college_shongothon['mat_shor_pr_bri']))?$college_shongothon['mat_shor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_pr_gha" data-title="Enter">
										<?php echo $mat_shor_pr_gha=  (isset( $college_shongothon['mat_shor_pr_gha']))?$college_shongothon['mat_shor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_sn_num" data-title="Enter">
										<?php echo $mat_shor_sn_num=  (isset( $college_shongothon['mat_shor_sn_num']))?$college_shongothon['mat_shor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_sn_nei" data-title="Enter">
										<?php echo $mat_shor_sn_nei=  (isset( $college_shongothon['mat_shor_sn_nei']))?$college_shongothon['mat_shor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_sn_bri" data-title="Enter">
										<?php echo $mat_shor_sn_bri=  (isset( $college_shongothon['mat_shor_sn_bri']))?$college_shongothon['mat_shor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_sn_gha" data-title="Enter">
										<?php echo $mat_shor_sn_gha=  (isset( $college_shongothon['mat_shor_sn_gha']))?$college_shongothon['mat_shor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_th_num" data-title="Enter">
										<?php echo $mat_shor_th_num=  (isset( $college_shongothon['mat_shor_th_num']))?$college_shongothon['mat_shor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_th_bri" data-title="Enter">
										<?php echo $mat_shor_th_bri=  (isset( $college_shongothon['mat_shor_th_bri']))?$college_shongothon['mat_shor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_th_gha" data-title="Enter">
										<?php echo $mat_shor_th_gha=  (isset( $college_shongothon['mat_shor_th_gha']))?$college_shongothon['mat_shor_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_wa_num" data-title="Enter">
										<?php echo $mat_shor_wa_num=  (isset( $college_shongothon['mat_shor_wa_num']))?$college_shongothon['mat_shor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_wa_bri" data-title="Enter">
										<?php echo $mat_shor_wa_bri=  (isset( $college_shongothon['mat_shor_wa_bri']))?$college_shongothon['mat_shor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_wa_gha" data-title="Enter">
										<?php echo $mat_shor_wa_gha=  (isset( $college_shongothon['mat_shor_wa_gha']))?$college_shongothon['mat_shor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_up_num" data-title="Enter">
										<?php echo $mat_shor_up_num=  (isset( $college_shongothon['mat_shor_up_num']))?$college_shongothon['mat_shor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_up_bri" data-title="Enter">
										<?php echo $mat_shor_up_bri=  (isset( $college_shongothon['mat_shor_up_bri']))?$college_shongothon['mat_shor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_up_gha" data-title="Enter">
										<?php echo $mat_shor_up_gha=  (isset( $college_shongothon['mat_shor_up_gha']))?$college_shongothon['mat_shor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_ss_num" data-title="Enter">
										<?php echo $mat_shor_ss_num=  (isset( $college_shongothon['mat_shor_ss_num']))?$college_shongothon['mat_shor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_ss_bri" data-title="Enter">
										<?php echo $mat_shor_ss_bri=  (isset( $college_shongothon['mat_shor_ss_bri']))?$college_shongothon['mat_shor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_shor_ss_gha" data-title="Enter">
										<?php echo $mat_shor_ss_gha=  (isset( $college_shongothon['mat_shor_ss_gha']))?$college_shongothon['mat_shor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">ম্যাটস বেসরকারি</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_pr_num" data-title="Enter">
										<?php echo $mat_beshor_pr_num=  (isset( $college_shongothon['mat_beshor_pr_num']))?$college_shongothon['mat_beshor_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_pr_bri" data-title="Enter">
										<?php echo $mat_beshor_pr_bri=  (isset( $college_shongothon['mat_beshor_pr_bri']))?$college_shongothon['mat_beshor_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_pr_gha" data-title="Enter">
										<?php echo $mat_beshor_pr_gha=  (isset( $college_shongothon['mat_beshor_pr_gha']))?$college_shongothon['mat_beshor_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_sn_num" data-title="Enter">
										<?php echo $mat_beshor_sn_num=  (isset( $college_shongothon['mat_beshor_sn_num']))?$college_shongothon['mat_beshor_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_sn_nei" data-title="Enter">
										<?php echo $mat_beshor_sn_nei=  (isset( $college_shongothon['mat_beshor_sn_nei']))?$college_shongothon['mat_beshor_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_sn_bri" data-title="Enter">
										<?php echo $mat_beshor_sn_bri=  (isset( $college_shongothon['mat_beshor_sn_bri']))?$college_shongothon['mat_beshor_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_sn_gha" data-title="Enter">
										<?php echo $mat_beshor_sn_gha=  (isset( $college_shongothon['mat_beshor_sn_gha']))?$college_shongothon['mat_beshor_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_th_num" data-title="Enter">
										<?php echo $mat_beshor_th_num=  (isset( $college_shongothon['mat_beshor_th_num']))?$college_shongothon['mat_beshor_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_th_bri" data-title="Enter">
										<?php echo $mat_beshor_th_bri=  (isset( $college_shongothon['mat_beshor_th_bri']))?$college_shongothon['mat_beshor_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_th_gha" data-title="Enter">
										<?php echo $mat_beshor_th_gha=  (isset( $college_shongothon['mat_beshor_th_gha']))?$college_shongothon['mat_beshor_th_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_wa_num" data-title="Enter">
										<?php echo $mat_beshor_wa_num=  (isset( $college_shongothon['mat_beshor_wa_num']))?$college_shongothon['mat_beshor_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_wa_bri" data-title="Enter">
										<?php echo $mat_beshor_wa_bri=  (isset( $college_shongothon['mat_beshor_wa_bri']))?$college_shongothon['mat_beshor_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_wa_gha" data-title="Enter">
										<?php echo $mat_beshor_wa_gha=  (isset( $college_shongothon['mat_beshor_wa_gha']))?$college_shongothon['mat_beshor_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_up_num" data-title="Enter">
										<?php echo $mat_beshor_up_num=  (isset( $college_shongothon['mat_beshor_up_num']))?$college_shongothon['mat_beshor_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_up_bri" data-title="Enter">
										<?php echo $mat_beshor_up_bri=  (isset( $college_shongothon['mat_beshor_up_bri']))?$college_shongothon['mat_beshor_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_up_gha" data-title="Enter">
										<?php echo $mat_beshor_up_gha=  (isset( $college_shongothon['mat_beshor_up_gha']))?$college_shongothon['mat_beshor_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_ss_num" data-title="Enter">
										<?php echo $mat_beshor_ss_num=  (isset( $college_shongothon['mat_beshor_ss_num']))?$college_shongothon['mat_beshor_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_ss_bri" data-title="Enter">
										<?php echo $mat_beshor_ss_bri=  (isset( $college_shongothon['mat_beshor_ss_bri']))?$college_shongothon['mat_beshor_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mat_beshor_ss_gha" data-title="Enter">
										<?php echo $mat_beshor_ss_gha=  (isset( $college_shongothon['mat_beshor_ss_gha']))?$college_shongothon['mat_beshor_ss_gha']:0; ?></a>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">নার্সিং ইনিস্টিটিউট সরকারি</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_pr_num" data-title="Enter">
										<?php echo $nursing_ins_pr_num=  (isset( $college_shongothon['nursing_ins_pr_num']))?$college_shongothon['nursing_ins_pr_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_pr_bri" data-title="Enter">
										<?php echo $nursing_ins_pr_bri=  (isset( $college_shongothon['nursing_ins_pr_bri']))?$college_shongothon['nursing_ins_pr_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_pr_gha" data-title="Enter">
										<?php echo $nursing_ins_pr_gha=  (isset( $college_shongothon['nursing_ins_pr_gha']))?$college_shongothon['nursing_ins_pr_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_sn_num" data-title="Enter">
										<?php echo $nursing_ins_sn_num=  (isset( $college_shongothon['nursing_ins_sn_num']))?$college_shongothon['nursing_ins_sn_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_sn_nei" data-title="Enter">
										<?php echo $nursing_ins_sn_nei=  (isset( $college_shongothon['nursing_ins_sn_nei']))?$college_shongothon['nursing_ins_sn_nei']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_sn_bri" data-title="Enter">
										<?php echo $nursing_ins_sn_bri=  (isset( $college_shongothon['nursing_ins_sn_bri']))?$college_shongothon['nursing_ins_sn_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_sn_gha" data-title="Enter">
										<?php echo $nursing_ins_sn_gha=  (isset( $college_shongothon['nursing_ins_sn_gha']))?$college_shongothon['nursing_ins_sn_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_th_num" data-title="Enter">
										<?php echo $nursing_ins_th_num=  (isset( $college_shongothon['nursing_ins_th_num']))?$college_shongothon['nursing_ins_th_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_th_bri" data-title="Enter">
										<?php echo $nursing_ins_th_bri=  (isset( $college_shongothon['nursing_ins_th_bri']))?$college_shongothon['nursing_ins_th_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_th_gha" data-title="Enter">
										<?php echo $nursing_ins_th_gha=  (isset( $college_shongothon['nursing_ins_th_gha']))?$college_shongothon['nursing_ins_th_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_wa_num" data-title="Enter">
										<?php echo $nursing_ins_wa_num=  (isset( $college_shongothon['nursing_ins_wa_num']))?$college_shongothon['nursing_ins_wa_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_wa_bri" data-title="Enter">
										<?php echo $nursing_ins_wa_bri=  (isset( $college_shongothon['nursing_ins_wa_bri']))?$college_shongothon['nursing_ins_wa_bri']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_wa_gha" data-title="Enter">
										<?php echo $nursing_ins_wa_gha=  (isset( $college_shongothon['nursing_ins_wa_gha']))?$college_shongothon['nursing_ins_wa_gha']:0; ?></a>
                                </td>


                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_up_num" data-title="Enter">
										<?php echo $nursing_ins_up_num=  (isset( $college_shongothon['nursing_ins_up_num']))?$college_shongothon['nursing_ins_up_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_up_bri" data-title="Enter">
										<?php echo $nursing_ins_up_bri=  (isset( $college_shongothon['nursing_ins_up_bri']))?$college_shongothon['nursing_ins_up_bri']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_up_gha" data-title="Enter">
										<?php echo $nursing_ins_up_gha=  (isset( $college_shongothon['nursing_ins_up_gha']))?$college_shongothon['nursing_ins_up_gha']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_ss_num" data-title="Enter">
										<?php echo $nursing_ins_ss_num=  (isset( $college_shongothon['nursing_ins_ss_num']))?$college_shongothon['nursing_ins_ss_num']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_ss_bri" data-title="Enter">
										<?php echo $nursing_ins_ss_bri=  (isset( $college_shongothon['nursing_ins_ss_bri']))?$college_shongothon['nursing_ins_ss_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_shongothon" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nursing_ins_ss_gha" data-title="Enter">
										<?php echo $nursing_ins_ss_gha=  (isset( $college_shongothon['nursing_ins_ss_gha']))?$college_shongothon['nursing_ins_ss_gha']:0; ?></a>

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
