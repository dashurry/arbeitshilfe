<?php 

return [
    'accepted' => ': Niteliği kabul edilmeli.',
    'active_url' => ': Niteliği geçerli bir URL değil.',
    'after' => ': Niteliği sonraki bir tarih olmalıdır: tarih.',
    'after_or_equal' => ': Niteliği,: tarihinden önce veya ona eşit bir tarih olmalıdır.',
    'alpha' => ': Niteliği yalnızca harf içerebilir.',
    'alpha_dash' => ': Niteliği yalnızca harfler, sayılar, kısa çizgiler ve alt çizgiler içerebilir.',
    'alpha_num' => ': Niteliği yalnızca harfleri ve sayıları içerebilir.',
    'array' => ': Niteliği bir dizi olmalıdır.',
    'before' => ': Niteliği önce bir tarih olmalıdır: tarih.',
    'before_or_equal' => ': Özniteliği bir tarih veya eşittir tarih olmalıdır:',
    'between' => [
        'numeric' => ': Niteliği: min ve: max arasında olmalıdır.',
        'file' => ': Niteliği: min ve: maks kilobayt arasında olmalıdır.',
        'string' => ': Niteliği: min ve: max karakter arasında olmalıdır.',
        'array' => ': Niteliği arasında: min ve: maks.',
    ],
    'boolean' => ': Nitelik alanı doğru veya yanlış olmalıdır.',
    'confirmed' => ': Nitelik onayı uyuşmuyor.',
    'date' => ': Niteliği geçerli bir tarih değil.',
    'date_equals' => ': Niteliği: tarihe eşit bir tarih olmalıdır.',
    'date_format' => ': Niteliği format: format ile eşleşmiyor.',
    'different' => ': Attribute and: other farklı olmalıdır.',
    'digits' => ': Özniteliği şöyle olmalıdır: basamak haneleri.',
    'digits_between' => ': Niteliği: min ve: arasında en fazla rakam olmalıdır.',
    'dimensions' => ': Niteliği geçersiz resim boyutlarına sahip.',
    'distinct' => ': Niteliği alanı yinelenen bir değere sahip.',
    'email' => ': Niteliği geçerli bir e-posta adresi olmalı.',
    'exists' => 'Seçilen: özellik geçersiz.',
    'file' => ': Niteliği bir dosya olmalıdır.',
    'filled' => ': Nitelik alanı bir değere sahip olmalıdır.',
    'gt' => [
        'numeric' => ': Niteliği: değerden büyük olmalıdır.',
        'file' => ': Niteliği şu değerden büyük olmalıdır: değer kilobayt.',
        'string' => ': Niteliği şu değerden büyük olmalıdır: value karakterleri.',
        'array' => ': Niteliği: değerden daha fazlasına sahip olmalıdır.',
    ],
    'gte' => [
        'numeric' => ': Niteliği eşit veya değerden büyük olmalıdır.',
        'file' => ': Özniteliği büyük veya eşit olmalıdır: değer kilobayt',
        'string' => ': Özniteliği, büyük veya eşit olmalıdır: değer karakterleri.',
        'array' => ': Niteliğinin olması gereken: değer öğeleri veya daha fazlası.',
    ],
    'image' => ': Niteliği bir resim olmalıdır.',
    'in' => 'Seçilen: özellik geçersiz.',
    'in_array' => ': Öznitelik alanı şurada mevcut değil: diğer.',
    'integer' => ': Niteliği bir tamsayı olmalıdır.',
    'ip' => ': Niteliği geçerli bir IP adresi olmalıdır.',
    'ipv4' => ': Niteliği geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ': Niteliği geçerli bir IPv6 adresi olmalıdır.',
    'json' => ': Niteliği geçerli bir JSON dizgisi olmalıdır.',
    'lt' => [
        'numeric' => ': Niteliği: değerden küçük olmalıdır.',
        'file' => ': Niteliği şu değerden küçük olmalıdır: değer kilobayt.',
        'string' => ': Niteliği: değer karakterlerinden küçük olmalıdır.',
        'array' => ': Niteliği şundan küçük olmalıdır: değer öğeleri',
    ],
    'lte' => [
        'numeric' => ': Özniteliği küçük veya eşit olmalıdır: değer',
        'file' => ': Özniteliği küçük veya eşit olmalıdır: değer kilobayt.',
        'string' => ': Niteliği küçük veya eşit olmalıdır: değer karakterleri.',
        'array' => ': Niteliği: değer öğesinden daha fazlasına sahip olmamalıdır.',
    ],
    'max' => [
        'numeric' => ': Niteliği şu değerden büyük olamaz: maks.',
        'file' => ':: Özniteliği şundan büyük olamaz: azami kilobayt.',
        'string' => ': Niteliği: en fazla karakter olamaz.',
        'array' => ':: Özniteliği, en fazla: max öğeye sahip olamaz.',
    ],
    'mimes' => ': Özniteliği bir tür dosya olmalıdır:: değerler.',
    'mimetypes' => ': Özniteliği bir tür dosya olmalıdır:: değerler.',
    'min' => [
        'numeric' => ': Niteliği en az: min.',
        'file' => ': Nitelik en az: en az kilobayt olmalıdır.',
        'string' => ': Niteliği en az: min karakter olmalıdır.',
        'array' => ': Niteliği en az: min öğelerine sahip olmalıdır.',
    ],
    'not_in' => 'Seçilen: özellik geçersiz.',
    'not_regex' => ': Nitelik formatı geçersiz.',
    'numeric' => ': Niteliği bir sayı olmalıdır.',
    'present' => ': Nitelik alanı mevcut olmalıdır.',
    'regex' => ': Nitelik formatı geçersiz.',
    'required' => ': Nitelik alanı zorunludur.',
    'required_if' => ': Öznitelik alanı şu durumlarda gereklidir: diğeri: değer.',
    'required_unless' => ': Öznitelik alanı, diğerlerinde: değerler olmadıkça zorunludur.',
    'required_with' => 'Değerler mevcut olduğunda: nitelik alanı gereklidir.',
    'required_with_all' => 'Değerler mevcut olduğunda: attribute field gereklidir.',
    'required_without' => ': Attribute field şu durumlarda gereklidir: değerler mevcut değilse.',
    'required_without_all' => ': Attribute field, hiçbiri: değer olmadığında gereklidir.',
    'same' => ': Attribute ve: other eşleşmelidir.',
    'size' => [
        'numeric' => ': Niteliği şöyle olmalıdır: size.',
        'file' => ': Özniteliği şöyle olmalıdır: size kilobayt.',
        'string' => ': Nitelik olmalıdır: boyut karakterleri.',
        'array' => ': Niteliği şunu içermelidir: boyut öğeleri.',
    ],
    'starts_with' => ': Niteliği aşağıdakilerden biriyle başlamalıdır:: değerler',
    'string' => ': Niteliği bir dize olmalı.',
    'timezone' => ': Niteliği geçerli bir bölge olmalıdır.',
    'unique' => ': Niteliği zaten alınmış.',
    'uploaded' => ': Niteliği yüklenemedi.',
    'url' => ': Nitelik formatı geçersiz.',
    'uuid' => ': Niteliği geçerli bir UUID olmalıdır.',
    'custom' => [
        'package_title' => [
            'required' => 'Paket Başlığı Gerekli',
        ],
        'package_subtitle' => [
            'required' => 'Paket Alt Yazı Gerekli',
        ],
        'package_price' => [
            'required' => 'Paket Ücreti Gerekli',
        ],
        'roles' => [
            'required' => 'Lütfen paket atamak istediğiniz rolü seçin',
        ],
        'review_option_title' => [
            'required' => 'İnceleme seçeneği başlığı gerekli',
        ],
        'desc' => [
            'required' => 'Açıklama alanı zorunludur',
        ],
        'projects' => [
            'required' => 'Lütfen proje seçiniz',
        ],
    ],
    'attributes' => [
    ],
];