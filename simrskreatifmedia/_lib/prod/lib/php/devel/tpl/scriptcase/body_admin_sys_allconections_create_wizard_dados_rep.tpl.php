<?php

//Carrega Array com Grupos do ScriptCase
$conHas                = $this->GetVar('conHas');
$btn_avanc             = $this->GetVar('btn_avanc');
$btn_retor             = $this->GetVar('btn_retor');
$server                = $this->GetVar('server');
$base                  = $this->GetVar('base');
$schema                = $this->GetVar('schema');
$rep                   = $this->GetVar('rep');
$repositorios          = $this->GetVar('repositorios');
$postgres_encoding     = $this->GetVar('postgres_encoding');
$oracle_encoding       = $this->GetVar('oracle_encoding');
$mysql_encoding        = $this->GetVar('mysql_encoding');
$db2_autocommit        = $this->GetVar('db2_autocommit');
$db2_i5_lib            = $this->GetVar('db2_i5_lib');
$db2_i5_naming         = $this->GetVar('db2_i5_naming');
$db2_i5_commit         = $this->GetVar('db2_i5_commit');
$db2_i5_query_optimize = $this->GetVar('db2_i5_query_optimize');

$pg_client_encoding   = array();
$pg_client_encoding['SQL_ASCII'] = "ASCII";
$pg_client_encoding['EUC_JP'] = "Japanese EUC";
$pg_client_encoding['EUC_CN'] = "Chinese EUC";
$pg_client_encoding['EUC_KR'] = "Korean EUC";
$pg_client_encoding['JOHAB'] = "Korean EUC (Hangle base)";
$pg_client_encoding['EUC_TW'] = "Taiwan EUC";
$pg_client_encoding['UNICODE'] = "Unicode (UTF-8)";
$pg_client_encoding['MULE_INTERNAL'] = "Mule internal code";
$pg_client_encoding['LATIN1'] = "ISO 8859-1 ECMA-94 Latin Alphabet No.1";
$pg_client_encoding['LATIN2'] = "ISO 8859-2 ECMA-94 Latin Alphabet No.2";
$pg_client_encoding['LATIN3'] = "ISO 8859-3 ECMA-94 Latin Alphabet No.3";
$pg_client_encoding['LATIN4'] = "ISO 8859-4 ECMA-94 Latin Alphabet No.4";
$pg_client_encoding['LATIN5'] = "ISO 8859-9 ECMA-128 Latin Alphabet No.5";
$pg_client_encoding['LATIN6'] = "ISO 8859-10 ECMA-144 Latin Alphabet No.6";
$pg_client_encoding['LATIN7'] = "ISO 8859-13 Latin Alphabet No.7";
$pg_client_encoding['LATIN8'] = "SO 8859-14 Latin Alphabet No.8";
$pg_client_encoding['LATIN9'] = "SO 8859-14 Latin Alphabet No.9";
$pg_client_encoding['LATIN10'] = "SO 8859-14 Latin Alphabet No.10";
$pg_client_encoding['ISO-8859-5'] = "ECMA-113 Latin/Cyrillic";
$pg_client_encoding['ISO-8859-6'] = "ECMA-114 Latin/Arabic";
$pg_client_encoding['ISO-8859-7'] = "ECMA-118 Latin/Greek";
$pg_client_encoding['ISO-8859-8'] = "ECMA-121 Latin/Hebrew";
$pg_client_encoding['KOI8'] = "KOI8-R(U)";
$pg_client_encoding['WIN'] = "Windows CP1251";
$pg_client_encoding['ALT'] = "Windows CP866";
$pg_client_encoding['WIN1256'] = "Arabic Windows CP1256";
$pg_client_encoding['TCVN'] = "Vietnamese TCVN-5712 (Windows CP1258)";
$pg_client_encoding['WIN874'] = "Thai Windows CP874";

$oracle_client_encoding = array();
$oracle_client_encoding['AL16UTF16'] = "Unicode 3.1 UTF-16 Universal character set";
$oracle_client_encoding['AL32UTF8'] = "Unicode 3.1 UTF-8 Universal character set";
$oracle_client_encoding['AR8ADOS710'] = "Arabic MS-DOS 710 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ADOS710T'] = "Arabic MS-DOS 710 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ADOS720'] = "Arabic MS-DOS 720 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ADOS720T'] = "Arabic MS-DOS 720 8-bit Latin/Arabic";
$oracle_client_encoding['AR8APTEC715'] = "APTEC 715 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8APTEC715T'] = "APTEC 715 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ARABICMAC'] = "Mac Client 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ARABICMACS'] = "Mac Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ARABICMACT'] = "Mac 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ASMO708PLUS'] = "ASMO 708 Plus 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ASMO8X'] = "ASMO Extended 708 8-bit Latin/Arabic";
$oracle_client_encoding['AR8EBCDIC420S'] = "EBCDIC Code Page 420 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8EBCDICX'] = "EBCDIC XBASIC Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8HPARABIC8T'] = "HP 8-bit Latin/Arabic";
$oracle_client_encoding['AR8ISO8859P6'] = "ISO 8859-6 Latin/Arabic";
$oracle_client_encoding['AR8MSWIN1256'] = "MS Windows Code Page 1256 8-Bit Latin/Arabic";
$oracle_client_encoding['AR8MUSSAD768'] = "Mussa'd Alarabi/2 768 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8MUSSAD768T'] = "Mussa'd Alarabi/2 768 8-bit Latin/Arabic";
$oracle_client_encoding['AR8NAFITHA711'] = "Nafitha Enhanced 711 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8NAFITHA711T'] = "Nafitha Enhanced 711 8-bit Latin/Arabic";
$oracle_client_encoding['AR8NAFITHA721'] = "Nafitha International 721 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8NAFITHA721T'] = "Nafitha International 721 8-bit Latin/Arabic";
$oracle_client_encoding['AR8SAKHR706'] = "SAKHR 706 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8SAKHR707'] = "SAKHR 707 Server 8-bit Latin/Arabic";
$oracle_client_encoding['AR8SAKHR707T'] = "SAKHR 707 8-bit Latin/Arabic";
$oracle_client_encoding['AR8XBASIC'] = "XBASIC 8-bit Latin/Arabic";
$oracle_client_encoding['BG8MSWIN'] = "MS Windows 8-bit Bulgarian Cyrillic";
$oracle_client_encoding['BG8PC437S'] = "IBM-PC Code Page 437 8-bit (Bulgarian Modification)";
$oracle_client_encoding['BLT8CP921'] = "Latvian Standard LVS8-92(1) Windows/Unix 8-bit Baltic";
$oracle_client_encoding['BLT8EBCDIC1112'] = "EBCDIC Code Page 1112 8-bit Baltic Multilingual";
$oracle_client_encoding['BLT8EBCDIC1112S'] = "EBCDIC Code Page 1112 8-bit Server Baltic Multilingual";
$oracle_client_encoding['BLT8ISO8859P13'] = "ISO 8859-13 Baltic";
$oracle_client_encoding['BLT8MSWIN1257'] = "MS Windows Code Page 1257 8-bit Baltic";
$oracle_client_encoding['BLT8PC775'] = "IBM-PC Code Page 775 8-bit Baltic";
$oracle_client_encoding['BN8BSCII'] = "Bangladesh National Code 8-bit BSCII";
$oracle_client_encoding['CDN8PC863'] = "IBM-PC Code Page 863 8-bit Canadian French";
$oracle_client_encoding['CEL8ISO8859P14'] = "ISO 8859-13 Celtic";
$oracle_client_encoding['CH7DEC'] = "DEC VT100 7-bit Swiss (German/French)";
$oracle_client_encoding['CL8BS2000'] = "Siemens EBCDIC.EHC.LC 8-bit Cyrillic";
$oracle_client_encoding['CL8EBCDIC1025'] = "EBCDIC Code Page 1025 8-bit Cyrillic";
$oracle_client_encoding['CL8EBCDIC1025C'] = "EBCDIC Code Page 1025 Client 8-bit Cyrillic";
$oracle_client_encoding['CL8EBCDIC1025R'] = "EBCDIC Code Page 1025 Server 8-bit Cyrillic";
$oracle_client_encoding['CL8EBCDIC1025S'] = "EBCDIC Code Page 1025 Server 8-bit Cyrillic";
$oracle_client_encoding['CL8EBCDIC1025X'] = "EBCDIC Code Page 1025 (Modified)8-bit Cyrillic";
$oracle_client_encoding['CL8ISO8859P5'] = "ISO 8859-5 Latin/Cyrillic";
$oracle_client_encoding['CL8ISOIR111'] = "ISOIR111 Cyrillic";
$oracle_client_encoding['CL8KOI8R'] = "RELCOM Internet Standard 8-bit Latin/Cyrillic";
$oracle_client_encoding['CL8KOI8U'] = "KOI8 Ukrainian Cyrillic";
$oracle_client_encoding['CL8MACCYRILLIC'] = "Mac Client 8-bit Latin/Cyrillic";
$oracle_client_encoding['CL8MACCYRILLICS'] = "Mac Server 8-bit Latin/Cyrillic";
$oracle_client_encoding['CL8MSWIN1251'] = "MS Windows Code Page 1251 8-bit Latin/Cyrillic";
$oracle_client_encoding['D7DEC'] = "DEC VT100 7-bit German";
$oracle_client_encoding['D7SIEMENS9780X'] = "Siemens 97801/97808 7-bit German";
$oracle_client_encoding['D8BS2000'] = "Siemens 9750-62 EBCDIC 8-bit German";
$oracle_client_encoding['D8EBCDIC1141'] = "EBCDIC Code Page 1141 8-bit Austrian German";
$oracle_client_encoding['D8EBCDIC273'] = "EBCDIC Code Page 273/1 8-bit Austrian German";
$oracle_client_encoding['DK7SIEMENS9780X'] = "Siemens 97801/97808 7-bit Danish";
$oracle_client_encoding['DK8BS2000'] = "Siemens 9750-62 EBCDIC 8-bit Danish";
$oracle_client_encoding['DK8EBCDIC1142'] = "EBCDIC Code Page 1142 8-bit Danish";
$oracle_client_encoding['DK8EBCDIC277'] = "EBCDIC Code Page 277/1 8-bit Danish";
$oracle_client_encoding['E7DEC'] = "DEC VT100 7-bit Spanish";
$oracle_client_encoding['E7SIEMENS9780X'] = "Siemens 97801/97808 7-bit Spanish";
$oracle_client_encoding['E8BS2000'] = "Siemens 9750-62 EBCDIC 8-bit Spanish";
$oracle_client_encoding['EE8BS2000'] = "Siemens EBCDIC.DF.04 8-bit East European";
$oracle_client_encoding['EE8EBCDIC870'] = "EBCDIC Code Page 870 8-bit East European";
$oracle_client_encoding['EE8EBCDIC870C'] = "EBCDIC Code Page 870 Client 8-bit East European";
$oracle_client_encoding['EE8EBCDIC870S'] = "EBCDIC Code Page 870 Server 8-bit East European";
$oracle_client_encoding['EE8ISO8859P2'] = "ISO 8859-2 East European";
$oracle_client_encoding['EE8MACCE'] = "Mac Client 8-bit Central European";
$oracle_client_encoding['EE8MACCES'] = "Mac Server 8-bit Central European";
$oracle_client_encoding['EE8MACCROATIAN'] = "Mac Client 8-bit Croatian";
$oracle_client_encoding['EE8MACCROATIANS'] = "Mac Server 8-bit Croatian";
$oracle_client_encoding['EE8MSWIN1250'] = "MS Windows Code Page 1250 8-bit East European";
$oracle_client_encoding['EE8PC852'] = "IBM-PC Code Page 852 8-bit East European";
$oracle_client_encoding['EEC8EUROASCI'] = "EEC Targon 35 ASCI West European/Greek";
$oracle_client_encoding['EEC8EUROPA3'] = "EEC EUROPA3 8-bit West European/Greek";
$oracle_client_encoding['EL8DEC'] = "DEC 8-bit Latin/Greek";
$oracle_client_encoding['EL8EBCDIC875'] = "EBCDIC Code Page 875 8-bit Greek";
$oracle_client_encoding['EL8EBCDIC875R'] = "EBCDIC Code Page 875 Server 8-bit Greek";
$oracle_client_encoding['EL8GCOS7'] = "Bull EBCDIC GCOS7 8-bit Greek";
$oracle_client_encoding['EL8ISO8859P7'] = "ISO 8859-7 Latin/Gree";
$oracle_client_encoding['EL8MACGREEK'] = "Mac Client 8-bit Greek";
$oracle_client_encoding['EL8MACGREEKS'] = "Mac Server 8-bit Greek";
$oracle_client_encoding['EL8MSWIN1253'] = "MS Windows Code Page 1253 8-bit Latin/Greek";
$oracle_client_encoding['EL8PC437S'] = "IBM-PC Code Page 437 8-bit (Greek modification)";
$oracle_client_encoding['EL8PC737'] = "IBM-PC Code Page 737 8-bit Greek/Latin";
$oracle_client_encoding['EL8PC851'] = "IBM-PC Code Page 851 8-bit Greek/Latin";
$oracle_client_encoding['EL8PC869'] = "IBM-PC Code Page 869 8-bit Greek/Latin";
$oracle_client_encoding['ET8MSWIN923'] = "MS Windows Code Page 923 8-bit Estonian";
$oracle_client_encoding['F7DEC'] = "DEC VT100 7-bit French";
$oracle_client_encoding['F7SIEMENS9780X'] = "Siemens 97801/97808 7-bit French";
$oracle_client_encoding['F8BS2000'] = "Siemens 9750-62 EBCDIC 8-bit French";
$oracle_client_encoding['F8EBCDIC1147'] = "EBCDIC Code Page 1147 8-bit French";
$oracle_client_encoding['F8EBCDIC297'] = "EBCDIC Code Page 297 8-bit French";
$oracle_client_encoding['HU8ABMOD'] = "Hungarian 8-bit Special AB Mod";
$oracle_client_encoding['HU8CWI2'] = "Hungarian 8-bit CWI-2";
$oracle_client_encoding['I7DEC'] = "DEC VT100 7-bit Italian";
$oracle_client_encoding['I7SIEMENS9780X'] = "Siemens 97801/97808 7-bit Italian";
$oracle_client_encoding['I8EBCDIC1144'] = "EBCDIC Code Page 1144 8-bit Italian";
$oracle_client_encoding['I8EBCDIC280'] = "EBCDIC Code Page 280/1 8-bit Italian";
$oracle_client_encoding['IN8ISCII'] = "Multiple-Script Indian Standard 8-bit Latin/Indian";
$oracle_client_encoding['IS8MACICELANDIC'] = "Mac Client 8-bit Icelandic";
$oracle_client_encoding['IS8MACICELANDICS'] = "Mac Server 8-bit Icelandic";
$oracle_client_encoding['IS8PC861'] = "IBM-PC Code Page 861 8-bit Icelandic";
$oracle_client_encoding['IW7IS960'] = "Israeli Standard 960 7-bit Latin/Hebrew";
$oracle_client_encoding['IW8EBCDIC1086'] = "EBCDIC Code Page 1086 8-bit Hebrew";
$oracle_client_encoding['IW8EBCDIC424'] = "EBCDIC Code Page 424 8-bit Latin/Hebrew";
$oracle_client_encoding['IW8EBCDIC424S'] = "EBCDIC Code Page 424 Server 8-bit Latin/Hebrew";
$oracle_client_encoding['IW8ISO8859P8'] = "ISO 8859-8 Latin/Hebrew";
$oracle_client_encoding['IW8MACHEBREW'] = "Mac Client 8-bit Hebrew";
$oracle_client_encoding['IW8MACHEBREWS'] = "Mac Server 8-bit Hebrew";
$oracle_client_encoding['IW8MSWIN1255'] = "MS Windows Code Page 1255 8-bit Latin/Hebrew";
$oracle_client_encoding['IW8PC1507'] = "IBM-PC Code Page 1507/862 8-bit Latin/Hebrew";
$oracle_client_encoding['JA16DBCS'] = "IBM EBCDIC 16-bit Japanese";
$oracle_client_encoding['JA16EBCDIC930'] = "IBM DBCS Code Page 290 16-bit Japanese";
$oracle_client_encoding['JA16EUC'] = "EUC 24-bit Japanese";
$oracle_client_encoding['JA16EUCTILDE'] = "The same as JA16EUC except for the way that the wave dash and the tilde are mapped to and from Unicode.";
$oracle_client_encoding['JA16EUCYEN'] = "EUC 24-bit Japanese with '\' mapped to the Japanese yen character";
$oracle_client_encoding['JA16MACSJIS'] = "Mac client Shift-JIS 16-bit Japanese";
$oracle_client_encoding['JA16SJIS'] = "Shift-JIS 16-bit Japanese";
$oracle_client_encoding['JA16SJISTILDE'] = "The same as JA16SJIS except for the way that the wave dash and the tilde are mapped to and from Unicode.";
$oracle_client_encoding['JA16SJISYEN'] = "Shift-JIS 16-bit Japanese with '\' mapped to the Japanese yen character";
$oracle_client_encoding['JA16VMS'] = "JVMS 16-bit Japanese";
$oracle_client_encoding['KO16DBCS'] = "IBM EBCDIC 16-bit Korean";
$oracle_client_encoding['KO16KSC5601'] = "KSC5601 16-bit Korean";
$oracle_client_encoding['KO16KSCCS'] = "KSCCS 16-bit Korean";
$oracle_client_encoding['KO16MSWIN949'] = "MS Windows Code Page 949 Korean";
$oracle_client_encoding['LA8ISO6937'] = "ISO 6937 8-bit Coded Character Set for Text Communication";
$oracle_client_encoding['LA8PASSPORT'] = "German Government Printer 8-bit All-European Latin";
$oracle_client_encoding['LT8MSWIN921'] = "MS Windows Code Page 921 8-bit Lithuanian";
$oracle_client_encoding['LT8PC772'] = "IBM-PC Code Page 772 8-bit Lithuanian (Latin/Cyrillic)";
$oracle_client_encoding['LT8PC774'] = "IBM-PC Code Page 774 8-bit Lithuanian (Latin)";
$oracle_client_encoding['LV8PC1117'] = "IBM-PC Code Page 1117 8-bit Latvian";
$oracle_client_encoding['LV8PC8LR'] = "Latvian Version IBM-PC Code Page 866 8-bit Latin/Cyrillic";
$oracle_client_encoding['LV8RST104090'] = "IBM-PC Alternative Code Page 8-bit Latvian (Latin/Cyrillic)";
$oracle_client_encoding['N7SIEMENS9780X'] = "Siemens 97801/97808 7-bit Norwegian";
$oracle_client_encoding['N8PC865'] = "IBM-PC Code Page 865 8-bit Norwegian";
$oracle_client_encoding['NDK7DEC'] = "DEC VT100 7-bit Norwegian/Danish";
$oracle_client_encoding['NE8ISO8859P10'] = "ISO 8859-10 North European";
$oracle_client_encoding['NEE8ISO8859P4'] = "ISO 8859-4 North and North-East European";
$oracle_client_encoding['NL7DEC'] = "DEC VT100 7-bit Dutch";
$oracle_client_encoding['RU8BESTA'] = "BESTA 8-bit Latin/Cyrillic";
$oracle_client_encoding['RU8PC855'] = "IBM-PC Code Page 855 8-bit Latin/Cyrillic";
$oracle_client_encoding['RU8PC866'] = "IBM-PC Code Page 866 8-bit Latin/Cyrillic";
$oracle_client_encoding['S7DEC'] = "DEC VT100 7-bit Swedish";
$oracle_client_encoding['S7SIEMENS9780X'] = "Siemens 97801/97808 7-bit Swedish";
$oracle_client_encoding['S8BS2000'] = "Siemens 9750-62 EBCDIC 8-bit Swedish";
$oracle_client_encoding['S8EBCDIC1143'] = "EBCDIC Code Page 1143 8-bit Swedish";
$oracle_client_encoding['S8EBCDIC278'] = "EBCDIC Code Page 278/1 8-bit Swedish";
$oracle_client_encoding['SE8ISO8859P3'] = "ISO 8859-3 South European";
$oracle_client_encoding['SF7ASCII'] = "ASCII 7-bit Finnish";
$oracle_client_encoding['SF7DEC'] = "DEC VT100 7-bit Finnish";
$oracle_client_encoding['TH8MACTHAI'] = "Mac Client 8-bit Latin/Thai";
$oracle_client_encoding['TH8MACTHAIS'] = "Mac Server 8-bit Latin/Thai";
$oracle_client_encoding['TH8TISASCII'] = "Thai Industrial Standard 620-2533 ASCII 8-bit";
$oracle_client_encoding['TH8TISEBCDIC'] = "Thai Industrial Standard 620-2533 EBCDIC 8-bit";
$oracle_client_encoding['TH8TISEBCDICS'] = "Thai Industrial Standard 620-2533-EBCDIC Server 8-bit";
$oracle_client_encoding['TR7DEC'] = "DEC VT100 7-bit Turkish";
$oracle_client_encoding['TR8DEC'] = "DEC 8-bit Turkish";
$oracle_client_encoding['TR8EBCDIC1026'] = "EBCDIC Code Page 1026 8-bit Turkish";
$oracle_client_encoding['TR8EBCDIC1026S'] = "EBCDIC Code Page 1026 Server 8-bit Turkish";
$oracle_client_encoding['TR8MACTURKISH'] = "Mac Client 8-bit Turkish";
$oracle_client_encoding['TR8MACTURKISHS'] = "Mac Server 8-bit Turkish";
$oracle_client_encoding['TR8MSWIN1254'] = "MS Windows Code Page 1254 8-bit Turkish";
$oracle_client_encoding['TR8PC857'] = "IBM-PC Code Page 857 8-bit Turkish";
$oracle_client_encoding['US7ASCII'] = "ASCII 7-bit American";
$oracle_client_encoding['US8BS2000'] = "Siemens 9750-62 EBCDIC 8-bit American";
$oracle_client_encoding['US8ICL'] = "ICL EBCDIC 8-bit American";
$oracle_client_encoding['US8PC437'] = "IBM-PC Code Page 437 8-bit American";
$oracle_client_encoding['UTF8'] = "Unicode 3.0 UTF-8 Universal character set CESU-8 compliant";
$oracle_client_encoding['UTFE'] = "EBCDIC form of Unicode 3.0UTF-8 Universal character set";
$oracle_client_encoding['VN8MSWIN1258'] = "MS Windows Code Page 1258 8-bit Vietnamese";
$oracle_client_encoding['VN8VN3'] = "VN3 8-bit Vietnamese";
$oracle_client_encoding['WE8BS2000'] = "Siemens EBCDIC.DF.04 8-bit West European";
$oracle_client_encoding['WE8BS2000E'] = "Siemens EBCDIC.DF.04 8-bit West European";
$oracle_client_encoding['WE8BS2000L5'] = "Siemens EBCDIC.DF.04.L5 8-bit West European/Turkish";
$oracle_client_encoding['WE8DEC'] = "DEC 8-bit West European";
$oracle_client_encoding['WE8DG'] = "DG 8-bit West European";
$oracle_client_encoding['WE8EBCDIC1047'] = "EBCDIC Code Page 1047 8-bit West European";
$oracle_client_encoding['WE8EBCDIC1047E'] = "Latin 1/Open Systems 1047";
$oracle_client_encoding['WE8EBCDIC1140'] = "EBCDIC Code Page 1140 8-bit West European";
$oracle_client_encoding['WE8EBCDIC1140C'] = "EBCDIC Code Page 1140 Client 8-bit West European";
$oracle_client_encoding['WE8EBCDIC1145'] = "EBCDIC Code Page 1145 8-bit West European";
$oracle_client_encoding['WE8EBCDIC1146'] = "EBCDIC Code Page 1146 8-bit West European";
$oracle_client_encoding['WE8EBCDIC1148'] = "EBCDIC Code Page 1148 8-bit West European";
$oracle_client_encoding['WE8EBCDIC1148C'] = "EBCDIC Code Page 1148 Client 8-bit West European";
$oracle_client_encoding['WE8EBCDIC284'] = "EBCDIC Code Page 284 8-bit Latin American/Spanish";
$oracle_client_encoding['WE8EBCDIC285'] = "EBCDIC Code Page 285 8-bit West European";
$oracle_client_encoding['WE8EBCDIC37'] = "EBCDIC Code Page 37 8-bit West European";
$oracle_client_encoding['WE8EBCDIC37C'] = "EBCDIC Code Page 37 8-bit Oracle/c";
$oracle_client_encoding['WE8EBCDIC500'] = "EBCDIC Code Page 500 8-bit West European";
$oracle_client_encoding['WE8EBCDIC500C'] = "EBCDIC Code Page 500 8-bit Oracle/c";
$oracle_client_encoding['WE8EBCDIC871'] = "EBCDIC Code Page 871 8-bit Icelandic";
$oracle_client_encoding['WE8EBCDIC924'] = "Latin 9 EBCDIC 924";
$oracle_client_encoding['WE8GCOS7'] = "Bull EBCDIC GCOS7 8-bit West European";
$oracle_client_encoding['WE8HP'] = "HP LaserJet 8-bit West European";
$oracle_client_encoding['WE8ICL'] = "ICL EBCDIC 8-bit West European";
$oracle_client_encoding['WE8ISO8859P1'] = "ISO 8859-1 West European";
$oracle_client_encoding['WE8ISO8859P15'] = "ISO 8859-15 West European";
$oracle_client_encoding['WE8ISO8859P9'] = "ISO 8859-9 West European & Turkish";
$oracle_client_encoding['WE8ISOICLUK'] = "ICL special version ISO8859-1";
$oracle_client_encoding['WE8MACROMAN8'] = "Mac Client 8-bit Extended Roman8 West European";
$oracle_client_encoding['WE8MACROMAN8S'] = "Mac Server 8-bit Extended Roman8 West European";
$oracle_client_encoding['WE8MSWIN1252'] = "MS Windows Code Page 1252 8-bit West European";
$oracle_client_encoding['WE8NCR4970'] = "NCR 4970 8-bit West European";
$oracle_client_encoding['WE8NEXTSTEP'] = "NeXTSTEP PostScript 8-bit West European";
$oracle_client_encoding['WE8PC850'] = "IBM-PC Code Page 850 8-bit West European";
$oracle_client_encoding['WE8PC858'] = "IBM-PC Code Page 858 8-bit West European";
$oracle_client_encoding['WE8PC860'] = "IBM-PC Code Page 860 8-bit West European";
$oracle_client_encoding['WE8ROMAN8'] = "HP Roman8 8-bit West European";
$oracle_client_encoding['YUG7ASCII'] = "ASCII 7-bit Yugoslavian";
$oracle_client_encoding['ZHS16CGB231280'] = "CGB2312-80 16-bit Simplified Chinese";
$oracle_client_encoding['ZHS16DBCS'] = "IBM EBCDIC 16-bit Simplified Chinese";
$oracle_client_encoding['ZHS16GBK'] = "GBK 16-bit Simplified Chinese";
$oracle_client_encoding['ZHS16MACCGB23128'] = "Mac client CGB2312-80 16-bit Simplified Chinese";
$oracle_client_encoding['ZHS32GB18030'] = "GB18030-2000";
$oracle_client_encoding['ZHT16BIG5'] = "BIG5 16-bit Traditional Chinese";
$oracle_client_encoding['ZHT16CCDC'] = "HP CCDC 16-bit Traditional Chinese";
$oracle_client_encoding['ZHT16DBCS'] = "IBM EBCDIC 16-bit Traditional Chinese";
$oracle_client_encoding['ZHT16DBT'] = "Taiwan Taxation 16-bit Traditional Chinese";
$oracle_client_encoding['ZHT16HKSCS'] = "MS Windows Code Page 950 w/ Hong Kong Supplementary Character Set";
$oracle_client_encoding['ZHT16MSWIN950'] = "MS Windows Code Page 950 Traditional Chinese";
$oracle_client_encoding['ZHT32EUC'] = "EUC 32-bit Traditional Chinese";
$oracle_client_encoding['ZHT32SOPS'] = "SOPS 32-bit Traditional Chinese";
$oracle_client_encoding['ZHT32TRIS'] = "TRIS 32-bit Traditional Chinese";

$mysql_client_encoding = array();
$mysql_client_encoding['armscii8'] = 'armscii8';
$mysql_client_encoding['ascii'] = 'ascii';
$mysql_client_encoding['big5'] = 'big5';
$mysql_client_encoding['binary'] = 'binary';
$mysql_client_encoding['cp1250'] = 'cp1250';
$mysql_client_encoding['cp1251'] = 'cp1251';
$mysql_client_encoding['cp1256'] = 'cp1256';
$mysql_client_encoding['cp1257'] = 'cp1257';
$mysql_client_encoding['cp850'] = 'cp850';
$mysql_client_encoding['cp852'] = 'cp852';
$mysql_client_encoding['cp866'] = 'cp866';
$mysql_client_encoding['cp932'] = 'cp932';
$mysql_client_encoding['dec8'] = 'dec8';
$mysql_client_encoding['eucjpms'] = 'eucjpms';
$mysql_client_encoding['euckr'] = 'euckr';
$mysql_client_encoding['gb2312'] = 'gb2312';
$mysql_client_encoding['gbk'] = 'gbk';
$mysql_client_encoding['geostd8'] = 'geostd8';
$mysql_client_encoding['greek'] = 'greek';
$mysql_client_encoding['hebrew'] = 'hebrew';
$mysql_client_encoding['hp8'] = 'hp8';
$mysql_client_encoding['keybcs2'] = 'keybcs2';
$mysql_client_encoding['koi8r'] = 'koi8r';
$mysql_client_encoding['koi8u'] = 'koi8u';
$mysql_client_encoding['latin1'] = 'latin1';
$mysql_client_encoding['latin2'] = 'latin2';
$mysql_client_encoding['latin5'] = 'latin5';
$mysql_client_encoding['latin7'] = 'latin7';
$mysql_client_encoding['macce'] = 'macce';
$mysql_client_encoding['macroman'] = 'macroman';
$mysql_client_encoding['sjis'] = 'sjis';
$mysql_client_encoding['swe7'] = 'swe7';
$mysql_client_encoding['tis620'] = 'tis620';
$mysql_client_encoding['ucs2'] = 'ucs2';
$mysql_client_encoding['ujis'] = 'ujis';
$mysql_client_encoding['utf8'] = 'utf8';

$dbms = $this->GetVar('dbms');
$conn = $this->GetVar('conn');
 
if ($conn == "")
{
	$conn = "connect";
}
?>

<script language="javascript" src="<?php echo $nm_config['url_js_third']; ?>wz_tooltip/wz_tooltip.js"></script>

<form action="<?php echo nm_url_rand($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php'); ?>" name="form_create" METHOD="post">
<center>

<?php

$td_width_1 = "265px";
$td_width_2 = "225px";
$td_width_3 = "50px";

if (isset($_POST['ajax']) && $_POST['ajax'] == "S")
{
	echo "__#$@$#__";
}
else 
{
?>
<table class="nmTable">
   <tr>
      <td class="nmTitle" align="center" colspan="3"><?php echo $nm_lang['page_title']; ?></td>
   </tr>		
<?php
}

if (!(isset($_POST['ajax']) && $_POST['ajax'] == "S"))
{
?>
	   
    
   <tr style="display:<?php echo (in_array($dbms, array('firebird', 'odbc', 'progress', 'sybase')) ? "" : "none"); ?>">
      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['conn']; ?>&nbsp;</td>
      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
      	<INPUT name='conn' value='<?php echo $conn; ?>' type="text" class="nmInput">
      </td>
      <td class="nmLineV3" width="<?php echo $td_width_3; ?>" align="left" valign="middle">          
      </td>
   </tr>   
   <?PHP
}   
       if($conHas['server']=='S')
       {
       		$default = $port = "";
       		$hasPort = false;
       		
       		$arr_db_ports = array();
			$arr_db_ports['mysql']    = "3306";
			$arr_db_ports['postgres'] = "5432";
			$arr_db_ports['db2']      = "50000";
			$arr_db_ports['mssql']    = "1433";
			$arr_db_ports['sybase']   = "5000";
			$arr_db_ports['firebird'] = "3050";
			$arr_db_ports['ibase']    = "3050";
			if (isset($arr_db_ports[ $dbms ]))
			{
				$hasPort = true;
			    $port = $arr_db_ports[ $dbms ];
			    
				if (strrpos($server, ":") !== false)
				{
					$server1 = substr($server, 0, strrpos($server, ":"));
					$server2 = substr($server, strrpos($server, ":") + 1);

					if (is_numeric($server2) && !empty($server2))
					{
						$server = $server1;
						$port   = $server2;
					}
				}
			}
       	
   ?>
   <tr>
      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['server']; ?>&nbsp;</td>
      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
          <input type='text' name='server' id='server' value='<?php echo $server; ?>' class="nmInput" onfocus="NM_onfocus(this.form.name, this.name, '', 0, 'naomask', 'lista', 'cxab', 9999999, 'TUDO')" onchange="$('#carregar_db').val('S');">
      </td>
      <td class="nmLineV3"  width="<?php echo $td_width_3; ?>" align="left" valign="middle"> 
      </td>
   </tr>

   <tr style="display:<?php echo ($hasPort ? '' : 'none'); ?>">
      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;<?php echo sprintf($nm_lang['label']['port'], $default); ?>&nbsp;</td>
      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
      		<table cellpadding="0" cellspacing="0">
      			<tr>
      				<td>
          				<input type='text' name='port' id='port' size="5" onblur="if ($('#port').val() == '') {$('#port').val('0');}" value='<?php echo $port; ?>' class="nmInput" maxlength="6" style="text-align: right; height:19px" onFocus="NM_onfocus(this.form.name, this.name, '', 0, 'naomask', 'numeroedtvg', 6, 0, 999999)"  onchange="$('#carregar_db').val('S');" />
          			</td>
          			<td>
          				<table cellpadding="0" cellspacing="0" width="18px" align="center">	
          					<tr><td style="cursor:pointer; border-top:1px solid #7f9db9; border-right:1px solid #7f9db9"><img src="<?php echo $nm_config['url_img']; ?>seta_cima.png"  onclick="$('#port').val(parseInt($('#port').val()) + 1); $('#carregar_db').val('S');" /></td></tr>
          					<tr><td style="cursor:pointer; border-top:1px solid #7f9db9; border-right:1px solid #7f9db9; border-bottom:1px solid #7f9db9"><img src="<?php echo $nm_config['url_img']; ?>seta_baixo.png" onclick="if (parseInt($('#port').val()) > 0) {$('#port').val(parseInt($('#port').val()) - 1); $('#carregar_db').val('S');}" /></td></tr>
          				</table>
          			</td>
          		</tr>
          	</table>
      </td>   
      <td class="nmLineV3"  width="<?php echo $td_width_3; ?>" align="left" valign="middle"> 
      </td>
   </tr>   
   <?php
       }
       
       if($conHas['base']=='S')
       {
       	
       		if ($dbms == 'mysql')
       		{
       			?>
       			<tr style="display:none"><td colspan="3"><input type="hidden" name="base" id="base" value='<?php echo $base; ?>' /></td></tr>
       			<?php
       		}
       		else 
       		{
   ?>   
   <tr>
      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['base']; ?>&nbsp;</td>
      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
          <input type='text' name='base' value='<?php echo $base; ?>' class="nmInput" onfocus="NM_onfocus(this.form.name, this.name, '', 0, 'naomask', 'lista', 'cxab', 9999999, 'TUDO')">      	 
      </td>
      <td class="nmLineV3"  width="<?php echo $td_width_3; ?>" align="left" valign="middle"></td>      
   </tr>
   <?php
       		}
       }

       if($conHas['schema']=='S')
       {
   ?>   
   <tr>
      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;<?php echo $nm_lang['label']['schema']; ?>&nbsp;</td>
      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
          <input type='text' name='schema' value='<?php echo $schema?>' class="nmInput" onfocus="NM_onfocus(this.form.name, this.name, '', 0, 'naomask', 'lista', 'cxab', 9999999, 'TUDO')">
      </td>
      <td class="nmLineV3"  width="<?php echo $td_width_3; ?>" align="left" valign="middle"></td>      
   </tr>
   <?php
       }
       
	   if (isset($_POST['ajax']) && $_POST['ajax'] == "S")
	   {
			echo "__#$@$#__";
	   }

	   if ($dbms == "oracle")
	   {
	?>	   
	   
	   <tr style="display:">
	      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;client_encoding</td>
	      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
	          <select name="oracle_encoding" class="nmInput">
	          	<option value="" <?php if(empty($oracle_encoding)){ echo "selected"; } ?>></option>
	          	<?php
	          	foreach ($oracle_client_encoding as $key=>$value)
	          	{
	          		if (strlen($value) > 50)
	          		{
	          			$value = substr($value, 0, 47) . "...";
	          		}
	          		
	          		?>
	          		<option value="<?php echo $key; ?>" <?php if($oracle_encoding==$key){ echo "selected"; } ?>><?php echo $key . " - " . $value; ?></option>
	          		<?php
	          	}
	          	?>
	          </select>
	      </td>
	      <td class="nmLineV3" width="<?php echo $td_width_3; ?>" align="left" valign="middle">&nbsp;</td>
	   </tr>	   
	   
	   
	<?php  
	   }
	   elseif ($dbms == "postgres")
	   {
   	?>
	   <tr style="display:">
	      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;client_encoding</td>
	      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
	          <select name="postgres_encoding" class="nmInput">
	          	<option value="" <?php if(empty($postgres_encoding)){ echo "selected"; } ?>></option>
	          	<?php
	          	foreach ($pg_client_encoding as $key=>$value)
	          	{
	          		?>
	          		<option value="<?php echo $key; ?>" <?php if($postgres_encoding==$key){ echo "selected"; } ?>><?php echo $value; ?></option>
	          		<?php
	          	}
	          	?>
	          </select>
	      </td>
	      <td class="nmLineV3" width="<?php echo $td_width_3; ?>" align="left" valign="middle">&nbsp;</td>
	   </tr>   	
   	<?php
	   }elseif ($dbms == "mysql")
	   {
   	?>
	   <tr style="display:">
	      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;client_encoding</td>
	      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
	          <select name="mysql_encoding" class="nmInput">
	          	<option value="" <?php if(empty($mysql_encoding)){ echo "selected"; } ?>></option>
	          	<?php
	          	foreach ($mysql_client_encoding as $key=>$value)
	          	{
	          		?>
	          		<option value="<?php echo $key; ?>" <?php if($mysql_encoding==$key){ echo "selected"; } ?>><?php echo $value; ?></option>
	          		<?php
	          	}
	          	?>
	          </select>
	      </td>
	      <td class="nmLineV3" width="<?php echo $td_width_3; ?>" align="left" valign="middle">&nbsp;</td>
	   </tr>   	
   	<?php
	   }	   
	   
	    
       if($conHas['db2']=='S')
       {
       	
       		if (!(isset($_POST['ajax']) && $_POST['ajax'] == "S"))
	   		{				
   ?>
   <tr>
      <td class="nmLineV3" colspan="3">&nbsp;</td>
   </tr>
   <?php
	   		}
   ?>
   <tr>
      <td class="nmLineV3" colspan="3" align="center" style="border:1px dotted #ff0000;"><?php echo $nm_lang['form_db2_warning']; ?></td>
   </tr>
   <!--tbody style="display:<?php if(DB2_AUTOCOMMIT_ON=="" && DB2_AUTOCOMMIT_OFF==""){ echo "none"; } ?>"-->
	   <tr style="display:<?php if(DB2_AUTOCOMMIT_ON=="" && DB2_AUTOCOMMIT_OFF==""){ echo "none"; } ?>">
	      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;autocommit</td>
	      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
	          <select name="db2_autocommit" class="nmInput">
	            <option value="" <?php if(empty($db2_autocommit)){ echo "selected"; } ?>></option>
	            <option value="<?php echo DB2_AUTOCOMMIT_ON; ?>" <?php if($db2_autocommit==DB2_AUTOCOMMIT_ON && DB2_AUTOCOMMIT_ON!=''){ echo "selected"; } ?>>DB2_AUTOCOMMIT_ON</option>
	            <option value="<?php echo DB2_AUTOCOMMIT_OFF; ?>" <?php if($db2_autocommit==DB2_AUTOCOMMIT_OFF && DB2_AUTOCOMMIT_OFF!=''){ echo "selected"; } ?>>DB2_AUTOCOMMIT_OFF</option>
	          </select>
	      </td>
	      <td class="nmLineV3" width="<?php echo $td_width_3; ?>" align="left" valign="middle">&nbsp;</td>
	   </tr>


   <!--/tbody-->
   <tr>
      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;i5_lib</td>
      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
          <input type='text' name='db2_i5_lib' value='<?php echo $db2_i5_lib; ?>' class="nmInput" onfocus="NM_onfocus(this.form.name, this.name, '', 0, 'naomask', 'lista', 'cxab', 9999999, 'TUDO')">
      </td>
      <td class="nmLineV3" width="<?php echo $td_width_3; ?>" align="left" valign="middle">&nbsp;</td>
   </tr>
   <!--tbody style="display:<?php if(DB2_I5_NAMING_ON=="" && DB2_I5_NAMING_OFF==""){ echo "none"; } ?>"-->
	   <tr style="display:<?php if(DB2_I5_NAMING_ON=="" && DB2_I5_NAMING_OFF==""){ echo "none"; } ?>">
	      <td class="nmLineV3">i5_naming</td>
	      <td class="nmLineV3">
	          <select name="db2_i5_naming" class="nmInput">
	            <option value="" <?php if(empty($db2_i5_naming)){ echo "selected"; } ?>></option>
	            <option value="<?php echo DB2_I5_NAMING_ON; ?>" <?php if($db2_i5_naming==DB2_I5_NAMING_ON && DB2_I5_NAMING_ON!=''){ echo "selected"; } ?>>DB2_I5_NAMING_ON</option>
	            <option value="<?php echo DB2_I5_NAMING_OFF; ?>" <?php if($db2_i5_naming==DB2_I5_NAMING_OFF && DB2_I5_NAMING_OFF!=''){ echo "selected"; } ?>>DB2_I5_NAMING_OFF</option>
	          </select>
	      </td>
	      <td class="nmLineV3" align="center" valign="middle">&nbsp;</td>
	   </tr>
   <!--/tbody-->
   <!--tbody style="display:<?php if(DB2_I5_TXN_NO_COMMIT=="" && DB2_I5_TXN_READ_UNCOMMITTED=="" && DB2_I5_TXN_READ_COMMITTED=="" && DB2_I5_TXN_REPEATABLE_READ=="" && DB2_I5_TXN_SERIALIZABLE==""){ echo "none"; } ?>"-->
	   <tr style="display:<?php if(DB2_I5_TXN_NO_COMMIT=="" && DB2_I5_TXN_READ_UNCOMMITTED=="" && DB2_I5_TXN_READ_COMMITTED=="" && DB2_I5_TXN_REPEATABLE_READ=="" && DB2_I5_TXN_SERIALIZABLE==""){ echo "none"; } ?>">
	      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;i5_commit</td>
	      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
	          <select name="db2_i5_commit" class="nmInput">
	            <option value="" <?php if(empty($db2_i5_commit)){ echo "selected"; } ?>></option>
		        <option value="<?php echo DB2_I5_TXN_NO_COMMIT; ?>" <?php if($db2_i5_commit==DB2_I5_TXN_NO_COMMIT && DB2_I5_TXN_NO_COMMIT!=''){ echo "selected"; } ?>>DB2_I5_TXN_NO_COMMIT</option>
	            <option value="<?php echo DB2_I5_TXN_READ_UNCOMMITTED; ?>" <?php if($db2_i5_commit==DB2_I5_TXN_READ_UNCOMMITTED && DB2_I5_TXN_READ_UNCOMMITTED!=''){ echo "selected"; } ?>>DB2_I5_TXN_READ_UNCOMMITTED</option>
	            <option value="<?php echo DB2_I5_TXN_READ_COMMITTED; ?>" <?php if($db2_i5_commit==DB2_I5_TXN_READ_COMMITTED && DB2_I5_TXN_READ_COMMITTED!=''){ echo "selected"; } ?>>DB2_I5_TXN_READ_COMMITTED</option>
	            <option value="<?php echo DB2_I5_TXN_REPEATABLE_READ; ?>" <?php if($db2_i5_commit==DB2_I5_TXN_REPEATABLE_READ && DB2_I5_TXN_REPEATABLE_READ!=''){ echo "selected"; } ?>>DB2_I5_TXN_REPEATABLE_READ</option>
	            <option value="<?php echo DB2_I5_TXN_SERIALIZABLE; ?>" <?php if($db2_i5_commit==DB2_I5_TXN_SERIALIZABLE && DB2_I5_TXN_SERIALIZABLE!=''){ echo "selected"; } ?>>DB2_I5_TXN_SERIALIZABLE</option>
	          </select>
	      </td>
	      <td class="nmLineV3" width="<?php echo $td_width_3; ?>" align="left" valign="middle">&nbsp;</td>
	   </tr>
   <!--/tbody-->
   <!--tbody style="display:<?php if(DB2_FIRST_IO=="" && DB2_ALL_IO==""){ echo "none"; } ?>"-->
	   <tr style="display:<?php if(DB2_FIRST_IO=="" && DB2_ALL_IO==""){ echo "none"; } ?>">
	      <td class="nmLineV3" width="<?php echo $td_width_1; ?>">&nbsp;&nbsp;&nbsp;i5_query_optimize</td>
	      <td class="nmLineV3" width="<?php echo $td_width_2; ?>">
	          <select name="db2_i5_query_optimize" class="nmInput">
	            <option value="" <?php if(empty($db2_i5_query_optimize)){ echo "selected"; } ?>></option>
	            <option value="<?php echo DB2_FIRST_IO; ?>" <?php if($db2_i5_query_optimize==DB2_FIRST_IO && DB2_FIRST_IO!=''){ echo "selected"; } ?>>DB2_FIRST_IO</option>
	            <option value="<?php echo DB2_ALL_IO; ?>" <?php if($db2_i5_query_optimize==DB2_ALL_IO && DB2_ALL_IO!=''){ echo "selected"; } ?>>DB2_ALL_IO</option>
	          </select>
	      </td>
	      <td class="nmLineV3"  width="<?php echo $td_width_3; ?>" align="left" valign="middle">&nbsp;</td>
	   </tr>
   <!--/tbody-->
   <?php
       }
       
	if (isset($_POST['ajax']) && $_POST['ajax'] == "S")
	{
		echo "__#$@$#__";
	}       
?>   
   
</table>

<?php
//aaaa
?>
<input type="hidden" name="rep" value="<?PHP echo $rep; ?>">
<?php
//fim aaaa
?>
<br>
<input type="hidden" name="form_create" value="<?php echo $nm_config['form_valid']; ?>" />

<input type='button' name='voltar' value='<?php echo $nm_lang['create_conn_wizard']['btnvoltar']; ?>' onclick="setStep('<?php echo $btn_retor; ?>');" class="nmButton">
<input type='button' name='avancar' value='<?php echo $nm_lang['create_conn_wizard']['btnavancar']; ?>' onclick="setStep('<?php echo $btn_avanc; ?>');" class="nmButton">
<input type='button' name='sair' value='<?php echo $nm_lang['create_conn_wizard']['btnsair']; ?>' onclick="setStep('cancel');" class="nmButton">
<input type='hidden' value='<?php echo $this->GetVar('step');?>' name='step'>
<input type='hidden' value='' name='nextstep'>
</center>


<BR \>
<BR \>
<DIV style="display:none" id="id_server">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['server']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['server']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_base">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['base']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['base']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
<DIV style="display:none" id="id_schema">
<TABLE WIDTH="400" align='center' class="nmTitle">
  <TR>
    <TD width="100" class="nmLineV3" valign="top">
        <?php echo $nm_lang['label']['schema']; ?>
    </TD>
    <TD width='300' class="nmLineV3">
    	<?php echo $nm_lang['create_conn_wizard']['descricoes']['schema']; ?>
    </TD>
  </TR>
</TABLE>
</DIV>
</form>