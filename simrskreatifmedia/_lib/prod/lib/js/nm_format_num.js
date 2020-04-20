
function JS_Format_Num_Val(val_in, simb_agrup, simb_dec, qt_dec, enche_zeros, lado_neg, simb_monetario, new_format, simb_neg, format_indiano)
{
   if (qt_dec == "") {qt_dec = 0;}
   if (simb_neg == "") {simb_neg = "-";}
   if (format_indiano == "") {format_indiano = 1;}

   tab_format = new Array();

   tab_format['num_neg'] = new Array();
   tab_format['num_neg'][1] = "(1,1)";
   tab_format['num_neg'][2] = "-1,1";
   tab_format['num_neg'][3] = "- 1,1";
   tab_format['num_neg'][4] = "1,1-";
   tab_format['num_neg'][5] = "1,1 -";

   tab_format['val_pos'] = new Array();
   tab_format['val_pos'][1] = "R1,1";
   tab_format['val_pos'][2] = "1,1R";
   tab_format['val_pos'][3] = "R 1,1";
   tab_format['val_pos'][4] = "1,1 R";

   tab_format['val_neg'] = new Array();
   tab_format['val_neg'][1]  = "(R1,1)";
   tab_format['val_neg'][2]  = "-R1,1";
   tab_format['val_neg'][3]  = "R-1,1";
   tab_format['val_neg'][4]  = "R1,1-";
   tab_format['val_neg'][5]  = "(1,1R)";
   tab_format['val_neg'][6]  = "-1,1R";
   tab_format['val_neg'][7]  = "1,1-R";
   tab_format['val_neg'][8]  = "1,1R-";
   tab_format['val_neg'][9]  = "-1,1 R";
   tab_format['val_neg'][10] = "-R 1,1";
   tab_format['val_neg'][11] = "1,1 R-";
   tab_format['val_neg'][12] = "R 1,1-";
   tab_format['val_neg'][13] = "R -1,1";
   tab_format['val_neg'][14] = "1,1- R";
   tab_format['val_neg'][15] = "(R 1,1)";
   tab_format['val_neg'][16] = "(1,1 R)";

   val_in = val_in.toString();
   if (val_in == "" || parseInt(val_in) == "")
   {
       return val_in;
   }
   Sinal = "";
   if (val_in.substr(0, 1) == "-")
   {
       Sinal = "-";
       val_in = val_in.substr(1);
   }

   QuantIni = val_in.indexOf(".");
   if (qt_dec > 0)
   {
       if (QuantIni != -1)
       {
           decimal  = val_in.substr(QuantIni + 1);
           inteiro  = val_in.substr(0, QuantIni + 1);
           if (decimal.length > qt_dec)
           {
               decimal = decimal.substr(0, qt_dec);
           }
           else
           {
               if (enche_zeros == "S")
               {
                   for (i = decimal.length; i < qt_dec; i++)
                   {
                       decimal += "0";
                   }
               }
           }
           val_in = inteiro + decimal;
       }
       else
       {
           if (enche_zeros == "S")
           {
               val_in += ".";
               for (i = 0; i < qt_dec; i++)
               {
                   val_in += "0";
               }
           }
       }
   }
   else
   {
       if (QuantIni != -1)
       {
           val_in = val_in.substr(0, QuantIni);
       }
   }

   QuantIni = val_in.indexOf(".");
   if (simb_dec != ".")
   {
       val_in = val_in.replace(".", simb_dec);
   }
   decimal = "" ;
   if (QuantIni !== -1)
   {
       decimal  = val_in.substr(QuantIni);
       val_in = val_in.substr(0, QuantIni);
   }
   QuantNum = val_in.length;
   if (QuantNum > 3 && format_indiano == 2)
   {
       val_in = $val_in.substr(0, -3) + simb_agrup + val_in.substr(-3);
   }
   if (QuantNum > 3 && format_indiano != 2)
   {
       ini_ind = "";
       qtd_grp = 3;
       if (format_indiano == 3)
       {
           qtd_grp  = 2;
           ini_ind  = simb_agrup + val_in.substr(-3);
           val_in = val_in.substr(0, -3);
           QuantNum = QuantNum - 3;
       }
       QuantIni = QuantNum % qtd_grp;
       ValNaoEditado = val_in ;
       val_in = ValNaoEditado.substr(0, QuantIni);
       for (Inum = QuantIni; Inum < QuantNum; Inum += qtd_grp)
       {
            if (Inum != 0)
            {
                val_in = val_in + simb_agrup + ValNaoEditado.substr(Inum, qtd_grp);
            }
            else
            {
                val_in +=  ValNaoEditado.substr(Inum, qtd_grp);
            }
       }
       val_in += ini_ind;
   }

   inteiro = val_in;
   if (enche_zeros == "S" && inteiro == "")
   {
       inteiro = "0";
   }

   val_in = inteiro + decimal;
   part_format = new_format.split(":");

   if (part_format[0] == "N" && Sinal != "")
   {
       temp_form = tab_format['num_neg'][part_format[1]];
       temp_form = temp_form.replace("1,1", val_in);
       val_in  = temp_form.replace("-", simb_neg);
   }
   else if (part_format[0] == "V")
   {
       temp_form = (Sinal == "") ? tab_format['val_pos'][part_format[1]] : tab_format['val_neg'][part_format[2]];
       temp_form = temp_form.replace("1,1", val_in);
       temp_form = temp_form.replace("R", simb_monetario);
       val_in  = temp_form.replace("-", simb_neg);
   }
   return val_in;
}
