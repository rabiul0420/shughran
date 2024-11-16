<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সকল বিভাগীয় সিরিয়াল'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2022 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">কোড </th>
      <th scope="col">বিভাগের নাম</th>
      <th scope="col">সিরিয়াল দেয়া হয়েছে?</th>
      <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
      <th scope="col">ছাড়পত্র</th>
      <th scope="col">বিভাগের পক্ষ থেকে করা মন্তব্য</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if(isset($all_serials)):  ?>

        <?php foreach($all_serials as $serials) :?>
   
    <tr>
      <th scope="row">
        <?php
         if (!empty($serials->branch_id)) {
            echo $serials->branch_id;
         } ?> 
        </th>
      <td>
        <?php
         
         if($serials->dept_id == 5){
            echo "সাহিত্য বিভাগ";
        }elseif($serials->dept_id == 6){ 
            // dawah department code = 6              
            echo "দাওয়াহ বিভাগ";
        }elseif($serials->dept_id == 7){ 
            // law department code = 7              
            echo "আইন বিভাগ";
        }elseif($serials->dept_id == 8){ 
            // foundation department code = 8              
            echo "ফাউন্ডেশন বিভাগ";
        }elseif($serials->dept_id == 9){ 
            // publicity department code = 9              
            echo "প্রচার বিভাগ";
        }elseif($serials->dept_id == 10){ 
            // international department code = 10              
            echo "আন্তর্জাতিক বিভাগ"; 
        }elseif($serials->dept_id == 11){ 
            // shikha department code = 11             
            echo "শিক্ষা বিভাগ";              
        }elseif($serials->dept_id == 12){                
            // manpower-bivag (মানবসম্পদ ব্যবস্থাপনা বিভাগ) code = 12
            echo "মানবসম্পদ ব্যবস্থাপনা বিভাগ";    
        }elseif($serials->dept_id == 13){ 
            // publication department code = 13              
            echo "প্রকাশনা বিভাগ"; 
        }elseif($serials->dept_id == 14){ 
            // chatro-andolon-bivag code = 14             
            echo " ছাত্র আন্দোলন বিভাগ"; 
        }elseif($serials->dept_id == 15){ 
            // chatrokollan-bivag code = 15 
            echo " ছাত্রকল্যাণ বিভাগ";   
        }elseif($serials->dept_id == 16){ 
            // culture department code = 16
            echo " সাংস্কৃতিক বিভাগ";     
        }elseif($serials->dept_id == 17){ 
            // science department code = 17   
            echo " বিজ্ঞান বিভাগ";      
        }elseif($serials->dept_id == 18){ 
            // manobadhikar-bivag code = 18
            echo " মানবাধিকার বিভাগ";    
        }elseif($serials->dept_id == 19){ 
            // madrasha department code = 19 
            echo "মাদরাসা বিভাগ";       
        }elseif($serials->dept_id == 20){ 
            // poriklpona-bivag department code = 20           
            echo " প্লানিং এন্ড ডেভেলপমেন্ট বিভাগ";  
        }elseif($serials->dept_id == 21){ 
            // college department code = 21            
            echo " কলেজ বিভাগ";              
        }elseif($serials->dept_id == 22){
            // research department code = 22             
            echo " গবেষণা বিভাগ"; 
        }elseif($serials->dept_id == 23){ 
            // school department code = 23            
            echo " স্কুল বিভাগ";  
        }elseif($serials->dept_id == 24){ 
            // media department code = 24              
            echo " মিডিয়া  বিভাগ";   
        }elseif($serials->dept_id == 25){ 
            // bitorko department code = 25            
            echo " বিতর্ক  বিভাগ";               
        }elseif($serials->dept_id == 26){ 
            // pathagar-bivag code = 26            
            echo " পাঠাগার  বিভাগ";               
        }elseif($serials->dept_id == 27){ 
            // /information-bivag code = 27            
            echo " তথ্য   বিভাগ";               
        }elseif($serials->dept_id == 28){ 
            // sports department code = 28             
            echo " স্পোর্টস বিভাগ";              
        }elseif($serials->dept_id == 29){ 
            // it-bivag code = 29              
            echo " তথ্যপ্রযুক্তি  বিভাগ";          
        }elseif($serials->dept_id == 30){ 
            // social-welfare-bivag = 30               
            echo " পরিবেশ ও সমাজসেবা বিভাগ";   
        }elseif($serials->dept_id == 43){ 
            // it-bivag_sm (social media)  code = 43             
            echo "সোশ্যাল মিডিয়া বিভাগ";        
        }elseif($serials->dept_id == 44){ 
            // business department code = 44             
            echo " ব্যবসায় শিক্ষা বিভাগ";        
        }elseif($serials->dept_id == 45){ 
            // others = 45              
            echo " অন্যান্য";             
        }
        
        
        ?>
      </td>
      <td>  <?php
         if (!empty($serials->dept_id)) {
            echo "Yes";
         } ?>
        </td>
      <td>  <?php echo $serials->is_checked; ?></td>
      <td><?php echo $serials->is_charpotro; ?></td>
      <td>
        <?php
         if (!empty($serials->dept_review)) {
            echo $serials->dept_review;
         } else {
            echo "এখনো কোন মন্তব্য করা হয় নি";
         } ?></td>
    </tr>
    <?php endforeach ?>
    <?php endif ?>

    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>Thornton</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
  </tbody>
</table>
            </div>


<style>
    .green{
        color:green;font-weight:bold;
    }
</style>




<div class="col-lg-12">
<table id="example" class="display table-bordered" style="width:100%">
        <thead style="background-color:#428BCA;color:white;">
            <tr>
            <th scope="col">সাহিত্য বিভাগ</th>
            <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
            <th scope="col">ছাড়পত্র</th>
            <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </thead>
        <tbody>
    <?php 
    if(isset($literature_serials)):  ?>

        <?php foreach($literature_serials as $lit_serials) :?>
   
    <tr>

      <td>  <?php echo $lit_serials->branch_id; ?></td>
     


       <td  <?php if($lit_serials->is_checked == 'YES'){ echo 'class="green"';}?>> 
         <?php echo $lit_serials->is_checked; ?>
        </td>


      <td>  <?php echo $lit_serials->is_charpotro; ?></td>
      
      <td>
        <?php
         if (!empty($lit_serials->dept_review)) {
            echo $lit_serials->dept_review;
         } ?>
    </td>
    </tr>
    <?php endforeach ?>
    <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Age</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
</div>
  


<br><br>

<div class="col-lg-12">
<table id="example2" class="display table-bordered" style="width:100%">
        <thead style="background-color:#428BCA;color:white;">
            <tr>
            <th scope="col">আন্তর্জাতিক বিভাগ</th>
            <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
            <th scope="col">ছাড়পত্র</th>
            <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </thead>
        <tbody>
    <?php 
    if(isset($inter_serials)):  ?>

        <?php foreach($inter_serials as $inter_serial) :?>
   
    <tr>

      <td>  <?php echo $inter_serial->branch_id; ?></td>
     


       <td  <?php if($inter_serial->is_checked == 'YES'){ echo 'class="green"';}?>> 
         <?php echo $inter_serial->is_checked; ?>
        </td>


      <td>  <?php echo $inter_serial->is_charpotro; ?></td>
      
      <td>
        <?php
         if (!empty($inter_serial->dept_review)) {
            echo $inter_serial->dept_review;
         } ?>
    </td>
    </tr>
    <?php endforeach ?>
    <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Age</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
</div>
  






           
        </div>
    </div>
</div>


<script>
    
    new DataTable('#example', {
    columnDefs: [
        {
            target: 2,
            visible: true,
            searchable: true
        },
        {
            target: 3,
            visible: true
        }
    ]
});


    new DataTable('#example1', {
    columnDefs: [
        {
            target: 2,
            visible: true,
            searchable: true
        },
        {
            target: 3,
            visible: true
        }
    ]
});


    new DataTable('#example2', {
    columnDefs: [
        {
            target: 2,
            visible: true,
            searchable: true
        },
        {
            target: 3,
            visible: true
        }
    ]
});
</script>