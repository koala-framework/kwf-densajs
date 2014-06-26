<?php
class Kwf_Densa_Assets_TrlProvider extends Kwf_Assets_Provider_Abstract
{
    public function getDependenciesForDependency(Kwf_Assets_Dependency_Abstract $dependency)
    {
        if ($dependency instanceof Kwf_Densa_Assets_JsDependency) {
            return array(
                Kwf_Assets_Dependency_Abstract::DEPENDENCY_TYPE_USES => array(
                    new Kwf_Assets_Dependency_File_Js('kwfdensa/densa-lang-en.js')
                )
            );
        }
        return array();
    }

    public function getDependency($dependencyName)
    {
        return null;
    }
}
