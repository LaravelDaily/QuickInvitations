<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'events' => [		'title' => 'Events',		'fields' => [			'name' => 'Name',			'event-date' => 'Event date',		],	],
		'invitations' => [		'title' => 'Invitations',		'fields' => [			'event' => 'Event',			'email' => 'Email',			'sent-at' => 'Sent at',			'accepted-at' => 'Accepted at',			'rejected-at' => 'Rejected at',		],	],
	'app_create' => 'Créer',
	'app_save' => 'Sauver',
	'app_edit' => 'Modifier',
	'app_restore' => 'Restaurer',
	'app_permadel' => 'Supprimer définitivement',
	'app_all' => 'Tous',
	'app_trash' => 'Poubelle',
	'app_view' => 'Voir',
	'app_update' => 'Mettre à jour',
	'app_list' => 'Liste',
	'app_logout' => 'Déconnexion',
	'app_add_new' => 'Nouveau',
	'app_are_you_sure' => 'Êtes-vous certain ?',
	'app_back_to_list' => 'Retour à la liste',
	'app_dashboard' => 'Tableau de bord',
	'app_delete' => 'Supprimer',
	'app_delete_selected' => 'Supprimer sélectionnés',
	'app_category' => 'Catégorie',
	'app_categories' => 'Catégories',
	'app_please_select' => 'Slectionner',
	'global_title' => 'Event Invitations',
];