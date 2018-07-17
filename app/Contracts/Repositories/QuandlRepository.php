<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface QuandlRepository
{

    /**
     * Date Range + Last URL
     *
     * @param $symbol
     * @return bool|mixed|string
     */
    public function dateRange($symbol);

    /**
     * CSV + More parameters
     *
     * @param $symbol
     * @return bool|mixed|string
     */
    public function csv($symbol);

    /**
     * XML + Frequency
     *
     * @param $symbol
     * @return bool|mixed|string
     */
    public function xmlFrequency($symbol);

    /**
     * Search
     *
     * @param $symbol
     * @return mixed
     */
    public function search($symbol);

    /**
     * Symbol Lists
     *
     * @param $symbol
     * @return mixed
     */
    public function symbolLists($symbol);

    /**
     * Meta Data
     *
     * @param $symbol
     * @return mixed
     */
    public function metadata($symbol);

    /**
     * List of Databases
     *
     * @param null $symbol
     * @return mixed
     */
    public function listDatabases($symbol=null);

    /**
     * Direct Call (access any Quandl endpoint)
     *
     * @param null $symbol
     * @return mixed
     */
    public function directCall($symbol=null);

    /**
     * Error Handling
     *
     * @param $symbol
     * @return string
     */
    public function errorHandling($symbol);

    /**
     * Get the data response from a get operation
     * @return array
     */
    public function getData();

}