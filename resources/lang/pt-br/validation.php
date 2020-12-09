<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Linhas de linguagem de validação
    |--------------------------------------------------------------------------
    |
    | As seguintes linhas de idioma contêm as mensagens de erro padrão usadas por
    | a classe validadora. Algumas dessas regras têm várias versões, como
    | como as regras de tamanho. Sinta-se à vontade para ajustar cada uma dessas mensagens aqui.
    |
    */

    'accepted'             => ':Attribute deve ser aceito.',
    'active_url'           => ':Attribute não é uma URL válida.',
    'after'                => ':Attribute deve ser uma data depois de :date.',
    'after_or_equal'       => ':Attribute deve ser uma data posterior ou igual à :date.',
    'alpha'                => ':Attribute deve conter somente letras.',
    'alpha_dash'           => ':Attribute deve conter letras, números e traços.',
    'alpha_num'            => ':Attribute deve conter somente letras e números.',
    'array'                => ':Attribute deve ser um array.',
    'before'               => ':Attribute deve ser uma data antes de :date.',
    'before_or_equal'      => ':Attribute deve ser uma data anterior ou igual à :date.',
    'between'              => [
        'numeric' => ':Attribute dev estar entre :min e :max.',
        'file'    => ':Attribute deve estar entre :min e :max kilobytes.',
        'string'  => ':Attribute deve estar entre :min e :max caracteres.',
        'array'   => ':Attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => ':Attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação de :attribute não confere.',
    'date'                 => ':Attribute não é uma data válida.',
    'date_format'          => ':Attribute não confere com o formato :format.',
    'different'            => ':Attribute e :other devem ser diferentes.',
    'digits'               => ':Attribute deve ter :digits dígitos.',
    'digits_between'       => ':Attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => ':Attribute tem dimensões de imagem inválidas.',
    'distinct'             => ':Attribute tem um valor duplicado.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => ':Attribute deve ser um arquivo.',
    'filled'               => ':Attribute é um campo obrigatório.',
    'image'                => ':Attribute deve ser uma imagem.',
    'in'                   => ':Attribute é inválido.',
    'in_array'             => ':Attribute não existe em :other.',
    'integer'              => ':Attribute deve ser um inteiro.',
    'ip'                   => ':Attribute deve ser um endereço IP válido.',
    'ipv4'                 => ':Attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => ':Attribute deve ser um endereço IPv6 válido.',
    'json'                 => ':Attribute deve ser um JSON válido.',
    'max'                  => [
        'numeric' => ':Attribute não deve ser maior que :max.',
        'file'    => ':Attribute não deve ter mais que :max kilobytes.',
        'string'  => ':Attribute não deve ter mais que :max caracteres.',
        'array'   => ':Attribute não deve ter mais que :max itens.',
    ],
    'mimes'                => ':Attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => ':Attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ':Attribute deve ser no mínimo :min.',
        'file'    => ':Attribute deve ter no mínimo :min kilobytes.',
        'string'  => ':Attribute deve ter no mínimo :min caracteres.',
        'array'   => ':Attribute deve ter no mínimo :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => ':Attribute deve ser um número.',
    'present'              => 'O :attribute deve estar presente.',
    'regex'                => 'O formato de :attribute é inválido.',
    'required'             => 'Campo obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O :attribute é necessário a menos que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values estão presentes.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum destes estão presentes: :values.',
    'same'                 => ':Attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => ':Attribute deve ser :size.',
        'file'    => ':Attribute deve ter :size kilobytes.',
        'string'  => ':Attribute deve ter :size caracteres.',
        'array'   => ':Attribute deve conter :size itens.',
    ],
    'string'               => ':Attribute deve ser uma string',
    'timezone'             => ':Attribute deve ser uma timezone válida.',
    'unique'               => ':Attribute já está em uso.',
    'uploaded'             => 'O :attribute falhou ao ser enviado.',
    'url'                  => 'O formato de :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Linhas de linguagem de validação personalizada
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar mensagens de validação personalizadas para atributos usando o
    | convenção "attribute.rule" para nomear as linhas. Isso torna mais rápido
    | especificar uma linha de idioma personalizada específica para uma determinada regra de atributo.
    |
    */

    // 'custom' => [
    //     'nome' => [
    //         'email' => 'Está é uma mensagem customizada (email incorreto!)',
    //     ],
    // ],

    /*
    |--------------------------------------------------------------------------
    | Atributos de validação personalizados   
    |--------------------------------------------------------------------------
    |
    | As seguintes linhas de linguagem são usadas para trocar os marcadores de posição de atributos
    | com algo mais amigável ao leitor, como endereço de e-mail.
    | de "email". Isso simplesmente nos ajuda a tornar as mensagens um pouco mais claras.
    |
    */

    // 'attributes' => ['nome' => 'O campo'],
];
