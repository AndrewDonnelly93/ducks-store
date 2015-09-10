<aside class="column column3">
	<h2>Каталог</h2>
	<ul>
        <?php
        foreach($categories as $category){
            echo "<li><a href='index.php?view=category&id="
                .$category['id']."'>"
                .$category['title']."</a></li>";
        }
        ?>
	</ul>
</aside>
