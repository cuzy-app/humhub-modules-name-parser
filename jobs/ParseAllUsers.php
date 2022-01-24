<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\nameParser\jobs;


use humhub\modules\nameParser\components\NameParserComponent;
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
            $parsedFirstname = NameParserComponent::parse($profile->firstname);
            $parsedLastname = NameParserComponent::parse($profile->lastname);
            if ($parsedFirstname !== $profile->firstname || $parsedLastname !== $profile->lastname) {
                $profile->firstname = $parsedFirstname;
                $profile->lastname = $parsedLastname;
                $profile->save(false); // No validation in case, for example, a required profile filed is empty
            }
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
