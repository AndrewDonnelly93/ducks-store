<div class=" row clearfix item-heading">
    <!-- название товара -->
    <h1 class="item-name column column6"><?=$products[$i][1];?></h1>
    <!-- цена -->
    <p class="price column column6"><?=$products[$i][3];?> P</p>
</div>
<div class="row clearfix">
    <div class="column column6">
        <!-- галерея картинок -->
        <div class="item-gallery">
            <img src="<?=$products[$i][4];?>" alt="уточка">
            <div class="small-images">
                <img src="img/item.jpeg" alt="уточка">
                <img src="img/item.jpeg" alt="уточка">
                <img src="img/item.jpeg" alt="уточка">
            </div>
        </div>
    </div>
    <div class="column column6">
        <!-- описание -->
        <p class="item-description">
            <?=$products[$i][2];?>
        </p>
        <!-- цена -->
        <p class="price"><?=$products[$i][3];?> P</p>
        <div class="order-btns">
            <a href="" class="btn-basket">В Корзину</a>
            <a href="" class="btn-click">Купить в 1 клик</a>
            <a href="index.php?view=edit-item&id=<?=$i?>" class="btn redact" style="margin-top: 10px">Редактировать</a>
        </div>
    </div>
</div>