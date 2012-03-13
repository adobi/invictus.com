<div class="well">
  <h1>
    Job categories
    <p class="pull-right">
      <a href="#" onclick="$('.category-items').toggle();">toggle</a> &nbsp;
      <a class="btn btn-primary" href="<?= base_url(); ?>jobcategory/edit" data-ajax-link="1" data-unselect="1"><i class="icon-plus-sign icon-white"></i>New</a>
    </p>
  </h1>
  
  <?php if ($job_category_items): ?>
    <div class="items category-items">
      <hr>
      <?php foreach ($job_category_items as $item): ?>
        <div class="item">
          <h4>
            <img src="<?php echo $item->icon ? base_url() . 'uploads/original/' . $item->icon : 'http://placehold.it/24x24' ?>" alt=""> 
            <?php echo $item->name ?>
            
            <p class="pull-right" style="margin-top:5px;">
              <a href="<?php echo base_url() ?>jobcategory/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit category"><i class="icon-pencil"></i></a>
              <a href="<?php echo base_url() ?>jobcategory/delete/<?php echo $item->id ?>" class="delete-job" data-location="l" rel="tooltip" title="Delete category"><i class="icon-trash"></i></a>
            </p>
          </h4>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
  
</div> <!-- well -->  

<div class="well">
  
  <h1>
    Jobs
    <p class="pull-right">
      <a href="#" onclick="$('.job-items').toggle();">toggle</a> &nbsp;
      <a class="btn btn-primary" href="<?= base_url(); ?>job/edit" data-ajax-link="1" data-unselect="1"><i class="icon-plus-sign icon-white"></i>New</a>
    </p>
  </h1>
  
  <?php if ($job_items): ?>
    <div class="items job-items">
      <hr>
      <?php foreach ($job_items as $item): ?>
        <div class="item">
          <h4>
            <?php echo $item->name ?>
            <p class="pull-right" style="margin-top:5px;">
              <a href="#" rel="tooltip" title="Candidates for the job"><i class="icon-user"></i></a>
              <a href="<?php echo base_url() ?>job/show/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="View job"><i class="icon-eye-open"></i></a>
              <a href="<?php echo base_url() ?>job/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit job"><i class="icon-pencil"></i></a>
              <a href="<?php echo base_url() ?>job/delete/<?php echo $item->id ?>" class="delete-job" data-location="l" rel="tooltip" title="Delete job"><i class="icon-trash"></i></a>
            </p>
          </h4>
          <h6>
            <?php echo $item->type === '1' ? 'Full time' : 'Part time' ?> — <?php echo $item->location ?>
          </h6>
        </div>        
      <?php endforeach ?>
    </div>
  <?php endif ?>
  
</div> <!-- well -->  