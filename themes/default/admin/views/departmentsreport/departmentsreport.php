<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<<<<<<< HEAD

=======
>>>>>>> 8c60b8a0b15d1fbe1d1c1358363b54b568429d9e
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'departments report'; ?>
        </h2>


        <div class="box-icon">
            <ul class="btn-tasks">

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport') ?>"><i class="fa fa-building-o"></i>
                                    <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport?branch_id=' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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


            <table id="example1" class="display table-bordered" style="width:100%">
            <thead style="background-color:#428BCA;color:white;text-align: center;">
                        <tr>
                            <th width="4%">
                            <?= $this->session->userdata('group_id') == 8 ? শাখা : ক্রম ?> 
                           
                            </th>
                            <th width="20%">বিভাগ</th>
                            <th width="8%">সিরিয়াল দেয়া হয়েছে?</th>
                            <th width="8%">রিপোর্ট চেক ?</th>
                            <th width="8%">রিপোর্ট ওকে?</th>
                            <th width="50%">বিভাগীয় রিভিউ</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php if($branch_list)   foreach ($branch_list as $row)     { 
<<<<<<< HEAD
                             $i = 0;
                             foreach($departments as $dept){
                             $i++;
=======
                            
                            foreach($departments as $dept){
                                $i++;
>>>>>>> 8c60b8a0b15d1fbe1d1c1358363b54b568429d9e
                             $record =   serial_info($row->id,$dept->id, $serial_records );
                         // var_dump( $record);
                           
                           ?>
                            <tr>
<<<<<<< HEAD
                                <td><?= $this->session->userdata('group_id') == 8 ? $row->name : $i; ?></td>
=======
                                <td>
                                    <?= $this->session->userdata('group_id') == 8 ? $row->name : $i; ?>
                                    
                                </td>
>>>>>>> 8c60b8a0b15d1fbe1d1c1358363b54b568429d9e
                                <td><?= $dept->name ?></td>
                                <td><?=isset($record['is_checked']) ?  '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>'?></td>
                                
                                <td><?=isset($record['is_checked']) && $record['is_checked']=='YES'  ?  '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>'?></td>
                                <td><?=isset($record['is_reportok']) && $record['is_reportok']=='OK'  ?  '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>'?></td>
                                <td><?=isset($record['dept_review']) ? $record['dept_review'] : ''?></td>
<<<<<<< HEAD
=======

>>>>>>> 8c60b8a0b15d1fbe1d1c1358363b54b568429d9e

                            </tr>
                        <?php } } ?>
                    </tbody>


                </table>


            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

=======
>>>>>>> 8c60b8a0b15d1fbe1d1c1358363b54b568429d9e
<script>
      
    new DataTable('#example1', {
    order: [[3, 'asc']],
    pageLength: 50
    });      
   
</script>