<?php
/**
 * Created by PhpStorm.
 * User: geekman
 * Date: 2019/10/6
 * Time: 8:41 PM
 */

namespace App\Helpers;


use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class ExceptionReport
{
    use ApiResponse;

    /**
     * @var Exception
     */
    public $exception;
    /**
     * @var Request
     */
    public $request;

    /**
     * @var
     */
    protected $report;


    /**
     * ExceptionReport constructor.
     * @param Request $request
     * @param Exception $exception
     */
    function __construct(Request $request, Exception $exception)
    {
        $this->request = $request;
        $this->exception = $exception;
    }


    /**
     * @var array
     */
    public $doReport = [
        AuthenticationException::class => ['未授权',401],
        ModelNotFoundException::class => ['该模型未找到',404],
        AuthorizationException::class => ['没有此权限',403],
        ValidationException::class => [],
        UnauthorizedHttpException::class=>['未登录或登录状态失效',422],
        TokenInvalidException::class=>['token不正确',400],
        NotFoundHttpException::class=>['没有找到该页面',404],
        MethodNotAllowedHttpException::class=>['访问方式不正确',405],
        QueryException::class=>['参数错误',401],
    ];


    /**
     * @return bool
     */
    public function shouldReturn(){

        if (! ($this->request->wantsJson() || $this->request->ajax())){
            return false;
        }

        foreach (array_keys($this->doReport) as $report){

            if ($this->exception instanceof $report){

                $this->report = $report;
                return true;
            }
        }

        return false;

    }


    /**
     * @param Exception $e
     * @return static
     */
    public static function make(Exception $e){

        return new static(\request(),$e);
    }

    /**
     * @return mixed
     */
    public function report(){

        $message = $this->doReport[$this->report];

        return $this->failed($message[0],$message[1]);

    }


}