<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MEU_NOME - Perfil</title>
  <link rel="stylesheet" href="estilos.css">
</head>

<body>
  <div class="conteudo">
    <div class="foto"><img src="foto.png" alt=""></div>
    <div class="apresentacao">
      <span class="nome">ANA PAULA FERREIRA BARROSO DE CASTRO</span>
      <span class="curso">SISTEMAS DE INTOMAÇÃO (GRADUAÇÃO)</span>
      <span class="email">ana_barroso@ufms.br</span>
    </div>
  </div>

  <footer>
    <?php
      date_default_timezone_set('America/Manaus');
      echo 'Página gerada em '. date('d/m/Y');
      echo ' as '. date('H:i:s');
    ?>
    <!-- Insira aqui o texto abaixo substituindo pelo conteudo correto -->
    <!-- Texto: Página gerada em dia/mes/ano as hora:minuto:segundo -->
    <!-- Você deverá usar PHP e configurar para o timezone de Campo Grande/MS -->
  
  </footer>
</body>

</html>