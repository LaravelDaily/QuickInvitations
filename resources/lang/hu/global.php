<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'Létrehozás',
	'app_save' => 'Mentés',
	'app_edit' => 'Szerkesztés',
	'app_view' => 'Megtekintés',
	'app_update' => 'Frissítés',
	'app_list' => 'Lista',
	'app_no_entries_in_table' => 'Nincs bejegyzés a táblában',
	'app_logout' => 'Kijelentkezés',
	'app_add_new' => 'Új hozzáadása',
	'app_are_you_sure' => 'Biztosan így legyen?',
	'app_back_to_list' => 'Vissza a listához',
	'app_dashboard' => 'Vezérlőpult',
	'app_delete' => 'Törlés',
	'app_custom_controller_index' => 'Egyedi vezérlő index.',
	'global_title' => 'Event Invitations',
];