<?php

class PostCode {

    public function getTituloPost($nomeDoJogo) {
        return "Download " . $nomeDoJogo . " Completo - PC";
    }

    public function getTituloFilme($nome_do_filme) {
        return "Download " . empty($nome_do_filme) ? "Sem Nome" : $nome_do_filme . " BluRay 720p e 1080p Dual Áudio - TORRENT";
    }

    /**
     * Serve para Post de Jogo e Filme.
     * @param type $introducao
     * @return type
     */
    public function getIntroducao($introducao) {
        return $introducao . "\n";
    }

    /**
     * Serve para Post de Jogo e Filme.
     * @param array $imagemNome
     * @return string
     */
    public function getImagemCapa(array $imagemNome) {
        $imagemCapa = "<table style='height: 155px;' border='0' width='825'><tbody><tr><td> <img class='alignnone size-full wp-image-9833' src='" . $this->verifica_imagem($imagemNome, 0) .
                "' alt='" . $this->nome_para_alt($imagemNome[0]) . "-capa' width='250' height='350' /></td>\n";
        return $imagemCapa;
    }

    /**
     * Monstar todo o code da parte da capa no post normal.
     * @param type $nomeJogo
     * @param type $genero
     * @param type $desenvolvedor
     * @param type $distribuidora
     * @param type $dataLancamento
     * @param type $tipoJogo
     * @param type $classificacao
     * @param type $analise
     * @return string
     */
    public function getCapaInfo($nomeJogo, $genero, $desenvolvedor, $distribuidora, $dataLancamento, $tipoJogo, $classificacao, $analise) {
        $capaInfor = "<td><b>Título:</b> " . $nomeJogo . "\n" . "<b>Gênero:</b> " .
                $genero . "\n" . "<b>Desenvolvedor:</b>  " . $desenvolvedor .
                "\n<b>Distribuidora:</b>  " . $distribuidora . "\n" .
                "<b>Data de lançamento:</b> " . $dataLancamento . "\n" .
                "<strong>Tipos de Jogo:</strong> " . $tipoJogo . "\n";
        if (!empty($classificacao) && !empty($analise)) {
            $capaInfor .= "<strong><strong>Classificações: </strong></strong><span class='game_review_summary positive'>" .
                    $classificacao . "</span> <span class='responsive_hidden'>" .
                    $analise . "</span><strong><strong></strong></strong>\n\n";
        } else {
            $capaInfor .= "\n\n";
        }
        return $capaInfor;
    }

    /**
     * 
     * @param type $nomeJogo
     * @param type $informacoes
     * @return string
     */
    public function getCapaInfoManual($nomeJogo, $informacoes) {
        $capaInfor = "<td><b>Título:</b> " . $nomeJogo . "\n" . $informacoes . "\n\n";
        return $capaInfor;
    }

    public function getCapaInfoFilme($nome_do_filme, $informacoes) {
        $capaInfor = "<td><b>Título:</b> " . $nome_do_filme . "\n" . $informacoes . "</td>\n</tr>\n</tbody>\n</table>\n\n";
        return $capaInfor;
    }

    public function getSinopseFilme($sinopse_do_filme, $link_torrent, $elenco, $dados_tecnicos) {
        $sinopse = "[wptab name='Sinopse e Download'] <strong>Sinopse</strong>: " . $sinopse_do_filme . "\n<h4>Área de Download:</h4>";
        if (!empty($link_torrent)) {
            $sinopse .= "<a href='http://protetor.therevolution.com.br/news/" .
                    $link_torrent . "' target='_blank'><strong><img class='alignnone size-medium wp-image-1489' src='http://therevolution.com.br/wp-content/uploads/2015/02/downloadjogostherevolution.com_.br_-300x100.png' alt='downloadjogostherevolution.com.br' width='300' height='100' /></strong></a>
		[/wptab]\n\n";
        } else {
            $sinopse .= "\n\n[/wptab]\n\n";
        }
        if (!empty($elenco)) {
            $sinopse .= "[wptab name='Elenco'] " . $elenco . "\n[/wptab]\n\n";
        }
        if (!empty($dados_tecnicos)) {
            $sinopse .= "[wptab name='Dados Técnicos'] " . $dados_tecnicos . "[/wptab]\n\n";
        }
        return $sinopse;
    }

    public function getTamanho($nomeLancamento, $tamanho, $linkSteam, $linkOficial, $linkNfo) {
        // $tamanhoLinks = "<strong><strong>\n"
        // ."</strong></strong><strong>Nome de Lançamento:
        // </strong>".$nomeLancamento."\n"
        // ."<strong>Tamanho: </strong>".$tamanho."\n"
        // ."<strong>Links:</strong> <a target='_blank'
        // href='".$linkOficial."'>Site Oficial</a> | <a target='_blank'
        // href='".$linkSteam."'>Steam</a> |<a target='_blank'
        // href='".$linkNfo."'>NFO</a></td></tr></tbody></table>\n";
        $tamanhoLinksV2 = "<strong><strong>\n" .
                "</strong></strong><strong>Nome de Lançamento: </strong> " .
                $nomeLancamento . "\n" . "<strong>Tamanho: </strong> " .
                $tamanho . "\n";
        if (empty($linkOficial)) {
            $tamanhoLinksV2 .= "<strong>Links:</strong> <del>Site Oficial</del> ";
        } else {
            $tamanhoLinksV2 .= "<strong>Links:</strong> <a target='_blank' href='" .
                    $linkOficial . "'>Site Oficial</a> ";
        }
        if (empty($linkSteam)) {
            $tamanhoLinksV2 .= "| <del>Steam</del> ";
        } else {
            $tamanhoLinksV2 .= "| <a target='_blank' href='" . $linkSteam .
                    "'>Steam</a> ";
        }
        if (empty($linkNfo)) {
            $tamanhoLinksV2 .= "| <del>NFO</del></td></tr></tbody></table>\n";
        } else {
            $tamanhoLinksV2 .= "| <a target='_blank' href='" . $linkNfo .
                    "'>NFO</a></td></tr></tbody></table>\n";
        }

        return $tamanhoLinksV2;
    }

    public function getDescricao($descricao) {
        $descricao = "[wptab name='Download/Descrição']<strong>Descrição: </strong>" .
                $descricao . "\n\n";
        return $descricao;
    }

    public function getDownload($linksDownload, $nome_do_jogo = "") {
        $downloadLinks = "<h2><strong>Área de Download: </strong></h2><br><h2><strong>$nome_do_jogo: <a href='http://protetor.therevolution.com.br/news/$linksDownload' target='_blank'>Download</a></strong></h2>[/wptab]\n\n";
        return $downloadLinks;
    }

    public function getImagens($imagensNome) {
        $imagensCode = "[wptab name='Imagens']
		<img class='alignnone size-full' src='" . $this->verifica_imagem($imagensNome, 1) .
                "' alt='" . $this->nome_para_alt($imagensNome[1]) . "' width='590' height='306' /> <img class='alignnone size-full wp-image-9836' src='" . $this->verifica_imagem($imagensNome, 2) .
                "' " . $this->nome_para_alt($imagensNome[2]) . " width='590' height='306' /> <img class='alignnone size-full wp-image-9835' src='" . $this->verifica_imagem($imagensNome, 3) . "' alt='" . $this->nome_para_alt($imagensNome[3]) . "' width='590' height='334' />
		[/wptab]\n\n";

        return $imagensCode;
    }

    public function getScreenFilme(array $screens, $link_trailer) {
        $imagensCode = "[wptab name='Imagens']
		<img class='alignnone size-full' src='" . $this->verifica_imagem($screens, 1) .
                "' alt='" . $this->nome_para_alt($screens[1]) . "' width='590' height='306' /> <img class='alignnone size-full wp-image-9836' src='" . $this->verifica_imagem($screens, 2) .
                "' alt='" . $this->nome_para_alt($screens[2]) . "' width='590' height='306' /> <img class='alignnone size-full wp-image-9835' src='" . $this->verifica_imagem($screens, 3) . "' alt='" . $this->nome_para_alt($screens[3]) . "' width='590' height='334' />
		[/wptab]\n\n";
        if (!empty($link_trailer)) {
            $imagensCode .= "[wptab name='Trailer']\n" .
                    "[youtube $link_trailer&amp;w=480&amp;h=270]\n" .
                    "[/wptab]\n[end_wptabset]\n";
        } else {
            $imagensCode .= "\n[end_wptabset]\n";
        }
        return $imagensCode;
    }

    private function verifica_imagem(array $imagens, $posicao) {
        $indisponivel = "http://therevolution.com.br/wp-content/uploads/2016/09/naodisponivel.jpg";
        $disponivel = "http://therevolution.com.br/wp-content/uploads/2016/img/";
        if (!isset($imagens[$posicao]) || empty($imagens[$posicao])) {
            return $indisponivel;
        } else {
            return $disponivel . $imagens[$posicao] . ".png";
        }
    }

    public function getComoInstalar($link_trailer = "") {
        $installCode = "";
        if(!empty($link_trailer)){
            $installCode .= "[wptab name='Trailer']\n
            [embed]".$link_trailer."[/embed]\n[/wptab]";
        }
        $installCode .= "[wptab name='Como Instalar']\n" .
                "<strong>Como Instalar:</strong>\n" .
                "– Extraia os arquivos compactados com  WinRAR(Se tiver)\n" .
                "1.Monte o Arquivo .ISO Com Daemon Tools ou Virtual CloneDrive(Simula uma imagem de DVD/CD)\n" .
                "2.Execute setup.exe e instale o jogo\n" .
                "3.Copie o crack de dentro da .ISO(Imagem) para o diretório de instalação\n" .
                "4.Jogue!\n" .
                "5.Apoie as empresas e desenvolvedoras de jogos, Compre-os!\n" .
                "Bloqueie o jogo em seu firewall para o jogo não tentar ir online ..\n" .
                "Revolution está atualmente à procura de:\n" .
                "nada! além de concorrência\n" .
                "você está pronto para nos encarar?\n\n" .
                "<strong>Erros No Jogo? Veja aqui como corrigi-los.</strong>\n\n" .
                "Veja esse post aqui a baixo e corrija todos os erros que seu jogo tiver!\n\n" .
                "Antes de Comentar qualquer coisa por favor veja o post\n\n" .
                "<a href='http://therevolution.com.br/programas-necessarios-para-que-os-jogos-peguem-no-seu-pc/'>( Clique aqui para ver os possíveis erros e corrigi-los )</a>\n\n" . "Erros mais comuns: Tela preta, Travamento, 0xc000007b , Erros de DLL (svcr120.dll, msvcp110.dll, msvcp100.dll, msvcp120.dll, xinput1_3.dll e d3dx9_43.dll)\n
		&nbsp;\n[/wptab]";
        return $installCode;
    }

    public function getRequisitos($minimo, $recomendado) {
        $requisitosCode = "[wptab name='Requisitos de Sistema']\n" . strip_tags($minimo,"<br><strong>") .
                "\n\n" . strip_tags($recomendado,"<br><strong>") . "\n\n[/wptab][end_wptabset]";
        return $requisitosCode;
    }

    public function getRequisitosManual($requisitos) {
        $requisitosCode = "[wptab name='Requisitos de Sistema']" . strip_tags($requisitos,"<br><strong>") .
                "[/wptab][end_wptabset]";
        return $requisitosCode;
    }

    public static function getMetaDesc($nomeJogo) {
        $metaDescricao = "Baixar " . $nomeJogo .
                " Completo para PC(2017) + Atualização + Crack Jogo grátis Faça o Download Torrent FULL e sem erros Aproveitem";
        return $metaDescricao;
    }

    public function getMetaDescFilme($nome_do_filme) {
        return "Baixar Filme Download " . $nome_do_filme . " Dublado Em Português PT-BR + Legenda 1080p Dual Audio HDRip Assistir Filme Online.";
    }

    public static function getTags($nomeJogo) {
        $tagsCode = "Baixar Jogo " . $nomeJogo .
                " em Português PT-BR, Download Jogo " . $nomeJogo .
                " Em Completo em Português PT-BR, Baixar Tradução jogo " .
                $nomeJogo . " Em Português PT-BR, Traduzir Jogo " . $nomeJogo .
                " em PT-BR, Tradução " . $nomeJogo . " PT-BR, Download " .
                $nomeJogo . " Completo, Download " . $nomeJogo .
                " Completo Torrent, " . $nomeJogo . " patch atualizado, Baixar " .
                $nomeJogo . " Completo PC, Baixar " . $nomeJogo .
                " Completo Torrent, Download " . $nomeJogo .
                " Completo, Baixar " . $nomeJogo . " Com Crack, Download " .
                $nomeJogo . " full cracked, Como Baixar e Instalar " . $nomeJogo .
                " completo + crack, Download " . $nomeJogo .
                " PC Torrent Full, Baixar " . $nomeJogo .
                " Completo Sem Erros, " . $nomeJogo .
                " Download Completo Grátis, " . $nomeJogo . " Grátis, Download " .
                $nomeJogo . " Crackeado, How To Download " . $nomeJogo .
                " Full Cracked, Baixar " . $nomeJogo .
                " Completo Torrent, Piratinha, Download " . $nomeJogo .
                " PC Game Full, Jogo " . $nomeJogo .
                " Completo, Fazer Download " . $nomeJogo .
                " Completo PC, Baixar Grátis " . $nomeJogo .
                ", Como Baixar Grátis " . $nomeJogo . ", Baixar Atualização " .
                $nomeJogo . ", Update " . $nomeJogo . ", Baixar Atualizado " .
                $nomeJogo . ", Jogar " . $nomeJogo . ", Download " . $nomeJogo .
                " Free ";
        return $tagsCode;
    }

    public function getTagsFilme($nome_do_filme) {
        $tagsCode = "Assistir " . $nome_do_filme . "  Grátis, Baixar e Assistir " . $nome_do_filme . ", Baixar " . $nome_do_filme . " Legendado, Baixar " . $nome_do_filme . " Dublado Completo, Baixar " . $nome_do_filme . " Completo + Legenda, Baixar " . $nome_do_filme . " Completo Torrent, Baixar " . $nome_do_filme . " Legendado em Português PT-BR,Baixar " . $nome_do_filme . " Dublado Completo Torrent, Baixar " . $nome_do_filme . " Dublado em Português PT-BR, Baixar " . $nome_do_filme . " Servidor Mega, Download " . $nome_do_filme . " Dublado PT-BR, Assistir " . $nome_do_filme . " Online Dublado, Assistir " . $nome_do_filme . " + legenda, Assistir " . $nome_do_filme . " Dublado Grátis, Download " . $nome_do_filme . " 1080p Dublado, Baixar " . $nome_do_filme . " 1080p Legendado, Baixar " . $nome_do_filme . " 720p, Baixar " . $nome_do_filme . " Com legenda PT-BR, Baixar Grátis " . $nome_do_filme . " Legenda, Como Baixar " . $nome_do_filme . " completo + Legenda, Como Baixar Grátis " . $nome_do_filme . ", " . $nome_do_filme . ", " . $nome_do_filme . " Completo, " . $nome_do_filme . " Download Completo Grátis, Download " . $nome_do_filme . " + Legenda Português PT-BR, Download " . $nome_do_filme . " Completo, Download " . $nome_do_filme . " Free, Download " . $nome_do_filme . " full Legendado, Download " . $nome_do_filme . " PC Torrent Full, Download " . $nome_do_filme . " PT-BR, Download " . $nome_do_filme . " 720p Legenda, Download " . $nome_do_filme . " 720p Legendado PT-BR, Download " . $nome_do_filme . " 720p + Legenda, Fazer Download " . $nome_do_filme . " Completo, How To Download " . $nome_do_filme . " Full, piratinha, Assistir Legendado " . $nome_do_filme . ", Assistir Dublado " . $nome_do_filme . ", Baixar Grátis " . $nome_do_filme . ", Baixar " . $nome_do_filme . " Legenda, Baixar " . $nome_do_filme . " Legenda em Torrent, Download Legenda " . $nome_do_filme . "";
        return $tagsCode;
    }

    /* Code para posts Animes */

    public function getIntroducaoAnime($introducao) {
        return "<div>$introducao</div>\n";
    }

    public function getCapaAnime($imagemNome, $informacoes) {
        if (empty($informacoes)) {
            $informacoes = "";
        }
        $informacao = "<table style='height: 155px;' border='0' width='825'>\n" .
                "<tbody>\n" . "<tr>\n" .
                "<td><img class='alignnone size-full' alt='" . $this->nome_para_alt($imagemNome) . "' src='http://therevolution.com.br/wp-content/uploads/2016/img/" .
                $imagemNome . ".png' width='250' height='354' /></td>\n" .
                "<td>$informacoes</td>\n" . "</tr>\n" . "</tbody>\n" .
                "</table>\n\n\n";
        return $informacao;
    }

    public function getSinopse($sinopse) {
        $sin = "[wptab name='Sinopse']<strong>Sinopse:</strong>$sinopse\n\n[/wptab]";
        return $sin;
    }

    public function getScreens($imgNome1, $imgNome2, $imgNome3) {
        $screens = "[wptab name='Screens']<img class='alignnone size-full' alt='" . $this->nome_para_alt($imgNome1) . "' src='http://therevolution.com.br/wp-content/uploads/2016/img/" .
                $imgNome1 .
                ".png' width='590' height='338'/> 
                <img class='alignnone size-full' alt='" . $this->nome_para_alt($imgNome2) . "' src='http://therevolution.com.br/wp-content/uploads/2016/img/" .
                $imgNome2 .
                ".png' width='590' height='338'/> 
                <img class='alignnone size-full' alt='" . $this->nome_para_alt($imgNome3) . "' src='http://therevolution.com.br/wp-content/uploads/2016/img/" .
                $imgNome3 . ".png' width='590' height='338'/> [/wptab]";
        return $screens;
    }

    public function getYoutube($linkYoutube) {
        if (!empty($linkYoutube)) {
            return "[wptab name='Trailer']\n" .
                    "[youtube $linkYoutube&amp;w=480&amp;h=270]\n" .
                    "[/wptab]\n" . "[end_wptabset]\n" .
                    "<p style='text-align: center;'><strong>Download</strong></p>\n<hr />\n\n";
        } else {
            return "[end_wptabset]\n" .
                    "<p style='text-align: center;'><strong>Download</strong></p>\n<hr />\n\n";
        }
    }

    public function getDownAnimes($titulo, $servers, $imagensEp, $linksProtetor, $episodiosNome) {
        $div = "&nbsp;\n" . "<div id='pcpep'>\n" .
                "<div id='sagadbs'>\n$titulo\n";
        for ($i = 0; $i < count($linksProtetor[0]); $i ++) {
            $div .= "<div id='eps'>\n\n" . ($i + 1) . "\n<div id='jcdbz'>\n";
            $div .= "<img src='" . $this->verifica_imagem($imagensEp, $i) . "' /> ";
            $div .= isset($episodiosNome[$i]) ? $episodiosNome[$i] : "" . "\n";
            for ($index = 0; $index < count($servers); $index ++) {
                if (isset($linksProtetor[$index][$i]) &&
                        !empty($linksProtetor[$index][$i])) {
                    $div .= "<div id='txtdbz'><a href='http://protetor.therevolution.com.br/news/" .
                            $linksProtetor[$index][$i] .
                            "' target='_blank'><img class='downdgb'" .
                            " src='http://therevolution.com.br/wp-content/uploads/2016/09/" .
                            $servers[$index] . ".png' /></a></div>";
                }
            }
            $div .= "</div>\n</div>\n";
        }
        $div .= "&ampnbsp;\n</div>\n</div>";

        return $div;
    }

    public function getDownAnimesCodi($titulo, $serversNormal, $serversCodi, $imagensEp, $linksProtetor, $linksProtetorCodi, $episodiosNome) {
        $contador_de_episodios = 0;
        $div = "&nbsp;\n" . "<div id='pcpep'>\n" .
                "<div id='sagadbs'>\n$titulo\n";
        for ($i = 0; $i < count($linksProtetor[0]); $i ++) {
            $contador_de_episodios++;
            $div .= "<div id='eps'>\n\n" . ($i + 1) . "\n<div id='jcdbz'>\n";
            $div .= "<img src='" . $this->verifica_imagem($imagensEp, $i) . "' /> ";
            $div .= isset($episodiosNome[$i]) ? $episodiosNome[$i] : "" . "\n";
            for ($index = 0; $index < count($serversNormal); $index ++) {
                if (isset($linksProtetor[$index][$i]) &&
                        !empty($linksProtetor[$index][$i])) {
                    $div .= "<div id='txtdbz'><a href='http://protetor.therevolution.com.br/news/" .
                            $linksProtetor[$index][$i] .
                            "' target='_blank'><img class='downdgb'" .
                            " src='http://therevolution.com.br/wp-content/uploads/2016/09/" .
                            $serversNormal[$index] . ".png' /></a></div>";
                }
            }
            $div .= "</div>\n</div>\n";
        }
        if (isset($linksProtetorCodi[0])) {
            for ($i = 0; $i < count($linksProtetorCodi[0]); $i++) {
                $contador_de_episodios++;
                $div .= "<div id='eps'>\n\n" . $contador_de_episodios . "\n<div id='jcdbz'>\n";
                $div .= "<img src='" . $this->verifica_imagem($imagensEp, ($contador_de_episodios - 1)) . "' /> ";
                $div .= isset($episodiosNome[($contador_de_episodios - 1)]) ? $episodiosNome[($contador_de_episodios - 1)] : "" . "\n";
                for ($index = 0; $index < count($serversCodi); $index ++) {
                    if (isset($linksProtetorCodi[$index][$i]) &&
                            !empty($linksProtetorCodi[$index][$i])) {
                        $div .= "<div id='txtdbz'><a href='http://protetor.therevolution.com.br/news/" .
                                $linksProtetorCodi[$index][$i] .
                                "' target='_blank'><img class='downdgb'" .
                                " src='http://therevolution.com.br/wp-content/uploads/2016/09/" .
                                $serversCodi[$index] . ".png' /></a></div>";
                    }
                }
                $div .= "</div>\n</div>\n";
            }
        }
        $div .= "&ampnbsp;\n</div>\n</div>";

        return $div;
    }

    public function getDownAnimesManual($servers, $imagensEp, $linksProtetor, $episodiosNome, $epApartir) {
        $div = "";
        $epApartirDe = $epApartir;
        for ($i = 0; $i < count($linksProtetor[0]); $i ++) {
            $div .= "<div id='eps'>\n\n" . $epApartirDe . "\n<div id='jcdbz'>\n";
            $div .= "<img src='" . $this->verifica_imagem($imagensEp, $i) . "' /> ";
            $div .= isset($episodiosNome[$i]) ? $episodiosNome[$i] : "" . "\n";
            for ($index = 0; $index < count($servers); $index ++) {
                if (isset($linksProtetor[$index][$i]) &&
                        !empty($linksProtetor[$index][$i])) {
                    $div .= "<div id='txtdbz'><a href='http://protetor.therevolution.com.br/news/" .
                            $linksProtetor[$index][$i] .
                            "' target='_blank'><img class='downdgb'" .
                            " src='http://therevolution.com.br/wp-content/uploads/2016/09/" .
                            $servers[$index] . ".png' /></a></div>";
                }
            }
            $epApartirDe ++;
            $div .= "</div>\n</div>\n";
        }
        $div .= "&ampnbsp;\n</div>\n</div>";
        return $div;
    }

    public function getTagsAnimes($nomeAnime) {
        return "Assistir " . $nomeAnime . "  Grátis, Baixar e Assistir " . $nomeAnime .
                ", Baixar Episódio " . $nomeAnime . " , Baixar " . $nomeAnime .
                "  Completo, Baixar " . $nomeAnime . " Completo Sem Erros, Baixar " . $nomeAnime .
                " Completo Torrent, Baixar " . $nomeAnime .
                " Legendado em Português PT-BR,Baixar " . $nomeAnime .
                " Dublado Completo Torrent, Baixar " . $nomeAnime .
                " Dublado em Português PT-BR, Baixar " . $nomeAnime .
                " Servidor Mega, Download " . $nomeAnime . " Dublado PT-BR, Assistir " .
                $nomeAnime . " Online Dublado, Assistir " . $nomeAnime . " + legenda, Assistir " .
                $nomeAnime . " Dublado Grátis, Download " . $nomeAnime . " 1080p, Baixar " .
                $nomeAnime . " 1080p, Baixar " . $nomeAnime . " 720p, Baixar " . $nomeAnime .
                " Com legenda PT-BR, Baixar Grátis " . $nomeAnime . ", Como Baixar " .
                $nomeAnime . " completo + Legenda, Como Baixar Grátis " . $nomeAnime . ", " .
                $nomeAnime . ", " . $nomeAnime . " Completo, " . $nomeAnime .
                " Download Completo Grátis, Download " . $nomeAnime .
                " + Legenda Português PT-BR, Download " . $nomeAnime . " Completo, Download " .
                $nomeAnime . " Free, Download " . $nomeAnime . " full Legendado, Download " .
                $nomeAnime . " Torrent Legendado, Download " . $nomeAnime . " PT-BR, Download " .
                $nomeAnime . " 720p Legenda, Download " . $nomeAnime .
                " 720p Legendado PT-BR, Download " . $nomeAnime .
                " 720p + Legenda, Fazer Download " . $nomeAnime . " Completo, How To Download " .
                $nomeAnime . " Full, Assistir Legendado " . $nomeAnime . ", Assistir Dublado " .
                $nomeAnime . ", Baixar Grátis " . $nomeAnime . ", Baixar " . $nomeAnime .
                " Legenda, Baixar " . $nomeAnime . " Legenda em Torrent, Download Legenda " .
                $nomeAnime . ", Baixar Legenda " . $nomeAnime . ", Baixar Episódio " .
                $nomeAnime . " Legendado, " . $nomeAnime . ", " . $nomeAnime . " 1 Temporada, " .
                $nomeAnime . " Legendado 1080p, Baixar " . $nomeAnime . " Uptobox, " .
                $nomeAnime . ", Baixar " . $nomeAnime . " zippyshare, Baixar " . $nomeAnime .
                " file4go, Baixar " . $nomeAnime . " googledrive, Assistir Online " . $nomeAnime .
                ", Assistir " . $nomeAnime . " Online Legendado, " . $nomeAnime . " Online, " .
                $nomeAnime . " Assistir Grátis";
    }

    public function getTituloAnime($nomeAnime) {
        return "Download $nomeAnime Legendado Ep 1 até - HDTV";
    }

    public function getMetaAnime($nomeAnime) {
        return "Baixar Anime $nomeAnime Completo Legendado Em Português PT-BR HDTV Assistir Online Todos Episódios 720p e 1080p Grátis";
    }

    private function nome_para_alt($imagemNome) {
        if (!empty($imagemNome)) {
            $imagem_alt = strtolower(str_replace("-", " ", $imagemNome));
            return $imagem_alt;
        }
        return "";
    }

}
