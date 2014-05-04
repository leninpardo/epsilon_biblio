 <script type="text/javascript" src="web/js/change_password.js"></script>
 <div id="frmtotal">
 <form id="frmperfil" name="frmperfil"method="post"  action="" >
                <table  width="550" cellspacing="4"cellpadding="0" border="0" >
				    <tr>
				     <td colspan="3">
				      <a href="#" class="item" onclick="paginacion('controller=User&action=Panel')"><=regresar</a>
				      </td>
				    </tr>
                    <tr>
                        <td>Clave actual </td>
                        <td colspan="2">:&nbsp;<input type="password" id="password" name="password"   value=""/></td>
                    </tr>
					<tr id="c1">
                        <td colspan="3" align="center">
                            <a href="javascript:void(0);" onclick="javascript:valida_password()" style="font-size: 12px; color:#669900;text-decoration:none">Validar Password</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nueva clave</td>
                        <td colspan="2">:&nbsp;<input id="clave" name="clave"    disabled="" /></td>
                    </tr>
					<tr>
                        <td>Confirme clave</td>
                        <td colspan="2">:&nbsp;<input id="clave2" name="clave2"  disabled="" /></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                             <input type="button" id="cambiar_clave" class='uiButton uiButtonConfirm' value="Cambiar" onclick="change_password();"   style="display:none;color:#fff;" />
                        </td>
                    </tr>
                </table>
        </form>
		
<div id="msg" style="display:none; font-size: 15px;" align="center"></div>
<div id="res"></div>
<div id="loader" style="display:none" align="center"><img src="images/cargando.gif" /></div>
</div>
