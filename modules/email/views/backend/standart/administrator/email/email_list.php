<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
   //This page is a result of an autogenerated content made by running test.html with firefox.
   function domo() {

      // Binding keys
      $('*').bind('keydown', 'Ctrl+a', function assets() {
         window.location.href = BASE_URL + '/administrator/Email/add';
         return false;
      });

      $('*').bind('keydown', 'Ctrl+f', function assets() {
         $('#sbtn').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+x', function assets() {
         $('#reset').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+b', function assets() {

         $('#reset').trigger('click');
         return false;
      });
   }

   jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      <?= cclang('email') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('email') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">

      <div class="col-md-12">

         <div class="callout callout-info">
            <h4>Info!</h4>

            <p>You can setup cron job for send email <b><?= base_url('web/mailer/10') ?></b>. once per 5 minutes<br>
               like this configuration email will send 10 per call
            </p>
         </div>

         <div class="box box-warning">
            <div class="box-body ">

               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('email_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('email')]); ?>  (Ctrl+a)" href="<?= site_url('administrator/email/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('email')]); ?></a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('email_template'); ?> <?= cclang('email') ?> " href="<?= site_url('administrator/email_template') ?>"><i class="fa  fa-television"></i> <?= cclang('email_template'); ?> </a>
                        <a class="btn btn-flat btn-success" title="<?= cclang('history'); ?> <?= cclang('email') ?> " href="<?= site_url('administrator/mailer'); ?>"><i class="fa fa-envelope-o"></i> <?= cclang('history'); ?> </a>

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('email') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('email')]); ?> <i class="label bg-yellow"><?= $email_counts; ?> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_email" id="form_email" action="<?= base_url('administrator/email/index'); ?>">


                     <div class="table-responsive">
                        <table class="table table-bordered table-striped dataTable">
                           <thead>
                              <tr class="">
                                 <th>
                                    <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                 </th>
                                 <th data-field="title" data-sort="1" data-primary-key="0"> <?= cclang('title') ?></th>
                                 <th data-field="receipent" data-sort="1" data-primary-key="0"> <?= cclang('receipent') ?></th>
                                 <th data-field="key" data-sort="1" data-primary-key="0"> <?= cclang('label') ?></th>
                                 <th data-field="created_at" data-sort="1" data-primary-key="0"> <?= cclang('created_at') ?></th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody_email">
                              <?php foreach ($emails as $email) : ?>
                                 <tr>
                                    <td width="5">
                                       <input type="checkbox" class="flat-red check" name="id[]" value="<?= $email->id; ?>">
                                    </td>

                                    <td><?= _ent($email->title); ?></td>
                                    <td> <?php
                                          if ($email->users) {
                                             echo $email->users;
                                          } else {
                                             echo "All users";
                                          } ?> </td>

                                    <td><?= _ent($email->key); ?></td>
                                    <td><?= _ent($email->created_at); ?></td>
                                    <td width="200">

                                       <?php is_allowed('email_view', function () use ($email) { ?>
                                          <a href="<?= site_url('administrator/email/view/' . $email->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                                          <?php }) ?>
                                          <?php is_allowed('email_update', function () use ($email) { ?>
                                             <a href="<?= site_url('administrator/email/edit/' . $email->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                                          <?php }) ?>

                                          <?php is_allowed('email_update', function () use ($email) { ?>
                                             <a href="<?= site_url('administrator/email/duplicate/' . $email->id); ?>" class="label-default"><i class="fa fa-copy "></i> <?= cclang('duplicate'); ?></a>
                                          <?php }) ?>

                                          <?php is_allowed('email_resend', function () use ($email) { ?>
                                             <a href="<?= site_url('administrator/email/resend/' . $email->id); ?>" class="label-default"><i class="fa fa-refresh "></i> <?= cclang('resend'); ?></a>
                                          <?php }) ?>
                                          <?php is_allowed('email_delete', function () use ($email) { ?>
                                             <a href="javascript:void(0);" data-href="<?= site_url('administrator/email/delete/' . $email->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                                          <?php }) ?>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                              <?php if ($email_counts == 0) : ?>
                                 <tr>
                                    <td colspan="100">
                                       Email data is not available
                                    </td>
                                 </tr>
                              <?php endif; ?>

                           </tbody>
                        </table>
                     </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 ">
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                     </div>
                     <div class="col-sm-3 padd-left-0  ">
                        <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 ">
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field">
                           <option value=""><?= cclang('all'); ?></option>
                           <option <?= $this->input->get('f') == 'title' ? 'selected' : ''; ?> value="title">Title</option>
                           <option <?= $this->input->get('f') == 'receipent' ? 'selected' : ''; ?> value="receipent">Receipent</option>
                           <option <?= $this->input->get('f') == 'key' ? 'selected' : ''; ?> value="key">Key</option>
                           <option <?= $this->input->get('f') == 'created_at' ? 'selected' : ''; ?> value="created_at">Created At</option>
                        </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/email'); ?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>
                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                        <?= $pagination; ?>
                     </div>
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->
<script>
   $(document).ready(function() {

      $('.remove-data').click(function() {

         var url = $(this).attr('data-href');

         swal({
               title: "<?= cclang('are_you_sure'); ?>",
               text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
               cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
               closeOnConfirm: true,
               closeOnCancel: true
            },
            function(isConfirm) {
               if (isConfirm) {
                  document.location.href = url;
               }
            });

         return false;
      });


      $('#apply').click(function() {

         var bulk = $('#bulk');
         var serialize_bulk = $('#form_email').serialize();

         if (bulk.val() == 'delete') {
            swal({
                  title: "<?= cclang('are_you_sure'); ?>",
                  text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
                  cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
                  closeOnConfirm: true,
                  closeOnCancel: true
               },
               function(isConfirm) {
                  if (isConfirm) {
                     document.location.href = BASE_URL + '/administrator/email/delete?' + serialize_bulk;
                  }
               });

            return false;

         } else if (bulk.val() == '') {
            swal({
               title: "Upss",
               text: "<?= cclang('please_choose_bulk_action_first'); ?>",
               type: "warning",
               showCancelButton: false,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Okay!",
               closeOnConfirm: true,
               closeOnCancel: true
            });

            return false;
         }

         return false;

      }); /*end appliy click*/


      //check all
      var checkAll = $('#check_all');
      var checkboxes = $('input.check');

      checkAll.on('ifChecked ifUnchecked', function(event) {
         if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
         } else {
            checkboxes.iCheck('uncheck');
         }
      });

      checkboxes.on('ifChanged', function(event) {
         if (checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
         } else {
            checkAll.removeProp('checked');
         }
         checkAll.iCheck('update');
      });
      initSortable('email', $('table.dataTable'));
   }); /*end doc ready*/
</script>