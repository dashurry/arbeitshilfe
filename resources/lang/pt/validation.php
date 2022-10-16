<?php 

return [
    'accepted' => 'O atributo: deve ser aceito.',
    'active_url' => 'O atributo: não é um URL válido.',
    'after' => 'O atributo: deve ser uma data após: data.',
    'after_or_equal' => 'O atributo: deve ser uma data posterior ou igual a: date.',
    'alpha' => 'O atributo: só pode conter letras.',
    'alpha_dash' => 'O atributo: pode conter apenas letras, números, traços e sublinhados.',
    'alpha_num' => 'O atributo: só pode conter letras e números.',
    'array' => 'O atributo: deve ser uma matriz.',
    'before' => 'O atributo: deve ser uma data anterior: data.',
    'before_or_equal' => 'O atributo: deve ser uma data anterior ou igual a: date.',
    'between' => [
        'numeric' => 'O atributo: deve estar entre: min e: max.',
        'file' => 'O atributo: deve estar entre: min e: max kilobytes.',
        'string' => 'O atributo: deve estar entre: min e: max caracteres.',
        'array' => 'O atributo: deve ter entre: min e: max itens.',
    ],
    'boolean' => 'O campo: atributo deve ser verdadeiro ou falso.',
    'confirmed' => 'A confirmação do atributo: não corresponde.',
    'date' => 'O atributo: não é uma data válida.',
    'date_equals' => 'O atributo: deve ser uma data igual a: date.',
    'date_format' => 'O atributo: não corresponde ao formato: format.',
    'different' => 'O atributo: e: outro deve ser diferente.',
    'digits' => 'O atributo: deve ser: dígitos dígitos.',
    'digits_between' => 'O atributo: deve estar entre: min e: max dígitos.',
    'dimensions' => 'O atributo: tem dimensões de imagem inválidas.',
    'distinct' => 'O campo: attribute possui um valor duplicado.',
    'email' => 'O atributo: deve ser um endereço de e-mail válido.',
    'exists' => 'O atributo selecionado: é inválido.',
    'file' => 'O atributo: deve ser um arquivo.',
    'filled' => 'O campo: attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O atributo: deve ser maior que: value.',
        'file' => 'O atributo: deve ser maior que: valor kilobytes.',
        'string' => 'O atributo: deve ser maior que: caracteres de valor.',
        'array' => 'O atributo: deve ter mais de: itens de valor.',
    ],
    'gte' => [
        'numeric' => 'O atributo: deve ser maior ou igual a: value.',
        'file' => 'O atributo: deve ser maior ou igual a: valor kilobytes.',
        'string' => 'O atributo: deve ser maior ou igual a: caracteres de valor.',
        'array' => 'O atributo: deve ter: itens de valor ou mais.',
    ],
    'image' => 'O atributo: deve ser uma imagem.',
    'in' => 'O atributo selecionado: é inválido.',
    'in_array' => 'O campo: atributo não existe em: other.',
    'integer' => 'O atributo: deve ser um inteiro.',
    'ip' => 'O atributo: deve ser um endereço IP válido.',
    'ipv4' => 'O atributo: deve ser um endereço IPv4 válido.',
    'ipv6' => 'O atributo: deve ser um endereço IPv6 válido.',
    'json' => 'O atributo: deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O atributo: deve ser menor que: valor.',
        'file' => 'O atributo: deve ser menor que: valor kilobytes.',
        'string' => 'O atributo: deve ser menor que: caracteres de valor.',
        'array' => 'O atributo: deve ter menos que: itens de valor.',
    ],
    'lte' => [
        'numeric' => 'O atributo: deve ser menor ou igual a: value.',
        'file' => 'O atributo: deve ser menor ou igual a: valor kilobytes.',
        'string' => 'O atributo: deve ser menor ou igual a: caracteres de valor.',
        'array' => 'O atributo: não deve ter mais que: itens de valor.',
    ],
    'max' => [
        'numeric' => 'O atributo: não pode ser maior que: max.',
        'file' => 'O atributo: não pode ser maior que: max kilobytes.',
        'string' => 'O atributo: não pode ser maior que: caracteres máximos.',
        'array' => 'O atributo: pode não ter mais que: itens máximos.',
    ],
    'mimes' => 'O atributo: deve ser um arquivo do tipo:: values.',
    'mimetypes' => 'O atributo: deve ser um arquivo do tipo:: values.',
    'min' => [
        'numeric' => 'O atributo: deve ser no mínimo: min.',
        'file' => 'O atributo: deve ser pelo menos: min kilobytes.',
        'string' => 'O atributo: deve ser pelo menos: min caracteres.',
        'array' => 'O atributo: deve ter pelo menos: min itens.',
    ],
    'not_in' => 'O atributo selecionado: é inválido.',
    'not_regex' => 'O formato do atributo: é inválido.',
    'numeric' => 'O atributo: deve ser um número.',
    'present' => 'O campo: atributo deve estar presente.',
    'regex' => 'O formato do atributo: é inválido.',
    'required' => 'O campo: atributo é obrigatório.',
    'required_if' => 'O campo: attribute é obrigatório quando: other é: value.',
    'required_unless' => 'O campo: attribute é obrigatório, a menos que: other esteja em: values.',
    'required_with' => 'O campo: atributo é obrigatório quando: valores estão presentes.',
    'required_with_all' => 'O campo: atributo é obrigatório quando: os valores estão presentes.',
    'required_without' => 'O campo: atributo é obrigatório quando: os valores não estão presentes.',
    'required_without_all' => 'O campo: attribute é obrigatório quando nenhum dos valores: está presente.',
    'same' => 'O atributo: e: outro deve corresponder.',
    'size' => [
        'numeric' => 'O atributo: deve ser: size.',
        'file' => 'O atributo: deve ser: tamanho kilobytes.',
        'string' => 'O atributo: deve ser: caracteres de tamanho.',
        'array' => 'O atributo: deve conter: itens de tamanho.',
    ],
    'starts_with' => 'O atributo: deve começar com um dos seguintes:: values',
    'string' => 'O atributo: deve ser uma string.',
    'timezone' => 'O atributo: deve ser uma zona válida.',
    'unique' => 'O atributo: já foi usado.',
    'uploaded' => 'O atributo: falhou ao fazer o upload.',
    'url' => 'O formato do atributo: é inválido.',
    'uuid' => 'O atributo: deve ser um UUID válido.',
    'custom' => [
        'package_title' => [
            'required' => 'O título do pacote é obrigatório',
        ],
        'package_subtitle' => [
            'required' => 'Subtítulo do pacote é obrigatório',
        ],
        'package_price' => [
            'required' => 'O preço do pacote é obrigatório',
        ],
        'roles' => [
            'required' => 'Por favor, selecione o papel que você deseja atribuir pacote',
        ],
        'review_option_title' => [
            'required' => 'O título da opção de revisão é obrigatório',
        ],
        'desc' => [
            'required' => 'Campo de descrição é obrigatório',
        ],
        'projects' => [
            'required' => 'Por favor selecione projetos',
        ],
    ],
    'attributes' => [
    ],
];