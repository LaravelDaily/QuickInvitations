<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'Създай',
	'app_save' => 'Запази',
	'app_edit' => 'Промени',
	'app_view' => 'Покажи',
	'app_update' => 'Обнови',
	'app_list' => 'Списък',
	'app_no_entries_in_table' => 'Няма записи в таблицата',
	'app_custom_controller_index' => 'Персонализиран контролер.',
	'app_logout' => 'Изход',
	'app_add_new' => 'Добави нов',
	'app_are_you_sure' => 'Сигурни ли сте?',
	'app_back_to_list' => 'Обратно към списъка',
	'app_dashboard' => 'Табло',
	'app_delete' => 'Изтрий',
	'global_title' => 'Event Invitations',
];