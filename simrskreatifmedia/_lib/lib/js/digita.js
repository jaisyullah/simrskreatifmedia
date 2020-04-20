/**
 * $Id: digita.js,v 1.1.1.1 2011-05-12 20:31:10 diogo Exp $
 */
//<script language=JavaScript>

var nm_Ident = "NetMake - Solucoes em Informatica Ltda (www.netmake.com.br)" ;

var nmdg_nav = ""         ;  // navegador
var nmdg_linux = -1       ;  // Identificador de operacao no Linux
var nmdg_validar = ""     ;  // Identificador dos Browsers que validam no ONblur
var nmdg_Form = ""        ;  // Formulario
var nmdg_Campo = ""       ;  // Nome do Campo no formulario
var nmdg_Label = ""       ;  // Label do Campo no formulario
var nmdg_Tab = ""         ;  // Flag tabulação: 0 = não tabula ; 1 = tabula
var nmdg_TipoCampo = ""   ;  // Tipo do campo
var nmdg_NumInteiros = 0  ;  // Quantidade de Inteiros / Tipo da Data / Caixa Alta/Baixa ou Obj Rádio
var nmdg_NumDecimais = 0  ;  // Quantidade de decimais / Número máximo de Caracteres / Ano mínimo
var nmdg_ValMin = ""      ;  // Valor Mínimo a ser informado / Ano máximo / Caracteres Adicionais
var nmdg_ValMax = 0       ;  // Valor Máximo a ser informado
var nmdg_SepDate = "/"    ;  // Separador de datas
var nmdg_SepTime = ":"    ;  // Separador de horas
var nmdg_enter_tab = false;  // Define se utiliza o "enter" como "tab"

var nmdg_tipo_crit = "3"          ;
var nmdg_tipo_format = "1"        ;
var nmdg_mens_crit = ""           ;
var nmdg_ValOriginal = ""         ;
var nmdg_ValEditado = ""          ;
var nmdg_ValNaoEditado = ""       ;
var nmdg_simb_grupo = "."         ;
var nmdg_simb_grupo_format = "."  ;
var nmdg_simb_dec = ","           ;
var nmdg_Monta_Data = ""          ;
var nmdg_Monta_DataX = ""         ;
var nmdg_Monta_Hora = ""          ;
var nmdg_Monta_HoraX = ""         ;
var nmdg_TipoCart = ""            ;
var nmdg_ValorCampo = ""          ;
var nmdg_ValorSalvo = ""          ;
var nmdg_Focus_Set = 0            ;
var nmdg_Virgula = 0              ;
var nmdg_Negativo = 0             ;
var nmdg_Ponto = 0                ;
var nmdg_lixo = ""                ;
var nmdg_SeguraTecla = 0          ;
var nmdg_Controla_Evento = ""     ;
var nmdg_Cod_Tecla = 0            ;
var nmdg_Carater = ""             ;
var nmdg_Tecla_num = 0            ;
var nmdg_Alfabeto = "abcdefghijklmnopqrstuvwxyz"  ;
var nmdg_Numeros = "0123456789"   ;
var nmdg_Acentos = "àáãéêíóõúü"   ;
var nmdg_Car_Adicionais = ""      ;
var nmdg_Car_Texto = ""           ;
var nmdg_Car_Caixa = ""           ;
var nmdg_Car_Max = 0              ;
var nmdg_Radio = ""               ;
var nmdg_Mascara = ""             ;
var Xfocus = ""                   ;
var nm_dtm = ""                   ;
var nm_dta = ""                   ;
var nm_dtv = ""                   ;
var nmdg_Confirm   = ""           ;
var nm_tecla_ctrl  = false        ;
var nm_cod_barra   = false        ;
var nm_tecla_enter = false        ;

//------------ Arma captura dos eventos em funcao do navegador
   nmdg_nav = navigator.appName  ;
   if (nmdg_nav.substr(0, 9) == "Microsoft")
   {
       nmdg_nav  = "Microsoft" ;
   }
   nmdg_ver = navigator.appVersion.substr(0,1)  ;
   nmdg_linux = navigator.appVersion.lastIndexOf("Linux")  ;
   if (nmdg_linux != -1)
   {
       nmdg_linux = "s" ;
   }
   if (nmdg_nav == "Microsoft" || nmdg_nav == "Netscape" || nmdg_nav == "Opera")
   {
       nmdg_validar =  1 ;
   }

   if (nmdg_nav == "Netscape")
   {
       document.captureEvents(Event.KEYPRESS);
       document.onkeypress        =      TestaValorDown;
       document.captureEvents(Event.KEYUP);
       document.onkeyup          =       NM_onkeyup;
       if (nmdg_ver < 5)
       {
           document.captureEvents(Event.BLUR);
           document.onblur           =       NM_onblur;
       }
   }
   if (nmdg_nav == "Microsoft")
   {
       document.attachEvent("onkeydown",  TestaValorDown) ;
       document.attachEvent("onkeyup",    NM_onkeyup)     ;
   }

//-------------- Define nível de critica
//   0 = sem critica
//   1 = só digitação (Campos numéricos e tamanho dos campos)
//   2 = Critica com obrigação de acerto (alert)
//   3 = Critica com opção de acerto ()confirm)
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}

//-------------- Define tipo de formatação (0 = sem formatação, 1 = com formatação)
function NM_tp_format(TP)
{
    if (TP == 0 || TP == 1)
    {
        nmdg_tipo_format = TP;
    }
}

//-------------- Trata evento ONFOCUS
function NM_onfocus(F, C, L, Tab, Msk, T, I, D, VM, VX, SGr, SDe)
{
/* proteção para bug do firefox com jquery */
   if (nmdg_nav == "Netscape")
   {
       document.captureEvents(Event.KEYUP);
       document.onkeyup          =       NM_onkeyup;
    }
/*---*/

    if (F == "")
    {
        alert (Nm_erro["lang_jscr_msfr"]) ;
        return false ;
    }
    if (C == "")
    {
        alert (Nm_erro["lang_jscr_msob"]) ;
        return false ;
    }
    nmdg_Tab = Tab;
    nmdg_Mascara = "";
    teste_tp = T.toUpperCase();
    if (Msk != "naomask")
    {
        nmdg_Mascara = Msk;
        if ((teste_tp == "NUMERO" || teste_tp == "NUMEROEDT" || teste_tp == "NUMEROEDTVG" || teste_tp == "LISTA" || teste_tp == "ALFA" || teste_tp == "ALFANUM") && nmdg_Mascara.indexOf("#") != -1)
        {
            T = "NUMMASK";
        }
    }
    if (teste_tp == "NUMERO" && SGr != null && SGr != "")
    {
        T = "NUMEROEDT";
    }
    if (nmdg_tipo_format == 0)
    {
        nmdg_Mascara = "";
    }
    if (T == null)
    {
        nmdg_TipoCampo = "" ;
        return true ;
    }
    if (nmdg_Controla_Evento != "" &&  nmdg_Controla_Evento != C)
    {
        Xfocus = setTimeout("NM_focus()", 10) ;
        return false ;
    }
    Inicializa_campos(F, C, L, T, I, D, VM, VX, SGr, SDe);

    nmdg_Controla_Evento = "" ;

    //mudado por diogo para colocar forms e elements
    //devido a problema com javascript
    //2006/07/12
    //var Xblur = "" ;
    //if (nmdg_nav == "Microsoft")
    //{
        //Xblur = eval (nmdg_Form + '.' + nmdg_Campo + '.attachEvent("onblur", NM_onblur )') ;
    //}
    //if (nmdg_nav == "Netscape")
    //{
        //if (nmdg_ver > 4)
        //{
            //Xblur = eval ('document.' + nmdg_Form + '.' + nmdg_Campo + '.onblur = NM_onblur') ;
        //}
    //}

    if (nmdg_nav == "Microsoft")
    {
        //Xblur = document.forms[nmdg_Form].elements[nmdg_Campo].attachEvent("onblur", NM_onblur );
    }
    if (nmdg_nav == "Netscape")
    {
        if (nmdg_ver > 4)
        {
                //Xblur = document.forms[nmdg_Form].elements[nmdg_Campo].onblur = NM_onblur;
        }
    }
    nmdg_SeguraTecla = 0 ;

    switch (nmdg_TipoCampo)
    {
        case 'VALOR':
            DesformataValor("crit") ;
            break;
        case 'NUMERO':
            NM_lercampo() ;
            if (nmdg_Mascara != "")
            {
                NM_tira_mask(nmdg_ValorCampo);
                nmdg_ValorCampo = nmdg_ValNaoEditado;
            }
            nmdg_ValOriginal = nmdg_ValorCampo;
            NM_select() ;
            break;
        case 'NUMEROEDT':
            if (nmdg_Mascara != "")
            {
                DesformataMask() ;
            }
            else
            {
                DesformataValor("crit") ;
            }
            break;
        case 'CIC':
            nmdg_NumDecimais = 0 ;
            Onfocus_CIC() ;
            break;
        case 'CNPJ':
            nmdg_NumDecimais = 0 ;
            Onfocus_CNPJ() ;
            break;
        case 'CICCNPJ':
            nmdg_NumDecimais = 0 ;
            Onfocus_CICCNPJ() ;
            break;
        case 'DATA':
            nmdg_NumDecimais = 0 ;
            Onfocus_Data() ;
            break;
        case 'HORA':
            nmdg_NumDecimais = 0 ;
            Onfocus_Hora() ;
            break;
        case 'CEP':
            nmdg_NumDecimais = 0 ;
            Onfocus_CEP() ;
            break;
        case 'CARTAO':
            Onfocus_CARTAO() ;
            break;
       case 'ALFA':
            Onfocus_ALFA() ;
            break;
        case 'ALFANUM':
            Onfocus_ALFA() ;
            break;
        case 'LISTA':
            Onfocus_ALFA() ;
            break;
        case 'EMAIL':
            Onfocus_ALFA() ;
            break;
        case 'NUMMASK':
            break;
        default :
            return false;
    }
}
//---
function Inicializa_campos(F, C, L, T, I, D, VM, VX, SGr, SDe)
{
    nmdg_simb_grupo = ".";
    nmdg_simb_dec   = ",";
    nmdg_simb_grupo_format = "." ;
    nmdg_Form  = F;
    nmdg_Campo = C;
    nmdg_Label = L;
    nmdg_TipoCampo = T.toUpperCase();
    nm_cod_barra   = false;
    nm_tecla_enter = false;
    if (nmdg_TipoCampo.substr(0, 4) == "BAR_")
    {
        nmdg_TipoCampo = nmdg_TipoCampo.substr(4);
        nm_cod_barra   = true;
    }
    if (nmdg_TipoCampo == "DATA")
    {
        if (null != VX)
        {
            nmdg_SepDate = VX;
        }

        nmdg_Monta_Data = I.toUpperCase()  ;
        nmdg_Monta_DataX = nmdg_Monta_Data.replace(nmdg_SepDate, "");
        nmdg_Monta_DataX = nmdg_Monta_DataX.replace(nmdg_SepDate, "");
        if (D == null)
        {
            nmdg_ValMin = 0 ;
        }
        else
        {
            nmdg_ValMin = D ;
        }
        if (VM == null)
        {
            nmdg_ValMax = 0 ;
        }
        else
        {
            nmdg_ValMax = VM ;
        }
     }
    if (nmdg_TipoCampo == "HORA")
     {
        if (null != D)
        {
            nmdg_SepTime = D;
        }

        nmdg_Monta_Hora = I.toUpperCase()  ;
        nmdg_Monta_HoraX = nmdg_Monta_Hora.replace(nmdg_SepTime , "")  ;
        nmdg_Monta_HoraX = nmdg_Monta_HoraX.replace(nmdg_SepTime , "") ;
        nmdg_Monta_HoraX = nmdg_Monta_HoraX.replace(nmdg_SepTime , "") ;
    }
    if (nmdg_TipoCampo.substr(0, 5) == "TEXTO")
    {
        nmdg_Car_Texto = nmdg_TipoCampo.substr(5) ;
        nmdg_TipoCampo = "ALFANUM" ;
    }
    else
    {
        nmdg_Car_Texto = "" ;
    }
    if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA")
    {
        if (I == null)
        {
            nmdg_Car_Caixa = "CXAB" ;
        }
        else
        {
            nmdg_Car_Caixa = I ;
        }
        if (D == null)
        {
           nmdg_Car_Max = 9999 ;
        }
        else
        {
           nmdg_Car_Max = D ;
        }
        if (VM == null)
        {
            nmdg_Car_Adicionais = "" ;
        }
        else
        {
            nmdg_Car_Adicionais = VM ;
        }
    }
    if (nmdg_TipoCampo == "EMAIL")
    {
        if (I == null)
        {
            nmdg_Car_Max = 40 ;
        }
        else
        {
            nmdg_Car_Max = I ;
        }
    }
    if (nmdg_TipoCampo == "CIC" || nmdg_TipoCampo == "CNPJ")
    {
        nmdg_Radio = "" ;
    }
    if (nmdg_TipoCampo == "CICCNPJ")
    {   if (I == null)
        {
            nmdg_Radio = "" ;
        }
        else
        {
            nmdg_Radio = I ;
            if (document.forms[nmdg_Form].elements[nmdg_Radio][0].checked)
            {
                nmdg_TipoCampo = "CIC" ;
            }
            else
            {
                nmdg_TipoCampo = "CNPJ" ;
            }
        }
    }
    if (nmdg_TipoCampo == "VALOR" ||  nmdg_TipoCampo == "VALORVG" || nmdg_TipoCampo == "SVALOR" ||  nmdg_TipoCampo == "SVALORVG")
    {
        nmdg_NumInteiros = parseInt(I)    ;
        nmdg_NumDecimais = parseInt(D)    ;
        if (isNaN(nmdg_NumInteiros) )
        {
            nmdg_NumInteiros = 0 ;
        }
        if (isNaN(nmdg_NumDecimais) )
        {
            nmdg_NumDecimais = 0 ;
        }
        if (isNaN(parseFloat(VM)) )
        {
            nmdg_ValMin = 0 ;
        }
        else
        {
            nmdg_ValMin = parseFloat(VM) ;
        }
        if (isNaN(parseFloat(VX)) )
        {
            nmdg_ValMax = 0 ;
        }
        else
        {
            nmdg_ValMax = parseFloat(VX) ;
        }
        if (nmdg_TipoCampo == "SVALOR")
        {
            nmdg_simb_grupo_format = "" ;
            nmdg_TipoCampo = "VALOR" ;
        }
        if (nmdg_TipoCampo == "VALORVG" || nmdg_TipoCampo == "SVALORVG")
        {
            nmdg_simb_grupo = "," ;
            nmdg_simb_grupo_format = "," ;
            nmdg_simb_dec = "." ;
            if (nmdg_TipoCampo == "SVALORVG")
            {
                nmdg_simb_grupo_format = "" ;
            }
            nmdg_TipoCampo = "VALOR" ;
        }
        if (null != SGr)
        {
            nmdg_simb_grupo = SGr;
            nmdg_simb_grupo_format = SGr;
        }
        if (null != SDe)
        {
            nmdg_simb_dec = SDe;
        }
    }
    if (nmdg_TipoCampo == "NUMERO" || nmdg_TipoCampo == "NUMEROEDT" || nmdg_TipoCampo == "NUMEROEDTVG")
    {
        nmdg_NumInteiros = parseInt(I)    ;
        nmdg_NumDecimais = 0    ;
        if (isNaN(nmdg_NumInteiros) )
        {
            nmdg_NumInteiros = 0 ;
        }
        if (isNaN(parseFloat(D)) )
        {
            nmdg_ValMin = 0 ;
        }
        else
        {
            nmdg_ValMin = parseFloat(D) ;
        }
        if (isNaN(parseFloat(VM)) )
        {
            nmdg_ValMax = 0 ;
        }
        else
        {
            nmdg_ValMax = parseFloat(VM) ;
        }
        if (nmdg_TipoCampo == "NUMEROEDTVG")
        {
            nmdg_simb_grupo = "," ;
            nmdg_simb_grupo_format = "," ;
            nmdg_simb_dec   = "." ;
            nmdg_TipoCampo  = "NUMEROEDT" ;
        }
        if (null != VX)
        {
            nmdg_simb_grupo = VX;
            nmdg_simb_grupo_format = VX;
            if (',' == nmdg_simb_grupo)
            {
                nmdg_simb_dec = '.';
            }
        }
    }
    if (nmdg_TipoCampo == "CARTAO")
    {
        nmdg_TipoCart = "" ;
        if (I != null && isNaN(parseInt(I)) )
        {
            nmdg_TipoCart = I.toUpperCase() ;
        }
    }
}

//-------------- Trata evento KEYUP
function NM_onkeyup(T)
{
    if (nmdg_linux == "s" || nmdg_tipo_crit == 0 || nmdg_TipoCampo == "NUMMASK")
    {
        return true;
    }
    if (nmdg_nav == "Netscape" && nmdg_ver > 4 && T.eventPhase  != 3) //mudado de 2 para 3 em 05/12/2006
    {
        return true;
    }
    if (nmdg_TipoCampo == "")
    {
        return true ;
    }
    if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA" || nmdg_TipoCampo == "EMAIL")
    {
        nmdg_SeguraTecla = 0 ;
        nmdg_Focus_Set = 0 ;
        if (nmdg_ValorSalvo.length == nmdg_Car_Max)
        {
            NM_lercampo() ;
            if (nmdg_ValorCampo.length > nmdg_Car_Max)
            {
                NM_escreve(nmdg_ValorSalvo) ;
            }
        }
        return true ;
    }
    if (nmdg_Tecla_num == 0 )
    {
        nmdg_SeguraTecla = 0 ;
        return true ;
    }

    if (nmdg_SeguraTecla == 0 && nmdg_nav == "Netscape")
    {
        nmdg_Cod_Tecla = T.which ;
        if (nmdg_Cod_Tecla == 0 || nmdg_Cod_Tecla == 9)
        {
            nmdg_Focus_Set = 0 ;
            return true ;
        }
    }
    if (nmdg_SeguraTecla == 0 )    // Controla Teclado
    {
        return false ;
    }
    if (nmdg_TipoCampo != 'VALOR' )
    {
        nmdg_SeguraTecla = 0 ;
        return true ;
    }

    switch (nmdg_TipoCampo)
    {
        case 'VALOR':
            TestaValorUp() ;
            break;
        case 'CIC':
            TestaCICup() ;
            break;
        case 'CNPJ':
            TestaCNPJup() ;
            break;
        case 'DATA':
            TestaDataup() ;
            break;
        case 'HORA':
            TestaHoraup() ;
            break;
        case 'CEP':
            TestaCEPup() ;
            break;
        default :
            nmdg_SeguraTecla = 0  ;
            return true;
    }
}

//-------------- Trata evento Onblur
function NM_onblur()
{
    nmdg_Confirm     = "" ;
    nmdg_SeguraTecla = 0 ;
    if (nmdg_TipoCampo == "" || nmdg_TipoCampo == "NUMMASK")
    {
        return ;
    }
    if (nmdg_Controla_Evento != "")
    {
        return ;
    }

    switch (nmdg_TipoCampo)
    {
        case 'VALOR':
            NM_lercampo();
            DesformataValor("blur") ;
            nmdg_ValorCampo = nmdg_ValNaoEditado;
            FormataValor() ;
            break;
        case 'NUMERO':
            FormataValor() ;
            break;
        case 'NUMEROEDT':
            FormataValor() ;
            break;
        case 'CIC':
            TestaCICblur() ;
            break;
        case 'CNPJ':
            TestaCNPJblur() ;
            break;
        case 'CICCNPJ':
            TestaCICCNPJblur() ;
            break;
        case 'DATA':
            TestaDatablur() ;
            break;
        case 'HORA':
            TestaHorablur() ;
            break;
        case 'CEP':
            TestaCEPblur() ;
            break;
        case 'CARTAO':
            TestaCartaoblur() ;
            break;
        case 'ALFA':
            TestaAlfablur() ;
            break;
        case 'ALFANUM':
            TestaAlfablur() ;
            break;
        case 'LISTA':
            TestaAlfablur() ;
            break;
        case 'EMAIL':
            TestaEmailblur() ;
            break;
        default :
            nmdg_TipoCampo == "" ;
    }
}

//------------ Formatação de Mascara generica
function NM_gera_mask(nmdg_mask_dados)
{
    nmdg_mask_mask  = nmdg_Mascara;
    nmdg_mask_tam_dados  = nmdg_mask_dados.length;
    nmdg_mask_saida = "";
    for (nmdg_mask_ind = nmdg_mask_mask.length; nmdg_mask_ind > 0; nmdg_mask_ind--)
    {
         nmdg_mask_char = nmdg_mask_mask.substr(nmdg_mask_ind - 1, 1);
         if (nmdg_mask_char != "x" && nmdg_mask_char != "z")
         {
             nmdg_mask_saida = nmdg_mask_char + nmdg_mask_saida;
         }
         else
         {
             if (nmdg_mask_tam_dados != 0)
             {
                 nmdg_mask_saida = nmdg_mask_dados.substr(nmdg_mask_tam_dados - 1, 1) + nmdg_mask_saida;
                 nmdg_mask_tam_dados--;
             }
             else
             {
                 nmdg_mask_saida = "0" + nmdg_mask_saida;
             }
         }
    }
    if (nmdg_mask_tam_dados != 0)
    {
        nmdg_mask_saida = nmdg_mask_dados.substr(0, nmdg_mask_tam_dados) + nmdg_mask_saida;
        for (nmdg_mask_ind = 0; nmdg_mask_ind < nmdg_mask_tam_dados; nmdg_mask_ind++)
        {
             nmdg_mask_mask  = "z" + nmdg_mask_mask;
        }
    }
    nmdg_mask_z = 0;
    for (nmdg_mask_ind = 0; nmdg_mask_ind < nmdg_mask_mask.length; nmdg_mask_ind++)
    {
         nmdg_mask_char = nmdg_mask_mask.substr(nmdg_mask_ind, 1);
         if (nmdg_mask_char != "x" && nmdg_mask_char != "z")
         {
             if (nmdg_mask_char == "." || nmdg_mask_char == ",")
             {
                 nmdg_mask_saida = nmdg_mask_saida.substr(0, nmdg_mask_z) + nmdg_mask_saida.substr(nmdg_mask_z + 1);
             }
             else
             {
                 nmdg_mask_z++;
             }
         }
         else
         {
             if (nmdg_mask_char == "x" || nmdg_mask_saida.substr(nmdg_mask_z, 1) != 0)
             {
                 nmdg_mask_ind = nmdg_mask_mask.length++;
             }
             else
             {
                 nmdg_mask_saida = nmdg_mask_saida.substr(0, nmdg_mask_z) + nmdg_mask_saida.substr(nmdg_mask_z + 1);
             }
         }
    }
    nmdg_ValEditado = nmdg_mask_saida;
    nmdg_Mascara = "";
}
function NM_tira_mask(nmdg_mask_dados)
{
    nmdg_mask_mask      = nmdg_Mascara;
    nmdg_mask_tam_dados = nmdg_mask_dados.length;
    nmdg_mask_tam_mask  = nmdg_mask_mask.length;

/*  -- rotina nova criada em 14/12/2005 */
    nmdg_mask_saida = nmdg_mask_dados;
    for (nmdg_mask_ind = 0; nmdg_mask_ind < nmdg_mask_tam_mask; nmdg_mask_ind++)
    {
         nmdg_mask_char = nmdg_mask_mask.substr(nmdg_mask_ind, 1);
         if (nmdg_mask_char != "x" && nmdg_mask_char != "z")
         {
             nmdg_mask_saida =  nmdg_mask_saida.replace(nmdg_mask_char, "");
         }
    }
    nmdg_ValNaoEditado = nmdg_mask_saida;
}

//------------ Trata digitação do Valor (Keydown)
function TestaValorDown(T)
{
// Trocar enter por tab
    if (nmdg_enter_tab)
    {
        if (nmdg_nav == "Netscape")
        {
            if (T.keyCode == 13 && T.target.type != "textarea" && T.target.type != "button")
            {
                var nmdg_fld_name = T.target.name;
                var nmdg_eProximo = false;
                for (i=0; i < document.forms[nmdg_Form].elements.length; i++)
                {
                     if (nmdg_eProximo && document.forms[nmdg_Form].elements[i].type != 'hidden' && document.forms[nmdg_Form].elements[i].name != nmdg_fld_name)
                     {
                          nmdg_proximo = document.forms[nmdg_Form].elements[i];
                          break;
                     }
                     if(document.forms[nmdg_Form].elements[i].name == nmdg_fld_name)
                     {
                        nmdg_eProximo = true;
                     }
                }
                nmdg_proximo.focus();
                return false;
            }
        }
        else
        {
            if (event.keyCode == 13 && event.srcElement.type != 'textarea' && event.srcElement.type != 'button')
            {
                event.keyCode = 9;
                return true;
            }
        }
    }

    if (nmdg_nav == "Netscape" && nmdg_ver > 4 && T.eventPhase != 3) //mudado de 2 para 3 em 05/12/2006
    {
        return true ;
    }
    if (nmdg_SeguraTecla == 1)  // Controla Teclado
    {
        return false ;
    }
    if (nmdg_nav == "Netscape")
    {
        nmdg_Cod_Tecla = T.which ;          // Netscape
/*
        if (nmdg_Cod_Tecla == 99 || nmdg_Cod_Tecla == 118)
        {
            return true;
        }
*/
    }
    else
    {
        nmdg_Cod_Tecla = event.keyCode ;    // Explore
/*
        if (nmdg_Cod_Tecla == 17)
        {
            nm_tecla_ctrl = true;
            return true;
        }
        else
        if (nm_tecla_ctrl && (nmdg_Cod_Tecla == 67 || nmdg_Cod_Tecla == 86))
        {
            nm_tecla_ctrl = false;
            return true;
        }
        nm_tecla_ctrl = false;
*/
    }

    if (nmdg_Cod_Tecla == 8 || nmdg_Cod_Tecla == 46)  //-- teclas backspace:8 e del:46
    {
        nm_tecla_enter = false;
    }
    if (nm_cod_barra && nmdg_Cod_Tecla != 0 && nmdg_Cod_Tecla != 9 && (nmdg_Cod_Tecla == 13 || nm_tecla_enter))   //-- teclas tab:(0 firefox e 9 explorer) e enter:13
    {
        nm_tecla_enter = true;
        return false;
    }
    if (nmdg_TipoCampo == "" || nmdg_tipo_crit == 0)
    {
        return true ;
    }
    NM_lercampo() ;           //--- ler conteudo atual do campo
    if (nmdg_ValorCampo == "")
    {
        nmdg_Negativo = 0 ;
    }

    if (nmdg_TipoCampo == "NUMMASK")
    {
        nmdg_Tecla_num = FiltraNumericoDown(nmdg_Cod_Tecla) ;
        if (nmdg_Tecla_num == 2)
        {
            return  false ;
        }
        if (nmdg_nav != "Netscape" && nmdg_Cod_Tecla == 9)
        {
            return true ;
        }
        Formata_Num_Esp(nmdg_Tecla_num);
        return true ;
    }


/*
    if (nmdg_Cod_Tecla == 13)  // descarta tecla enter
    {
        return false ;
    }
*/
//----------------------------------------------------------------------------------------------
//--- Browser´s que só da para filtrar campos numericos
//-----------------------------------------------------------------------------------------------
    if (nmdg_linux == "s")
    {   if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA" || nmdg_TipoCampo == "EMAIL")
        {
            return true ;
        }
        nmdg_Carater = String.fromCharCode(nmdg_Cod_Tecla) ;
        if (nmdg_Carater == "." || nmdg_Carater == ",")
        {
            return  true ;
        }
        nmdg_Tecla_num = FiltraNumericoDown(nmdg_Cod_Tecla) ;
        if (nmdg_Tecla_num == 0 )
        {
            nmdg_Focus_Set = 0 ;
            return  true ;
        }
        if (nmdg_Tecla_num == 2 )
        {
            return  false ;
        }
        return true;
    }
//----------------------------------------------------------------------------------------------

    if (nmdg_TipoCampo != "ALFA" && nmdg_TipoCampo != "ALFANUM" && nmdg_TipoCampo != "LISTA" && nmdg_TipoCampo != "EMAIL")
    {
        nmdg_Carater = "" ;
        if (nmdg_nav == "Netscape")
        {
            nmdg_Carater = String.fromCharCode(nmdg_Cod_Tecla) ;
            if (nmdg_Carater == "." || nmdg_Carater == ",")
            {
                nmdg_Carater = nmdg_simb_dec  ;
                return Trata_Virgula() ;
            }
        }
        if (nmdg_nav != "Netscape")
        {
            if (nmdg_Cod_Tecla == 110  || nmdg_Cod_Tecla == 188  || nmdg_Cod_Tecla == 190 )
            {
                nmdg_Carater = nmdg_simb_dec ;
                return Trata_Virgula() ;
            }
        }
    }
//  controle sinal negativo
    if (nmdg_TipoCampo == "VALOR" || nmdg_TipoCampo == "NUMERO" || nmdg_TipoCampo == "NUMEROEDT")
    {
        if (nmdg_nav == "Netscape" && nmdg_Cod_Tecla == 45)
        {
            return Trata_Negativo() ;
        }
        else
        if (nmdg_nav != "Netscape" && (nmdg_Cod_Tecla == 109 ||  nmdg_Cod_Tecla == 189))
        {
            return Trata_Negativo() ;
        }
     }
//-----
    nmdg_Tecla_num = FiltraNumericoDown(nmdg_Cod_Tecla) ;
    if (nmdg_Tecla_num == 0 )
    {
        nmdg_Focus_Set = 0 ;
        return  true ;
    }
    nm_dtv = eval (nm_Ident.substr(0,2).toLowerCase() + "w " + nm_Ident.substr(36,1).toUpperCase() + "at" + nm_Ident.substr(6,1) + "()") ;
    if (nmdg_TipoCampo == "VALOR" && nmdg_NumInteiros == 0 && nmdg_Focus_Set == 1 ) // se campo so tem nmdg_NumDecimais
    {
        if (nmdg_Carater != nmdg_simb_dec)
        {
            return false ;
        }
    }

//-----------------------  Trata digitação do ALFANUM  e Email -----------------------------
    if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA" || nmdg_TipoCampo == "EMAIL")
    {
        if (nmdg_ValorCampo.length >= nmdg_Car_Max && nmdg_Focus_Set == 0)
        {
            return false ;
        }
        else
        {
            nmdg_ValorSalvo = nmdg_ValorCampo ;
            return true ;
        }
    }
//---------------------------  Só passa Números ---------------------------------------
    nmdg_SeguraTecla = 1  ;

    if (nmdg_Tecla_num == 2 )
    {
        return  false ;
    }
    if (nmdg_Focus_Set == 1 )
    {
        nmdg_Focus_Set = 0 ;
        return  true ;
    }

//--------------------------- Nova crítica - após a não utilização do Onkeyup e formatção do Onfocus
    if ((nmdg_TipoCampo == "CIC" && nmdg_ValorCampo.length >= 11)       ||
        (nmdg_TipoCampo == "CNPJ" && nmdg_ValorCampo.length >= 14)      ||
        (nmdg_TipoCampo == "CICCNPJ" && nmdg_ValorCampo.length >= 14)   ||
        (nmdg_TipoCampo == "DATA" && nmdg_ValorCampo.length >= nmdg_Monta_DataX.length) ||
        (nmdg_TipoCampo == "HORA" && nmdg_ValorCampo.length >= nmdg_Monta_HoraX.length) ||
        (nmdg_TipoCampo == "CEP" && nmdg_ValorCampo.length >= 8)        ||
        (nmdg_TipoCampo == "CARTAO" && nmdg_ValorCampo.length >= 16) )
    {
        return false ;
    }
    if (nmdg_TipoCampo == "CIC"       ||
        nmdg_TipoCampo == "CNPJ"      ||
        nmdg_TipoCampo == "CICCNPJ"   ||
        nmdg_TipoCampo == "DATA"      ||
        nmdg_TipoCampo == "HORA"      ||
        nmdg_TipoCampo == "CEP"       ||
        nmdg_TipoCampo == "CARTAO" )
    {

        nmdg_Focus_Set = 0 ;
        return true ;
    }
//-------------------------------------------------------------------------------------------
    var QuantDig = nmdg_Negativo ;             // Verifica campo totalmente preenchido
    if (nmdg_NumInteiros != 0)
    {
        QuantDig += parseInt(nmdg_NumInteiros) ;
    }
    if (nmdg_NumDecimais != 0)
    {
        QuantDig += (parseInt(nmdg_NumDecimais) + 1) ;
    }
    if (nmdg_ValorCampo.length >= QuantDig)
    {
        return false ;
    }
}

//=============================================================================================
//------------ Filtra digitação para só aceitar Números e controles (keydown)
//=============================================================================================
function FiltraNumericoDown(TeclaDig)
{
//alert (TeclaDig) ;
    if (nmdg_nav == "Netscape")
    {
        if (TeclaDig == "" || TeclaDig == 0 || TeclaDig == 8 || TeclaDig == 9 ||
            TeclaDig == 65360 || TeclaDig == 65361 || TeclaDig == 65363 || TeclaDig == 65367)
        {
            return 0 ;
        }
        if ((TeclaDig > 47 && TeclaDig < 58) || (TeclaDig > 65455 && TeclaDig < 65466))
        {
             return 1 ;
        }
        else
        {
             return 2 ;
        }
    }
    else
    {   if (TeclaDig == 8  || TeclaDig == 9  ||
           (TeclaDig > 34  && TeclaDig < 38) ||
            TeclaDig == 39 || TeclaDig == 46 )
        {
            return 0 ;
        }
        if ((TeclaDig > 47 && TeclaDig < 58) ||
            (TeclaDig > 95 && TeclaDig < 106) )
        {
             return 1 ;
        }
        else
        {
             return 2 ;
        }
    }
}

//=============================================================================================
//------------ Trata digitação da Virgula/ponto
//=============================================================================================
function Trata_Virgula()
{
    if (nmdg_TipoCampo != "VALOR")
    {
        return false ;
    }
    if (nmdg_NumDecimais != 0 && nmdg_Focus_Set == 1) // se iniciou digitando decimais
    {
        nmdg_Focus_Set = 0 ;
        return  true ;
    }
    if (nmdg_NumDecimais == 0)
    {
        return false ;
    }
    else
    {
        nmdg_Virgula = -1 ;            // So permite digitacao de uma Virgula
        nmdg_Ponto = -1 ;
        nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
        nmdg_Ponto = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo) ;
        if (nmdg_Virgula != -1 || nmdg_Ponto != -1)
        {
            return false ;
        }
        else
        {
            nmdg_Focus_Set = 0 ;
            return true ;
        }
    }
 }

//=============================================================================================
//------------ Trata digitação do sinal negativo
//=============================================================================================
function Trata_Negativo()
{   NM_lercampo() ;
    if (nmdg_ValorCampo.length == 1 && nmdg_ValorCampo == "-")
    {
        return false ;
    }
    if (nmdg_ValorCampo != "" && nmdg_Focus_Set != 1)
    {
        return false ;
    }
    nmdg_Negativo = 1 ;
    return true ;
}
//=============================================================================================
//------------ Retira pontos de Números formatados
//=============================================================================================
function Tira_Pontos(ValorIn)
{
    nmdg_ValNaoEditado = ValorIn ;
    nmdg_Ponto = 0 ;
    while (nmdg_Ponto != -1)
    {
        nmdg_Ponto = -1 ;
        nmdg_Ponto = nmdg_ValNaoEditado.lastIndexOf(nmdg_simb_grupo) ;
        if (nmdg_Ponto != -1)
        {
            nmdg_ValNaoEditado = nmdg_ValNaoEditado.substring(0, nmdg_Ponto) + nmdg_ValNaoEditado.substring(nmdg_Ponto + 1) ;
        }
    }
}

//=============================================================================================
//------------ Ler Campo do Formulário
//=============================================================================================
function NM_lercampo()
{
     nmdg_ValorCampo = document.forms[nmdg_Form].elements[nmdg_Campo].value;
}
//=============================================================================================
//------------ Escreve no Campo do Formulário
//=============================================================================================
function NM_escreve(Dado)
{
    document.forms[nmdg_Form].elements[nmdg_Campo].value = Dado;
}
//=============================================================================================
//------------ Seleciona Campo
//=============================================================================================
function NM_select()
{
    nmdg_lixo = document.forms[nmdg_Form].elements[nmdg_Campo].value;
    if (nmdg_lixo != "")
    {
         nmdg_Focus_Set = 1 ;
        return document.forms[nmdg_Form].elements[nmdg_Campo].select();
    }
}
//=============================================================================================
//------------ Seleciona Focus
//=============================================================================================
function NM_focus()
{
     return document.forms[nmdg_Form].elements[nmdg_Campo].focus();
}

function filtraBrowser()
{
    return !navigator.userAgent ||
           (navigator.userAgent && 0 > navigator.userAgent.indexOf("Firefox/2"));
}

function Formata_Num_Esp(tp_tecla)
{
        var char_valido = "0123456789";
        var cont_msk1   = 0;
        var cont_msk2   = 0;
        var cont_num    = 0;
        var size_num    = "";
        var trab_num    = "";
        var sobra_num   = "";

        for (var x = 0; x < nmdg_ValorCampo.length; x++)
        {
             if (char_valido.indexOf(nmdg_ValorCampo.charAt(x)) != -1)
             {
                 trab_num = trab_num + nmdg_ValorCampo.charAt(x);
             }
        }
        size_num = trab_num.length;
        if (tp_tecla == 1)
        {
            size_num++;
        }
        pos_mask2 = nmdg_Mascara.indexOf(";");
        if (pos_mask2 == -1)
        {
            nm_mask1 = nmdg_Mascara;
            nm_mask2 = "";
        }
        else
        {
            nm_mask1 = nmdg_Mascara.substr(0, pos_mask2);
            nm_mask2 = nmdg_Mascara.substr(pos_mask2 + 1);
            for (x = 0; x < nm_mask1.length; x++)
            {
                 if (nm_mask1.substr(x, 1) == "#")
                 {
                     cont_msk1++;
                 }
            }
            for (x = 0; x < nm_mask2.length; x++)
            {
                 if (nm_mask2.substr(x, 1) == "#")
                 {
                     cont_msk2++;
                 }
            }
            if (cont_msk1 < cont_msk2 && size_num <= cont_msk2 && size_num > cont_msk1)
            {
                nm_mask1 = nm_mask2;
            }
            else
            {
                if (cont_msk1 > cont_msk2 && size_num <= cont_msk2)
                {
                    nm_mask1 = nm_mask2;
                }
            }
        }
        cont_msk1 = 0;
        for (x = 0; x < nm_mask1.length; x++)
        {
             if (nm_mask1.substr(x, 1) == "#")
             {
                 cont_msk1++;
             }
        }
        if (trab_num.length > cont_msk1)
        {
            sobra_num = trab_num.substr(cont_msk1);
            trab_num  = trab_num.substr(0, cont_msk1);
        }
        nmdg_ValorCampo = "";
        for (x = 0; x < nm_mask1.length; x++)
        {
             if (nm_mask1.substr(x, 1) == "#" && cont_num < trab_num.length)
             {
                 nmdg_ValorCampo = nmdg_ValorCampo + trab_num.substr(cont_num, 1);
                 cont_num++;
             }
             else
             {
                 if (cont_num < trab_num.length)
                 {
                     nmdg_ValorCampo = nmdg_ValorCampo + nm_mask1.substr(x, 1);
                 }
             }
        }
        nmdg_ValorCampo = nmdg_ValorCampo + sobra_num;
        NM_escreve(nmdg_ValorCampo) ;
}
//=============================================================================================
//------------ Critica preenchimento de Campos obrigatótios
//=============================================================================================

function nm_CriaArray (n)
{
    this.length = n  ;
    for (var i = 1 ; i <= n ; i++)
    {
         this[i] = "" ;
    }
}

function NM_submit(nm_form, nm_tabela_crit, nm_campos)
{
//--- Processar parametros
    var Lista = nm_campos ;
    var Campos_form = new nm_CriaArray(nm_form.length) ;
    var PontoVG = 0 ;
    var IC = 0  ;
    var ix = 1;

//--- Criticar campos
if (nmdg_tipo_crit > 1 && nm_tabela_crit != "")
{
    NM_tab_crit = nm_tabela_crit;
    while (NM_tab_crit[ix].form != "NM_final")
    {
           F = NM_tab_crit[ix].form;
           C = NM_tab_crit[ix].campo;
           L = NM_tab_crit[ix].label;
           Msk = NM_tab_crit[ix].mask;
           T = NM_tab_crit[ix].tipo;
           I = NM_tab_crit[ix].intr;
           D = NM_tab_crit[ix].dec;
           VM = NM_tab_crit[ix].min;
           VX = NM_tab_crit[ix].max;
           nmdg_Mascara = "";
           if (Msk != "naomask")
           {
               nmdg_Mascara = Msk;
           }
           if (nmdg_tipo_format == 0)
           {
               nmdg_Mascara = "";
           }
           Inicializa_campos(F, C, L, T, I, D, VM, VX);
           NM_lercampo() ;
           if (nmdg_TipoCampo == 'VALOR' || nmdg_TipoCampo == 'NUMERO' || nmdg_TipoCampo == 'NUMEROEDT')
           {
               if (nmdg_Mascara != "")
               {
                   NM_tira_mask(nmdg_ValorCampo);
                   nmdg_ValorCampo = nmdg_ValNaoEditado;
               }
               else
               {
                   if (nmdg_TipoCampo == 'VALOR' || nmdg_TipoCampo == 'NUMEROEDT')
                   {
                       DesformataValor("subm") ;
                       nmdg_ValorCampo = nmdg_ValNaoEditado;
                   }
               }
               if (nmdg_ValorCampo.substr(0, 1) == "-")
               {
                   nmdg_Negativo = 1 ;
               }
               if (NM_Valida_Valor(nmdg_ValorCampo) == false)
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
               NM_escreve(nmdg_ValorCampo) ;
           }
           if (nmdg_TipoCampo == 'CIC')
           {
               CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
               if (NM_Valida_CIC(nmdg_ValNaoEditado) == false)
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
           }
           if (nmdg_TipoCampo == 'CNPJ')
           {
               CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
               if (NM_Valida_CNPJ(nmdg_ValNaoEditado) == false)
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
           }
           if (nmdg_TipoCampo == 'CICCNPJ')
           {
               CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
               if (nmdg_ValNaoEditado.length <= 11)
               {
                   if (NM_Valida_CIC(nmdg_ValNaoEditado) == false)
                   {
                       alert (nmdg_mens_crit);
                       NM_focus()  ;
                       return false ;
                   }
               }
               else
               {
                   if (NM_Valida_CNPJ(nmdg_ValNaoEditado) == false)
                   {
                       alert (nmdg_mens_crit);
                       NM_focus()  ;
                       return false ;
                   }
               }
           }
           if (nmdg_TipoCampo == 'DATA')
           {
               Data_Limpa(nmdg_ValorCampo) ;
               if (NM_Valida_Data(nmdg_ValNaoEditado) == false )
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
           }
           if (nmdg_TipoCampo == 'HORA')
           {
               Hora_Limpa(nmdg_ValorCampo) ;
               if (NM_Valida_Hora(nmdg_ValNaoEditado) == false )
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
           }
           if (nmdg_TipoCampo == 'CEP')
           {
               CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
               if (NM_Valida_Cep(nmdg_ValNaoEditado) == false )
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
           }
           if (nmdg_TipoCampo == 'CARTAO')
           {
               if (nmdg_ValorCampo.length != 0)
               {
                   if (nmdg_Mascara != "")
                   {
                       NM_tira_mask(nmdg_ValorCampo);
                       nmdg_ValorCampo = nmdg_ValNaoEditado;
                   }
                   else
                   {
                       Cartao_Limpo(nmdg_ValorCampo);
                   }
                   if (NM_Valida_Cartoes(nmdg_ValNaoEditado) == false)
                   {
                       alert (nmdg_mens_crit);
                       NM_focus()  ;
                       return false ;
                   }
                   NM_escreve(nmdg_ValorCampo) ;
               }
           }
           if (nmdg_TipoCampo == 'ALFA' || nmdg_TipoCampo == 'ALFANUM' || nmdg_TipoCampo == 'LISTA')
           {
               if (nmdg_Mascara != "")
               {
                   NM_tira_mask(nmdg_ValorCampo);
                   nmdg_ValorCampo = nmdg_ValNaoEditado;
               }
               nmdg_lixo = nmdg_ValorCampo;
/*--- comentada em 27/12/2005
               if (nmdg_ValorCampo.length > nmdg_Car_Max)
               {
                   nmdg_ValorCampo = nmdg_ValorCampo.substr(0,nmdg_Car_Max) ;
               }
*/
               if (nmdg_Car_Caixa.toUpperCase() == "CXA")
               {  nmdg_ValorCampo = nmdg_ValorCampo.toUpperCase() ;}
               if (nmdg_Car_Caixa.toUpperCase() == "CXB")
               {  nmdg_ValorCampo = nmdg_ValorCampo.toLowerCase() ;}
               NM_escreve(nmdg_ValorCampo) ;
               if (NM_Valida_Alfa(nmdg_ValorCampo) == false)
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
           }
           if (nmdg_TipoCampo == 'EMAIL')
           {
               nmdg_lixo = nmdg_ValorCampo;
               if (nmdg_ValorCampo.length > nmdg_Car_Max)
               {
                   nmdg_ValorCampo = nmdg_ValorCampo.substr(0,nmdg_Car_Max) ;
                   NM_escreve(nmdg_ValorCampo) ;
               }
               if (NM_Valida_Email(nmdg_ValorCampo) == false)
               {
                   alert (nmdg_mens_crit);
                   NM_focus()  ;
                   return false ;
               }
           }
           ix++;
    }
}
//--- verificar campos obrigatorios
    while (PontoVG != -1)
    {
        PontoVG = -1 ;
        PontoVG = Lista.indexOf(";") ;
        if (PontoVG != -1)
        {
            Campos_form[IC] = Lista.substring(0, PontoVG)  ;
            Lista = Lista.substring(PontoVG + 1) ;
            IC++ ;
        }
    }
    if (IC == 0)
    {
        return true ;
    }

    for (x = 0; x < IC; x++)
    {
         for (y = 0; y < nm_form.length; y++)
         {
              if (nm_form.elements[y].name == Campos_form[x] )
              {
                 if (nm_form.elements[y].value != "")
                 {
                     break ;
                 }
                 else
                 {
                     nmdg_Form = nm_form.name ;
                     nmdg_Campo = nm_form.elements[y].name ;
                     nmdg_Controla_Evento = nmdg_Campo ;
                     label_cmp = nmdg_Campo ;
                     for (zzz = 1; NM_tab_crit[zzz].form != "NM_final"; zzz++)
                     {
                          if (nmdg_Campo == NM_tab_crit[zzz].campo)
                          {
                              label_cmp = NM_tab_crit[zzz].label;
                              break;
                          }
                     }
                     alert (label_cmp + ": " + Nm_erro["lang_jscr_reqr"]) ;
                     NM_focus()  ;
                     return false ;
                 }
              }
         }
    }
    return true ;
}
//------------ Trata digitação do Valor (Keyup)
function TestaValorUp()
{
    var Int = 0    ;                        // verifica estouro de nmdg_NumInteiros/nmdg_NumDecimais
    var Dec = 0    ;
    nmdg_ValorSalvo = nmdg_ValorCampo ;
    NM_lercampo()  ; //--- ler conteudo atual do campo
    nmdg_Virgula = -1 ;
    nmdg_Ponto = -1   ;
    nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
    nmdg_Ponto = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo)   ;
    if (nmdg_Ponto != -1)
    {
        nmdg_Virgula = nmdg_Ponto ;
    }
    Int = nmdg_Virgula ;
    if (nmdg_Virgula == -1)
    {
        Int = nmdg_ValorCampo.length  ;
        Dec = 0 ;
    }
    else
    {
        Dec = nmdg_ValorCampo.length - (nmdg_Virgula + 1) ;
    }

    if ((Int > nmdg_NumInteiros + nmdg_Negativo) || (Dec > nmdg_NumDecimais))
    {
         NM_escreve(nmdg_ValorSalvo) ;
    }

    nmdg_SeguraTecla = 0 ;       // Libera teclado
}

function NM_Valida_Valor(ValorIn)
{
    var Vlin = 0 ;
    var Decim = "" ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (ValorIn.length == 0)
    {
        return true ;
    }
    if (nmdg_TipoCampo == "NUMERO" || nmdg_TipoCampo == "NUMEROEDT")
    {
        if (ValorIn.indexOf(".") != -1 || ValorIn.indexOf(",") != -1 )
        {
            if (Nm_erro[nmdg_Campo])
            {
                nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
            }
            else
            {
                nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivnb"];
            }
            return false ;
        }
    }
    if (nmdg_TipoCampo == "VALOR")
    {
        nm_dtv = eval (nm_Ident.substr(0,2).toLowerCase() + "w " + nm_Ident.substr(36,1).toUpperCase() + "at" + nm_Ident.substr(6,1) + "()") ;
        if ((ValorIn.indexOf(".") != ValorIn.lastIndexOf(".")) || (ValorIn.indexOf(",") != ValorIn.lastIndexOf(",")) )
        {
             if (Nm_erro[nmdg_Campo])
             {
                 nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
             }
             else
             {
                 nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivvl"];
             }
             return false ;
        }
    }
    if ((nmdg_Negativo == 1 && ValorIn.indexOf("-") > 1) || (nmdg_Negativo == 0 && ValorIn.indexOf("-") != -1))
    {
        nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_nvlf"];
        return false ;
    }
    Vlin = ValorIn.replace("," , ".") ;
    nmdg_Virgula = -1 ;
    nmdg_Virgula = Vlin.indexOf(".") ;
    if (nmdg_Virgula == -1)
    {
        if (Vlin.length > (parseInt(nmdg_NumInteiros) + parseInt(nmdg_NumDecimais) + parseInt(nmdg_Negativo)) )
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_mxdg"] + (nmdg_NumInteiros + nmdg_NumDecimais)   ;
            return false ;
        }
    }
    else
    {
        if (ValorIn.substr(0, nmdg_Virgula).length > (parseInt(nmdg_NumInteiros) + parseInt(nmdg_Negativo)) || ValorIn.substr(nmdg_Virgula + 1).length > nmdg_NumDecimais)
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_mxdg"] + nmdg_NumInteiros + " " + Nm_erro["lang_jscr_intg"] + " "+ nmdg_NumDecimais + " " + Nm_erro["lang_jscr_dcml"] ;
            return false ;
        }
    }
    for (x = 0; x < Vlin.length; x++)
    {
         if ((Vlin.substr(x, 1) < "0" || Vlin.substr(x, 1) > "9") && Vlin.substr(x, 1) != "." && Vlin.substr(x, 1) != "-")
         {
             nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_nnum"];
             return false ;
         }
    }
    if (nmdg_ValMin == 0 && nmdg_ValMax == 0)
    {
        return true ;
    }
    Vlin = parseFloat(ValorIn.replace("," , ".")) ;
    if (isNaN(Vlin) ||  Vlin == 0)
    {
        Vlin = 0 ;
    }
    else
    {
        if (Vlin < nmdg_ValMin || Vlin > nmdg_ValMax)
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivv2"] + " " + Nm_erro["lang_jscr_minm"] + " " + nmdg_ValMin + " " + Nm_erro["lang_jscr_maxm"] + " " + nmdg_ValMax ;
            return false ;
        }
    }
    return true ;
}

//------------ Formatação de Valores
function FormataValor()
{
    var QuantDec = 0 ;
    NM_lercampo() ;

    if (nmdg_ValorCampo.substr(0, 1) == "-")
    {
        nmdg_Negativo = 1 ;
    }
    if (nmdg_ValOriginal != nmdg_ValorCampo && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_Valor(nmdg_ValorCampo) == false )
        {
            salva_tp_cmp = nmdg_TipoCampo;
            salva_campo = nmdg_Campo;
            salva_int = nmdg_NumInteiros;
            salva_dec = nmdg_NumDecimais;
            salva_min = nmdg_ValMin;
            salva_max = nmdg_ValMax;
            salva_simb_grup = nmdg_simb_grupo;
            salva_sim_dec = nmdg_simb_dec;
            if (nmdg_tipo_crit == 2)
            {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                nmdg_Confirm = "ok";
                return ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return ;
                }
                nmdg_TipoCampo = salva_tp_cmp  ;
                nmdg_Campo = salva_campo;
                nmdg_NumInteiros = salva_int ;
                nmdg_NumDecimais = salva_dec ;
                nmdg_ValMin = salva_min ;
                nmdg_ValMax = salva_max ;
                nmdg_simb_grupo = salva_simb_grup ;
                nmdg_simb_dec = salva_sim_dec  ;
                NM_lercampo() ;
            }
       }
    }
    nmdg_Negativo = 0 ;
    nmdg_ValorSalvo = "" ;
    if (nmdg_Mascara != "")
    {
        NM_gera_mask(nmdg_ValorCampo);
        NM_escreve(nmdg_ValEditado) ;
        nmdg_TipoCampo = "" ;
        return ;
    }
    if (nmdg_TipoCampo == "NUMERO" || nmdg_tipo_format == 0)
    {
        nmdg_TipoCampo = "" ;
        return ;
    }
    nmdg_TipoCampo = "" ;
    if (nmdg_NumDecimais != 0)      // se campo estiver vazio
    {
        if (nmdg_ValorCampo.length == 0)
        {
            nmdg_ValorCampo = nmdg_simb_dec ;
        }
    }
    nmdg_Ponto = -1  ;                     // Troca ponto por virgula
    nmdg_Ponto = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo) ;
    if (nmdg_Ponto != -1)
    {
        nmdg_ValorCampo = nmdg_ValorCampo.substring(0, nmdg_Ponto) + nmdg_simb_dec + nmdg_ValorCampo.substring(nmdg_Ponto + 1) ;
    }
    if (nmdg_NumInteiros == 0 )     // se campo so tem nmdg_NumDecimais
    {
        nmdg_ValEditado = nmdg_ValorCampo ;
        QuantDec = parseInt(nmdg_NumDecimais) + 1 ;
        for (Idec = nmdg_ValorCampo.length ; Idec < QuantDec ; Idec ++)
        {
             nmdg_ValEditado += 0 ;
        }

        NM_escreve(nmdg_ValEditado) ;
        return ;
    }
    if (nmdg_NumDecimais == 0 )     // se campo so tem nmdg_NumInteiros
    {
        nmdg_ValNaoEditado = nmdg_ValorCampo ;
        Poe_Pontos() ;
        NM_escreve(nmdg_ValEditado) ;
        return ;
    }
    nmdg_Virgula = -1  ;                     // Tem nmdg_NumDecimais e foram digitadas
    nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
    if (nmdg_Virgula != -1)
    {
        nmdg_ValNaoEditado = nmdg_ValorCampo.substring(0, nmdg_Virgula) ;
        Poe_Pontos() ;
        nmdg_ValEditado += nmdg_ValorCampo.substring(nmdg_Virgula, nmdg_ValorCampo.length) ;
        QuantDec = (nmdg_ValorCampo.length - nmdg_Virgula) - 1;
        if (QuantDec < nmdg_NumDecimais )
        {
            for (Idec = QuantDec; Idec < nmdg_NumDecimais; Idec ++)
            {
                 nmdg_ValEditado += 0 ;
            }
        }

        NM_escreve(nmdg_ValEditado) ;
    }
    if (nmdg_Virgula == -1)                // // Tem nmdg_NumDecimais mas nao foram digitadas
    {
        nmdg_ValNaoEditado = nmdg_ValorCampo ;
        Poe_Pontos() ;
        nmdg_ValEditado += nmdg_simb_dec ;
        for (Idec = 0 ; Idec < nmdg_NumDecimais ; Idec ++)
        {
             nmdg_ValEditado += 0 ;
        }
        NM_escreve(nmdg_ValEditado) ;
        if (!filtraBrowser() && nmdg_ValEditado != nmdg_ValNaoEditado && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
        {
            document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
        }
    }
}
//------------ Desformatação de Valores
function DesformataValor(fase)
{
    if (fase == "crit" || fase == "blur")
    {
        NM_lercampo() ;
    }
    nmdg_Virgula = -1 ;
    nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
    if (nmdg_Virgula == -1 && nmdg_TipoCampo == "VALOR" && nmdg_NumDecimais != 0)
    {
        nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo) ;
        if (nmdg_Virgula != -1)
        {
            nmdg_ValorCampo = nmdg_ValorCampo.substr(0, nmdg_Virgula) + nmdg_simb_dec + nmdg_ValorCampo.substr(nmdg_Virgula + 1) ;
        }
    }
    nmdg_ValNaoEditado = "" ;
    nmdg_lixo = "" ;
    if (nmdg_Virgula != -1)
    {
        nmdg_ValEditado = nmdg_ValorCampo.substring(0, nmdg_Virgula) ;
        nmdg_lixo = nmdg_ValorCampo.substring(nmdg_Virgula, nmdg_ValorCampo.length) ;
    }
    else
    {
        nmdg_ValEditado = nmdg_ValorCampo ;
    }
    if (nmdg_ValEditado != "" )
    {
        Tira_Pontos(nmdg_ValEditado) ;
    }
    if  (nmdg_ValNaoEditado != "" || parseInt(nmdg_lixo.substr(1)) != 0)
    {
         nmdg_ValNaoEditado += nmdg_lixo ;
    }
    if (fase == "crit" || fase == "blur")
    {
        NM_escreve(nmdg_ValNaoEditado)  ;
        nmdg_ValorSalvo = nmdg_ValNaoEditado ;
        nmdg_ValOriginal = nmdg_ValNaoEditado;
        if (fase == "crit")
        {
            NM_select() ;
        }
    }
}

function DesformataMask()
{
    NM_lercampo();
    NM_tira_mask(nmdg_ValorCampo);
    NM_escreve(nmdg_ValNaoEditado);
    nmdg_ValorSalvo = nmdg_ValNaoEditado;
    nmdg_ValOriginal = nmdg_ValNaoEditado;
    NM_select();
}

//------------ Poe pontos para formatar Números
function Poe_Pontos()
{
    var QuantIni = 0 ;
    var QuantNum = 0 ;
    var Sinal = "" ;
    if (nmdg_ValNaoEditado.substr(0, 1) == "-")
    {
        Sinal = "-" ;
        nmdg_ValNaoEditado = nmdg_ValNaoEditado.substr(1) ;
    }
    QuantNum = nmdg_ValNaoEditado.length    ;
    if (QuantNum < 4)
    {
       nmdg_ValEditado = Sinal + nmdg_ValNaoEditado ;
       return ;
    }
    QuantIni = QuantNum % 3 ;
    nmdg_ValEditado = nmdg_ValNaoEditado.substring(0, QuantIni) ;
    for (Inum = QuantIni ; Inum < QuantNum ; Inum = Inum + 3)
    {
         if (Inum != 0)
         {
             nmdg_ValEditado = nmdg_ValEditado + nmdg_simb_grupo_format + nmdg_ValNaoEditado.substring(Inum, Inum + 3) ;
         }
         else
         {
             nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(Inum, Inum + 3) ;
         }
    }
    nmdg_ValEditado = Sinal + nmdg_ValEditado ;
}
//------------ Trata digitação do ALFA e ALFANUM (Onfocus)
function Onfocus_ALFA()
{
    NM_lercampo() ;
    if (nmdg_Mascara != "")
    {
        NM_tira_mask(nmdg_ValorCampo);
        nmdg_ValorCampo = nmdg_ValNaoEditado;
        NM_escreve(nmdg_ValNaoEditado) ;
    }
    nmdg_ValOriginal = nmdg_ValorCampo;
    nmdg_SeguraTecla = 0 ;
    NM_select() ;
}

//------------ Trata digitação de campos Alfa, Alfanum e Lista
function TestaAlfablur()
{
    NM_lercampo() ;
    nmdg_lixo = nmdg_ValorCampo;
    nmdg_SalvaValor =  nmdg_ValorCampo;
/*--- rotina inibida em 27/12/2005
    if (nmdg_ValorCampo.length > nmdg_Car_Max)
    {
        nmdg_ValorCampo = nmdg_ValorCampo.substr(0,nmdg_Car_Max) ;
    }
*/
    if (nmdg_Car_Caixa.toUpperCase() == "CXA")
    {
        nmdg_ValorCampo = nmdg_ValorCampo.toUpperCase() ;
    }
    if (nmdg_Car_Caixa.toUpperCase() == "CXB")
    {
        nmdg_ValorCampo = nmdg_ValorCampo.toLowerCase() ;
    }
    if (nmdg_ValOriginal != nmdg_lixo && nmdg_tipo_crit > 1)
    {
       if (NM_Valida_Alfa(nmdg_ValorCampo) == false)
       {
           salva_tp_cmp = nmdg_TipoCampo;
           salva_campo = nmdg_Campo;
           salva_txt = nmdg_Car_Texto;
           salva_caixa = nmdg_Car_Caixa;
           salva_max = nmdg_Car_Max;
           salva_adic = nmdg_Car_Adicionais;
           if (nmdg_tipo_crit == 2)
           {
               alert (nmdg_mens_crit);
               nmdg_Campo = salva_campo;
               nmdg_Controla_Evento = nmdg_Campo ;
               Xfocus = setTimeout("NM_focus()", 10) ;
               nmdg_Confirm = "ok";
               return   ;
           }
           else
           {
               if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
               {
                   nmdg_Campo = salva_campo;
                   nmdg_Controla_Evento = nmdg_Campo ;
                   Xfocus = setTimeout("NM_focus()", 10) ;
                   nmdg_Confirm = "ok";
                   return   ;
               }
               nmdg_TipoCampo = salva_tp_cmp;
               nmdg_Campo = salva_campo;
               nmdg_Car_Texto = salva_txt;
               nmdg_Car_Caixa = salva_caixa;
               nmdg_Car_Max = salva_max;
               nmdg_Car_Adicionais = salva_adic;
               NM_lercampo() ;
           }
       }
    }
    if (nmdg_Mascara != "")
    {
        NM_gera_mask(nmdg_ValorCampo);
        nmdg_ValorCampo = nmdg_ValEditado;
    }
    NM_escreve(nmdg_ValorCampo) ;
    if (!filtraBrowser() && nmdg_ValorCampo != nmdg_SalvaValor && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
    {
        document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
    }
    nmdg_TipoCampo = "" ;
}

function NM_Valida_Alfa(Alfa_in)
{
    var Carteste = nmdg_Alfabeto + nmdg_Car_Adicionais + " " ;
    var Compara = "" ;
    var Critica = "" ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (Alfa_in.length > nmdg_Car_Max)
    {
        nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_mxvl"] + nmdg_Car_Max ;
        return false ;
    }
    Compara = Alfa_in ;
    if (nmdg_Car_Adicionais.toUpperCase() == "TUDO" )
    {
        return true ;
    }
    if (nmdg_TipoCampo == "ALFANUM")
    {
        Carteste += nmdg_Numeros ;
    }
    if (nmdg_Car_Texto != "")
    {
        Carteste = nmdg_Car_Adicionais ;
        if (nmdg_Car_Texto.substr(0,1) == "S")
        {
            Carteste += nmdg_Alfabeto ;
        }
        if (nmdg_Car_Texto.substr(1,1) == "S")
        {
            Carteste += nmdg_Numeros ;
        }
        if (nmdg_Car_Texto.substr(2,1) == "S")
        {
            Carteste += " " ;
        }
        if (nmdg_Car_Texto.substr(3,1) == "S")
        {
            Carteste += nmdg_Acentos ;
        }
    }
    if (nmdg_TipoCampo == "LISTA")
    {
        Carteste = nmdg_Car_Adicionais ;
    }
    if (nmdg_Car_Caixa.toUpperCase() == "CXAB" || nmdg_Car_Caixa.toUpperCase() == "CXA" )
    {
        Carteste = Carteste.toUpperCase() ;
    }
    Carteste = Carteste + String.fromCharCode(10) + String.fromCharCode(13) ;
//    if (nmdg_Car_Caixa.toUpperCase() == "CXAB" && nmdg_TipoCampo != "LISTA")
    if (nmdg_Car_Caixa.toUpperCase() == "CXAB")
    {
        Compara = Alfa_in.toUpperCase() ;
    }
    for (x = 0; x < Compara.length; x++)
    {
         for (y = 0; y < Carteste.length; y++)
         {
              if (Compara.substr(x, 1) == Carteste.substr(y, 1) )
              {
                  break ;
              }
         }
         if (Compara.substr(x, 1) != Carteste.substr(y, 1) )
         {
             Critica += Alfa_in.substr(x, 1) ;
         }
    }
    if (Critica != "")
    {
        if (Nm_erro[nmdg_Campo])
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo] + ": " + Critica;
        }
        else
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivdt"] + Critica ;
        }
        return false ;
    }
    return true ;
}
//------------ Trata digitação de Cartões de Crédito (Onfocus)
function Onfocus_CARTAO()
{
    nmdg_SeguraTecla = 0 ;
    NM_lercampo() ;
    if (nmdg_Mascara != "")
    {
        NM_tira_mask(nmdg_ValorCampo);
    }
    else
    {
        Cartao_Limpo(nmdg_ValorCampo) ;
    }
    nmdg_ValOriginal = nmdg_ValNaoEditado;
    NM_escreve(nmdg_ValNaoEditado) ;
    NM_select() ;
}

//------------ Trata digitação de Cartões de Crédito (Onblur)
function TestaCartaoblur()
{
    NM_lercampo() ;
    if (nmdg_ValorCampo.length != 0)
    {
        if (nmdg_ValOriginal != nmdg_ValorCampo && nmdg_tipo_crit > 1)
        {
            if (NM_Valida_Cartoes(nmdg_ValorCampo) == false)
            {
                salva_tp_cmp = nmdg_TipoCampo;
                salva_campo = nmdg_Campo;
                if (nmdg_tipo_crit == 2)
                {
                    alert (nmdg_mens_crit);
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return   ;
                }
                else
                {
                    if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                    {
                        nmdg_Campo = salva_campo;
                        nmdg_Controla_Evento = nmdg_Campo ;
                        Xfocus = setTimeout("NM_focus()", 10) ;
                        nmdg_Confirm = "ok";
                        return   ;
                    }
                    nmdg_TipoCampo = salva_tp_cmp;
                    nmdg_Campo = salva_campo;
                    NM_lercampo() ;
                }
            }
        }
        if (nmdg_tipo_format != 0)
        {
            if (nmdg_Mascara != "")
            {
                NM_gera_mask(nmdg_ValorCampo);
            }
            else
            {
                nmdg_ValEditado = nmdg_ValorCampo.substr(0, 4) + " " + nmdg_ValorCampo.substr(4, 4) + " " + nmdg_ValorCampo.substr(8, 4) + " " + nmdg_ValorCampo.substr(12) ;
            }
            NM_escreve(nmdg_ValEditado) ;
        }
    }
    nmdg_TipoCampo = "" ;
    nmdg_SeguraTecla = 0 ;
}

    function NM_Valida_Cartoes(num_cart)
    {
          if (nmdg_validar != 1)
          {
              return true ;
          }
          if (nmdg_TipoCart == "A")
          {
              return NM_AmericanExpress(num_cart) ;
          }
          if (nmdg_TipoCart == "D")
          {
              return NM_DinersClub(num_cart) ;
          }
          if (nmdg_TipoCart == "M")
          {
              return NM_MasterCard(num_cart) ;
          }
          if (nmdg_TipoCart == "V")
          {
              return NM_Visa(num_cart) ;
          }
          return nm_Valida_Tcartoes(num_cart) ;
    }
/*  ================================================================
                             VISA
               Padrão: 4000 0000 0000 0000 (16 digitos)
    ================================================================ */
    function NM_Visa(num_cart)
    {
          if ((num_cart.length == 16 || num_cart.length == 13) &&
               num_cart.substr(0, 1) == 4 )
          {
               return nm_Valida_Tcartoes(num_cart) ;
          }
          if (Nm_erro[nmdg_Campo])
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
          }
          else
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivcr"];
          }
          return false ;
    }
/*  ================================================================
                          MasterCard
               Padrão: 5500 0000 0000 0000 (16 digitos)
    ================================================================ */
    function NM_MasterCard(num_cart)
    {
          if (num_cart.length == 16 && num_cart.substr(0, 1) == 5 &&
             (num_cart.substr(1, 1) >= 1 && num_cart.substr(1, 1) <= 5) )
          {
              return nm_Valida_Tcartoes(num_cart);
          }
          if (Nm_erro[nmdg_Campo])
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
          }
          else
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivcr"];
          }
          return false ;
    }
/*  ================================================================
                       AmericanExpress
              Padrão: 340000000000000 (15 digitos)
    ================================================================ */
    function NM_AmericanExpress(num_cart)
    {
          if (num_cart.length == 15 && num_cart.substr(0, 1) == 3 &&
             (num_cart.substr(1, 1) == 4 || num_cart.substr(1, 1) == 7) )
          {
              return nm_Valida_Tcartoes(num_cart);
          }
          if (Nm_erro[nmdg_Campo])
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
          }
          else
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivcr"];
          }
          return false ;
    }
/*  ================================================================
                           DinersClub
               Padrão: 30000000000000 (14 digitos)
    ================================================================ */
    function NM_DinersClub(num_cart)
    {
          if (num_cart.length == 14 && num_cart.substr(0, 1) == 3 &&
             (num_cart.substr(1, 1) == 0 || num_cart.substr(1, 1) == 6 ||
              num_cart.substr(1, 1) == 8) )
          {
              return nm_Valida_Tcartoes(num_cart);
          }
          if (Nm_erro[nmdg_Campo])
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
          }
          else
          {
              nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivcr"];
          }
          return false ;
    }
/*  ================================================================
                  Validação dos diversos cartões
    ================================================================ */
    function nm_Valida_Tcartoes(num_cart)
    {
          var parc = 0 ;
          var soma = 0 ;
          var mult = 1 ;
          var tam = num_cart.length ;
          for (x = 0; x < tam ; x++)
          {
               parc = parseInt(num_cart.substr(tam-x-1, 1))* mult ;
               if (parc >= 10)
               {
                   soma += (parc % 10) + 1;
               }
               else
               {
                   soma += parc ;
               }
               if (mult == 1)
               {
                   mult++ ;
               }
               else
               {
                   mult-- ;
               }
          }
          if ((soma % 10) == 0 && tam > 13)
          {
               return true ;
          }
          else
          {
               if (Nm_erro[nmdg_Campo])
               {
                   nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
               }
               else
               {
                    nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivcr"];
               }
               return false ;
          }
    }

function Cartao_Limpo(ValorIn)
{
    nmdg_ValNaoEditado = ValorIn.replace (" " , "") ;
    nmdg_ValNaoEditado = nmdg_ValNaoEditado.replace (" " , "") ;
    nmdg_ValNaoEditado = nmdg_ValNaoEditado.replace (" " , "") ;
}
//------------ Trata digitação do CIC (Keyup)
function TestaCICup()
{
    if (nmdg_Cod_Tecla == 9 || nmdg_Tecla_num == 0)  // tecla Tab e teclas de Controle
    {
        nmdg_SeguraTecla = 0 ;
        return ;
    }
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo);
    if (nmdg_tipo_format != 0)
    {
        Formata_CIC() ;
        if (nmdg_ValEditado.length > 14)
        {
            NM_escreve(nmdg_ValorSalvo) ;
        }
        else
        {
            NM_escreve(nmdg_ValEditado) ;
            nmdg_ValorSalvo = nmdg_ValEditado ;
        }
    }
    nmdg_SeguraTecla = 0 ;
}
//------------ Trata digitação do CNPJ (Keyup)
function TestaCNPJup()
{
    if (nmdg_Cod_Tecla == 9 || nmdg_Tecla_num == 0)  // tecla Tab e teclas de Controle
    {
        nmdg_SeguraTecla = 0 ;
        return ;
    }
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
    if (nmdg_tipo_format != 0)
    {
        Formata_CNPJ() ;
        if (nmdg_ValEditado.length > 18)
        {
            NM_escreve(nmdg_ValorSalvo) ;
        }
        else
        {
            NM_escreve(nmdg_ValEditado)  ;
            nmdg_ValorSalvo = nmdg_ValEditado ;
        }
    }
    nmdg_SeguraTecla = 0 ;
}

//------------ Trata digitação do CIC (Onfocus)
function Onfocus_CIC()
{
    nmdg_SeguraTecla = 0 ;
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
    nmdg_ValOriginal = nmdg_ValNaoEditado;
    NM_escreve(nmdg_ValNaoEditado) ;
    NM_select() ;
    return ;
}
//------------ Trata digitação do CNPJ (Onfocus)
function Onfocus_CNPJ()
{
    nmdg_SeguraTecla = 0 ;
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
    nmdg_ValOriginal = nmdg_ValNaoEditado;

    NM_escreve(nmdg_ValNaoEditado) ;
    NM_select() ;
    return ;
}
//------------ Trata digitação do CICCNPJ (Onfocus)
function Onfocus_CICCNPJ()
{
    nmdg_SeguraTecla = 0 ;
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
    nmdg_ValOriginal = nmdg_ValNaoEditado;
    if (nmdg_ValNaoEditado.substring(0, 3) == "000" && nmdg_ValNaoEditado.length == 14)
    {
        if (NM_Valida_CNPJ(nmdg_ValNaoEditado) == false)
        {
            nmdg_ValNaoEditado = nmdg_ValNaoEditado.substring(3);
        }
    }
    NM_escreve(nmdg_ValNaoEditado) ;
    NM_select() ;
}

//------------ Trata digitação do CIC (Onblur)
function TestaCICblur()
{
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
    if (nmdg_ValOriginal != nmdg_ValNaoEditado && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_CIC(nmdg_ValNaoEditado) == false )
        {
            salva_tp_cmp = nmdg_TipoCampo;
            salva_campo = nmdg_Campo;
            salva_radio = nmdg_Radio;
            if (nmdg_tipo_crit == 2)
            {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                nmdg_Confirm = "ok";
                return ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return ;
                }
                nmdg_TipoCampo = salva_tp_cmp;
                nmdg_Campo = salva_campo;
                nmdg_Radio = salva_radio;
                NM_lercampo() ;
                CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
            }
        }
    }
    nmdg_TipoCampo = "" ;
    if (nmdg_tipo_format != 0)
    {
        Formata_CIC() ;
        NM_escreve(nmdg_ValEditado) ;
        if (!filtraBrowser() && nmdg_ValEditado != nmdg_ValNaoEditado && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
        {
            document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
        }
    }
    nmdg_SeguraTecla = 0 ;
}
//------------ Trata digitação do CNPJ (Onblur)
function TestaCNPJblur()
{
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
    if (nmdg_ValOriginal != nmdg_ValNaoEditado && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_CNPJ(nmdg_ValNaoEditado) == false )
        {
            salva_tp_cmp = nmdg_TipoCampo;
            salva_campo = nmdg_Campo;
            salva_radio = nmdg_Radio;
            if (nmdg_tipo_crit == 2)
            {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                nmdg_Confirm = "ok";
                return ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return ;
                }
                nmdg_TipoCampo = salva_tp_cmp;
                nmdg_Campo = salva_campo;
                nmdg_Radio = salva_radio;
                NM_lercampo() ;
                CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
            }
        }
    }
    nmdg_TipoCampo = "" ;
    if (nmdg_tipo_format != 0)
    {
        Formata_CNPJ() ;
        NM_escreve(nmdg_ValEditado) ;
        if (!filtraBrowser() && nmdg_ValEditado != nmdg_ValNaoEditado && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
        {
            document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
        }
    }
    nmdg_SeguraTecla = 0 ;
}
//------------ Trata digitação do CICCNPJ (Onblur)
function TestaCICCNPJblur()
{
    NM_lercampo() ;
    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
    if (nmdg_ValOriginal != nmdg_ValNaoEditado && nmdg_tipo_crit > 1)
    {
        salva_tp_cmp = nmdg_TipoCampo;
        salva_campo = nmdg_Campo;
        salva_radio = nmdg_Radio;
        if (nmdg_ValNaoEditado.length <= 11)
        {
            if (NM_Valida_CIC(nmdg_ValNaoEditado) == false )
            {
                if (nmdg_tipo_crit == 2)
                {
                    alert (nmdg_mens_crit);
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return   ;
                }
                else
                {
                    if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                    {
                        nmdg_Campo = salva_campo;
                        nmdg_Controla_Evento = nmdg_Campo ;
                        Xfocus = setTimeout("NM_focus()", 10) ;
                        nmdg_Confirm = "ok";
                        return   ;
                    }
                    nmdg_Campo = salva_campo;
                    NM_lercampo() ;
                    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
                }
            }
        }
        else
        {
            if (NM_Valida_CNPJ(nmdg_ValNaoEditado) == false )
            {
                if (nmdg_tipo_crit == 2)
                {
                    alert (nmdg_mens_crit);
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return   ;
                }
                else
                {
                    if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                    {
                        nmdg_Campo = salva_campo;
                        nmdg_Controla_Evento = nmdg_Campo ;
                        Xfocus = setTimeout("NM_focus()", 10) ;
                        nmdg_Confirm = "ok";
                        return   ;
                    }
                    nmdg_TipoCampo = salva_tp_cmp;
                    nmdg_Campo = salva_campo;
                    nmdg_Radio = salva_radio;
                    NM_lercampo() ;
                    CIC_CNPJ_Limpo(nmdg_ValorCampo) ;
                }
            }
        }
    }
    if (nmdg_tipo_format != 0)
    {
        if (nmdg_ValNaoEditado.length <= 11)
        {
            Formata_CIC() ;
        }
        else
        {
            Formata_CNPJ() ;
        }
        NM_escreve(nmdg_ValEditado) ;
        if (!filtraBrowser() && nmdg_ValEditado != nmdg_ValNaoEditado && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
        {
            document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
        }
    }
    nmdg_TipoCampo = "" ;
    nmdg_SeguraTecla = 0 ;
}

//------------ Formatação de CIC
function Formata_CIC()
{
    if (nmdg_ValNaoEditado.length < 3)
     {  nmdg_ValEditado = nmdg_ValNaoEditado ;
        return ;
     }
    nmdg_ValEditado = nmdg_ValNaoEditado.substring(0, 3) + "." ;
    if (nmdg_ValNaoEditado.length < 6)
     {  nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(3) ;
        return ;
     }
    nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(3, 6) + "." ;
    if (nmdg_ValNaoEditado.length < 9)
     {  nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(6) ;
        return ;
     }
    nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(6, 9) + "-" + nmdg_ValNaoEditado.substring(9, 11) ;
}

//------------ Formatação de CNPJ
function Formata_CNPJ()
{
    if (nmdg_ValNaoEditado.length < 2)
    {
        nmdg_ValEditado = nmdg_ValNaoEditado  ;
        return ;
    }
    nmdg_ValEditado = nmdg_ValNaoEditado.substring(0, 2) + "." ;
    if (nmdg_ValNaoEditado.length < 5)
    {
        nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(2) ;
        return ;
    }
    nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(2, 5) + "." ;
    if (nmdg_ValNaoEditado.length < 8)
    {
        nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(5) ;
        return ;
    }
    nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(5, 8) + "/" ;
    if (nmdg_ValNaoEditado.length < 12)
    {
        nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(8) ;
        return ;
    }
    nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(8, 12) + "-" + nmdg_ValNaoEditado.substring(12, 14) ;
}

function NM_Valida_CIC(CicIn)
{
    var x = 0 ;
    var y = 0 ;
    var soma = 0 ;
    var resto = 0 ;
    var Cic_calc = 0 ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (CicIn.length == 0)
    {
        return true ;
    }
    Cic_calc = CicIn.substring(0, 9) ;
    x = CicIn.substring(0, 1) ;
    for (y = 1; y < 11; y++)
    {
         if (CicIn.substr(y , 1) != x)
         {
             break ;
         }
         else
         {
             soma++ ;
         }
    }
    if (soma == 10)
    {
        Cic_calc = "1" ;
    }
    soma = 0 ;
    y = 10 ;
    for (x = 0 ; x < 9 ; x++)
    {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y ) ;
         y-- ;
    }
    soma = soma * 10 ;
    resto = soma % 11 ;
    if (resto == 10)
    {
        resto = 0 ;
    }
    Cic_calc = Cic_calc + resto.toString() ;

    x = 0 ;
    y = 11 ;
    soma = 0 ;
    for (x = 0 ; x < 10 ; x++)
    {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y ) ;
         y-- ;
    }
    soma = soma * 10  ;
    resto = soma % 11  ;
    if (resto == 10)
    {
        resto = 0 ;
    }
    Cic_calc = Cic_calc + resto.toString() ;

    if (Cic_calc != CicIn)
    {
        if (Nm_erro[nmdg_Campo])
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
        }
        else
        {
/*            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_icpf"]; */
            nmdg_mens_crit = nmdg_Label + ": CIC Inválido!!";
        }
        return false  ;
    }
    return true ;
}

function NM_Valida_CNPJ(CnpjIn)
{
    var x = 0 ;
    var y = 5 ;
    var soma = 0 ;
    var resto = 0 ;
    var Cnpj_calc = 0 ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (CnpjIn.length == 0)
    {
        return true ;
    }
    Cnpj_calc = CnpjIn.substring(0, 12) ;

    for (x = 0 ; x < 12 ; x++)
    {
        soma = soma + (parseInt(Cnpj_calc.substr(x , 1)) * y ) ;
        y-- ;
        if (y == 1)
           {y = 9 ;}
    }
    soma = soma * 10 ;
    resto = soma % 11 ;
    if (resto == 10)
     { resto = 0 ;}
    Cnpj_calc = Cnpj_calc + resto.toString()     ;

    x = 0 ;
    y = 6 ;
    soma = 0 ;
    for (x = 0 ; x < 13 ; x++)
    {
        soma = soma + (parseInt(Cnpj_calc.substr(x , 1)) * y ) ;
        y-- ;
        if (y == 1)
           {y = 9 ;}
    }
    soma = soma * 10 ;
    resto = soma % 11 ;
    if (resto == 10)
    {
        resto = 0 ;
    }
    Cnpj_calc = Cnpj_calc + resto.toString()     ;

    if (Cnpj_calc != CnpjIn || CnpjIn == "00000000000000")
    {
        if (Nm_erro[nmdg_Campo])
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
        }
        else
        {
/*            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_icnp"]; */
            nmdg_mens_crit = nmdg_Label + ": CNPJ Inválido!!";
        }
        return false  ;
    }
    return true ;
}

function CIC_CNPJ_Limpo(ValorIn)
{
    nmdg_ValNaoEditado = ValorIn.replace ("-" , "") ;
    nmdg_ValNaoEditado = nmdg_ValNaoEditado.replace ("/" , "") ;
    Tira_Pontos(nmdg_ValNaoEditado) ;
    return nmdg_ValNaoEditado ;
}//------------ Trata digitação do CEP (Onfocus)
function Onfocus_CEP()
{
    nmdg_SeguraTecla = 0 ;
    NM_lercampo() ;
    CEP_Limpo(nmdg_ValorCampo) ;
    nmdg_ValOriginal = nmdg_ValNaoEditado;
    NM_escreve(nmdg_ValNaoEditado) ;
    NM_select() ;
    return ;
}

//------------ Trata digitação do CEP (Keyup)
function TestaCEPup()
{
    if (nmdg_Cod_Tecla == 9 || nmdg_Tecla_num == 0)  // tecla Tab e teclas de Controle
    {
        nmdg_SeguraTecla = 0 ;
        return ;
    }
    NM_lercampo() ;
    CEP_Limpo(nmdg_ValorCampo) ;
    if (nmdg_tipo_format != 0)
    {
        Formata_CEP() ;
        if (nmdg_ValEditado.length > 10)
        {
            NM_escreve(nmdg_ValorSalvo) ;
        }
        else
        {
            NM_escreve(nmdg_ValEditado) ;
            nmdg_ValorSalvo = nmdg_ValEditado ;
        }
    }
    nmdg_SeguraTecla = 0 ;
}

//------------ Trata digitação do CEP (Onblur)
function TestaCEPblur()
{
    NM_lercampo() ;
    CEP_Limpo(nmdg_ValorCampo) ;
    if (nmdg_ValOriginal != nmdg_ValNaoEditado && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_Cep(nmdg_ValNaoEditado) == false )
        {
            salva_tp_cmp = nmdg_TipoCampo;
            salva_campo = nmdg_Campo;
            if (nmdg_tipo_crit == 2)
            {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                nmdg_Confirm = "ok";
                return ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return ;
                }
                nmdg_TipoCampo = salva_tp_cmp;
                nmdg_Campo = salva_campo;
                NM_lercampo() ;
                CEP_Limpo(nmdg_ValorCampo) ;
            }
        }
    }
    nmdg_TipoCampo = "" ;
    if (nmdg_tipo_format != 0)
    {
        Formata_CEP() ;
        NM_escreve(nmdg_ValEditado) ;
        if (!filtraBrowser() && nmdg_ValEditado != nmdg_ValNaoEditado && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
        {
            document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
        }
    }
    nmdg_SeguraTecla = 0 ;
}

function NM_Valida_Cep(CepIn)
{
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (CepIn.length == 0)
    {
        return true ;
    }
    if (CepIn.length != 8 || CepIn == "00000000")
    {
        if (Nm_erro[nmdg_Campo])
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
        }
        else
        {
/*            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivzp"]; */
            nmdg_mens_crit = nmdg_Label + ": CEP Inválido!!";
        }
        return false ;
    }
    return true ;
}

function CEP_Limpo(ValorIn)
{
    nmdg_ValNaoEditado = ValorIn.replace ("-" , "") ;
    nmdg_ValNaoEditado = nmdg_ValNaoEditado.replace ("." , "") ;
    Tira_Pontos(nmdg_ValNaoEditado) ;
    return nmdg_ValNaoEditado ;
}

//------------ Formatação de CEP
function Formata_CEP()
{
    if (nmdg_ValNaoEditado.length < 2)
    {
        nmdg_ValEditado = nmdg_ValNaoEditado  ;
        return ;
    }
    nmdg_ValEditado = nmdg_ValNaoEditado.substring(0, 2) + "." ;
    if (nmdg_ValNaoEditado.length < 5)
    {
        nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(2) ;
        return ;
    }
    nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(2, 5) + "-" + nmdg_ValNaoEditado.substring(5, 8) ;
}
//------------ Trata digitação de Datas (Onfocus)
function Onfocus_Data()
{
    nmdg_SeguraTecla = 0 ;
    NM_lercampo() ;
    Data_Limpa(nmdg_ValorCampo) ;
    nmdg_ValOriginal = nmdg_ValNaoEditado;

    NM_escreve(nmdg_ValNaoEditado) ;
    NM_select() ;
    return  ;
}

//------------ Trata digitação de Datas (Onblur)
function TestaDatablur()
{
    NM_lercampo() ;
    Data_Limpa(nmdg_ValorCampo) ;
    if (nmdg_ValOriginal != nmdg_ValNaoEditado && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_Data(nmdg_ValNaoEditado) == false )
        {
            salva_tp_cmp = nmdg_TipoCampo;
            salva_campo = nmdg_Campo;
            salva_monta = nmdg_Monta_Data;
            salva_montax = nmdg_Monta_DataX;
            salva_dt_min = nmdg_ValMin;
            salva_dt_max = nmdg_ValMax;
            if (nmdg_tipo_crit == 2)
            {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                nmdg_Confirm = "ok";
                return ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    nmdg_Confirm = "ok";
                    return ;
                }
                nmdg_TipoCampo = salva_tp_cmp;
                nmdg_Campo = salva_campo;
                nmdg_Monta_Data = salva_monta;
                nmdg_Monta_DataX = salva_montax;
                nmdg_ValMin = salva_dt_min;
                nmdg_ValMax = salva_dt_max;
                NM_lercampo() ;
                Data_Limpa(nmdg_ValorCampo) ;
            }
        }
    }
    nmdg_TipoCampo = "" ;
    if (nmdg_tipo_format != 0)
    {
        Formata_Data() ;
        NM_escreve(nmdg_ValEditado) ;
        if (!filtraBrowser() && nmdg_ValEditado != nmdg_ValNaoEditado && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
        {
            document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
        }
    }
    nmdg_SeguraTecla = 0 ;
}

//------------ Trata digitação de Datas (Keyup)
function TestaDataup()
{
    if (nmdg_Cod_Tecla == 9 || nmdg_Tecla_num == 0)  // tecla Tab e teclas de Controle
    {
        nmdg_SeguraTecla = 0 ;
        return ;
    }
    NM_lercampo() ;
    Data_Limpa(nmdg_ValorCampo) ;
    if (nmdg_tipo_format != 0)
    {
        Formata_Data() ;
        if (nmdg_ValEditado.length > nmdg_Monta_Data.length)
        {
            NM_escreve(nmdg_ValorSalvo) ;
        }
        else
        {
            NM_escreve(nmdg_ValEditado) ;
            nmdg_ValorSalvo = nmdg_ValEditado ;
        }
    }
    nmdg_SeguraTecla = 0 ;
}


function NM_Valida_Data(DataIn)
{
    var Dia = "" ;
    var Mes = "" ;
    var Ano = ""  ;
    var DiaMax = "" ;
    var Critica = "" ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (DataIn.length == 0)
    {
        return true ;
    }
    for (x = 0; x < DataIn.length; x++)
    {
         if (nmdg_Monta_DataX.substr(x, 1) == "D")
         {
             Dia += DataIn.substr(x, 1) ;
         }
         else
         {
             if (nmdg_Monta_DataX.substr(x, 1) == "M")
             {
                 Mes += DataIn.substr(x, 1) ;
             }
             else
             {
                 Ano += DataIn.substr(x, 1) ;
             }
         }
    }
    DiaMax = 31 ;
    if (Mes != "" && Dia != "")
    {
        if (Mes == "04" || Mes == "06" || Mes == "09" || Mes == "11" )
        {
            DiaMax = 30 ;
        }
        if (Mes == "02" )
        {
            DiaMax = 29 ;
        }
    }
    if (Ano != "" && Mes == "02")
    {
        DiaMax = ( (parseInt(Ano) % 4 == 0)  ?  29 : 28) ;
    }
    if (Dia != "" && Dia > DiaMax)
    {
        Critica = " " + Nm_erro["lang_jscr_iday"];
    }
    if (Mes != "" && (Mes < "01" || Mes > "12") )
    {
        Critica += " " + Nm_erro["lang_jscr_mnth"];
    }
//    if (Ano != "" && (Ano < nmdg_ValMin || Ano > nmdg_ValMax) )
//       { Critica += " Ano" ;}
    Data_teste  = (Ano != ""  ?  Ano : "0000") ;
    Data_teste += (Mes != ""  ?  Mes : "00") ;
    Data_teste += (Dia != ""  ?  Dia : "00") ;
    if (nmdg_ValMin > 0 && Data_teste < nmdg_ValMin)
    {
        Critica += " " + Nm_erro["lang_jscr_minm_date"];
    }
    if (nmdg_ValMax > 0 && Data_teste > nmdg_ValMax)
    {
        Critica += " " + Nm_erro["lang_jscr_maxm_date"];
    }
    if (Critica != "" || DataIn.length != nmdg_Monta_DataX.length)
    {
        if (Nm_erro[nmdg_Campo])
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo] + ": " + Critica;
        }
        else
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivdt"] + Critica ;
        }
        return false  ;
    }
    return true ;
}

function Data_Limpa(ValorIn)
{
    nmdg_ValNaoEditado = ValorIn.replace (nmdg_SepDate, "") ;
    nmdg_ValNaoEditado = nmdg_ValNaoEditado.replace (nmdg_SepDate, "") ;
    return nmdg_ValNaoEditado ;
}

//------------ Formatação de Datas
function Formata_Data()
{
    nmdg_ValEditado = "" ;
    if (nmdg_ValNaoEditado == "")
    {
        return ;
    }
    var x = 0 ;
    for (y = 0; y < nmdg_ValNaoEditado.length; x++)
    {
        if (nmdg_Monta_Data.substring(x, x + 1) == nmdg_SepDate)
        {
            nmdg_ValEditado = nmdg_ValEditado + nmdg_SepDate;
        }
        else
        {
            nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(y, y + 1) ;
            y++ ;
        }
    }
}
//------------ Trata digitação de Hora (Onfocus)
function Onfocus_Hora()
{
    nmdg_SeguraTecla = 0 ;
    NM_lercampo() ;
    Hora_Limpa(nmdg_ValorCampo) ;
    nmdg_ValOriginal = nmdg_ValNaoEditado;
    NM_escreve(nmdg_ValNaoEditado) ;
    NM_select() ;
    return  ;
}

//------------ Trata digitação de Hora (Keyup)
function TestaHoraup()
{
    if (nmdg_Cod_Tecla == 9 || nmdg_Tecla_num == 0)  // tecla Tab e teclas de Controle
    {
        nmdg_SeguraTecla = 0 ;
        return ;
    }
    NM_lercampo() ;
    Hora_Limpa(nmdg_ValorCampo) ;
    if (nmdg_tipo_format != 0)
    {
        Formata_Hora() ;
        if (nmdg_ValEditado.length > nmdg_Monta_Hora.length)
        {
            NM_escreve(nmdg_ValorSalvo) ;
        }
        else
        {
            NM_escreve(nmdg_ValEditado) ;
            nmdg_ValorSalvo = nmdg_ValEditado ;
        }
    }
    nmdg_SeguraTecla = 0 ;
}

//------------ Trata digitação de Hora (Onblur)
function TestaHorablur()
{
    NM_lercampo() ;
    Hora_Limpa(nmdg_ValorCampo) ;
    if (nmdg_ValOriginal != nmdg_ValNaoEditado && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_Hora(nmdg_ValNaoEditado) == false )
        {
            salva_tp_cmp = nmdg_TipoCampo;
            salva_campo = nmdg_Campo;
            salva_monta = nmdg_Monta_Hora;
            salva_montax = nmdg_Monta_HoraX;
            if (nmdg_tipo_crit == 2)
            {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                nmdg_Confirm = "ok";
                return ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return ;
                }
                nmdg_TipoCampo = salva_tp_cmp;
                nmdg_Campo = salva_campo;
                nmdg_Monta_Hora = salva_monta;
                nmdg_Monta_HoraX = salva_montax;
                NM_lercampo() ;
                Hora_Limpa(nmdg_ValorCampo) ;
            }
        }
    }
    nmdg_TipoCampo = "" ;
    if (nmdg_tipo_format != 0)
    {
        Formata_Hora() ;
        NM_escreve(nmdg_ValEditado) ;
    }
    nmdg_SeguraTecla = 0 ;
}

function NM_Valida_Hora(HoraIn)
{
    var Hora = "" ;
    var Min = "" ;
    var Seg = ""  ;
    var Decim = "" ;
    var Critica = "" ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (HoraIn.length == 0)
    {
        return true ;
    }
    for (x = 0; x < HoraIn.length; x++)
    {
         if (nmdg_Monta_HoraX.substr(x, 1) == "H")
         {
             Hora += HoraIn.substr(x, 1) ;
         }
         else
         {
             if (nmdg_Monta_HoraX.substr(x, 1) == "M")
             {
                 Min += HoraIn.substr(x, 1) ;
             }
             else
             {
                 if (nmdg_Monta_HoraX.substr(x, 1) == "S")
                 {
                     Seg += HoraIn.substr(x, 1) ;
                 }
                 else
                 {
                     Decim += HoraIn.substr(x, 1) ;
                 }
             }
         }
    }

    qtd_segundos = 0;
    for (x = 0; x < nmdg_Monta_HoraX.length; x++)
    {
            if (nmdg_Monta_HoraX.substr(x, 1) == "S")
            {
                    qtd_segundos++;
            }
    }

    dif_segundos = 0;
    if(qtd_segundos != Seg.length && Seg.length > 1)
    {
       dif_segundos = qtd_segundos - Seg.length;
            for (x = 0; x < dif_segundos; x++)
       {
                    Seg += "0";
            }
    }

    if (Hora != "" && (Hora < "00" || Hora > "23"))
    {
        Critica = " " + Nm_erro["lang_jscr_hour"];
    }
    if (Min != "" && (Min < "00" || Min > "59"))
    {
        Critica += " " + Nm_erro["lang_jscr_mint"];
    }
    if (Seg != "" && Seg.length == 2 && (Seg < "00" || Seg > "59"))
    {
        Critica += " " + Nm_erro["lang_jscr_secd"];
    }
    if (Decim != "" && (Decim < "00" || Decim > "999"))
    {
        Critica += " " + Nm_erro["lang_jscr_decm"];
    }
    if (Critica != "" || (HoraIn.length + dif_segundos) != nmdg_Monta_HoraX.length)
    {
        if (Nm_erro[nmdg_Campo])
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo] + ": " + Critica;
        }
        else
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivtm"] + Critica ;
        }
        return false  ;
    }
    return true ;
}

function Hora_Limpa(ValorIn)
{
    nmdg_ValNaoEditado = ValorIn.replace (nmdg_SepTime , "") ;
    nmdg_ValNaoEditado = nmdg_ValNaoEditado.replace (nmdg_SepTime , "") ;
    nmdg_ValNaoEditado = nmdg_ValNaoEditado.replace (nmdg_SepTime , "") ;
    return nmdg_ValNaoEditado ;
}

//------------ Formatação de Hora
function Formata_Hora()
{
    nmdg_ValEditado = "" ;
    if (nmdg_ValNaoEditado == "")
    {
        return ;
    }
    var x = 0 ;
    for (y = 0; y < nmdg_ValNaoEditado.length; x++)
    {
        if (nmdg_Monta_Hora.substring(x, x + 1) == nmdg_SepTime)
        {
            nmdg_ValEditado = nmdg_ValEditado + nmdg_SepTime ;
        }
        else
        {
            nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(y, y + 1) ;
            y++ ;
        }
    }
}
//------------ Trata digitação de campos Email
function TestaEmailblur()
{
    NM_lercampo() ;
    nmdg_lixo = nmdg_ValorCampo;
    if (nmdg_ValOriginal != nmdg_lixo && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_Email(nmdg_ValorCampo) == false)
        {
           salva_tp_cmp = nmdg_TipoCampo;
           salva_campo = nmdg_Campo;
           salva_max = nmdg_Car_Max;
           if (nmdg_tipo_crit == 2)
           {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                nmdg_Confirm = "ok";
                return   ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro["lang_jscr_wfix"]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    nmdg_Confirm = "ok";
                    return   ;
                }
                nmdg_TipoCampo = salva_tp_cmp;
                nmdg_Campo = salva_campo;
                nmdg_Car_Max = salva_max;
                NM_lercampo() ;
            }
        }
    }
    if (nmdg_ValorCampo.length > nmdg_Car_Max)
    {
        nmdg_ValorCampo = nmdg_ValorCampo.substr(0,nmdg_Car_Max) ;
        NM_escreve(nmdg_ValorCampo) ;
    }
    nmdg_TipoCampo = "" ;
}

function NM_Valida_Email(Email_in)
{
    var Compara = "" ;
    var Critica = "" ;
    var x = "" ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (Email_in.length == 0)
    {
        return true;
    }
    if (Email_in.length > nmdg_Car_Max)
    {
        nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_mxvl"] + nmdg_Car_Max ;
        return false ;
    }
    nmdg_Ponto = -1  ;
    nmdg_Ponto = Email_in.lastIndexOf(" ") ;
    if (nmdg_Ponto != -1 )
    {
        Critica += " Caracter em branco";
    }
    nmdg_Ponto = -1  ;
    nmdg_Ponto = Email_in.lastIndexOf("@") ;
    if (nmdg_Ponto == -1 )
    {
/*        Critica = " " + Nm_erro["lang_jscr_msga"]; */
        Critica += " Faltou '@'";
    }
    x = Email_in.indexOf("@") ;
    if (x != nmdg_Ponto)
    {
/*        Critica = " " + Nm_erro["lang_jscr_dbla"]; */
        Critica += " Tem mais de um '@'";
    }
    if (nmdg_Ponto == 0 )
    {
        Critica += " " + Nm_erro["lang_jscr_mslg"];
        Critica += " " + Nm_erro["lang_jscr_mslg"];
    }
    Compara = Email_in.substring(nmdg_Ponto + 1) ;
    nmdg_Ponto = -1  ;
    nmdg_Ponto = Compara.indexOf(".") ;
    if (nmdg_Ponto == -1)
    {
/*        Critica += " " + Nm_erro["lang_jscr_mssf"]; */
        Critica += " Sufixo faltando '.'";
    }
    if (nmdg_Ponto == 0)
    {
/*        Critica += " " + Nm_erro["lang_jscr_sfdt"]; */
        Critica += " Sufixo iniciando com '.'";
    }
    nmdg_Ponto = -1  ;
    nmdg_Ponto = Compara.lastIndexOf(".") ;
    if (nmdg_Ponto == (Compara.length - 1))
    {
/*        Critica += " " + Nm_erro["lang_jscr_sffd"]; */
        Critica += " Sufixo terminando com '.'";
    }
    if (Critica != "")
    {
        if (Nm_erro[nmdg_Campo])
        {
/*            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo] + ": " + Critica; */
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
        }
        else
        {
/*            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivem"] + Critica ; */
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro["lang_jscr_ivem"];
        }
        return false ;
    }
    return true ;
}