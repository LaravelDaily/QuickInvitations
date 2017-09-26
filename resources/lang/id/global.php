<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'Buat',
	'app_save' => 'Simpan',
	'app_edit' => 'Edit',
	'app_view' => 'Lihat',
	'app_update' => 'Update',
	'app_list' => 'Daftar',
	'app_no_entries_in_table' => 'Tidak ada data di tabel',
	'app_custom_controller_index' => 'Controller index yang sesuai kebutuhan Anda.',
	'app_logout' => 'Keluar',
	'app_add_new' => 'Tambahkan yang baru',
	'app_are_you_sure' => 'Anda yakin?',
	'app_back_to_list' => 'Kembali ke daftar',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Hapus',
	'app_delete_selected' => 'Hapus terpilih',
	'global_title' => 'Event Invitations',
];