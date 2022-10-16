<?php 

return [
    'accepted' => '：属性は受け入れなければなりません。',
    'active_url' => '：属性は有効なURLではありません。',
    'after' => '：属性は：dateの後の日付でなければなりません。',
    'after_or_equal' => '：属性は：date以降の日付でなければなりません。',
    'alpha' => '：属性には文字だけを含めることができます。',
    'alpha_dash' => '：属性には、文字、数字、ダッシュ、および下線のみを含めることができます。',
    'alpha_num' => '：属性には、文字と数字だけを含めることができます。',
    'array' => '：属性は配列でなければなりません。',
    'before' => '：属性は：dateより前の日付でなければなりません。',
    'before_or_equal' => '：属性は：date以前の日付でなければなりません。',
    'between' => [
        'numeric' => '：属性は：minと：maxの間になければなりません。',
        'file' => '：属性は：minから：maxキロバイトまでの範囲でなければなりません。',
        'string' => '：属性は、：minから：maxまでの文字数でなければなりません。',
        'array' => '：属性は：minから：maxまでの間の項目数でなければなりません。',
    ],
    'boolean' => '：attributeフィールドはtrueまたはfalseでなければなりません。',
    'confirmed' => '：属性の確認が一致しません。',
    'date' => '：属性は有効な日付ではありません。',
    'date_equals' => '：属性は：dateと等しい日付でなければなりません。',
    'date_format' => '：属性がフォーマット：formatと一致しません。',
    'different' => '：属性と：otherは異なっていなければなりません。',
    'digits' => '：属性は：digits digitsでなければなりません。',
    'digits_between' => '：属性は、：minから：maxまでの数字でなければなりません。',
    'dimensions' => '：属性に無効な画像サイズがあります。',
    'distinct' => '：attributeフィールドに重複した値があります。',
    'email' => '：属性は有効なEメールアドレスでなければなりません。',
    'exists' => 'selected：属性が無効です。',
    'file' => '：属性はファイルでなければなりません。',
    'filled' => '：attributeフィールドは値を持たなければなりません。',
    'gt' => [
        'numeric' => '：属性は：valueより大きくなければなりません。',
        'file' => '：属性は：valueキロバイトより大きくなければなりません。',
        'string' => '：属性は：value文字より大きくなければなりません。',
        'array' => '：属性には、：value以上の項目がなければなりません。',
    ],
    'gte' => [
        'numeric' => '：属性は：value以上でなければなりません。',
        'file' => '：属性は、valueキロバイト以上でなければなりません。',
        'string' => '：属性は：value文字以上でなければなりません。',
        'array' => '：属性は：value以上の項目を持たなければなりません。',
    ],
    'image' => '：属性は画像でなければなりません。',
    'in' => 'selected：属性が無効です。',
    'in_array' => '：attributeフィールドは：otherには存在しません。',
    'integer' => '：属性は整数でなければなりません。',
    'ip' => '：属性は有効なIPアドレスでなければなりません。',
    'ipv4' => '：属性は有効なIPv4アドレスでなければなりません。',
    'ipv6' => '：属性は有効なIPv6アドレスでなければなりません。',
    'json' => '：属性は有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => '：属性は：valueより小さくなければなりません。',
        'file' => '：属性は：valueキロバイトより小さくなければなりません。',
        'string' => '：属性は：value文字以下でなければなりません。',
        'array' => '：属性は：value未満の項目を持つ必要があります。',
    ],
    'lte' => [
        'numeric' => '：属性は：value以下でなければなりません。',
        'file' => '：属性は、valueキロバイト以下でなければなりません。',
        'string' => '：属性は：value文字以下でなければなりません。',
        'array' => '：属性は：value以上の項目を含んではいけません。',
    ],
    'max' => [
        'numeric' => '：属性は：maxより大きくてはいけません。',
        'file' => '：属性は：maxキロバイトより大きくてはいけません。',
        'string' => '：属性は：max文字より大きくてはいけません。',
        'array' => '：属性は：max個以上のアイテムを持つことはできません。',
    ],
    'mimes' => '：属性はtype：：valuesのファイルでなければなりません。',
    'mimetypes' => '：属性はtype：：valuesのファイルでなければなりません。',
    'min' => [
        'numeric' => '：属性は少なくとも：minでなければなりません。',
        'file' => '：属性は最低でも：minキロバイトでなければなりません。',
        'string' => '：属性は少なくとも：min文字でなければなりません。',
        'array' => '：属性には少なくとも：min個の項目が必要です。',
    ],
    'not_in' => 'selected：属性が無効です。',
    'not_regex' => '：属性の形式が無効です。',
    'numeric' => '：属性は数字でなければなりません。',
    'present' => '：attributeフィールドが存在しなければなりません。',
    'regex' => '：属性の形式が無効です。',
    'required' => '：属性フィールドは必須です。',
    'required_if' => '：attributeフィールドは、：otherが：valueの場合は必須です。',
    'required_unless' => '：attributeフィールドは、：otherが：valuesに含まれていない限り必須です。',
    'required_with' => '：valuesが存在する場合、：attributeフィールドは必須です。',
    'required_with_all' => '：属性フィールドは、：値が存在する場合は必須です。',
    'required_without' => '：valuesが存在しない場合、：attributeフィールドは必須です。',
    'required_without_all' => '：属性フィールドは、：値がない場合は必須です。',
    'same' => '：属性と：otherは一致しなければなりません。',
    'size' => [
        'numeric' => '：属性は：sizeでなければなりません。',
        'file' => '：属性は、sizeキロバイトでなければなりません。',
        'string' => '：属性は：size文字でなければなりません。',
        'array' => '：属性は：size項目を含まなければなりません。',
    ],
    'starts_with' => '：属性は、以下のいずれかで始まっていなければなりません：：values',
    'string' => '：属性は文字列でなければなりません。',
    'timezone' => '：属性は有効なゾーンでなければなりません。',
    'unique' => '：属性は既に使われています。',
    'uploaded' => '：属性をアップロードできませんでした。',
    'url' => '：属性の形式が無効です。',
    'uuid' => '：属性は有効なUUIDでなければなりません。',
    'custom' => [
        'package_title' => [
            'required' => 'パッケージのタイトルは必須です',
        ],
        'package_subtitle' => [
            'required' => 'パッケージSubTitleは必須です',
        ],
        'package_price' => [
            'required' => 'パッケージ価格が必要です',
        ],
        'roles' => [
            'required' => 'パッケージを割り当てたい役割を選択してください',
        ],
        'review_option_title' => [
            'required' => 'レビューオプションのタイトルが必要です',
        ],
        'desc' => [
            'required' => '説明フィールドは必須です',
        ],
        'projects' => [
            'required' => 'プロジェクトを選択してください',
        ],
    ],
    'attributes' => [
    ],
];