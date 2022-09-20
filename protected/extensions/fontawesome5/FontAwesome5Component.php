<?php

/**
 * Class Fontawesome5Component
 *
 * Include this component in your application configuration, and make sure it is a preloaded
 * component, and it makes sure your Font Awesome v5.x assets are published for you.
 *
 * This component is inspired by this extension created by Tomasz Trejderowski:
 * @link https://www.yiiframework.com/extension/fontawesome
 *
 * @author Paal Gammelsaeter
 */
class FontAwesome5Component extends CApplicationComponent {

    /**
     * If component should publish the assets. If not set, it will be published if
     * application is not console.
     * @var bool
     */
    public $publish;

    /**
     * If minified version should be used, defaults to true.
     * @var bool
     */
    public $minified = true;

    /**
     * The path of the assets if they were published.
     * @var string
     */
    protected $publishedAssetsPath;

    public function init() {
        // Setting new path alias for fontawesome
        if (Yii::getPathOfAlias('fontawesome') === false) {
            Yii::setPathOfAlias('fontawesome', dirname(__FILE__));
        }

        // If publish is not set, then set to false if running in console, elsewise true
        if (!isset($this->publish)) {
            $this->publish = (!Yii::app() instanceof CConsoleApplication);
        }

        if ($this->publish) {
            $filename = $this->minified ? 'all.min.css' : 'all.css';
            Yii::app()->getClientScript()->registerCssFile($this->getAssetsUrl() . '/css/'.$filename);
        }
    }

    /**
     * The path of the assets
     * @return CList|mixed
     */
    public function getAssetsUrl() {
        if (!isset($this->publishedAssetsPath)) {
            $assetsSourcePath = Yii::getPathOfAlias('fontawesome.assets');
            $publishedAssetsPath = Yii::app()->assetManager->publish($assetsSourcePath, false, -1);
            return $this->publishedAssetsPath = $publishedAssetsPath;
        }
        else {
            return $this->publishedAssetsPath;
        }
    }
}