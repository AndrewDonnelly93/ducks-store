<?php
use \Respect\Validation\Validator as v;
$category = \App\DB\Categories::get($products[$i]['category_id'],$connection);
?>
<table class="table-products">
<tbody>
<tr>
    <td><?=$products[$i]['id']?></td>
    <td><?=$products[$i]['title']?></td>
    <td><?php
            if (v::arr()->notEmpty()->validate($category)){
                echo $category['title'];
            } else {
                echo "Не указана";
            }
        ?></td>
    <td><a href="<?= \App\Utilities\Options::URL ?>/edit/?id=<?=$products[$i]['id']?>" class='edit adm-btn'>Изменить</a></td>
    <td>
        <a href="<?= \App\Utilities\Options::URL ?>/delete/?id=<?=$products[$i]['id']?>" class='delete adm-btn'>Удалить</a>
    </td>
</tr>
</tbody>
</table>