<?php
class Kwf_Densa_Assets_Provider extends Kwf_Assets_Provider_Abstract
{
    public function getDependency($dependencyName)
    {
        if (substr($dependencyName, 0, 6) == 'Densa.') {
            $class = $dependencyName;
            $class = substr($class, 6);
            $file = 'densa/src/'.str_replace('.', '/', $class).'.js';
            return new Kwf_Densa_Assets_JsDependency($file);
        } else if (substr($dependencyName, 0, 10) == 'Kwf.Densa.') {
            $class = $dependencyName;
            $class = substr($class, 10);
            $file = 'kwfdensa/Kwf_js/Densa/'.str_replace('.', '/', $class).'.js';
            return new Kwf_Densa_Assets_JsDependency($file);
        }
        return null;
    }
}
