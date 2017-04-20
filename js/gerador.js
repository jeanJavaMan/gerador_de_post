/**
 * 
 */
var contador = 0;
var serveId;
var serverName;
function gerarPost() {
    document.getElementById("formPost").submit();
}
;

function pegarDescricao(deOnde, paraOnde) {
    var descricao = document.getElementById(deOnde).innerHTML;
    document.getElementById(paraOnde).value = descricao;
}
;





