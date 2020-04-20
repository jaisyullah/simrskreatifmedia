/**
 * $Id: calendar.js,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
//---------- Construtor da classe ----------------------------------------------

/**
 * Classe de calendario.
 *
 * @access  public
 * @param   integer  iDay    Dia da data.
 * @param   integer  iMonth  Mes da data.
 * @param   integer  iYear   Ano da data.
 * @param   string   sPath   Caminho das imagens.
 * @param   integer  iInter  Intervalo de anos a exibir.
 */
function nmCalendar(iDay, iMonth, iYear, sPath, iInter, sWeekInit, sTimeFormat, sField, sSeq_dyn)
{
    if (null == sPath)
    {
        sPath = "img";
    }
    if (null == iInter || "" == iInter || 1 > iInter)
    {
        iInter = 10;
    }
    if (null == sWeekInit)
    {
        sWeekInit = "SU";
    }

    // Propriedades
    this.date       = new Date();
    this.day        = iDay;
    this.month      = iMonth;
    this.year       = iYear;
    this.origDay    = iDay;
    this.origMonth  = iMonth;
    this.origYear   = iYear;
    this.path       = sPath;
    this.inter      = iInter;
    this.icoBack    = sCalIcoBack;
    this.icoFor     = sCalIcoFor;
    this.icoClose   = sCalIcoClose;
    this.timeFormat = sTimeFormat;
    this.Field      = sField;
    this.Seq_dyn    = sSeq_dyn;
    switch (sWeekInit)
    {
        case "SA":
            this.weekInit = 1;
            break;
        case "FR":
            this.weekInit = 2;
            break;
        case "TH":
            this.weekInit = 3;
            break;
        case "WE":
            this.weekInit = 4;
            break;
        case "TU":
            this.weekInit = 5;
            break;
        case "MO":
            this.weekInit = 6;
            break;
        case "SU":
        default:
            this.weekInit = 7;
            break;
    }

    // Metodos Privados
    this.ChangeDate  = nmCalendarChangeDate;
    this.DaysInMonth = nmCalendarDaysInMonth;
    this.Draw        = nmCalendarDraw;
    this.DrawDays    = nmCalendarDrawDays;
    this.DrawMonths  = nmCalendarDrawMonths;
    this.DrawYears   = nmCalendarDrawYears;
    this.SetBaseDate = nmCalendarSetBaseDate;
    this.Resize      = nmCalendarResize;

    // Metodos Publicos
    this.MonthDec   = nmCalendarMonthDec;
    this.MonthInc   = nmCalendarMonthInc;
    this.MonthMove  = nmCalendarMonthMove;
    this.ReturnDate = self.parent && self.parent.$ ? nmCalendarReturnDateThickbox : nmCalendarReturnDate;
    this.YearMove   = nmCalendarYearMove;

    // Exibe calendario
    this.ChangeDate(this.month, this.year);
} // nmCalendar

//---------- Metodos Privados --------------------------------------------------

/**
 * Altera a data de exibicao.
 *
 * @access  private
 * @param   integer  iNewMonth  Mes da data.
 * @param   integer  iNewYear   Ano da data.
 */
function nmCalendarChangeDate(iNewMonth, iNewYear)
{
    this.SetBaseDate(iNewMonth, iNewYear);
    this.Draw();
    this.Resize();
} // nmCalendarChangeDate

/**
 * Retorna o numero de dias no ano.
 *
 * @access  private
 * @return  integer  Numero de dias do mes da data.
 */
function nmCalendarDaysInMonth()
{
    var aDays  = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    var iMonth = this.date.getMonth();
    if (1 != iMonth)
    {
        return aDays[iMonth];
    }
    else
    {
        return (( (this.year % 4 == 0) && (this.year % 100 != 0) ) ||
                ( this.year % 400 == 0 ))
               ? 29
               : 28;
    }
} // nmCalendarDaysInMonth

/**
 * Exibe o calendario.
 *
 * @access  private
 */
function nmCalendarDraw()
{
    // Inicializa calendario
    var sHtml = '<table class="scCalendarBorder" style="position: absolute; left: 20px; top: 20px"><tr><td class="scCalendarBorderPadding">';

    // Monta controle de mes/ano
    sHtml += '<table class="scCalendarToolbar" style="width: 100%"><tr><td class="scCalendarToolbarPadding">';
    sHtml += '<a href="javascript: oCal.MonthDec()"><img src="' + this.icoBack + '" style="border-width: 0px"></a>';
    sHtml += '</td><td class="scCalendarToolbarPadding">';
    sHtml += this.DrawMonths();
    sHtml += '</td><td class="scCalendarToolbarPadding">';
    sHtml += this.DrawYears();
    sHtml += '</td><td class="scCalendarToolbarPadding">';
    sHtml += '<a href="javascript: oCal.MonthInc()"><img src="' + this.icoFor + '" style="border-width: 0px"></a>';
    sHtml += '</td><td class="scCalendarToolbarPadding">';
    sHtml += '<a href="javascript: self.parent.tb_remove()"><img src="' + this.icoClose + '" style="float: right; border-width: 0px"></a>';
    sHtml += '</td></tr></table>';

    sHtml += '</td></tr><tr><td class="scCalendarBorderPadding">';

    var iStart = 7 - this.weekInit;

    // Monta calendario
    sHtml += '<table class="scCalendarTabela" style="width: 100%">';
    sHtml += '<tr>';
    for (iCntDay = iStart; iCntDay < aDayName.length; iCntDay++)
    {
        sHtml += '<td class="scCalendarWeekday">' + aDayName[iCntDay] + '</td>';
    }
    for (iCntDay = 0; iCntDay < iStart; iCntDay++)
    {
        sHtml += '<td class="scCalendarWeekday">' + aDayName[iCntDay] + '</td>';
    }
    sHtml += '</tr>';
    sHtml += this.DrawDays();
    sHtml += '</table>';

    // Finaliza calendario
    sHtml += '</td></tr></table>';

    // Exibe caledario
    document.getElementById("idCalendar").innerHTML = sHtml;
} // nmCalendarDraw

/**
 * Exibe os dias do calendario.
 *
 * @access  private
 * @return  string   Codigo HTML com dias dos mes.
 */
function nmCalendarDrawDays()
{
    var iRow    = this.date.getDay() + this.weekInit;
    var iDays   = this.DaysInMonth();
    var iRemain = iDays;
    var sCal    = (0 != iRow) ? "<tr>" : "";
    if (6 < iRow)
    {
        iRow -= 7;
    }
    if (0 < iRow)
    {
        sCal += '<td class="scCalendarMonthday" colspan="' + iRow + '">&nbsp;</td>';
    }
    while (0 < iRemain)
    {
        if (0 == iRow)
        {
            sCal += "<tr>";
        }
        iNow  = iDays - iRemain + 1;
        sCss  = (iNow == this.origDay && this.month == this.origMonth && this.year == this.origYear)
              ? " scCalendarSelectedday" : ""
        sCal += '<td class="scCalendarMonthday"><a class="scCalendarMonthdayFont' + sCss + '" href="javascript: oCal.ReturnDate(' + iNow + ')">' + iNow + "</a></td>";
        iRow++;
        if (7 == iRow)
        {
            iRow = 0;
            sCal += "</tr>";
        }
        iRemain--;
    }
    if (0 != iRow)
    {
        sCal += '<td class="scCalendarMonthday" colspan="' + (7 - iRow) + '">&nbsp;</td></tr>';
    }
    return sCal;
} // nmCalendarDrawDays

/**
 * Exibe a lista de meses.
 *
 * @access  private
 */
function nmCalendarDrawMonths()
{
    // Inicializa lista de meses
    var sMonth = "";
    // Monta lista de meses
    sMonth += '<select name="selMonth" onChange="oCal.MonthMove(this)" class="scCalendarInput">';
    for (iCntMonth = 0; iCntMonth < aMonthName.length; iCntMonth++)
    {
        sMonth += '<option value="' + (iCntMonth + 1) + '"' + (((iCntMonth + 1) == this.month) ? ' selected="selected"' : "") + '>' + aMonthName[iCntMonth] + '</option>';
    }
    sMonth += "</select>";
    // Retorna lista de meses
    return sMonth;
} // nmCalendarDrawMonths

/**
 * Exibe a lista de anos.
 *
 * @access  private
 */
function nmCalendarDrawYears()
{
    // Inicializa lista de anos
    var sYear = "";
    var iHalf = Math.floor(this.inter / 2);
    var iMax  = parseInt(this.year) + iHalf;
    var iMin  = parseInt(this.year) - iHalf;
    if (this.inter % 2)
    {
        iMax += 1;
    }
    // Monta lista de anos
    sYear += '<select name="selYear" onChange="oCal.YearMove(this)" class="scCalendarInput">';
    for (iCount = iMin; iCount < iMax; iCount++)
    {
        sYear += '<option value="' + iCount + '"' + ((iCount == this.year) ? ' selected="selected"' : "") + '>' + iCount + '</option>';
    }
    sYear += "</select>";
    // Retorna lista de anos
    return sYear;
} // nmCalendarDrawYears

/**
 * Seta a data atual.
 *
 * @access  private
 * @param   integer  iNewMonth  Mes da data.
 * @param   integer  iNewYear   Ano da data.
 */
function nmCalendarSetBaseDate(iNewMonth, iNewYear)
{
    this.date.setDate(1);
    this.date.setMonth(iNewMonth - 1);
    this.date.setYear(iNewYear);
} // nmCalendarSetDate

function nmCalendarResize()
{
    oTable = $(".scCalendarBorder");
    if (0 == oTable.height() || 0 == oTable.width())
    {
        setTimeout("nmCalendarResize()", 50);
        return;
    }
    self.parent.tb_resize(oTable.height() + 40, oTable.width() + 40);
} // nmCalendarResize

//---------- Metodos Publicos --------------------------------------------------

/**
 * Volta o calendario em um mes.
 *
 * @access  public
 */
function nmCalendarMonthDec()
{
    if (1 == this.month)
    {
        this.month = 12;
        this.year--;
    }
    else
    {
        this.month--;
    }
    this.ChangeDate(this.month, this.year);
} // nmCalendarMonthDec

/**
 * Adianta o calendario em um mes.
 *
 * @access  public
 */
function nmCalendarMonthInc()
{
    if (12 == this.month)
    {
        this.month = 1;
        this.year++;
    }
    else
    {
        this.month++;
    }
    this.ChangeDate(this.month, this.year);
} // nmCalendarMonthInc

/**
 * Altera o mes da data.
 *
 * @access  public
 * @param   object  oSel  Objeto SELECT com a lista de meses.
 */
function nmCalendarMonthMove(oSel)
{
    this.month = oSel.options[oSel.selectedIndex].value;
    this.ChangeDate(this.month, this.year);
} // nmCalendarMonthMove

/**
 * Retorna a data selecionada.
 *
 * @access  public
 * @param   integer  iNewDay  Dia selecionado.
 */
function nmCalendarReturnDate(iNewDay)
{
    if (fCallBack)
    {
        fCallBack(iNewDay, this.month, this.year, this.timeFormat, this.Field, this.Seq_dyn);
    }
    window.close();
} // nmCalendarReturnDate

/**
 * Retorna a data selecionada.
 *
 * @access  public
 * @param   integer  iNewDay  Dia selecionado.
 */
function nmCalendarReturnDateThickbox(iNewDay)
{
    if (fCallBack)
    {
        fCallBack(iNewDay, this.month, this.year, this.timeFormat, this.Field, this.Seq_dyn);
    }
    self.parent.tb_remove();
} // nmCalendarReturnDateThickbox

/**
 * Altera o ano da data.
 *
 * @access  public
 * @param   object  oSel  Objeto SELECT com a lista de anos.
 */
function nmCalendarYearMove(oSel)
{
    this.year = oSel.options[oSel.selectedIndex].value;
    this.ChangeDate(this.month, this.year);
} // nmCalendarYearMove