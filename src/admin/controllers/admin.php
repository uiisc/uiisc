<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../admin.php");
    exit;
}

switch ($section) {
    case "main":
        $section_title = "Main";
        break;
    case "check_domain":
        $section_title = "Check domain";
        if (isset($_POST["do_check_domain"])) {
            $tsData = array(
                "domain" => setProtect(strtolower($_POST["domain"])),
            );
            if (!isset($tsData["domain"]) || empty($tsData["domain"])) {
                $message = [0, "The domain is required."];
            } elseif (strlen($tsData["domain"]) < 4) {
                $message = [0, "Enter a domain name or sub-domain."];
            } elseif (strlen($tsData["domain"]) > 50) {
                $message = [0, "The domain can not exceed 50 characters."];
            } elseif (!mb_ereg("^([a-zA-Z0-9]+).([a-zA-Z0-9-]+).([a-zA-Z]{2,4})$", $tsData["domain"])) {
                $message = [0, "The domain does not have a valid extension. Check it."];
            } elseif (preg_match("/(^.*)\.(tk)$/i", $tsData["domain"])) {
                // To not allow domains.tk
                $message = [0, "The domain extension is not allowed on this server."];
            } else {
                $client = Api::init($config);
                $client->availability(["domain" => $tsData["domain"]]);
                $message = $client->message;
            }
        }
        break;
    case "account_add":
        $section_title = "Account Add";
        if (isset($_POST["do_reg_account"])) {
            $tsData = [
                "username" => setProtect(strtolower($_POST["username"])),
                "password" => setProtect($_POST["password"]),
                "domain" => setProtect(strtolower($_POST["domain"])),
                "email" => setProtect(strtolower($_POST["email"])),
                "plan" => setProtect($_POST["plan"]),
            ];

            if (!isset($tsData["username"]) || empty($tsData["username"])) {
                $message = [0, "The Username is required"];
            } elseif (strlen($tsData["username"]) < 8 || strlen($tsData["username"]) > 12) {
                $message = [0, "The username must be 8 characters."];
            } elseif (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $tsData["username"])) {
                $message = [0, "The username does not allow strange characters."];
            } elseif (strlen($tsData["password"]) < 6 || strlen($tsData["password"]) > 35) {
                $message = [0, "Enter a minimum password of 6 to 35 characters."];
            } elseif (strlen($tsData["domain"]) < 4) {
                $message = [0, "Enter a domain name or sub-domain."];
            } elseif (strlen($tsData["domain"]) > 35) {
                $message = [0, "The domain can not exceed 35 characters."];
            } elseif (!mb_ereg("^([a-zA-Z0-9]+).([a-zA-Z0-9-]+).([a-zA-Z]{2,4})$", $tsData["domain"])) {
                $message = [0, "The domain does not have a valid extension. Check it."];
            } elseif (preg_match("/(^.*)\.(tk)$/i", $tsData["domain"])) {
                // To not allow domains.tk
                $message = [0, "Domain extension is not allowed on this server."];
            } elseif (!mb_ereg("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $tsData["email"])) {
                $message = [0, "The email does not have a valid format, check it."];
            } elseif (strlen($tsData["email"]) > 35) {
                $message = [0, "The email can not exceed 35 characters."];
            } elseif (empty($tsData["plan"])) {
                $message = [0, "You must select a hosting plan."];
            } else {
                $client = Api::init($config);
                $client->createAccount([
                    "username" => $tsData["username"], // A unique, 8 character identifier of the account.
                    "password" => $tsData["password"], // A password to login to the control panel, FTP MySQL and cPanel.
                    "domain" => $tsData["domain"], // Can be a subdomain or a custom domain.
                    "email" => $tsData["email"], // The email address of the user.
                    "plan" => $tsData["plan"], // A hosting plan for the account.
                ]);
                $message = $client->message;
            }
        }
        break;
    case "account_password":
        $section_title = "Account Password";
        if (isset($_POST["do_set_password"])) {
            $tsData = array(
                "username" => setProtect(strtolower($_POST["username"])),
                "password" => setProtect($_POST["password"]),
            );
            if (!isset($tsData["username"]) || empty($tsData["username"])) {
                $message = [0, "The username is required"];
            } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 8) {
                $message = [0, "The username must be 8 characters."];
            } elseif (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $tsData["username"])) {
                $message = [0, "The username does not allow strange characters."];
            } elseif (strlen($tsData["password"]) < 6 || strlen($tsData["password"]) > 35) {
                $message = [0, "Enter a minimum password of 6 to 35 characters."];
            } else {
                $client = Api::init($config);
                $client->password([
                    "username" => $tsData["username"],
                    "password" => $tsData["password"],
                    "enabledigest" => 1, // [enabledigest] Change the password in cPanel - FTP - MySQL
                ]);
                $message = $client->message;
            }
        }
        break;
    case "account_disable":
        $section_title = "Account Suspend";
        if (isset($_POST["do_disable_account"])) {
            $tsData = array(
                "username" => setProtect(strtolower($_POST["username"])),
                "reason" => setProtect($_POST["reason"]),
            );
            if (!isset($tsData["username"]) || empty($tsData["username"])) {
                $message = [0, "The username is required."];
            } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 8) {
                $message = [0, "The Username must be 8 characters"];
            } elseif (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $tsData["username"])) {
                $message = [0, "The Username does not allow strange characters"];
            } elseif (strlen($tsData["reason"]) < 10 || strlen($tsData["reason"]) > 60) {
                $message = [0, "You must enter a reason with a maximum of 60 characters"];
            } else {
                $client = Api::init($config);
                $client->suspend([
                    "username" => setProtect(strtolower($tsData["username"])),
                    "reason" => setProtect($tsData["reason"]),
                ]);
                $message = $client->message;
            }
        }
        break;
    case "account_active":
        $section_title = "Account Activate";
        if (isset($_POST["do_activate_account"])) {
            $tsData = array(
                "username" => setProtect(strtolower($_POST["username"])),
            );
            if (!isset($tsData["username"]) || empty($tsData["username"])) {
                $message = [0, "The username is required."];
            } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 8) {
                $message = [0, "The username is invalid (8 characters maximum)."];
            } elseif (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $tsData["username"])) {
                $message = [0, "The username does not allow strange characters.."];
            } else {
                $client = Api::init($config);
                $client->unsuspend(["username" => setProtect(strtolower($tsData["username"]))]);
                $message = $client->message;
            }
        }
        break;
    case "account_status":
        $section_title = "Account Status";
        if (isset($_POST["do_check_status"])) {
            $tsData = array(
                "username" => setProtect(strtolower($_POST["username"])),
            );
            if (!isset($tsData["username"]) || empty($tsData["username"])) {
                $message = [0, "The username is required."];
            } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 18) {
                $message = [0, "Enter a username that is valid."];
            } elseif (!preg_match("/^[a-zA-Z0-9-_]{4,16}$/", $tsData["username"])) {
                $message = [0, "The username does not allow strange characters."];
            } else {
                $client = Api::init($config);
                $client->getUserDomains(["username" => $tsData["username"]]);

                // if ($this->data != "null" && strpos($this->response, '[[') === 0) {
                //     $statuses = array_unique(array_map(function ($item) {
                //         return strtolower($item["status"]);
                //     }, $this->domain));
                //     // print_r($statuses);
                //     if (count($statuses) == 1) {
                //         return $statuses[0];
                //     } elseif (count($statuses) > 1) {
                //         return "The account domains have different statuses <b>" . $this->getUserName() . "</b>." . $this->data;
                //     } else {
                //         return null;
                //     }
                // } else {
                //     return null;
                // }
                if ($client->getStatus() === "active") {
                    $message = [1, "<b>The account </b> " . $tsData["username"] . " is Actived"];
                } elseif ($client->getStatus() === "suspend") {
                    $message = [1, "<b>The account </b> " . $tsData["username"] . " is Suspend"];
                } else {
                    "Cannot find the specified associated account";
                    $message = [0, "The account <b>" . $tsData["username"] . "</b> does not have associated accounts."];
                }
            }
        }
        break;
    case "account_domain":
        $section_title = "Account Domains";
        if (isset($_POST["do_get_domains"])) {
            $tsData = array(
                "username" => setProtect(strtolower($_POST["username"])),
            );
            if (!isset($tsData["username"]) || empty($tsData["username"])) {
                $message = [0, "The username is required."];
            } elseif (strlen($tsData["username"]) < 4 || strlen($tsData["username"]) > 18) {
                $message = [0, "Enter a username that is valid."];
            } elseif (!preg_match("/^[a-zA-Z0-9-_]{4,16}$/", $tsData["username"])) {
                $message = [0, "The username does not allow strange characters."];
            } else {
                $client = Api::init($config);
                $client->getUserDomains(["username" => $tsData["username"]]);
                $message = $client->message;
            }
        }
        break;
    case "account_list":
        $section_title = "Account List";
        include_once $ROOT . "/data/member.php";
        break;
    case "login":
        $section_title = "Admin Login";
        if (isset($_POST["do_login"])) {
            $username = setProtect(strtolower(trim($_POST["username"])));
            $password = setProtect(strtolower(trim($_POST["password"])));
            $captcha = setProtect(strtolower($_POST["captcha"]));
            if (!isset($username) || empty($username)) {
                $message = [0, "The username is required."];
            } elseif (!isset($password) || empty($password)) {
                $message = [0, "The password is required."];
            } elseif (!isset($captcha) || empty($captcha)) {
                $message = [0, "The captcha code is required."];
            } else {
                if (!isset($_SESSION["admincaptchacode"]) || $captcha != strtolower($_SESSION["admincaptchacode"])) {
                    $message = [0, "The captcha code is invalid."];
                } elseif ($username == $admin["username"] && $password == $admin["password"]) {
                    $_SESSION["is_login"] = true;
                    $is_admin = true;
                    $message = [1, "Login successfully. 2 seconds later redirect to the main page"];
                    header("refresh:2;url=admin.php");
                } else {
                    $is_admin = false;
                    $message = [0, "Login failed.Please check if the account or password is correct."];
                }
            }
        }
        break;
    case "logout":
        $section_title = "Admin Logout";
        unset($_SESSION);
        session_destroy();
        $message = [1, "Logout successfully. 2 seconds later redirect to the login page"];
        header("refresh:2;url=admin.php");
        break;
    default:
        $section_title = "Main";
}
