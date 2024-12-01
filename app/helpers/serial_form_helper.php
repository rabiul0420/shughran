<?php
function render_dept_report_serial_form($branch_id, $report_info, $department_id, $serial_info, $is_owner, $is_admin, $is_departmentuser) {
    // Ensure $serial_info is an object or provide default values
    $serial_info = is_object($serial_info) ? $serial_info : (object) [
        'branch_id' => null,
        'dept_id' => null,
        'dept_review' => null,
        'is_checked' => null,
        'is_reportok' => null,
    ];

    $checked =  null;
    $reportok =  null;
    $checked =  $serial_info->is_checked;
    $reportok =  $serial_info->is_reportok;
    ?>

    <div class="col-md-12" <?php if($is_owner || $is_admin || $is_departmentuser){ echo "style='display:none;'";} ?> >

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
                            <?php if ((int) $serial_info->branch_id === (int) $branch_id && (int) $serial_info->dept_id === (int) $department_id || (int) $is_departmentuser === 1): ?>
                                সিরিয়াল দেওয়া হয়েছে। <br>
                            <small><?= $serial_info->created_at ? $serial_info->created_at : ""; ?> </small>
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary btn-sm mx-2 my-2 my-md-0">সিরিয়াল দিন</button>
                            <?php endif; ?>
                        </td>
                    <?php echo form_close(); ?>
                    <td style="width: 50px;">চেক</td>
                    <td style="width: 50px;">রিপোর্ট ওকে?</td>
                </tr>
                <tr>
                    <td scope="row"><?= $serial_info->is_checked; ?></td>
                    <td><?= $serial_info->is_reportok; ?></td>
                </tr>
                <tr>
                    <td style="width: 100px;">বিভাগীয় রিভিউ 
                        <?= $serial_info->updated_at ? '( সর্বশেষ আপডেট '. $serial_info->updated_at.')'  : ""; ?> </td>
                    <td colspan="4" style="width: 500px; text-align: left;">
                        <?php echo $serial_info->dept_review; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function confirmSerialSubmit() {
            return confirm("আপনি কি নিশ্চিত যে এই বিভাগের রিপোর্টটি পূরণ সম্পন্ন হয়েছে?");
        }
    </script>

    <?php if ($is_owner || $is_admin || $is_departmentuser): ?>
        <?php echo form_open_multipart(base_url("index.php/admin/serialcontroller/updateserial/" . $branch_id)); ?>

        <!-- Hidden Inputs -->
        <input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id" />
        <input type="hidden" value="<?php echo $department_id; ?>" name="dept_id" />
        <input type="hidden" value="<?= date('Y-m-d H:i:s'); ?>" name="updated_at" />
        
        <!-- Check Field -->
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <label for="is_checked">চেক *</label>
            </div>
        </div>

        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="is_checked" id="is_checked" value="YES" required="required"<?= (isset($serial_info->is_checked) && $serial_info->is_checked == 'YES') ? 'checked' : ''; ?>>

                            <label class="form-check-label" for="is_checked">YES</label>
                        </div>
                    </div>
                </div>
         

        <!-- Report OK Field -->
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <label for="is_reportok">রিপোর্ট ওকে? *</label>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <select class="form-select form-select-lg" required="required" style="width:100%;" name="is_reportok" id="is_reportok">
                    <option value="">Select</option>
                    <option value="OK">OK</option>
                    <option value="NOT OK">NOT OK</option>
                </select>
            </div>
        </div>

        <!-- Departmental Review -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="dept_review">বিভাগীয় রিভিউ</label>
                <textarea class="form-control" id="dept_review" name="dept_review" rows="1" placeholder="Enter your message here..." required>
                    <?php echo $serial_info->dept_review; ?>
                </textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-md-12 text-left">
            <div class="form-group">
                <?php echo form_submit('serialreport', 'Submit', 'class="btn btn-primary"'); ?>
            </div>
        </div>

        <?php echo form_close(); ?>
        <style>
            .redactor_editor {
                min-height: 10px !important;
            }
        </style>
    <?php endif; ?>

<?php } ?>
