<?php
/**
 * Name Parser
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\nameParser;

use Yii;
use yii\helpers\Url;
use humhub\modules\space\models\Space;

class Module extends \humhub\components\Module
{
    
    /**
     * @var string defines the icon
     */
    public $icon = 'square-o';

    /**
     * @var string defines path for resources, including the screenshots path for the marketplace
     */
    public $resourcesPath = 'resources';


    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to([
            '/name-parser/config'
        ]);
    }


    public function getName()
    {
        return Yii::t('NameParserModule.config', 'Name Parser');
    }

    public function getDescription()
    {
        return Yii::t('NameParserModule.config', 'Normalize the format of users\' first and last name');
    }
}
