<?php
/**
 * Created by PhpStorm.
 * User: 2Auge
 * Date: 13.01.17
 * Time: 22:04
 */

namespace YandexPDD\Entity;


class EmailCollectionResponse extends AbstractYandexResponse
{
    /**
     * @var string
     */
    protected $domain = null;

    /**
     * @var integer
     */
    protected $page = null;


    /**
     * @var integer
     */
    protected $pages = null;

    /**
     * @var integer
     */
    protected $on_page = null;

    /**
     * @var integer
     */
    protected $total = null;


    /**
     * @var integer
     */
    protected $found = null;

    /**
     * @param Object|array $data
     *
     * @return EmailCollectionResponse
     */
    public function fill($data)
    {

        // TODO: Implement fill() method.
    }
}