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


    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando :other for :value.',
    'required_if_accepted' => 'O campo :attribute é obrigatório quando :other for aceito.',
    'required_if_declined' => 'O campo :attribute é obrigatório quando :other for recusado.',
    'required_unless' => 'O campo :attribute é obrigatório, a menos que :other esteja em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando todos os valores :values estão presentes.',
    'required_without' => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos valores :values estiver presente.',

    'email' => 'O campo :attribute deve conter um endereço de e-mail válido.',
    'min' => [
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
    ],
    'max' => [
        'string' => 'O campo :attribute deve ter no máximo :max caracteres.',
    ],
    'confirmed' => 'A confirmação do campo :attribute não confere.',
    'unique' => 'O :attribute já está em uso.',
    'string' => 'O campo :attribute deve ser uma sequência de caracteres.',
    'array' => 'O campo :attribute deve ser uma lista.',
    'in' => 'O valor selecionado para :attribute é inválido.',
    'exists' => 'O valor selecionado para :attribute não é válido.',
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',

    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
        'username' => 'nome de usuário',
        'bio' => 'biografia',
        'genres' => 'gêneros favoritos',
    ],
];
