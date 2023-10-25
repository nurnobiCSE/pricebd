<div id="content">
    <div id="products">
        <div id="load_area" class="row">

            <?php
    			$result = get_result('shop_products','product_id,product_name,product_slug,product_price,product_photo',"status ='1' $cond ",$sort,$limit);
    			foreach ($result as $r) {
			?>

            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="product">
                    <a href="<?php echo site_url('product',$r['product_slug']); ?>"
                        title="<?php echo $r['product_name']; ?>">

                        <img class="img-responsive"
                            src="<?php echo site_url(); ?>/images/products/<?php echo chop($r['product_photo']); ?>"
                            alt="<?php echo $r['product_name']; ?>" width="200" height="200">

                        <div class="pname"><?php echo $r['product_name']; ?></div>
                    </a>
                    <div class="price">Tk <?php echo number_format($r['product_price'],2); ?></div>

                    <div class="infoz">
                        <a href="<?php echo site_url('product',$r['product_slug']); ?>">View Details</a>
                    </div>


                </div>
            </div>

            <?php } ?>
        </div>

    </div>
</div>
<div class="clearfix"></div>