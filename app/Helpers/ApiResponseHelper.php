<?php
/**
 * Created by PhpStorm.
 * User: geekman
 * Date: 2019/10/6
 * Time: 8:03 PM
 */

namespace App\Helpers;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;
use Response;

trait ApiResponseHelper
{
    /**
     * @var int
     */
    protected $httpCode = FoundationResponse::HTTP_OK;

    /**
     * @var array
     */
    protected $httpHeader = [];

    /**
     * @return mixed
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * @param $httpCode
     * @return $this
     */
    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;
        return $this;
    }


    /**
     * @return array
     */
    public function getHttpHeader()
    {
        return $this->httpHeader;
    }

    /**
     * @param $httpHeader
     * @return $this
     */
    public function setHttpHeader($httpHeader)
    {
        $this->httpHeader = $httpHeader;
        return $this;
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function restSuccess($data, $message = "success"){
        $res['data'] = [];
        if(is_object($data)){
            $res['data'] = $data->toArray();
            return $this->responsed('10000', $message, $res);
        }

        if(is_array($data)){
            $res['data'] = $data;
            return $this->responsed('10000', $message, $res);
        }
        return $this->responsed('10000', $message, $res);
        //$this->setHttpCode(FoundationResponse::HTTP_OK);

    }

    /**
     * @param $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = [], $message = "success"){
        //$this->setHttpCode(FoundationResponse::HTTP_OK);
        $data = ['data' => $data ];
        return $this->responsed('10000', $message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function badRequestError($message = '请求错误', $data = [])
    {
        //$this->setHttpCode(FoundationResponse::HTTP_BAD_REQUEST);
        $data = [ 'data' => $data ];
        return $this->responsed('20000', $message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function noLoginError($message = '未登录', $data = []){
        //$this->setHttpCode(FoundationResponse::HTTP_UNAUTHORIZED);
        $data = ['data' => $data ];
        return $this->responsed('20001', $message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function tokenExpiredError($data = [], $message = '登录过期'){
        //$this->setHttpCode(FoundationResponse::HTTP_UNAUTHORIZED);
        $data = [ 'data' => $data ];
        return $this->responsed('20002', $message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbiddenError($message = '权限禁止访问', $data = [])
    {
        //$this->setHttpCode(FoundationResponse::HTTP_FORBIDDEN);
        $data = ['data' => $data ];
        return $this->responsed('20003',$message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFondError($message = '未找到相关资源信息', $data = [])
    {
        //$this->setHttpCode(FoundationResponse::HTTP_NOT_FOUND);
        $data = ['data' => $data ];
        return $this->responsed('20004',$message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateError($code='20005',$message = "参数错误",$data = []){
        //$this->setHttpCode(FoundationResponse::HTTP_UNPROCESSABLE_ENTITY);
        $data = [ 'data' => $data ];
        return $this->responsed($code, $message, $data);
    }

    /**
 * @param array $data
 * @param string $message
 * @return \Illuminate\Http\JsonResponse
 */
    public function internalError($message = "系统错误", $data = [])
    {
        //$this->setHttpCode(FoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        $data = ['data' => $data ];
        return $this->responsed('20006', $message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function CommonError($message = "系统错误",$code=50006, $data = [])
    {
        $data = ['data' => $data ];
        return $this->responsed($code, $message, $data);
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function signError($message = "sign check error", $data = [])
    {
        //$this->setHttpCode(FoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        $data = ['data' => $data ];
        return $this->responsed('20007', $message, $data);
    }

    /**
     * @param string $code
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function responsed($code, $message, $data = [])
    {
        $response = [
            'code' => $code,
            'message' => $message,
        ];
        $response = array_merge($response,$data);
        return Response::json($response,$this->getHttpCode(),$this->getHttpHeader());
    }

}