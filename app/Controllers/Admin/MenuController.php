<?php

namespace App\Controllers\Admin;

use App\Models\Contents;
use App\Models\Menu;
use Core\Facedas\Alerts;
use Core\Facedas\Lang;
use Core\Facedas\Response;
use Core\Facedas\Str;
use Core\Route;
use Core\Validator;

class MenuController
{

    public function __construct()
    {
        $this->menus = new Menu;
        $this->contents = new Contents;
    }

    /** Index page | GET: /
     * @return mixed
     */
    public function index()
    {
        return view('menu.index', ['title' => 'Menüler'], 'main');
    }

    /** Show page | GET: /id
     * @param string $type
     * @return mixed
     */
    public function show($type)
    {
        switch ($type) {
            case 'menus':
                $data = ['data' => []];
                $menus = $this->menus->get(true);
                foreach ($menus as $menu) {
                    $names = json_decode($menu->name, true);
                    $menu->name = '';
                    foreach ($names as $lang => $name) $menu->name .= "<div><b class='text-uppercase'>$lang:</b> `$name`</div>";

                    if ($menu->parent_id != 0) {
                        $parent = "<div><b>Kimliği:</b> $menu->parent_id</div>";
                        $names = json_decode($this->menus->find($menu->parent_id, true)->name ?? '[]', true);
                        foreach ($names as $lang => $name) $parent .= "<div><b class='text-uppercase'>$lang:</b> `$name`</div>";
                    }

                    $content = $this->contents->find($menu->content_id, true);

                    $titles = json_decode($content->title, true);
                    $slug = json_decode($content->slug, true)[Lang::currentLocale()];

                    $content = "<a href='" . Route::name($slug) . "' class='btn btn-light btn-active-light-primary btn-sm w-100 mb-3' target='_blank'>Yazıya Git</a>";
                    foreach ($titles as $lang => $title) $content .= "<div><b class='text-uppercase'>$lang:</b> `$title`</div>";

                    $data['data'][] = [
                        '<a href="' . Route::name('admin.menu.edit', ['id' => $menu->id]) . '" class="btn btn-light btn-sm btn-active-light-primary"><i class="fa fa-pen-fancy"></i></a>',
                        $menu->id,
                        $menu->name,
                        $parent ?? '<b>Yok</b>',
                        $content,
                        '<button class="btn btn-light btn-sm btn-sm btn-active-light-danger" data-menu-id="' . $menu->id . '" onwaiting="$.menu($(this).attr(`data-menu-id`)).delete(deleteMenuCallback);" onclick="$.askModal(this);"><i class="fa fa-trash"></i></button>',
                    ];
                }
                return Response::json($data);
                break;

            default:
                abort(400, 'Böyle bir seçenek yok.');
        }
    }

    /** Create page | GET: /create
     * @return mixed
     */
    public function create()
    {
        return view('menu.editOrCreate', ['title' => 'Menü Oluştur', 'menus' => $this->menus->get(true), 'contents' => $this->contents->public()], 'main');
    }

    /** Edit page | GET: /id/edit
     * @param integer $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('menu.editOrCreate', ['title' => 'Menü Düzenle', 'menus' => $this->menus->get(true), 'menu' => $this->menus->find($id, true), 'contents' => $this->contents->public()], 'main');
    }


    public function setAll()
    {
        $validated = Validator::validate($_REQUEST, [
            'name' => ['type:array', 'required'],
            'content_id' => ['type:integer', 'min:0', 'required'],
            'parent_id' => ['type:integer', 'min:0', 'required']
        ]);
        $validated['name'] = json_encode($validated['name'], JSON_UNESCAPED_UNICODE);

        return $validated;
    }


    /** POST page | POST: /
     * @return mixed
     */
    public function store()
    {
        $validated = $this->setAll();
        $menu = $this->menus->insert($validated);

        if (isset($menu['id'])) {
            Alerts::success('Menü başarıyla eklendi!');
            return redirect(Route::name('admin.menu.edit', ['id' => $menu['id']]));
        }

        Alerts::danger('Menü eklenemedi.');
        return back();
    }

    /** Update page | PATCH/PUT: /id
     * @return mixed
     */
    public function update($id)
    {
        $validated = $this->setAll();
        $menu = $this->menus->where('id', '=', $id)->update($validated);

        if ($menu) Alerts::success('Menü başarıyla güncellendi!');
        else Alerts::danger('Menü güncellenemedi.');

        return back();
    }

    /** Delete page | DELETE: /id
     * @return mixed
     */
    public function delete($id)
    {
        $delete = $this->menus->where('id', '=', $id)->delete();
        if ($delete) Alerts::success('Menü silindi.');
        else Alerts::danger('Menü silinemedi!');

        return Response::json(['alerts' => Alerts::get(), 'status' => ($delete ? 1 : 0)]);
    }
}
