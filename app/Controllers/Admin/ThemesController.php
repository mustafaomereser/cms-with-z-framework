<?php

namespace App\Controllers\Admin;

use App\Helpers\Theme;
use Core\Facedas\Alerts;
use Core\Facedas\Config;
use Core\Facedas\Response;

class ThemesController
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
        return view('themes.index', ['title' => 'Temalar'], 'main');
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
        abort(404);
    }

    /** Update page | PATCH/PUT: /id
     * @return mixed
     */
    public function update($theme)
    {
        $return = ['status' => 0];

        if ($theme != Config::get('app.theme')) {
            if (in_array($theme, Theme::list())) {
                Config::set('app', ['theme' => $theme]);
                $return['status'] = 1;
                Alerts::success('Tema değiştirildi.');
            }
        } else {
            Alerts::warning('Tema zaten aynı.');
        }

        if (!$return['status']) Alerts::danger('Tema değiştirilemedi!');
        $return['alerts'] = Alerts::get();

        return Response::json($return);
    }

    /** Delete page | DELETE: /theme
     * @return mixed
     */
    public function delete($theme)
    {
        ThemeEditorController::rrmdir(Theme::path($theme));
        Alerts::success('Tema silindi.');
        return Response::json(Alerts::get());
    }
}
