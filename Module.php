<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\nameParser;

use Yii;
use yii\helpers\Url;

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
        return Yii::t('NameParserModule.config', 'Normalize the format of users\' first and last name.');
    }
}
