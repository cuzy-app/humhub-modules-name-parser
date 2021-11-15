<?php
/**
 * Name Parser
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\nameParser\jobs;


use humhub\modules\queue\ActiveJob;
use humhub\modules\user\models\Profile;
use yii\queue\RetryableJobInterface;


class ParseAllUsers extends ActiveJob implements RetryableJobInterface
{
    /**
     * @inhertidoc
     * @var int maximum 1 hour
     */
    private $maxExecutionTime = 60 * 60 * 1;

    /**
     * @inheritdoc
     */
    public function run()
    {
        foreach (Profile::find()->all() as $profile) {
            // An event will parse the first and last name
            $profile->save(false);
        }
    }

    /**
     * @inheritDoc
     */
    public function getTtr()
    {
        return $this->maxExecutionTime;
    }

    /**
     * @inheritDoc for RetryableJobInterface
     */
    public function canRetry($attempt, $error)
    {
        return true;
    }

}
