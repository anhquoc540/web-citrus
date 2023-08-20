<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Log;
use AlException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    const STATUS_SUCCESS = true;
    const STATUS_FAILED = false;

    private $_statusCode = 200; // HTTP RESPONSE STATUS CODE, DEFAULT = 200
    private $_status;
    private $_code;
    private $_message;
    private $_pagination = null;
    private $_data;
    private $_view;
    private $_errors = [];
    private $_execute_start;

    /**
     * @param $code
     *
     * @return $this
     */
    protected function setStatusCode($statusCode)
    {
        $this->_statusCode = $statusCode;

        return $this;
    }

    /**
     * @param $code
     *
     * @return $this
     */
    protected function setCode($code)
    {
        $this->_code = $code;

        return $this;
    }

    /**
     * @param $status
     *
     * @return $this
     */
    protected function setStatus($status)
    {
        $this->_status = $status;

        return $this;
    }

    /**
     * @param $message
     *
     * @return $this
     */
    protected function setMessage($message)
    {
        $this->_message = $message;

        return $this;
    }
    /**
     * @param $data
     *
     * @return $this
     */
    protected function setView($data)
    {
        $this->_view = $data;
        return $this;
    }
    /**
     * @param $data
     *
     * @return $this
     */
    protected function setData($data)
    {
        if (array_key_exists('pagination', (array) $data)) {
            if (array_key_exists('title', (array) $data)) {

                $this->_data = [
                    'dataRow' => $data['data'],
                    'nameColumnHeader' => $data['title'],
                ];
            } else {
                $this->_data = $data['data'];
            }

            $this->_pagination = $data['pagination'];

        } else {
            if (array_key_exists('title', (array) $data)) {

                $this->_data = [
                    'dataRow' => $data['data'],
                    'nameColumnHeader' => $data['title'],
                ];
            } else {
                $this->_data = $data;
            }

        }
        return $this;
    }

    protected function setPagination($pagination)
    {
        $this->_pagination = $pagination;

        return $this;
    }
    protected function setErrors($error)
    {
        $this->_errors = $error;

        return $this;
    }

    /**
     * @return Log
     */
    public function getLogger($log)
    {
        return Log::channel('api')->info($log);
    }

    /***
     * End point return data
     *
     * @return JsonResponse
     */
    public function response()
    {
        $data = [
            'status' => $this->_status,
            'code' => $this->_code,
            'message' => $this->_message,
            'pagination' => $this->_pagination,
            'data' => $this->_data,
            'errors' => $this->_errors,
            'execute_time' => microtime(true) - $this->_execute_start,
        ];

        return response()->json($data, $this->_statusCode);
    }

    public function sendSuccessData($data = null, $message = null)
    {
        $this->_execute_start = microtime(true);

        return $this->setStatus(self::STATUS_SUCCESS)
            ->setMessage(
                $message
            )
            ->setCode(
                200
            )
            ->setData(
                $data
            )
            ->response(
            );
    }

    public function sendErrorData($code = null, $message = null)
    {
        if ($code) {
            $this->setCode($code);
        }
        if ($message) {
            $this->setMessage($message);
        }

        return $this->setStatus(self::STATUS_FAILED)
            ->response(
            );
    }

    public function authenticateSuccess($data = null, $token = null, $expiration = 0)
    {
        // Prepare return data
        $response = [
            'status' => self::STATUS_SUCCESS,
            'code' => $this->_statusCode,
            'message' => trans('response.login'),
            'token' => $token,
            'token_type' => "Bearer",
            'expiration' => $expiration,
            'data' => $data,
        ];

        return response()->json($response, $this->_statusCode);
    }
    public function authenticateFalse($message = null)
    {
        $data = [
            'status' => self::STATUS_FAILED,
            'code' => 401,
            'message' => $message,
            'data' => null,
        ];
        return response()->json($data, 401);
    }

    public function exceptions($exception)
    {
        // dd($exception);
        $this->_execute_start = microtime(true);

        // if ($exception instanceof ValidationException) {
        //     $this->getLogger($exception->errors());
        //     $array_message = $exception->errors();
        //     $message = '';
        //     foreach ($array_message as $value) {
        //         $message .= $value[0] . '. ';
        //     }
        //     return $this->setErrors($array_message)->setMessage($message)->setStatusCode(422)->setCode(422)->sendErrorData();
        // }
        // if ($exception instanceof ModelNotFoundException) {

        //     $this->getLogger($exception->getMessage());
        //     $message = $exception->getMessage();
        //     return $this->setMessage($message)->setStatusCode(422)->setCode(422)->sendErrorData();
        // }
        if ($exception instanceof InvalidArgumentException || $exception instanceof ErrorException || $exception instanceof \Illuminate\Contracts\Container\BindingResolutionException) {
            // dd($exception);
            $this->getLogger($exception->getMessage());
            $error = [
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTrace()
            ];
            $message = $exception->getMessage()??"";
            Log::channel('errors')->debug($message);
            Log::channel('errors')->debug($error);
            if (!config('app.debug')) {
                $message = trans('messages.GENERAL_001');
                $error = [];
            }
            return $this->setMessage($message)->setErrors($error)->setStatusCode(500)->setCode(500)->sendErrorData();
        }
        if ($exception->status == 422) {
            $this->getLogger($exception->errors());
            $array_message = $exception->errors();
            $message = '';
            foreach ($array_message as $value) {
                $message .= $value[0] . '. ';
            }
            $status = $exception->msg_code ?? $exception->status;
            $message = $exception->customMessage ?? $message;
            return $this->setErrors($array_message)->setMessage($message)->setStatusCode(422)->setCode($status)->sendErrorData();
        }

        $array_message = $exception->errors();

        return $this->setErrors($array_message)->setMessage($exception->getMessage())->setStatusCode(422)->setCode($exception->status)->sendErrorData();
    }

}
