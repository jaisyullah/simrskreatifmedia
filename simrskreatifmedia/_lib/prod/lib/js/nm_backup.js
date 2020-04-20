/**
 * $Id: nm_backup.js,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
//  ****************************  //
//  Funções de Controle de Fluxo  //
//  ****************************  //
  function SetOpc(n)
  {
    document.form_1.nOpc.value=n;
    document.form_1.submit();
  }// End function SetOpc(n)

  function SetOpr(n)
  {
    document.form_1.nOpr.value=n;
    document.form_1.submit();
  }// End function SetAcao(n)

  function SetGrupo(n, fsubmit)
  {  	
    document.form_1.nGrp.value=n;
    
    if (fsubmit == null ||(fsubmit != null && fsubmit))
    {
    	document.form_1.submit();
    }	
  }// End function SetGrupo(n)

  function SetAcao(n)
  {
    document.form_1.nOpr.value=n;
    document.form_1.submit();
  }// End function SetAcao(n)

  function SetGeral(n)
  {
    document.form_1.nFlagGeral.value=n;
    if (n == '1')
    {
      document.form_1.nFlagAppAll.value=0;
      document.form_1.nFlagGrp.value=0;
      document.form_1.nFlagUsr.value=0;
      document.form_1.nFlagCon.value=0;
      document.form_1.nFlagPub.value=0;
      document.form_1.nFlagRep.value=0;
    }// end
    if (n == '2')
    {
      document.form_1.nFlagAppAll.value=2;
      document.form_1.nFlagGrp.value=2;
      document.form_1.nFlagUsr.value=2;
      document.form_1.nFlagCon.value=2;
      document.form_1.nFlagPub.value=2;
      document.form_1.nFlagRep.value=2;
    }// end
    document.form_1.submit();
  }//


//  *******************  //
//  Funções para Grupos  //
//  *******************  //
  function SetGrp()
  {
    document.form_1.nFlagGrp.value=1;
  }// End function SetGrp()

  function SetGrpAll(n)
  {
    document.form_1.nFlagGrp.value=n;
    document.form_1.submit();
  }// End function SetGrpAll()

  function SetGroup(OnOff)
  {
    var nEle = document.forms[0].length;
    for( i=0; i < nEle; i++ )
    {
      ele = document.forms[0].elements[i];
      if (ele.getAttribute('tipo') == 'Grupo' )
      {
        ele.checked = OnOff;
      }// End if (ele.getAttribute('tipo') == 'Grupo' )
    }// End for( i=0; i < nEle; i++ )
  }// End function SetGroup(OnOff)


//  *********************  //
//  Funções para Usuários  //
//  *********************  //
  function SetUsr()
  {
    document.form_1.nFlagUsr.value=1;
  }// End function SetUsr()

  function SetUsrAll(n)
  {
    document.form_1.nFlagUsr.value=n;
    document.form_1.submit();
  }// End function SetUsrAll()

  function SetUser(OnOff)
  {
    var nEle = document.forms[0].length;
    for( i=0; i < nEle; i++ )
    {
      ele = document.forms[0].elements[i];
      if (ele.getAttribute('tipo') == 'Usuario' )
      {
        ele.checked = OnOff;
      }// End if (ele.getAttribute('tipo') == 'Usuario' )
    }// End for( i=0; i < nEle; i++ )
  }// End function SetUserp(OnOff)



//  ***********************  //
//  Funções para Aplicações  //
//  ***********************  //
  function SetApp(n)
  {
    document.form_1.nFlagApp.value=n;
  }// End function SetApp()

  function SetAppAll(n)
  {
    document.form_1.nFlagAppAll.value=n;
    document.form_1.submit();
  }// End function SetAppAll(n)

  function SetAppGrpAll(n, fsubmit)
  {
    document.form_1.nFlagAppGrpAll.value=n;
    
    if (fsubmit == null ||(fsubmit != null && fsubmit))
    {
    	document.form_1.submit();
    }        
  }// End function SetAppGrpAll(n)

  function SetApplic(grp,opt)
  {
    var nEle = document.forms[0].length;
    for( i=0; i < nEle; i++ )
    {
      ele = document.forms[0].elements[i];
      if (ele.getAttribute('tipo') == grp )
      {
        ele.checked = opt;
      }
    }
  }// End function SetApplic($grp)

  function SetAppOnOff(grp,n)
  {
    var nEle = document.forms[0].length;
    for( i=0; i < nEle; i++ )
    {
      ele = document.forms[0].elements[i];
      if (ele.getAttribute('tipo') == grp )
      {
        ele.checked = n;
      }
    }
  }// End function SetAppOff($grp)



//  ************************  //
//  Funções para Publicações  //
//  ************************  //
  function SetPub()
  {
    document.form_1.nFlagPub.value=1;
  }// End function SetPub()

  function SetPubAll(n)
  {
    document.form_1.nFlagPub.value=n;
    document.form_1.submit();
  }// End function SetPubAll()

  function SetPublic(opt)
  {
    var nEle = document.forms[0].length;
    for( i=0; i < nEle; i++ )
    {
      ele = document.forms[0].elements[i];
      if (ele.getAttribute('tipo') == 'public' )
      {
        ele.checked = opt;
      }
    }
  }// End function SetPublic(opt)



//  *************************  //
//  Funções para Repositorios  //
//  *************************  //
  function SetRep()
  {
    document.form_1.nFlagRep.value=1;
  }// End function SetRep()

  function SetRepAll(n)
  {
    document.form_1.nFlagRep.value=n;
    document.form_1.submit();
  }// End function SetRepAll()

  function SetReposi(opt, prj)
  {
    var nEle = document.forms[0].length;
    for( i=0; i < nEle; i++ )
    {
      ele = document.forms[0].elements[i];
      if (ele.getAttribute('tipo') == 'reposi')
      {
      	if (prj != null)
      	{
      		if (prj == ele.getAttribute('prj'))
      		{
      			ele.checked = opt;
      		}
      	}      	
      	else
      	{
        	ele.checked = opt;
      	}        
      }
    }
  }// End function SetPublic(opt)



//  *********************  //
//  Funções para Conexões  //
//  *********************  //
  function SetCon()
  {
    document.form_1.nFlagCon.value=1;
  }// End function SetCon()

  function SetConAll(n)
  {
    document.form_1.nFlagCon.value=n;
    document.form_1.submit();
  }// End function SetConAll()

  function SetConex(opt, prj)
  {
    var nEle = document.forms[0].length;
    for( i=0; i < nEle; i++ )
    {
      ele = document.forms[0].elements[i];
      if (ele.getAttribute('tipo') == 'conexao' )
      {
      	if (prj != null)
      	{
      		if (prj == ele.getAttribute('prj'))
      		{
      			ele.checked = opt;
      		}
      	}      	
      	else
      	{
        	ele.checked = opt;
      	}        	
      }
    }
  }// End function SetConex(opt)

  function SetFirst()
  {
    document.form_1.nFirst_H.value=1;
  }// End function SetFirst()


  function SetGoto()
  {
    document.form_1.btnExecutar.disabled = false;
  }// End function SetGoto()

  function SetGotoOff()
  {
    document.form_1.btnExecutar.disabled = true;
    alert('teste');
  }// End function SetGoto()


  function SetBtProc(str)
  {
    document.form_1.nTipoBkp[0].checked = true;
    document.form_1.avancar.value = str;
  }
  function ChangeBtn(str)
  {
    document.form_1.avancar.value = str;
  }
  
  function FormSubmit()
  {
    document.form_1.submit();
  }// End function SetAppGrpAll(n)