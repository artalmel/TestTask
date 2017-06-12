<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/<?php echo $var['lang'] ?>">Task for work</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <?php if ($var['is_auth']): ?>
                    <li><a href="/logout/<?php echo $var['lang'] ?>"><?php echo $var['trans']['Logout'] ?></a></li>
                    <li><a href="/profile/<?php echo $var['lang'] ?>"><?php echo $var['user']['first_name'] ?> <?php echo $var['user']['last_name'] ?></a></li>
                <?php else: ?>
                    <li><a href="/login/<?php echo $var['lang'] ?>"><?php echo $var['trans']['Sign in'] ?></a></li>
                    <li><a href="/register/<?php echo $var['lang'] ?>"><?php echo $var['trans']['Register'] ?></a></li>
                <?php endif; ?>
                <li><a href="<?php echo $var['url'] ?>/ru">RU </a></li>
                <li><a href="<?php echo $var['url'] ?>/en">EN</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>