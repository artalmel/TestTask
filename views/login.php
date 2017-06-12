<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once(ROOT . '/views/layouts/styles.php') ?>
</head>

<body>
<?php include_once(ROOT . '/views/layouts/menu.php') ?>

<div class="container">

    <form method="post" action="#" class="well form-horizontal form-signin">

        <div class="form-group">
            <div class="col-sm-8">
                <?php if ($errors): ?>
                    <?php foreach ($errors as $error): ?>
                        <p class="error_label"><?php echo $var['trans'][$error] ?></p>
                    <?php endforeach; ?>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-4 control-label"><?php echo $var['trans']['Email'] ?></label>
            <div class="col-sm-8">
                <input type="email" name="email" class="form-control" id="email"
                       placeholder="<?php echo $var['trans']['Email'] ?>" value="<?php echo $email ?>" required>
            </div>
            <div class="help-block with-errors col-sm-offset-4 col-sm-8"></div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label"><?php echo $var['trans']['Password'] ?></label>
            <div class="col-sm-8">
                <input type="password" name="password" class="form-control" id="inputPassword"
                       placeholder="<?php echo $var['trans']['Password'] ?>" value="<?php echo $password ?>" required>
            </div>
            <div class="help-block with-errors col-sm-offset-4 col-sm-8"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button name="submit" id="btnSubmit" type="submit"
                        class="btn btn-default" disabled><?php echo $var['trans']['Sign in'] ?></button>
            </div>
        </div>
        <ul class="errorMessages"></ul>
    </form>
    <div class="col-md-12">
        <div class="page-info">
            <p><?php echo $var['trans']['Attention'] ?>!</p>
            <ol>
                <li>* <?php echo $var['trans']['The required fields are marked with a sign. Without these fields, registration is not possible.'] ?></li>
                <li><?php echo $var['trans']['The e-mail field must be filled in accordance with the standard.'] ?></li>
                <li><?php echo $var['trans']['Fields with password data must contain at least 8 characters.'] ?></li>
                <li><?php echo $var['trans']['The uploaded photo must be gif, jpg, png formats, up to 1mb in size.'] ?></li>
            </ol>
        </div>
    </div>
</div>

<!-- scripts/ -->
<?php include_once(ROOT . '/views/layouts/scripts.php') ?>
<!-- /.scripts -->

</body>
</html>