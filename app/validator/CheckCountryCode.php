<?php


namespace app\validator;


use app\Services\HttpRequestService;
use Rakit\Validation\Rule;
use Rakit\Validation\Rules\Interfaces\ModifyValue;
use function DI\value;

define("COUNTRY_CODE_URL",'https://restcountries.eu/rest/v2/alpha/');
class CheckCountryCode extends Rule implements ModifyValue
{
//    private const COUNTRY_CODE_URL = 'https://restcountries.eu/rest/v2/alpha/';
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
        $url = COUNTRY_CODE_URL;
        $url .= $value;
        $response = $this->request->get($url);
        if ($response) {
            return $value;
        }
        return false;

    }
}