<?php

namespace App\Providers;



use App\Models\User;
use Firebase\JWT\JWT;
use illuminate\auth\genericuser;
use illuminate\http\request;
use illuminate\support\facades\gate;
use illuminate\support\serviceprovider;


class authserviceprovider extends serviceprovider
{
    /**
     * register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // here you may define how you wish users to be authenticated for your lumen
        // application. the callback which receives the incoming request instance
        // should return either a user instance or null. you're free to obtain
        // the user instance via an api token or any other method necessary.

        //buscar o usuário, encontrou ok- user autenticado
        //não encontrando iremos retornar null, e o lumen vai tratar esse erro
        //o resto será tratado na aplicação
        //aqui apenas definimos como será provida a autenticação para nosso sistema

        /*
         * o token será passado via header da requisição http
         * recebermos este bearer token via header;
         * decodificamos o token jwt com a lib firebase
         * retornamos os dados de autenticação, no caso o email do user
         */

        $this->app['auth']->viarequest('api', function (request $request) {
            if (!$request->hasHeader('authorization')) {
                return null;
            }
            $authorizationHeader = $request->header('Authorization');
            $token = \str_replace('Bearer ', '', $authorizationHeader);
            $dadosAutenticacao = JWT::decode($token, \env('JWT_KEY'), [
                'HS256',
            ]);

            //return new genericuser(['email' => $dadosAutenticacao]);

            return User::where('email', $dadosAutenticacao->email)->first();
        });
    }
}
