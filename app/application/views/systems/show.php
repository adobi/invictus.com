<div class="well">
  <?php if ($url): ?>
    <iframe src="<?php echo $url ?>" frameborder="0" width="100%" height="100%"></iframe>
  <?php else: ?>
    <div class="alert alert-error">
      Invalid system!
    </div>
  <?php endif ?>
</div>