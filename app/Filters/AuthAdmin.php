<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Config\Services;
use Firebase\JWT\Key;
use App\Filters\Exception;

class AuthAdmin implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $key = getenv('TOKEN_SECRET');
        $header = $request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return Services::response()
                            ->setJSON(['msg' => 'Token Required'])
                            ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        $token = explode(' ', $header)[1];
 
        try {
            JWT::decode($token, new key($key, 'HS512'));
            JWT::decode($token, new key($key, 'HS512'));
            try {
                $decoded = JWT::decode($token, new key($key, 'HS512'));
                $response = [
                    'id' => $decoded->uid, 'email' => $decoded->email, 'role' => $decoded->role
                ];
                if ($response['role']!== 'admin')
                {
                    throw new Exception("You're not admin");
                }
            } catch (Exception $e) {
                return Services::response()
                            ->setJSON(['msg' => 'Youre not admin'])
                            ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
            }
        } catch (\Throwable $th) {
            return Services::response()
                            ->setJSON(['msg' => 'Youre not admin'])
                            ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}