<?php

namespace App\Fieldtypes;

use Statamic\Fields\Fieldtype;

class FieldWithReplicator extends Fieldtype
{
    protected function configFieldItems(): array
    {
        return [
            'root_toggle' => [
                'type' => 'toggle',
                'display' => 'Root Toggle',
                'width' => 100,
            ],
            'sometimes_float_field' => [
                'type' => 'integer',
                'display' => 'Sometimes Float Field',
                'instructions' => '_(breaks on _`sometimes`_)_',
                'width' => 33,
                'validate' => [
                    'sometimes', // Not accounted for, due (I think) to pre-defined number rule in Floatval fieldtype: $rules = ['numeric'];
                    'required_if:root_toggle,true', // Seems to work fine.
                ],
                'if' => [
                    'root_toggle' => 'is true',
                ]
            ],
            'required_text_field' => [
                'type' => 'text',
                'display' => 'Required Text Field',
                'instructions' => '_(works as expected)_',
                'width' => 33,
                'validate' => 'required',
            ],
            'replicator_field' => [
                'type' => 'replicator',
                'display' => 'Replicator Field',
                'instructions' => 'The replicator, within FieldWithReplicator.',
                'collapse' => false,
                'max_sets' => 10,
                'sets' => [
                    'new_set_group' => [
                        'display' => 'New Entry',
                        'sets' => [
                            'entry' => [
                                'display' => 'Entry in Replicator',
                                'fields' => [
                                    [
                                        'handle' => 'custom_rep_must_be_true',
                                        'field' => [
                                            'type' => 'toggle',
                                            'display' => 'Rep. Must Be True to Show Text 👉',
                                            'instructions' => '_(works as expected)_',
                                            'width' => 100,
                                            'validate' => [
                                                'accepted',
                                            ],
                                        ]
                                    ],
                                    [
                                        'handle' => 'text_field_1',
                                        'field' => [
                                            'type' => 'text',
                                            'display' => 'Text Field #1',
                                            'instructions' => '<pre>required_if:custom_rep_must_be_true,true</pre>',
                                            'width' => 100,
                                            'if' => [
                                              'custom_rep_must_be_true' => 'is true',
                                            ],
                                            'validate' => [
                                                'required_if:{this}.custom_rep_must_be_true,true',
                                            ]
                                        ]
                                    ],
                                    [
                                        'handle' => 'percentage',
                                        'field' => [
                                            'append' => '%',
                                            'type' => 'float', // changing this to `text` "fixes" the issue, since text (presumably) has no pre-defined rules.
                                            'display' => 'Percentage',
                                            'instructions' => '_(does **not** work as expected—validation error for pre-defined `number` rule; `sometimes` not accounted for)_',
                                            // 'always_save' => false, // 👈 made no difference.
                                            'validate' => [
                                                'sometimes', // Not accounted for, due (I think) to pre-defined number rule in Floatval fieldtype: $rules = ['numeric'];
                                                'required_if:{this}.custom_rep_must_be_true,true', // Seems to work fine.
                                            ],
                                            'if' => [
                                                'custom_rep_must_be_true' => 'is true',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    public function defaultValue()
    {
        return null;
    }

    public function preProcess($data)
    {
        return $data;
    }

    public function process($data)
    {
        return $data;
    }
}
