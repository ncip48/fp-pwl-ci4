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
abstract class BaseController extends Controller
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
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    /**
     * An custom response for api
     * @var msg
     * @var data
     * @var code
     * @var error
     */
    public function getResponse($msg, $data = [], $code = 200, $error = null)
    {
        $arr = [
            'msg' => $msg,
            'error' => $error,
            'data' => $data
        ];
        return $this->response->setStatusCode($code)->setJSON($arr);
    }

    /**
     * Mendapatkan status beasiswa
     * @var status
     * @return status
     */
    public function getStatusBeasiswa($status)
    {
        if ($status == 0) {
            return "Menunggu Persetujuan Kaprodi";
        } else if ($status == 1) {
            return "Menunggu Persetujuan Dekan";
        } else if ($status == 2) {
            return "Diterima";
        } else if ($status == 3) {
            return "Ditolak";
        }
    }

    public function getStatus($status)
    {
        if ($status == 0) {
            return "Diproses";
        } else if ($status == 1) {
            return "Diterima";
        } else if ($status == 2) {
            return "Ditolak";
        }
    }

    /**
     * Format date to indonesia
     * @var date
     * @var format
     * @return date
     */
    public function formatDateIndo($date, $format = "day monthLess year")
    {
        $date = date_create($date);
        // $result = "";
        $f = $format;

        $month = [
            "01" => "Januari",
            "02" => "Februari",
            "03" => "Maret",
            "04" => "April",
            "05" => "Mei",
            "06" => "Juni",
            "07" => "Juli",
            "08" => "Agustus",
            "09" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember",
        ];

        $monthLess = [
            "01" => "Jan",
            "02" => "Feb",
            "03" => "Mar",
            "04" => "Apr",
            "05" => "Mei",
            "06" => "Jun",
            "07" => "Jul",
            "08" => "Agu",
            "09" => "Sep",
            "10" => "Okt",
            "11" => "Nov",
            "12" => "Des",
        ];

        //if $f includes "day" then add date_format to $result
        if (str_contains($format, "day")) {
            $f = str_replace("day", date_format($date, "d"), $f);
        }

        //if $f includes "monthName" then add month name to $result
        if (str_contains($format, "monthName")) {
            $f = str_replace("monthName", $month[date_format($date, "m")], $f);
        }

        //if $f includes "monthLess" then add month name to $result
        if (str_contains($format, "monthLess")) {
            $f = str_replace("monthLess", $monthLess[date_format($date, "m")], $f);
        }

        //if $f includes "month" then add date_format to $result
        if (str_contains($format, "month")) {
            $f = str_replace("month", date_format($date, "m"), $f);
        }

        //if $f includes "year" then add date_format to $result
        if (str_contains($format, "year")) {
            $f = str_replace("year", date_format($date, "Y"), $f);
        }

        //if $f includes "hour" then add date_format to $result
        if (str_contains($format, "hour")) {
            $f = str_replace("hour", date_format($date, "H"), $f);
        }

        //if $f includes "minute" then add date_format to $result
        if (str_contains($format, "minute")) {
            $f = str_replace("minute", date_format($date, "i"), $f);
        }

        //if $f includes "second" then add date_format to $result
        if (str_contains($format, "second")) {
            $f = str_replace("second", date_format($date, "s"), $f);
        }

        return $f;
    }

    /**
     * Calculate duration between start and end
     * @var start
     * @var end
     * @return duration
     */
    public function calculateDuration($start, $end)
    {
        $start = date_create($start);
        $end = date_create($end);
        $diff = date_diff($start, $end);
        $day = $diff->format("%a");
        //if day more than 30 or 31 then calculate the month
        if ($day > 30) {
            $month = $diff->format("%m");
            //if month more than 12 then calculate the year
            if ($month > 12) {
                $year = $diff->format("%y");
                return $year . " tahun " . $month . " bulan";
            }
            return $month . " bulan";
        }
        return $diff->format("%a hari");
    }
}
