<?php


namespace App\Http\Controllers;



use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{

    /*
     * Neste método iremos codificar o valor recebido pela requisição
     * que no caso é o email do user
     *
     *
     */
    public function gerarToken(Request $request)
    {
        //validando a requição com o método validate do Controller
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email)->first();


        if (is_null($usuario) || !Hash::check($request->password, $usuario->password))
        {
            return response()->json('Usuário ou senha inválidos', 401); //status de não autorizado;
        }

        $token = JWT::encode(['email' => $request->email], env('JWT_KEY'));

        return [
            'access_token' => $token
        ];
    }
}
