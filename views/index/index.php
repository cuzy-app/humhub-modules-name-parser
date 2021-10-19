<?php
/**
 * Name Parser
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

use humhub\libs\Html;
use humhub\modules\nameParser\assets\Assets;
use humhub\modules\ui\view\helpers\ThemeHelper;
use yii\helpers\Url;
use humhub\widgets\FooterMenu;

/**
 * @var $this \humhub\modules\ui\view\components\View
 */

Assets::register($this);
?>

<div class="container<?= ThemeHelper::isFluid() ? '-fluid' : '' ?> name-parser-index">
    <div class="row">
        <div class="col-md-8 layout-content-container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        Title
                    </strong>
                </div>
                <div class="panel-body">
                    <p>Text</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 layout-sidebar-container">
        </div>
    </div>
</div>

<?php // Show FooterMenu if page is global (not in space or user container, as FooterMenu is already shown) ?>
<?= FooterMenu::widget(['location' => FooterMenu::LOCATION_FULL_PAGE]); ?>