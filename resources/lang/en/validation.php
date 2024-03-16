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

    // 'accepted' => 'The :attribute must be accepted.',
    // 'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    // 'active_url' => 'The :attribute is not a valid URL.',
    // 'after' => 'The :attribute must be a date after :date.',
    // 'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    // 'alpha' => 'The :attribute must only contain letters.',
    // 'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    // 'alpha_num' => 'The :attribute must only contain letters and numbers.',
    // 'array' => 'The :attribute must be an array.',
    // 'before' => 'The :attribute must be a date before :date.',
    // 'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'accepted' => 'El campo :attribute debe ser aceptado.',
    'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute debe contener solo letras.',
    'alpha_dash' => 'El campo :attribute debe contener solo letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El campo :attribute debe contener solo letras y números.',
    'array' => 'El campo :attribute debe ser un arreglo.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',

    'between' => [
        // 'numeric' => 'The :attribute must be between :min and :max.',
        // 'file' => 'The :attribute must be between :min and :max kilobytes.',
        // 'string' => 'The :attribute must be between :min and :max characters.',
        // 'array' => 'The :attribute must have between :min and :max items.',
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'file' => 'El campo :attribute debe tener entre :min y :max kilobytes.',
        'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
        'array' => 'El campo :attribute debe tener entre :min y :max elementos.',

    ],
    // 'boolean' => 'The :attribute field must be true or false.',
    // 'confirmed' => 'The :attribute confirmation does not match.',
    // 'current_password' => 'The password is incorrect.',
    // 'date' => 'The :attribute is not a valid date.',
    // 'date_equals' => 'The :attribute must be a date equal to :date.',
    // 'date_format' => 'The :attribute does not match the format :format.',
    // 'declined' => 'The :attribute must be declined.',
    // 'declined_if' => 'The :attribute must be declined when :other is :value.',
    // 'different' => 'The :attribute and :other must be different.',
    // 'digits' => 'The :attribute must be :digits digits.',
    // 'digits_between' => 'The :attribute must be between :min and :max digits.',
    // 'dimensions' => 'The :attribute has invalid image dimensions.',
    // 'distinct' => 'The :attribute field has a duplicate value.',
    // 'email' => 'The :attribute must be a valid email address.',
    // 'ends_with' => 'The :attribute must end with one of the following: :values.',
    // 'enum' => 'The selected :attribute is invalid.',
    // 'exists' => 'The selected :attribute is invalid.',
    // 'file' => 'The :attribute must be a file.',
    // 'filled' => 'The :attribute field must have a value.',
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute no coincide con el formato :format.',
    'declined' => 'El campo :attribute debe ser rechazado.',
    'declined_if' => 'El campo :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El campo :attribute y :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe tener :digits dígitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El campo :attribute tiene dimensiones de imagen inválidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El :attribute seleccionado es inválido.',
    'exists' => 'El :attribute seleccionado es inválido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',

    'gt' => [
        // 'numeric' => 'The :attribute must be greater than :value.',
        // 'file' => 'The :attribute must be greater than :value kilobytes.',
        // 'string' => 'The :attribute must be greater than :value characters.',
        // 'array' => 'The :attribute must have more than :value items.',
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'file' => 'El tamaño del archivo en el campo :attribute debe ser mayor que :value kilobytes.',
        'string' => 'La longitud del texto en el campo :attribute debe ser mayor que :value caracteres.',
        'array' => 'El campo :attribute debe tener más de :value elementos.',

    ],
    'gte' => [
        // 'numeric' => 'The :attribute must be greater than or equal to :value.',
        // 'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        // 'string' => 'The :attribute must be greater than or equal to :value characters.',
        // 'array' => 'The :attribute must have :value items or more.',
        'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
        'file' => 'El tamaño del archivo en el campo :attribute debe ser mayor o igual que :value kilobytes.',
        'string' => 'La longitud del texto en el campo :attribute debe ser mayor o igual que :value caracteres.',
        'array' => 'El campo :attribute debe tener :value elementos o más.',

    ],
    // 'image' => 'The :attribute must be an image.',
    // 'in' => 'The selected :attribute is invalid.',
    // 'in_array' => 'The :attribute field does not exist in :other.',
    // 'integer' => 'The :attribute must be an integer.',
    // 'ip' => 'The :attribute must be a valid IP address.',
    // 'ipv4' => 'The :attribute must be a valid IPv4 address.',
    // 'ipv6' => 'The :attribute must be a valid IPv6 address.',
    // 'json' => 'The :attribute must be a valid JSON string.',
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El valor seleccionado para :attribute no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'ip' => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El campo :attribute debe ser una cadena JSON válida.',

    'lt' => [
        // 'numeric' => 'The :attribute must be less than :value.',
        // 'file' => 'The :attribute must be less than :value kilobytes.',
        // 'string' => 'The :attribute must be less than :value characters.',
        // 'array' => 'The :attribute must have less than :value items.',
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'file' => 'El tamaño del archivo en el campo :attribute debe ser menor que :value kilobytes.',
        'string' => 'La longitud del texto en el campo :attribute debe ser menor que :value caracteres.',
        'array' => 'El campo :attribute debe tener menos de :value elementos.',

    ],
    'lte' => [
        // 'numeric' => 'The :attribute must be less than or equal to :value.',
        // 'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        // 'string' => 'The :attribute must be less than or equal to :value characters.',
        // 'array' => 'The :attribute must not have more than :value items.',
        'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
        'file' => 'El tamaño del archivo en el campo :attribute debe ser menor o igual que :value kilobytes.',
        'string' => 'La longitud del texto en el campo :attribute debe ser menor o igual que :value caracteres.',
        'array' => 'El campo :attribute no debe tener más de :value elementos.',

    ],
    // 'mac_address' => 'The :attribute must be a valid MAC address.',
    'mac_address' => 'El campo :attribute debe ser una dirección MAC válida.',

    'max' => [
        // 'numeric' => 'The :attribute must not be greater than :max.',
        // 'file' => 'The :attribute must not be greater than :max kilobytes.',
        // 'string' => 'The :attribute must not be greater than :max characters.',
        // 'array' => 'The :attribute must not have more than :max items.',
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'file' => 'El tamaño del archivo en el campo :attribute no debe ser mayor que :max kilobytes.',
        'string' => 'La longitud del texto en el campo :attribute no debe ser mayor que :max caracteres.',
        'array' => 'El campo :attribute no debe tener más de :max elementos.',

    ],
    // 'mimes' => 'The :attribute must be a file of type: :values.',
    // 'mimetypes' => 'The :attribute must be a file of type: :values.',
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',

    'min' => [
        // 'numeric' => 'The :attribute must be at least :min.',
        // 'file' => 'The :attribute must be at least :min kilobytes.',
        // 'string' => 'The :attribute must be at least :min characters.',
        // 'array' => 'The :attribute must have at least :min items.',
        'numeric' => 'El campo :attribute debe ser como mínimo :min.',
        'file' => 'El tamaño del archivo en el campo :attribute debe ser como mínimo :min kilobytes.',
        'string' => 'La longitud del texto en el campo :attribute debe ser como mínimo :min caracteres.',
        'array' => 'El campo :attribute debe tener como mínimo :min elementos.',

    ],
    // 'multiple_of' => 'The :attribute must be a multiple of :value.',
    // 'not_in' => 'The selected :attribute is invalid.',
    // 'not_regex' => 'The :attribute format is invalid.',
    // 'numeric' => 'The :attribute must be a number.',
    // 'password' => 'The password is incorrect.',
    // 'present' => 'The :attribute field must be present.',
    // 'prohibited' => 'The :attribute field is prohibited.',
    // 'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    // 'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    // 'prohibits' => 'The :attribute field prohibits :other from being present.',
    // 'regex' => 'The :attribute format is invalid.',
    // 'required' => 'The :attribute field is required.',
    // 'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    // 'required_if' => 'The :attribute field is required when :other is :value.',
    // 'required_unless' => 'The :attribute field is required unless :other is in :values.',
    // 'required_with' => 'The :attribute field is required when :values is present.',
    // 'required_with_all' => 'The :attribute field is required when :values are present.',
    // 'required_without' => 'The :attribute field is required when :values is not present.',
    // 'required_without_all' => 'The :attribute field is required when none of :values are present.',
    // 'same' => 'The :attribute and :other must match.',
    'multiple_of' => 'El campo :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El campo seleccionado :attribute no es válido.',
    'not_regex' => 'El formato del campo :attribute no es válido.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohíbe que :other esté presente.',
    'regex' => 'El formato del campo :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values está presente.',
    'same' => 'El campo :attribute y :other deben coincidir.',

    'size' => [
        // 'numeric' => 'The :attribute must be :size.',
        // 'file' => 'The :attribute must be :size kilobytes.',
        // 'string' => 'The :attribute must be :size characters.',
        // 'array' => 'The :attribute must contain :size items.',
        'numeric' => 'El campo :attribute debe ser :size.',
        'file' => 'El tamaño del archivo en el campo :attribute debe ser :size kilobytes.',
        'string' => 'La longitud del texto en el campo :attribute debe ser :size caracteres.',
        'array' => 'El campo :attribute debe contener :size elementos.',

    ],
    // 'starts_with' => 'The :attribute must start with one of the following: :values.',
    // 'string' => 'The :attribute must be a string.',
    // 'timezone' => 'The :attribute must be a valid timezone.',
    // 'unique' => 'The :attribute has already been taken.',
    // 'uploaded' => 'The :attribute failed to upload.',
    // 'url' => 'The :attribute must be a valid URL.',
    // 'uuid' => 'The :attribute must be a valid UUID.',
    'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values.',
    'string' => 'El campo :attribute debe ser una cadena de texto.',
    'timezone' => 'El campo :attribute debe ser una zona horaria válida.',
    'unique' => 'El valor proporcionado en el campo :attribute ya ha sido tomado.',
    'uploaded' => 'Error al cargar el archivo en el campo :attribute.',
    'url' => 'El campo :attribute debe ser una URL válida.',
    'uuid' => 'El campo :attribute debe ser un UUID válido.',


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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
