<?php

return [
    'accepted'        => 'Laukas :attribute turi būti priimtas.',
    'active_url'      => 'Laukas :attribute nėra galiojantis internetinis adresas.',
    'after'           => 'Lauko :attribute reikšmė turi būti po :date datos.',
    'after_or_equal'  => 'Data privalo būti  lygi arba vėlesnė negu šios dienos.',
    'alpha'           => 'Laukas :attribute gali turėti tik raides.',
    'alpha_dash'      => 'Laukas :attribute gali turėti tik raides, skaičius ir brūkšnelius.',
    'alpha_num'       => 'Laukas :attribute gali turėti tik raides ir skaičius.',
    'array'           => 'Laukas :attribute turi būti masyvas.',
    'before'          => 'Laukas :attribute turi būti data prieš :date.',
    'before_or_equal' => 'Lauko :attribute reikšmė privalo būti data lygi arba ankstesnė negu :date.',
    'between'         => [
        'numeric' => 'Lauko :attribute reikšmė turi būti tarp :min ir :max.',
        'file'    => 'Failo dydis lauke :attribute turi būti tarp :min ir :max kilobaitų.',
        'string'  => 'Simbolių skaičius lauke :attribute turi būti tarp :min ir :max.',
        'array'   => 'Elementų skaičius lauke :attribute turi turėti nuo :min iki :max.',
    ],
    'boolean'        => "Lauko reikšmė :attribute turi būti 'taip' arba 'ne'.",
    'confirmed'      => 'Lauko :attribute patvirtinimas nesutampa.',
    'date'           => 'Lauko :attribute reikšmė nėra galiojanti data.',
    'date_equals'    => 'Lauko :attribute reikšmė turi būti data lygi :date.',
    'date_format'    => 'Lauko :attribute reikšmė neatitinka formato :format.',
    'different'      => 'Laukų :attribute ir :other reikšmės turi skirtis.',
    'digits'         => 'Laukas :attribute turi būti sudarytas iš :digits skaitmenų.',
    'digits_between' => 'Laukas :attribute tuti turėti nuo :min iki :max skaitmenų.',
    'dimensions'     => 'Lauke :attribute įkeltas paveiksliukas neatitinka išmatavimų reikalavimo.',
    'distinct'       => 'Laukas :attribute pasikartoja.',
    'email'          => 'Lauko :attribute reikšmė turi būti galiojantis el. pašto adresas.',
    'ends_with'      => 'Laukas :attribute turi baigtis vienu iš: :values',
    'exists'         => 'Pasirinkta negaliojanti :attribute reikšmė.',
    'file'           => ':attribute turi būti failas.',
    'filled'         => 'Laukas :attribute turi būti užpildytas.',
    'gt'             => [
        'numeric' => 'Lauko :attribute reikšmė turi būti didesnė negu :value.',
        'file'    => 'Lauko :attribute reikšmė turi būti didesnė negu :value kilobaitai.',
        'string'  => 'Lauko :attribute reikšmė turi būti didesnė negu :value simboliai.',
        'array'   => 'Laukas :attribute turi turėti daugiau nei :value elementus.',
    ],
    'gte' => [
        'numeric' => 'Lauko :attribute reikšmė turi būti didesnė arba lygi :value.',
        'file'    => 'Lauko :attribute reikšmė turi būti didesnė arba lygi :value kilobaitams.',
        'string'  => 'Lauko :attribute reikšmė turi būti didesnė arba lygi :value simboliams.',
        'array'   => 'Laukas :attribute  turi turėti :value elementus arba daugiau.',
    ],
    'image'    => 'Lauko :attribute reikšmė turi būti paveikslėlis.',
    'in'       => 'Pasirinkta negaliojanti :attribute reikšmė.',
    'in_array' => 'Laukas :attribute neegzistuoja :other lauke.',
    'integer'  => 'Lauko :attribute reikšmė turi būti sveikasis skaičius.',
    'ip'       => 'Lauko :attribute reikšmė turi būti galiojantis IP adresas.',
    'ipv4'     => 'Lauko :attribute reikšmė turi būti galiojantis IPv4 adresas.',
    'ipv6'     => 'Lauko :attribute reikšmė turi būti galiojantis IPv6 adresas.',
    'json'     => 'Lauko :attribute reikšmė turi būti JSON tekstas.',
    'lt'       => [
        'numeric' => 'Lauko :attribute reikšmė turi būti mažesnė negu :value.',
        'file'    => 'Lauko :attribute reikšmė turi būti mažesnė negu :value kilobaitai.',
        'string'  => 'Lauko :attribute reikšmė turi būti mažesnė negu :value simboliai.',
        'array'   => 'Laukas :attribute turi turėti mažiau negu :value elementus.',
    ],
    'lte' => [
        'numeric' => 'Lauko :attribute reikšmė turi būti mažesnė arba lygi :value.',
        'file'    => 'Lauko :attribute reikšmė turi būti mažesnė arba lygi :value kilobaitams.',
        'string'  => 'Lauko :attribute  reikšmė turi būti mažesnė arba lygi :value simboliams.',
        'array'   => 'Laukas :attribute turi turėti mažiau arba lygiai :value elementus.',
    ],
    'max' => [
        'numeric' => 'Lauko :attribute reikšmė negali būti didesnė nei :max.',
        'file'    => 'Failo dydis lauke :attribute reikšmė negali būti didesnė nei :max kilobaitų.',
        'string'  => 'Simbolių kiekis lauke :attribute reikšmė negali būti didesnė nei :max simbolių.',
        'array'   => 'Elementų kiekis lauke :attribute negali turėti daugiau nei :max elementų.',
    ],
    'mimes'     => 'Lauko reikšmė :attribute turi būti failas vieno iš sekančių tipų: :values.',
    'mimetypes' => 'Lauko reikšmė :attribute turi būti failas vieno iš sekančių tipų: :values.',
    'min'       => [
        'numeric' => 'Lauko :attribute reikšmė turi būti ne mažesnė nei :min.',
        'file'    => 'Failo dydis lauke :attribute turi būti ne mažesnis nei :min kilobaitų.',
        'string'  => 'Simbolių kiekis lauke :attribute turi būti ne mažiau nei :min.',
        'array'   => 'Elementų kiekis lauke :attribute turi būti ne mažiau nei :min.',
    ],
    'not_in'               => 'Pasirinkta negaliojanti reikšmė :attribute.',
    'not_regex'            => 'Lauko :attribute formatas yra neteisingas.',
    'numeric'              => 'Lauko :attribute reikšmė turi būti skaičius.',
    'password'             => 'Slaptažodis neteisingas.',
    'present'              => 'Laukas :attribute turi egzistuoti.',
    'regex'                => 'Negaliojantis lauko :attribute formatas.',
    'required'             => 'Privaloma užpildyti šį lauką ',
    'required_if'          => 'Privaloma užpildyti lauką :attribute kai :other yra :value.',
    'required_unless'      => 'Laukas :attribute yra privalomas, nebent :other yra tarp :values reikšmių.',
    'required_with'        => 'Privaloma užpildyti lauką :attribute kai pateikta :values.',
    'required_with_all'    => 'Privaloma užpildyti lauką :attribute kai pateikta :values.',
    'required_without'     => 'Privaloma užpildyti lauką :attribute kai nepateikta :values.',
    'required_without_all' => 'Privaloma užpildyti lauką :attribute kai nepateikta nei viena iš reikšmių :values.',
    'same'                 => 'Laukai :attribute ir :other turi sutapti.',
    'size'                 => [
        'numeric' => 'Lauko :attribute reikšmė turi būti :size.',
        'file'    => 'Failo dydis lauke :attribute turi būti :size kilobaitai.',
        'string'  => 'Simbolių skaičius lauke :attribute turi būti :size.',
        'array'   => 'Elementų kiekis lauke :attribute turi būti :size.',
    ],
    'starts_with' => 'Laukas :attribute turi prasidėti vienu iš: :values',
    'string'      => 'Laukas :attribute turi būti tekstinis.',
    'timezone'    => 'Lauko :attribute reikšmė turi būti galiojanti laiko zona.',
    'unique'      => 'Tokia :attribute reikšmė jau pasirinkta.',
    'uploaded'    => 'Nepavyko įkelti :attribute lauko.',
    'url'         => 'Negaliojantis lauko :attribute formatas.',
    'uuid'        => 'Lauko :attribute reikšmė turi būti galiojantis UUID.',

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

    'attributes' => [
        'name' => '"Pavadinimas"',
        'new-password' => '"Naujas slaptažodis"',
//        'trip_type' => '"Kelionės tipas"',
        'price' => '"Kaina"',
//        'people_count' => '"Žmonių kiekis"',
//        'transport_type' => '"Transporto tipas"',
//        'accommodation_type' => '"Apgyvendinimo tipas"',
//        'catering_type' => '"Maitinimo tipas"',
        'city' => '"Miestas"',
        'review' => '"Atsiliepimas"',
//        'rating' => '"Įvertinimas"',
//        'priceFrom' => '"Kaina nuo"',
//        'priceTo' => '"Kaina iki"',
//        'query' => 'paieškos terminas',
        'comment' => 'komentaras',
    ],
//    /*
//    |--------------------------------------------------------------------------
//    | Validation Language Lines
//    |--------------------------------------------------------------------------
//    |
//    | The following language lines contain the default error messages used by
//    | the validator class. Some of these rules have multiple versions such
//    | as the size rules. Feel free to tweak each of these messages here.
//    |
//    */
//
//    'accepted' => 'The :attribute must be accepted.',
//    'active_url' => 'The :attribute is not a valid URL.',
//    'after' => 'The :attribute must be a date after :date.',
//    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
//    'alpha' => 'The :attribute may only contain letters.',
//    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
//    'alpha_num' => 'The :attribute may only contain letters and numbers.',
//    'array' => 'The :attribute must be an array.',
//    'before' => 'The :attribute must be a date before :date.',
//    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
//    'between' => [
//        'numeric' => 'The :attribute must be between :min and :max.',
//        'file' => 'The :attribute must be between :min and :max kilobytes.',
//        'string' => 'The :attribute must be between :min and :max characters.',
//        'array' => 'The :attribute must have between :min and :max items.',
//    ],
//    'boolean' => 'The :attribute field must be true or false.',
//    'confirmed' => 'The :attribute confirmation does not match.',
//    'date' => 'The :attribute is not a valid date.',
//    'date_equals' => 'The :attribute must be a date equal to :date.',
//    'date_format' => 'The :attribute does not match the format :format.',
//    'different' => 'The :attribute and :other must be different.',
//    'digits' => 'The :attribute must be :digits digits.',
//    'digits_between' => 'The :attribute must be between :min and :max digits.',
//    'dimensions' => 'The :attribute has invalid image dimensions.',
//    'distinct' => 'The :attribute field has a duplicate value.',
//    'email' => 'The :attribute must be a valid email address.',
//    'ends_with' => 'The :attribute must end with one of the following: :values.',
//    'exists' => 'The selected :attribute is invalid.',
//    'file' => 'The :attribute must be a file.',
//    'filled' => 'The :attribute field must have a value.',
//    'gt' => [
//        'numeric' => 'The :attribute must be greater than :value.',
//        'file' => 'The :attribute must be greater than :value kilobytes.',
//        'string' => 'The :attribute must be greater than :value characters.',
//        'array' => 'The :attribute must have more than :value items.',
//    ],
//    'gte' => [
//        'numeric' => 'The :attribute must be greater than or equal :value.',
//        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
//        'string' => 'The :attribute must be greater than or equal :value characters.',
//        'array' => 'The :attribute must have :value items or more.',
//    ],
//    'image' => 'The :attribute must be an image.',
//    'in' => 'The selected :attribute is invalid.',
//    'in_array' => 'The :attribute field does not exist in :other.',
//    'integer' => 'The :attribute must be an integer.',
//    'ip' => 'The :attribute must be a valid IP address.',
//    'ipv4' => 'The :attribute must be a valid IPv4 address.',
//    'ipv6' => 'The :attribute must be a valid IPv6 address.',
//    'json' => 'The :attribute must be a valid JSON string.',
//    'lt' => [
//        'numeric' => 'The :attribute must be less than :value.',
//        'file' => 'The :attribute must be less than :value kilobytes.',
//        'string' => 'The :attribute must be less than :value characters.',
//        'array' => 'The :attribute must have less than :value items.',
//    ],
//    'lte' => [
//        'numeric' => 'The :attribute must be less than or equal :value.',
//        'file' => 'The :attribute must be less than or equal :value kilobytes.',
//        'string' => 'The :attribute must be less than or equal :value characters.',
//        'array' => 'The :attribute must not have more than :value items.',
//    ],
//    'max' => [
//        'numeric' => 'The :attribute may not be greater than :max.',
//        'file' => 'The :attribute may not be greater than :max kilobytes.',
//        'string' => 'The :attribute may not be greater than :max characters.',
//        'array' => 'The :attribute may not have more than :max items.',
//    ],
//    'mimes' => 'The :attribute must be a file of type: :values.',
//    'mimetypes' => 'The :attribute must be a file of type: :values.',
//    'min' => [
//        'numeric' => 'The :attribute turi būti mažiausiai :min.',
//        'file' => 'The :attribute must be at least :min kilobytes.',
//        'string' => 'The :attribute turi būti mažiausiai :min characters.',
//        'array' => 'The :attribute turi būti mažiausiai :min items.',
//    ],
//    'multiple_of' => 'The :attribute must be a multiple of :value.',
//    'not_in' => 'The selected :attribute is invalid.',
//    'not_regex' => 'The :attribute format is invalid.',
//    'numeric' => 'The :attribute must be a number.',
//    'password' => 'The password is incorrect.',
//    'present' => 'The :attribute field must be present.',
//    'regex' => 'The :attribute format is invalid.',
//    'required' => 'Šis laukas yra privalomas. Įkelkite savo darbo pavyzdį!',
//    'required_if' => 'The :attribute field is required when :other is :value.',
//    'required_unless' => 'The :attribute field is required unless :other is in :values.',
//    'required_with' => 'The :attribute field is required when :values is present.',
//    'required_with_all' => 'The :attribute field is required when :values are present.',
//    'required_without' => 'The :attribute field is required when :values is not present.',
//    'required_without_all' => 'The :attribute field is required when none of :values are present.',
//    'same' => 'The :attribute and :other must match.',
//    'size' => [
//        'numeric' => 'The :attribute must be :size.',
//        'file' => 'The :attribute must be :size kilobytes.',
//        'string' => 'The :attribute must be :size characters.',
//        'array' => 'The :attribute must contain :size items.',
//    ],
//    'starts_with' => 'The :attribute must start with one of the following: :values.',
//    'string' => 'The :attribute must be a string.',
//    'timezone' => 'The :attribute must be a valid zone.',
//    'unique' => 'The :attribute has already been taken.',
//    'uploaded' => 'The :attribute failed to upload.',
//    'url' => 'The :attribute format is invalid.',
//    'uuid' => 'The :attribute must be a valid UUID.',
//
//    /*
//    |------------------------------------------------
//
//    |--------------------------------------------------------------------------
//    |
//    | Here you may specify custom validation messages for attributes using the
//    | convention "attribute.rule" to name the lines. This makes it quick to
//    | specify a specific custom language line for a given attribute rule.
//    |
//    */
//
//    'custom' => [
//        'attribute-name' => [
//            'rule-name' => 'custom-message',
//        ],
//    ],
//
//    /*
//    |--------------------------------------------------------------------------
//    | Custom Validation Attributes
//    |--------------------------------------------------------------------------
//    |
//    | The following language lines are used to swap our attribute placeholder
//    | with something more reader friendly such as "E-Mail Address" instead
//    | of "email". This simply helps us make our message more expressive.
//    |
//    */
//
//    'attributes' => [],

];
