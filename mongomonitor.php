<?
$m = new Mongo();
$mdb = $m->meubanco;
$mdb->authenticate("meusuario","minhasenha"); 
e("<h3>.stats()</h3>");
$dbstats = $mdb->execute("db.stats()");

echo "<p><b>Espa&ccedil;o alocado para cole&ccedil;&atilde;o:</b> ".substr($dbstats['retval']["storageSize"]/1024,0,5)." kb<br>
<b>Tamanho total: </b>".substr($dbstats['retval']["fileSize"]/1048576,0,5)." mb<br>
<b>Tamanho m&eacute;dio de cada arquivo: </b>".substr($dbstats['retval']["avgObjSize"]/1024,0,5)." kb<br>
<b>N&ordm; de arquivos: </b>".$dbstats['retval']["objects"]."<br>
<b>Tamanho total dos arquivos: </b>".substr($dbstats['retval']["dataSize"]/1024,0,5)." kb</p>

<p><b>Retorno por extenso: </b>";
print_r($dbstats);
echo "</p>";

e("<h3>.serverStatus()</h3>");
$server = $mdb->execute("db.serverStatus()");
echo "<p><b>Uptime: </b>".$server['retval']['uptime']." segundos (".substr(($server['retval']['uptime']/60)/24,0,5)." horas)<br>
<b>N&ordm; de conex&otilde;es:</b> ".$server['retval']['connections']['current']."<br>
<b>N&ordm; de conex&otilde;es suportado:</b> ".$server['retval']['connections']['available']."<br>
<b>N&ordm; de fluxo de acessos:</b> ".$server['retval']['backgroundFlushing']['flushes']."<br>
<b>Tempo m&eacute;dio:</b> ".$server['retval']['backgroundFlushing']['average_ms']."<br><br>
<b>N&ordm; de insert's:</b> ".$server['retval']['opcounters']['insert']."<br>
<b>N&ordm; de query's:</b> ".$server['retval']['opcounters']['query']."<br>
<b>N&ordm; de update's:</b> ".$server['retval']['opcounters']['update']."<br>
<b>N&ordm; de delete's:</b> ".$server['retval']['opcounters']['delete']."<br>
<b>N&ordm; de getmore's:</b> ".$server['retval']['opcounters']['getmore']."<br>
<b>N&ordm; de command's:</b> ".$server['retval']['opcounters']['command']."<br><br>
<b>N&ordm; de mensagens regulares:</b> ".$server['retval']['asserts']['regular']."<br>
<b>N&ordm; de mensagens de alerta:</b> ".$server['retval']['asserts']['warning']."<br>
<b>N&ordm; de mensagens do servidor:</b> ".$server['retval']['asserts']['msg']."<br>
<b>N&ordm; de mensagens geradas por a&ccedil;&otilde;es de usu&aacute;rios:</b> ".$server['retval']['asserts']['user']."<br>
<b>N&ordm; de mensagens <i>rollovers</i>:</b> ".$server['retval']['asserts']['rollovers']."<br></p>

<p><b>Retorno por extenso: </b>";
print_r($server);
echo "</p>";
?>
