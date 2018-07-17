<?php

namespace App\Repositories;

use App\Contracts\Repositories\QuandlRepository as QuandlRepositoryContract;
use Quandl;

class QuandlRepository implements QuandlRepositoryContract
{
    /**
     * Initialize the Controller with necessary arguments
     */
    public function __construct()
    {
        $this->quandl = new Quandl(env('QUANDL_API_KEY'));

    }

    /**
     * Date Range + Last URL
     *
     * @param $symbol
     * @return bool|mixed|string
     */
    public function dateRange($symbol) {
        print $this->quandl->last_url;
        return $this->quandl->getSymbol($symbol, [
            "trim_start" => "today-30 days",
            "trim_end"   => "today",
        ]);
    }

    /**
     * CSV + More parameters
     *
     * @param $symbol
     * @return bool|mixed|string
     */
    public function csv($symbol) {
        $this->quandl = $this->quandl("csv");
        return $this->quandl->getSymbol($symbol, [
            "sort_order"      => "desc", // asc|desc
            "exclude_headers" => true,
            "rows"            => 10,
            "column"          => 4, // 4 = close price
        ]);
    }

    /**
     * XML + Frequency
     *
     * @param $symbol
     * @return bool|mixed|string
     */
    public function xmlFrequency($symbol) {
        $this->quandl = $this->quandl("xml");
        return $this->quandl->getSymbol($symbol, [
            "collapse" => "weekly" // none|daily|weekly|monthly|quarterly|annual
        ]);
    }

    /**
     * Search
     *
     * @param $symbol
     * @return mixed
     */
    public function search($symbol) {
        return $this->quandl->getSearch("crude oil");
    }

    /**
     * Symbol Lists
     *
     * @param $symbol
     * @return mixed
     */
    public function symbolLists($symbol) {
        $quandl = new Quandl(env('QUANDL_API_KEY'), "csv");
        return $quandl->getList("WIKI", 1, 10);
    }

    /**
     * Meta Data
     *
     * @param $symbol
     * @return mixed
     */
    public function metadata($symbol) {
        return $this->quandl->getMeta($symbol);
    }

    /**
     * List of Databases
     *
     * @param null $symbol
     * @return mixed
     */
    public function listDatabases($symbol=null) {
        return $this->quandl->getDatabases();
    }

    /**
     * Direct Call (access any Quandl endpoint)
     *
     * @param null $symbol
     * @return mixed
     */
    public function directCall($symbol=null) {
        return $this->quandl->get('databases/WIKI');
    }

    /**
     * Error Handling
     *
     * @param $symbol
     * @return string
     */
    public function errorHandling($symbol) {
        $quandl = new Quandl(env('QUANDL_API_KEY'), "csv");
        $result = $this->quandl->getSymbol("DEBUG/INVALID");
        if($this->quandl->error and !$result)
            return $this->quandl->error . " - " . $this->quandl->last_url;
        return $result;
    }

    /**
     * Get the data response from a get operation
     * @return array
     */
    public function getData()
    {
        return $this->listDatabases('AAPL');
    }

}
