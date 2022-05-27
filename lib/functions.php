<?php

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Functions
{
	public static function createSelectOptions2Array($array, $selected)
	{
		if (!is_array($array)) return "";

		$selected = is_array($selected) ? $selected : array($selected);
		$html	  = "";

		foreach ($array as $chave => $valor) {
			$sel = in_array($chave, $selected) ? "selected=\"selected\"" : "";
			$html .= "<option value=\"" . $chave . "\" " . $sel . ">" . $valor . "</option>\n";
		}

		return $html;
	}

	public static function now2Sql()
	{
		return date("Y-m-d H:i:s");
	}

	public static function return($url, $msg)
	{
		echo "<script language='javascript' type='text/javascript'>
        alert('" . $msg . "'); window.location.href='" . $url . "';
        </script>";
		die();
	}

	public static function redirect($url)
	{
		echo "<script language='javascript' type='text/javascript'>
        window.location.href='" . $url . "';
        </script>";
		die();
	}

	public static function validateHora($dado)
	{
		return preg_match("^([0-1][0-9]|[2][0-3]):[0-5][0-9]$^", $dado);
	}

	public static function calcPercentage($number, $total)
	{
		if ($total == 0) return 0.0;

		$total = ($number / $total) * 100;
		$total = round($total, 2);
		return $total;
	}

	public static function cutText($string, $limit = 150, $link)
	{
		if (strlen($string) > $limit) {
			$limit_text = substr($string, 0, $limit);
			$endPoint = strrpos($limit_text, ' ');
			$string = $endPoint ? substr($limit_text, 0, $endPoint) : substr($limit_text, 0);
			$string .= '... <a style="cursor: pointer;" href="' . $link . '" >leia mais</a>';
		}

		return $string;
	}

	public static function generateStringID()
	{
		$length = 6;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return strtoupper($randomString);
	}

	public static function generateNumberID()
	{
		return mt_rand(100000, 999999);
	}

	public static function gerarExcel($arquivo, $titulo, $arrayCabec, $arrayDados, $arrayOptions = array())
	{

		if (!$arquivo) $arquivo = "EXCEL-RELATORIO-" . date("Y-m-d_H-i-s") . ".xls";
		if (!$titulo) $titulo = "EXCEL RELATORIO " . date("Y-m-d_H-i-s");

		$qtdCol = is_array($arrayCabec) ? count($arrayCabec) : 0;
		$qtdLin = is_array($arrayDados) ? count($arrayDados) : 0;

		$retorno 	= isset($arrayOptions["retorno"]) 	 ? $arrayOptions["retorno"]    : "download";
		$corCabecBg = isset($arrayOptions["corCabecBg"]) ? $arrayOptions["corCabecBg"] : "#E0E0E0";
		$corCabecFn = isset($arrayOptions["corCabecFn"]) ? $arrayOptions["corCabecFn"] : "#000000";

		$excelHtmlCabec = "";

		for ($j = 0; $j < $qtdCol; $j++) $excelHtmlCabec .= "<th style='background-color:" . $corCabecBg . "; color: " . $corCabecFn . "'>" . $arrayCabec[$j] . "</th>\n";
		$excelHtmlDados = "";

		for ($i = 0; $i < $qtdLin; $i++) {
			$excelHtmlDados .= "<tr valign='top'>\n";
			for ($j = 0; $j < $qtdCol; $j++) $excelHtmlDados .= "<td>" . $arrayDados[$i][$j] . "</td>\n";
			$excelHtmlDados .= "</tr>\n";
		}

		$excelHtmlFinal = "<table border='1'>\n"
			. "<tr>\n"
			. "<td colspan='" . $qtdCol . "'><strong>" . $titulo . "</strong></td>\n"
			. "</tr>\n\n"
			. "<tr>\n"
			. "<td colspan='" . $qtdCol . "'>&nbsp;</td>\n"
			. "</tr>\n\n"
			. "<tr>\n"
			. $excelHtmlCabec
			. "</tr>\n\n"
			. $excelHtmlDados
			. "</table>\n";

		if ($retorno == "download") {
			header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
			header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
			header("Pragma: no-cache");
			header("Content-type: application/vnd.ms-excel");
			header("Content-type: application/force-download");
			header("Content-Disposition: attachment; filename=" . $arquivo);
			header("Content-Description: Excel File");

			echo utf8_decode($excelHtmlFinal);
			die();
		} elseif ($retorno == "html") return $excelHtmlFinal;
	}

	public static function getCurrentURL()
	{
		$protocolo  = (SIS_CONFIG_LOCALHOST ? 'http://' : 'https://');
		$host       = $_SERVER['HTTP_HOST'];
		$uri        = $_SERVER['REQUEST_URI'];
		$endereco   = $protocolo . $host . $uri;

		return $endereco;
	}

	public static function checkTimeInRange($tmsStart, $tmsEnd, $tmsTime)
	{
		$start 	= strtotime($tmsStart);
		$end 	= strtotime($tmsEnd);
		$time 	= strtotime($tmsTime);

		if ($start <= $time && $time <= $end) return true;
		else return false;
	}

	// ---------------------------------------------------------------
	// Notas Fiscais

	public static function validateData2API($dado)
	{
		if (is_null($dado) || trim($dado) == '' || $dado == false || !$dado || $dado == '-') return null;
		else return $dado;
	}

	public static function fusoHorarioEstado($dado)
	{
		if (is_null($dado) || $dado == '' || $dado == false || !$dado) return null;

		$estados_Fuso3 = ['SP', 'RJ', 'MG', 'ES', 'RS', 'PR', 'SC', 'BA', 'SE', 'AL', 'PE', 'PB', 'RN', 'CE', 'PI', 'MA', 'GO', 'TO', 'PA', 'DF', 'AP'];
		$estados_Fuso4 = ['MS', 'MT', 'RO', 'AM', 'RR'];
		$estados_Fuso5 = ['AC'];

		if (in_array($dado, $estados_Fuso3)) return "-3";
		if (in_array($dado, $estados_Fuso4)) return "-4";
		if (in_array($dado, $estados_Fuso5)) return "-5";
	}

	//FUNÇÃO RELACIONADA AO NCM PARA VER QUAL OPÇÃO O USUÁRIO SELECIONOU
	public static function selectedCSTeOrigem($array, $selected)
	{
		if (!is_array($array)) return "";
		$selected = is_array($selected) ? $selected : array($selected);
		$html = "";

		foreach ($array as $options => $valor) {
			$sel = in_array($options, $selected) ? "selected=\"selected\"" : "";
			$html .= "<option value=\"" . $options . "\" " . $sel . ">" . $valor . "</option>\n";
		}

		return $html;
	}

	// ---------------------------------------------------------------

	public static function createSelectOptionsWithData2Array($array, $selected)
	{
		if (!is_array($array)) return "";

		$selected = is_array($selected) ? $selected : array($selected);
		$html	  = "";

		foreach ($array as $chaves => $valor) {
			$chavesAux = explode("||", $chaves);
			$chave = $chavesAux[1];
			$data = $chavesAux[0];
			$sel = in_array($chave, $selected) ? "selected=\"selected\"" : "";
			$html .= "<option value=\"" . $chave . "\" data-id=\"" . $data . "\" " . $sel . ">" . $valor . "</option>\n";
		}

		return $html;
	}

	public static function add30min($dado)
	{
		// Soma 30 minutos e compara com o time de atualizacao do registro da nota.
		// Se já passou 30 minutos, retorna False, senao retorna True

		if (is_null($dado) || $dado == '') return null;

		$x = Functions::now2Sql();
		$x = new DateTime($x);
		$dado = strtotime("$dado + 30 minutes");
		$dado = date("Y-m-d H:i:s", $dado);
		$dado = new DateTime($dado);

		$intvl = $dado->diff($x);
		$instantes = array($intvl->y, $intvl->m, $intvl->d);

		$minutes = $intvl->i;

		foreach ($instantes as $i) {
			if ((int)$i > 0) return False;
		}

		if ((int)$intvl->h > 1) {
			return False;
		} else {
			if ((int)$intvl->h == 1) {
				if ((int)$minutes > 30) {
					return False;
				} else {
					$restante = 60 - $minutes;

					if (($restante + $minutes) > 30) {
						return False;
					} else {
						return True;
					}
				}
			}
			if ((int)$intvl->h == 0) {
				if ((int)$minutes > 30) {
					return False;
				} else {
					return True;
				}
			}
		}
	}

	// ---------------------------------------------------------------

	public static function createVerticalAnalysis($dado, $valor_base_calculo, $casas = 2)
	{
		if (empty($dado) || is_null($dado) || $dado == "" || $dado == 0.0 || empty($valor_base_calculo) || is_null($valor_base_calculo) || $valor_base_calculo == "" || $valor_base_calculo == 0.0 || $valor_base_calculo == 0.00) {
			return 0 . "%";
		} else {
			$analise_vertical = (($dado / $valor_base_calculo) * 100);
			$analise_vertical = number_format($analise_vertical, $casas, ",", "");
			return $analise_vertical . "%";
		}
	}

	// ---------------------------------------------------------------

	public static function createHorizontalAnalysis($dado_atual, $dado_anterior, $casas = 2)
	{
		if (empty($dado_atual) || is_null($dado_atual) || $dado_atual == "" || $dado_atual == 0.0 || empty($dado_anterior) || is_null($dado_anterior) || $dado_anterior == "" || $dado_anterior == 0.0 || $dado_anterior == 0.00) {
			return 0 . "%";
		} else {
			$analise_horizontal = (($dado_atual / $dado_anterior) - 1);
			$analise_horizontal = ($analise_horizontal * 100);
			$analise_horizontal = number_format($analise_horizontal, $casas, ",", "");
			return $analise_horizontal . "%";
		}
	}

	public static function returnSqlUnidade($unidade, $coluna, $arrUnidadesProprias)
	{
		$concat = "";

		if ($arrUnidadesProprias == 0 || $arrUnidadesProprias == null || $arrUnidadesProprias == '' || count($arrUnidadesProprias) == 0) {
			$strUnidadesProprias = 0;
		} else {
			$strUnidadesProprias = implode(',', $arrUnidadesProprias);
		}

		if ($unidade != 0 || $unidade != null || $unidade != '' || $unidade) $unidadeExiste = true;
		else $unidadeExiste = false;

		if ($unidadeExiste) {
			if ($coluna != 0 || $coluna != null || $coluna != '' || $coluna) {
				// unidades próprias
				if ($unidade == 'P') {
					$concat = " AND $coluna IN ($strUnidadesProprias) ";
				}
				// todas unidades
				else if ($unidade == "T" || $unidade == "%") {
					$concat = " AND $coluna NOT IN (1, 2, 3,4) ";
				}
				// unidades não próprias
				else if ($unidade == "NP") {
					$concat = " AND $coluna NOT IN ($strUnidadesProprias, 1, 2, 3,4)  ";
				}
				// unidade franqueadora
				else if ($unidade == "F" || $unidade == 1) {
					$concat = " AND $coluna IN (1) ";
				}
				// unidade homologação
				else if ($unidade == "H" || $unidade == 2) {
					$concat = " AND $coluna IN (2) ";
				}
				// unidade franqueado
				else {
					$concat = " AND $coluna = $unidade ";
				}
			}
		}

		return $concat;
	}

	public static function setDateToSql($mes, $ano)
	{
		$hoje = date('d');

		if ($hoje >= 22) {
			$dataIni = date("Y-m-d", mktime(0, 0, 0, $mes, '22', $ano));
			$dataFim = date("Y-m-t", mktime(0, 0, 0, $mes, '01', $ano));
			$periodo = '4ª Semana de ' . Format::formatMesesInteiros($mes) . ' de ' . $ano;
		} elseif ($hoje >= 15) {
			$dataIni = date("Y-m-d", mktime(0, 0, 0, $mes, '15', $ano));
			$dataFim = date("Y-m-d", mktime(0, 0, 0, $mes, '21', $ano));
			$periodo = '3ª Semana de ' . Format::formatMesesInteiros($mes) . ' de ' . $ano;
		} elseif ($hoje >= 8) {
			$dataIni = date("Y-m-d", mktime(0, 0, 0, $mes, '08', $ano));
			$dataFim = date("Y-m-d", mktime(0, 0, 0, $mes, '14', $ano));
			$periodo = '2ª Semana de ' . Format::formatMesesInteiros($mes) . ' de ' . $ano;
		} else {
			$dataIni = date("Y-m-d", mktime(0, 0, 0, $mes, '01', $ano));
			$dataFim = date("Y-m-d", mktime(0, 0, 0, $mes, '07', $ano));
			$periodo = '1ª Semana de ' . Format::formatMesesInteiros($mes) . ' de ' . $ano;
		}

		if (date("d", strtotime($dataIni)) <= '7') {
			$dataIni1 = date('Y-m-d', strtotime('-1 month', strtotime($dataIni)));
			$dataIni1 = date('Y-m-d', strtotime('+21 days', strtotime($dataIni1)));
			$dataFim1 = date('Y-m-t', strtotime($dataIni1));
		} else {
			$dataIni1 = date('Y-m-d', strtotime('-7 days', strtotime($dataIni)));
			$dataFim1 = date('Y-m-d', strtotime('+6 days', strtotime($dataIni1)));
		}
		if (date("d", strtotime($dataIni1)) <= '7') {
			$dataIni2 = date('Y-m-d', strtotime('-1 month', strtotime($dataIni1)));
			$dataIni2 = date('Y-m-d', strtotime('+21 days', strtotime($dataIni2)));
			$dataFim2 = date('Y-m-t', strtotime($dataIni2));
		} else {
			$dataIni2 = date('Y-m-d', strtotime('-7 days', strtotime($dataIni1)));
			$dataFim2 = date('Y-m-d', strtotime('+6 days', strtotime($dataIni2)));
		}
		if (date("d", strtotime($dataIni2)) <= '7') {
			$dataIni3 = date('Y-m-d', strtotime('-1 month', strtotime($dataIni2)));
			$dataIni3 = date('Y-m-d', strtotime('+21 days', strtotime($dataIni3)));
			$dataFim3 = date('Y-m-t', strtotime($dataIni3));
		} else {
			$dataIni3 = date('Y-m-d', strtotime('-7 days', strtotime($dataIni2)));
			$dataFim3 = date('Y-m-d', strtotime('+6 days', strtotime($dataIni3)));
		}

		return [
			'ini1' => $dataIni,
			'fim1' => $dataFim,
			'ini2' => $dataIni1,
			'fim2' => $dataFim1,
			'ini3' => $dataIni2,
			'fim3' => $dataFim2,
			'ini4' => $dataIni3,
			'fim4' => $dataFim3,
			'periodo' => $periodo,
		];
	}

	//function determinar as cores do background e borda da agenda-semana
	public static function toastCalendar($dado)
	{
		$colors = '#caffca #006400';
		//$dado é referente a função da funcionária
		if ($dado == 'Assistente de Esteticista') {
			$colors = '#caffca #006400';
			return $colors;
		}
		if ($dado == 'Fisioterapeuta') {
			$colors =  '#c99c77 #f27d0c';
			return $colors;
		}
		if ($dado == 'Esteticista') {
			$colors =  '#ffe6ff #800080';
			return $colors;
		}
		if ($dado == 'Biomédica') {
			$colors = '#d1e8ff #1e90ff';			
			return $colors;
		}
		if ($dado == 'Dentista') {
			$colors = '#fdf1ba #e3bc08';			
			return $colors;
		}
		if ($dado == 'Farmacêutica') {
			$colors =  '#ffcbdb #ff007f';
			return $colors;
		}
		if ($dado == 'Gerente Comercial') {
			$colors = '#c1c1c1 #1b1b1b';			
			return $colors;
		}
		if ($dado == 'Gerente Tecnica') {
			$colors = '#a56836 #b35803';			
			return $colors;
		}
		if ($dado == 'Manicure') {
			$colors = '#d1d8ff #1e22ff';			
			return $colors;
		}
		if ($dado == 'Nutricionista') {
			$colors = '#9efd9e #15df15';			
			return $colors;
		}
		if ($dado == 'Recepcionista') {
			$colors = '#f0de8e #8b7305';
			return $colors;
		}
		if ($dado == 'Franqueado') {
			$colors = '#c1c1c1 #1b1b1b';			
			return $colors;
		}
		return $colors;
	}
}

