<?php
/**
 * Created by PhpStorm.
 * User: lpezzali
 * Date: 2019-01-14
 * Time: 23:17
 */

namespace AppBundle\Twig;


class Md5 extends \Twig_Extension {

    public function getFilters() {
        return [
            new \Twig_SimpleFilter('md5', 'md5')
        ];
    }

    public function getName() {
        return "md5_hash";
    }

}