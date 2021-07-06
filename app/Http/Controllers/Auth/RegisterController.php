<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\GestorMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], ##'confirmed'
            'last_name' => ['string', 'max:255'],
            'last_name2' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            /*'ine' => ['required', 'string', 'max:255'],
            'proof_of_address' => ['required', 'string', 'max:255'],
            'rfc' => ['required', 'string', 'max:255'],*/
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_name' => $data['last_name'],
            'last_name2' => $data['last_name2'],
            'date_of_birth' => $data['date_of_birth'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'state' => $data['state'],
            'zip_code' => $data['zip_code'],
            /*'ine' => $data['ine'],
            'proof_of_address' => $data['proof_of_address'],
            'rfc' => $data['rfc'],*/
        ]);
        $user->roles()->attach(Role::where('name', 'premium')->first());

        $variablesCorreo['subject'] = "Correo Informativo";
        $variablesCorreo['user'] = $user;
        $variablesCorreo['name_contacto'] = $user->name;
        $variablesCorreo['asunto_contacto'] = "Mensaje de Prueba";
        $variablesCorreo['mensaje_contacto'] = "Este es un cuerpo de mensaje que quiero enviar";
        $variablesCorreo['email_contacto'] = "Pos te lo envíe desde aca: uncorreo@dominio.com";                             
    

        \Mail::to($user->email)->send(new GestorMail($variablesCorreo));

        return $user;
    }
}
