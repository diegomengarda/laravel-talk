<?php

namespace App\Exceptions;

class ApiException extends \Exception
{
    public function __construct(
        string            $message,
        int               $code = 500,
        ?\Exception       $previous = null,
        protected ?string $internalCode = null,
    )
    {
        parent::__construct($message, $code, $previous);
    }

    public function getInternalCode(): ?string
    {
        return $this->internalCode;
    }

    public static function GenericError(?string $message = null)
    {
        throw new self($message, 500, null, 45000);
    }
}
