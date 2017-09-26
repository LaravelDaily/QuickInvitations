<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'Oluştur',
	'app_save' => 'Kaydet',
	'app_edit' => 'Düzenle',
	'app_view' => 'Görüntüle',
	'app_update' => 'Güncelle',
	'app_list' => 'Listele',
	'app_no_entries_in_table' => 'Tabloda kayıt bulunamadı',
	'app_custom_controller_index' => 'Özel denetçi dizini.',
	'app_logout' => 'Çıkış yap',
	'app_add_new' => 'Yeni ekle',
	'app_are_you_sure' => 'Emin misiniz?',
	'app_back_to_list' => 'Listeye dön',
	'app_dashboard' => 'Kontrol Paneli',
	'app_delete' => 'Sil',
	'global_title' => 'Event Invitations',
];