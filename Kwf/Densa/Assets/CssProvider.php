<?php
class Kwf_Densa_Assets_CssProvider extends Kwf_Assets_Provider_CssByJs
{
    public function __construct()
    {
        parent::__construct(array(
            'densa/src'
        ));
    }
}
