<div class="well">
  <h3>
    Categories
      
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>category/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new category"><i class="icon-plus-sign icon-white"></i></a>
    </p>
  </h3>    
  <?php if ($items): ?>
    <div class="items platform-items">
      <hr>
      <?php foreach ($items as $item): ?>
        <div class="item">
            <h4>
              <?php echo $item->name ?>
              <div class="pull-right" style="margin-top:5px;">
                <div class="btn-group">
                <a  href="<?php echo base_url() ?>category/edit/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Edit category"><i class="icon-pencil"></i></a>
                <a  href="<?php echo base_url() ?>category/delete/<?php echo $item->id ?>" class="btn delete-item select-item" data-location="l" rel="tooltip" title="Delete category" data-modal-header="Category <?php echo $item->name ?>"><i class="icon-trash"></i></a>
                </div>
              </div>
            </h4>        
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>