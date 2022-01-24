<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\nameParser;


use humhub\modules\nameParser\components\NameParserComponent;
use humhub\modules\user\models\Profile;
use yii\base\ModelEvent;

class Events
{
    /**
     * @param $event ModelEvent
     */
    public static function onModelProfileBeforeInsertOrUpdate($event)
    {
        /** @var Profile $profile */
        $profile = $event->sender;

        $profile->firstname = NameParserComponent::parse($profile->firstname);
        $profile->lastname = NameParserComponent::parse($profile->lastname);
    }
}