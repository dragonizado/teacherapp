<form action="" method="post">
    <select name="student" id="" required>
        <?php foreach ($students as $student) : ?>
            <option value="<?= $student->id; ?>"><?= $student->name; ?></option>
        <?php endforeach ?>
    </select>
    <input type="date" placeholder="Introduce una fecha" required min=<?php $hoy = date("Y-m-d"); echo $hoy; ?>>
</form>