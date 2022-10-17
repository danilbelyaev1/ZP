<?
return [
	'completeeating-ajax' => [
		'path' => '/completeeating/',
		'methods' => ['POST'],
		'handler' => \Local\Core\Ajax\Handler\CCompleteEating::class . '::set',
	],
	'editProfile-ajax' => [
		'path' => '/editProfile/',
		'methods' => ['POST'],
		'handler' => \Local\Core\Ajax\Handler\CEditProfile::class . '::editUser',
	],
    /**
     * @see \Local\Core\Ajax\Handler\CPlayAjax::get
     */
    'play-ajax' => [
        'path' => '/play/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CPlayAjax::class . '::set',
    ],
    'favorites-ajax' => [
        'path' => '/favorites/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CFavorites::class . '::set',
    ],
    'fileUpload-ajax' => [
        'path' => '/fileUpload/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CFileUpload::class . '::set',
    ],
    'fileDelete-ajax' => [
        'path' => '/fileDelete/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CfileDelete::class . '::set',
    ],
    'getTags-ajax' => [
        'path' => '/getTags/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CTags::class . '::get',
    ],
    'addRecipe-ajax' => [
        'path' => '/addRecipe/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CAddRecipe::class . '::set',
    ],
    'editRecipe-ajax' => [
        'path' => '/editRecipe/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CEditRecipe::class . '::get',
    ],
    'deleteRecipe-ajax' => [
        'path' => '/deleteRecipe/',
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\CDeleteRecipe::class . '::set',
    ],

//	'sendAuthCodeEmail-ajax' => [
//		'path' => '/sendAuthCodeEmail/',
//		'methods' => ['POST'],
//		'handler' => \Local\Core\Ajax\Handler\CAuth::class . '::sendAuthCode',
//	],
    //    '3d-ajax' => [
//        'path' => '/3d/',
//        'methods' => ['POST'],
//        'auth' => true,
//        'authGroup' => 9,
//        'handler' => \Local\Core\Ajax\Handler\C3DAjax::class . '::get',
//    ],

    /**
     * @see \Local\Core\Ajax\Handler\Example::example
     */
    'example-ajax' => [
        'path' => '/example/{userId}/{selectId}/',
        'args' => [
            'userId' => '([0-9]+)',
            'selectId' => '([a-zA-Z0-9]+)',
        ],
        'methods' => ['POST'],
        'handler' => \Local\Core\Ajax\Handler\Example::class . '::example',
    ]
];
