<?php
/*******************************************************************************
 * agerestriction
 *
  ******************************************************************************/

	function agerestriction_init()
	{
		global $CONFIG;

		//put the check at the very end
		extend_view('register/extend', 'agerestriction/register', 1000);

		//block user registration if they don't check the box
		register_plugin_hook('action', 'register', 'agerestriction_register_hook');
	}

	function agerestriction_register_hook()
	{
		if (get_input('agevalid',false) != 'true') {
			register_error(elgg_echo('agerestriction:required'));
			forward($_SERVER['HTTP_REFERER']);
		}
	}

	register_elgg_event_handler('init', 'system', 'agerestriction_init');
