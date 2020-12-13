<?php block('content'); ?>
<div class="row">
  <div class="col-12">

    <?php echo sp_alert_flashes('websites'); ?>

    <div class="px-1 pb-2">
      <div class="row align-items-center">

        <div class="col-4 text-left">
            <?php echo __('Log Searches'); ?>
            <?php if ((int) get_option('search_log')) : ?>
                <span class="badge badge-success"><?php echo __('Enabled'); ?></span>
            <?php else : ?>
                <span class="badge badge-danger"><?php echo __('Disabled'); ?></span>
            <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
            <thead>
            <tr>
                <th><?php echo __('Websites'); ?></th>
                <th><?php echo __('Created At'); ?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($t['list_entries'])) :?>
                <?php foreach ($t['list_entries'] as $item) :?>
                <tr>
                    <td>
                    <div>
                        <?php echo e($item['sitename']); ?>
                    </div>
                    </td>

                    <td>
                        <div><?php echo time_ago($item['created_at']); ?></div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="7" class="p-0"><div class="alert alert-light m-0 rounded-0 border-0"><?php echo __('No entries found'); ?></div></td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
      <!-- ./table-responsive -->

      <div class="card-footer">
        <div class="container">
          <div class="row align-items-end flex-row-reverse">

            <div class="col-md-4 col-xs-12 mb-5 text-right">
                <?php echo sprintf(__('Showing %s-%s of total %s entries.'), $t['offset'], $t['current_items'], $t['total_items']); ?>

            </div>
            <div class="col-md-8 col-xs-12 text-left">
              <nav class="table-responsive mb-2">
                <?php echo $t['pagination_html']; ?>
            </nav>
            </div>

          </div>
        </div>
      </div>
  </div>
</div>
<?php endblock(); ?>

<?php block('body_end'); ?>
<script type="text/javascript">
//   $(function() {
//     $(document).on('click', '.delete-entry', function (e) {
//       e.preventDefault();
//       var endpoint = $(this).attr('href');

//       lnv.confirm({
//         title: '<?php echo __("Confirm Deletion"); ?>',
//         content: '<?php echo __("Are you sure you want to delete this query?"); ?>',
//         confirmBtnText: '<?php echo __("Confirm"); ?>',
//         confirmHandler: function () {
//           $spark.ajaxPost(endpoint, {}, function () {
//             $spark.selfReload();
//           });
//         },
//         cancelBtnText: '<?php echo __("Cancel"); ?>',
//         cancelHandler: function() {
//         }
//       })
//     });

//     // check all boxes
//     $('#check-all').on('change', function () {
//       var check_all = $(this);
//       if (check_all.prop('checked')) {
//         $("input[name='item_multi[]").prop('checked', true);
//       } else {
//         $("input[name='item_multi[]").prop('checked', false);
//       }
//     });

//   });
</script>
<?php endblock(); ?>
<?php
extend(
    'admin::layouts/skeleton.php',
    [
    'title' => __('websites'),
    'body_class' => 'websites websites-list',
    'page_heading' => __('websites'),
    'page_subheading' => __('Manage websites.'),
    ]
);
