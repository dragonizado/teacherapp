<form action="<?= $this->createUrl('students/register') ?>" method="post">
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="text" name="cc" placeholder="Documento de identidad" required>
    <input type="text" name="phone" placeholder="Telefono" required>
    <button name="form_btn_register">Registrar</button>
</form>