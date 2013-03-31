<?php
App::uses('DebugPanel', 'DebugKit.Lib');

/**
 * Variables Panel
 *
 * Provides debug information on the View variables.
 *
 * @package       cake.debug_kit.panels
 */
class VariablesPanel extends DebugPanel {

/**
 * beforeRender callback
 *
 * @return array
 */
	public function beforeRender(Controller $controller) {
		return array_merge(self::dereference($controller->viewVars), array('$request->data' => $controller->request->data));
	}

	protected static function dereference($arr)
	{
	    if (is_array($arr)) {
	        foreach ($arr as $i=>$v) {
	            unset($arr[$i]);
	            $arr[$i] = self::dereference($v);
	        }
	    }
	     
	    return $arr;
	}
}
