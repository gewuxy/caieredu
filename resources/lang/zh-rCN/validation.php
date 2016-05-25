<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute无效',
    'active_url'           => ':attribute无效',
    'after'                => ':attribute必须是 :date 之后的一个日期',
    'alpha'                => ':attribute必须全部由字母构成',
    'alpha_dash'           => ':attribute必须全部由字母、数字、中划线或下划线字符构成',
    'alpha_num'            => ':attribute必须全部由字母和数字构成',
    'array'                => ':attribute必须是个数组',
    'before'               => ':attribute必须是:date之前的一个日期',
    'between'              => [
        'numeric' => ':attribute必须在:min和:max之间',
        'file'    => ':attribute必须在:min和:max KB之间',
        'string'  => ':attribute 必须在 :min和:max个字符之间.',
        'array'   => ':attribute必须:min和:max之间',
    ],
    'boolean'              => ':attribute必须是true或者false',
    'confirmed'            => ':attribute二次确认不匹配',
    'date'                 => ':attribute必须是一个合法的日期',
    'date_format'          => ':attribute与给定的:format不符合',
    'different'            => ':attribute必须不同于:other',
    'digits'               => ':attribute必须是:digits位',
    'digits_between'       => ':attribute必须在:min和:max位之间',
    'email'                => ':attribute必须是一个合法的电子邮件地址',
    'exists'               => '选定的:attribute无效',
    'filled'               => ':attribute是必填的',
    'image'                => ':attribute 必须是一个图片 (jpeg, png, bmp 或者 gif)',
    'in'                   => '选定的 :attribute是无效的',
    'integer'              => ':attribute必须是整数',
    'ip'                   => ':attribute必须是有效的IP地址',
    'json'                 => ':attribute必须是合法的JSON字符串',
    'max'                  => [
        'numeric' => ':attribute的最大长度为:max位',
        'file'    => ':attribute最大为:max KB',
        'string'  => ':attribute最大长度为:max个字符',
        'array'   => ':attribute最大个数为:max个',
    ],
    'mimes'                => ':attribute 文件类型必须是: :values',
    'min'                  => [
        'numeric' => ':attribute的最小长度为:min位',
        'file'    => ':attribute最小为:min KB',
        'string'  => ':attribute最小长度为:min个字符',
        'array'   => ':attribute最小个数为:min个',
    ],
    'not_in'               => '选定的:attribute无效',
    'numeric'              => ':attribute必须是数字',
    'regex'                => ':attribute格式无效',
    'required'             => ':attribute是必须的',
    'required_if'          => ':attribute字段是必须的当 :other是:value.',
    'required_unless'      => ':attribute字段是必须的除非:other在:values之间',
    'required_with'        => ':attribute字段是必须的当:values存在',
    'required_with_all'    => ':attribute字段是必须的当:values存在',
    'required_without'     => ':attribute字段是必须的当:values不存在',
    'required_without_all' => ':attribute是必须的当:values没有一个是存在的',
    'same'                 => ':attribute 与 :other 不一致',
    'size'                 => [
        'numeric' => ':attribute必须是:size位的',
        'file'    => ':attribute必须是:size KB.',
        'string'  => ':attribute必须是:size个字符',
        'array'   => ':attribute 必须包含:size项',
    ],
    'string'               => ':attribute必须是字符串',
    'timezone'             => ':attribute必须是有效的时区',
    'unique'               => ':attribute 已经存在',
    'url'                  => ':attribute 格式错误',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'email' => [
            'required' => '请填写电子邮件地址',
			'email'    => '邮件格式错误',
			'max'      => '邮件地址不超过255个字符',
			'unique'   => '邮件地址已经注册，请直接登录',
        ],
		'phone' => [
            'required' => '请填写手机号码',
			'phone'    => '手机号码格式错误',
			'unique'   => '手机号码已经注册，请直接登录',
        ],
		'password' => [
            'required'    => '请输入密码',
			'confirmed'   => '两次密码输入不一致',
			'min'         => '密码至少6位',
        ],
		'verifyCode' =>[
			'required'   => '请输入验证码',
			'verify_code' => '验证码错误',
		],
		'orgName' => [
			'required' => '请填写机构名称',
		],
		'orgAddress.required' => '请选择机构地址',
		'orgAddressDetail.required' => '请填写机构详细地址',
		'contacts.required' => '请填写联系人',
		'contactsNO.required' => '请填写联系电话'
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
