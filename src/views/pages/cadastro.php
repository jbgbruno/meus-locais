<?php $render('header'); ?>


<div class="container">
  <header>
    <div class="row my-5">
      <h1 class="">Cadastrar Novo Local</h1>
    </div>

  </header>
  <section>

    <form class="form" action="<?= $base ?>/cadastrar" method="POST" autocomplete="off">

      <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="cep" class="col-sm-2 col-form-label">CEP</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="cep" id="cep" data-mask="00000-000" required>

        </div>
        <div class="col-sm-02 mx-3">
          <button type="button" class="btn btn-primary" onclick="buscarCep()">Buscar CEP</button>
        </div>
      </div>
      <div class="form-group row">
        <label for="logradouro" class="col-sm-2 col-form-label">Logradouro</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="logradouro" id="logradouro" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="complemento" class="col-sm-2 col-form-label">Complemento</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="complemento" id="complemento" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="numero" class="col-sm-2 col-form-label">Número</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="numero" id="numero" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="bairro" class="col-sm-2  col-form-label">Bairro</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="bairro" id="bairro" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="uf" class="col-sm-2 col-form-label">UF</label>
        <div class="col-sm-10">
          <input type="text" maxlength="2" class="form-control" name="uf" id="uf" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="cidade" class="col-sm-2 col-form-label">Cidade</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="cidade" id="cidade" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="data" class="col-sm-2 col-form-label">Data</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="data" id="data" required>
        </div>
      </div>
      <hr>
      <div class="row ">
        <button type="submit" class="btn buttonSubmit">Cadastrar</button>
        <a href="<?= $base ?>/" class="btn btn-danger ml-2">Voltar</a>
      </div>
    </form>

  </section>


</div>
<?php $render('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
  function buscarCep() {
    var cep = $('#cep').val();
    if (cep == '') {
      alert('Favor informar o CEP para a consulta.')
      return false
    }
    $.get("<?= $base ?>/cep/" + cep, function(data) {

      try {
        var result = JSON.parse(data);
        if (result.cep) {
          console.log(result)
          $('#uf').val(result.uf)
          $('#cidade').val(result.localidade)
          $('#bairro').val(result.bairro)
          $('#logradouro').val(result.logradouro)
        } else {
          alert('CEP não encontrado! Por favor preecha os campos manualmente.')
        }
      } catch (e) {
        console.log('erro')
        return false;
      }
    });
  }
</script>
<?php $render('footer'); ?>