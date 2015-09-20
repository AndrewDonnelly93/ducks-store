<div class="item-block column column4">
	<a href="<?= \App\Utilities\Options::URL ?>/product/?id=<?=$products[$i]['id']?>" class="item" title="<?=$products[$i]['title'];?>">
		<img src="<?=$products[$i]['photo']?>" alt="уточка">
	</a>
	<a href="<?= \App\Utilities\Options::URL ?>/cart/add/?item=<?=$products[$i]['id']?>" class="btn-basket">
        В Корзину
    </a>
</div>