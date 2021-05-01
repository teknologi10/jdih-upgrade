<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['url'];
	protected $uri;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		$this->uri = service('uri');
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		session();
		$this->beritaModel = new \App\Models\BeritaModel();
		$this->peraturanModel = new \App\Models\PeraturanModel();
		$this->perdesModel = new \App\Models\PerdesModel();
		$this->desaModel = new \App\Models\DesaModel();
		$this->kategoriModel = new \App\Models\KategoriModel();
		$this->topikModel = new \App\Models\TopikModel();
		$this->userModel = new \App\Models\UserModel();
		$this->raperdaModel = new \App\Models\RaperdaModel();
		$this->naskahModel = new \App\Models\NaskahModel();

		$this->db = \Config\Database::connect();


		// skrip statistik
		/**
		 * 1. cek di tabel counter, apakah ip tersebut sudah ada dan tgl = date('Y-m-d')
		 * 2. jika belum ada, maka insert ke tabel counter (ip=ip_user, tgl=date('Y-m-d'), hits=1)
		 * 3. jika sudah ada, maka update tabel counter, hits + 1, yang ip=ip_user dan tgl=date('Y-m-d')
		 */

		$ip = $request->getIPAddress();
		$tgl = date('Y-m-d');
	}
}
