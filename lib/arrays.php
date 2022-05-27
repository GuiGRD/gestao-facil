<?php

class Arrays
{
	public static function arraySimNao()
	{
		$arr = array(
			"S" => "Sim",
			"N" => "Não",
		);

		return $arr;
	}

	public static function arrayAtivoDesativado()
	{
		$arr = array(
			"A" => "Ativo",
			"D" => "Desativado",
		);

		return $arr;
	}

	public static function arrayProvisaoTitulo()
	{
		$arr = array(
			"S" => "Provisão",
			"N" => "Título",
		);

		return $arr;
	}

	public static function arrayPlanoTipo()
	{
		$arr = array(
			"12 Meses" => "12 Meses",
			"14 Meses" => "14 Meses",
		);

		return $arr;
	}

	public static function arrayFranqueadosTipo()
	{
		$arr = array(
			"Express" 	=> "Express",
			"Premium" 	=> "Premium",
			"Smart" 	=> "Smart",
		);

		return $arr;
	}

	public static function arrayUF()
	{
		$arr = array(
			"AC" => "Acre",
			"AL" => "Alagoas",
			"AP" => "Amapá",
			"AM" => "Amazonas",
			"BA" => "Bahia",
			"CE" => "Ceará",
			"DF" => "Distrito Federal",
			"ES" => "Espírito Santo",
			"GO" => "Goias",
			"MA" => "Maranhão",
			"MT" => "Mato Grosso",
			"MS" => "Mato Grosso do Sul",
			"MG" => "Minas Gerais",
			"PA" => "Pará",
			"PB" => "Paraíba",
			"PR" => "Paraná",
			"PE" => "Pernambuco",
			"PI" => "Piauí",
			"RJ" => "Rio de Janeiro",
			"RN" => "Rio Grande do Norte",
			"RS" => "Rio Grande do Sul",
			"RO" => "Rondônia",
			"RR" => "Roraima",
			"SC" => "Santa Catarina",
			"SP" => "São Paulo",
			"SE" => "Sergipe",
			"TO" => "Tocantins"
		);

		return $arr;
	}

	public static function arrayUFSigla()
	{
		$arr = array(
			"AC" => "AC",
			"AL" => "AL",
			"AP" => "AP",
			"AM" => "AM",
			"BA" => "BA",
			"CE" => "CE",
			"DF" => "DF",
			"ES" => "ES",
			"GO" => "GO",
			"MA" => "MA",
			"MT" => "MT",
			"MS" => "MS",
			"MG" => "MG",
			"PA" => "PA",
			"PB" => "PB",
			"PR" => "PR",
			"PE" => "PE",
			"PI" => "PI",
			"RJ" => "RJ",
			"RN" => "RN",
			"RS" => "RS",
			"RO" => "RO",
			"RR" => "RR",
			"SC" => "SC",
			"SP" => "SP",
			"SE" => "SE",
			"TO" => "TO"
		);

		return $arr;
	}

	public static function arrayUnidade()
	{
		$arr = array(
			"1" => "Cruzeiro",
		);

		return $arr;
	}

	public static function arrayPlano()
	{
		$arr = array(
			"Plano" => "Plano",
		);

		return $arr;
	}

	public static function arrayEventoStatus()
	{
		$arr = array(
			"Agendado" 		=> "Agendado",
			"Confirmado" 	=> "Confirmado",
			"Atendido" 		=> "Atendido",
			"Cancelado" 	=> "Cancelado",
			"Falhou" 		=> "Falhou",
		);

		return $arr;
	}

	public static function arrayFuncao()
	{
		$arr = array(
			"Assistente de Esteticista" 	=> "Assistente de Esteticista",
			"Biomédica" 					=> "Biomédica",
			"Dentista" 						=> "Dentista",
			"Esteticista" 					=> "Esteticista",
			"Fisioterapeuta" 				=> "Fisioterapeuta",
			"Farmacêutica" 					=> "Farmacêutica",
			"Gerente Comercial" 			=> "Gerente Comercial",
			"Gerente Tecnica" 				=> "Gerente Tecnica",
			"Manicure" 						=> "Manicure",
			"Nutricionista" 				=> "Nutricionista",
			"Recepcionista" 				=> "Recepcionista",
			"Franqueado" 					=> "Franqueado",
			"Dermatologista" 				=> "Dermatologista",
		);

		return $arr;
	}

	public static function arrayFuncaoCor()
	{
		$arr = array(
			"Assistente de Esteticista" 	=> "dh-event-custom-green",
			"Biomédica" 					=> "dh-event-custom-blue",
			"Dentista" 						=> "dh-event-custom-yellow",
			"Esteticista" 					=> "dh-event-custom-purple",
			"Fisioterapeuta" 				=> "dh-event-custom-orange",
			"Farmacêutica" 					=> "dh-event-custom-pink",
			"Gerente Comercial" 			=> "dh-event-custom-black",
			"Gerente Tecnica" 				=> "dh-event-custom-orange-dark",
			"Manicure" 						=> "dh-event-custom-blue-dark",
			"Nutricionista" 				=> "dh-event-custom-green-light",
			"Recepcionista" 				=> "dh-event-custom-yellow-dark",
			"Franqueado" 					=> "dh-event-custom-black",
		);

		return $arr;
	}

	public static function arrayEquipamento()
	{
		$arr = array(
			"Ascua - Luz Intensa Pulsa" 	=> "Ascua - Luz Intensa Pulsa",
			"Hygiapulse - Ondas de Choque" 	=> "Hygiapulse - Ondas de Choque",
			"Hygialux - LED" 				=> "Hygialux - LED",
			"Hygiadermo Acqua" 				=> "Hygiadermo Acqua",
			"Kavix Avatar" 					=> "Kavix Avatar",
			"ASCUA - LUZ INTENSA PULSADA" 	=> "ASCUA - LUZ INTENSA PULSADA",
		);

		return $arr;
	}


	public static function arrayTipoPlanoCustos()
	{
		$arr = array(
			"1" 		=> "Receitas",
			"2" 		=> "Despesas",
			"3" 		=> "Custos",
			"4" 		=> "Investimentos",
			"5" 		=> "Financiamento"
		);

		return $arr;
	}

	public static function arrayClassificacao()
	{
		$arr = array(
			"DESPESA COM PRODUTOS" 		=> "DESPESA COM PRODUTOS",
			"DESPESA COM SERVIÇOS" 		=> "DESPESA COM SERVIÇOS",
			"DESPESA FINANCEIRAS" 		=> "DESPESA FINANCEIRAS",
			"DESPESA COM RH" 			=> "DESPESA COM RH",
			"DESPESAS OPERACIONAIS" 	=> "DESPESAS OPERACIONAIS",
			"DESPESA COM MARKETING" 	=> "DESPESA COM MARKETING",
			"IMPOSTOS" 					=> "IMPOSTOS",
			"INVESTIMENTOS" 			=> "INVESTIMENTOS",
			"RECEITA COM PRODUTOS" 		=> "RECEITA COM PRODUTOS",
			"RECEITA COM SERVIÇOS" 		=> "RECEITA COM SERVIÇOS",
			"RECEITA COM PLANOS" 		=> "RECEITA COM PLANOS",
			"RECEITA NÃO OPERACIONAIS" 	=> "RECEITA NÃO OPERACIONAIS",
		);

		return $arr;
	}

	public static function arrayStatusVendaPlanos()
	{
		$arr = array(
			"N" => "Novo",
			"P" => "Pendente",
			"A" => "Aprovado",
			"C" => "Cancelado",
		);

		return $arr;
	}

	public static function arrayTipoDesconto()
	{
		$arr = array(
			"V" => "Valor (R$)",
			"P" => "Porcentagem (%)",
		);

		return $arr;
	}

	public static function arrayUnidadeMedida()
	{
		$arr = array(
			'CJ' => 'Conjunto',
			'CX' => 'Caixa',
			'GR' => 'Grama',
			'KG' => 'Kilograma',
			'LT' => 'Litro',
			'MG' => 'Miligrama',
			'ML' => 'Mililitro',
			'MT' => 'Metro',
			'PC' => 'Peça',
			'UN' => 'Unidade',
		);

		return $arr;
	}

	public static function arrayFormaPagto()
	{
		$arr = array(
			"BO" 	=> "Boleto",
			"CC" 	=> "Cartão de Crédito",
			"CD" 	=> "Cartão de Débito",
			"DI" 	=> "Dinheiro",
			"PI" 	=> "Pix",
			"RE" 	=> "Recorrência",
		);

		return $arr;
	}

	public static function arrayFormaPagtoPedido()
	{
		$arr = array(
			"AV" 	=> "À vista",
			"CC" 	=> "Cartão de Crédito",
		);

		return $arr;
	}

	public static function arrayParcelas()
	{
		$arr = array(
			"1"	 => "1x",
			"2"	 => "2x",
			"3"	 => "3x",
			"4"	 => "4x",
			"5"	 => "5x",
			"6"	 => "6x",
			"7"	 => "7x",
			"8"	 => "8x",
			"9"	 => "9x",
			"10" => "10x",
			"11" => "11x",
			"12" => "12x",
		);

		return $arr;
	}

	public static function arrayParcelasPedido()
	{
		$arr = array(
			"1"	 => "1x",
			"2"	 => "2x",
			"3"	 => "3x",
		);

		return $arr;
	}

	public static function arrayTipoVenda()
	{
		$arr = array(
			"PL" => "Plano",
			"SE" => "Serviço",
			"PR" => "Produto",
		);

		return $arr;
	}

	public static function arrayEstoqueTipoMovimentacao()
	{
		$arr = array(
			"E" => "Entrada",
			"B" => "Baixa",
		);

		return $arr;
	}

	public static function arrayBaixaTipo()
	{
		$arr = array(
			"D" => "Doação",
			"U" => "Uso e Consumo",
		);

		return $arr;
	}

	public static function arrayAnos()
	{
		$arr = array(
			2017 => "2017",
			2018 => "2018",
			2019 => "2019",
			2020 => "2020",
			2021 => "2021",
			2022 => "2022",
		);

		return $arr;
	}

	public static function arrayMeses()
	{
		$arr = array(
			1 	=> "Janeiro",
			2 	=> "Fevereiro",
			3 	=> "Março",
			4 	=> "Abril",
			5 	=> "Maio",
			6 	=> "Junho",
			7 	=> "Julho",
			8 	=> "Agosto",
			9 	=> "Setembro",
			10 	=> "Outubro",
			11 	=> "Novembro",
			12 	=> "Dezembro"
		);

		return $arr;
	}

	public static function arrayNivel()
	{
		$arr = array(
			1 => "Franqueadora",
			2 => "Franqueado",
		);

		return $arr;
	}

	public static function arrayStatusPedido()
	{
		$arr = array(
			"Aguardando" 	=> "Aguardando",
			"Rejeitado" 	=> "Rejeitado",
			"Aguardando Confirmação" => "Aguardando Confirmação",
			"Confirmado" 	=> "Confirmado",
			"Em separação" 	=> "Em separação",
			"Expedido" 		=> "Expedido",
			"Entregue" 		=> "Entregue",
			"Cancelado" 	=> "Cancelado",
		);

		return $arr;
	}

	public static function arraySimplesStatusPedido()
	{
		$arr = array(
			"Aguardando",
			"Rejeitado",
			"Aguardando Confirmação",
			"Confirmado",
			"Em separação",
			"Expedido",
			"Entregue",
			"Cancelado",
		);

		return $arr;
	}

	public static function arraySexo()
	{
		$arr = array(
			"F" => "Feminino",
			"M" => "Masculino",
		);

		return $arr;
	}

	public static function arrayMesesAbrev()
	{
		$arr = array(
			1 	=> "Jan",
			2 	=> "Fev",
			3 	=> "Mar",
			4 	=> "Abr",
			5 	=> "Maio",
			6 	=> "Jun",
			7 	=> "Jul",
			8 	=> "Ago",
			9 	=> "Set",
			10 	=> "Out",
			11 	=> "Nov",
			12 	=> "Dez"
		);

		return $arr;
	}

	public static function arrayNivelUsuario()
	{
		$arr = array(
			2 => "Franqueado",
			1 => "Franqueadora",
			3 => "Franqueadora (ADM)",
			4 => "Franqueadora (BI)",
			5 => "Franqueadora (CEO)",
			6 => "Franqueadora (FIN)",
		);

		return $arr;
	}

	public static function arrayTipoLancamento()
	{
		$arr = array(
			1 => "Receita",
			2 => "Despesas",
		);

		return $arr;
	}

	public static function arrayOrigem()
	{
		$arr = array(
			"Boleto"			=> "Boleto",
			"Conta Corrente"	=> "Conta Corrente",
			"Link"				=> "Link",
		);

		return $arr;
	}

	public static function tipoTaxa()
	{
		$arr = array(
			"Cartão de crédito" => "Cartão de crédito",
			"Cartão de débito"	=> "Cartão de débito",
			"Antecipação"	    => "Antecipação",
		);

		return $arr;
	}

	public static function arrayRecorrencia()
	{
		$arr = array(
			"Semanal"			=> "Semanal",
			"Quinzenal"			=> "Quinzenal",
			"Mensal"			=> "Mensal",
		);

		return $arr;
	}

	public static function arrayOrigemVenda()
	{
		$arr = array(
			1 => "Agendamento",
			2 => "Agendamento (Avaliação)",
			3 => "Agendamento (Cortesia)",
			4 => "Indicação",
			5 => "Ligação",
			6 => "Facebook",
			7 => "Instagram",
			8 => "Interesse próprio",
			9 => "Parceria",
			10 => "Up Sell",
			11 => "Tráfego pago",
			12 => "WhatsApp",
		);

		return $arr;
	}

	public static function arrayOrigemAbordagem()
	{
		$arr = array(
			1 => "Base de leads",
			2 => "Clientes ativos",	
			3 => "Indicação",
			4 => "Ligação",
			5 => "Facebook",
			6 => "Instagram",
			7 => "WhatsApp",
			// 8 => "",
			// 9 => "",
			// 10 => "",
			// 11 => "",
			// 12 => "",
		);

		return $arr;
	}

	public static function arrayAvisoPendente()
	{
		$arr = array(
			"N"			=> "Nenhuma Pendência",
			"A"			=> "Em Aviso",
			"C"			=> "Contrato Pendente",
		);

		return $arr;
	}

	// ------------------------------------------------------------------------
	// NOTA FISCAL

	public static function arrayNotasStatusNFS()
	{
		$arr = array(
			"AG" => "Aguardando",
			"CA" => "Cancelado",
			"CO" => "Concluido",
			"DE" => "Denegado",
			"RE" => "Rejeitado",
			"PR" => "Processando",
		);

		return $arr;
	}

	public static function arrayNotasStatusNFC()
	{
		$arr = array(
			"AG" => "Aguardando",
			"CA" => "Cancelado",
			"CO" => "Concluido",
			"RE" => "Rejeitado",
		);

		return $arr;
	}

	public static function arrayTributacao()
	{
		$arr = array(
			"Simples Nacional" => "Simples Nacional",
			"Fixo" => "Fixo",
			"Depósito em Juízo" => "Depósito em Juízo",
			"Exigibilidade Suspensa por Decisão Judicial" => "Exigibilidade Suspensa por Decisão Judicial",
			"Exigibilidade Suspensa por Procedimento Administrativo" => "Exigibilidade Suspensa por Procedimento Administrativo",
			"Isenção Parcial" => "Isenção Parcial",
		);

		return $arr;
	}

	public static function arrayRegimeTributario()
	{
		$arr = array(
			"Normal - Lucro Real" => "Normal - Lucro Real",
			"Normal - Lucro Presumido" => "Normal - Lucro Presumido",
			"Simples Nacional - Excesso" => "Simples Nacional - Excesso",
			"Simples Nacional" => "Simples Nacional",
			"Nenhum" => "Nenhum",
		);

		return $arr;
	}

	public static function arrayRegimeTributarioAdotado()
	{
		$arr = array(
			"Sem Regime Tributário Especial" => "Sem Regime Tributário Especial",
			"Micro Empresa Municipal" => "Micro Empresa Municipal",
			"Estimativa" => "Estimativa",
			"Sociedade de Profissionais" => "Sociedade de Profissionais",
			"Cooperativa" => "Cooperativa",
			"Micro Empresário Individual - MEI" => "Micro Empresário Individual - MEI",
			"Micro Empresa ou Pequeno Porte - ME EPP" => "Micro Empresa ou Pequeno Porte - ME EPP",
		);

		return $arr;
	}

	public static function arrayTipoTributacao()
	{
		$arr = array(
			"Isento de ISS" => "Isento de ISS",
			"Imune" => "Imune",
			"Não Incidência no Município" => "Não Incidência no Município",
			"Não Tributável" => "Não Tributável",
			"Retido" => "Retido",
			"Tributável Dentro do Município" => "Tributável Dentro do Município",
			"Tributável Fora do Município" => "Tributável Fora do Município",
			"Tributável Dentro do Município pelo Tomador" => "Tributável Dentro do Município pelo Tomador",
		);

		return $arr;
	}

	public static function arrayISS()
	{
		$arr = array(
			"Exigível" => "Exigível",
			"Não Incidência" => "Não Incidência",
			"Isenção" => "Isenção",
			"Exportação" => "Exportação",
			"Imunidade" => "Imunidade",
			"Suspenso por Ação Judicial" => "Suspenso por Ação Judicial",
			"Suspenso por Ação Administrativa" => "Suspenso por Ação Administrativa",
		);

		return $arr;
	}

	public static function arrayTipoLogradouro()
	{
		$arr = array(
			"Alameda" => "Alameda",
			"Avenida" => "Avenida",
			"Chácara" => "Chácara",
			"Colônia" => "Colônia",
			"Condomínio" => "Condomínio",
			"Eqnp" => "Eqnp",
			"Estância" => "Estância",
			"Estrada" => "Estrada",
			"Fazenda" => "Fazenda",
			"Praça" => "Praça",
			"Prolongamento" => "Prolongamento",
			"Rodovia" => "Rodovia",
			"Rua" => "Rua",
			"Sítio" => "Sítio",
			"Travessa" => "Travessa",
			"Vicinal" => "Vicinal",
		);

		return $arr;
	}

	public static function arrayTipoBairro()
	{
		$arr = array(
			"Bairro" => "Bairro",
			"Bairro" => "Bairro",
			"Chácara" => "Chácara",
			"Conjunto" => "Conjunto",
			"Desmembramento" => "Desmembramento",
			"Distrito" => "Distrito",
			"Favela" => "Favela",
			"Fazenda" => "Fazenda",
			"Gleba" => "Gleba",
			"Horto" => "Horto",
			"Jardim" => "Jardim",
			"Loteamento" => "Loteamento",
			"Núcleo" => "Núcleo",
			"Parque" => "Parque",
			"Residencial" => "Residencial",
			"Sítio" => "Sítio",
			"Tropical" => "Tropical",
			"Vila" => "Vila",
			"Zona" => "Zona",
			"Centro" => "Centro",
			"Setor" => "Setor",
		);

		return $arr;
	}

	public static function arrayTipoData()
	{
		$arr = array(
			"VD" => "Data da venda",
			"EM" => "Data de emissão",
			"EV" => "Data de envio",
		);

		return $arr;
	}

	public static function arrayCsosn()
	{
		$arr = array(
			"102" => "102 - Tributação pelo Simples sem Permissão de Crédito",
			"103" => "103 - Isenção do ICMS no Simples para receita bruta",
			"201" => "201 - Simples Nacional com Permissão de Crédito e ICMS por Substituição Tributária",
			"202" => "202 - Simples Nacional sem Permissão de crédito e com cobrança de ICMS por substituição tributária",
			"203" => "203 - Isenção do ICMS no Simples para faixa da Receita Bruta e com cobrança de ICMS por substituição tributária",
			"300" => "300 - Imunidade",
			"400" => "400 - Não tributado pelo Simples",
			"500" => "500 - ICMS cobrado anteriormente por substituição",
			"900" => "900 - Outros"
		);

		return $arr;
	}

	public static function arrayOrigemDadosTributarios()
	{
		$arr = array(
			"1" 	=> "1 - Estrangeira - Importação direta",
			"2" 	=> "2 - Estrangeira - Adquirida no mercado interno",
			"3"		=> "3 - Nacional, produto com conteúdo de importação entre 40% e 70%",
			"4" 	=> "4 - Nacional, produzido em conformidade com as legislações citadas nos Ajustes",
			"5" 	=> "5 - Nacional, produto com conteúdo de importação inferior ou igual a 40%",
			"8" 	=> "8 - Nacional, produto com conteúdo de importação superior a 70%",
		);

		return $arr;
	}

	public static function arrayCreditoDebito()
	{
		$arr = array(
			"C" => "Crédito",
			"D" => "Débito",
		);

		return $arr;
	}

	// ------------------------------------------------------------------------

	public static function arrayUnidadeEspecialista()
	{
		$arr = array(
			"Natani Muller" 	=> "Natani Muller",
			"Aurélia Campos" 	=> "Aurélia Campos",
			"Alex Lopes" 		=> "Alex Lopes",
			"Pamela Soares" 	=> "Pamela Soares",
			"Mayara Joice" 		=> "Mayara Joice",
		);
		
		return $arr;
	}

	public static function arrayStatus()
	{
		$arr = array(
			"A" => "Ativo",
			"D" => "Desativado",
		);

		return $arr;
	}

	public static function arrayAlertaRelacao()
	{
		$arr = array(
			"G" => "Geral",
			"U" => "Unidade",
		);
		
		return $arr;
	}

	public static function arrayAlertaTipo()
	{
		$arr = array(
			"I" => "Informação",
			"A" => "Atenção",
			"C" => "Comunicado",
			"U" => "Urgente",
		);
		
		return $arr;
	}

	public static function arrayTipoDescontoNovo($vlrDesconto, $action)
	{
		if($vlrDesconto > 0) {
			if($action == "atualizar") {
				$arr = array(
					"V" => "Valor (R$)",
					"P" => "Porcentagem (%)",
					"E" => "Desconto Especial (%)",
				);
			}
			else {
				$arr = array(
					"P" => "Porcentagem (%)",
					"E" => "Desconto Especial (%)",
				);
			}
		}
		else {
			if($action == "atualizar") {
				$arr = array(
					"V" => "Valor (R$)",
					"P" => "Porcentagem (%)",
				);
			}
			else {
				$arr = array(
					"P" => "Porcentagem (%)",
				);
			}
		}

		return $arr;
	}
}
