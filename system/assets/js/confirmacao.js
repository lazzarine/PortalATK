function Confirmation(id){
if(confirm('Deseja deletar esse registro ?'))
window.location.href="painel.php?exe=acesso/read&AcessoDel="+id;
}


