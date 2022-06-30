<?php

namespace App\Controllers\Admin;

use Core\Helpers\File;

class GalleryController
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
        abort(404);
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

    public static function uploads($files)
    {
        return File::upload('/gallery', $files, ['accept' => ['jpg', 'jpeg', 'png', 'svg', 'gif']]);
    }
}
