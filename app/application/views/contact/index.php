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
                <a href="<?php echo base_url() ?>contact/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit contact"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>contact/delete/<?php echo $item->id ?>" class="delete-item" data-location="l" rel="tooltip" title="Delete contact"><i class="icon-trash"></i></a>
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
    
              <p class="pull-right" style="margin-top:5px;">
                <a href="<?php echo base_url() ?>contacttype/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit email"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>contacttype/delete/<?php echo $item->id ?>" class="delete-item" data-location="l" rel="tooltip" title="Delete email"><i class="icon-trash"></i></a>
              </p>
            </h4> 
        </div>
      <?php endforeach ?>
    </div>
    <div class="hidden csrf-form">
      <?php echo form_open() ?>
      <?php echo form_close() ?>
    </div>
  <?php endif ?>
</div>