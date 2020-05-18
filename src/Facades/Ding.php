<?php

namespace Aping\LaravelDingRobot\Facades;

/**
 * Class Ding
 *
 * @method static \Aping\PddingRobot\Responses\Response sendText()
 * @method static \Aping\PddingRobot\Responses\Response sendLink()
 * @method static \Aping\PddingRobot\Responses\Response sendMarkdown()
 * @method static \Aping\PddingRobot\Responses\Response sendSingleActionCard()
 * @method static \Aping\PddingRobot\Responses\Response sendMultiActionCard()
 * @method static \Aping\PddingRobot\Responses\Response sendFeedCard()
 * @package Illuminate\Support\Facades
 */
class Ding extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ding';
    }
}
