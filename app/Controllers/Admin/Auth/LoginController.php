<?php

namespace App\Controllers\Admin\Auth;

use Core\Facedas\Alerts;
use Core\Facedas\Auth;
use Core\Route;
use Core\Validator;

class LoginController
{

    public function __construct()
    {
        //
    }

    /** Index page | GET: /
     * @return mixed
     */
    public function index()
    {
        return view('auth.login', ['title' => 'Giriş Yap'], 'auth.main');
    }

    /** Show page | GET: /id
     * @param integer $id
     * @return mixed
     */
    public function show($id)
    {
        abort(404);
    }

    /** Create page | GET: /create
     * @return mixed
     */
    public function create()
    {
        abort(404);
    }

    /** Edit page | GET: /id/edit
     * @param integer $id
     * @return mixed
     */
    public function edit($id)
    {
        abort(404);
    }

    /** POST page | POST: /
     * @return mixed
     */
    public function store()
    {
        $validated = Validator::validate($_REQUEST, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password'], 'status' => 1])) redirect(Route::$preURL);
        else Alerts::danger('E-mail veya Şifre yanlış.');

        back();
    }

    /** Update page | PATCH/PUT: /id
     * @return mixed
     */
    public function update($id)
    {
        abort(404);
    }

    /** Delete page | DELETE: /id
     * @return mixed
     */
    public function delete($id)
    {
        abort(404);
    }
}
