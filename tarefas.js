var Tarefa = Backbone.Model.extend({
   defaults:{
       id: null,
       status: false,
       nome: null,
       data_criacao:null,
       data_modificado: null
   } 
});

var TarefasCollection = Backbone.Collection.extend({
   model: Tarefa,
   url: "banco.php"
});

var TarefasView = Backbone.View.extend({
    el: "#lista-tarefas",
    collection: null,
    
    initialize: function(opt){
        this.collection = opt.collection;
        this.listenTo(this.collection, 'change', this.render);
        this.listenTo(this.collection, 'sync', this.render);
    },                  
    render: function(){
        
        var el = this.el;
        $(el).empty();
        
        this.collection.forEach(function(elem, indice){
            var check = (elem.get('status') == true) ? "checked=checked" : "";
            
            $('<li>' 
                +   '<div class="input-group">'
                +   '    <span class="input-group-addon">'
                +   '      <input type="checkbox" tarefa-id="'+elem.get('id')+'" '+check+'>'
                +   '    </span>'
                +   '    <input type="text" class="form-control" value="'+elem.get('nome')+'">'
                +   '</div>'
                + '</li>').appendTo($(el));
        
            $('input[type="checkbox"]').click(function(){
                console.log(this);
               var id = $(this).attr('tarefa-id');
               listaTarefas.get(id).set({"status": true});
               listaTarefas.get(id).save();
            });    
        });
        
        return this;
    }
});