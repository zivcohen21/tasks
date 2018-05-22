Todos.TodosController = Ember.ArrayController.extend({
    actions: {
        createTodo: function() {
            // Get the todo title set by the "New Todo" text field
            var title = this.get('newTitle');
            if (!title.trim()) { return; }
            var self = this;
            // Create the new Todo model
            var todo = this.store.createRecord('todo', {
                title: title,
                isCompleted: false
            });

            // Clear the "New Todo" text field
            this.set('newTitle', '');

            todo.save();

        },
        clearCompleted: function () {
            var completed = this.filterProperty('isCompleted', true);
            completed.invoke('deleteRecord');
            completed.invoke('save');
        },
        openAddOption: function() {
            this.set('isAdding', true);
            Ember.$("#new-todo").focus();
        },
        acceptChanges: function() {
            console.log("isAdding");
            this.set('isAdding', false);
        },
    },
    isAdding: false,

    remaining: function() {
        return this.filterBy('isCompleted', false).get('length');
    }.property('@each.isCompleted'),

    total: function() {
        return this.get('length');
    }.property('@each'),

    done: function() {
        return this.filterBy('isCompleted', true).get('length');
    }.property('@each.isCompleted'),
});

Ember.Handlebars.registerHelper('eachIndexed', function eachHelper(path, options) {
    var keywordName = 'item',
        fn;

    // Process arguments (either #earchIndexed bar, or #earchIndexed foo in bar)
    if (arguments.length === 4) {
        Ember.assert('If you pass more than one argument to the eachIndexed helper, it must be in the form #eachIndexed foo in bar', arguments[1] === 'in');
        Ember.assert(arguments[0] +' is a reserved word in #eachIndexed', $.inArray(arguments[0], ['index', 'index+1', 'even', 'odd']));
        keywordName = arguments[0];

        options = arguments[3];
        path = arguments[2];
        options.hash.keyword = keywordName;
        if (path === '') { path = 'this'; }
    }

    if (arguments.length === 1) {
        options = path;
        path = 'this';
    }

    // Wrap the callback function in our own that sets the index value
    fn = options.fn;
    function eachFn(){
        var keywords = arguments[1].data.keywords,
            view = arguments[1].data.view,
            index = view.contentIndex,
            list = view._parentView.get('content') || [],
            len = list.length;

        // Set indexes
        keywords['index'] = index;
        keywords['index_1'] = index + 1;
        keywords['first'] = (index === 0);
        keywords['last'] = (index + 1 === len);
        keywords['even'] = (index % 2 === 0);
        keywords['odd'] = !keywords['even'];
        arguments[1].data.keywords = keywords;

        return fn.apply(this, arguments);
    }
    options.fn = eachFn;

    // Render
    options.hash.dataSourceBinding = path;
    if (options.data.insideGroup && !options.hash.groupedRows && !options.hash.itemViewClass) {
        new Ember.Handlebars.GroupedEach(this, path, options).render();
    } else {
        return Ember.Handlebars.helpers.collection.call(this, 'Ember.Handlebars.EachView', options);
    }
});