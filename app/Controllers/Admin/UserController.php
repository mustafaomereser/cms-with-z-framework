<?php

namespace App\Controllers\Admin;

use App\Models\User;
use Core\Facedas\Alerts;
use Core\Facedas\Auth;
use Core\Facedas\Response;
use Core\Validator;

class UserController
{

    public function __construct()
    {
        $this->user = new User;
    }

    /** Index page | GET: /
     * @return mixed
     */
    public function index()
    {
        return view('user.settings', ['title' => _l('admin.pages.user.settings.title')], 'main');
    }

    /** Show page | GET: /username
     * @param string $username
     * @return mixed
     */
    public function show($username)
    {
        $user = $this->user->where('username', '=', $username)->first(true);
        if (!isset($user->id)) abort(404);

        return view('user.profile', ['title' => $user->username, 'user' => $user], 'main');
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
        abort(404);
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
        Validator::validate($_REQUEST, [
            'confirm' => ['required']
        ]);

        if (Auth::user()['id'] != 1) {
            $status = 1;
            $this->user->where('id', '=', Auth::user()['id'])->update(['status' => 0]);
            Auth::logout();
            Alerts::success(_l('admin.pages.user.settings.messages.deactive-account.success'));
        } else {
            Alerts::danger(_l('admin.pages.user.settings.messages.deactive-account.cannot'));
        }

        return Response::json(array_merge(Alerts::get(), [$status ?? 0]));
    }
}
