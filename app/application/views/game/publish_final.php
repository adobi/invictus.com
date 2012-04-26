
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', '_data-ajax-form'=>1)) ?>    

    <?php echo panel_close('publish_to_press/'.($item ? $item->id : '')) ?>
    
    <legend>
      <strong>8. </strong>
        <?php if ($item): ?>
          "<?php echo $item->name ?>"
        <?php endif ?>
        <p class="pull-right">
          <!-- <a href="<?php echo base_url() ?>game/publish_final/<?php echo $item->id ?>" data-ajax-link class="btn"><i class="icon-refresh"></i></a> -->
          
          <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
          <?php if ($item): ?>
            <!-- <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a> -->
          <?php endif ?>
        </p>
    </legend> 
    <div class="right-side-scroll">
      <h4 style="margin-left:10px;font-size:1em" class="upper-gray">Customize the setup in the following systems:</h4>
      <br>
      
      <div class="span4" style="margin-bottom:20px;">
        <a class="btn btn-large span4" href="<?php echo NEWS_URL ?>auth/auto_login/<?php echo $this->session->userdata('created_news_id') ? '?r=rumor/edit/'.$this->session->userdata('created_news_id') : '' ?>" target="_blank">Go to "Invictus In game news"</a>
      </div>
      <div class="span4" style="margin-bottom:20px;">
        <a class="btn btn-large span4" href="<?php echo PRESS_RELEASE_URL ?>auth/auto_login/<?php echo $this->session->userdata('created_press_release_id') ? '?r=pressrelease/edit/'.$this->session->userdata('created_news_id') : '' ?>" target="_blank">Go to "Invictus Press"</a>
      </div>
      <div class="span4" style="margin-bottom:20px;">
        <a class="btn btn-large span4" href="<?php echo MICROSITES_URL ?>auth/auto_login/<?php echo $this->session->userdata('created_microsite_id') ? '?r=microsite/edit/'.$this->session->userdata('created_microsite_id') : '' ?>" target="_blank">Go to "Invictus Microsites"</a>
      </div>      
    </div>
  <?php echo form_close() ?> 
  <?php 
    $this->session->unset_userdata('created_news_id');
    $this->session->unset_userdata('created_press_release_id');
    $this->session->unset_userdata('created_microsite_id')
  ?>   