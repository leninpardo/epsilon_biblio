<script type="text/javascript" src="web/js/evnt/val_frmUser.js" ></script>
 <div id="frmtotal">
 <form id="frmfoto" name="frmfoto" method="POST"  action="" enctype="multipart/form-data" >
  <input type="hidden" name="controller" value="User" />
    <input type="hidden" name="action" value="save_photo" />
                <table  width="550" cellspacing="4"cellpadding="0" border="0" >
				    <tr>
				     <td colspan="3">
				      <a href="#" class="item" onclick="paginacion('controller=User&action=Panel')"><=regresar</a>
				      </td>
				    </tr>
					<tr>
                        <td>foto </td>
                        <td colspan="2">:&nbsp;<input type="file" id="archivo" name="archivo"   /></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <label class='uiButton uiButtonConfirm' > <input type="button" id="Subir"  value="subir" onclick="_foto();"  /></label>
                        </td>
                    </tr>
                </table>
        </form>
		
<div id="msg" style="display:none; font-size: 15px; color: red;" align="center"></div>
<div id="res"></div>
<div id="loader" style="display:none" align="center"><img src="images/cargando.gif" /></div>
</div>
