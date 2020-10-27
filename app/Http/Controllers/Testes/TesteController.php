<?php

namespace App\Http\Controllers\Testes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function testeDashboard() {
        return 'Teste Controller Dashboard';
    }
    public function testeFinanca() {
        return 'Teste Controller Financeiro';
    }
    public function testeProduto() {
        return 'Teste Controller Produto';
    }
}
