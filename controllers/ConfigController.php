<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\nameParser\controllers;

use humhub\modules\admin\components\Controller;
use humhub\modules\admin\permissions\ManageModules;
use humhub\modules\nameParser\jobs\ParseAllUsers;
use Yii;


/**
 * ConfigController is the module form configuration
 * For administrators only
 */
class ConfigController extends Controller
{
    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [
            ['permission' => ManageModules::class]
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNormalizeAllUsers()
    {
        Yii::$app->queue->push(new ParseAllUsers());
        $this->view->success(Yii::t('NameParserModule.base', 'Users\' names will be normalized within a few minutes...'));
        return $this->redirect('index');
    }
}