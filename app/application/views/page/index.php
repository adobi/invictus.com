<div class="well">
  <h3>
    Pages
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>page/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new page"><i class="icon-plus-sign icon-white"></i></a>
    </p>
  </h3>    
  <?php if ($items): ?>
    <div class="items page-items">
      <hr>
      <?php foreach ($items as $item): ?>
        <div class="item">
            <h4>
              <?php echo $item->name ?>
              <p class="pull-right" style="margin-top:5px;">
                <a href="<?php echo base_url() ?>page/seo/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="SEO settings"><i class="icon-search"></i></a>
                <a href="<?php echo base_url() ?>page/edit/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Edit page"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>page/delete/<?php echo $item->id ?>" class="btn delete-item select-item" data-location="l" rel="tooltip" title="Delete page" data-modal-header="Page <?php echo $item->name ?>"><i class="icon-trash"></i></a>
              </p>
            </h4> 
            <h6><?php echo $item->title ?></h6>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>