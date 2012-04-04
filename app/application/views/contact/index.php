<div class="well">
  <h3>
    Contact informations
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>contact/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new contact"><i class="icon-plus-sign icon-white"></i></a>
    </p>
  </h3>    
  <?php if ($items_contacts): ?>
    <div class="items offer-items">
      <hr>
      <?php foreach ($items_contacts as $item): ?>
        <div class="item">
            <h4>
              <?php echo $item->name ?>
              <span style="font-size:0.8em; color:#999;"><?php echo $item->location ?></span>
              <p class="pull-right" style="margin-top:5px;">
                <a href="<?php echo base_url() ?>contact/edit/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Edit contact"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>contact/delete/<?php echo $item->id ?>" class="btn delete-item select-item" data-location="l" rel="tooltip" title="Delete contact" data-modal-header="Contact <?php echo $item->name ?>"><i class="icon-trash"></i></a>
              </p>
            </h4> 
            <h6>
              <?php echo $item->email ?> &nbsp; &nbsp; &nbsp;
              <?php echo $item->phone ?> &nbsp; &nbsp; &nbsp;
              <?php echo $item->fax ?>
            </h6>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>

<div class="well">
  <h3>
    Email addresses
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>contacttype/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new email address"><i class="icon-plus-sign icon-white"></i></a>
    </p>    
  </h3>    
  <?php if ($items_emails): ?>
    <div class="items contact-type-items">
      <hr>
      <?php foreach ($items_emails as $item): ?>
        <div class="item" id = "<?php echo $item->id ?>">
            <h4>
              <i class="icon-move"></i>
              <?php echo $item->name ?>
              <span style="font-size:0.8em; color:#999;"><?php echo $item->email ?></span>
              <a href="<?php echo base_url() ?>contact/messages/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Messages for this address">
                <!--<i class="icon-user"></i>  -->
                <span class="badge badge-info"><?php echo $item->messages ? $item->messages : 0 ?></span>
              </a>
              
    
              <p class="pull-right" style="margin-top:5px;">
                <!-- <a class="btn" href="<?php echo base_url() ?>contacttype/analytics/<?php echo $item->id ?>" data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a>         -->
                <a href="<?php echo base_url() ?>contacttype/edit/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Edit email"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>contacttype/delete/<?php echo $item->id ?>" class="btn delete-item select-item" data-location="l" rel="tooltip" title="Delete email" data-modal-header="Email <?php echo $item->name?>"><i class="icon-trash"></i></a>
              </p>
            </h4> 
            <p>&nbsp;</p>
        </div>
      <?php endforeach ?>
    </div>
    <div class="hidden csrf-form">
      <?php echo form_open() ?>
      <?php echo form_close() ?>
    </div>
  <?php endif ?>
</div>