<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('word_limiter'))
{
	function word_limiter($str, $limit = 50){


		if (strpos($str, " ")) {
			$str_s = '';
			$ex_str = 	explode(" ", $str);
			if (count($ex_str) > $limit) {
				for ($i=0; $i < $limit; $i++) { 
					$str_s .= $ex_str[$i] . " "; 
				}
				return $str_s . "&hellip;";
			} else
			{return $str; }
		} else
		{
			return $str;
		}
	}
}
if ( ! function_exists('tanggal_indo'))
{
	function tanggal_indo($tanggal, $cetak_hari = false)
	{
		$hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);
		
		$bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}
}