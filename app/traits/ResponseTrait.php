<?php

namespace app\traits;


use app\Core\Response;


trait ResponseTrait
{
    private Response $response;

    public function __construct()
    {

        $this->response = new Response();
    }

    protected function respondWithSuccessContent(array $data)
    {

        echo json_encode(["success" => true, "data" => $data, 'status' => Response::HTTP_OK],);
    }

    protected function respondWithNoSuccess(int $statusCode, array $data = [], string $message = null)
    {

        $status = $this->response->setStatusCode($statusCode);
        echo json_encode(["success" => false, "data" => $data, 'status' => $status->getStatusCode(), "message" => $message ? $message : $status->getStatusText()]);
    }

    protected function respondWithSuccess(string $message)
    {

        echo json_encode(["success" => true, 'message' => $message, 'status' => Response::HTTP_OK]);
    }


}