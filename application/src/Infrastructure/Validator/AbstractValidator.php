<?php

declare(strict_types=1);

namespace App\Infrastructure\Validator;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractValidator implements ValidatorInterface
{
    protected array $request;
    private array $errors;

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->errors = [];
        $this->handleValidation();
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function addError(string $param, string $message): void
    {
        $this->errors[] = sprintf('[ %s ] %s', $param, $message);
    }

    protected function addErrorParamRequired(string $param): void
    {
        $this->addError($param, 'param is required');
    }

    protected function hasValue(string $param): bool
    {
        return array_key_exists($param, $this->request);
    }

    protected function getValue(string $param)
    {
        return $this->request[$param];
    }

    abstract protected function handleValidation(): void;
}
