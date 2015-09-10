<div class="item-block column column4">
    <a href="admin.php?view=single-item_admin&id=<?=$products[$i]['id']?>" class="item" title="<?=$products[$i]['title'];?>">
        <img src="<?=$products[$i]['photo']?>" alt="уточка">
    </a>
    <a href="admin.php?view=edit&id=<?=$products[$i]['id']?>" class="edit adm-btn">Изменить</a><!--
    --><a href="admin.php?view=delete&id=<?=$products[$i]['id']?>" class="delete adm-btn">Удалить</a>
</div>