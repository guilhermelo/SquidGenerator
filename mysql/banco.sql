create table CONFIGURACAO(
	HOSTNAME VARCHAR(30),
	QTDE_RAM VARCHAR(30),
	TAM_MAX_ARQ_RAM VARCHAR(30),
	TAM_MAX_ARQ_DISCO VARCHAR(30),
	TAM_MIN_ARQ_DISCO VARCHAR(30),
	PERC_MIN_CACHE_SWAP VARCHAR(30),
	PERC_MAX_CACHE_SWAP VARCHAR(30),
	TAM_ARQUIVO_CACHE VARCHAR(30), 
	QTDE_PASTAS VARCHAR(30), 
	QTDE_SUB_PASTAS VARCHAR(30)
);


CREATE TABLE REGRAS(
	SITES_LIBERADOS TEXT,
	EXT_LIBERADAS VARCHAR(100),
	LIBERADO_POR_IP VARCHAR(100),
	HORA_INICIAL VARCHAR(10),
	HORA_FINAL VARCHAR(10),
	USUARIO VARCHAR(30),
	SENHA VARCHAR(30),
	FG_POR_HORA VARCHAR(1),
	FG_POR_EXTENSAO VARCHAR(1),
	FG_POR_AUTENTICACAO VARCHAR(1),
	OPT_POR_HORA VARCHAR(1),
	OPT_POR_IP VARCHAR(1),
	OPT_POR_EXT VARCHAR(1)
);