<?php
/**
 * Name Parser
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

use humhub\widgets\Button;


/**
 * @var $this \humhub\modules\ui\view\components\View
 */

/** @var \humhub\modules\nameParser\Module $module */
$module = Yii::$app->getModule('name-parser');
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <strong><?= $module->getName() ?></strong>
    </div>

    <div class="panel-body">

        <div class="help-block">
            <?= $module->getDescription() ?>
        </div>

        <br>

        <div class="alert alert-info">
            <p><?= Yii::t('NameParserModule.config', 'For each new user and each time the profile is updated, the first name and last name will be normalized.') ?></p>
        </div>

        <div>
            <?= Button::primary(Yii::t('NameParserModule.config', 'Normalize the names of all existing users'))->link('normalize-all-users') ?>
        </div>

    </div>
</div>