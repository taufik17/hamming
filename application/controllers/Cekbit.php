<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekbit extends CI_Controller {
	public function index()
	{
		$string = $this->input->post('data');
		$array = (explode(" ",$string));

		$bit = array();
		foreach ($array as $i => $j){
    	array_push($bit, $j);
		}
		$a = $bit[0];
		$b = $bit[1];
		$c = $bit[2];
		$d = $bit[3];
		$x = $bit[4];
		$y = $bit[5];
		$z = $bit[6];

		$p1 = $a ^ $b ^ $d;
		$p2 = $a ^ $c ^ $d;
		$p3 = $b ^ $c ^ $d;

		if($p1 == $x && $p2 == $y && $p3 == $z) // jika semua parity sama
		{
			$this->session->set_flashdata('info',
					'<div class="alert alert-success fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
						  <strong>Pesan Benar Parity Benar</strong> <br>
							pesan & parity = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.'
						</div>');
			redirect('hasil');
		}

		else if($p2 == $y && $p3 == $z) // jika parity x salah
		{
			$xkoreksi = $x ^ 1;
			$this->session->set_flashdata('info',
					'<div class="alert alert-warning fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
						  <strong>Pesan benar, parity salah di "x" karena terdapat 2 parity benar "y" dan "z"</strong><br>
							parity seharusnya : <br>
							x = '.$xkoreksi.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pesan & parity setelah koreksi = '.$a.' '.$b.' '.$c.' '.$d.' '.$xkoreksi.' '.$y.' '.$z.'
						</div>');
			redirect('hasil');
		}

		else if($p1 == $x && $p3 == $z) // jika parity y salah
		{
			$ykoreksi = $y ^ 1;
			$this->session->set_flashdata('info',
					'<div class="alert alert-warning fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
						  <strong>Pesan benar, parity salah di "y" karena terdapat 2 parity benar "x" dan "z"</strong><br>
							parity seharusnya : <br>
							x = '.$x.' <br>
							y = '.$ykoreksi.' <br>
							z = '.$z.' <br>
							pesan & parity setelah koreksi = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$ykoreksi.' '.$z.'
						</div>');
			redirect('hasil');
		}

		else if($p1 == $x && $p2 == $y) // jika parity z salah
		{
			$zkoreksi = $z ^ 1;
			$this->session->set_flashdata('info',
					'<div class="alert alert-warning fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
						  <strong>Pesan benar, parity salah di "z" karena terdapat 2 parity benar "x" dan "y"</strong><br>
							parity seharusnya : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$zkoreksi.' <br>
							pesan & parity setelah koreksi = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$zkoreksi.'
						</div>');
			redirect('hasil');
		}

		else if($p3 == $z) // jika pesan a salah
		{
			$akoreksi = $a ^ 1;
			$this->session->set_flashdata('info',
					'<div class="alert alert-warning fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
						  <strong>Pesan salah di "a" karena terdapat 2 parity salah "x" dan "y"</strong><br>
							Pesan seharusnya : <br>
							a = '.$akoreksi.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							pesan & parity setelah koreksi = '.$akoreksi.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.'
						</div>');
			redirect('hasil');
		}

		else if($p2 == $y) // jika pesan b salah
		{
			$bkoreksi = $b ^ 1;
			$this->session->set_flashdata('info',
					'<div class="alert alert-warning fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
						  <strong>Pesan salah di "b" karena terdapat 2 parity salah "x" dan "z"</strong><br>
							Pesan seharusnya : <br>
							a = '.$a.' <br>
							b = '.$bkoreksi.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							pesan & parity setelah koreksi = '.$a.' '.$bkoreksi.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.'
						</div>');
			redirect('hasil');
		}

		else if($p1 == $x) // jika pesan c salah
		{
			$ckoreksi = $c ^ 1;
			$this->session->set_flashdata('info',
					'<div class="alert alert-warning fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
						  <strong>Pesan salah di "c" karena terdapat 2 parity salah "y" dan "z"</strong><br>
							Pesan seharusnya : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$ckoreksi.' <br>
							d = '.$d.' <br>
							pesan & parity setelah koreksi = '.$a.' '.$b.' '.$ckoreksi.' '.$d.' '.$x.' '.$y.' '.$z.'
						</div>');
			redirect('hasil');
		}

		else
		{ // jika pesan d salah
			$dkoreksi = $d ^ 1;
			$this->session->set_flashdata('info',
					'<div class="alert alert-warning fade show" role="alert">
							data yang diinputkan = '.$a.' '.$b.' '.$c.' '.$d.' '.$x.' '.$y.' '.$z.' <br>
							pesan : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$d.' <br>
							dengan parity : <br>
							x = '.$x.' <br>
							y = '.$y.' <br>
							z = '.$z.' <br>
							pencocokkan parity dengan perhitungan : <br>
							p.x : a ⊕ b ⊕ d = '.$a.' ⊕ '.$b.' ⊕ '.$d.' => '.$p1.' <br>
							p.y : a ⊕ c ⊕ d = '.$a.' ⊕ '.$c.' ⊕ '.$d.' => '.$p2.' <br>
							p.z : b ⊕ c ⊕ d = '.$b.' ⊕ '.$c.' ⊕ '.$d.' => '.$p3.' <br>
							<strong>Pesan salah di "d" karena parity salah semua</strong><br>
							Pesan seharusnya : <br>
							a = '.$a.' <br>
							b = '.$b.' <br>
							c = '.$c.' <br>
							d = '.$dkoreksi.' <br>
							pesan & parity setelah koreksi = '.$a.' '.$b.' '.$c.' '.$dkoreksi.' '.$x.' '.$y.' '.$z.'
						</div>');
			redirect('hasil');
		}
	}
}
