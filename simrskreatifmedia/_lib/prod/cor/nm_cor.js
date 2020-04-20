/**
 * $Id: nm_cor.js,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */

var xcor = "";
var xcorok = "";
var xvermelho =  0;
var xverde = 0;
var xazul =  0 ;

function nm_sc(cor) {
  xcorok = cor;
  xvermelho = parseInt(xcorok.substr(0, 2), 16);
  xverde = parseInt(xcorok.substr(2, 2), 16);
  xazul = parseInt(xcorok.substr(4, 2), 16);
  document.bgColor = xcorok;
  document.f.C.value = xcorok;
  document.f.xx_v.value = xvermelho;
  document.f.yy_v.value = xverde;
  document.f.zz_v.value = xazul;
}
function nm_mc(tipo) {
  if (tipo == "xx+")
   {  xvermelho += 8; }
  if (tipo == "yy+")
   {  xverde += 8; }
  if (tipo == "zz+")
   {  xazul += 8; }
  if (tipo == "xx-")
   {  xvermelho -= 8; }
  if (tipo == "yy-")
   {  xverde -= 8; }
  if (tipo == "zz-")
   {  xazul -= 8; }

  if (xvermelho < 0)
   {     xvermelho = 255; }
  if (xvermelho > 255)
   {     xvermelho = 0; }
  if (xverde < 0)
   {     xverde = 255; }
  if (xverde > 255)
   {     xverde = 0; }
  if (xazul < 0)
   {     xazul = 255; }
  if (xazul > 255)
   {     xazul = 0; }

  xcor = xvermelho.toString(16).toUpperCase();
  if (xcor.length < 2)
    xcor = "0" + xcor;
  xcorok = xcor;
  xcor = xverde.toString(16).toUpperCase();
  if (xcor.length < 2)
    xcor = "0" + xcor;
  xcorok += xcor;
  xcor = xazul.toString(16).toUpperCase();
  if (xcor.length < 2)
    xcor = "0" + xcor;
  xcorok += xcor;
  document.bgColor = xcorok;
  document.f.C.value = xcorok;
  document.f.xx_v.value = xvermelho;
  document.f.yy_v.value = xverde;
  document.f.zz_v.value = xazul;
}