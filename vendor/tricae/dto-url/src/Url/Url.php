<?php

namespace Url;

use Context\DataWrapper;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getScheme()
 * @method string getHost()
 * @method string getPort()
 * @method string getUser()
 * @method string getPass()
 * @method array getPath()
 * @method array getQuery()
 * @method string getFragment()
 * @method \Iris\Context\Url\Base setScheme(string $scheme)
 * @method \Iris\Context\Url\Base setHost(string $host)
 * @method \Iris\Context\Url\Base setPort(string $port)
 * @method \Iris\Context\Url\Base setUser(string $user)
 * @method \Iris\Context\Url\Base setPass(string $pass)
 * @method \Iris\Context\Url\Base setPath(array $path)
 * @method \Iris\Context\Url\Base setQuery(array $query)
 * @method \Iris\Context\Url\Base setFragment(string $fragment)
 */
class Url extends Datawrapper\Base
{
    /**
     * All the parts from the url are stored separetely even after treated,
     * this will allow to change specific bits without the need to rebuild the
     * entire url
     *
     * @var associative array
     */
    private $fullUrl = [
        'scheme'      => '',
        'credentials' => '',
        'host'        => '',
        'port'        => '',
        'path'        => '',
        'query'       => '',
        'fragment'    => ''
    ];

    /**
     * @var string
     */
    private $scheme;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var array
     */
    private $path  = [];

    /**
     * Associative array to build query string
     *
     * @var array
     */
    private $query = [];

    /**
     * @var string
     */
    private $fragment;

    /**
     * Build the final url based on the structure defined
     *
     * @return string
     */
    public function getFullUrl()
    {
        $parts = $this->toArray();
        unset($parts['full_url'], $parts['pass']);

        foreach ($parts as $method => $param) {
            if ($param) {
                $method = 'add' . ucfirst($method);
                $this->$method($param);
            }
        }

        return implode($this->fullUrl);
    }

    /**
     * Add host to the final url
     *
     * @param string $host
     * @return Base
     */
    public function addHost($host)
    {
        $this->fullUrl['host'] = $host;
        return $this;
    }

    /**
     * Add port to the final url
     *
     * @param string $port
     * @return Base
     */
    public function addPort($port)
    {
        $this->fullUrl['port'] = ":{$port}";
        return $this;
    }

    /**
     * Add scheme to the final url
     *
     * @param string $scheme
     * @return Base
     */
    public function addScheme($scheme)
    {
        $this->fullUrl['scheme'] = $scheme . '://';
        return $this;
    }

    /**
     * Add the credentials to the final url, both username and password are
     * added in this stage
     *
     * @param string $user
     * @return Base
     */
    public function addUser($user)
    {
        //only add the information if there are username and password
        if ($user && $this->getPass()) {
            $this->fullUrl['credentials'] = $user . ':' . $this->getPass() . '@';
        }

        return $this;
    }

    /**
     * Add paths to the final url
     *
     * @param string $path
     * @return Base
     */
    public function addPath($path)
    {
        $this->fullUrl['path'] = '/' . implode('/', (array) $path);
        return $this;
    }

    /**
     * Add query string to the final url
     *
     * @param string $query
     * @return Base
     */
    public function addQuery($query)
    {
        $queryParts = [];
        foreach ($query as $key => $value) {
            $queryParts[] = "{$key}={$value}";
        }

        $this->fullUrl['query'] = '?' . implode('&', $queryParts);

        return $this;
    }

    /**
     * Add fragment to the final url
     *
     * @param string $fragment
     * @return Base
     */
    public function addFragment($fragment)
    {
        $this->fullUrl['fragment'] = "#{$fragment}";
        return $this;
    }

    /**
     * Replace path values
     *
     * @param associative array $replace
     * @return Base
     */
    public function replacePath(array $replace)
    {
        return $this->setPath(array_merge($this->getPath(), $replace));
    }

    /**
     * Replace query string values
     *
     * @param associative array $replace
     * @return Base
     */
    public function replaceQuery(array $replace)
    {
        return $this->setQuery(array_merge($this->getQuery(), $replace));
    }
}
