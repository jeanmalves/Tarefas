
var Lista = Backbone.View.extend({
    tagName: 'ul',
    model: null,
    initialize: function(options){
      this.model = options.model;  
      this.listenTo(this.model, 'change', this.render);
      this.listenTo(this.model, 'sync', this.render);
    },
    render: function(){        
        var el = this.el;
        
        $(el).empty();
        
        this.model.sortBy('nome');
        this.model.each(function(valor, key){
           $(el).append('<li>'+ valor.get('nome') + '</li>'); 
        });
        return this.el;
    }
});

var CidadesModel = Backbone.Model.extend({
   defaults:{
       nome: '',
       populacao: 0,
       estado: ''
   }
});

var cidadesCollection = Backbone.Collection.extend({
    model: CidadesModel,
    url: "/cidades.json"
});
