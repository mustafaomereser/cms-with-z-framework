<?php

namespace App\Controllers\Admin;

use App\Helpers\Theme;
use Core\Facedas\Alerts;
use Core\Facedas\Config;
use Core\Facedas\Response;
use Core\Validator;

class ThemeEditorController
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
        $path = Theme::path(Config::get('app.theme') . (isset($_REQUEST['path']) ? '/' . $_REQUEST['path'] : null));
        if (is_dir($path)) {
            $scans = array_values(array_diff(scandir($path), ['.', '..']));
            foreach ($scans as $key => $scan) $scans[$key] = "$path/$scan";
            return view('theme_editor.index', ['title' => _l('admin.pages.theme-editor.title'), 'scans' => $scans], 'main');
        } else {
            return view('theme_editor.edit', ['title' => _l('admin.pages.theme-editor.file-title'), 'file' => $path], 'main');
        }
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
            'name' => ['required'],
            'path' => ['required']
        ]);
        $path = Theme::path(Config::get('app.theme') . (isset($validated['path']) ? '/' . $validated['path'] : null));
        $name = $path . "/" . $validated['name'];
        if (strstr($validated['name'], '.')) {
            if (!file_exists($name)) {
                file_put_contents($name, '//');
                Alerts::success(_l('admin.pages.theme-editor.messages.file-created'));
            } else {
                Alerts::danger(_l('admin.pages.theme-editor.messages.file-already-there'));
            }
        } else {
            if (!is_dir($name)) {
                if (@mkdir($name, 0777, true)) Alerts::success(_l('admin.pages.theme-editor.messages.folder-created'));
                else Alerts::danger(_l('admin.pages.theme-editor.messages.folder-create-fail'));
            } else {
                Alerts::danger('admin.pages.theme-editor.messages.folder-already-there');
            }
        }

        return back();
    }

    /** Update page | PATCH/PUT: /id
     * @return mixed
     */
    public function update($id)
    {
        $validated = Validator::validate($_REQUEST, [
            'file' => ['required'],
            'content' => ['required']
        ]);

        if (file_put_contents($validated['file'], $validated['content'])) Alerts::success(_l('admin.pages.theme-editor.messages.file-updated'));
        else Alerts::danger(_l('admin.pages.theme-editor.messages.file-update-fail'));

        return Response::json(Alerts::get());
    }

    public static function rrmdir(string $directory): bool
    {
        array_map(function (string $file) use ($directory) {
            $file = "$directory/$file";
            is_dir($file) ? ThemeEditorController::rrmdir($file) : unlink($file);
        }, array_diff(scandir($directory), ['.', '..']));
        return rmdir($directory);
    }
    /** Delete page | DELETE: /id
     * @return mixed
     */
    public function delete($id)
    {
        $validated = Validator::validate($_REQUEST, [
            'link' => ['required']
        ]);

        $path = Theme::path(Config::get('app.theme'));

        $link = $path . $validated['link'];
        if (is_dir($link)) ThemeEditorController::rrmdir($link);
        else unlink($link);
    }
}
