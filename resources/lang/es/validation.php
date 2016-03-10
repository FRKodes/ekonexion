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

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => ":attribute no es una URL válida.",
	"after"                => ":attribute debe ser una fecha después de :date.",
	"alpha"                => ":attribute debe contener sólo letras.",
	"alpha_dash"           => ":attribute debe contener sólo letras, números y guiones.",
	"alpha_num"            => ":attribute debe contener sólo letras y números.",
	"array"                => ":attribute debe ser un arreglo.",
	"before"               => ":attribute debe ser una fecha antes de :date.",
	"between"              => [
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => "El campo :attribute debe ser true o false.",
	"confirmed"            => ":attribute confirmación no coincide.",
	"date"                 => ":attribute no es una fecha válida.",
	"date_format"          => ":attribute no coincide con el formato :format.",
	"different"            => ":attribute y :other deben ser diferentes.",
	"digits"               => ":attribute debe tener :digits digitos.",
	"digits_between"       => ":attribute debe tener entre :min y :max digitos.",
	"email"                => ":attribute debe ser un email válido.",
	"filled"               => "El campo :attribute requerido.",
	"exists"               => "El :attribute seleccionado es inválido.",
	"image"                => ":attribute debe ser una imagen.",
	"in"                   => "El :attribute seleccionado no es válido.",
	"integer"              => ":attribute debe ser un entero.",
	"ip"                   => ":attribute debe ser una IP válida.",
	"max"                  => [
		"numeric" => ":attribute no debe ser más grande que :max.",
		"file"    => ":attribute no debe ser más grande que :max kilobytes.",
		"string"  => ":attribute no debe ser más grande que :max caracteres.",
		"array"   => ":attribute no debe tener más de :max ítems.",
	],
	"mimes"                => ":attribute debe ser un archivo tipo: :values.",
	"min"                  => [
		"numeric" => ":attribute debe tener al menos :min.",
		"file"    => ":attribute debe tener al menos :min kilobytes.",
		"string"  => ":attribute debe tener al menos :min caracteres.",
		"array"   => ":attribute debe tener al menos :min ítems.",
	],
	"not_in"               => ":attribute no es válido.",
	"numeric"              => ":attribute debe ser un número.",
	"regex"                => ":attribute tiene un formato no válido.",
	"required"             => ":attribute es requerdio.",
	"required_if"          => ":attribute es requerdio cuando :other es :value.",
	"required_with"        => ":attribute es requerdio cuando :values está presente.",
	"required_with_all"    => ":attribute es requerdio cuando :values está presente.",
	"required_without"     => ":attribute es requerdio cuando :values no está presente.",
	"required_without_all" => ":attribute es requerdio cuando ninguno de :values están presentes.",
	"same"                 => ":attribute y :other deben coincidir.",
	"size"                 => [
		"numeric" => ":attribute debe ser :size.",
		"file"    => ":attribute debe tener :size kilobytes.",
		"string"  => ":attribute debe tener :size characters.",
		"array"   => ":attribute debe contener :size ítems.",
	],
	"unique"               => "The :attribute ya existe.",
	"url"                  => "El formato de :attribute no es válido.",
	"timezone"             => ":attribute debe ser una zona válida.",

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
