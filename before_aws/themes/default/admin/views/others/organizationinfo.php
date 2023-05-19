<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সাংগঠনিক বিবরণঃ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        
             

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
      
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষান্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : ''),'জুলাই-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : ''),'ষান্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষান্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/others/organizationinfo'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষান্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span>

       
            </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                 <li>	
                            <a class="hidden"  href="#" id="excel" data-action="export_excel">	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
								
							<a href="#" onclick="doit('xlsx','testTable2');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
								
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('others/organizationinfo') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('others/organizationinfo/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

				 
				<style>
			.table-responsive{width: 1100px;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				
                <div class="table-responsive">
				
	
				 
 
 <table class="table table-bordered" id="testTable2"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_organizationinfo_' : 'central_organizationinfo'?>">
<tbody>
<tr>
<td colspan="2" rowspan="2" >সাংগঠনিক বিবরণ</td>

<td rowspan="2">সংখ্যা</td>
<td colspan="2" rowspan="2">মোট বৃদ্ধি</td>
<td rowspan="2" >মোট ঘাটতি</td>
<td colspan="6" >প্রাতিষ্ঠানিক</td>
<td colspan="5">আবাসিক</td>
</tr>

<tr>
<td>পূর্ব</td>
<td>সংখ্যা</td>
<td colspan="2">বৃদ্ধি</td>
<td colspan="2">ঘাটতি</td>
<td>পূর্ব</td>
<td colspan="2">সংখ্যা</td>
<td>বৃদ্ধি</td>
<td>ঘাটতি</td>
</tr>

<?php  
 

 foreach($organizationinfos as $organizationinfo) {?>
<tr>
<td  colspan="2"><?php echo $organizationinfo->organizationinfo_name?></td>
<td>
<?php 

if($organizationinfo->id == 4) { 
$increase = isset($unit_increase_decrease[0]['unit_increase']) ? $unit_increase_decrease[0]['unit_increase'] : 0;
$decrease = isset($unit_increase_decrease[0]['unit_decrease']) ? $unit_increase_decrease[0]['unit_decrease'] : 0;
}
else { 
$increase = sum_record($organizationinfo_summary,'institutional_increase',$organizationinfo->id,'organizationinfo_id');
$decrease = sum_record($organizationinfo_summary,'institutional_decrease',$organizationinfo->id,'organizationinfo_id');
}
	
 
$prev =     sum_record($organizationinfo_summary_prev,'institutional',$organizationinfo->id,'organizationinfo_id'); 

$increase2 = sum_record($organizationinfo_summary,'residential_increase',$organizationinfo->id,'organizationinfo_id');
$prev2 =  sum_record($organizationinfo_summary_prev,'residential',$organizationinfo->id,'organizationinfo_id'); 
$decrease2 = sum_record($organizationinfo_summary,'residential_decrease',$organizationinfo->id,'organizationinfo_id');
;
if($report_info['prev_record']) 
  echo $prev+$increase-$decrease + $prev2+$increase2-$decrease2; 
?>
</td>



<td colspan="2"><?php  echo $increase  + $increase2;?></td>
<td ><?php    echo $decrease  + $decrease2;?></td>
<td ><?php if($report_info['prev_record'])   echo $prev;?></td>
<td ><?php  if($report_info['prev_record'])   echo $prev+$increase-$decrease;?></td>
<td colspan="2"><?php echo $increase;?></td>
<td colspan="2"><?php echo $decrease;?></td>


<td><?php  if($report_info['prev_record'])   echo $prev2;?></td>
<td colspan="2"><?php  if($report_info['prev_record'])  echo $prev2+$increase2-$decrease2;?></td>
<td><?php echo $increase2;?></td>
<td><?php echo $decrease2;?></td>
</tr>
<?php }?>
</tbody>
</table>
 
 
 
 
 
 
 
				
				
				
				
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 
