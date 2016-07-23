<!DOCTYPE html>

<html>
    <head>
        <title>Lista de Tarefas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/underscore-min.js"></script>
        <script src="js/backbone-min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/app.js"></script>
        <script src="tarefas.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function (){
               listaTarefas = new TarefasCollection();
               listaTarefas.fetch();
               
               var listagem = new TarefasView({collection: listaTarefas});
            });
        </script>
        
        <style>
            ul li{
                list-style: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Lista de Tarefas</h1>
            <div id="lista">
                <ul class="col-md-6 col-md-offset-3" id="lista-tarefas">
                    <li>
                        <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" checked="checked">
                            </span>
                            <input type="text" class="form-control" value="desc da tarefa">
                        </div><!-- /input-group -->
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
