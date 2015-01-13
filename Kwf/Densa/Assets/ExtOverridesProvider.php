<?php
class Kwf_Densa_Assets_ExtOverridesProvider extends Kwf_Assets_Provider_Abstract
{
    public function getDependency($dependencyName)
    {
        return null;
    }

    public function getDependenciesForDependency(Kwf_Assets_Dependency_Abstract $dependency)
    {
        if (!$dependency instanceof Kwf_Assets_Dependency_File_Js && !$dependency instanceof Kwf_Ext_Assets_JsDependency) {
            return array();
        }
        $deps = array(
            Kwf_Assets_Dependency_Abstract::DEPENDENCY_TYPE_REQUIRES => array(),
            Kwf_Assets_Dependency_Abstract::DEPENDENCY_TYPE_USES => array(),
        );

        $fileContents = file_get_contents($dependency->getAbsoluteFileName());

        // remove comments to avoid dependencies from docs/examples
        $fileContents = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*'.'/!', '', $fileContents);

        if ($dependency instanceof Kwf_Ext_Assets_JsDependency || $dependency instanceof Kwf_Densa_Assets_JsDependency) {
            if (preg_match('#Ext4?\.define\(\s*[\'"]([a-zA-Z0-9\._]+)[\'"]#', $fileContents, $m)) {
                $define = $m[1];
                $overrides = self::_getOverrides();
                if (isset($overrides[$define])) {
                    foreach ($overrides[$define] as $i) {
                        $j = $this->_providerList->findDependency($i);
                        if (!$j) {
                            throw new Kwf_Exception("Didn't find dependency '$i'");
                        }
                        $deps[Kwf_Assets_Dependency_Abstract::DEPENDENCY_TYPE_USES][] = $j;
                    }
                }
            }
        }

        return $deps;
    }

    private static function _getOverrides()
    {
        static $ret;
        if (isset($ret)) return $ret;
        $ret = array();
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(VENDOR_PATH.'/bower_components/densajs/src/overrides'), RecursiveIteratorIterator::LEAVES_ONLY);
        foreach ($it as $i) {
            if (substr($i->getPathname(), -3) != '.js') continue;
            $depName = 'Densa.'.str_replace('/', '.', substr($i->getPathname(), strlen(VENDOR_PATH.'/bower_components/densajs/src/'), -3));
            $fileContents = file_get_contents($i->getPathname());

            // remove comments to avoid dependencies from docs/examples
            $fileContents = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*'.'/!', '', $fileContents);

            if (preg_match('#Ext4?\.define\(\s*[\'"]#', $fileContents, $m)) {
                if (preg_match('#^\s*(override)\s*:\s*\'([a-zA-Z0-9\.]+)\'\s*,?\s*$#m', $fileContents, $m)) {
                    if (!isset($ret[$m[2]])) $ret[$m[2]] = array();
                    $ret[$m[2]][] = $depName;
                }
            }
        }

        //static list for overrides in kwf-densajs
        //if we add more we could also parse that
        $ret['Densa.grid.PanelController'] = array('Kwf.Densa.overrides.GridPanelController');

        return $ret;
    }
}
