<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
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