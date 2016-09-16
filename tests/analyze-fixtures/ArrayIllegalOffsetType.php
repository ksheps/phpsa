<?php

namespace Tests\Compiling\Statements;

class ArrayIllegalOffsetType
{
    /**
     * @return array
     */
    public function arrayDeclarationWithObject()
    {
        return [
            'foo' => 'bar',
            new \stdClass => 'biz',
        ];
    }

    /**
     * @return array
     */
    public function arrayDeclarationWithAVariableContainingAnObject()
    {
        $variable = new \DateTime();

        return [
            0 => 42,
            $variable => 43,
        ];
    }

    /**
     * @return array
     */
    public function arrayAssignationWithObject()
    {
        $array = [];
        $array[new \DateTime()] = 'foo';

        return $array;
    }

    /**
     * @return array
     */
    public function arrayAssignationWithAVariableContainingAnObject()
    {
        $variable = new \DateTime();

        $array = [];
        $array[$variable] = 'foo';

        return $array;
    }

    /**
     * @return array
     */
    public function validArray()
    {
        return [
            '42' => 'another truth'
        ];
    }
}
?>
----------------------------
[
    {
        "type":"array.illegal_offset_type",
        "message":"Illegal array offset type stdClass.",
        "file":"ArrayIllegalOffsetType.php",
        "line":13
    },
    {
        "type":"array.illegal_offset_type",
        "message":"Illegal array offset type DateTime for key $variable.",
        "file":"ArrayIllegalOffsetType.php",
        "line":26
    },
    {
        "type":"array.illegal_offset_type",
        "message":"Illegal array offset type DateTime.",
        "file":"ArrayIllegalOffsetType.php",
        "line":36
    },
    {
        "type":"array.illegal_offset_type",
        "message":"Illegal array offset type DateTime for key $variable.",
        "file":"ArrayIllegalOffsetType.php",
        "line":49
    }
]
