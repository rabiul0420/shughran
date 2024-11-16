<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিভাগীয় সিরিয়াল'; ?>
        </h2>

    </div>


    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <table id="example3" class="display table-bordered" style="width:100%">
                <thead style="background-color:#428BCA;color:white;text-align: center;">
                    <tr>
                    <th scope="col">ক্রম </th>
                    <th scope="col">বিভাগের নাম</th>
                    <th scope="col">সিরিয়াল দেয়া হয়েছে?</th>
                    <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
                    <th scope="col">রিপোর্ট ওকে?</th>
                    <th scope="col">বিভাগের পক্ষ থেকে করা মন্তব্য</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    print_r($all_depart->dept_id);
                        if(isset($all_departments)):  
                    ?>

                        <?php $i = 0;
                         foreach($all_departments as $department) : $i++ ?>
                
                    <tr>
                    <td scope="row"> <?php echo $i; ?> </td>
                    <td> <?php echo $department->name; ?> </td>
                        <td>
                            <?php                        
                           
                            
                        
                        ?></td>
                    <td>  <?php echo $department->is_checked; ?></td>
                    <td><?php echo $department->is_reportok; ?></td>
                    <td>
                        <?php
                            if (!empty($department->dept_review)) {
                                echo $department->dept_review;
                            } else {
                                echo "N/A";
                            } ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif ?>
                </tbody>
                </table>
            </div>           
        </div>
    </div>
    













































<br><br><br>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <table id="example2" class="display table-bordered" style="width:100%">
                <thead style="background-color:#428BCA;color:white;text-align: center;">
                    <tr>
                    <th scope="col">ক্রম </th>
                    <th scope="col">বিভাগের নাম</th>
                    <th scope="col">সিরিয়াল দেয়া হয়েছে?</th>
                    <th scope="col">রিপোর্ট চেক দেয়া হয়েছে?</th>
                    <th scope="col">রিপোর্ট ওকে?</th>
                    <th scope="col">বিভাগের পক্ষ থেকে করা মন্তব্য</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($all_serial)):  ?>

                        <?php foreach($all_serial as $serials) :?>
                
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
                            // shikha department code = 45             
                            echo "শিক্ষা বিভাগ";              
                        }elseif($serials->dept_id == 46){ 
                            // others = 46              
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
                            echo "N/A";
                        } ?></td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif ?>
                </tbody>
                </table>
            </div>           
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
</script>