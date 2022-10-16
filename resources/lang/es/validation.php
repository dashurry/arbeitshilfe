<?php 

return [
    'accepted' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha después de: fecha.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a la fecha.',
    'alpha' => 'El :attribute solo puede contener letras.',
    'alpha_dash' => 'El :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute solo puede contener letras y números.',
    'array' => 'El :attribute debe ser una matriz.',
    'before' => 'El :attribute debe ser una fecha anterior a: fecha.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a la fecha.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre: min y: max.',
        'file' => 'El :attribute debe estar entre: mínimo y: máximo de kilobytes.',
        'string' => 'El :attribute debe estar entre: min y: max caracteres.',
        'array' => 'El :attribute debe tener entre: min y: max elementos.',
    ],
    'boolean' => 'El campo: atributo debe ser verdadero o falso.',
    'confirmed' => 'La confirmación del :attribute no coincide.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a: fecha.',
    'date_format' => 'El :attribute no coincide con el formato: formato.',
    'different' => 'El: atributo y: otro deben ser diferentes.',
    'digits' => 'El :attribute debe ser: dígitos dígitos.',
    'digits_between' => 'El :attribute debe estar entre: mínimo y: máximo de dígitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo: atributo tiene un valor duplicado.',
    'email' => 'El :attribute debe ser una dirección de correo electrónico válida.',
    'exists' => 'El atributo seleccionado: no es válido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El campo: atributo debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que: valor.',
        'file' => 'El :attribute debe ser mayor que: valor de kilobytes.',
        'string' => 'El :attribute debe ser mayor que: caracteres de valor.',
        'array' => 'El :attribute debe tener más de: elementos de valor.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor o igual que el valor.',
        'file' => 'El :attribute debe ser mayor o igual que el valor de kilobytes.',
        'string' => 'El :attribute debe ser mayor o igual que los caracteres de valor.',
        'array' => 'El :attribute debe tener: elementos de valor o más.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'El atributo seleccionado: no es válido.',
    'in_array' => 'El campo: atributo no existe en: otro.',
    'integer' => 'El :attribute debe ser un número entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que: valor.',
        'file' => 'El :attribute debe ser menor que: valor de kilobytes.',
        'string' => 'El :attribute debe ser menor que: caracteres de valor.',
        'array' => 'El :attribute debe tener menos de: elementos de valor.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que el valor.',
        'file' => 'El :attribute debe ser menor o igual que el valor de kilobytes.',
        'string' => 'El :attribute debe ser menor o igual que el valor de los caracteres.',
        'array' => 'El :attribute no debe tener más de: elementos de valor.',
    ],
    'max' => [
        'numeric' => 'El :attribute no puede ser mayor que: max.',
        'file' => 'El :attribute no puede ser mayor que: max kilobytes.',
        'string' => 'El :attribute no puede ser mayor que: max caracteres.',
        'array' => 'El :attribute no puede tener más de: elementos máximos.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo: valores.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: valores.',
    'min' => [
        'numeric' => 'El :attribute debe ser al menos: min.',
        'file' => 'El :attribute debe ser al menos: kilobytes mínimos.',
        'string' => 'El :attribute debe tener al menos: min caracteres.',
        'array' => 'El :attribute debe tener al menos: elementos min.',
    ],
    'not_in' => 'El :attribute seleccionado no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El campo de :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando: otro es: valor.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que: otro esté en: valores.',
    'required_with' => 'El campo :attribute es obligatorio cuando: los valores están presentes.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando: los valores están presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando: los valores no están presentes.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los valores está presente.',
    'same' => 'El :attribute y el otro debe coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser: tamaño.',
        'file' => 'El :attribute debe ser: kilobytes de tamaño.',
        'string' => 'El :attribute debe ser: caracteres de tamaño.',
        'array' => 'El :attribute debe contener: elementos de tamaño.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes:: valores',
    'string' => 'El :attribute debe ser una cadena.',
    'timezone' => 'El :attribute debe ser una zona válida.',
    'unique' => 'El :attribute ya ha sido tomado.',
    'uploaded' => 'El :attribute no se pudo cargar.',
    'url' => 'El formato de :attribute no es válido.',
    'uuid' => 'El :attribute debe ser un UUID válido.',
    'custom' => [
        'package_title' => [
            'required' => 'Se requiere el título del paquete',
        ],
        'package_subtitle' => [
            'required' => 'Se requiere el subtítulo del paquete',
        ],
        'package_price' => [
            'required' => 'El precio del paquete es requerido',
        ],
        'roles' => [
            'required' => 'Por favor, seleccione el rol que desea asignar paquete',
        ],
        'review_option_title' => [
            'required' => 'Se requiere el título de la opción de revisión',
        ],
        'desc' => [
            'required' => 'Campo de descripción es obligatorio',
        ],
        'projects' => [
            'required' => 'Por favor seleccione proyectos',
        ],
    ],
    'attributes' => [
    ],
];