<?php

namespace app\Http\Controllers\Api;

use app\Core\Application;
use app\Core\Controller;
use app\Services\PhoneBookService;
use app\validator\PhoneValidator;

class PhoneController extends Controller
{
    /**
     * @var PhoneValidator
     */
    private PhoneValidator $validator;
    /**
     * @var PhoneBookService
     */
    private PhoneBookService $phoneBookService;
    /**
     * @var Application
     */
    private Application $app;

    public function __construct()
    {
        parent::__construct();
        $this->validator = new PhoneValidator();
        $this->phoneBookService = new PhoneBookService();
        $this->app = Application::createInstance();

    }


    public function getBookPhones()
    {
        $v = $this->validator->createPhone(['name' => "aa", 'password' => '12345']);
        isset($v) ? $this->respondWithNoSuccess(400, $v->toArray()) : null;


    }

    public function getAll()
    {
        $this->respondWithSuccessContent($this->phoneBookService->all());
    }

    public function getById()
    {
        $validated = $this->validator->getById($this->app->request->getBody());
        if ($validated->fails()) {
            $this->respondWithNoSuccess(400, $validated->errors()->toArray());
            exit();
        }
        $phoneBook = $this->phoneBookService->getById($validated->getValidData()['id']);
        $phoneBook ? $this->respondWithSuccessContent([$phoneBook]) : $this->respondWithNoSuccess(500, [], 'no such id');

    }

    public function create()
    {

        $validated = $this->validator->create($this->app->request->getBody());
        if ($validated->fails()) {
            $this->respondWithNoSuccess(400, $validated->errors()->toArray());
            exit();
        }
       $result = $this->phoneBookService->create($validated->getValidData());
        $this->respondWithSuccessContent([$result]);


    }

    public function update()
    {
        $validated = $this->validator->update($this->app->request->getBody());
        if ($validated->fails()) {
            $this->respondWithNoSuccess(400, $validated->errors()->toArray());
            exit();
        };

        if (sizeof(array_filter($validated->getValidData())) <= 1) {
            $this->phoneBookService->update(array_filter($validated->getValidData()));
            $this->respondWithNoSuccess(400, [], 'No content');
            exit();
        }
        $result = $this->phoneBookService->update(array_filter($validated->getValidData()));
        $result ? $this->respondWithSuccess('Item updated successfully') : $this->respondWithNoSuccess(400, [], 'No such item');


    }

    public function delete()
    {

        $validated = $this->validator->update($this->app->request->getBody());
        if ($validated->fails()) {
            $this->respondWithNoSuccess(400, $validated->errors()->toArray());
            exit();
        };
        $result = $this->phoneBookService->delete($validated->getValidData());
        $result ? $this->respondWithSuccess('Item deleted successfully') : $this->respondWithNoSuccess(400, [], 'No such item');

    }


}