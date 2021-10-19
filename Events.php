<?php
/**
 * Name Parser
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
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