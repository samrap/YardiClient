<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 11/19/14
 * Time: 9:38 AM
 */

namespace YardiClient;

use YardiClient\Config\YardiPlatform;
use YardiClient\Documents\YardiXmlDoc;
use YardiClient\Http\YardiPingRequest;
use YardiClient\Http\YardiImportGuestRequest;

class YardiClient
{
    public $url;
    protected $username;
    protected $password;
    protected $database;
    protected $server;
    protected $platform;

    public function __construct($url = null, $user = null, $pass = null, $db = null, $servName = null, $plat = YardiPlatform::SQL_SERVER)
    {
        $this->url = $url;
        $this->username = $user;
        $this->password = $pass;
        $this->database = $db;
        $this->server = $servName;
        $this->platform = $plat;
    }

    public function setURL($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getURL()
    {
        return $this->url;
    }

    public function setUsername($user)
    {
        $this->username = $user;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($pass)
    {
        $this->password = $pass;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setServer($server)
    {
        $this->server = $server;
        return $this;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function setDatabase($db)
    {
        $this->database = $db;
        return $this;
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function setPlatform($platform)
    {
        $this->platform = $platform;
        return $this;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function ping()
    {
        $request = new YardiPingRequest(
            $this->url,
            $this->username,
            $this->password,
            $this->database,
            $this->server,
            $this->platform);
        return $request->send();
    }

    public function importGuest(YardiXmlDoc $leads)
    {
        $request = new YardiImportGuestRequest(
            $this->url,
            $this->username,
            $this->password,
            $this->database,
            $this->server,
            $this->platform,
            $leads);
        return $request->send();
    }
}
