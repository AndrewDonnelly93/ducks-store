<aside class="column column3">
	<h2>Каталог</h2>
	<ul>
        <?php
        foreach($categories as $category){
            echo "<li><a class=adm-cat href='admin.php?view=category&id="
                .$category['id']."'>"
                .$category['title']."</a>"."
                <a class=edit-cat href=admin.php?view=edit_category&id=".$category['id']."></a></li>";
        }
        include_once "add-category.php";
        ?>
</ul>
</aside>
