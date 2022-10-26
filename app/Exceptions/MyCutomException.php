<?php

namespace App\Exceptions;

use Exception;

class MyCutomException extends Exception
{   
    protected $title = "Custom Exeptiton";
    protected $code = '';
    protected $message = 'Message Exeptiton';

    public function render()
    {
        return response()->json([
            'title' => $this->title,
            'code' => $this->code,
            'message' => $this->message
        ]);
    }
}
