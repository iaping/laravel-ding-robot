<?php

return [
    /**
     * default robot
     * 默认钉钉机器人
     */
    'default' => 'default',

    /**
     * robot config
     *  token 自定义机器人TOKEN
     *  secret 自定义机器人签名密钥（钉钉安全模式选择签名）
     */
    'robots' => [
        'default' => [
            'token' => 'e4c2827ce067c352',
            'secret' => 'SEC36953f43659',
        ],

        'other' => [
            'token' => 'xxxxx',
            'secret' => 'xx',
        ],
    ],
];
