
<?php if ($item): ?>
  <legend>
      <?php if ($item): ?>
          Edit <?php echo $item->name ?>
      <?php else: ?>
          New
      <?php endif ?>
      <p class="pull-right">
        <a href = "<?php echo base_url() ?>job/edit/<?php echo $item->id ?>" data-ajax-link="1" class="btn btn-primary"><i class="icon-pencil icon-white"></i>Edit</a>          
          <a href="<?php echo base_url() ?>job/analytics/<?php echo $item->id ?>" class="btn btn-primary" data-ajax-link="1"><i class="icon-signal icon-white"></i>Analytics</a>
          <a href="<?php echo base_url() ?>job/delete/<?php echo $item->id ?>" class="btn"><i class="icon-trash"></i>Delete</a>
      </p>
  </legend>  
  <div class=" right-side-scroll">
    <h2><?php echo $item->name ?></h2>
    <h6 style="margin-bottom:30px;"><?php echo $item->type === '1' ? 'Full time' : 'Part time' ?> — <?php echo $item->location ?></h6>  
    <strong>About this Job</strong><br> 
    <p><?php echo $item->description ?></p>
    <br>&nbsp; <br> <strong>Responsibilities</strong><br>
    <ul>
      <?php foreach ($item->responsabilities as $key => $value): ?>
        <li><?php echo $value->description ?></li>
      <?php endforeach ?>
    </ul>
    <strong>Qualifications</strong><br>
    <ul>
      <?php foreach ($item->qualifications as $key => $value): ?>
        <li><?php echo $value->description ?></li>
      <?php endforeach ?>
    </ul>
    <strong>Desired Skills</strong><br>
    <ul>
      <?php foreach ($item->skills as $key => $value): ?>
        <li><?php echo $value->description ?></li>
      <?php endforeach ?>
    </ul>    
    <strong>What we offer</strong><br>
    <ul>
      <?php foreach ($item->offers as $key => $value): ?>
        <li><?php echo $value->description ?></li>
      <?php endforeach ?>
    </ul>       
  </div>
<?php endif ?>
