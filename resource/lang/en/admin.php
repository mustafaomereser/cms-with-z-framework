<?php

return [
    'add-new' => 'Add New',
    'save' => 'Save',

    'back-to-list' => 'Back to list',
    'go-to-page' => 'Go to page',
    'go-to-site' => 'Go to public site',
    'go-to-content' => 'Go to content',

    'search' => 'Search...',
    'logout' => 'Sign out',

    'list' => 'List',
    'close' => 'Close',
    'delete' => 'Delete',
    'add' => 'Add',
    'none' => 'None',

    'here-is-none-option' => 'There are not this option.',
    'please-wait' => 'Please wait...',

    'my-profile' => 'My Profile',
    'account-settings' => 'Account Settings',

    'themes' => [
        'light' => ['fonticon-sun fs-2', 'Light'],
        'cool' => ['fas fa-eclipse', 'Cool'],
        'dark' => ['fonticon-moon fs-2', 'Dark'],
    ],

    'menu' => [
        'branches' => [
            'design' => 'Design',
            'content' => 'Content',
            'home' => 'Main'
        ],

        'themes' => 'Themes',
        'theme-editor' => 'Theme editor'
    ],

    'pages' => [
        'dashboard' => [
            'index' => [
                'title' => 'Dashboard',
                'content-title' => 'Create Posts',
                'content' => [
                    'You can fill your content by creating a post.',
                    'You can organize your homepage beautifully.'
                ]
            ]
        ],
        'content' => [
            'index' => [
                'title' => 'Posts',
                'add-new' => 'Add Post',
                'th-title' => 'Title',
                'th-seo' => 'SEO Link',
                'th-type' => 'Page Type',
                'th-status' => 'Status',
                'th-last-up-date' => 'Last Up Date',
                'th-create-date' => 'Created Date'
            ],
            'editOrcreate' => [
                'create-title' => 'Create Post',
                'create-description' => 'You can create posts here to fill the content of your site, you can start writing whatever is on your mind..',

                'edit-title' => 'Edit Post',
                'edit-description' => 'You can edit your previously written posts here.',

                'medias' => 'Gallery Medias',
                'share-status' => 'Share Status',
            ]
        ],

        'menu' => [
            'index' => [
                'title' => 'Menus',
                'add-new' => 'Add Menu',

                'th-id' => 'Identity',
                'th-name' => 'Title',
                'th-parent' => 'Parent Menu',
                'th-content' => 'Linked Post'
            ],
            'editOrcreate' => [
                'create-title' => 'Create Menu',
                'create-description' => 'You can create a Menu so that people can access Pages or reach them quickly.',

                'edit-title' => 'Edit Menu',
                'edit-description' => 'Here you can rearrange your previously created Menus.',
            ],


            'messages' => [
                'added' => 'Menu successfully added!',
                'add-fail' => 'Could not add menu.',

                'updated' => 'The menu has been successfully updated!',
                'update-fail' => 'The menu could not be updated.',

                'deleted' => 'The menu has been deleted.',
                'delete-fail' => 'Failed to delete menu!',
            ]
        ],

        'themes' => [
            'title' => 'Themes',

            'messages' => [
                'updated' => 'The theme has been changed.',
                'update-fail' => 'The theme could not be changed!',
                'already-same' => 'The theme is already the same.'
            ]
        ],

        'theme-editor' => [
            'title' => 'Theme Editor',
            'file-title' => 'Edit File',

            'th-name' => 'Name',
            'th-size' => 'Size',
            'th-last-up-date' => 'Last Change',

            'messages' => [
                'file-created' => 'File created!',
                'file-already-there' => 'Such a file already exists.',

                'file-updated' => 'The file has been successfully updated.',
                'file-update-fail' => 'The file could not be updated!',

                'folder-created' => 'Folder created!',
                'folder-create-fail' => 'Failed to create folder!',
                'folder-already-there' => 'Such a folder already exists.'
            ]
        ]
    ],

    'ask-modal' => [
        'title' => 'Are you sure you want to do this?',
        'text' => 'This action cannot be undone or corrected. Are you sure you want to continue this process?',
        'accept' => 'Yes',
        'decline' => 'I don\'t Sure.'
    ]
];
