<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
function row_status($x)
{
    if ($x == null) {
        return '';
    } elseif ($x == 'pending') {
        return '<div class="text-center"><span class="label label-warning">' . lang($x) . '</span></div>';
    } elseif ($x == 'completed' || $x == 'paid' || $x == 'sent' || $x == 'received') {
        return '<div class="text-center"><span class="label label-success">' . lang($x) . '</span></div>';
    } elseif ($x == 'partial' || $x == 'transferring') {
        return '<div class="text-center"><span class="label label-info">' . lang($x) . '</span></div>';
    } elseif ($x == 'due') {
        return '<div class="text-center"><span class="label label-danger">' . lang($x) . '</span></div>';
    } else {
        return '<div class="text-center"><span class="label label-default">' . lang($x) . '</span></div>';
    }
}

?>



<?php if ($Owner || $Admin) { ?>
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="blue"><i class="fa fa-th"></i><span class="break"></span><?= lang('quick_links') ?></h2>
                </div>
                <div class="box-content">









                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="blightBlue white quick-button small" href="<?= admin_url('notifications') ?>">
                            <i class="fa fa-comments"></i>

                            <p><?= lang('notifications') ?></p>
                            <!--<span class="notification green">4</span>-->
                        </a>
                    </div>

                    <?php if ($Owner) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bblue white quick-button small" href="<?= admin_url('auth/users') ?>">
                                <i class="fa fa-group"></i>
                                <p><?= lang('users') ?></p>
                            </a>
                        </div>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bblue white quick-button small" href="<?= admin_url('system_settings') ?>">
                                <i class="fa fa-cogs"></i>

                                <p><?= lang('settings') ?></p>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>


    <h1>আপনার রিপোর্টটি এখনো গৃহীত হয় নি
    </h1>



    <table class="table " style=" table-layout: fixed; word-wrap: break-word; ">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">বিএম</th>
                <th style="width: 10%" scope="row">সাহিত্য</th>
                <th style="width: 10%" scope="row">প্রকাশনা</th>
                <th style="width: 10%" scope="row">মাদরাসা</th>
                <th style="width: 10%" scope="row">সসাস</th>
                <th style="width: 10%" scope="row">বিজ্ঞান</th>
                <th style="width: 10%" scope="row">শিশু কল্যাণ</th>
                <th style="width: 10%" scope="row">ইংলিশ মিডিয়াম</th>
                <th style="width: 10%" scope="row">এইচআরএম</th>
                <th style="width: 10%" scope="row">মন্তব্য</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                <td><i class="fa fa-times" aria-hidden="true"></i></td>
                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                <td><i class="fa fa-times" aria-hidden="true"></i></td>
                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                <td><i class="fa fa-times" aria-hidden="true"></i></td>
                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                <td><i class="fa fa-times" aria-hidden="true"></i></td>
                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                <td><i class="fa fa-times" aria-hidden="true"></i></td>

            </tr>

            <tr>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
                <td><input type="text" readonly class="form-control" id="usr"></td>
            </tr>
            <tr>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
                <td><textarea class="form-control" rows="5" id="comment"></textarea></td>
            </tr>

        </tbody>

    </table>



<?php } ?>