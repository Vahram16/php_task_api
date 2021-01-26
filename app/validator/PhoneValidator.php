<?php


namespace app\validator;

use app\Services\PhoneBookService;
use Rakit\Validation\Validator;

class PhoneValidator
{
    /**
     * @var Validator
     */
    private Validator $validator;
    /**
     * @var PhoneBookService
     */
    private $phoneBookService;

    public function __construct()
    {

        $this->validator = new Validator();
        $this->phoneBookService = 21;
    }

    public function createPhone(array $data)
    {
        $validated = $this->validator->make($data, [

            'name' => 'required',
            'password' => 'required|min:6'

        ]);
        $validated->validate();

        if ($validated->fails()) {

            return $validated->errors();
        }

    }

    public function getById(array $data)
    {

        $validated = $this->validator->make($data, [
            'id' => 'required',
        ]);
        $validated->validate();
        return $validated;
    }

    public function create(array $data)
    {


        $validated = $this->validator->make($data, [

            'firstname' => 'required|alpha',
            'lastname' => ['alpha'],
            'phone_number' => ['required', isset($data['phone_number']) ? new CheckNumber() : false],
            'country_code' => [isset($data['country_code']) ? new CheckCountryCode() : false],
            'timezone' => [isset($data['timezone']) ? new CheckTimeZone() : false]

        ]);
        $validated->validate();
        return $validated;


    }

    public function update(array $data)
    {


        $validated = $this->validator->make($data, [

            'id' => ['required'],
            'firstname' => ['alpha'],
            'lastname' => ['alpha'],
            'phone_number' => [isset($data['phone_number']) ? new CheckNumber() : false],
            'country_code' => [isset($data['country_code']) ? new CheckCountryCode() : false],
            'timezone' => [isset($data['timezone']) ? new CheckTimeZone() : false]


        ]);
        $validated->validate();
        return $validated;

    }

    public function delete(array $data)
    {
        $validated = $this->validator->make($data, [

            'id' => ['required|integer']

        ]);
        $validated->validate();
        return $validated;

    }

}