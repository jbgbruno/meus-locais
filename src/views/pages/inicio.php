<?php $render('header'); ?>


<div class="container">
  <header>
    <div class="row my-5">
      <h1 class="">Meus Lugares</h1>

    </div>

  </header>
  <section>
    <div class="row my-5">
      <a class="btn btn-primary" href="<?= $base ?>/cadastrar">Criar Novo Local</a>
    </div>
  </section>
  <section>
    <div class="row my-5">
      <table class="table table-bordered ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nome</th>
            <th scope="col" class="text-center">Data</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($locais)) :
            foreach ($locais as $local) :
          ?>
              <tr class="<?= $local['uf'] == 'MG' ? 'localDestacado' : ''; ?>">
                <td scope="row"><?= $local['nome'] ?></td>
                <td scope="row" class="text-center"><?= date('d/m/Y', strtotime($local['data'])) ?></td>
                <td class="text-center">
                  <a href="<?= $base ?>/editar/<?= $local['id'] ?>" class="btn btn-info">Editar</a>
                  <a href="<?= $base ?>/deletar/<?= $local['id'] ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir')">Excluir</a>
                </td>
              </tr>
            <?php
            endforeach;
          else :
            ?>
            <tr>
              <td colspan="3" class="text-center">
                <h3>Nenhum registro encontrado</h3>
              </td>
            </tr>
          <?php
          endif;
          ?>
        </tbody>
      </table>
    </div>
  </section>


</div>
<?php $render('footer'); ?>