<?php
/**
 * @var string $_image
 * @var string $_name
 * @var float $_price
 * @var int $_id
 */
?>
<div class="col col-lg-2">
    <div class="card product-list-card text-center">
        <img src="<?php echo IMAGE_PATH . $_image; ?>" class="card-img-top" alt="<?php echo $_name ?>">
        <div class="card-body">
            <h5 class="card-title category-card-title">
                <?php echo $_name; ?>
            </h5>
            <p class="card-text">
                <?php echo $_price; ?> ₴
            </p>
            <a href="product.php?id=<?php echo $_id ?>" class="btn btn-primary">Детальніше</a>
        </div>
    </div>
</div>
