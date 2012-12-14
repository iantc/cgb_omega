<?php
//
// function THEMENAME_alpha_preprocess_HOOK(&$vars) {
//   custom functionality here
// }
function cgb_omega_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'user_login_block') {
    $form['links'] = Null;
		$form['#attributes']['class'][] = 'inline-form';
  }
}