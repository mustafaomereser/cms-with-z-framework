<?php

return [
    'add-new' => 'Yeni Ekle',
    'save' => 'Kaydet',

    'back-to-list' => 'Listeye Dön',
    'go-to-page' => 'Sayfaya Git',
    'go-to-site' => 'Siteye Git',
    'go-to-content' => 'Yazıya Git',

    'search' => 'Ara...',
    'logout' => 'Çıkış Yap',

    'list' => 'Liste',
    'close' => 'Kapat',
    'delete' => 'Sil',
    'add' => 'Ekle',
    'update' => 'Güncelle',
    'reset' => 'Sıfırla',
    'none' => 'Yok',
    'or' => 'Veya',

    'here-is-none-option' => 'Böyle bir seçenek yok.',
    'please-wait' => 'Lütfen bekleyiniz...',

    'my-profile' => 'Profilim',
    'account-settings' => 'Hesap Ayarları',

    'themes' => [
        'light' => ['fonticon-sun fs-2', 'Beyaz'],
        'cool' => ['fas fa-eclipse', 'Açık'],
        'dark' => ['fonticon-moon fs-2', 'Siyah'],
    ],

    'email_address' => 'E-mail Adres',
    'password' => 'Şifre',
    'fullname' => 'Tam Ad',

    'allowed-file-types' => 'Kabul edilen dosya tipleri: {types}.',

    'menu' => [
        'branches' => [
            'design' => 'Tasarım',
            'content' => 'İçerik',
            'home' => 'Ana'
        ],

        'themes' => 'Temalar',
        'theme-editor' => 'Tema Editörü'
    ],

    'pages' => [
        'auth' => [
            'welcome-again' => 'Tekrar hoşgeldiniz!',
            'signin' => 'Giriş Yap',
            'continue' => 'Devam et'
        ],

        'dashboard' => [
            'index' => [
                'title' => 'Gösterge Paneli',
                'content-title' => 'İçerik Oluştur',
                'content' => [
                    'Yazı oluşturarak içeriğinizi doldurabilirsiniz.',
                    'Ana sayfanızı güzel şekilde düzenleyebilirsiniz.'
                ],

                'guest-this-month' => 'Bu ay ziyaretçi sayısı'
            ]
        ],
        'content' => [
            'index' => [
                'title' => 'Yazılar',
                'add-new' => 'Yazı Ekle',
                'th-title' => 'Başlık',
                'th-seo' => 'SEO Linki',
                'th-type' => 'Sayfa Tipi',
                'th-status' => 'Durum',
                'th-last-up-date' => 'Son Güncellenme Tarihi',
                'th-create-date' => 'Oluşturulduğu Tarih'
            ],
            'editOrcreate' => [
                'create-title' => 'Yazı Ekle',
                'create-description' => 'Sitenizin içeriğini doldurmak için burada yazılar oluşturabilirsiniz, aklında ne varsa yazmaya başlayabilirsin.',

                'edit-title' => 'Yazı Düzenle',
                'edit-description' => 'Önceden yazdığınız yazıları burada tekrar düzenleyebilirsiniz.',

                'medias' => 'Galeri Medyaları',
                'share-status' => 'Paylaşma Durumu',
            ]
        ],

        'menu' => [
            'index' => [
                'title' => 'Menüler',
                'add-new' => 'Menü Ekle',

                'th-id' => 'Kimliği',
                'th-name' => 'Başlık',
                'th-parent' => 'Baş Menüsü',
                'th-content' => 'Bağlı Olduğu Yazı'
            ],
            'editOrcreate' => [
                'create-title' => 'Menü Oluştur',
                'create-description' => 'Kişilerin Sayfalara ulaşabilmesi için veya hızlı ulaşabilmesi için Menü oluşturabilirsiniz.',

                'edit-title' => 'Menü Düzenle',
                'edit-description' => 'Önceden oluşturduğunuz Menüleri burada tekrar düzenleyebilirsiniz.',
            ],


            'messages' => [
                'added' => 'Menü başarıyla eklendi!',
                'add-fail' => 'Menü eklenemedi.',

                'updated' => 'Menü başarıyla güncellendi!',
                'update-fail' => 'Menü güncellenemedi.',

                'deleted' => 'Menü silindi.',
                'delete-fail' => 'Menü silinemedi!',
            ]
        ],

        'themes' => [
            'title' => 'Temalar',

            'messages' => [
                'updated' => 'Tema değiştirildi.',
                'update-fail' => 'Tema değiştirilemedi!',
                'already-same' => 'Tema zaten aynı.'
            ]
        ],

        'theme-editor' => [
            'title' => 'Tema Editörü',
            'file-title' => 'Dosya Düzenle',

            'th-name' => 'Ad',
            'th-size' => 'Boyut',
            'th-last-up-date' => 'Son Değiştirme',

            'messages' => [
                'file-created' => 'Dosya oluşturuldu!',
                'file-already-there' => 'Böyle bir dosya zaten mevcut.',

                'file-updated' => 'Dosya başarı ile güncellendi.',
                'file-update-fail' => 'Dosya güncellenemedi!',

                'folder-created' => 'Klasör oluşturuldu!',
                'folder-create-fail' => 'Klasör oluşturulamadı!',
                'folder-already-there' => 'Böyle bir klasör zaten mevcut.'
            ]
        ],

        'user' => [
            'profile' => [
                'privillage' => 'Yetki',
                'privillages' => [
                    'Kullanıcı',
                    'Yönetici'
                ]
            ],
            'settings' => [
                'title' => 'Ayarlar',
                'overview' => 'Genel Bakış',
                'sign-in-method' => 'Giriş Metodları',
                'profile-details' => 'Profil Detayları',
                'deactivate-account' => 'Hesabı Devre Dışı Bırak',

                'deactive' => [
                    'warning' => [
                        'title' => 'Hesabınızı Devre Dışı Bırakıyorsunuz',
                        'content' => 'Hesabınızı devre dışı bıraktıktan sonra bir daha erişemezsiniz.'
                    ],
                    'i-confirm' => 'Hesabımın devre dışı bırakılmasını onaylıyorum.',
                    'button' => 'Hesabımı devre dışı bırak'
                ],

                'messages' => [
                    'deactive-account' => [
                        'success' => 'Kullanıcı devre dışı bırakıldı.',
                        'cannot' => 'Ana kullanıcıyı devre dışı bırakamazsınız.'
                    ],
                    'change' => [
                        'current-pass-invalid' => 'Girdiğiniz mevcut şifre geçerli değil.',
                        'settings-updated' => 'Ayarlar güncellendi.',
                        'avatar-updated' => 'Avatar güncellendi.'
                    ]
                ]
            ]
        ]
    ],

    'ask-modal' => [
        'title' => 'Bu işlemi yapmak istediğinize emin misiniz?',
        'text' => 'Bu işlem geri alınamaz, veya düzeltilemez. Bu işleme devam etmek istediğinizden emin misiniz?',
        'accept' => 'Evet',
        'decline' => 'Vazgeç'
    ]
];
