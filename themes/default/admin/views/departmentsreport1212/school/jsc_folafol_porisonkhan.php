<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'জেএসসি ফলাফল পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/jsc-folafol-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/jsc-folafol-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php // lang('list_results'); ?></p>

				 
				
				
                <div class="table-responsive">
				
	
				<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-izx2{border-color:black;background-color:#efefef;}
.tg .tg-pwj7{background-color:#efefef;border-color:black;}
.tg .tg-0pky{border-color:black;vertical-align:top}
.tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
.tg .tg-0lax{border-color:black;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

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
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable2">

                            <tr>
                               <td class="tg-pwj7" >ক্রম</td>
                                <td class="tg-pwj7" colspan="2" >জনশক্তি</td>
                                <td class="tg-pwj7" >মোট পরীক্ষার্থী </td>
                                <td class="tg-pwj7" >  জিপিএ 5</td>
                                <td class="tg-pwj7" > এ গ্রেড </td>
                                <td class="tg-pwj7" >এ- গ্রেড  </td>
                                <td class="tg-pwj7" >বি গ্রেড </td>
                                <td class="tg-pwj7" >সি গ্রেড </td>
                                <td class="tg-pwj7" >ডি গ্রেড </td>
                                <td class="tg-pwj7" >মোট</td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"rowspan="3"> ১	</td>
                                <td class="tg-y698 type_1" rowspan="3"> সদস্য	</td>
                                <td class="tg-0pky">বিজ্ঞান </td>
                                <td class="tg-0pky" >
                                <?php echo $sat_bg_mp = $total_jsc_folafol_porisonkhan['sat_bg_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo $sat_bg_gpa5 = $total_jsc_folafol_porisonkhan['sat_bg_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bg_agred = $total_jsc_folafol_porisonkhan['sat_bg_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sat_bg_a_gred = $total_jsc_folafol_porisonkhan['sat_bg_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $sat_bg_bgred = $total_jsc_folafol_porisonkhan['sat_bg_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bg_cgred = $total_jsc_folafol_porisonkhan['sat_bg_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sat_bg_dgred = $total_jsc_folafol_porisonkhan['sat_bg_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                    <?php echo ($sat_bg_gpa5+$sat_bg_agred+$sat_bg_a_gred+$sat_bg_bgred+$sat_bg_cgred+$sat_bg_dgred) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">মানবিক</td>
                                <td class="tg-0pky" >
                                <?php echo $sat_mb_mp = $total_jsc_folafol_porisonkhan['sat_mb_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sat_mb_gpa5 = $total_jsc_folafol_porisonkhan['sat_mb_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sat_mb_agred = $total_jsc_folafol_porisonkhan['sat_mb_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_mb_a_gred = $total_jsc_folafol_porisonkhan['sat_mb_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_mb_bgred=$total_jsc_folafol_porisonkhan['sat_mb_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_mb_cgred = $total_jsc_folafol_porisonkhan['sat_mb_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_mb_dgred = $total_jsc_folafol_porisonkhan['sat_mb_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo ($sat_mb_gpa5+$sat_mb_agred+$sat_mb_a_gred+$sat_mb_bgred+$sat_mb_cgred+$sat_mb_dgred) ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky">ব্যবসায়</td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bs_mp = $total_jsc_folafol_porisonkhan['sat_bs_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bs_gpa5 = $total_jsc_folafol_porisonkhan['sat_bs_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bs_agred = $total_jsc_folafol_porisonkhan['sat_bs_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bs_a_gred = $total_jsc_folafol_porisonkhan['sat_bs_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bs_bgred = $total_jsc_folafol_porisonkhan['sat_bs_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bs_cgred = $total_jsc_folafol_porisonkhan['sat_bs_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sat_bs_dgred = $total_jsc_folafol_porisonkhan['sat_bs_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($sat_bs_gpa5+$sat_bs_agred+$sat_bs_a_gred+$sat_bs_bgred+$sat_bs_cgred+$sat_bs_dgred) ?>
                                </td>

                            </tr>
                            <tr>
                                
                                <td class="tg-y698 type_1"rowspan="3"> ২	</td>
                                <td class="tg-y698 type_1" rowspan="3"> সাথী	</td>
                                <td class="tg-0pky">বিজ্ঞান </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_bg_mp = $total_jsc_folafol_porisonkhan['kor_bg_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_bg_gpa5 = $total_jsc_folafol_porisonkhan['kor_bg_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_bg_agred = $total_jsc_folafol_porisonkhan['kor_bg_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_bg_a_gred = $total_jsc_folafol_porisonkhan['kor_bg_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_bg_bgred = $total_jsc_folafol_porisonkhan['kor_bg_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_bg_cgred = $total_jsc_folafol_porisonkhan['kor_bg_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_bg_dgred = $total_jsc_folafol_porisonkhan['kor_bg_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($sat_bs_gpa5+$kor_bg_agred+$kor_bg_a_gred+$kor_bg_bgred+$kor_bg_cgred+$kor_bg_dgred) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">মানবিক</td>
                                <td class="tg-0pky" >
                                <?php echo $kor_mb_mp = $total_jsc_folafol_porisonkhan['kor_mb_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_mb_gpa5 = $total_jsc_folafol_porisonkhan['kor_mb_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_mb_agred = $total_jsc_folafol_porisonkhan['kor_mb_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_mb_a_gred = $total_jsc_folafol_porisonkhan['kor_mb_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_mb_bgred = $total_jsc_folafol_porisonkhan['kor_mb_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_mb_cgred = $total_jsc_folafol_porisonkhan['kor_mb_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kor_mb_dgred = $total_jsc_folafol_porisonkhan['kor_mb_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($kor_mb_gpa5+$kor_mb_agred+$kor_mb_a_gred+$kor_mb_bgred+$kor_mb_cgred+$kor_mb_dgred) ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-0pky">ব্যবসায়</td>
                                <td class="tg-0pky" >
                                 <?php echo $kor_bs_mp = $total_jsc_folafol_porisonkhan['kor_bs_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $kor_bs_gpa5 = $total_jsc_folafol_porisonkhan['kor_bs_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $kor_bs_agred = $total_jsc_folafol_porisonkhan['kor_bs_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $kor_bs_a_gred = $total_jsc_folafol_porisonkhan['kor_bs_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $kor_bs_bgred = $total_jsc_folafol_porisonkhan['kor_bs_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $kor_bs_cgred = $total_jsc_folafol_porisonkhan['kor_bs_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $kor_bs_dgred = $total_jsc_folafol_porisonkhan['kor_bs_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($kor_bs_gpa5+$kor_bs_agred+$kor_bs_a_gred+$kor_bs_bgred+$kor_bs_cgred+$kor_bs_dgred) ?>
                                </td>
                            </tr>

                         
                            <tr>
                                <td class="tg-y698 type_1"rowspan="3"> ৩	</td>
                                <td class="tg-y698" rowspan="3">সমর্থক  </td>
                                
                                <td class="tg-0pky">বিজ্ঞান </td>
								<td class="tg-0pky" >
                                  <?php echo $som_bg_mp = $total_jsc_folafol_porisonkhan['som_bg_mp'] ?>
                                </td>
								<td class="tg-0pky" >
                                  <?php echo $som_bg_gpa5 = $total_jsc_folafol_porisonkhan['som_bg_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $som_bg_agred = $total_jsc_folafol_porisonkhan['som_bg_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $som_bg_a_gred = $total_jsc_folafol_porisonkhan['som_bg_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $som_bg_bgred = $total_jsc_folafol_porisonkhan['som_bg_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $som_bg_cgred = $total_jsc_folafol_porisonkhan['som_bg_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $som_bg_dgred = $total_jsc_folafol_porisonkhan['som_bg_dgred'] ?>
                                </td>
                                
                                <td class="tg-0pky" >
                                <?php echo ($som_bg_gpa5+$som_bg_agred+$som_bg_a_gred+$som_bg_bgred+$som_bg_cgred+$som_bg_dgred) ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky">মানবিক</td>
                                <td class="tg-0pky" >
                                <?php echo $som_mb_mp = $total_jsc_folafol_porisonkhan['som_mb_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_mb_gpa5 = $total_jsc_folafol_porisonkhan['som_mb_gpa5'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo $som_mb_agred = $total_jsc_folafol_porisonkhan['som_mb_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_mb_a_gred = $total_jsc_folafol_porisonkhan['som_mb_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_mb_bgred = $total_jsc_folafol_porisonkhan['som_mb_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_mb_cgred = $total_jsc_folafol_porisonkhan['som_mb_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_mb_dgred = $total_jsc_folafol_porisonkhan['som_mb_dgred'] ?>
                                </td>
                                
                                <td class="tg-0pky" >
                                   <?php echo ($som_mb_gpa5+$som_mb_agred+$som_mb_a_gred+$som_mb_bgred+$som_mb_cgred+$som_mb_dgred) ?>
                                </td>

                            </tr>
                          
                            <tr>
                                <td class="tg-0pky">ব্যবসায়</td>
                                <td class="tg-0pky" >
                                <?php echo $som_bs_mp = $total_jsc_folafol_porisonkhan['som_bs_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_bs_gpa5 = $total_jsc_folafol_porisonkhan['som_bs_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_bs_agred = $total_jsc_folafol_porisonkhan['som_bs_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_bs_a_gred = $total_jsc_folafol_porisonkhan['som_bs_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_bs_bgred = $total_jsc_folafol_porisonkhan['som_bs_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_bs_cgred = $total_jsc_folafol_porisonkhan['som_bs_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $som_bs_dgred = $total_jsc_folafol_porisonkhan['som_bs_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($som_bs_gpa5+$som_bs_agred+$som_bs_a_gred+$som_bs_bgred+$som_bs_cgred+$som_bs_dgred) ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-0pky" colspan="3">মোট</td>    
                                <td class="tg-0pky" ><?php echo ($sat_bg_mp+$sat_mb_mp+$sat_bs_mp+$kor_bg_mp+$kor_mb_mp+$kor_bs_mp+$som_bg_mp+$som_mb_mp+$som_bs_mp) ?></td>
                                <td class="tg-0pky" ><?php echo ($sat_bg_gpa5+$sat_mb_gpa5+$sat_bs_gpa5+$kor_bg_gpa5+$kor_mb_gpa5+$kor_bs_gpa5+$som_bg_gpa5+$som_mb_gpa5+$som_bs_gpa5) ?></td>
                                <td class="tg-0pky" ><?php echo ($sat_bg_agred+$sat_mb_agred+$sat_bs_agred+$kor_bg_agred+$kor_mb_agred+$kor_bs_agred+$som_bg_agred+$som_mb_agred+$som_bs_agred) ?></td>
                                <td class="tg-0pky" ><?php echo ($sat_bg_a_gred+$sat_mb_a_gred+$sat_bs_a_gred+$kor_bg_a_gred+$kor_mb_a_gred+$kor_bs_a_gred+$som_bg_a_gred+$som_mb_a_gred+$som_bs_a_gred) ?></td>
                                <td class="tg-0pky" ><?php echo ($sat_bg_bgred+$sat_mb_bgred+$sat_bs_bgred+$kor_bg_bgred+$kor_mb_bgred+$kor_bs_bgred+$som_bg_bgred+$som_mb_bgred+$som_bs_bgred) ?></td>
                                <td class="tg-0pky" ><?php echo ($sat_bg_cgred+$sat_mb_cgred+$sat_bs_cgred+$kor_bg_cgred+$kor_mb_cgred+$kor_bs_cgred+$som_bg_cgred+$som_mb_cgred+$som_bs_cgred) ?></td>
                                <td class="tg-0pky" ><?php echo ($sat_bg_dgred+$sat_mb_dgred+$sat_bs_dgred+$kor_bg_dgred+$kor_mb_dgred+$kor_bs_dgred+$som_bg_dgred+$som_mb_dgred+$som_bs_dgred) ?></td>
                                <td class="tg-0pky" ></td>
                            </tr>


                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
