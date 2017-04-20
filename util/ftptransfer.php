<?php

/**
 * Passe um Array com os nomes das imagens
 * @param $conn_id
 * @param $imagens
 */
function transferirFtpImg ($conn_id, $imagens)
{
    foreach ($imagens as $imagem) {
        if (! empty($imagem)) {
            $arquivoLocal = "../../img/" . $imagem . ".png";
            $arquivoRemoto = $imagem . ".png";
            if (! ftp_put($conn_id, $arquivoRemoto, $arquivoLocal, FTP_BINARY)) {
                throw new Exception("Não foi possivel enviar as imagens");
            }
        }
    }
}

function transferirFtpTorrent ($conn_id, $torrentNome)
{
    $arquivoLocal = "../../torrent/" . $torrentNome;
    $arquivoRemoto = $torrentNome;
    if (! ftp_put($conn_id, $arquivoRemoto, $arquivoLocal, FTP_BINARY)) {
        throw new Exception("Não foi possivel enviar o torrent");
    }
}
