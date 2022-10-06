<div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
    <div class="col-md-12">
        <div class="c-card-body">
            <?php if($clientes == null) { ?>
	        <div class="col-md-12 text-center">
	            <p>Nenhum cliente encontrado!</p>
	        </div>
	        <?php }else{ ?>
            <div class="" style="width: 100%">
                <table class="table c-table" id="clientes-list">
			        <thead>
			            <tr>
			                <th class="text-secondary">Nome</th>
			                <th class="text-secondary">CPF</th>
			                <th class="text-secondary">Cidade</th>
			                <th class="text-secondary">E-mail</th>
			                <th class="text-secondary">Telefone</th>
			                <th class="text-secondary">Situação</th>
			                <th class="text-center text-secondary" style="width:10%">Ações</th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php foreach($clientesOld as $c){ ?>
				            <tr class="tr-check">
				                <td><?php echo ucwords(mb_strtolower($c['clt_nome'])) ?></td>
				                <td class="cpf"><?php echo $c['clt_cpf'] ?></td>
				                <td>
				                    <?php if($c['clt_city'] != null){ ?>
				                        <?php echo ucwords(mb_strtolower($c['clt_city'])) ?>    
				                    <?php } else { ?>
				                        Não Cadastrado
				                    <?php } ?>
				                </td>
				                <td>
				                    <?php if($c['clt_mail'] != null){ ?>
				                        <?php echo mb_strtolower($c['clt_mail']) ?>
				                    <?php } else { ?>
				                        Não Cadastrado
				                    <?php } ?>
				                </td>
				                <td>
				                    <?php if($c['clt_cel'] != null){ ?>
				                        <span class="telefone"><?php echo $c['clt_cel'] ?></span>
				                    <?php } else { ?>
				                        Não Cadastrado
				                    <?php } ?>
				                </td>
				                <td>
				                    <?php if($c['clt_ativo'] == 1) { ?>
				                        Ativo
				                    <?php } else { ?>
				                        Bloqueado
				                    <?php } ?>
				                </td>
				                <td style="color: #1b9045; font-size: 22px!important" class="text-center">
				                    <a style="color: #1b9045;" href="<?php echo base_url('50d849c4ab008a40ab39cdaf352f35f5/' . $c['clt_fingerprint']) ?>"><i class="fa fa-eye text-secondary" aria-hidden="true"></i></a>
				                    <a style="color: #1b9045;" href="<?php echo base_url('admin/adminclientes/editarcliente/' . $c['clt_fingerprint']) ?>"><i class="fa fa-pencil text-secondary" aria-hidden="true"></i></a>
				                    <?php if($c['clt_ativo'] == 1) { ?>
				                        <i onclick="bloquear(<?php echo $c['clt_id'] ?>)" data-toggle="modal" data-target="#bloquearModal" class="fa fa-ban text-secondary" aria-hidden="true"></i>
				                    <?php } else { ?>
				                        <i onclick="desbloquear(<?php echo $c['clt_id'] ?>)" data-toggle="modal" data-target="#desbloquearModal" class="fa fa-check-circle-o text-secondary" aria-hidden="true"></i>
				                    <?php } ?>
                                    <a type="button" class="deleteCliente" style="color: #1b9045;" data-id="<?php echo $c['clt_fingerprint']; ?>"><i class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
				                    <a style="color: #1b9045;" href="<?php echo base_url('admin/adminclientes/excluircliente/' . $c['clt_id']) ?>"><i class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
				                </td>
				            </tr>
			            <?php } ?>
			        </tbody>
		        </table>
		    </div>
		    <?php } ?>
	    </div>
	    <div class="row">
            <div class="col-md-12 text-center">
                <p class="pagination-links"><?php echo $links; ?></p>
            </div>
        </div>
    </div>
</div>