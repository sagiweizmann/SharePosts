<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Welcome to ' . CHtml::encode(Yii::app()->name),
)); ?>
<?php
if (Yii::app()->user->isGuest) : 
?>
    <div class="alert alert-block">
        <p>Please login to see the all posts !</p>
    </div>
<?php
else :
?>
    <?php
    foreach (array_reverse($posts) as $post) :
    ?>
        <div class="post">
            <div class="post__user">

                <strong class="post__username"><?php echo $post->title; ?></strong>
                <span class="post__date"><?php echo $post->created_at; ?></span>

                <div class="post__body">
                    <?php echo $post->body; ?>
                </div>
                <?php echo 'Posted By ' . '<span style="color:grey;">'. Users::getUserNameById($post->user_id); '</span>' ?>
            </div>
        </div>
    <?php
    endforeach;
    ?>
<?php endif; ?>

<?php $this->endWidget(); ?>