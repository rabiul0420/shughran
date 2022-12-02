<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'জেডিসি ফলাফল পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/jdc-folafol-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/jdc-folafol-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                              
                                <td class="tg-pwj7"  >মান</td>
                                <td class="tg-pwj7" >মোট পরীক্ষার্থী </td>
                                <td class="tg-pwj7" > এ+</td>
                                <td class="tg-pwj7" > এ  </td>
                                <td class="tg-pwj7" >এ-   </td>
                                <td class="tg-pwj7" >বি  </td>
                                <td class="tg-pwj7" >সি  </td>
                                <td class="tg-pwj7" >ডি  </td>
                                <td class="tg-pwj7" >অকৃতকার্য</td>
                            </tr>



                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1""> ১	</td>
                                <td class="tg-y698 type_1" > সাথী	</td>
                               
                                <td class="tg-0pky" >
                                <?php echo $sathi_b_mp=$total_jdc_folafol_porisonkhan['sathi_b_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sathi_b_gpa5=$total_jdc_folafol_porisonkhan['sathi_b_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sathi_b_agred=$total_jdc_folafol_porisonkhan['sathi_b_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sathi_b_a_gred=$total_jdc_folafol_porisonkhan['sathi_b_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sathi_b_bgred=$total_jdc_folafol_porisonkhan['sathi_b_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sathi_b_cgred=$total_jdc_folafol_porisonkhan['sathi_b_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $sathi_b_dgred=$total_jdc_folafol_porisonkhan['sathi_b_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($sathi_b_mp!=0)? $sathi_b=($sathi_b_mp+$sathi_b_gpa5+$sathi_b_agred+$sathi_b_a_gred+$sathi_b_bgred+$sathi_b_cgred+$sathi_b_dgred):0?>
                                </td>
                            </tr>
                            


                            <tr>
                            
                                <td class="tg-y698 type_1" > ২	</td>
                                <td class="tg-y698 type_1" > কর্মী	</td>
                                
                                <td class="tg-0pky" >
                                <?php echo $kormi_b_mp=$total_jdc_folafol_porisonkhan['kormi_b_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kormi_b_gpa5=$total_jdc_folafol_porisonkhan['kormi_b_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kormi_b_agred=$total_jdc_folafol_porisonkhan['kormi_b_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kormi_b_a_gred=$total_jdc_folafol_porisonkhan['kormi_b_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kormi_b_bgred=$total_jdc_folafol_porisonkhan['kormi_b_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kormi_b_cgred=$total_jdc_folafol_porisonkhan['kormi_b_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kormi_b_dgred=$total_jdc_folafol_porisonkhan['kormi_b_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($kormi_b_mp!=0)? $kormi_b=($kormi_b_mp+$kormi_b_gpa5+$kormi_b_agred+$kormi_b_a_gred+$kormi_b_bgred+$kormi_b_cgred+$kormi_b_dgred):0?>
                                </td>
                            </tr>
                          
                            <tr>
                            
                                <td class="tg-y698 type_1"> ৩	</td>
                                <td class="tg-y698" >সমর্থক  </td>
                              
                                <td class="tg-0pky" >
                                <?php echo $somorthok_b_mp=$total_jdc_folafol_porisonkhan['somorthok_b_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $somorthok_b_gpa5=$total_jdc_folafol_porisonkhan['somorthok_b_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $somorthok_b_agred=$total_jdc_folafol_porisonkhan['somorthok_b_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $somorthok_b_a_gred=$total_jdc_folafol_porisonkhan['somorthok_b_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $somorthok_b_bgred=$total_jdc_folafol_porisonkhan['somorthok_b_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $somorthok_b_cgred=$total_jdc_folafol_porisonkhan['somorthok_b_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $somorthok_b_dgred=$total_jdc_folafol_porisonkhan['somorthok_b_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($somorthok_b_mp!=0)? $somorthok_b=($somorthok_b_mp+$somorthok_b_gpa5+$somorthok_b_agred+$somorthok_b_a_gred+$somorthok_b_bgred+$somorthok_b_cgred+$somorthok_b_dgred):0?>
                                </td>
                            </tr>
                            
                          
                            <tr>
                            
                      
                            <tr>
                              
                                <td class="tg-0pky" colspan="2">মোট</td>
                                <td class="tg-0pky" ><?php echo $mp=($sathi_b_mp!=0)?($sathi_b_mp+$sathi_m_mp+$kormi_b_mp+$kormi_m_mp+$somorthok_b_mp+$somorthok_m_mp):0?></td>   
                                <td class="tg-0pky" ><?php echo $mp=($sathi_b_mp!=0)?($sathi_b_mp+$sathi_m_mp+$kormi_b_mp+$kormi_m_mp+$somorthok_b_mp+$somorthok_m_mp):0?></td>
                                <td class="tg-0pky" ><?php echo $gpa5=($sathi_b_gpa5!=0)?($sathi_b_gpa5+$sathi_m_gpa5+$kormi_b_gpa5+$kormi_m_gpa5+$somorthok_b_gpa5+$somorthok_m_gpa5):0?></td>
                                <td class="tg-0pky" ><?php echo $agred=($sathi_b_agred!=0)?($sathi_b_agred+$sathi_m_agred+$kormi_b_agred+$kormi_m_agred+$somorthok_b_agred+$somorthok_m_agred):0?></td>
                                <td class="tg-0pky" ><?php echo $a_gred=($sathi_b_a_gred!=0)?($sathi_b_a_gred+$sathi_m_a_gred+$kormi_b_a_gred+$kormi_m_a_gred+$somorthok_b_a_gred+$somorthok_m_a_gred):0?></td>
                                <td class="tg-0pky" ><?php echo $bgred=($sathi_b_bgred!=0)?($sathi_b_bgred+$sathi_m_bgred+$kormi_b_bgred+$kormi_m_bgred+$somorthok_b_bgred+$somorthok_m_bgred):0?></td>
                                <td class="tg-0pky" ><?php echo $cgred=($sathi_b_cgred!=0)?($sathi_b_cgred+$sathi_m_cgred+$kormi_b_cgred+$kormi_m_cgred+$somorthok_b_cgred+$somorthok_m_cgred):0?></td>
                                <td class="tg-0pky" ><?php echo ($mp+$gpa5+$agred+$a_gred+$bgred+$cgred+$dgred)?></td>
                            </tr>
                            
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
