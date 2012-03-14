    <?php echo panel_close() ?>
    <legend>
        <?php if ($item): ?>
            Applications for <?php echo $item->name ?>
        <?php else: ?>
            New
        <?php endif ?>
        <p class="pull-right">
          <a href="<?php echo base_url() ?>job/show/<?php echo $item->id ?>" class="btn btn-primary" data-ajax-link="1" rel="tooltip" title="View job"><i class="icon-eye-open icon-white"></i></a>
        </p>
    </legend>  
    <div class="right-side-scroll" style="">
      <?php if ($items): ?>
        <div class="items category-items">
          <?php foreach ($items as $it): ?>
            <div class="item <?php echo $it->called ? 'alert-success' : '' ?>">
              <h4>
                <a href="<?php echo base_url() ?>jobapplication/<?php echo $it->called ? 'not_called' : 'called' ?>/<?php echo $it->id ?>" class="btn switch-item" rel="tooltip" title="<?php echo $it->called ? 'Remove called flag' : 'Add called flag' ?>"><i class="icon-headphones"></i></a>
                <?php echo $it->name ?>
                <p class="pull-right">
                  <span style="color:#999; font-size:12px;">Download</span>
                  <?php if ($it->cv): ?>
                    <a href="#" class="btn " rel="tooltip" title="Download CV"><i class="icon-file"></i></a>
                  <?php endif ?>
                  <?php if ($it->portfolio): ?>
                    <a href="#" class="btn" rel="tooltip" title="Download portfolio"><i class="icon-picture"></i></a>
                  <?php endif ?>
                </p>
              </h4>
              <h6>Email: <a href="mailto:<?php echo $it->email ?>"><?php echo $it->email ?></a></h6>
              <h6> Phone: <?php echo $it->phone ?></h6>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>