<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPerfil;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            'auth',
            'permission:home'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $info_pessoa = Pessoa::where('user_id', '=', Auth::user()->id)->first();
        $tipo_perfil = TipoPerfil::where('id', '=', $info_pessoa->tipo_perfil_id)->first();

        return view('home', [
            'info_pessoa' => $info_pessoa,
            'tipo_perfil' => $tipo_perfil,
        ]);
    }
}
