<?php
/**
 * Name Parser
 * @link https://github.com/cuzy-app/humhub-modules-name-parser
 * @license https://github.com/cuzy-app/humhub-modules-name-parser/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\nameParser\components;

use yii\base\Component;
use yii\helpers\StringHelper;


class NameParserComponent extends Component
{
    /**
     * @param string|null $name
     * @return string
     */
    public static function parse(?string $name)
    {
        if (!$name) {
            return $name;
        }
        $newName = mb_strtolower(
            trim(
                preg_replace(
                    "/\([^)]+\)/", // remove parenthesis
                    "",
                    preg_replace(
                        "/\[[^)]+\]/", // remove brackets
                        "",
                        str_ireplace(
                            ['_', '?', '*', '=', '+', ':', '!', '\''],
                            ['-', '', '', '', '', '', '', '‘'],
                            $name
                        )
                    )
                )
            )
        );

        $word_splitters = [' ', '-', "O'", "L'", "D'", 'St.', 'Mc'];
        $lowercase_exceptions = ['the', 'van', 'den', 'von', 'und', 'der', 'de', 'da', 'of', 'and', "l'", "d'"];
        $uppercase_exceptions = ['III', 'IV', 'VI', 'VII', 'VIII', 'IX'];

        foreach ($word_splitters as $delimiter) {
            $words = explode($delimiter, $newName);
            $newWords = [];
            foreach ($words as $word) {
                $word = trim($word);
                if (in_array(strtoupper($word), $uppercase_exceptions)) {
                    $word = strtoupper($word);
                } elseif (!in_array($word, $lowercase_exceptions)) {
                    $word = StringHelper::mb_ucfirst($word);
                }

                $newWords[] = $word;
            }

            if (in_array(strtolower($delimiter), $lowercase_exceptions)) {
                $delimiter = strtolower($delimiter);
            }

            $newName = implode($delimiter, $newWords);
        }

        return $newName;
    }
}