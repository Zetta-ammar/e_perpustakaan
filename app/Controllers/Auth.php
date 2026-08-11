<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

  public function login()
{
    $model = new \App\Models\AdminModel();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $admin = $model->where('username', $username)->first();

    if (!$admin) {
        return redirect()->back()->with('error', 'Username tidak ditemukan');
    }

    if (!password_verify($password, $admin['password'])) {
        return redirect()->back()->with('error', 'Password salah');
    }

    session()->set([
        'admin_id' => $admin['id'],
        'nama'     => $admin['nama'],
        'username' => $admin['username'],
        'login'    => true
    ]);

    return redirect()->to('/admin/dashboard');
}

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}