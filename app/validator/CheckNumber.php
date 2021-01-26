<?php


namespace app\validator;

use Rakit\Validation\Rule;
use Rakit\Validation\Rules\Interfaces\ModifyValue;
use app\Services\HttpRequestService;

define('NUM_VERIFY', '740eca2b2b85b97d2f8466513a87407c');
define('NUM_VERIFY_URL', 'http://apilayer.net/api/validate');

class CheckNumber extends Rule implements ModifyValue
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
        $params = ['query' => ['number' => $value, 'form' => 1, 'access_key' => NUM_VERIFY]];
        $response = $this->request->get(NUM_VERIFY_URL, $params);
        if ($response && $response['valid'] == true) {
            return $value;
        }
        return false;


    }
}