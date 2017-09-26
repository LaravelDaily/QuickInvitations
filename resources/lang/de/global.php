<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'Erstellen',
	'app_save' => 'Speichern',
	'app_edit' => 'Bearbeiten',
	'app_view' => 'Betrachten',
	'app_update' => 'Aktualisieren',
	'app_list' => 'Listen',
	'app_no_entries_in_table' => 'Keine Einträge in Tabelle',
	'app_custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Abmelden',
	'app_add_new' => 'Hinzufügen',
	'app_are_you_sure' => 'Sind Sie sicher?',
	'app_back_to_list' => 'Zurück zur Liste',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Löschen',
	'global_title' => 'Event Invitations',
];