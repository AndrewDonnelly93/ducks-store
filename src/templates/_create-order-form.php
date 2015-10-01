<form class="default-form" action="" method="post">
    <p>Поля, отмеченные знаком <span class="required">*</span>, обязательны для заполнения</p>
    <label for="name">ФИО:</label>
    <div class="required-field">
        <input style="width: 50%" type="text" name="name">
    </div>
<!--    required-->
    <label for="address">Адрес:</label>
    <div class="required-field">
        <input style="width: 50%" type="text" name="address">
    </div>
    <label for="email">E-mail:</label>
    <div class="required-field">
        <input style="width: 50%" type="email" name="email" required>
    </div>
    <label for="addition">Примечание:</label>
    <textarea style="width: 50%" name="addition" rows="3"></textarea><br>
    <input type="submit" value="Отправить">
</form>