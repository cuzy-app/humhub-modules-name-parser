<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

use humhub\modules\nameParser\Module;
use humhub\modules\ui\view\components\View;
use humhub\widgets\Button;


/**
 * @var $this View
 */

/** @var Module $module */
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
            <br>
            <?= Button::primary(Yii::t('NameParserModule.config', 'Normalize the names of all existing users'))->link(['/name-parser/config/normalize-all-users']) ?>
        </div>

    </div>
</div>