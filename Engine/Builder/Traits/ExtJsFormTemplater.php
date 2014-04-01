<?php
/**
 * Created by Slava Basko.
 * Email: basko.slava@gmail.com
 * Date: 4/1/14
 * Time: 2:31 PM
 */

namespace Engine\Builder\Traits;


trait ExtJsFormTemplater {

    public $templateExtJsFormExtends = '\\Engine\\Crud\\Form\\Extjs';

    public $templateExtJsFormModulePrefix = "
    /**
     * Content managment system module router prefix
     * @var string
     */
    protected \$_modulePrefix = 'admin';
";

    public $templateExtJsFormModuleName = "
    /**
     * Extjs module name
     * @var string
     */
    protected \$_module = '%s';
";

    public $templateExtJsFormKey = "
    /**
     * Extjs form key
     * @var string
     */
    protected \$_key = '%s';
";

} 