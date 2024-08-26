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

    'accepted'             => ':Attribute harus diterima.',
    'active_url'           => ':Attribute bukan URL yang sah.',
    'after'                => ':Attribute harus tanggal setelah :date.',
    'after_or_equal'       => ':Attribute harus tanggal sesudah atau sama dengan :date.',
    'alpha'                => ':Attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':Attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => ':Attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':Attribute harus berupa sebuah array.',
    'before'               => ':Attribute harus tanggal sebelum :date.',
    'before_or_equal'      => ':Attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => ':Attribute harus antara :min dan :max.',
        'file'    => ':Attribute harus antara :min dan :max kilobytes.',
        'string'  => ':Attribute harus antara :min dan :max karakter.',
        'array'   => ':Attribute harus antara :min dan :max item.',
    ],
    'boolean'              => ':Attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => ':Attribute bukan tanggal yang valid.',
    'date_format'          => ':Attribute tidak cocok dengan format :format.',
    'different'            => ':Attribute dan :other harus berbeda.',
    'digits'               => ':Attribute harus berupa angka :digits.',
    'digits_between'       => ':Attribute harus antara angka :min dan :max.',
    'dimensions'           => ':Attribute harus merupakan dimensi gambar yang sah.',
    'distinct'             => ':Attribute memiliki nilai yang duplikat.',
    'email'                => ':Attribute harus berupa alamat surel yang valid.',
    'exists'               => ':Attribute yang dipilih tidak valid.',
    'file'                 => ':Attribute harus berupa file.',
    'filled'               => ':Attribute wajib diisi.',
    'gt'                   => [
        'numeric' => ':Attribute harus lebih besar dari :value.',
        'file'    => ':Attribute harus lebih besar dari :value kilobytes.',
        'string'  => ':Attribute harus lebih besar dari :value karakter.',
        'array'   => ':Attribute harus lebih besar dari :value items.',
    ],
    'gte'                  => [
        'numeric' => ':Attribute harus lebih besar dari atau sama dengan :value.',
        'file'    => ':Attribute harus lebih besar dari atau sama dengan :value kilobytes.',
        'string'  => ':Attribute harus lebih besar dari atau sama dengan :value karakter.',
        'array'   => ':Attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => ':Attribute harus berupa gambar.',
    'in'                   => ':Attribute yang dipilih tidak valid.',
    'in_array'             => ':Attribute tidak terdapat dalam :other.',
    'integer'              => ':Attribute harus merupakan bilangan bulat.',
    'ip'                   => ':Attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => ':Attribute harus berupa alamat IPv4.',
    'ipv6'                 => ':Attribute harus berupa alamat IPv6.',
    'json'                 => ':Attribute harus berupa JSON string yang valid.',
    'lt'                   => [
        'numeric' => ':Attribute harus lebih kecil dari :value.',
        'file'    => ':Attribute harus lebih kecil dari :value kilobytes.',
        'string'  => ':Attribute harus lebih kecil dari :value karakter.',
        'array'   => ':Attribute harus memiliki kurang dari :value item.',
    ],
    'lte'                  => [
        'numeric' => ':Attribute harus lebih kecil dari atau sama dengan :value.',
        'file'    => ':Attribute harus lebih kecil dari atau sama dengan :value kilobytes.',
        'string'  => ':Attribute harus lebih kecil dari atau sama dengan:value karakter.',
        'array'   => ':Attribute tidak boleh lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => ':Attribute seharusnya tidak lebih dari :max.',
        'file'    => ':Attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => ':Attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => ':Attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => ':Attribute harus dokumen berjenis : :values.',
    'mimetypes'            => ':Attribute harus berupa tipe file : :values.',
    'min'                  => [
        'numeric' => ':Attribute harus minimal :min.',
        'file'    => ':Attribute harus minimal :min kilobytes.',
        'string'  => ':Attribute harus minimal :min karakter.',
        'array'   => ':Attribute harus minimal :min item.',
    ],
    'not_in'               => ':Attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format :Attribute tidak valid.',
    'numeric'              => ':Attribute harus berupa angka.',
    'present'              => ':Attribute wajib ada.',
    'regex'                => 'Format :Attribute tidak valid.',
    'required'             => ':Attribute wajib diisi.',
    'required_if'          => ':Attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => ':Attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => ':Attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => ':Attribute wajib diisi bila terdapat :values.',
    'required_without'     => ':Attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => ':Attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => ':Attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => ':Attribute harus berukuran :size.',
        'file'    => ':Attribute harus berukuran :size kilobyte.',
        'string'  => ':Attribute harus berukuran :size karakter.',
        'array'   => ':Attribute harus mengandung :size item.',
    ],
    'string'               => ':Attribute harus berupa string.',
    'timezone'             => ':Attribute harus berupa zona waktu yang valid.',
    'unique'               => ':Attribute sudah ada sebelumnya.',
    'uploaded'             => ':attribute gagal untuk di upload.',
    'url'                  => 'Format :Attribute tidak valid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];