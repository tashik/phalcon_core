<?php
/**
 * @namespace
 */
namespace Engine\Crud\Helper\Form;

use Engine\Crud\Helper\Form\Extjs\BaseHelper,
    Engine\Crud\Form\Extjs as Form;

/**
 * Class html form helper
 *
 * @category   Engine
 * @package    Crud
 * @subpackage Helper
 */
class Extjs extends BaseHelper
{
    /**
     * Is create js file prototype
     * @var boolean
     */
    protected static $_createJs = true;

	/**
	 * Generates a widget to show a html form
	 *
	 * @param \Engine\Crud\Form\Extjs $form
	 * @return string
	 */
	static public function _(Form $form)
	{
        $title = $form->getTitle();

        $code = "
        Ext.define('".static::getFormName()."', {
            extend: 'Ext.form.Panel',
            store: '".static::getStoreName()."',
            alias: 'widget.".static::$_module.ucfirst(static::$_prefix)."Form',
            title: '".$form->getTitle()."',
            bodyPadding: 5,
            autoScroll:true,
            waitMsgTarget: true,
            fieldDefaults: {
                labelAlign: 'right',
                labelWidth: 85,
                msgTarget: 'side'
            },
            defaultType: 'textfield',
            defaults: {
                width: 280
            },
            buttonAlign: 'left',
            ";

        /*$width = $form->getWidth();
        if ($width) {
            $code .= "width: ".$width.",
            ";
        }
        $height = $form->getHeight();
        if ($width) {
            $code .= "height: ".$height.",
            ";
        }*/

        $code .= "link: '".$form->getLink()."',
            ";

        $code .= "requires: [";
        $requires = [];

        $requires[] = "'Ext.form.field.*'";
        $code .= implode(",", $requires);

        $code .= "],
            ";

        $code .= "itemId: '".static::$_module.ucfirst(static::$_prefix)."Form',
            ";

		return $code;
	}

    /**
     * Return object name
     *
     * @return string
     */
    public static function getName()
    {
        return static::getFormName();
    }

    /**
     * Crud helper end tag
     *
     * @return string
     */
    static public function endTag()
    {
        return "
        });";
    }
}