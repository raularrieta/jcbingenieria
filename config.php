<?php

class Buscador {

	//Se prueba nuevo metodo de conexión. Se declaran las varibles
	var $host='localhost',
		$user='Admin',
		$pass='123456',
		$db='Alumbrado_publico',
		$correct_server='Se Conecto Con el servidor Correctamente',
		$fail_server='No se pudo conectar con el servidor',
		$correct_db='Se selecciono correctamente la db',
		$fail_db='No existe esta db';

	//Funciones para conectar
	function Conectar() {
		if (!@mysql_connect($this->host,$this->user,$this->pass)) {
			print $this->fail_server;

			} else {
				if(!@mysql_select_db($this->db)) {
					print $this->fail_db;
				}
			}
		}

	//Función para buscar
	function Buscar ($Textbusca) {
		$query = mysql_query("SELECT * FROM tbl_contribuyente WHERE id_contribuyente LIKE '%$Textbusca%'");
		if (mysql_num_rows($query)<=0) {
			print 'NO EXISTE O NO SE ENCONTRO NINGUN RESULTADO';

			} else {
				print '<table class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th>ID Contribuyente</th>
									<th>Nombre Contribuyente</th>
									<th>Categor&iacute;a</th>
									<th>Direcci&oacute;n</th>
									<th>Ciudad</th>
									<th colspan="2" style="text-align:center;">Acciones</th>
								</tr>
							</thead>';
				while ($row = mysql_fetch_assoc($query)) {
					print '<tbody>
								<tr>
									<td>'.$row['id_contribuyente'].'</td>
									<td>'.$row['nomb_contribuyente'].'</td>
									<td>'.$row['categ_contribuyente'].'</td>
									<td>'.$row['dir_contribuyente'].'</td>
									<td>'.$row['ciud_contribuyente'].'</td>
									<td style="text-align:center;"><a class="btn btn-mini" href="'.$row['id_user'].'">Editar</a></td>
									<td style="text-align:center;"><a class="btn btn-danger btn-mini">Eliminar</a></td>
								<tr>
							</tbody>';
				}
				print '</table>';
			}
		}

	}
?>