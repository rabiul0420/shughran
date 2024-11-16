<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সকল বিভাগীয় সিরিয়াল'; ?>

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
      <th scope="col">আন্তর্জাতিক বিভাগ</th>
      <th scope="col">সিরিয়াল দেয়া হয়েছে?</th>
      <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
      <th scope="col">রিপোর্ট ওকে?</th>
      <th scope="col">বিভাগের পক্ষ থেকে করা মন্তব্য</th>
    </tr>
  </thead>
  <tbody>
    <?php  if(isset($all_serials)):  ?>
        <?php foreach($all_serials as $serials) :?>
           
        <?php  if ($serials->dept_id == 10): ?>
            
            
   
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
      <td><?php echo $serials->is_reportok; ?></td>
      <td>
        <?php
         if (!empty($serials->dept_review)) {
            echo $serials->dept_review;
         } else {
            echo "এখনো কোন মন্তব্য করা হয় নি";
         } ?></td>
    </tr>
    
    <?php endif ?>
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
    caption{
        font-size:20px;
    }
    .centered-content {
    display: flex;
    justify-content: center;
}
</style>



<!-- Literature department code 5 -->
<div class="col-lg-12 ">
<table id="example1" class="display table-bordered" style="width:100%">
<caption class="">সাহিত্য বিভাগ</caption>
        <thead style="background-color:#428BCA;color:white;text-align: center;">
            <tr>
            <th scope="col">কোড</th>
            <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
            <th scope="col">রিপোর্ট ওকে?</th>
            <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </thead>
        <tbody>            

<?php  if(isset($all_serials)):  ?>
<?php foreach($all_serials as $serials) :?>
    <!-- Literature department code 5 -->
<?php  if ($serials->dept_id == 5): ?>
    <tr>
      <td>  <?php echo $serials->branch_id; ?></td>
       <td  <?php if($serials->is_checked == 'YES')
            { echo 'class="green"';}?>> 
         <?php echo $serials->is_checked; ?>
        </td>
      <td>  <?php echo $serials->is_reportok; ?></td>
      <td>
        <?php
         if (!empty($serials->dept_review)) {
            echo $serials->dept_review;
         } else {
            echo "এখনো কোন মন্তব্য করা হয় নি";
         } ?>
    </td>
    </tr>
    <?php endif ?>
    <?php endforeach ?>
    <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">কোড</th>
                <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
                <th scope="col">রিপোর্ট ওকে?</th>
                <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /. Literature department code 5 -->





<!-- Education department code 11 -->
<div class="col-lg-12 ">
<table id="example3" class="display table-bordered" style="width:100%">
<caption class="">শিক্ষা বিভাগ</caption>
        <thead style="background-color:#428BCA;color:white;text-align: center;">
            <tr>
            <th scope="col">কোড</th>
            <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
            <th scope="col">রিপোর্ট ওকে?</th>
            <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </thead>
        <tbody>            

<?php  if(isset($all_serials)):  ?>
<?php foreach($all_serials as $serials) :?>
    <!-- Education department code 11 -->
<?php  if ($serials->dept_id == 11): ?>
    <tr>
      <td>  <?php echo $serials->branch_id; ?></td>
       <td  <?php if($serials->is_checked == 'YES')
            { echo 'class="green"';}?>> 
         <?php echo $serials->is_checked; ?>
        </td>
      <td>  <?php echo $serials->is_reportok; ?></td>
      <td>
        <?php
         if (!empty($serials->dept_review)) {
            echo $serials->dept_review;
         } else {
            echo "এখনো কোন মন্তব্য করা হয় নি";
         } ?>
    </td>
    </tr>
    <?php endif ?>
    <?php endforeach ?>
    <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">কোড</th>
                <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
                <th scope="col">রিপোর্ট ওকে?</th>
                <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /. Education department code 11 -->






<!-- International department code 10 -->
<div class="col-lg-12 ">
<table id="example4" class="display table-bordered" style="width:100%">
<caption class="">আন্তর্জাতিক বিভাগ</caption>
        <thead style="background-color:#428BCA;color:white;text-align: center;">
            <tr>
            <th scope="col">কোড</th>
            <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
            <th scope="col">রিপোর্ট ওকে?</th>
            <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </thead>
        <tbody>            

<?php  if(isset($all_serials)):  ?>
<?php foreach($all_serials as $serials) :?>
    <!-- International department code 10 -->
<?php  if ($serials->dept_id == 10): ?>
    <tr>
      <td>  <?php echo $serials->branch_id; ?></td>
       <td  <?php if($serials->is_checked == 'YES')
            { echo 'class="green"';}?>> 
         <?php echo $serials->is_checked; ?>
        </td>
      <td>  <?php echo $serials->is_reportok; ?></td>
      <td>
        <?php
         if (!empty($serials->dept_review)) {
            echo $serials->dept_review;
         } else {
            echo "এখনো কোন মন্তব্য করা হয় নি";
         } ?>
    </td>
    </tr>
    <?php endif ?>
    <?php endforeach ?>
    <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">কোড</th>
                <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
                <th scope="col">রিপোর্ট ওকে?</th>
                <th scope="col">বিভাগের মন্তব্য</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /. international department code 10 -->
           
        </div>
    </div>
</div>


<script>
    
   
    new DataTable('#example1', {
    order: [[3, 'asc']]
    });

    
    new DataTable('#example2', {
    order: [[3, 'asc']]
    });

    
    new DataTable('#example3', {
    order: [[3, 'asc']]
    });

   
    new DataTable('#example4', {
    order: [[3, 'asc']]
    });

    
    new DataTable('#example5', {
    order: [[3, 'asc']]
    });

    
    new DataTable('#example6', {
    order: [[3, 'asc']]
    });

   
    new DataTable('#example7', {
    order: [[3, 'asc']]
    });

    
    new DataTable('#example8', {
    order: [[3, 'asc']]
    });

    
    new DataTable('#example9', {
    order: [[3, 'asc']]
    });


</script>