 <?php
use yii\helpers\Url;

 ?>
<?php foreach ($product as $prod):?>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="product">
                <a href="<?= \yii\helpers\Url::to(['site/single-product', 'id' => $prod->id, 'name' => $prod->name]) ?>">
                   <div class="img-container"><img src="<?=Url::to(['web/'.$prod->photo])?>" alt=""></div>
                </a>
                <h2><?=$prod->name?> </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees"><?=$prod->price?> грн</span></p>
                    </div>
                    <div class="add-cart">
                        <span class="pull-right "><a class="add-to-cart" data-id="<?=$prod->id?>" href="#"><i class="fa fa-cart-plus" style='font-size:23px' aria-hidden="true"></i></a></span>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
           
    <?php endforeach;?>
        <script type="text/javascript">
                function fix_size() {
        var images = $('.img-container img');
        images.each(setsize);

        function setsize() {
            var img = $(this),
                img_dom = img.get(0),
                container = img.parents('.img-container');
            if (img_dom.complete) {
                resize();
            } else img.one('load', resize);

            function resize() {
                if ((container.width() / container.height()) < (img_dom.width / img_dom.height)) {
                    img.width('100%');
                    img.height('auto');
                    return;
                }
                img.height('100%');
                img.width('auto');
            }
        }
    }
    $(window).on('resize', fix_size);
    fix_size();


        </script>