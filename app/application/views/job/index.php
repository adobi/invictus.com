<div class="well">
  <h1>
    Job categories
    <p class="pull-right">
      <a href="#" onclick="$('.category-items').toggle();">toggle</a> &nbsp;
      <a class="btn btn-primary" href="<?= base_url(); ?>jobcategory/edit" data-ajax-link="1" ><i class="icon-plus-sign icon-white"></i>New category</a>
    </p>
  </h1>
  
  <?php if ($job_category_items): ?>
    <div class="category-items">
      <hr>
      <?php foreach ($job_category_items as $item): ?>
        <div class="item">
          <h4>
            <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->icon ?>" alt=""> 
          
            <?php echo $item->name ?>
            
            <p class="pull-right" style="margin-top:5px;">
              <a href="<?php echo base_url() ?>jobcategory/edit/<?php echo $item->id ?>" data-ajax-link="1"><i class="icon-pencil"></i></a>
              <a href="<?php echo base_url() ?>jobcategory/delete/<?php echo $item->id ?>"><i class="icon-trash"></i></a>
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
      <a class="btn btn-primary" href="<?= base_url(); ?>job/edit" data-ajax-link="1"><i class="icon-plus-sign icon-white"></i>New job</a>
    </p>
  </h1>
  
  <?php if ($job_items): ?>
    <div class="job-items">
      <hr>
      <?php foreach ($job_items as $item): ?>
        
      <?php endforeach ?>
    </div>
  <?php endif ?>
  
</div> <!-- well -->  