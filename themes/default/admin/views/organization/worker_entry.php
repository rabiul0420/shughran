<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Institution' . ': Entry'; ?></h4>
        </div>




        <input type="hidden" value="<?php echo $branch->id; ?>" name="branch_id" />



        <div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>



            <div class="row">




                <div class="col-md-12 col-sm-12">


                    <table class="table table-bordered">
                        <thead>

                            <tr>

                                <th class="col-md-4 align-left text-left">প্রতিষ্ঠান</th>
                                <th class="col-md-8">কর্মী </th>


                            </tr>
                        </thead>


                        <tbody>


                            <?php foreach ($institutiontype as $institution_type) { ?>

                                <tr style="background: aqua;">
                                    <td class="align-left text-left"> <?php echo $institution_type->institution_type; ?>
                                    </td>

                                    <td></td>
                                </tr>

                                <?php foreach ($institutions as $institution)
                                    if ($institution->type_id == $institution_type->id) { ?>
                                        <tr>
                                            <td class="align-left text-left" style="text-align: left;" colspan="1">
                                                <?php echo $institution->institution_type ?></td>
                                            <td>
                                                <a href="#" class="editable editable-click" data-type="number"
                                                    data-table="organization_record"
                                                    data-pk="<?php //echo $detailinfo['organization_record']->id; ?>"
                                                    data-url="<?php echo admin_url('departmentsreposssssrt/detailupdate'); ?>"
                                                    data-name="worker"
                                                    data-title="Enter">OKAY<?php //echo $detailinfo['dawatelementinfo']->hadith_sale; ?></a>
                                            </td>

                                        </tr>


                                    <?php }
                            } ?>










                </div>



            </div>








        </div>
        <div class="modal-footer">

        </div>
    </div>

</div>
<?= $modal_js ?>

<?= 1 ? '<script type="text/javascript" src="' . $assets . 'plugins/xedit/bootstrap3-editable/js/bootstrap-editable.min.js"></script>' : ''; ?>


<?php if(1) {?>

<script>

(function() {
        var original = $.fn.editableutils.setCursorPosition;
        $.fn.editableutils.setCursorPosition = function() {
            try {
                original.apply(this, Array.prototype.slice.call(arguments));
            } catch (e) {
                /* noop */
            }
        };
    })();

    $('.editable').editable({
                mode: 'inline',
                showbuttons: false,
                params: function(params) {
                    // add additional params from data-attributes of trigger element
                    params.table = $(this).editable().data('table');
                    params.id = $(this).editable().data('id');
                    params.idname = $(this).editable().data('idname');
                    params.branch_id = <?php echo isset($branch->id) ? $branch->id : "''"; ?>;
                    params.token = $("meta[name=token]").attr("content");
                    return params;
                },
                success: function(response, config) {


                    console.log(config);
                    var data = $.parseJSON(response);

                    if (data.flag == 3)
                        location.reload();
                    else if (data.flag == 1) {
                        // config.error.call(this, data.msg);
                        alert(data.msg);
                        location.reload();
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
</script>

<?php } ?>