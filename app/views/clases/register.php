<form action="<?= $this->createUrl('class/register') ?>" method="post">
    <input type="text" name="description" placeholder="Descipcion de la clase" required>
    <select name="student" id="" required>
        <?php foreach ($students as $student) : ?>
            <option value="<?= $student->id; ?>"><?= $student->name; ?></option>
        <?php endforeach ?>
    </select>
    <button name="form_btn_register">Registrar</button>
</form>