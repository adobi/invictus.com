<div class="well">
    <h3>
      Layout
      <p class="pull-right" style="margin:5px 0 0 0">
        <span class="label label-info">Tipp</span> <span class="tipp-text"><span class="tipp-text">Drag items from the right <span style="font-size:1.6em;">&rarr;</span></span></span>
      </p>
    </h3>
    <hr>
    <div id="layout" class="accordion">
      <div class=" accordion-group">
        <div class="accordion-heading">
          <h6>
            <a href="#more-games" data-toggle="collapse" class="accordion-toggle">
              <i class="icon-resize-vertical"></i>More games
              <span class="pull-right">
                <span class="label label-info">Tipp</span> <span class="tipp-text">Move items to change the order</span>
              </span>
            </a>
          </h6>
        </div>
        <div class="accordion-body collapse in" id="more-games">
          <div class=" accordion-inner">
            <ul class="thumbnails">
              <?php foreach (range(1,5) as $key => $item): ?>
                <li class="span2">
                </li>
              <?php endforeach; ?>
              
            </ul>
          </div>
        </div>
      </div>
      <div class=" accordion-group">
        <div class="accordion-heading">
          <h6><a href="#footer" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-resize-vertical"></i>Footer Top games
              <span class="pull-right">
                <span class="label label-info">Tipp</span> <span class="tipp-text">Move items to change the order</span>
              </span>            
          </a></h6>
        </div>
        <div class="accordion-body collapse in" id="footer" >
          <div class=" accordion-inner">
            <ul class="thumbnails">
              <?php foreach (range(1,5) as $key => $item): ?>
                <li class="span2">
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class=" accordion-group">
        <div class="accordion-heading">
          <h6><a href="#banners" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-resize-vertical"></i>Banners
              <span class="pull-right">
                <span class="label label-info">Tipp</span> <span class="tipp-text">Move items to change the order</span>
              </span>            
          </a></h6>
        </div>
        <div class="accordion-body collapse in" id="banners">
          <div class=" accordion-inner">
            <ul class="thumbnails">
              <?php foreach (range(1,4) as $key => $item): ?>
                <li class="span2">
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>  
</div>