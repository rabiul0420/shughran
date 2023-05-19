<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'ফাউন্ডেশন' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/foundation') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/foundation/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">ফাউন্ডেশন/ ট্রাস্ট/ এসোসিয়েশন সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2"style="border-bottom: hidden;">রেজিস্ট্রিকৃত </td>
                                <td class="tg-pwj7" rowspan="3">সি এ কর্তৃক আয় ব্যয় অডিট সম্পন্ন হ্যাঁ/ না   </td>
                                <td class="tg-pwj7" rowspan="3"> ফাউন্ডেশন কমিটি রেজুলেশন আপডেট হ্যাঁ /না  </td>
                                <td class="tg-pwj7" rowspan="3"> জমির পরিমাণ শতাংশ হিসাব </td>
                                <td class="tg-pwj7" colspan="2"style="border-bottom: hidden;"> জমি আছে রেজিস্ট্রেশন </td>
                                <td class="tg-pwj7" rowspan="3">জমির দলিলপত্র আপডেট </td>
                                <td class="tg-pwj7" rowspan="3">নিয়মিত খাজনা হয় কিনা  </td>
                              
                       
                       
                       
                            </tr>
                            <tr>
                        
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span> জয়েন্ট স্টক কম্পানি </span></div></td>
                                <td class="tg-pwj7 "><div><span>সমাজসেবা </span></div></td>
                                <td class="tg-pwj7 "><div><span>ফাউন্ডেশনের নাম শতাংশ</span></div></td>
                                <td class="tg-pwj7 "><div><span>ব্যক্তির নাম শতাংশ </span></div></td>
                       
                       
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1">	</td>
                                <td class="tg-0pky  type_1">
                                
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                                <td class="tg-0pky  type_3">
                                
                                </td>
                                <td class="tg-0pky  type_4">
                                
                                </td>
                                <td class="tg-0pky  type_5">
                                
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
                         

                            </tr>


                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                               
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                
                                </td>
                         
                    
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                
                                </td>
                      
                            </tr>
                          



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
