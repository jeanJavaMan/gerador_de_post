<?php
function upLinksProtetor($downlinks,$usuario,$senha,$userUrl){
	
	$ch = curl_init();
	//pagina de login do protetor com os formularios.
	curl_setopt($ch, CURLOPT_URL, "http://protetor.therevolution.com.br/".$userUrl."/login/index.php?pg=logando");
	//habilita o protocolo POST
	curl_setopt($ch, CURLOPT_POST, true);
	//defino quais parâmetros serão enviados pelo método POST.
	curl_setopt($ch, CURLOPT_POSTFIELDS, "login=".$usuario."&senha=".$senha."");
	//preparo um cookie para simular um navegador
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
	//defino o tipo de transferência
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//executa a requisisão.
	curl_exec($ch);
	for($i = 0; $i < count($downlinks); $i++){
		$fields = array("mensagem" => $downlinks[$i]);
		curl_setopt($ch, CURLOPT_URL, "http://protetor.therevolution.com.br/".$userUrl."/login/admin.php?id=1");
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $fields);
		//utilizar o cookie gerado no login
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
		//desativa a verificação de segurança
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_exec($ch);
	}
	//vai para a pagina onde estar os links de download do protetor.
    curl_setopt($ch, CURLOPT_URL, "http://protetor.therevolution.com.br/".$userUrl."/login/pagination_data.php?page=1");
    //executa a requisição e retorna o HTML do site. 
    $paginaDeLinks = curl_exec ($ch);
    //fecha a conexão.
    curl_close($ch);
    $pattern = "/readonly>(.*?)<\/textarea>/s";
    preg_match_all($pattern, $paginaDeLinks, $linksProtetor);
    //retorna somente os links adicionado.
    return array_slice($linksProtetor[1], 0,count($downlinks));

}