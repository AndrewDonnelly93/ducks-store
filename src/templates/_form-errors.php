<?php
echo "<div class=form-errors><p>При заполнении формы возникли следующие ошибки:</p>";
foreach ($errors as $message) {
    echo "<p>$message</p>";
}
echo "</div>";