    <?php echo panel_close() ?>
    <legend>
        <?php if ($item): ?>
            Messages for <?php echo $item->email ?>
        <?php endif ?>
    </legend>  
    <div class="right-side-scroll" style="">
      <?php if ($items): ?>
        <div class="items category-items">
          <?php foreach ($items as $it): ?>
            <div class="item">
              <h4>
                <a href="mailto:<?php echo $it->email ?>"><?php echo $it->email ?></a>
                <p class="pull-right">
                  <a rel="tooltip" title="Toggle message" class="btn" href="javascript:void(0)" onclick="$(this).parents('.item:first').find('.message').toggle()"><i class="icon-resize-vertical"></i></a>
                  <?php if (!$it->is_read): ?>
                    <a href="<?php echo base_url() ?>contact/mark_as_read/<?php echo $it->id ?>" class="btn mark-as-read" rel="tooltip" title="Mark as read"><i class="icon-eye-open"></i></a>
                  <?php endif ?>
                </p>
              </h4>
              <h6>Subject: <strong class="<?php echo !$it->is_read ? 'unread' : 'read' ?> "><?php echo $it->subject ?></strong> <?php echo ($it->created) ?></h6>
              <h6>Message:</h6>
              <p  class="hide message"> <?php echo nl2br($it->message) ?></p>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>