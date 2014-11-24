<?php
class Kwf_Densa_Assets_JsDependency extends Kwf_Assets_Dependency_File_Js
{
    protected function _getRawContents($language)
    {
        $ret = parent::_getRawContents($language);
        return $ret;
    }
}
