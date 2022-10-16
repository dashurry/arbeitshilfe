<?php 

return [
    'accepted' => '必须接受：属性。',
    'active_url' => '：属性不是有效的URL。',
    'after' => '：属性必须是日期之后的日期。',
    'after_or_equal' => '：属性必须是日期之后或等于：date。',
    'alpha' => '：属性可能只包含字母。',
    'alpha_dash' => '：属性可能只包含字母，数字，短划线和下划线。',
    'alpha_num' => '：属性可能只包含字母和数字。',
    'array' => '：属性必须是数组。',
    'before' => '：属性必须是日期之前：date。',
    'before_or_equal' => '：属性必须是日期之前或等于：日期。',
    'between' => [
        'numeric' => '：属性必须介于：min和：max之间。',
        'file' => '：属性必须介于：min和：max kilobytes之间。',
        'string' => '：属性必须介于：min和：max characters之间。',
        'array' => '：属性必须介于：min和：max items之间。',
    ],
    'boolean' => '：attribute字段必须为true或false。',
    'confirmed' => '：属性确认不匹配。',
    'date' => '：属性不是有效日期。',
    'date_equals' => '：属性必须是等于：date的日期。',
    'date_format' => '：属性与格式：格式不匹配。',
    'different' => '：属性和：其他必须不同。',
    'digits' => '：属性必须是：位数。',
    'digits_between' => '：属性必须介于：min和：max digits之间。',
    'dimensions' => '：属性具有无效的图像尺寸。',
    'distinct' => '：属性字段具有重复值。',
    'email' => '：属性必须是有效的电子邮件地址。',
    'exists' => 'selected：属性无效。',
    'file' => '：属性必须是文件。',
    'filled' => '：属性字段必须具有值。',
    'gt' => [
        'numeric' => '：属性必须大于：value。',
        'file' => '：属性必须大于：value kilobytes。',
        'string' => '：属性必须大于：值字符。',
        'array' => '：属性必须包含多个：值项。',
    ],
    'gte' => [
        'numeric' => '：属性必须大于或等于：value。',
        'file' => '：属性必须大于或等于：value千字节。',
        'string' => '：属性必须大于或等于：值字符。',
        'array' => '：属性必须具有：值项或更多。',
    ],
    'image' => '：属性必须是图像。',
    'in' => 'selected：属性无效。',
    'in_array' => '：属性字段不存在于：other中。',
    'integer' => '：属性必须是整数。',
    'ip' => '：属性必须是有效的IP地址。',
    'ipv4' => '：属性必须是有效的IPv4地址。',
    'ipv6' => '：属性必须是有效的IPv6地址。',
    'json' => '：属性必须是有效的JSON字符串。',
    'lt' => [
        'numeric' => '：属性必须小于：value。',
        'file' => '：属性必须小于：value kilobytes。',
        'string' => '：属性必须小于：值字符。',
        'array' => '：属性必须小于：value项。',
    ],
    'lte' => [
        'numeric' => '：属性必须小于或等于：value。',
        'file' => '：属性必须小于或等于：value kilobytes。',
        'string' => '：属性必须小于或等于：值字符。',
        'array' => '：属性不得超过：value items。',
    ],
    'max' => [
        'numeric' => '：属性可能不大于：max。',
        'file' => '：属性不得大于：max kilobytes。',
        'string' => '：属性不能大于：最大字符数。',
        'array' => '：属性可能不超过：max items。',
    ],
    'mimes' => '：属性必须是类型:: files的文件。',
    'mimetypes' => '：属性必须是类型:: files的文件。',
    'min' => [
        'numeric' => '：属性必须至少为：min。',
        'file' => '：属性必须至少为：min千字节。',
        'string' => '：属性必须至少为：min characters。',
        'array' => '：属性必须至少包含：min项。',
    ],
    'not_in' => 'selected：属性无效。',
    'not_regex' => '：属性格式无效。',
    'numeric' => '：属性必须是数字。',
    'present' => '：属性字段必须存在。',
    'regex' => '：属性格式无效。',
    'required' => '：属性字段是必需的。',
    'required_if' => '在以下情况下需要：attribute字段：other是：value。',
    'required_unless' => '：属性字段是必需的，除非：other在：values中。',
    'required_with' => '在：值存在时，：attribute字段是必需的。',
    'required_with_all' => '在：值存在时，：attribute字段是必需的。',
    'required_without' => '在：values不存在时，：attribute属性字段是必需的。',
    'required_without_all' => '当没有：values存在时，：attribute字段是必需的。',
    'same' => '：属性和：其他必须匹配。',
    'size' => [
        'numeric' => '：属性必须是：size。',
        'file' => '：属性必须为：size kilobytes。',
        'string' => '：属性必须是：大小字符。',
        'array' => '：属性必须包含：大小项。',
    ],
    'starts_with' => '：属性必须以下列之一::值开头',
    'string' => '：属性必须是字符串。',
    'timezone' => '：属性必须是有效区域。',
    'unique' => '：属性已被采用。',
    'uploaded' => '：属性无法上传。',
    'url' => '：属性格式无效。',
    'uuid' => '：属性必须是有效的UUID。',
    'custom' => [
        'package_title' => [
            'required' => '包标题是必需的',
        ],
        'package_subtitle' => [
            'required' => '包子标题是必需的',
        ],
        'package_price' => [
            'required' => '套餐价格是必需的',
        ],
        'roles' => [
            'required' => '请选择要分配包的角色',
        ],
        'review_option_title' => [
            'required' => '需要查看选项标题',
        ],
        'desc' => [
            'required' => '描述字段是必需的',
        ],
        'projects' => [
            'required' => '请选择项目',
        ],
    ],
    'attributes' => [
    ],
];