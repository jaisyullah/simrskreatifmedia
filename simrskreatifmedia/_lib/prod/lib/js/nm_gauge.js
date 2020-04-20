/**
 * $Id: nm_gauge.js,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
function nmGauge(sName, sTitle, iSize, iMsg)
{
 // Propriedades
 this.image_dir    = '';
 this.msg_header   = '';
 this.name         = sName;
 this.now_size     = 0;
 this.now_step     = 0;
 this.perc         = 0;
 this.size         = iSize;
 this.status       = false;
 this.steps        = 0;
 this.title        = sTitle;

 // Metodos Privados
 this.DrawBar      = DrawBar;
 this.GetBarSize   = GetBarSize;
 this.GetImageDir  = GetImageDir;
 this.GetMsgHeader = GetMsgHeader;
 this.GetName      = GetName;
 this.GetPerc      = GetPerc;
 this.GetSize      = GetSize;
 this.GetSteps     = GetSteps;
 this.GetTitle     = GetTitle;
 this.IncStep      = IncStep;
 this.SetOk        = SetOk;
 this.ShowTitle    = ShowTitle;

  // Metodos Publicos
 this.Finalize     = Finalize;
 this.Init         = Init;
 this.IsOk         = IsOk;
 this.SetMsgHeader = SetMsgHeader;
 this.Step         = Step;

 // Desenha Barra
 this.DrawBar(iMsg);
}

// Metodos Privados
function DrawBar(iMsg)
{

 document.write('<div id="panel_' + this.GetName() + '">');
 document.write(' <table style="border-collapse: collapse; border-color: #D4D0C8; border-spacing: 0px; border-style: outset; border-width: 2px">');
 if (this.ShowTitle())
 {
  document.write('  <tr>');
  document.write('   <td style="background-color: #0A246A; border-width: 0px; color: #FFFFFF; font-family: Tahoma, Arial, sans-serif; font-size: 13px; font-weight: bold; padding: 5px 5px 5px" colspan="2">' + this.GetTitle() + '</td>');
  document.write('  </tr>');
 }
 document.write('  <tr>');
 document.write('   <td style="background-color: #D4D0C8; border-width: 0px; color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px; padding: 5px 5px 5px; width: ' + this.GetSize() + 'px">');
 document.write('    <table style="background-color: #FFFFFF; border-collapse: collapse; border-color: #000000; border-style: solid; border-width: 1px; height: 27px; width: ' + this.GetSize() + 'px"><tr><td style="padding: 0px">');
 document.write('     <span id="img_' + this.GetName() + '"></span>');
 document.write('    </td></tr></table>');
 document.write('   </td>');
 document.write('   <td style="background-color: #D4D0C8; border-width: 0px; color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px; padding: 5px 5px 5px; text-align: right; width: 40px"><span id="perc_' + this.GetName() + '">' + this.GetPerc() + '</span>%</td>');
 document.write('  </tr>');
 document.write('  <tr>');
 document.write('   <td style="background-color: #D4D0C8; border-width: 0px; color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px; padding: 5px 5px 5px" colspan="2"><span id="msg_' + this.GetName() + '">' + iMsg + '</span></td>');
 document.write('  </tr>');
 document.write(' </table>');
 document.write('</div>');
/*
 document.write('<div id="panel_' + this.GetName() + '">');
 document.write(' <table class="scGridTabela" style="border-spacing: 0px; border-style: outset; border-width: 2px">');
 if (this.ShowTitle())
 {
  document.write('  <tr class="scGridLabelVert">');
  document.write('   <td style="font-weight: bold; padding: 5px 5px 5px" colspan="2">' + this.GetTitle() + '</td>');
  document.write('  </tr>');
 }
 document.write('  <tr class="scGridFieldOddVert">');
 document.write('   <td style="padding: 5px 5px 5px; width: ' + this.GetSize() + 'px">');
 document.write('    <table style="background-color: #FFFFFF; border-collapse: collapse; border-color: #000000; border-style: solid; border-width: 1px; height: 27px; width: ' + this.GetSize() + 'px"><tr><td style="padding: 0px">');
 document.write('     <span id="img_' + this.GetName() + '"></span>');
 document.write('    </td></tr></table>');
 document.write('   </td>');
 document.write('   <td style="padding: 5px 5px 5px; text-align: right; width: 40px"><span id="perc_' + this.GetName() + '">' + this.GetPerc() + '</span>%</td>');
 document.write('  </tr>');
 document.write('  <tr>');
 document.write('   <td style="padding: 5px 5px 5px" colspan="2"><span id="msg_' + this.GetName() + '">' + iMsg + '</span></td>');
 document.write('  </tr>');
 document.write(' </table>');
 document.write('</div>');
*/
}

function GetBarSize()
{
 return this.now_size;
}

function GetMsgHeader()
{
 return this.msg_header;
}

function GetImageDir()
{
 return this.image_dir;
}

function GetName()
{
 return this.name;
}

function GetPerc()
{
 return this.perc;
}

function GetSize()
{
 return this.size;
}

function GetSteps()
{
 return this.steps;
}

function GetTitle()
{
 return this.title;
}

function IncStep(iStep)
{
 this.now_step = iStep;
 this.now_size = Math.round((this.now_step * this.GetSize()) / this.GetSteps());
 this.perc     = Math.round((this.now_step * 100) / this.GetSteps());
}

function SetOk()
{
 this.status = true;
}

function ShowTitle()
{
 return ('' != this.title);
}

// Metodos Publicos
function Finalize(sMsg)
{
 document.getElementById('bar_'  + this.GetName()).width     = this.GetSize();
 document.getElementById('msg_'  + this.GetName()).innerHTML = this.GetMsgHeader() + sMsg;
 document.getElementById('perc_' + this.GetName()).innerHTML = '100';
}

function Init(iSteps, sImgDir)
{
 document.getElementById('img_' + this.GetName()).innerHTML = '<img src="' + sImgDir + 'bar_l.png" border="0" height="25" width="2"><img id="bar_' + this.GetName() + '" src="' + sImgDir + 'bar_c.png" border="0" height="25" width="1"><img src="' + sImgDir + 'bar_r.png" border="0" height="25" width="2">';
 this.image_dir = sImgDir;
 this.steps     = iSteps;
 this.SetOk();
}

function IsOk()
{
 return this.status;
}

function SetMsgHeader(sMsg)
{
 this.msg_header = sMsg;
}

function Step(sMsg, iStep)
{
 this.IncStep(iStep);
 document.getElementById('bar_'  + this.GetName()).width     = this.GetBarSize();
 document.getElementById('msg_'  + this.GetName()).innerHTML = this.GetMsgHeader() + sMsg;
 document.getElementById('perc_' + this.GetName()).innerHTML = this.GetPerc();
}