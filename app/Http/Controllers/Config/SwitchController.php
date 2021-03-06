<?php
/**
 * Created by PhpStorm.
 * User: zxy
 * Date: 2019/4/28
 * Time: 15:44
 */
namespace app\Http\Controllers\Config;
use app\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;

class SwitchController extends Controller
{
    /**
     * @api {get} /switch/reboot 1、系统重启
     * @apiSampleRequest  /switch/reboot
     * @apiGroup ConfigSwitch
     */
    public function reboot()
    {
        exec("/sbin/reboot");
        $this->responseSend();
    }
    /**
     * @api {get} /switch/shutdown 2、系统关机
     * @apiSampleRequest  /switch/shutdown
     * @apiGroup ConfigSwitch
     */
    public function shutdown()
    {
        exec("/sbin/poweroff");
        $this->responseSend();
    }
}