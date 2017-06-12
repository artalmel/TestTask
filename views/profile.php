<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once(ROOT . '/views/layouts/styles.php') ?>
</head>

<body>
<?php include_once(ROOT . '/views/layouts/menu.php') ?>

<div class="container">
    <h2> <?php echo $var['trans']['Profile'] ?></h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="media" id="media-profile">
                <div class="media-left" >
                    <a href="#">
                        <?php if ($var['user']['photo']): ?>
                            <img id="avatar" class="media-object" src="../media/<?php echo $var['user']['photo'] ?>"
                                 alt="noimage">
                        <?php else: ?>
                            <img id="avatar" class="media-object" src="../assets/imgs/noimg.jpg" alt="noimage">
                        <?php endif ?>

                    </a>
                </div>

            </div>


        </div>
        <div class="col-md-6">
            <div class="col-md-12">

            </div>
            <div class="col-md-12">
                <label class="col-md-3 control-label"><?php echo $var['trans']['First name'] ?>: </label>
                <label class="col-md-9 control-label"><?php echo $var['user']['first_name'] ?> </label>
            </div>
            <div class="col-md-12">
                <label class="col-md-3 control-label"><?php echo $var['trans']['Last name'] ?>: </label>
                <label class="col-md-9 control-label"><?php echo $var['user']['last_name'] ?> </label>
            </div>
            <div class="col-md-12">
                <label class="col-md-3 control-label"><?php echo $var['trans']['Gender'] ?>: </label>
                <label class="col-md-9 control-label"><?php echo $var['trans'][$gender] ?> </label>
            </div>
            <div class="col-md-12">
                <label class="col-md-3 control-label"><?php echo $var['trans']['Email'] ?>: </label>
                <label class="col-md-9 control-label"><?php echo $var['user']['email'] ?> </label>
            </div>
            <div class="col-md-12">
                <label class="col-md-3 control-label"><?php echo $var['trans']['Address'] ?>: </label>
                <label class="col-md-9 control-label"><?php echo $var['user']['address'] ?> </label>
            </div>
            <div class="col-md-12">
                <label class="col-md-3 control-label"><?php echo $var['trans']['City'] ?>: </label>
                <label class="col-md-9 control-label"><?php echo $var['user']['city'] ?> </label>
            </div>
        </div>
    </div>
</div>

<?php include_once(ROOT . '/views/layouts/scripts.php') ?>


</body>
</html>
