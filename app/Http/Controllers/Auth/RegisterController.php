<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\KategoriPengguna;
use RealRashid\SweetAlert\Facades\Alert;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login';

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $senaraiKategoriPengguna = KategoriPengguna::all();
        return view('auth.register', compact('senaraiKategoriPengguna'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $pattern = '/'.'(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&].{11,}'.'/';

        return Validator::make($data, [
            'nama_penuh' => 'required|string|max:255',
            'nama_singkatan' => 'required|string|max:10',
            'no_kad_pengenalan' => 'required|string|max:12|unique:pengguna',
            'email' => 'required|string|email|max:255|unique:pengguna',
            'no_telefon' => 'required|string|max:12',
            'kategori' => 'required',
            'alamat' => 'required|string|max:255',
            'password' => "required|confirmed|regex:$pattern",
            'captcha' => 'required|captcha'
        ],[
            'password.regex' => 'Katalaluan mesti mempunyai sekurangnya 12 aksara, 1 nombor, 1 huruf besar dan kecil serta 1 simbol'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nama_penuh' => $data['nama_penuh'],
            'nama_singkatan' => $data['nama_singkatan'],
            'no_kad_pengenalan' => $data['no_kad_pengenalan'],
            'email' => $data['email'],
            'no_telefon' => $data['no_telefon'],
            'alamat' => $data['alamat'],
            'kategori' => $data['kategori'],
            'status_perakui_sah' => 1,
            'katalaluan' => bcrypt($data['password']),
        ]);
        
        if($user){
            $user->attachRole('individu');
        }

        return $user;
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        Alert::success('','Pendaftaran berjaya. Sila log masuk menggunakan No Kad Pengenalan dan Katalaluan yang didaftarkan.');
    }
}
