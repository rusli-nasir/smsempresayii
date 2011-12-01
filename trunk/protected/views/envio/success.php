<?php
$user = Yii::app()->getUser();
foreach ($user->getFlashKeys() as $key):
    if ($user->hasFlash($key)):
        ?>
        <div class="flash-<?php echo $key; ?>">
        <?php echo $user->getFlash($key); ?>
        </div>
        <?php
    endif;
endforeach;
?>