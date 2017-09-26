<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'बनाइए (क्रिएट)',
	'app_save' => 'सुरक्षित करे ',
	'app_edit' => 'संपादित करे (एडिट)',
	'app_view' => 'देखें',
	'app_update' => 'सुधारे ',
	'app_list' => 'सूची',
	'app_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'app_custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'app_logout' => 'लोग आउट',
	'app_add_new' => 'नया समाविष्ट करे',
	'app_are_you_sure' => 'आप निस्चित है ?',
	'app_back_to_list' => 'सूची पे वापस जाए',
	'app_dashboard' => 'डॅशबोर्ड ',
	'app_delete' => 'मिटाइए',
	'global_title' => 'Event Invitations',
];