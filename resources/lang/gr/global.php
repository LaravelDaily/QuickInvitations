<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'Δημιουργία',
	'app_save' => 'Αποθήκευση',
	'app_edit' => 'Επεξεργασία',
	'app_view' => 'Εμφάνιση',
	'app_update' => 'Ενημέρωησ',
	'app_list' => 'Λίστα',
	'app_no_entries_in_table' => 'Δεν υπάρχουν δεδομένα στην ταμπέλα',
	'app_custom_controller_index' => 'index προσαρμοσμένου controller.',
	'app_logout' => 'Αποσύνδεση',
	'app_add_new' => 'Προσθήκη νέου',
	'app_are_you_sure' => 'Είστε σίγουροι;',
	'app_back_to_list' => 'Επιστροφή στην λίστα',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Διαγραφή',
	'global_title' => 'Event Invitations',
];