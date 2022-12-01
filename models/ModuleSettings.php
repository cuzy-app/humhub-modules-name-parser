<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\nameParser\models;

use humhub\modules\nameParser\Module;
use Yii;
use yii\base\Model;


class ModuleSettings extends Model
{
    /**
     * @var boolean
     */
    public $parseFirstAndLastName = false;

    /**
     * @var boolean
     */
    public $parseUsername = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parseFirstAndLastName', 'parseUsername'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parseFirstAndLastName' => Yii::t('NameParserModule.base', 'Auto-normalize the users first and last name'),
            'parseUsername' => Yii::t('NameParserModule.base', 'Auto-reformat the username from the first and last name'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'parseFirstAndLastName' => Yii::t('NameParserModule.base', 'e.g. james smith_garcia => James Smith-Garcia'),
            'parseUsername' => Yii::t('NameParserModule.base', 'e.g. James Smith-Garcia => JamesSmithGarcia'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('name-parser');
        $settings = $module->settings;

        $this->parseFirstAndLastName = (bool)$settings->get('parseFirstAndLastName', $this->parseFirstAndLastName);
        $this->parseUsername = (bool)$settings->get('parseUsername', $this->parseUsername);

        parent::init();
    }


    /**
     * @return boolean success
     */
    public function save()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('name-parser');
        $settings = $module->settings;

        $settings->set('parseFirstAndLastName', $this->parseFirstAndLastName);
        $settings->set('parseUsername', $this->parseUsername);

        return true;
    }
}
