<?php

namespace App\Controllers\Admin;

use App\Helpers\Theme;
use App\Models\Contents;
use App\Models\Galleries;
use Core\Facedas\Alerts;
use Core\Facedas\Lang;
use Core\Facedas\Response;
use Core\Facedas\Str;
use Core\Helpers\Date;
use Core\Route;
use Core\Validator;

class ContentController
{

    public function __construct()
    {
        $this->contents = new Contents;
        $this->galleries = new Galleries;
    }

    /** Index page | GET: /
     * @return mixed
     */
    public function index()
    {
        return view('content.index', ['title' => 'Yazılar'], 'main');
    }

    /** Show page | GET: /id
     * @param string $id
     * @return mixed
     */
    public function show($id)
    {
        switch ($id) {
            case 'contents':
                $data = ['data' => []];
                $contents = $this->contents->get(true);
                foreach ($contents as $content) {
                    $titles = json_decode($content->title, true);
                    $content->title = '';
                    foreach ($titles as $lang => $title) $content->title .= "<div><b class='text-uppercase'>$lang:</b> `$title`</div>";

                    $slugs = json_decode($content->slug, true);
                    $content->slug = '';
                    foreach ($slugs as $lang => $slug) $content->slug .= "<div><b class='text-uppercase'>$lang:</b> `$slug`</div>";

                    $data['data'][] = [
                        '<a href="' . Route::name('admin.content.edit', ['id' => $content->id]) . '" class="btn btn-light btn-sm btn-active-light-primary"><i class="fa fa-pen-fancy"></i></a>',
                        $content->title,
                        $content->slug,
                        in_array($content->type, Theme::contentTypes()) ? $content->type : "<span class='text-danger' data-toggle='tooltip' title='Aktif tema bu tipi desteklemiyor.'>$content->type</span>",
                        Lang::get('enums.status.' . $content->status),
                        Date::format((int) $content->updated_at, 'd.m.Y H:i'),
                        Date::format((int) $content->created_at, 'd.m.Y H:i'),
                        '<button class="btn btn-light btn-sm btn-sm btn-active-light-danger" data-content-id="' . $content->id . '" onwaiting="$.content($(this).attr(`data-content-id`)).delete(deleteContentCallback);" onclick="$.askModal(this);"><i class="fa fa-trash"></i></button>',
                    ];
                }
                return Response::json($data);
                break;

            default:
                abort(400, _l('admin.here-is-none-option'));
        }
    }

    /** Create page | GET: /create
     * @return mixed
     */
    public function create()
    {
        return view('content.editOrcreate', ['title' => 'Yazı Ekle'], 'main');
    }

    /** Edit page | GET: /id/edit
     * @param integer $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('content.editOrcreate', ['title' => 'Yazı Düzenle', 'content' => $this->contents->where('id', '=', $id)->first(true), 'galleries' => $this->contents->galleries($id)], 'main');
    }

    public function setAll()
    {
        $validated = Validator::validate($_REQUEST, [
            'title' => ['type:array', 'required'],
            'type' => ['required'],
            'status' => ['required', 'type:integer', 'max:1', 'min:0'],
            'content' => ['required']
        ]);

        // Slug
        $validated['slug'] = [];
        foreach ($_POST['slug'] as $key => $val) $validated['slug'][$key] = !empty($val) ? $val : Str::slug($validated['title'][$key]);
        $validated['slug'] = json_encode($validated['slug'], JSON_UNESCAPED_UNICODE);

        $validated['content'] = json_encode($validated['content'], JSON_UNESCAPED_UNICODE);
        $validated['title'] = json_encode($validated['title'], JSON_UNESCAPED_UNICODE);

        return $validated;
    }

    public function includeMedias($id)
    {
        if (!empty($_FILES['gallery']['name'][0])) {
            $medias = GalleryController::uploads($_FILES['gallery']);
            if (is_string($medias)) $medias = [$medias];

            foreach ($medias as $media) $this->galleries->insert([
                'article_id' => $id,
                'src' => $media,
                'type' => 1,
                'status' => 1
            ]);
        }
    }

    /** POST page | POST: /
     * @return mixed
     */
    public function store()
    {
        $validated = $this->setAll();

        // $validated['author_id'] = 1;

        $content = $this->contents->insert($validated);

        if (isset($content['id'])) {
            $this->includeMedias($content['id']);

            Alerts::success('Yazı başarıyla eklendi!');
            return redirect(Route::name('admin.content.edit', ['id' => $content['id']]));
        }


        Alerts::danger('Yazı eklenemedi.');
        return back();
    }

    /** Update page | PATCH/PUT: /id
     * @return mixed
     */
    public function update($id)
    {
        $validated = $this->setAll();

        $content = $this->contents->where('id', '=', $id)->update($validated);
        $this->includeMedias($id);

        if ($content) Alerts::success('Yazı başarıyla güncellendi!');
        else Alerts::danger('Yazı güncellenemedi.');

        return back();
    }

    /** Delete page | DELETE: /id
     * @return mixed
     */
    public function delete($id)
    {
        $delete = $this->contents->where('id', '=', $id)->delete();
        if ($delete) Alerts::success('Yazı silindi.');
        else Alerts::danger('Yazı silinemedi!');

        return Response::json(['alerts' => Alerts::get(), 'status' => ($delete ? 1 : 0)]);
    }
}
