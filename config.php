<?php
/**
 * Name Parser
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

use humhub\modules\nameParser\Events;
use humhub\modules\user\models\Profile;

/** @noinspection MissedFieldInspection */
return [
    'id' => 'name-parser',
    'class' => humhub\modules\nameParser\Module::class,
    'namespace' => 'humhub\modules\nameParser',
    'events' => [
        [
            'class' => Profile::class,
            'event' => Profile::EVENT_BEFORE_INSERT,
            'callback' => [
                Events::class,
                'onModelProfileBeforeInsertOrUpdate'
            ]
        ],
        [
            'class' => Profile::class,
            'event' => Profile::EVENT_BEFORE_UPDATE,
            'callback' => [
                Events::class,
                'onModelProfileBeforeInsertOrUpdate'
            ]
        ],
    ],
];
?>