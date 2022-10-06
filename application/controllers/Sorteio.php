<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sorteio extends MY_Controller {

    public function coin(){
        $this->header2();
        $this->load->view('restrito/ganhadores_em_tela.php');
        $this->footer2();
    }
    
    public function ganhadores_tela(){
        $this->load->database();
        $this->load->model('sorteios');
        
        $id = $this->uri->segment(2);
        $ganhadores = $this->sorteios->ganhadores($id);
        
        $new = [];
        $i = 0;
        foreach($ganhadores as $gan){
            $aux = (int)strlen($gan['telefone_ganhador']) - 4;
            $gan['telefone'] = substr($gan['telefone_ganhador'], $aux);
            $resultado = $this->sorteios->verificaganhador('sorteio_'.$id, $gan['numero_sorteado']);
            
            $gan['cidade'] = $this->sorteios->getcep($resultado['cep']);
            
            $new[$i] = $gan;
            $i++;
        }
        
        $data['ganhadores'] = $new;
        
        $this->header2();
        $this->load->view('restrito/ganhadores_em_tela.php', $data);
        $this->footer2();
    }

	/**
	 * 
	 */
	function stringrandom(){
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $aux= "";
        for($count= 0;  $count < 10; $count++){
            //Gera um caracter aleatorio
            $aux.= $basic[rand(0, strlen($basic) - 1)];
        }
        return $aux;
    }
	 
	function linksorteio(){
	     
	     $p1 = $this->stringrandom();
	     $sorteio = $this->input->post('id');
	     $p2 = $this->stringrandom();
	     
	     $link = "sorteio/".$p1."PaS".$sorteio."TeL".$p2;
	     echo $link;
	 }
	 
	
	
	public function cadastro(){
        $this->load->database();
        $this->load->model('sorteios');
        $premios = "";
        $qtdpremios = $this->input->post('qtepremio');
        for($i=1;$i<=$qtdpremios; $i++){
            $premios .= $this->input->post('premio'.$i);
            if($i < $qtdpremios ){
                $premios .= "|";
            }elseif($i == $qtdpremios ){
                $premios .= "|99";
            }
        }
        
        $pdf_sorteio                = $this->do_uploadPDF();
        $dados = array ( 
            'tabela'                => "nula",
            'premio'                => $premios,
            'dateinicial'           => $this->input->post('dateinicial'),
            'datefinal'             => $this->input->post('datefinal'),
            'numeros'               => $this->input->post('numeros'),
            'pdf_sorteio'           => 'uploadPDF/'.$pdf_sorteio,
            'premioativo'           => 0,
            'valor'                 => $this->input->post('valor'),
            'quantidade'            => $qtdpremios,
            'premios_sorteados'     => 0,
            'nome_sorteio'          => $this->input->post('nomesorteio'),
            'gestor_pgt'            => $this->input->post('gestor'),
            'qtd_compras_cpf'       => $this->input->post('comprasCPF'),
        );
        
        $id = $this->sorteios->criarsorteio($dados);
        $this->sorteios->novosorteio($id);

        $dados['bannerquadrado']    = $this->do_upload('anuncio', 'bannerquadrado'.$id);
        $dados['imgpremio']         = $this->do_upload('imgpremio', 'imgpremio'.$id);
        $dados['toposorteio']       = $this->do_upload('banner_sorteio', 'toposorteio'.$id);
        $dados['bannerhome']        = $this->do_upload('banner_home', 'bannerhome'.$id);
        $dados['banner_resultado']  = $this->do_upload('banner_resultado', 'bannerresultado'.$id);
        $dados['tabela']            = "sorteio_".$id;
        $this->sorteios->editaSorteio($dados, $id);
        
        for($i = 1; $i <= $qtdpremios; $i++){
            $new = array(
                    'premio'        => $this->input->post('premio'.$i),
                    'sorteio_id'    => $id,
                    'ativo'         => 0
                );
            $p_id = $this->sorteios->inserePremio($new);
        }
        
        $this->session->set_userdata('alert', 4);
        
        redirect(base_url('ba38f5d73f05be599d0f0853daccdda1'));
	    
	}
	
	function do_upload($name, $nemname){
        $config = array(
            'upload_path'   => './imagens/sorteios',
            'allowed_types' => '*',
            'max_size'      => 5000,
            'file_name'     => $nemname,
            );
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload($name)){
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }else{
            $data = array('upload_data' => $this->upload->data());
            return $config['upload_path']."/".$data['upload_data']['file_name'];
        }
    }

    function do_uploadPDF(){
        $config['upload_path']          = 'uploadPDF/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('regulamento'))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }
	
	function do_uploadAnuncio(){
        $config['upload_path']          = 'imagens/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 5000;
        $config['file_name']            = date('d-m-Y_H:m:s');
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('anuncio'))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }
	
	function popula($num, $idsorteio){
	    for($aux=0; $aux < $num; $aux++){
	        $popula = array(
	            'premioid' => $idsorteio,
	            'nomecompleto'  => null,
	            'telefone' => null,
	            'whatsapp' => null,
	            'cep' => null,
	            'cidade_id' => null,
	            'estado_id' => null,
	            'bairro' => null,
	            'endereco' => null,
	            'email' => null,
	            'cpf' => null,
	            'reserva' => 0,
	            'ativo' => 0,
	            );
	        
	        $this->sorteios->populasorteio('sorteio_'.$idsorteio, $popula);
	   }
	}

    public function controlaResortear(){
        $this->session->set_userdata('resortear', $this->uri->segment(2));
        redirect(base_url('8bf6e58f514ef62506ca5db302bda6b8'));
    }

    public function realizasorteio($sorteio = null, $sucesso = null){
        $this->load->database();
	    $this->load->model('sorteios');
	    
	    $re = null;
	    if($this->session->userdata('resortear')){
	        $re = $this->session->userdata('resortear');
	        $this->session->unset_userdata('resortear');
	    }
	    
	    $data['premios'] = $this->sorteios->pegasorteios();
        $data['sorteio'] = $sorteio;
        $data['sucesso'] = $sucesso;
        $data['resortear'] = $re;
        $data['premiosGeral'] = $this->sorteios->getPremios();

		$this->header(2);
		$this->load->view('restrito/realizasorteio', $data);
		$this->footer();
    }
    
    public function realizasorteio2($sorteio = null, $sucesso = null){
        $this->load->database();
	    $this->load->model('sorteios');
	    
	    $re = null;
	    if($this->session->userdata('resortear')){
	        $re = $this->session->userdata('resortear');
	        $this->session->unset_userdata('resortear');
	    }
	    $data = array(
	            'id'        => null,
        	    'final'     => null, 
        	    'inicial'   => null,
        	    'total'     => null,
        	    'totalT'    => null,
                'premios2'  => null, 
                'sucesso'   => null,
                'sorteio'   => null,
                'resortear' => null,
                'img'       => null,
                );
        
        $data['premios'] = $this->sorteios->pegasorteios();
                
	    if($this->uri->segment(2)){
	        $sorteio = $this->sorteios->getSorteio($this->uri->segment(2));
	        $aux = $this->sorteios->getPremioSorteio($this->uri->segment(2));
	        $newpremio = $this->sorteios->getPremioId($this->uri->segment(2));
    	    $data['id'] = $this->uri->segment(2);
            $data['total']      = $this->sorteios->participantesTotal($this->uri->segment(2));
            $data['totalT']     = $this->sorteios->titulosTotal($this->uri->segment(2));
            $data['premios2']   = $newpremio;
            $data['sucesso']    = $sucesso;
            $data['sorteio']    = $sorteio;
            $data['img']        = $aux['imgpremio'];
            $data['titulo']     = $sorteio['nome_sorteio'];
	    }

		$this->header(2);
		$this->load->view('restrito/realizasorteio2', $data);
		$this->footer();
    }
    
    public function sorteando(){
        $this->load->database();
	    $this->load->model('sorteios');
        
        $aux = $this->input->post('sorteios');
        $premio = $this->input->post('premios2');
        $helper = $this->sorteios->resgatasorteio($aux);
        $nums = $this->sorteios->getNumsAtivos($aux);
        
        do{
            $rand = array_rand($nums);
            $resultado = $this->sorteios->verificaganhador('sorteio_'.$aux, $nums[$rand]['idnumero']);
            $verifica = $this->sorteios->verificaDuplicidade($aux, $resultado['cpf']);
        }while($verifica != "");
        
        /*do{
            $sorteio = rand(1, $helper['numeros']);
            $resultado = $this->sorteios->verificaganhador('sorteio_'.$aux, $sorteio);
        }while($resultado == null);*/
        
        $p_aux = $this->sorteios->resgataPremioId($premio);
        
        $novo = array(
                'id_premio'     => $premio,
                'premio'        => $p_aux['premio'],
                'sorteio_id'    => $p_aux['sorteio_id'],
                'ativo'         => 1,
            );
        
        $return = $this->sorteios->atualizaPremio($novo);
        
        $ganhador = array(
                'sorteio_id'        => $aux,
                'premio_sorteio'    => $novo['premio'],
                'cpf_ganhador'      => $resultado['cpf'],
                'nome_ganhador'     => $resultado['nomecompleto'],
                'telefone_ganhador' => $resultado['telefone'],
                'numero_sorteado'   => $nums[$rand]['idnumero'],
            );
            
        $helper['premios_sorteados'] = $helper['premios_sorteados'] + 1;
        $this->sorteios->atualizasorteio($helper);
        
        if($helper['premios_sorteados'] == $helper['quantidade']){
            $helper['premioativo'] = 1;
            $this->sorteios->atualizasorteio($helper);
        }
        
        $return = $this->sorteios->insereGanhador($ganhador);
        
        $sucesso = 1;
        $this->telaGanhador($resultado, $ganhador, $novo, $helper);
    }
    
    public function cancelarSorteio(){
        $this->load->database();
        $this->load->model('sorteios');
        
        $id = $this->input->post('idsorteio2');
        $helper = $this->sorteios->resgatasorteio($id);
        
        $sorteiorealizado = array(
            'idpremio'          => $id,
	        'premio'            => $helper['premio'],
	        'dateinicial'       => $helper['dateinicial'],
	        'datefinal'         => $helper['datefinal'],
	        'numeros'           => $helper['numeros'],
    	    'imgpremio'         => $helper['imgpremio'],
	        'premioativo'       => '2',
	        'valor'             => $helper['valor'],
	        'texto'             => $helper['texto'],
	        'quantidade'        => $helper['quantidade'],
	        'premios_sorteados' => 0,
	        'nome_sorteio'      => $helper['nome_sorteio'],
	        'anuncio_sorteio'   => $helper['anuncio_sorteio'],
	        'link_1'            => $helper['link_1'],
	        'link_2'            => $helper['link_2'],
	        'link_3'            => $helper['link_3'],
	        'link_4'            => $helper['link_4'],
	        'link_5'            => $helper['link_5'],
	        'link_6'            => $helper['link_6'],
	        'credito'           => $helper['credito'],
	        'debito'            => $helper['debito'],
	        'picpay'            => $helper['picpay'],
	        'mercado_pago'      => $helper['mercado_pago'],
        );
        
        $this->sorteios->atualizasorteio($sorteiorealizado);
        
        $this->session->set_userdata('alert', 2);
        redirect(base_url('ba38f5d73f05be599d0f0853daccdda1'));
    }
    
    public function editarSorteio(){
        $this->load->database();
        $this->load->model('sorteios');

        $id = $this->uri->segment(2);
        $data = array(
                'sorteio'   => $this->sorteios->resgatasorteio($id),
                'premios'   => $this->sorteios->getPremioId($id),
            );

        $this->header(2);
        $this->load->view('restrito/editaSorteio', $data);
        $this->footer();
    }
    
    public function atualizarSorteio(){
        $this->load->database();
        $this->load->model('configs');
        $this->load->model('sorteios');
        $this->load->model('logger');
        
        $id = $this->input->post('id');
        $helper = $this->sorteios->resgatasorteio($id);
        
        $qtd = (int)$this->input->post('qtepremio');
        $premios = $this->input->post('premio1');
        if($qtd > 1){
            for($i = 2; $i <= $qtd; $i++){
                $premios = $premios . "|" . $this->input->post('premio' . $i);
            }
        }
        $premios = $premios . '|' . "99";
        
        if(!empty($_FILES['anuncio']['name'])){
            $bannerquadrado = "ImgSorteios/".$this->do_upload('anuncio', 'bannerquadrado'.$id);
        }else{
            $bannerquadrado = $helper['bannerquadrado'];
        }
        
        if(!empty($_FILES['imgpremio']['name'])){
            $imgpremio = "ImgSorteios/".$this->do_upload('imgpremio', 'imgpremio'.$id);
        }else{
            $imgpremio = $helper['imgpremio'];
        }
        
        if(!empty($_FILES['banner_sorteio']['name'])){
            $toposorteio = "ImgSorteios/".$this->do_upload('banner_sorteio', 'toposorteio'.$id);
        }else{
            $toposorteio = $helper['toposorteio'];
        }
        
        if(!empty($_FILES['banner_home']['name'])){
            $bannerhome = "ImgSorteios/".$this->do_upload('banner_home', 'bannerhome'.$id);
        }else{
            $bannerhome = $helper['bannerhome'];
        }
        
        if(!empty($_FILES['banner_resultado']['name'])){
            $bannerresultado = "ImgSorteios/".$this->do_upload('banner_resultado', 'bannerresultado'.$id);
        }else{
            $bannerresultado = $helper['banner_resultado'];
        }
        
        if(!empty($_FILES['regulamento']['name'])){
            $pdf_sorteio = 'uploadPDF/'.$this->do_uploadPDF();
        }else{
            $pdf_sorteio = $helper['pdf_sorteio'];
        }
        
        $dados = array ( 
            'tabela'                => $helper['tabela'],
            'premio'                => $premios,
            'dateinicial'           => $this->input->post('dateinicial'),
            'datefinal'             => $this->input->post('datefinal'),
            'numeros'               => $this->input->post('numeros'),
            'bannerquadrado'        => $bannerquadrado,
            'imgpremio'             => $imgpremio,
            'toposorteio'           => $toposorteio,
            'bannerhome'            => $bannerhome,
            'banner_resultado'      => $bannerresultado,
            'pdf_sorteio'           => $pdf_sorteio,
            'premioativo'           => $helper['premioativo'],
            'valor'                 => str_replace(',', '.', $this->input->post('valor')),
            'quantidade'            => $qtd,
            'premios_sorteados'     => $helper['premios_sorteados'],
            'nome_sorteio'          => $this->input->post('nomesorteio'),
            'qtd_compras_cpf'       => $this->input->post('comprasCPF'),
            'gestor_pgt'            => $this->input->post('gestor'),
        );
        
        $this->sorteios->editaSorteio($dados, $id);
        
        $ids_premios = $this->input->post('ids_premios');
        $ip = explode('|', $ids_premios);
        for($i = 1; $i <= $qtd; $i++){
            $old = $this->sorteios->resgataPremioId($ip[$i]);
            $new = array(
                    'id_premio'     => $ip[$i],
                    'premio'        => $this->input->post('premio'.$i),
                    'sorteio_id'    => $id,
                    'ativo'         => $old['ativo'],
                );
                
            $this->sorteios->atualizaPremio($new);
        }
        
        $this->session->set_userdata('alert', 5);
        
        redirect(base_url('6479bbc5c0b3fbf7bf50b49ed13a797a/2'));
    }
    
    public function atualizarSorteioOLD(){
        $this->load->database();
        $this->load->model('configs');
        $this->load->model('sorteios');
        $this->load->model('logger');
        
        $id = $this->input->post('idpremio');
        
        $helper = $this->sorteios->resgatasorteio($id);
        
        $qtd = $this->input->post('qtepremio');
	    $premios = $this->input->post('premio1');
	    
	    for($j = 2; $j <= $qtd; $j++){
	        $premios = $premios . "|" . $this->input->post('premio' . $j);
	    }
	    $premios = $premios . '|' . "99";
	    
	    if(empty($_FILES['imgpremio']['name'][0])){
	        $imgpremio = $helper['imgpremio'];
	    }else{
	        $count = count($_FILES['imgpremio']['name']);
    
            for($i = 0; $i < $count; $i++){
        
                if(!empty($_FILES['imgpremio']['name'][$i])){
        
                    $_FILES['file']['name'] = $_FILES['imgpremio']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['imgpremio']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['imgpremio']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['imgpremio']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['imgpremio']['size'][$i];
      
                    $config['upload_path'] = 'imagens/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '5000';
                    $config['file_name'] = date('d-m-Y_H:m:s') . $_FILES['imgpremio']['name'][$i];
       
                    $this->load->library('upload',$config); 
        
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
       
                        $totalFiles[] = $filename;
                    }
                }
            }
    	    
    	    $qtdImg = count($totalFiles);
    	    $strImg = "";
    	    for($k = 0; $k < $qtdImg; $k++){
    	        $strImg = $strImg . 'imagens/' . $totalFiles[$k] . "|";
    	    }
    	    $imgpremio = $strImg . "99";
	    }
        
        if(empty($_FILES['anuncio']['name'])){
            $filenameAnuncio = $helper['anuncio_sorteio'];
        }else{
            $filenameAnuncio = 'imagens/' . $this->do_uploadAnuncio($_FILES['anuncio']);
        }
        
	    if(empty($_FILES['regulamento']['name'])){
	        $pdf = $helper['pdf_sorteio'];
	    }else{
	        $pdf = $this->uploadFile('uploadPDF', 'regulamento', $_FILES['regulamento']);
	    }
	    
	    if(!empty($this->input->post('credito'))){$cred = 1;}else{$cred = 0;}
        if(!empty($this->input->post('debito'))){$deb = 1;}else{$deb = 0;}
        if(!empty($this->input->post('picpay'))){$pic = 1;}else{$pic = 0;}
        if(!empty($this->input->post('mercado'))){$mer = 1;}else{$mer = 0;}

        $valor = str_replace(',', '.', str_replace('.', '', $this->input->post('valor')));
        if($valor != $helper['valor']){
            date_default_timezone_set('America/Sao_Paulo');
            
            $log = array(
                    'log_id_user'       => $this->session->userdata('user_id'),
                    'log_nome_user'     => $this->session->userdata('nome'),
                    'log_id_sorteio'    => $id,
                    'log_valor_old'     => $helper['valor'],
                    'log_valor_new'     => $valor,
                    'log_data'          => date('d/m/Y'),
                    'log_hora'          => date('H:i:s'),
                );
                
            $this->logger->logedicaovalor($log);
        }

        $sorteio = array(
                'idpremio'          => $id,
                'premio'            => $premios,
                'dateinicial'       => $this->input->post('dateinicial'),
                'datefinal'         => $this->input->post('datefinal'),
                'numeros'           => $helper['numeros'],
                'imgpremio'         => $imgpremio,
                'premioativo'       => 0,
                'valor'             => $valor,
                'texto'             => $this->input->post('txt'),
                'quantidade'        => $this->input->post('qtepremio'),
                'premios_sorteados' => 0,
                'nome_sorteio'      => $this->input->post('nomesorteio'),
	            'anuncio_sorteio'   => $filenameAnuncio,
	            'pdf_sorteio'       => $pdf,
	            'venda_manual'      => $helper['venda_manual'],
	            'link_1'            => $this->input->post('link1'),
    	        'link_2'            => $this->input->post('link2'),
    	        'link_3'            => $this->input->post('link3'),
    	        'link_4'            => $this->input->post('link4'),
    	        'link_5'            => $this->input->post('link5'),
    	        'link_6'            => $this->input->post('link6'),
    	        'escolhe_numeros'   => $helper['escolhe_numeros'],
    	        'credito'           => $cred,
    	        'debito'            => $deb,
    	        'picpay'            => $pic,
    	        'mercado_pago'      => $mer,
            );
            
        $this->sorteios->atualizasorteio($sorteio);
        $this->sorteios->deletaPremios($id);
        
        $ex = explode("|", $premios);
	    $cont = count($ex);
	    for($i = 0; $i < $cont; $i++){
	        if($ex[$i] != "99"){
	            $p_aux = array(
	                'premio'        => $ex[$i],
	                'sorteio_id'    => $id,
	                'ativo'         => 0,
	            );
	            
	            $idp = $this->sorteios->inserePremio($p_aux);
	        }
	    }
        
        $configHelper = $this->configs->getConfigSorteio($id);
        
        if(empty($_FILES['banner']['name'])){
	        $filename2 = $configHelper['banner'];
	    }else{
            $filename2 = 'imagens/' . $this->do_upload3($_FILES['banner']);
	    }
	    $sub1 = $this->input->post('sub1');
	    $tit1 = $this->input->post('tit1');
	    $sub2 = $this->input->post('sub2');
	    $tit2 = $this->input->post('tit2');
	    
	    $config = array(
	            'sorteioid'     => $id,
                'banner'        => $filename2,
                'subtitulo1'    => $sub1,
                'titulo1'       => $tit1,
                'subtitulo2'    => $sub2,
                'titulo2'       => $tit2,
            );
            
        $idconfig = $this->configs->atualizaConfigId($config, $id);
        
        redirect(base_url('ba38f5d73f05be599d0f0853daccdda1/2'));
    }
    
    function do_upload3(){
        $config['upload_path']          = 'imagens/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 5000;
        $config['file_name']            = date('d-m-Y_H:m:s');
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('banner'))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }
    
    public function verTodos(){
        $this->load->database();
        $this->load->model('sorteios');
        $this->load->model('estado');
        
        $id = $this->uri->segment(2);
        $data['sorteio'] = $this->sorteios->resgataSorteio($id);
        $data['premios'] = $this->sorteios->getPremioId($id);
        $data['bilhetes'] = $this->sorteios->getNumerosPreenchidos($id);
        $data['estados'] = $this->estado->getAll();
        $data['cidades'] = $this->estado->getAllCidade();
        $data['ganhadores'] = $this->sorteios->ganhadores($id);
        
        $this->header2();
        $this->load->view('restrito/verTodos', $data);
        $this->footer2();
    }
    
    function uploadFile($patch, $file){
        $config['upload_path']          = $patch;
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($file))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }
    
    public function reabrirSorteio(){
        $this->load->database();
        $this->load->model('sorteios');
        $this->load->model('logger');
        
        $id = $this->input->post('idsorteio');
        
        $sort['premioativo'] = 0;
        $sort['premios_sorteados'] = 0;
        $this->sorteios->editaSorteio($sort, $id);
        
        $premios = $this->sorteios->getPremioId($id);
        foreach($premios as $pr){
            $pr['ativo'] = 0;
            $this->sorteios->atualizaPremio($pr);
        }
        
        date_default_timezone_set('America/Sao_Paulo');
        $log = array(
                'usuario_id'    => $this->session->userdata('user_id'),
                'nome_usuario'  => $this->session->userdata('nome'),
                'data_hora'     => date('d/m/Y H:i:s'),
                'sorteio_id'    => $id,
            );
        $this->logger->addLogReabertura($log);
        $ganhadores = $this->sorteios->ganhadores($id);
        foreach($ganhadores as $gan){
            $aux = array(
                    'sorteio_id'        => $gan['sorteio_id'],
                    'premio_sorteio'    => $gan['premio_sorteio'],
                    'cpf_ganhador'      => $gan['cpf_ganhador'],
                    'nome_ganhador'     => $gan['nome_ganhador'],
                    'telefone_ganhador' => $gan['telefone_ganhador'],
                    'numero_sorteado'   => $gan['numero_sorteado'],
                );
            $this->sorteios->insereBackupGanhador($aux);
        }
        $this->sorteios->deletaGanhadoresSort($id);
        
        $this->session->set_userdata('alert', 1);
        
        redirect(base_url('ba38f5d73f05be599d0f0853daccdda1'));
    }
    
    public function verSenha(){
        $this->load->database();
        $this->load->model('usuarios');
        
        $senha = MD5($this->input->post('senha'));
        
        $user = $this->usuarios->usuarioId($this->session->userdata('user_id'));
        
        if($senha == $user['senha_usuario']){
            $ver = 1;
        }else{
            $ver = 0;
        }
        
        echo $ver;
    }
    
    public function encerrarSorteio(){
        $this->load->database();
        $this->load->model('sorteios');
        
        $id = $this->input->post('idsorteio3');
        
        $sort['premioativo'] = 1;
        $this->sorteios->editaSorteio($sort, $id);
        
        $this->session->set_userdata('alert', 3);
        
        redirect(base_url('ba38f5d73f05be599d0f0853daccdda1'));
    }
    
    public function sorteando2($premio = null){
        $this->load->database();
	    $this->load->model('sorteios');
	    $this->load->model('crudparticipantes');
	    
        if($premio == null){
            $aux = $this->uri->segment(2);
            $premio = $this->input->post('premios2');
        }else{
            $aux = $this->sorteios->sorteioIdviaPremio($premio);
        }
        
        $helper = $this->sorteios->resgatasorteio($aux);
        $nums = $this->sorteios->getNumsAtivos($aux);
        
        do{
            $rand = array_rand($nums);
            $resultado = $this->sorteios->verificaganhador('sorteio_'.$aux, $nums[$rand]['idnumero']);
            $verifica = $this->sorteios->verificaDuplicidade($aux, $resultado['cpf']);
        }while($verifica != "");
        
        $p_aux = $this->sorteios->resgataPremioId($premio);
        
        $novo = array(
                'id_premio'     => $premio,
                'premio'        => $p_aux['premio'],
                'sorteio_id'    => $p_aux['sorteio_id'],
                'ativo'         => 1,
            );
        
        $return = $this->sorteios->atualizaPremio($novo);
        $cep    = $this->crudparticipantes->getCEP($resultado['cep']);
        
        $cidade_uf = explode('/', $cep['cep_cidadeuf']);
        
        $ganhador = array(
                'sorteio_id'        => $aux,
                'premio_sorteio'    => $novo['premio'],
                'cpf_ganhador'      => $resultado['cpf'],
                'nome_ganhador'     => $resultado['nomecompleto'],
                'telefone_ganhador' => $resultado['telefone'],
                'numero_sorteado'   => $nums[$rand]['idnumero'],
                'cidade_ganhador'   => $cidade_uf[0],
                'estado_ganhador'   => $cidade_uf[1],
                'cep_ganhador'      => $resultado['cep'],
            );
            
        $helper['premios_sorteados'] = $helper['premios_sorteados'] + 1;
        $this->sorteios->atualizasorteio($helper);
        
        if($helper['premios_sorteados'] == $helper['quantidade']){
            $helper['premioativo'] = 1;
            $this->sorteios->atualizasorteio($helper);
        }
        
        $return = $this->sorteios->insereGanhador($ganhador);
        
        $sucesso = 1;
        $this->telaGanhador2($resultado, $ganhador, $novo, $helper, $cep);
    }
    
    public function sorteando2A($sorteio = null){
        $this->load->database();
	    $this->load->model('sorteios');
	    $this->load->model('crudparticipantes');
	    
	    $premio = $this->sorteios->getSorteioPremio($sorteio);
        
        $helper = $this->sorteios->resgatasorteio($sorteio);
        $nums = $this->sorteios->getNumsAtivos($sorteio);
        
        do{
            $rand = array_rand($nums);
            $resultado = $this->sorteios->verificaganhador('sorteio_'.$sorteio, $nums[$rand]['idnumero']);
            $verifica = $this->sorteios->verificaDuplicidade($sorteio, $resultado['cpf']);
        }while($verifica != "");
        
        $novo = array(
                'id_premio'     => $premio['id_premio'],
                'premio'        => $premio['premio'],
                'sorteio_id'    => $premio['sorteio_id'],
                'ativo'         => 1,
            );
        
        $return = $this->sorteios->atualizaPremio($novo);
        $cep    = $this->crudparticipantes->getCEP($resultado['cep']);
        
        $cidade_uf = explode('/', $cep['cep_cidadeuf']);
        
        $ganhador = array(
                'sorteio_id'        => $premio['sorteio_id'],
                'premio_sorteio'    => $novo['premio'],
                'cpf_ganhador'      => $resultado['cpf'],
                'nome_ganhador'     => $resultado['nomecompleto'],
                'telefone_ganhador' => $resultado['telefone'],
                'numero_sorteado'   => $nums[$rand]['idnumero'],
                'cidade_ganhador'   => $cidade_uf[0],
                'estado_ganhador'   => $cidade_uf[1],
                'cep_ganhador'      => $resultado['cep'],
            );
            
        $helper['premios_sorteados'] = $helper['premios_sorteados'] + 1;
        $this->sorteios->atualizasorteio($helper);
        
        if($helper['premios_sorteados'] == $helper['quantidade']){
            $helper['premioativo'] = 1;
            $this->sorteios->atualizasorteio($helper);
        }
        
        $return = $this->sorteios->insereGanhador($ganhador);
        
        $sucesso = 1;
        $this->telaGanhador2($resultado, $ganhador, $novo, $helper, $cep);
    }
    
    public function telaGanhador2($resultado, $ganhador, $novo, $helper, $cep){
        $this->load->database();
        $this->load->model('sorteios');
        
        $restantes = 0;
        if((int)$helper['premios_sorteados'] < (int)$helper['quantidade']){
            $restantes = (int)$helper['quantidade'] - (int)$helper['premios_sorteados'];
        }
        
        $aux = (int)strlen($ganhador['telefone_ganhador']) - 4;
        $ganhador['telefone'] = substr($ganhador['telefone_ganhador'], $aux);
        $ganhador['cpf'] = substr($ganhador['cpf_ganhador'], 0, 3);
        
        $data['resultado'] = $resultado;
        $data['ganhador'] = $ganhador;
        $data['novo'] = $novo;
        $data['helper'] = $helper;
        $data['restantes'] = $restantes;
        $data['premios'] = $this->sorteios->getPremioIdAtivo($novo['sorteio_id']);
        //$data['cidade'] = "São Paulo - SP";
        $data['cidade'] = $cep;
        
        $this->header2();
        $this->load->view('restrito/coin', $data);
        $this->footer2();
    }
    
}
