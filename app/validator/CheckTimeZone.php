<?php


namespace app\validator;


use app\Services\HttpRequestService;
use Rakit\Validation\Rule;
use Rakit\Validation\Rules\Interfaces\ModifyValue;

class CheckTimeZone extends Rule implements ModifyValue
{
    /**
     * @var HttpRequestService
     */
    private HttpRequestService $request;

    public function __construct()
    {
        $this->request = new HttpRequestService();
    }

    public function check($value): bool
    {
        return $value;
    }

    public function modifyValue($value)
    {
        try {
            new \DateTimeZone($value);
            return $value;

        } catch (\Exception$e) {
            return false;
        }

    }
}