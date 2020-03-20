<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Log;
use Agent;
use App\Models\Log as LogModel;


class OperationLog
{

    public function handle(Request $request, Closure $next)
    {

        $response = $next($request);

        if (app()->environment('local')) {
            
            $admin = Auth::user();
            // 数据处理
            $admin_id = $admin ? $admin->id : 0;
            $admin_name = $admin ? $admin->name : "空";
            $method = $request->method();
            $uri = $request->path();

            // 1.过滤 uris(不记录日志的 uri)
            $guarded_uris = [
                'log',
            ];

            if(in_array($uri, $guarded_uris)){
                //return true;
                return $response;
            }
     
            // 2.过滤 uris + method(某些 uri 的 get 和 post 一致，也需要过滤)
            $guards_get_method_uris = [
                'new/create',
            ];
            
            if(in_array($uri, $guards_get_method_uris)){
                //return true;
                return $response;
            }

            // 2.过滤 params(日志中不记录密码等私密信息)
            $guarded_params = [
                'password',
            ];
            $params = $request->all();
            $params = array_filter($params, function ($key) use ($guarded_params, $response) {

                return $response;
                //return !in_array($key, $guarded_params);

            }, ARRAY_FILTER_USE_KEY);

            $params = json_encode($params, JSON_UNESCAPED_UNICODE);

            $ip = $request->getClientIp();

            $user_agent = Agent::getUserAgent();

            //判断操作
            switch($uri){
                case 'new':
                    $content = '新闻列表';
                    break;
 
                case 'new/create':
                    $content = '添加';
                    break;
 
                default:
                    $content = '其他操作';
                    break;
            }

            //日志信息
            $admin_log_data = [
                'admin_id' => $admin_id,
                'method' => $method,
                'admin_name' => $admin_name,
                'uri' => $uri,
                'params' => $params,
                'content' => $content,
            ];

            //写入日志信息
            Log::info($admin_log_data);

            //需要优化

            //写入数据库
            $data = [
                'admin_id' => $admin_id,
                'method' => $method,
                'admin_name' => $admin_name,
                'url' => env("APP_URL") ."/". $uri,
                'params' => $params,
                'ip' => $ip,
                'content' => $content,
                'user_agent' => $user_agent,
            ];

            //Log::info($data);
            
            LogModel::create($data);

        }

        return $response;
    }

}