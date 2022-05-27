<?php

class Format
{

	public static function formatDadoVazio2Visivel($dado)
	{
		if (is_null($dado)) return NULL;
		$dado = is_string($dado) ? $dado : "" . $dado;
		return (!empty($dado) && !is_null($dado) && $dado != "" ? Format::formatTexto2Visivel($dado) : "-");
	}

	public static function formatTexto2Visivel($dado)
	{
		if (is_null($dado)) return NULL;
		return stripslashes(trim(strip_tags($dado)));
	}

	public static function formatSimNao($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "S":
				return "<span style='color:#1cc88a;'>Sim</span>";
				break;
			case "N":
				return "<span style='color:#e74a3b;'>Não</span>";
				break;
		}
	}

	public static function formatCnpj2Visivel($dado)
	{
		if (is_null($dado)) return NULL;
		if (!$dado) return "";
		return substr($dado, 0, 2) . "." . substr($dado, 2, 3) . "." . substr($dado, 5, 3) . "/" . substr($dado, 8, 4) . "-" . substr($dado, 12, 2);
	}

	public static function formatCnpj2Sql($dado)
	{
		if (is_null($dado)) return NULL;
		$dado = str_replace(".", "", $dado);
		$dado = str_replace(",", "", $dado);
		$dado = str_replace("/", "", $dado);
		$dado = str_replace("-", "", $dado);
		$dado = str_replace("\\", "", $dado);

		if (!is_numeric($dado)) $dado = "";

		return $dado;
	}

	public static function formatData2Visivel($dado, $pais = "BRA")
	{
		if (is_null($dado)) return NULL;
		if (($dado == "0000-00-00") || (!$dado)) return;

		if ($pais == "USA") $data = substr($dado, 5, 2) . "/" . substr($dado, 8, 2) . "/" . substr($dado, 0, 4);
		else $data = substr($dado, 8, 2) . "/" . substr($dado, 5, 2) . "/" . substr($dado, 0, 4);

		return $data;
	}

	public static function formatData2VisivelMesAno($dado, $pais = "BRA")
	{
		if (is_null($dado)) return NULL;
		if (($dado == "000000") || (!$dado)) return;

		if ($pais == "USA") $data = substr($dado, 5, 2) . "/" . substr($dado, 0, 4);
		else $data = substr($dado, 4, 2) . "/" . substr($dado, 0, 4);

		return $data;
	}

	public static function formatData2Complete($dado, $pais = "BRA")
	{
		if (is_null($dado)) return NULL;
		if (($dado == "0000-00-00") || (!$dado)) return;

		if ($pais == "USA") $data = substr($dado, 5, 2) . "/" . substr($dado, 8, 2) . "/" . substr($dado, 0, 4);
		else $data = substr($dado, 8, 2) . " de " . Format::formatMesesInteiros(substr($dado, 5, 2)) . " de " . substr($dado, 0, 4);

		return $data;
	}

	public static function formatData2Sql($dado, $pais = "BRA")
	{
		if (is_null($dado)) return NULL;
		$ano = substr($dado, 6, 4);

		if ($pais == "USA") {
			$mes = substr($dado, 0, 2);
			$dia = substr($dado, 3, 2);
		} else {
			$mes = substr($dado, 3, 2);
			$dia = substr($dado, 0, 2);
		}

		$vd = checkdate((int) $mes, (int) $dia, (int) $ano);

		if (($dado == "0000-00-00") || !$dado || !$vd) return "0000-00-00";

		return substr($dado, 6, 4) . "-" . substr($dado, 3, 2) . "-" . substr($dado, 0, 2);
	}

	public static function formatDataHora2Visivel($dado, $pais = "BRA")
	{
		if (is_null($dado)) return NULL;
		if (($dado == "0000-00-00") || (!$dado)) return;

		if ($pais == "USA") $data = substr($dado, 5, 2) . "/" . substr($dado, 8, 2) . "/" . substr($dado, 0, 4) . " " . substr($dado, 11, 5);
		else $data = substr($dado, 8, 2) . "/" . substr($dado, 5, 2) . "/" . substr($dado, 0, 4) . " " . substr($dado, 11, 5);

		return $data;
	}

	public static function formatDataHora2Sql($dado, $pais = "BRA")
	{
		if (is_null($dado)) return NULL;
		$ano = substr($dado, 6, 4);

		if ($pais == "USA") {
			$mes = substr($dado, 0, 2);
			$dia = substr($dado, 3, 2);
		} else {
			$mes = substr($dado, 3, 2);
			$dia = substr($dado, 0, 2);
		}

		$vd = checkdate((int) $mes, (int) $dia, (int) $ano);

		if (($dado == "0000-00-00 00:00:00") || !$dado || !$vd) return "0000-00-00";

		return substr($dado, 6, 4) . "-" . substr($dado, 3, 2) . "-" . substr($dado, 0, 2) . " " . substr($dado, 11);
	}

	public static function formatHora2Visivel($dado, $pais = "BRA")
	{
		if (is_null($dado)) return NULL;
		if (($dado == "0000-00-00") || (!$dado)) return;

		$data = substr($dado, 11, 5);

		return $data;
	}

	public static function formatFuncaoCor($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "Assistente de Esteticista":
				return "event-custom-green";
				break;
			case "Biomédica":
				return "event-custom-blue";
				break;
			case "Dentista":
				return "event-custom-yellow";
				break;
			case "Esteticista":
				return "event-custom-purple";
				break;
			case "Fisioterapeuta":
				return "event-custom-orange";
				break;
			case "Farmacêutica":
				return "event-custom-pink";
				break;
			case "Gerente Comercial":
				return "event-custom-black";
				break;
			case "Gerente Tecnica":
				return "event-custom-orange-dark";
				break;
			case "Manicure":
				return "event-custom-blue-dark";
				break;
			case "Nutricionista":
				return "event-custom-green-light";
				break;
			case "Recepcionista":
				return "event-custom-yellow-dark";
				break;
			case "Dermatologista":
				return "event-custom-pink";
				break;
			default:
				return "event-custom-purple";
		}
	}

	public static function formatMoeda2Input($dado, $tipo = "REAL", $casas = 2)
	{
		if (is_null($dado)) return NULL;
		if (!is_numeric($dado)) $dado = 0;

		if ($tipo == "DOLAR") {
			$dado = number_format($dado, $casas, ".", ",");
			return $dado;
		} else {
			$dado = number_format($dado, $casas, ",", ".");
			return $dado;
		}
	}

	public static function formatPct2Input($dado, $tipo = "REAL", $casas = 2)
	{
		if (is_null($dado)) return NULL;
		if (!is_numeric($dado)) $dado = 0;

		$dado = number_format($dado, $casas, ",", "");
		return $dado;
	}

	public static function formatMoeda2Visivel($dado, $tipo = "REAL", $casas = 2)
	{
		if (is_null($dado)) return NULL;
		if (!is_numeric($dado)) $dado = 0;

		if ($tipo == "DOLAR") {
			$dado = number_format($dado, $casas, ".", ",");
			return "US$ " . $dado;
		} else {
			$dado = number_format($dado, $casas, ",", ".");
			return "R$ " . $dado;
		}
	}

	public static function formatMoeda2Sql($dado, $casas = 2)
	{
		if (is_null($dado)) return NULL;
		if (!$dado) $dado = 0;

		if (strpos($dado, ",") !== false) {
			$tmp = explode(",", $dado);
			$int = $tmp[0];
			$ctv = isset($tmp[1]) ? $tmp[1] : "00";

			$dado = str_replace(".", "", $int) . "." . $ctv;
		}

		if (!is_numeric($dado)) $dado = 0;

		return number_format($dado, $casas, ".", "");
	}

	public static function formatStatusVendaPlanos($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "N":
				return "<span style='color:#277abe;'><strong>Novo</strong></span>";
				break;
			case "A":
				return "<span style='color:#1cc88a;'><strong>Aprovado</strong></span>";
				break;
			case "P":
				return "<span style='color:#FF9900;'><strong>Pendente</strong></span>";
				break;
			case "C":
				return "<span style='color:#e74a3b;'><strong>Cancelado</strong></span>";
				break;
			default:
				return "";
		}
	}

	public static function formatTipoDesconto($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "V":
				return "Valor (R$)";
				break;
			case "P":
				return "Porcentagem (%)";
				break;
			case "E":
				return "Desconto Especial (%)";
				break;
			default:
				return "";
		}
	}

	public static function formatUnidadeMedida($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "CJ":
				return "Conjunto";
				break;
			case "CX":
				return "Caixa";
				break;
			case "GR":
				return "Grama";
				break;
			case "KG":
				return "Kilograma";
				break;
			case "LT":
				return "Litro";
				break;
			case "MG":
				return "Miligrama";
				break;
			case "ML":
				return "Mililitro";
				break;
			case "MT":
				return "Metro";
				break;
			case "PC":
				return "Peça";
				break;
			case "UN":
				return "Unidade";
				break;
			default:
				return "";
		}
	}

	public static function formatUnidade($dado, $casas = 2)
	{
		if (is_null($dado)) return NULL;
		if (!is_numeric($dado)) $dado = 0;

		$dado = number_format($dado, $casas, ".", "");
		return $dado;
	}

	public static function formatHora2Sql($dataSQL, $horaSQL)
	{
		if (is_null($dataSQL)) return NULL;
		if (is_null($horaSQL)) return NULL;

		/*
		* dataSQL: 0000-00-00
		* horaSQL: 00:00
		*/

		$dado = $dataSQL . " " . $horaSQL . ":00";
		return $dado;
	}

	public static function formatFormaPagto($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "BO":
				return "Boleto";
				break;
			case "CC":
				return "Cartão de Crédito";
				break;
			case "CD":
				return "Cartão de Débito";
				break;
			case "DI":
				return "Dinheiro";
				break;
			case "PI":
				return "Pix";
				break;
			case "RE":
				return "Recorrência";
				break;
			default:
				return "";
		}
	}

	public static function formatFormaPagtoPedido($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "AV":
				return "À vista";
				break;
			case "CC":
				return "Cartão de Crédito";
				break;
			default:
				return "";
		}
	}

	public static function formatEstoqueTipoMovimentacao($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "E":
				return "<span style='color:#1cc88a;'>Entrada</span>";
				break;
			case "B":
				return "<span style='color:#e74a3b;'>Baixa</span>";
				break;
		}
	}

	public static function formatBaixaTipo($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "D":
				return "Doação";
				break;
			case "U":
				return "Uso e Consumo";
				break;
		}
	}

	public static function formatEstoqueAjusteSimNao($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "S":
				return "<span style='color:#e74a3b;'>Sim</span>";
				break;
			case "N":
				return "<span style='color:#858796;'>Não</span>";
				break;
		}
	}

	public static function formatPct2Visivel($dado, $casas = 2)
	{
		if (is_null($dado)) return NULL;
		if (!is_numeric($dado)) $dado = 0;

		$dado = number_format($dado, $casas, ",", "");
		return $dado . " %";
	}

	public static function formatTipoVenda($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "PR":
				return "Produtos";
				break;
			case "PL":
				return "Planos";
				break;
			case "SE":
				return "Serviços";
				break;
		}
	}

	public static function formatNivel($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 1:
				return "Franqueadora";
				break;
			case 2:
				return "Franqueado";
				break;
		}
	}

	public static function formatStatusPedido($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "Aguardando":
				return "<span style='color:#FF9900;'><strong>Aguardando</strong></span>";
				break;
			case "Rejeitado":
				return "<span style='color:#ff7400;'><strong>Rejeitado</strong></span>";
				break;
			case "Aguardando Confirmação":
				return "<span style='color:#674ea7;'><strong>Aguardando Confirmação</strong></span>";
				break;
			case "Confirmado":
				return "<span style='color:#277abe;'><strong>Confirmado</strong></span>";
				break;
			case "Em separação":
				return "<span style='color:#873B8D;'><strong>Em separação</strong></span>";
				break;
			case "Expedido":
				return "<span style='color:#858796;'><strong>Expedido</strong></span>";
				break;
			case "Entregue":
				return "<span style='color:#1cc88a;'><strong>Entregue</strong></span>";
				break;
			case "Cancelado":
				return "<span style='color:#e74a3b;'><strong>Cancelado</strong></span>";
				break;
			default:
				return "";
		}
	}

	public static function formatSexo($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "F":
				return "Feminino";
				break;
			case "M":
				return "Masculino";
				break;
			default:
				return "";
		}
	}

	public static function formatMesesAbrev($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 1:
				return "Jan";
				break;
			case 2:
				return "Fev";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Abr";
				break;
			case 5:
				return "Maio";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Ago";
				break;
			case 9:
				return "Set";
				break;
			case 10:
				return "Out";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Dez";
				break;
			default:
				return "";
		}
	}

	public static function formatMesesInteiros($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 1:
				return "Janeiro";
				break;
			case 2:
				return "Fevereiro";
				break;
			case 3:
				return "Março";
				break;
			case 4:
				return "Abril";
				break;
			case 5:
				return "Maio";
				break;
			case 6:
				return "Junho";
				break;
			case 7:
				return "Julho";
				break;
			case 8:
				return "Agosto";
				break;
			case 9:
				return "Setembro";
				break;
			case 10:
				return "Outubro";
				break;
			case 11:
				return "Novembro";
				break;
			case 12:
				return "Dezembro";
				break;
			default:
				return "";
		}
	}

	public static function formatNivelUsuario($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 1:
				return "Franqueadora";
				break;
			case 2:
				return "Franqueado";
				break;
			case 3:
				return "Franqueadora (ADM)";
				break;
			case 4:
				return "Franqueadora (BI)";
				break;
			case 5:
				return "Franqueadora (CEO)";
				break;
			case 6:
				return "Franqueadora (FIN)";
				break;
		}
	}

	public static function formatDiaSemana2PTBR($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 'Monday':
				return "Segunda-feira";
				break;
			case 'Tuesday':
				return "Terça-feira";
				break;
			case 'Wednesday':
				return "Quarta-feira";
				break;
			case 'Thursday':
				return "Quinta-feira";
				break;
			case 'Friday':
				return "Sexta-feira";
				break;
			case 'Saturday':
				return "Sábado";
				break;
			default:
				return "";
		}
	}

	public static function formatTipoTaxas($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "CD":
				return "Cartão de Débito";
				break;
			case "CC":
				return "Cartão de Crédito";
				break;
			case "AN":
				return "Antecipação";
				break;
		}
	}

	public static function formatOrigemVenda($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 1:
				return "Agendamento";
				break;
			case 2:
				return "Agendamento (Avaliação)";
				break;
			case 3:
				return "Agendamento (Cortesia)";
				break;
			case 4:
				return "Indicação";
				break;
			case 5:
				return "Ligação";
				break;
			case 6:
				return "Facebook";
				break;
			case 7:
				return "Instagram";
				break;
			case 8:
				return "Interesse Próprio";
				break;
			case 9:
				return "Parceria";
				break;
			case 10:
				return "Up Sell";
				break;
			case 11:
				return "Tráfego pago";
				break;
		}
	}

	public static function formatStatusPreAgendamento($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "A":
				return "<span>Aguardando</span>";
				break;
			case "E":
				return "<span>Em andamento</span>";
				break;
			case "D":
				return "<span>Descartado</span>";
				break;
			case "C":
				return "<span>Convertido</span>";
				break;
		}
	}

	public static function formatFileUpload2Sql($dado)
	{
		if (is_null($dado)) return NULL;
		$dado 		= preg_replace('/[áàãâä]/ui', 'a', $dado);
		$dado 		= preg_replace('/[éèêë]/ui', 'e', $dado);
		$dado 		= preg_replace('/[íìîï]/ui', 'i', $dado);
		$dado 		= preg_replace('/[óòõôö]/ui', 'o', $dado);
		$dado 		= preg_replace('/[úùûü]/ui', 'u', $dado);
		$dado 		= preg_replace('/[ç]/ui', 'c', $dado);
		$dado       = str_replace(' ', '_', $dado);
		$dado       = str_replace(",", "", $dado);
		$dado       = str_replace("/", "", $dado);
		$dado       = str_replace("-", "", $dado);
		$firstFile  = preg_replace('/\\.[^.\\s]{3,4}$/', '', $dado);
		$firstFile 	= strtolower($firstFile);
		$ext        = pathinfo($dado, PATHINFO_EXTENSION);

		if ($ext == "php") {
			print_r("erro");
		} else {
			$firstFilename  = "_" . $firstFile . "." . $ext;
			return $firstFilename;
		}
	}

	public static function formatTipoPlano($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 1:
				return "<span>Receitas</span>";
				break;
			case 2:
				return "<span>Despesas</span>";
				break;
			case 3:
				return "<span>Custos</span>";
				break;
			case 4:
				return "<span>Investimentos</span>";
				break;
			case 5:
				return "<span>Financiamento</span>";
				break;
		}
	}

	public static function formatStatusClassificacao($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "A":
				return "<span style='color:#1cc88a;'>Ativo</span>";
				break;
			case "D":
				return "<span style='color:#e74a3b;'>Desativado</span>";
				break;
		}
	}

	public static function formatProvTitulo($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "S":
				return "Provisão";
				break;
			case "N":
				return "Título";
				break;
		}
	}

	public static function formatAtivadoDesativado($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "A":
				return "<span style='color:#1cc88a;'>Ativado</span>";
				break;
			case "D":
				return "<span style='color:#e74a3b;'>Desativado</span>";
				break;
		}
	}

	public static function formatAvisoPendente($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "N":
				return "<span style='color:#1cc88a;'>Nenhuma Pendência</span>";
				break;
			case "A":
				return "<span style='color:#FFD933;'>Em Aviso</span>";
				break;
			case "C":
				return "<span style='color:#e74a3b;'>Contrato Pendente</span>";
				break;
		}
	}

	// ---------------------------------------------------------------
	// Notas Fiscais

	public static function formatStatusNotas($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "AG":
				return "<span style='color:#FF8C00;'><strong>Aguardando</strong></span>";
				break;
			case "CA":
				return "<span style='color:#e74a3b;'><strong>Cancelado</strong></span>";
				break;
			case "CO":
				return "<span style='color:#32CD32;'><strong>Concluído</strong></span>";
				break;
			case "DE":
				return "<span style='color:#FF8C00;'><strong>Denegado</strong></span>";
				break;
			case "RE":
				return "<span style='color:#20B2AA;'><strong>Rejeitado</strong></span>";
				break;
			case "PR":
				return "<span style='color:#20B2AA;'><strong>Processando</strong></span>";
				break;
			default:
				return "";
		}
	}

	public static function formatDDD($dado)
	{
		//Retorna o DDD de um telefone
		if (is_null($dado)) return NULL;

		$dado = explode(")", $dado);
		$dado = substr($dado[0], -2);

		return $dado;
	}

	public static function regimeTributario($dado)
	{
		if (is_null($dado) || $dado == "") return null;

		switch ($dado) {
		}
	}

	public static function formatStatusWebhook($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "CANCELADO":
				return "CA";
				break;
			case "CONCLUIDO":
				return "CO";
				break;
			case "REJEITADO":
				return "RE";
				break;
			default:
				return "";
		}
	}

	//PEGANDO DADOS E FAZENDO A FORMATAÇÃO PARA IMPRIMIR NA TABELA O DATA DO NCM E O NCM 
	public static function formatNcm($ncm, $dataNCM)
	{
		if (!is_null($ncm) && !empty($ncm) && $ncm != "") {
			if (!is_null($dataNCM) && !empty($dataNCM) && $dataNCM != "") {
				$dadosNCM = $ncm . "<hr>" . Format::formatData2Visivel($dataNCM);
				return $dadosNCM;
			} else {
				$dadosNCM = $ncm . $dataNCM;
				return $dadosNCM;
			}
		} else {
			if (!is_null($dataNCM) && !empty($dataNCM) && $dataNCM != "") {
				$dadosNCM = $ncm . Format::formatData2Visivel($dataNCM);
				return $dadosNCM;
			} else {
				$dadosNCM = $ncm . $dataNCM;
				return $dadosNCM;
			}
		}
	}

	//PEGANDO DADOS E FAZENDO A FORMATAÇÃO PARA IMPRIMIR NA TABELA O CST,ORIGEM
	public static function formatCstOrigem($cst, $origem)
	{
		if (!is_null($cst) && !empty($cst) && $cst != "") {
			if (!is_null($origem) && !empty($origem) && $origem != "") {
				$dadosCstOrigem = $cst . "<hr>" . $origem;
				return $dadosCstOrigem;
			} else {
				$dadosCstOrigem = $cst . $origem;
				return $origem;
			}
		} else {
			if (!is_null($origem) && !empty($origem) && $origem != "") {
				$dadosCstOrigem = $cst . $origem;
				return $dadosCstOrigem;
			} else {
				$dadosCstOrigem = $cst . $origem;
				return $dadosCstOrigem;
			}
		}
	}

	public static function formatDadoVazio2VisivelFiscais($dado)
	{
		if (is_null($dado)) return " - ";
		$dado = is_string($dado) ? $dado : "" . $dado;
		return (!empty($dado) && !is_null($dado) && $dado != "" ? Format::formatTexto2VisivelFiscais($dado) : "-");
	}

	public static function formatTexto2VisivelFiscais($dado)
	{
		if (is_null($dado)) return NULL;
		return $dado;
	}

	public static function formatTelefoneParte($telefone, $tipoRetorno = 'NUMERO')
	{
		/*
			tipoRetorno: NUMERO ou DDD
		*/

		if (is_null($telefone) || is_null($tipoRetorno)) return NULL;

		$telefone = trim($telefone);
		$telefoneAux = explode(" ", $telefone);

		$telefoneDDD = (!is_null($telefoneAux) ? $telefoneAux[0] : "");
		$telefoneDDD = str_replace("(", "", $telefoneDDD);
		$telefoneDDD = str_replace(")", "", $telefoneDDD);

		$telefoneNum = (!is_null($telefoneAux) ? $telefoneAux[1] : "");

		if ($tipoRetorno == "DDD") return $telefoneDDD;
		else return $telefoneNum;
	}

	public static function formatHistorico($dado)
	{
		if (is_null($dado) || is_null($dado)) return " - ";

		$msg = explode("|", $dado);
		$historico = "";
		$contador = 0;

		for ($i = 0; $i < count($msg); $i++) {
			if ($i == 0) {
				$historico = "<li> " . $msg[count($msg) - ($i + 1)] . "</li>";
			} else {
				$historico .= "<li>" . $msg[count($msg) - ($i + 1)] . "</li>";
			}

			if ($contador++ == 3) break;
		}

		return $historico;
	}

	// ---------------------------------------------------------------

	public static function formatEventoStatus($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "Agendado":
				return "<span style='color:#FF9900;'><strong>Agendado</strong></span>";
				break;
			case "Atendido":
				return "<span style='color:#1cc88a;'><strong>Atendido</strong></span>";
				break;
			case "Confirmado":
				return "<span style='color:#277abe;'><strong>Confirmado</strong></span>";
				break;
			case "Cancelado":
				return "<span style='color:#e74a3b;'><strong>Cancelado</strong></span>";
				break;
			case "Falhou":
				return "<span style='color:#e74a3b;'><strong>Falhou</strong></span>";
				break;
			default:
				return "";
		}
	}

	public static function formatUF($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "AC":
				return "Acre";
				break;
			case "AL":
				return "Alagoas";
				break;
			case "AP":
				return "Amapá";
				break;
			case "AM":
				return "Amazonas";
				break;
			case "BA":
				return "Bahia";
				break;
			case "CE":
				return "Ceará";
				break;
			case "DF":
				return "Distrito Federal";
				break;
			case "ES":
				return "Espírito Santo";
				break;
			case "GO":
				return "Goias";
				break;
			case "MA":
				return "Maranhão";
				break;
			case "MT":
				return "Mato Grosso";
				break;
			case "MS":
				return "Mato Grosso do Sul";
				break;
			case "MG":
				return "Minas Gerais";
				break;
			case "PA":
				return "Pará";
				break;
			case "PB":
				return "Paraíba";
				break;
			case "PR":
				return "Paraná";
				break;
			case "PE":
				return "Pernambuco";
				break;
			case "PI":
				return "Piauí";
				break;
			case "RJ":
				return "Rio de Janeiro";
				break;
			case "RN":
				return "Rio Grande do Norte";
				break;
			case "RS":
				return "Rio Grande do Sul";
				break;
			case "RO":
				return "Rondônia";
				break;
			case "RR":
				return "Roraima";
				break;
			case "SC":
				return "Santa Catarina";
				break;
			case "SP":
				return "São Paulo";
				break;
			case "SE":
				return "Sergipe";
				break;
			case "TO":
				return "Tocantins";
				break;
			default:
				return "";
		}
	}

	public static function formatCreditoDebito($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "D":
				return "Débito";
				break;
			case "C":
				return "Crédito";
				break;
		}
	}

	public static function formatStatus($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "A":
				return "<span style='color:#1cc88a;'>Ativo</span>";
				break;
			case "D":
				return "<span style='color:#e74a3b;'>Desativado</span>";
				break;
		}
	}

	public static function formatAlertaRelacao($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "G":
				return "Geral";
				break;
			case "U":
				return "Unidade";
				break;
			default:
				return "";
		}
	}

	public static function formatAlertaTipo($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "I":
				return "Informação";
				break;
			case "A":
				return "Atenção";
				break;
			case "C":
				return "Comunicado";
				break;
			case "U":
				return "Urgente";
				break;
			default:
				return "";
		}
	}

	public static function formatOrigemAbordagem($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case "1":
				return "Base de leads";
				break;
			case "2":
				return "Clientes ativos";
				break;
			case "3":
				return "Indicação";
				break;
			case "4":
				return "Ligação";
				break;
			case "5":
				return "Facebook";
				break;
			case "6":
				return "Instagram";
				break;
			case "7":
				return "WhatsApp";
				break;
			default:
				return "";
		}
	}

	public static function formatAbasSistema($dado)
	{
		if (is_null($dado)) return NULL;
		switch ($dado) {
			case 'GR':
				return '<label><i class="fas fa-chart-pie"></i> <b>Gráficos</b></label>';
				break;
			case 'CA':
				return '<label><i class="far fa-address-book"></i> <b>Cadastros</b></label>';
				break;
			case 'ES':
				return '<label><i class="fas fa-box-open"></i> <b>Estoque</b></label>';
				break;
			case 'FI':
				return '<label><i class="fas fa-dollar-sign"></i> <b>Financeiro</b></label>';
				break;
			case 'LI':
				return '<label><i class="fas fa-link"></i> <b>Links</b></label>';
				break;
			case 'NF':
				return '<label><i class="far fa-sticky-note"></i> <b>Notas Fiscais</b></label>';
				break;
			case 'PE':
				return '<label><i class="fas fa-shopping-cart"></i> <b>Pedido</b></label>';
				break;
			case 'PR':
				return '<label><i class="fas fa-tasks"></i> <b>Processos</b></label>';
				break;
			case 'RE':
				return '<label><i class="fas fa-chart-bar"></i> <b>Relatórios</b></label>';
				break;
			case 'CR':
				return '<label><i class="fa fa-address-book"></i> <b>CRM</b></label>';
				break;
		}
	}

	public static function formatMoeda2Pdf($dado, $tipo = "REAL")
	{
		if (!is_null($dado)) {
			if ($tipo == "DOLAR") {
				$dado = explode("US$ ", $dado);
				return $dado[1];
			} else {
				$dado = explode("R$ ", $dado);
				$dado = str_replace(".", "", $dado);
				$dado = str_replace(",", ".", $dado);
				return $dado[1];
			}
		} else {
			return 0.00;
		}
	}
}
