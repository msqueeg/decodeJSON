<?php
namespace Grav\Plugin;

use \Grav\Common\Grav;
use Grav\Common\Utils;

class decodeJSONTwigExtension extends \Twig_Extension
{
    /**
     * Returns extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'decodeJSONTwigExtension';
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('decodeJSON', [$this, 'decodeJSON'])

        ];
    }

    public function decodeJSON($file){
        $response = array();
        
        $content = file_get_contents($file, true);
        
        $stdClassObject = json_decode($content);
        
        foreach ($stdClassObject as $key => $value){
            $response[]= array($key, $value);
        }

        return $response;

    }

}

?>