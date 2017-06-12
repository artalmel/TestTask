<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once(ROOT . '/views/layouts/styles.php') ?>
</head>

<body>
<?php include_once(ROOT . '/views/layouts/menu.php') ?>
<!-- container/ -->
<div class="container">
    <h2><?php echo $var['trans']['Register new user'] ?></h2>
    <hr>
    <div class="row well">
        <!-- start registration form //-->
        <form enctype="multipart/form-data" action="#" method="post" class="form-horizontal form-register" role="form">
            <div class="col-md-6">

                <!-- first name -->
                <div class="form-group">
                    <label for="first_name" class="col-sm-4 control-label"><?php echo $var['trans']['First Name'] ?><span>*</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="first_name" class="form-control"
                               id="first_name"
                               placeholder="<?php echo $var['trans']['First Name'] ?>" value="<?php echo $first_name ?>" required>
                    </div>
                    <div class="help-block with-errors col-sm-offset-4 col-sm-8"></div>
                </div>

                <!-- last name -->
                <div class="form-group">
                    <label for="last_name" class="col-sm-4 control-label"><?php echo $var['trans']['Last Name'] ?><span>*</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="last_name" class="form-control" id="last_name"
                               placeholder="<?php echo $var['trans']['Last Name'] ?>" value="<?php echo $last_name ?>" required>
                    </div>
                    <div class="help-block with-errors col-sm-offset-4 col-sm-8"></div>
                </div>

                <!-- gender -->
                <div class="form-group">
                    <label for="radio" class="col-sm-4 control-label"><?php echo $var['trans']['Gender'] ?></label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="male" value="1"> <?php echo $var['trans']['Male'] ?>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="female" value=""> <?php echo $var['trans']['Female'] ?>
                        </label>
                    </div>
                </div>

                <!-- email -->
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label"><?php echo $var['trans']['Email'] ?><span>*</span></label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="<?php echo $var['trans']['Email'] ?>" value="<?php echo $email ?>" required>
                    </div>
                    <div class="help-block with-errors col-sm-offset-4 col-sm-8"></div>
                </div>

                <!-- password -->
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-4 control-label"><?php echo $var['trans']['Password'] ?><span>*</span></label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="inputPassword"
                               placeholder="<?php echo $var['trans']['Password'] ?>" value="<?php echo $password ?>" required>
                    </div>
                    <div class="help-block with-errors col-sm-offset-4 col-sm-8"></div>
                </div>

                <!-- password confirm -->
                <div class="form-group">
                    <label for="inputPasswordConfirm"
                           class="col-sm-4 control-label"><?php echo $var['trans']['Password Confirm'] ?><span>*</span></label>
                    <div class="col-sm-8">
                        <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm"
                               placeholder="<?php echo $var['trans']['Password Confirm'] ?>" value="<?php echo $password_confirm ?>" required>
                    </div>
                    <div class="help-block with-errors col-sm-offset-4 col-sm-8"></div>
                </div>

                <!-- phone -->
                <div class="form-group">
                    <label for="phone" class="col-sm-4 control-label"><?php echo $var['trans']['Phone'] ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" class="form-control" id="phone"
                               placeholder="<?php echo $var['trans']['Phone'] ?>" value="<?php echo $phone ?>">
                    </div>
                </div>

                <!-- address -->
                <div class="form-group">
                    <label for="address" class="col-sm-4 control-label"><?php echo $var['trans']['Address'] ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="address" class="form-control" id="address"
                               placeholder="<?php echo $var['trans']['Address'] ?>" value="<?php echo $address ?>">
                    </div>
                </div>

                <!-- city -->
                <div class="form-group">
                    <label for="city" class="col-sm-4 control-label"><?php echo $var['trans']['City'] ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="city" class="form-control" id="city"
                               placeholder="<?php echo $var['trans']['City'] ?>" value="<?php echo $city ?>">
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <!-- user photo -->
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label"><?php echo $var['trans']['Photo'] ?></label>
                    <div class="col-sm-9">
                        <div class="media" id="media-avatar">
                            <div class="media-left">
                                <a href="#">
                                    <?php if ($photo): ?>
                                        <img id="avatar" class="media-object" src="../media/<?php echo $photo ?>" alt="noimage">
                                    <?php else: ?>
                                        <img id="avatar" class="media-object" src="../assets/imgs/noimg.jpg" alt="noimage">
                                    <?php endif ?>

                                </a>
                            </div>
                        </div>
                        <input type="file" name="photo" onchange="readURL(this)">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <?php if ($errors): ?>
                            <hr>
                            <?php foreach ($errors as $error): ?>
                                <p class="error_label"><?php echo $var['trans'][$error] ?></p>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- submit button -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <button id="btnSubmit" type="submit" name="rsubmit"
                                class="btn btn-default" disabled><?php echo $var['trans']['Register'] ?></button>
                    </div>
                </div>
            </div>
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
        </form>
        <!-- /.registration -->
    </div>

</div>

<!-- /.container -->

<!-- scripts/ -->
<?php include_once(ROOT . '/views/layouts/scripts.php') ?>
<!-- /.scripts -->

</body>
</html>
