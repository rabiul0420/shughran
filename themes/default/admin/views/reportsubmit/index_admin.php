<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .tableFixHead          { overflow: auto; height: 600px; }
.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }
</style>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-info-circle"></i><?= 'ছাড়পত্র'; ?></h2>


    </div>
    


    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

               
                <div id="form">

                    <?php echo admin_form_open("reportsubmit", array('method' => 'get')); ?>
                    <div class="row">





                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="type"><?= 'type'; ?></label>
                                <?php
                                $bl[""] = lang('select') . ' ' . 'Type';
                                $types = array(array('id' => 'half_yearly', 'name' => 'half_yearly'), array('id' => 'annual', 'name' => 'annual'));
                                foreach ($types as $type) {
                                    $bl[$type['id']] =  $type['name'];
                                }
                                echo form_dropdown('type', $bl, (isset($_GET['type']) ? $_GET['type'] : "annual"), 'class="form-control" required id="type" data-placeholder="' . $this->lang->line("select") . " " . 'Type' . '"');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="year"><?= lang("year"); ?></label>
                                <?php
                                $wh[""] = lang('select') . ' ' . lang('year');
                                $years = array();
                                for ($i = date('Y'); $i >= 2020; $i--) {
                                    $years[] = array('id' => $i, 'name' => $i);
                                }

                                foreach ($years as $year) {
                                    $wh[$year['id']] = $year['name'];
                                }
                                echo form_dropdown('year', $wh, (isset($_GET['year']) ? $_GET['year'] : date('Y')), 'class="form-control" id="year" required data-placeholder="' . $this->lang->line("select") . " " . 'year' . '"');
                                ?>
                            </div>
                        </div>













                    </div>
                    <div class="form-group">
                        <div class="controls"> <?php echo form_submit('submit_report', $this->lang->line("submit"), 'class="btn btn-primary"'); ?> </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
                <div class="clearfix"></div>



                <div class="table-responsive">

                <div class="tableFixHead">
                    <table class="table table-bordered table-hover table-striped table-condensed reports-table">
                        <thead>
                            <tr>
                                <th width="5%"><?= lang("branch_name"); ?></th>
                                <th width="5%"><?= lang("branch_code"); ?></th>
                                <?php foreach ($departments as $department) {
                                    echo '<th>' . $department->name . '</th>';
                                } ?>

                                <th>মন্তব্য</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // $this->session->userdata('department_id')

                            $count = count($departments);
                            foreach ($branches as $key => $row) {
                                $final_status = 0;
                                $value = report_submit($row->id,  $submitinfo);

                                //  $comment = report_submit_comment($row->id,$submitinfo); 
                            ?>
                                <tr>
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->code ?></td>
                                    <?php

                                    $width = number_format(85 / $count, 2, '.', '');

                                    $icount = 0;
                                    foreach ($departments as $department) {
                                        if ($value->{"department_" . $department->id} == 1)
                                            $icount++;
                                        echo '<td width="' . $width . '%">' . ($value->{"department_" . $department->id} == 1 ? '<span class="label label-success"><span class="glyphicon glyphicon-ok " aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>') . '<br/><br/>' . $value->{"comment_" . $department->id} . '</td>';
                                    }

                                    ?>
                                    <td>

                                        <?php
                                        if ($count == $icount) {
                                            echo '<span class="label label-success">Completed</span>';
                                        } else {
                                            echo '<span class="label label-danger">Not Completed</span>';
                                        }


                                        ?>

                                    </td>
                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>