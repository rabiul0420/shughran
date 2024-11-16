<?php
function render_dept_report_serial_form($branch_id, $report_info,$department_id, $serial_info, $is_owner, $is_admin) {
  
    // print_r($serial_info->dept_review);
    // print_r($department_id);
    // echo $report_info['type'];
    ?>
  
  <div class="col-md-12">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td style="width: 350px;" rowspan="2">
                    এই বিভাগের রিপোর্ট পূরণ করা শেষ হলে বিভাগকে রিপোর্ট চেক করার জন্য সিরিয়াল দিন
                </td>
                <?php echo form_open_multipart(base_url("index.php/admin/serialcontroller/sentserial/" . $branch_id), ['onsubmit' => 'return confirmSerialSubmit()']); ?>
                    <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />
                    <input type="hidden" name="dept_id" value="<?php echo $department_id; ?>" />
                    <input type="hidden" name="report_type" value="<?php echo $report_info['type']; ?>" />
                    <td rowspan="2" style="width: 100px;">
                        <?php if ((int) $serial_info->branch_id === (int) $branch_id && (int) $serial_info->dept_id === (int) $department_id): ?>
                            সিরিয়াল দেওয়া হয়েছে।
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary btn-sm mx-2 my-2 my-md-0">সিরিয়াল দিন</button>
                        <?php endif; ?>
                    </td>
                <?php echo form_close(); ?>
                <td style="width: 50px;">চেক</td>
                <td style="width: 50px;">রিপোর্ট ওকে?</td>
            </tr>
            <tr>
                <td scope="row"><?php echo $serial_info->is_checked; ?></td>
                <td><?php echo $serial_info->is_reportok; ?></td>
            </tr>
            <tr>
                <td style="width: 100px;">বিভাগীয় রিভিউ</td>
                <td colspan="4" style="width: 500px; text-align: left;">
                    <?php echo $serial_info->dept_review; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function confirmSerialSubmit() {
        return confirm("Are you sure, you want to submit the serial?");
    }
</script>




    <?php if($is_owner || $is_admin): ?>


   <?php echo form_open_multipart(base_url("index.php/admin/serialcontroller/updateserial/" . $branch_id)); ?>
   
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="check" class="serialTxt">চেক *</label>
                    </div>
                </div>
                
                <input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id" />

                <input type="hidden" value="<?php echo $department_id; ?>" name="dept_id" />

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_checked" id="checked" value="YES" required="required">
                            <label class="form-check-label" for="checked">YES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_checked" id="notchecked" value="NO">
                            <label class="form-check-label" for="notchecked">NO</label>
                        </div>
                    </div>
                </div>
         
          
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="serialTxt">ছাড়পত্র *</label>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_charpotro" id="charpotro_com" value="OK" required="required">
                            <label class="form-check-label" for="charpotro_com">OK</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_charpotro" id="char_notcom" value="NOT OK">
                            <label class="form-check-label" for="char_notcom">NOT OK</label>
                        </div>
                    </div>
                </div>
                  
           
                <div class="col-md-12">
                    <div class="form-group" >
                        <?= lang("বিভাগীয় রিভিউ", "dept_review"); ?>
                        <?php echo form_textarea('dept_review', '', 'class="form-control" id="dept_review" style="min-height: 50px;height:40px;"'); ?>
                    </div>
                </div>

                <div class="col-md-12">
                <div class="form-group" >
                    <?php echo form_submit('serialreport', 'Submit', 'class="btn btn-primary"'); ?>
                </div>
                </div>
        <?php echo form_close(); ?>



        <?php endif ?>

<?php } ?>




