<?php

$bol_focus = $this->GetVar('redirect_focus');
$bol_focus = ((null !== $bol_focus) && $bol_focus);
?>
<body>

<form name="form_redirect" action="<?php echo $this->GetVar('redirect_to'); ?>" method="<?php echo $this->GetVar('redirect_method'); ?>" target="<?php echo $this->GetVar('redirect_target'); ?>">
<?php echo $this->GetVar('redirect_input'); ?>
</form>
<script language="Javascript" type="text/javascript">
<?php
if ($bol_focus)
{
    if ('nmWinGenBuild' == $this->GetVar('redirect_target'))
    {
        $str_par = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=600, height=440';
    }
    elseif ('nmWinGenExec' == $this->GetVar('redirect_target'))
    {
        $arr_prefs = $nm_user->GetData('Prefs');
        $str_par   = (FALSE !== strpos($arr_prefs['win_option'], 'M')) ? 'menubar=yes, '  : 'menubar=no, ';
        $str_par  .= (FALSE !== strpos($arr_prefs['win_option'], 'L')) ? 'location=yes, ' : 'location=no, ';
        $str_par  .= (FALSE !== strpos($arr_prefs['win_option'], 'T')) ? 'toolbar=yes, '  : 'toolbar=no, ';
        $str_par  .= 'directories=no, status=no, scrollbars=yes, resizable=yes';
    }
    else
    {
        $str_par = '';
    }
?>
oWin = window.open('', '<?php echo $this->GetVar('redirect_target'); ?>', '<?php echo $str_par; ?>');
<?php
}
?>
document.form_redirect.submit();
<?php
if ($bol_focus)
{
?>
oWin.focus();
<?php
}
?>
</script>

</body>