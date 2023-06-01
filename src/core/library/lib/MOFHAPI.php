<?php
namespace lib;

/**
 * mofh-whm-api-client
 */
class MOFHAPI
{

    public $message = [];
    public $domain;

    protected $parameters;
    protected $data;
    protected $response;
    protected $status;
    protected $config = array(
        "apiUsername" => "",
        "apiPassword" => "",
        "apiUrl" => "https://panel.myownfreehost.net:2087/xml-api/",
        "plan" => [],
    );

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Initialize with config
     *
     * @param  array $parameters
     * @return $this
     */
    public function initialize(array $parameters = [])
    {
        $this->parameters = $parameters;

        // set default parameters
        foreach (array_replace($this->config, $parameters) as $key => $value) {
            $this->setParameter($key, $value);
        }

        return $this;
    }

    /**
     * Create a new api
     *
     * @param array $parameters
     * @return Api
     */
    public static function init(array $parameters = [])
    {
        $api = new self();
        $api->initialize($parameters);
        return $api;
    }

    /**
     * Get a single parameter.
     *
     * @param string $key The parameter key
     * @return mixed
     */
    protected function getParameter($key)
    {
        if (isset($this->parameters[$key])) {
            return $this->parameters[$key];
        } else {
            return null;
        }
    }

    /**
     * Set a single parameter
     *
     * @param string $key The parameter key
     * @param mixed $value The value to set
     * @return $this
     * @throws RuntimeException if a request parameter is modified after the request has been sent.
     */
    protected function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    public function setApiUsername($value)
    {
        return $this->setParameter("apiUsername", $value);
    }

    public function getApiUsername()
    {
        return $this->getParameter("apiUsername");
    }

    public function setApiPassword($value)
    {
        return $this->setParameter("apiPassword", $value);
    }

    public function getApiPassword()
    {
        return $this->getParameter("apiPassword");
    }

    public function setPlan($value)
    {
        return $this->setParameter("plan", $value);
    }

    public function getPlan()
    {
        return $this->getParameter("plan");
    }

    public function setApiUrl($value)
    {
        return $this->setParameter("apiUrl", $value);
    }

    public function getApiUrl()
    {
        return $this->getParameter("apiUrl");
    }

    public function getDomain()
    {
        return $this->getParameter("domain");
    }

    public function setDomain($value)
    {
        return $this->setParameter("domain", $value);
    }
    public function getPassword()
    {
        return $this->getParameter("password");
    }

    public function setPassword($value)
    {
        return $this->setParameter("password", $value);
    }

    public function getUserName()
    {
        return $this->getParameter("username");
    }

    public function setUserName($value)
    {
        return $this->setParameter("username", $value);
    }

    public function getEmail()
    {
        return $this->getParameter("email");
    }

    public function setEmail($value)
    {
        return $this->setParameter("email", $value);
    }

    public function getReason()
    {
        return $this->getParameter('reason');
    }

    public function setReason($value)
    {
        return $this->setParameter('reason', $value);
    }

    public function httpAuthGet($url, $param = [])
    {
        if (!is_array($param)) {
            throw new Exception("parameters must is a array");
        }
        $authstr = "WHM " . $this->getApiUsername() . ":" . $this->getApiPassword();
        $curlheaders = [
            "Authorization: " . $authstr,
            "cache-control: no-cache"
        ];
        $p = "";
        foreach ($param as $key => $value) {
            $p = $p . $key . "=" . $value . "&";
        }
        if (preg_match('/\?[\d\D]+/', $url)) { //matched ?c
            $p = "&" . $p;
        } else if (preg_match('/\?$/', $url)) { //matched ?$
            $p = $p;
        } else {
            $p = "?" . $p;
        }
        $p = preg_replace('/&$/', "", $p);
        $url = $url . $p;
        echo $url;
        $http = curl_init($url);
        curl_setopt($http, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($http, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($http, CURLOPT_HEADER, 1);
        curl_setopt($http, CURLOPT_HTTPHEADER, $curlheaders);
        $res = curl_exec($http);
        $this->response = $res;
        $this->parseResponse();
        curl_close($http);
    }

    /*
     * http get method
     */
    public function httpGet($url, $param = [])
    {
        if (!is_array($param)) {
            throw new Exception("parameters must is a array");
        }
        $authstr = "WHM " . $this->getApiUsername() . ":" . $this->getApiPassword();
        $curlheaders = [
            "Authorization: " . $authstr,
            "cache-control: no-cache"
        ];
        $p = "";
        foreach ($param as $key => $value) {
            $p = $p . $key . "=" . $value . "&";
        }
        if (preg_match('/\?[\d\D]+/', $url)) { //matched ?c
            $p = "&" . $p;
        } else if (preg_match('/\?$/', $url)) { //matched ?$
            $p = $p;
        } else {
            $p = "?" . $p;
        }
        $p = preg_replace('/&$/', "", $p);
        $url = $url . $p;
        //echo $url;
        $http = curl_init($url);
        curl_setopt($http, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($http, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($http, CURLOPT_HEADER, 1);
        curl_setopt($http, CURLOPT_HTTPHEADER, $curlheaders);
        $res = curl_exec($http);
        curl_close($http);
        // return explode("\r\n\r\n", $res, 2)[1];
        return $res;
    }

    protected function parseResponse()
    {
        $data = (string)$this->response;

        if (strpos(trim($data), '<') !== 0) {
            $this->data = null;
        } else {
            $this->data = $this->xmlToArray((array)simplexml_load_string($data));
        }
    }

    /**
     * Recursively convert a SimpleXMLElement array to regular arrays
     *
     * @param array $input
     * @return array
     */
    protected function xmlToArray($input)
    {
        foreach ($input as $key => $value) {
            if ($value instanceof \SimpleXMLElement) {
                $value = (array)$value;
            }

            if (is_array($value)) {
                $input[$key] = $this->xmlToArray($value);
            }
        }

        return $input;
    }

    /**
     * Get the response data.
     *
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Whether the action was successful
     * 成功信息
     *
     * @return bool
     */
    public function isSuccessful()
    {
        if ($this->getData() && isset($this->getData()['result']['status'])) {
            return $this->getData()['result']['status'] == 1;
        } else {
            return false;
        }
    }

    /**
     * Create a new account
     *
     * Parameters:
     * - username: A custom account username, max. 8 characters of letters and numbers
     * - password: The FTP/control panel/database password for the account
     * - email: The contact e-mail address of the owner
     * - domain: The primary domain name of the account
     * - plan: The hosting plan to create the acccount on
     *
     * @param array $parameters
     * @return string
     */
    public function createAccount(array $parameters = [])
    {
        $this->initialize(array_replace($this->parameters, $parameters));
        $data = [
            "username" => $this->getUsername(),
            "password" => $this->getPassword(),
            "contactemail" => $this->getEmail(),
            "domain" => $this->getDomain(),
            "plan_name" => $this->getPlan(),
        ];
        // The email address is a required field.
        // The username is invalid (Only letters and numbers 8 characters maximum 12)
        // The username is invalid (Only letters and numbers).
        // The username is invalid (8 characters maximum 18 (uiisc_test_whm_api))
        // print_r($data);
        $this->httpAuthGet($this->getApiUrl() . "createacct", $data);
        $msg = "Sorry, an error has occurred. Please try again in a few minutes.";
        if ((int)$this->isSuccessful() == 0) {
            if (is_array($this->data) && isset($this->data['result']['statusmsg'])) {
                print_r("-2");
                if (strlen((string)trim($this->data['result']['statusmsg'])) > 0) {
                    $msg = trim($this->data['result']['statusmsg']);
                }
            } elseif ((int)trim($this->response) > 0) {
                print_r("-3-");
                $msg = (string)trim($this->response);
            } else {
                print_r("-000-");
            }
            $this->message = [0, $msg];
        } elseif ((int)$this->isSuccessful() == 1) {
            if (is_array($this->data) && isset($this->data['result']['statusmsg']) && strlen((string)trim($this->data['result']['statusmsg'])) > 0) {
                $this->message = [
                    1, "The account <b>" . $data["username"] . "</b> has been created successfully. Keep the account info in a safe place.",
                    [
                        "account" => $data["username"],
                        "panel_username" => isset($this->data['result']['options']['vpusername']) ? $this->data['result']['options']['vpusername'] : null,
                        "password" => $data["password"],
                        "domain" => $data["domain"],
                        "email" => $data["contactemail"],
                        "plan " => $data["plan_name"],
                        "panel_url" => "http://cpanel.uiisc.com",
                        "note" => "Remember to wait 5 minutes for your account to be completely created on the server"
                    ]
                ];
            } else {
                $this->message = [1, "The account <b>" . $data["username"] . "</b> has been created successfully"];
            }
        } else {
            $this->message = [0, $msg];
        }
    }

    /**
     * Suspend account
     *
     * Parameters:
     * - username: The custom username or userid
     * - reason: The reason why the account was suspended
     *
     * @param array $parameters
     * @return array
     */
    public function suspend(array $parameters = [])
    {
        $this->initialize(array_replace($this->parameters, $parameters));
        $data = ["user" => $this->getUsername(), "reason" => $this->getReason()];
        // $this->response = 
        $this->httpAuthGet($this->getApiUrl() . "suspendacct", $data);
        // $this->parseResponse();
        print_r("\n----response----\n");
        print_r($this->response);
        print_r("\n----data----\n");
        print_r($this->data);
        $msg = "Sorry an error has occurred please try again in a few minutes.";
        if ((int)$this->isSuccessful() == 0) {
            if (is_array($this->data) && isset($this->data['result']['statusmsg'])) {
                $msg = trim((string)$this->data['result']['statusmsg']);
                if (preg_match('/account is NOT currently suspended \(status : (\w*) \)/', $msg, $matches)) {
                    if (trim($matches[1]) == '') {
                        $msg = "The account <b>" . $data["user"] . "</b> is NOT currently suspended";
                    } else {
                        $msg = "The account <b>" . $data["user"] . "</b> is " . trim($matches[1]);
                    }
                }
            } elseif (strlen((string)$this->response) > 0) {
                $msg = trim((string)$this->response);
            }
            $this->message = [0, $msg];
        } elseif ((int)$this->isSuccessful() == 1) {
            if (is_array($this->data) && isset($this->data['result']['statusmsg'])) {
                $msg = "The account <b>" . $data["user"] . "</b> has been suspended successfully.<br/><i>- Remember that in 30 days the account will be completely removed from the server.</i>";
            } elseif (strlen((string)$this->response) > 0) {
                $msg = trim((string)$this->response);
            }
            $this->message = [1, $msg];
        } else {
            $this->message = [1, $msg];
        }
    }

    /**
     * Unsuspend account
     *
     * Parameters:
     * - username: The custom username or userid
     *
     * @param array $parameters
     * @return array
     */
    public function unsuspend(array $parameters = [])
    {
        $this->initialize(array_replace($this->parameters, $parameters));
        $data = ["user" => $this->getUsername()];
        $this->httpAuthGet($this->getApiUrl() . "unsuspendacct", $data);
        // print_r("\n----response----\n");
        // print_r($this->response);
        // print_r("\n----data----\n");
        // print_r($this->data);
        $msg = "Sorry an error has occurred please try again in a few minutes.";
        if ((int)$this->isSuccessful() == 0) {
            if (is_array($this->data) && isset($this->data['result']['statusmsg'])) {
                $msg = trim((string)$this->data['result']['statusmsg']);
                if (preg_match('/account is NOT currently suspended \(status : (\w*) \)/', $msg, $matches)) {
                    if (trim($matches[1]) == '') {
                        $msg = "The account <b>" . $data["user"] . "</b> is NOT currently suspended";
                    } else {
                        // This account is NOT currently suspended (status : r ) .  .  
                        $msg = "The account <b>" . $data["user"] . "</b> is NOT currently suspended status: " . trim($matches[1]);
                    }
                }
            } elseif (strlen((string)$this->response) > 0) {
                $msg = trim((string)$this->response);
            }
            $this->message = [0, $msg];
        } elseif ((int)$this->isSuccessful() == 1) {
            // $msg = trim((string)$this->data);
            if (is_array($this->data) && isset($this->data['result']['statusmsg'])) {
                if (strlen((string)trim($this->data['result']['statusmsg'])) > 0) {
                    $this->message = [1, "The account <b>" . $data["user"] . "</b> has been activated successfully.<br/><i>Remember to wait 5 minutes while the server restarts to view the account.</i>"];
                }
            } elseif (strlen((string)$this->response) > 0) {
                $this->message = [1, trim((string)$this->response)];
            }
            $this->message = [1, $msg];
        } else {
            $this->message = [0, $msg];
        }
    }

    /**
     * Change the password of an (active) account
     *
     * Parameters:
     * - username: The custom username
     * - password: The new password
     *
     * @param array $parameters
     * @return array
     */
    public function password(array $parameters = [])
    {
        $this->initialize(array_replace($this->parameters, $parameters));
        $data = [
            "user" => $this->getUserName(),
            "pass" => $this->getPassword()
        ];
        $this->httpAuthGet($this->getApiUrl() . "passwd", $data);
        $msg = "Sorry an error has occurred please try again in a few minutes.";
        if (is_array($this->data) && isset($this->data['passwd']['status'])) {
            if ((int)($this->data['passwd']['status']) == 0) {
                $this->message = [0, "The password for account <b>" . $data["user"] . "</b> change failed."];
            } elseif (((int)($this->data['passwd']['status']) == 1) || (strpos($this->response, 'error occured changing this password') !== false)) {
                $this->message = [1, "The password for account <b>" . $data["user"] . "</b> has been changed successfully.<br/>Remember that changing the password is done equally for cPanel,FTP,MySQL"];
            } else {
                if (strlen((string)$this->response) > 0) {
                    $msg = (string)$this->response;
                }
                $this->message = [0, $msg];
            }
        } elseif ((int)$this->response == 0) {
            // response is null
            $this->message = [0, "The account <b>" . $data["user"] . "</b> does not exist."];
        } else {
            $this->message = [0, $msg];
        }
    }

    /**
     * Check whether a domain is available
     *
     * Parameters:
     * - domain: The domain name or subdomain to check
     *
     * @param array $parameters
     * @return bool
     */
    public function availability(array $parameters = [])
    {
        $this->initialize(array_replace($this->parameters, $parameters));
        $data = [
            "api_user" => $this->getApiUsername(),
            "api_key" => $this->getApiPassword(),
            "domain" => $this->getDomain(),
        ];
        $this->response = $this->httpGet($this->getApiUrl() . "checkavailable", $data);
        $this->parseResponse();
        $this->data = trim((string)$this->response);
        if ((int)$this->response == 1 && (string)$this->data == "1") {
            $this->message = [1, "The domain <b>" . $data["domain"] . "</b> is available to register."];
        } elseif ((int)$this->response == 0) {
            if (strlen((string)$this->response) == 1) {
                $this->message = [0, "The domain <b>" . $data["domain"] . "</b> is already registered."];
            } elseif (strlen((string)$this->response) > 1) {
                $this->message = [0, $this->data];
            }
        }
    }

    /**
     * Get All domains belonging to Account
     *
     * Parameters:
     * - username the VistaPanel username like uii_1992000
     *
     * @param array $parameters
     * @return array
     */
    public function getUserDomains(array $parameters = [])
    {
        $this->initialize(array_replace($this->parameters, $parameters));
        $data = [
            "api_user" => $this->getApiUsername(),
            "api_key" => $this->getApiPassword(),
            "username" => $this->getUserName(),
        ];
        $this->response = $this->httpGet($this->getApiUrl() . "getuserdomains", $data);
        $this->data = trim((string)$this->response);
        if ($this->data == "null") {
            $this->message = array(1, "The account <b>" . $data["username"] . "</b> does not exist.", []);
        } elseif (strpos($this->response, '[[') === 0) {
            // [["ACTIVE","doudou.uiisc.com"],["ACTIVE","doudoudzj.uiisc.com"]]
            // [["SUSPENDED","doudou.uiisc.com"],["SUSPENDED","foundation.pub"]]
            $this->domain = array_map(function ($item) {
                return ["status" => strtolower($item[0]), "domain" => strtolower($item[1])];
            }, json_decode($this->response, true));
            $str = "";
            foreach ($this->domain as $key=>$value) {
                $str .= "domain " . $key . ": <b>" . $value["status"] . "</b> - " . $value["domain"] . "<br/>";
            }
            $this->message = array(1, "The account <b>" . $data["username"] . "</b> has " . count($this->domain) . " domains.<br/>" . $str);
        } else {
            $this->message = array(0, $this->data);
        }
    }

    /**
     * Get the Status of Account
     *
     * @return string|null
     */
    public function getStatus()
    {
        if ($this->data != "null" && strpos($this->response, '[[') === 0) {
            $statuses = array_unique(array_map(function ($item) {
                return strtolower($item["status"]);
            }, $this->domain));
            // print_r($statuses);
            if (count($statuses) == 1) {
                return $statuses[0];
            } elseif (count($statuses) > 1) {
                return "The account domains have different statuses <b>" . $this->getUserName() . "</b>." . $this->data;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * Get the status of the account if the account is not active.
     *
     * The result is one of the following chars:
     * - x: suspended
     * - r: reactivating
     * - c: closing
     *
     * @return string
     */
    public function getAccountStatus()
    {
        return $this->status;
    }
}
