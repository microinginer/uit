<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<p>&nbsp;</p>
<div class="error-page">
    <h2 class="headline text-danger"><?= $exception->statusCode?></h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Оопс! Что-то пошло не так.</h3>
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="clearfix"></div>
    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
</div>
