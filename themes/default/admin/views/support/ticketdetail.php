<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'শিরোনাম: ' . $ticketdetail->ticket_caption; ?>  </h4>
        </div>

        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'support_ticket');
        echo admin_form_open_multipart("support/add" . ($branch_id ? '/' . $branch_id : ''), $attrib); ?>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                <p><span class="label label-success"><?=$ticketdetail->is_status?></span></p>
                <p><?=$branch->code?></p>
                
                <p><?=$ticketdetail->page?></p>
                <p><?=$ticketdetail->category?></p>

                
                 
                </div>
                <div class="col-md-10">
                    <p>Ticket ID <strong># <?=$ticketdetail->id?></strong> opened by <b><?=trim($user->first_name.' '.$user->last_name)?></b> on <?=date("d M,Y h:i:s A", strtotime($ticketdetail->entry_date))?></p>
                    <hr/>
                      

                     <?= stripslashes(html_entity_decode($ticketdetail->ticket_detail, ENT_QUOTES | ENT_XHTML | ENT_HTML5, 'UTF-8')); ?>

                </div>
            </div>


            <?php for($i = 1; $i<2; $i++) {?>
            <div class="row support-content-comment">
                <div class="col-md-2">
                  </div>
                <div class="col-md-10">
                    <p>Replied by <a href="#">ehernandez</a> on 16/06/2014 at 14:12</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    
                </div>
            </div>
            <?php } ?>
            <div class="row support-content-comment">
                <div class="col-md-2">
                  </div>
                <div class="col-md-10">
                    <textarea class="form-control"></textarea>
                    <a href="#"><span class="fa fa-reply"></span> &nbsp;Save</a>
                </div>
            </div>

        </div>



        <div class="modal-footer">
            <?php echo form_submit('ticket', 'Submit', 'class="btn btn-primary ticket"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>


<script>
    $("#decrease_member1").submit(function(e) {


        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                console.log(data); // show response from the php script.
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>