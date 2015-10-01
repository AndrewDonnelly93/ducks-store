<aside class="column column3">
	<h2>Каталог</h2>
	<ul class="categories">
        <?php
        foreach ($categories as $_category) {
            echo "<li><a href='"
                . \App\Utilities\Options::URL
                . "/category/?id="
                . $_category['id'] . "'>"
                . $_category['title'] . "</a></li>";
        }
        ?>
	</ul>
</aside>
