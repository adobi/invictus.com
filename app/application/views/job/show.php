
<?php if ($item): ?>
  <?php echo panel_close() ?>
  <legend>
      <?php if ($item): ?>
          View <?php echo $item->name ?>
      <?php endif ?>
      <p class="pull-right">
        <a href = "<?php echo base_url() ?>job/edit/<?php echo $item->id ?>" data-ajax-link="1" class="btn btn-primary" rel="tooltip" title="Edit job"><i class="icon-pencil icon-white"></i></a>          
          <a href="<?php echo base_url() ?>job/analytics/<?php echo $item->id ?>" class="btn btn-primary" data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal icon-white"></i></a>
          <a href="<?php echo base_url() ?>job/delete/<?php echo $item->id ?>" class="btn delete-job" data-location="r" rel="tooltip" title="Delete job"><i class="icon-trash"></i></a>
      </p>
  </legend>  
  <div class=" right-side-scroll">
    <h2><?php echo $item->name ?></h2>
    <h6 style="margin-bottom:30px;"><?php echo $item->type === '1' ? 'Full time' : 'Part time' ?> — <?php echo $item->location ?></h6>  
    <strong>About this Job</strong><br> 
    <p><?php echo nl2br($item->description) ?></p>
    <br>&nbsp;<strong>Responsibilities</strong><br>
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
