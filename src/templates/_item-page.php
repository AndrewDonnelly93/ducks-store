<div class=" row clearfix item-heading">
    <!-- название товара -->
    <h1 class="item-name column column6"><?=$product['title'];?></h1>
    <!-- цена -->
    <p class="price column column6"><?=$product['price'];?> P</p>
</div>
<div class="row clearfix">
    <div class="column column6">
        <!-- галерея картинок -->
        <div class="item-gallery">
           <img src="<?=$product['photo'];?>" alt="уточка">
            <div class="small-images">
                <img src="<?= \App\Utilities\Options::ASSETS_PATH ?>img/item.jpeg" alt="уточка">
                <img src="<?= \App\Utilities\Options::ASSETS_PATH ?>img/item.jpeg" alt="уточка">
                <img src="<?= \App\Utilities\Options::ASSETS_PATH ?>img/item.jpeg" alt="уточка">
            </div>
        </div>
    </div>
    <div class="column column6">
        <!-- описание -->
        <p class="item-description">
            <?=$product['description'];?>
        </p>
        <!-- цена -->
        <p class="price"><?=$product['price'];?> P</p>
        <form action="<?= \App\Utilities\Options::URL ?>/cart/add/?item=<?=$product['id']?>" method="post" class="order-btns">
            <input type="submit" class="btn-basket" value="В Корзину">
            <label for="amount" class="amount-label">Количество:</label>
            <div class="decrement"><span>-</span></div><!--
            --><input type="text" value="1" min="1" name="amount" class="amount"><!--
             --><div class="increment"><span>+</span></div>
        </form>
    </div>
</div>