<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'localhost'; // Set the hostname of your local email server
$config['smtp_port'] = 8025; // Set the port number of your local email server (default for MailHog)
$config['smtp_user'] = ''; // Leave empty for local development
$config['smtp_pass'] = ''; // Leave empty for local development
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";