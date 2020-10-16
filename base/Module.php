<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\base;

use Yii;
use yii\di\ServiceLocator;

/**
 * Module is the base class for module and application classes.
 *
 * A module represents a sub-application which contains MVC elements by itself, such as
 * models, views, controllers, etc.
 *
 * A module may consist of [[modules|sub-modules]].
 *
 * [[components|Components]] may be registered with the module so that they are globally
 * accessible within the module.
 *
 * For more details and usage information on Module, see the [guide article on modules](guide:structure-modules).
 *
 * @property array $aliases List of path aliases to be defined. The array keys are alias names (must start
 * with `@`) and the array values are the corresponding paths or aliases. See [[setAliases()]] for an example.
 * This property is write-only.
 * @property string $basePath The root directory of the module.
 * @property string $controllerPath The directory that contains the controller classes. This property is
 * read-only.
 * @property string $layoutPath The root directory of layout files. Defaults to "[[viewPath]]/layouts".
 * @property array $modules The modules (indexed by their IDs).
 * @property string $uniqueId The unique ID of the module. This property is read-only.
 * @property string $version The version of this module. Note that the type of this property differs in getter
 * and setter. See [[getVersion()]] and [[setVersion()]] for details.
 * @property string $viewPath The root directory of view files. Defaults to "[[basePath]]/views".
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Module extends ServiceLocator
{
    /**
     * @var string an ID that uniquely identifies this module among other modules which have the same [[module|parent]].
     */
    public $id;
    /**
     * @var Module the parent module of this module. `null` if this module does not have a parent.
     */
    public $module;

    private $_modules = [];

    /**
     * Constructor.
     * @param string $id the ID of this module.
     * @param Module $parent the parent module (if any).
     * @param array $config name-value pairs that will be used to initialize the object properties.
     */
    public function __construct($id, $parent = null, $config = [])
    {
        $this->id = $id;
        $this->module = $parent;
        parent::__construct($config);
    }

    /**
     * Returns the currently requested instance of this module class.
     * If the module class is not currently requested, `null` will be returned.
     * This method is provided so that you access the module instance from anywhere within the module.
     * @return static|null the currently requested instance of this module class, or `null` if the module class is not requested.
     */
    public static function getInstance()
    {
        $class = get_called_class();
        return isset(Yii::$app->loadedModules[$class]) ? Yii::$app->loadedModules[$class] : null;
    }

    /**
     * Sets the currently requested instance of this module class.
     * @param Module|null $instance the currently requested instance of this module class.
     * If it is `null`, the instance of the calling class will be removed, if any.
     */
    public static function setInstance($instance)
    {
        if ($instance === null) {
            unset(Yii::$app->loadedModules[get_called_class()]);
        } else {
            Yii::$app->loadedModules[get_class($instance)] = $instance;
        }
    }

    /**
     * Initializes the module.
     *
     * This method is called after the module is created and initialized with property values
     * given in configuration. The default implementation will initialize [[controllerNamespace]]
     * if it is not set.
     *
     * If you override this method, please make sure you call the parent implementation.
     */
    public function init()
    {
        if ($this->controllerNamespace === null) {
            $class = get_class($this);
            if (($pos = strrpos($class, '\\')) !== false) {
                $this->controllerNamespace = substr($class, 0, $pos) . '\\controllers';
            }
        }
    }
    /**
     * {@inheritdoc}
     *
     * Since version 2.0.13, if a component isn't defined in the module, it will be looked up in the parent module.
     * The parent module may be the application.
     */
    public function get($id, $throwException = true)
    {
        if (!isset($this->module)) {
            return parent::get($id, $throwException);
        }

        $component = parent::get($id, false);
        if ($component === null) {
            $component = $this->module->get($id, $throwException);
        }
        return $component;
    }

    /**
     * {@inheritdoc}
     *
     * Since version 2.0.13, if a component isn't defined in the module, it will be looked up in the parent module.
     * The parent module may be the application.
     */
    public function has($id, $checkInstance = false)
    {
        return parent::has($id, $checkInstance) || (isset($this->module) && $this->module->has($id, $checkInstance));
    }
}
