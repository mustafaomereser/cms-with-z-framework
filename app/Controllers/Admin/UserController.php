<?php

namespace App\Controllers\Admin;

use App\Models\User;
use Core\Crypter;
use Core\Facedas\Alerts;
use Core\Facedas\Auth;
use Core\Facedas\Response;
use Core\Helpers\File;
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


    private function updateProfile()
    {
        $validate = Validator::validate($_REQUEST, [
            'name' => ['required'],
            'surname' => ['required'],
        ]);

        if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
            $validate['avatar'] = File::upload("/admin_assets/media/avatars", $_FILES['avatar'], ['accept' => ['png', 'jpg', 'jpeg', 'gif']]);
            Alerts::success(_l('admin.pages.user.settings.messages.change.avatar-updated'));
        }

        $this->user->where('id', '=', Auth::user()['id'])->update($validate);
        Alerts::success(_l('admin.pages.user.settings.messages.change.settings-updated'));

        return back();
    }

    /** POST page | POST: /
     * @return mixed
     */
    public function store()
    {
        if (isset($_REQUEST['name'])) return $this->updateProfile();

        $validate = Validator::validate($_REQUEST, [
            'currentpassword' => ['required'],
        ]);

        if (isset($_REQUEST['email'])) $validate = array_merge($validate, Validator::validate($_REQUEST, [
            'email' => ['required', 'email']
        ]));

        if (isset($_REQUEST['password'])) {
            $validate = array_merge($validate, Validator::validate($_REQUEST, [
                'password' => ['required', 'same:confirm-password', 'min:8'],
                'confirm-password' => ['required']
            ]));
            $validate['password'] = Crypter::encode($validate['password']);
            unset($validate['confirm-password']);
        }

        if (Auth::user()['password'] == Crypter::encode($validate['currentpassword'])) {
            unset($validate['currentpassword']);
            $status = 1;
            $this->user->where('id', '=', Auth::user()['id'])->update($validate);
            Alerts::success(_l('admin.pages.user.settings.messages.change.settings-updated'));
        } else {
            Alerts::danger(_l('admin.pages.user.settings.messages.change.current-pass-invalid'));
        }

        return Response::json(array_merge(Alerts::get(), [$status ?? 0]));
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
