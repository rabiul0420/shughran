<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #ICData td:nth-child(7) {
        text-align: right;
    }
  .note-primary {
    background-color: #dfeefd;
    border-color: #176ac4;
}
.note {
    padding: 10px;
    border-left: 6px solid;
    border-radius: 5px;
}
</style>
 
<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('pages/page_actions', 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= lang('সহায়িকা')  ; ?>
        </h2>

         
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext hidden"><?= lang('list_results'); ?></p>
				<ul class="list-unstyled">
				<?php foreach($supports as $row) {?>
				<li>
				<h3  class="note note-primary"><a href="<?= admin_url('support/detail/'.$row['id']); ?>"><?php echo $row['title'];?></a></h3>
				</li>
				<?php }?>
				
				</ul>
            </div>
        </div>
    </div>
</div>
<?php if ($Owner || $GP['bulk_actions']) { ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>
<?php } ?>
