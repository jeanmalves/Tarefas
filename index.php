<!DOCTYPE html>

<html>
    <head>
        <title>Lista de Tarefas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/underscore-min.js"></script>
        <script src="js/backbone-min.js"></script>
        
        <script src="js/app.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function (){
               
                var item1 = new CidadesModel({
                    nome: "Iratí",
                    populacao: 123,
                    tamanho: "grande"
                });
               
                var item2 = new CidadesModel();

                item2.set('nome', 'Araucária');
                
                var collection = new cidadesCollection();
                collection.fetch();    
                
                setTimeout(function(){
                   collection.add(item1);
                   collection.add(item2); 
                }, 1000);
                
                var listagem = new Lista({
                    model: collection
                });
                console.log(listagem);
                
                $("#lista").append(listagem.render()); 
                
                $("#update").click(function(){
                    collection.add(item1);
                    collection.add(item2); 
                    item1.set('nome','Pinhais');
                });
            });
        </script>
    </head>
    <body>
        <h1>Lista de Tarefas</h1>
        
        <div id="lista"></div>
        <input id="update" type="button" value="Atualizar">
    </body>
</html>
