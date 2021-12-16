<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_MONETARY, "id_ID");
    }

    //INTERNAL FUNCTION
    function set_session_msg($color = '', $msg = '')
    {
        if (!$color && !$msg) unset($_SESSION['msg']);

        $_SESSION['msg'] = [
            'color' => $color,
            'desc' => $msg
        ];
    }

    function upload_the_file($file, $mustUploaded = FALSE)
    {
        $filename = NULL;

        if (($file = $this->request->getFile('food_img')) != NULL) {
            if (!$file->isValid()) {
                $this->set_session_msg(
                    'red',
                    '[ERROR] Berkas upload tidak valid pada sisi server!'
                );
                return 'ERROR';
            }

            $filename = date('YmdHis') . $file->getName();
            if (!$file->move(ROOTPATH . 'public\images', $filename)) {
                $this->set_session_msg(
                    'red',
                    '[ERROR] Terdapat kesalahan dalam pemindahan berkas!'
                );
                return 'ERROR';
            }
        } else if ($mustUploaded) {
            $this->set_session_msg(
                'red',
                '[ERROR] Terdapat kesalahan saat membaca berkas!'
            );
            return 'ERROR';
        }
        return $filename;
    }
}
